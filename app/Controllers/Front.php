<?php

namespace App\Controllers;

use App\Models\RoomModel;
use App\Models\RoomBookModel;
use App\Models\SubAdminModel;
use CodeIgniter\Controller;
use Razorpay\Api\Api;

class Front extends BaseController
{

    public function home()
    {

        $roomModel = new RoomModel();
        $rooms = $roomModel->findAll();
        return view('home', ['rooms' => $rooms]);
       
    }

    // end 



    public function single($room_id)
    {
        $roomModel = new RoomModel();
        $room = $roomModel->find($room_id);
        if (!$room) {
        return redirect()->to('home')->with('error', 'Room not found');
    }
        echo view('single',['room' => $room]);
    }

  // end 

    public function booking($room_id){
        if (!session()->has('user')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to access the dashboard');
        } else {

            $user_id = session('user')['id'];
        $roomModel = new RoomModel();
        $room = $roomModel->find($room_id);

        
        if (!$room) {
        return redirect()->to('home')->with('error', 'Room not found');
    }
            echo view('book',['room' => $room , 'room_id'=>$room_id,'user_id'=>$user_id , 'booking_amount'=>$room['booking_amount']]);
}
    }

  // end 

    public function roombook()
    {
        if (!session()->has('user')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to access the dashboard');
        } else {
        helper('form');

        
        $validationRules = [
            'room_id' => 'required',
            'user_id' => 'required',
            'booking_type' => 'required',
            'arrival_date' => 'required',
            'departure_date' => 'required',
            'emp_id' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'official_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pin' => 'required',
            'phone' => 'required',
           
        ];
        
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $idProof = $this->request->getFile('id_proof');

       $data = [
        'room_id' => $this->request->getPost('room_id'),
        'booking_type' => $this->request->getPost('booking_type'),
        'booking_amount' => $this->request->getPost('booking_amount'),
        'arrival_date' => $this->request->getPost('arrival_date'),
        'departure_date' => $this->request->getPost('departure_date'),
        'emp_id' => $this->request->getPost('emp_id'),
        'department' => $this->request->getPost('department'),
        'designation' => $this->request->getPost('designation'),
        'name' => $this->request->getPost('name'),
        'dob' => $this->request->getPost('dob'),
        'gender' => $this->request->getPost('gender'),
        'official_address' => $this->request->getPost('official_address'),
        'city' => $this->request->getPost('city'),
        'state' => $this->request->getPost('state'),
        'pin' => $this->request->getPost('pin'),
        'phone' => $this->request->getPost('phone'),
        'user_id' => $this->request->getPost('user_id'),
    ];

    $overlappingBookings = $this->checkForOverlappingBookings($data['room_id'], $data['arrival_date'], $data['departure_date']);
    $BookingAmount = $this->calculateBookingAmount($data['arrival_date'], $data['departure_date'],$data['booking_amount']);
   

    if ($overlappingBookings) {
        return redirect()->back()->withInput()->with('error', 'Booking overlaps with existing bookings');
    }
  
        $bookingModel = new RoomBookModel();
        $bookingId =$bookingModel->insert($data);

        $booked = $bookingModel->where('room_id', $data['room_id'])
                        ->where('user_id', $data['user_id'])
                        ->where('arrival_date', $data['arrival_date'])
                        ->first();

        $booked["total_amount"]=$BookingAmount;
        $booked =$bookingModel->save($booked);
       
        
        return redirect()->to("/initiatePayment/{$bookingId}");
    }}


  // end 

    public function initiatePayment($bookingId)
    {
        if (!session()->has('user')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to access the dashboard');
        } else {
        $bookingModel = new RoomBookModel();
        $booking = $bookingModel->find($bookingId);

        if (!$booking) {
           
            return redirect()->to('/')->with('error', 'Invalid booking ID');
        }

        $orderId = $booking['id']; 
        $bookingAmount = $booking['total_amount']; 

        return view('payment', [
            'booking' => $booking,
            'orderId' => $orderId,
            'bookingAmount' => $bookingAmount,
        ]);
    }}

  // end 

