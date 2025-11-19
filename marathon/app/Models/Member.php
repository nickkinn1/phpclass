<?php

namespace App\Models;

use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Model;

class Member extends Model
{
    public function user_login($email, $password){
        $db = db_connect();
        $sql = "SELECT password, userKey, roleID, ID from users where email = ? and roleID = 2";
        $query = $db->query($sql, [$email]);
        $row = $query->getFirstRow();

        if($row != null){
            $dbPass = $row->password;
            $userKey = $row->userKey;
            $password = md5($password . $userKey);

            if($password === $dbPass){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function user_create($username, $email, $password, $roleID){
        $userKey = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
        $hashedPassword = md5($password . $userKey);

        try{
            $db = db_connect();
            $sql = "INSERT INTO users (username, email, password, roleID, userKey) VALUES (?,?,?,?,?)";
            $query = $db->query($sql, [$username, $email, $hashedPassword, $roleID, $userKey]);
            return false;
        } catch (DatabaseException $err){
            return $err->getMessage();
        }
    }
}