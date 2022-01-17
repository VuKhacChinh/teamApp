<?php namespace App\Models;
use CodeIgniter\Model;

class User_Req_Group extends Model
{

    public function requestGroup($user_req_group){
        $db = \Config\Database::connect();
        $builder = $db->table('user_req_group');
        $builder->insert($user_req_group);
    }

    public function getUserRequests($idgroup){
        $db = \Config\Database::connect();
        $builder = $db->table('user_req_group');
        $builder->where('idgroup',$idgroup);
        $builder->join('users','user_req_group.iduser=users.iduser');
        $query = $builder->get();
        $result = $query->getResult();
        return $result;
    }

    public function searchGroups($searchkey, $iduser){
        $db = \Config\Database::connect();
        $builder = $db->table('user_req_group');
        $builder->where('iduser', $iduser);
        $builder->join('group','user_req_group.idgroup=group.idgroup');
        $builder->like('groupname',$searchkey);
        $query = $builder->get();
        $result = $query->getResult();
        return $result;
    }

    public function getIdGroups($searchkey,$iduser){
        $db = \Config\Database::connect();
        $builder = $db->table('user_req_group');
        $builder->where('iduser',$iduser);
        $builder->join('group','user_req_group.idgroup=group.idgroup');
        $builder->like('groupname',$searchkey);
        $query = $builder->get();
        $result = $query->getResult();
        $a = array();
        array_push($a,-1);
        foreach($result as $res){
            array_push($a,$res->idgroup);
        }
        return $a;
    }

    public function expelMember($iduser,$idgroup){
        $db = \Config\Database::connect();
        $builder = $db->table('user_req_group');
        $condition = array(
            'iduser' => $iduser,
            'idgroup' => $idgroup
        );
        $builder->delete($condition);
    }

}
