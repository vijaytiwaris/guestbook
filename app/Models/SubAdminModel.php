<?php

namespace App\Models;

use CodeIgniter\Model;

class SubAdminModel extends Model
{
    protected $table = 'allusers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password','admin','subadmin','user'];

    /**
     * 
     *
     * @param string 
     * @param string 
     * @return array|null
     */
    public function authenticate($email, $password)
    {
        
        $subAdmin = $this->where('email', $email)->first();

      
        if ($subAdmin) {
          
            if (password_verify($password, $subAdmin['password'])) {
                return $subAdmin;
            }
        }

        return null;
    }
}




?>