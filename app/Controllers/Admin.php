<?php

namespace App\Controllers;

use App\Models\RoomModel;
use App\Models\RoomBookModel;
use App\Models\SubAdminModel;
use CodeIgniter\Controller;


class Admin extends BaseController
{

    public function home()
    {
        if (!session()->has('sub_admin')) {
            return redirect()->to('admin/login')->with('error', 'You must be logged in to access the dashboard');
     } else {
        echo view('admin/dashboard');
     }
    }

      // end 

    public function room_add()
    {

        if (!session()->has('sub_admin')) {
            return redirect()->to('admin/login')->with('error', 'You must be logged in to access the dashboard');
          } else {
             $subadminModel = new SubAdminModel();
            $loggedInSubAdmin = session('sub_admin');
             
            if ($loggedInSubAdmin['admin'] == true) {

                $roomModel = new RoomModel();
                  echo view('admin/room_add');

             } else {
               return redirect()->to('admin/login')->with('error', 'You are not authorized to access the dashboard');
   }
 }
}

  // end 
    
    public function room_save()
    {
        if (!session()->has('sub_admin')) {
            return redirect()->to('admin/login')->with('error', 'You must be logged in to access the dashboard');
          } else {
             $subadminModel = new SubAdminModel();
            $loggedInSubAdmin = session('sub_admin');
             
              if ($loggedInSubAdmin['admin'] == true) {


        $roomModel = new RoomModel();
        $data = $this->request->getPost();
        var_dump($data);
     
            $room_title = $this->request->getPost('room_title');
            $room_type = $this->request->getPost('room_type');
            $room_size = $this->request->getPost('room_size');
            $max_guest = $this->request->getPost('max_guest');
            $booking_amount = $this->request->getPost('booking_amount');
            $des = $this->request->getPost('des');
            $image = $this->request->getFile('image');
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move('./uploads', $newName); 
                $data = [
                    'room_title' => $room_title,
                    'room_type' => $room_type,
                    'room_size' => $room_size,
                    'max_guest' => $max_guest,
                    'booking_amount' => $booking_amount,
                    'des' => $des,
                    'image' => $newName 
                ];
                $roomModel->insert($data);
                return redirect()->to('/admin/rooms');
            }
            else{
                log_message('debug', 'room_save method called with non-POST request.');
                return redirect()->to('/admin/dashboard');
            }

        } else {
            return redirect()->to('admin/login')->with('error', 'You are not authorized to access the dashboard');
       }
     }
    }
  // end 
    
        public function edit_room($id)
    {
        if (!session()->has('sub_admin')) {
            return redirect()->to('admin/login')->with('error', 'You must be logged in to access the dashboard');
          } else {
             $subadminModel = new SubAdminModel();
            $loggedInSubAdmin = session('sub_admin');
             
           
            if ($loggedInSubAdmin['admin'] == true) {
        $roomModel = new RoomModel();
        $room = $roomModel->find($id);
        $data['room'] = $room;
        echo view('admin/room_edit', $data);

    } else {
        return redirect()->to('admin/login')->with('error', 'You are not authorized to access the dashboard');
   }
 }
    }

  // end 
    
    public function update_room($room_id)
    {
        if (!session()->has('sub_admin')) {
            return redirect()->to('admin/login')->with('error', 'You must be logged in to access the dashboard');
          } else {
             $subadminModel = new SubAdminModel();
            $loggedInSubAdmin = session('sub_admin');
             
           
            if ($loggedInSubAdmin['admin'] == true) {
        $roomModel = new RoomModel();
            $room_title = $this->request->getPost('room_title');
            $room_type = $this->request->getPost('room_type');
            $room_size = $this->request->getPost('room_size');
            $max_guest = $this->request->getPost('max_guest');
            $booking_amount = $this->request->getPost('booking_amount');
            $des = $this->request->getPost('des');
            $image = $this->request->getFile('image');
            $data = [
                'room_title' => $room_title,
                'room_type' => $room_type,
                'room_size' => $room_size,
                'max_guest' => $max_guest,
                'booking_amount' => $booking_amount,
                'des' => $des,
            ];
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move('./uploads', $newName);
                $data['image'] = $newName; 
            }
            $roomModel->update($room_id, $data);
            return redirect()->to('admin/rooms'); 

        } else {
            return redirect()->to('admin/login')->with('error', 'You are not authorized to access the dashboard');
       }
     }
    }
      // end 

    public function delete_room($room_id)
    {
        if (!session()->has('sub_admin')) {
            return redirect()->to('admin/login')->with('error', 'You must be logged in to access the dashboard');
          } else {
             $subadminModel = new SubAdminModel();
            $loggedInSubAdmin = session('sub_admin');
             
          
            if ($loggedInSubAdmin['admin'] == true) {
        $roomModel = new RoomModel();
        $room = $roomModel->find($room_id);
        if (!$room) {
            return redirect()->to('admin/rooms')->with('error', 'Room not found');
        }
        $roomModel->delete($room_id);
        return redirect()->to('admin/rooms')->with('success', 'Room deleted successfully');

    } else {
        return redirect()->to('admin/login')->with('error', 'You are not authorized to access the dashboard');
   }
 }
    }
  // end 
   
    public function rooms()
    {
        if (!session()->has('sub_admin')) {
            return redirect()->to('admin/login')->with('error', 'You must be logged in to access the dashboard');
          } else {
             $subadminModel = new SubAdminModel();
            $loggedInSubAdmin = session('sub_admin');
             
           
            if ($loggedInSubAdmin['admin'] == true) {
        $roomModel = new RoomModel();
        $rooms = $roomModel->findAll();
        return view('admin/rooms', ['rooms' => $rooms]);

    } else {
        return redirect()->to('admin/login')->with('error', 'You are not authorized to access the dashboard');
   }
 }
    }

  // end 



    public function sub_admin_add()
    {
        if (!session()->has('sub_admin')) {
            return redirect()->to('admin/login')->with('error', 'You must be logged in to access the dashboard');
          } else {
             $subadminModel = new SubAdminModel();
            $loggedInSubAdmin = session('sub_admin');
             
            
            if ($loggedInSubAdmin['admin'] == true) {
        $subadminModel = new SubAdminModel();
        echo view('admin/sub_admin_add');

    } else {
        return redirect()->to('admin/login')->with('error', 'You are not authorized to access the dashboard');
   }
 }
    }

      // end 

    public function sub_admin_save()
    {
        if (!session()->has('sub_admin')) {
            return redirect()->to('admin/login')->with('error', 'You must be logged in to access the dashboard');
          } else {
             $subadminModel = new SubAdminModel();
            $loggedInSubAdmin = session('sub_admin');
             
            
            if ($loggedInSubAdmin['admin'] == true) {
        $subadminModel = new SubAdminModel();
    
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];
    
       
        $subadminModel->insert($data);
    
        return redirect()->to('admin/sub_admin'); 

    } else {
        return redirect()->to('admin/login')->with('error', 'You are not authorized to access the dashboard');
   }
 }
    }
  // end 
  
  public function edit_sub_admin($id)
  {
    if (!session()->has('sub_admin')) {
        return redirect()->to('admin/login')->with('error', 'You must be logged in to access the dashboard');
      } else {
         $subadminModel = new SubAdminModel();
        $loggedInSubAdmin = session('sub_admin');
         
       
        if ($loggedInSubAdmin['admin'] == true) {
    $subadminModel = new SubAdminModel();
      $data = $subadminModel->find($id);
      $senddata['sub_admin'] = $data;
      echo view('admin/sub_admin_edit', $senddata);

    } else {
        return redirect()->to('admin/login')->with('error', 'You are not authorized to access the dashboard');
   }
 }
  }

  // end 
   
