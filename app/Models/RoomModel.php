<?php namespace App\models;

use CodeIgniter\Model ;

class RoomModel extends Model
{
    protected $table = "rooms";
    protected $DBGroup = "default";
    protected $allowedFields = [ 'room_id','room_title', 'room_type', 'room_size', 'max_guest','booking_amount','des', 'image']; 
    protected $useTimestamps = true;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $returnType = 'array';
}

?>