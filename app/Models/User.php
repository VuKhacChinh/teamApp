<?php namespace App\Models;
use CodeIgniter\Model;

class User extends Model
{
    
    public function getUsers()
    {   
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->get();
        $result = $query->getResult();
        return $result;
    }

    public function addUser($user){
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->insert($user);
    }

    public function deleteUser($iduser){
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->delete(['iduser'=>$iduser]);
    }

    public function checkUser($username,$password){  
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('idrole');
        $condition = array(
            'username' => $username,
            'password' => $password
        );
        $builder->where($condition);
        if($builder->countAllResults(false)==0) return -1;
        else{
            $query = $builder->get();
            $result = $query->getResult();
            return $result[0]->idrole;
        }
    }

    public function getUser($username,$password){  
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $condition = array(
            'username' => $username,
            'password' => $password
        );
        $builder->where($condition);
        $query = $builder->get();
        $result = $query->getResult();
        return $result[0];
    }

    public function getUserByEmail($email){  
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('email',$email);
        $query = $builder->get();
        $result = $query->getResult();
        return $result[0];
    }

    public function updateUser($iduser,$hoten,$phonenumber,$email,$address){
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $array = array(
            'hoten'=>$hoten,
            'phonenumber'=>$phonenumber,
            'email'=>$email,
            'address'=>$address
        );
        $builder->where('iduser',$iduser);
        $builder->update($array);
    }

    public function changePassword($iduser,$password){
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('iduser',$iduser);
        $builder->update(['password'=>$password]);
    }

    public function changeInfor($iduser,$name){
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('iduser',$iduser);
        $change = array(
            'name'=>$name
        );
        $builder->update($change);
    }

}

?>