public function update_sub_admin($sub_admin_id)
{
    if (!session()->has('sub_admin')) {
        return redirect()->to('admin/login')->with('error', 'You must be logged in to access the dashboard');
      } else {
         $subadminModel = new SubAdminModel();
        $loggedInSubAdmin = session('sub_admin');
         
        
        if ($loggedInSubAdmin['admin'] == true) {
    $subadminModel = new SubAdminModel();

    $data = [
        'name' => $this->request->getPost('name'),
        'email' => $this->request->getPost('email'),
       
    ];

   
    $subadminModel->update($sub_admin_id, $data);

    return redirect()->to('admin/sub_admin'); 

} else {
    return redirect()->to('admin/login')->with('error', 'You are not authorized to access the dashboard');
}
}
}

  // end 
public function delete_sub_admin($sub_admin_id)
{
    if (!session()->has('sub_admin')) {
        return redirect()->to('admin/login')->with('error', 'You must be logged in to access the dashboard');
      } else {
         $subadminModel = new SubAdminModel();
        $loggedInSubAdmin = session('sub_admin');
         
        
        if ($loggedInSubAdmin['admin'] == true) {
    $subadminModel =  new SubAdminModel();
    $subadmin = $subadminModel->find($sub_admin_id);
    if (!$subadmin) {
        return redirect()->to('admin/sub_admin')->with('error', 'Room not found');
    }
    $subadminModel->delete($sub_admin_id);
    return redirect()->to('admin/sub_admin')->with('success', 'Room deleted successfully');

} else {
    return redirect()->to('admin/login')->with('error', 'You are not authorized to access the dashboard');
}
}
}
  // end 

