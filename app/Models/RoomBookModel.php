<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomBookModel extends Model
{
    protected $table = 'booked';
    protected $primaryKey = 'id'; // Assuming 'id' is the primary key of the 'bookings' table
    protected $allowedFields = ['booking_type', 'room_id', 'user_id', 'arrival_date', 'departure_date', 'emp_id', 'department', 'designation', 'name', 'dob', 'gender', 'official_address', 'city', 'state', 'pin', 'phone', 'id_proof','total_amount','order_id','payment_id','subadmin_approved','admin_approved'];
    protected $useTimestamps = true;
   
}

?>