    public function processPayment()
    {
        if (!session()->has('user')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to access the dashboard');
        } else {

        $orderId = $this->request->getPost('orderId');
        $paymentId = $this->request->getPost('razorpay_payment_id');
        $paymentId = $this->request->getPost('booking_amount');
    
        $keyId = 'rzp_test_FQQAgVZJLjfvT5';
        $keySecret = 'VtxrK2JZWz5tr4IR84MqBxll';
    
        $api = new Api($keyId, $keySecret);
        exit();
        if ($paymentId) {

            return redirect()->to('/success')->with([
                'orderId' => $orderId,
                'bookingAmount' => $bookingAmount
            ])->with('success', 'Payment successful!');
        } else {
            return redirect()->to('/error')->with([
                'orderId' => $orderId,
                'bookingAmount' => $bookingAmount,
            ])->with('error', 'Payment failed!');
        }
    }}


    public function success()
    {
        if (!session()->has('user')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to access the dashboard');
        } else {
       
        $paymentId = $this->request->getGet('payment_id');
        $amount = $this->request->getGet('amount');
        $orderId = $this->request->getGet('order_id');

        $bookingModel = new RoomBookModel();

        $booked = $bookingModel->where('id',$orderId )->first();

            $booked["payment_status"]="Confirmed";
            $booked["payment_id"]=$paymentId;
            $bookingModel->save($booked);

        return view('receipt', [
      
            'orderId' => $orderId,
            'bookingAmount' => $amount,
        
        ]);
    }}

  // end 

    protected function calculateBookingAmount($arrivalDate, $departureDate, $roomRatePerDay)
{
    $days = floor((strtotime($departureDate) - strtotime($arrivalDate)) / (60 * 60 * 24));
    return $days * $roomRatePerDay;
}

  // end 

    protected function checkForOverlappingBookings($roomId, $arrivalDate, $departureDate)
{
    $bookingModel = new RoomBookModel(); 
    $overlappingBookings = $bookingModel
        ->where('room_id', $roomId)
        ->where("arrival_date < '{$departureDate}' AND departure_date > '{$arrivalDate}'")
        ->findAll();

    return !empty($overlappingBookings);
}

  // end 

    public function getBookedDates($id)
{
    $bookingModel = new RoomBookModel(); 
    $bookings = $bookingModel->where('room_id', $id)->findAll();


    $bookedDates = array();
    $currentDate = date('Y-m-d'); 

    foreach ($bookings as $booking) {
        $arrivalDate = $booking['arrival_date'];
        $departureDate = $booking['departure_date'];
        
       
        $datesRange = $this->getDatesRange($arrivalDate, $departureDate);
        $bookedDates = array_merge($bookedDates, $datesRange);
    }
   ;

    
    return $this->response->setJSON(array('booked_dates' => $bookedDates));
}

  // end 


   
    private function getDatesRange($arrival, $departure)
    {
        $dates = array();
        $currentDate = strtotime($arrival);
        $endDate = strtotime($departure);

        while ($currentDate <= $endDate) {
            $dates[] = date('Y-m-d', $currentDate);
            $currentDate = strtotime('+1 day', $currentDate);
        }

        return $dates;
    }

  // end 

    public function login()
{
   echo view('loginuser');

}
  // end 

    public function user_login()
    {
        
        $validationRules = [
            'email' => 'required|valid_email',
            'password' => 'required',
        ];
    
        if (!$this->validate($validationRules)) {
            
            return redirect()->to('login')->withInput()->with('errors', $this->validator->getErrors());
        }
    
       
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
       
        $subadminModel = new SubAdminModel();
    
       
        $authenticatedUser = $subadminModel->authenticate($email, $password);
    
        if (!$authenticatedUser) {
           
            return redirect()->to('login')->with('error', 'Invalid email or password');
        }
    
        
        session()->set('user', $authenticatedUser);
        return redirect()->to('/');
    }

  // end 

    public function logout()
{
  
    session()->remove('user');

    
    return redirect()->to('/login')->with('success', 'You have been logged out successfully');
}

  // end 

public function user_create()
    {
        $subadminModel = new SubAdminModel();
        echo view('createuser');
    }

    public function user_save()
    {
        $subadminModel = new SubAdminModel();
    
       
        $existingUser = $subadminModel->where('email', $this->request->getPost('email'))->first();
    
       
        if ($existingUser) {
            return redirect()->to('/signup')->withInput()->with('error', 'Email already exists');
        }
    
        
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'user' => 1,
        ];
    
       
        $subadminModel->insert($data);
     

        $authenticatedUser = $subadminModel->authenticate($data['email'], $data['password']);

        if (!$authenticatedUser) {
           
            return redirect()->to('/login')->with('error', 'Invalid email or password');
        }
        session()->set('user', $authenticatedSubAdmin);
        return redirect()->to('/'); 
    }


}
  // end 