public function sub_admin()
{
    if (!session()->has('sub_admin')) {
       return redirect()->to('admin/login')->with('error', 'You must be logged in to access the dashboard');
     } else {
        $subadminModel = new SubAdminModel();
       $loggedInSubAdmin = session('sub_admin');
        
      
       if ($loggedInSubAdmin['admin'] == true) {
            $alldata = $subadminModel->findAll();
            return view('admin/sub_admin', ['alldata' => $alldata]);
        } else {
           return redirect()->to('admin/login')->with('error', 'You are not authorized to access the dashboard');
      }
    }
}



  // end 

public function booking()
{
     if (!session()->has('sub_admin')) {
        return redirect()->to('admin/login')->with('error', 'You must be logged in to access the dashboard');
 } else {
        $bookingModel = new RoomBookModel();
       $loggedInSubAdmin = session('sub_admin');
        
       
            $alldata =  $bookingModel->findAll();
           
            return view('admin/booking', ['alldata' => $alldata]);
       
     }
}
  // end 

public function booking_admin()
{
    if (!session()->has('sub_admin')) {
         return redirect()->to('admin/login')->with('error', 'You must be logged in to access the dashboard');
     } else {
        $bookingModel = new RoomBookModel();
        $loggedInSubAdmin = session('sub_admin');
        
       
         if ($loggedInSubAdmin['admin'] == true) {
            $alldata =  $bookingModel->findAll();
           
            return view('admin/booking_admin', ['alldata' => $alldata]);
        } else {
         return redirect()->to('admin/login')->with('error', 'You are not authorized to access the dashboard');
         }
    }
}
  // end 

public function subadmin_approved($id)
{
    if (!session()->has('sub_admin')) {
        return redirect()->to('admin/login')->with('error', 'You must be logged in to access the dashboard');
 } else {
    
    
    $bookingModel = new RoomBookModel();

   
    $subadmin = $bookingModel->find($id);

   

   
    if (!$subadmin) {
       
        return redirect()->back()->with('error', 'Subadmin not found');
    }

    
    $newApprovalStatus = $subadmin['subadmin_approved'] == 0 ? 1 : 0; 
   
    
    $subadmin["subadmin_approved"]=$newApprovalStatus;
    $subadmin =$bookingModel->save($subadmin);

   
}
    
}
  // end 

public function admin_approved($id)
{

    if (!session()->has('sub_admin')) {
        return redirect()->to('admin/login')->with('error', 'You must be logged in to access the dashboard');
      } else {
         $subadminModel = new SubAdminModel();
        $loggedInSubAdmin = session('sub_admin');
         
        
        if ($loggedInSubAdmin['admin'] == true) {
   
    $bookingModel = new RoomBookModel();

   
    $booking = $bookingModel->find($id);

    
    if (!$booking) {
        
        return redirect()->to('admin/booking')->with('error', 'Booking not found');
    }

   
    $newApprovalStatus = $booking['admin_approved'] == 0 ? 1 : 0; 

    
    $booking['admin_approved'] = $newApprovalStatus;
    $bookingModel->save($booking);

    
    return redirect()->to('admin/booking')->with('success', 'Admin approval status updated successfully');

} else {
    return redirect()->to('admin/login')->with('error', 'You are not authorized to access the dashboard');
}
}
}

  // end 


public function login()
{

   echo view('admin/loginuser');

}


    public function sub_admin_login()
    {
        
        $validationRules = [
            'email' => 'required',
            'password' => 'required',
        ];
    
        if (!$this->validate($validationRules)) {
            
            return redirect()->to('admin/login')->withInput()->with('errors', $this->validator->getErrors());
        }
    
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
       
        $subadminModel = new SubAdminModel();
    
        
        $authenticatedSubAdmin = $subadminModel->authenticate($email, $password);
    
        if (!$authenticatedSubAdmin) {
            
            return redirect()->to('admin/login')->with('error', 'Invalid email or password');
        }
    
       
        session()->set('sub_admin', $authenticatedSubAdmin);
        return redirect()->to('admin/sub_admin');
    }

  // end 

    public function logout()
{
    
    session()->remove('sub_admin');

    
    return redirect()->to('admin/login')->with('success', 'You have been logged out successfully');
}


  // end s



    


}
