<?php

namespace App\Models;

use CodeIgniter\Model;

class M_login extends Model
{
    protected $table      = 'admin';
    
    function getLogin($data)
    {

        $db = \Config\Database::connect();
        $id = $data['id'];
        $user = $data['username'];
        $pass = md5($data['password']);
        $sql = $this->db->query("SELECT * FROM admin WHERE Username = '$user' AND Password = '$pass' AND id='$id'");
        if(count($sql->getResultArray())>0){
            return TRUE;
        }
        else{
            return FALSE;
        }
        return $data;
    }

}