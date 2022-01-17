<?php namespace App\Models;
use CodeIgniter\Model;

class User_Group extends Model
{


    public function getMembers($idgroup){
        $db = \Config\Database::connect();
        $builder = $db->table('user_group');
        $builder->join('users','user_group.iduser=users.iduser');
        $builder->where('idgroup',$idgroup);
        $query = $builder->get();
        $result = $query->getResult();
        return $result;
    }

    public function getIdGroups($searchkey,$iduser){
        $db = \Config\Database::connect();
        $builder = $db->table('user_group');
        $builder->where('iduser',$iduser);
        $builder->join('group','user_group.idgroup=group.idgroup');
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

    public function getMemberByIdGroup($idgroup){
        $db = \Config\Database::connect();
        $builder = $db->table('user_group');
        $builder->select('iduser');
        $builder->where('idgroup',$idgroup);
        $query = $builder->get();
        $result = $query->getResult();
        return $result;
    }

    public function checkExistUser($iduser,$idgroup){
        $db = \Config\Database::connect();
        $builder = $db->table('user_group');
        $condition = array(
            'iduser' => $iduser,
            'idgroup' => $idgroup
        );
        $builder->where($condition);
        if($builder->countAllResults(false)==0) return 0;
        else return 1;
    }

    public function expelMember($iduser,$idgroup){
        $db = \Config\Database::connect();
        $builder = $db->table('user_group');
        $condition = array(
            'iduser' => $iduser,
            'idgroup' => $idgroup
        );
        $builder->delete($condition);
    }

    public function approvalMember($iduser,$idgroup){
        $db = \Config\Database::connect();
        $builder = $db->table('user_group');
        $data = array(
            'iduser' => $iduser,
            'idgroup' => $idgroup
        );
        $builder->insert($data);
    }

}
