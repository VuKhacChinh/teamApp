<?php namespace App\Models;
use CodeIgniter\Model;

class Group extends Model
{
    public function getGroups($iduser)
    {   
        $db = \Config\Database::connect();
        $builder = $db->table('group');
        $builder->join('user_group','group.idgroup=user_group.idgroup');
        $builder->where('user_group.iduser',$iduser);
        $builder->orderBy('group.idgroup','desc');
        $query = $builder->get();
        $result = $query->getResult();
        return $result;
    }

    public function getGroupById($idgroup){
        
        $db = \Config\Database::connect();
        $builder = $db->table('group');
        $builder->where('idgroup', $idgroup);
        $query = $builder->get();
        $result = $query->getResult();
        return $result[0];
    }

    public function exceptGroup($searchkey,$group, $req_group){
        $db = \Config\Database::connect();
        $builder = $db->table('group');
        $builder->whereNotIn('idgroup',$group);
        $builder->whereNotIn('idgroup',$req_group);
        $builder->like('groupname',$searchkey);
        $query = $builder->get();
        $result = $query->getResult();
        return $result;
    }

    public function createGroup($group){
        $db = \Config\Database::connect();
        $builder = $db->table('group');
        $builder->insert($group);
    }

    public function getLastID(){
        $db = \Config\Database::connect();
        $db->table('group');
        return $db->insertID();
    }
    
    public function deleteGroup($idgroup){
        $db = \Config\Database::connect();
        $builder = $db->table('group');
        $builder->delete(['idgroup'=>$idgroup]);
    }

    public function changeLeader($idleader, $idgroup){
        $db = \Config\Database::connect();
        $builder = $db->table('group');
        $builder->where('idgroup', $idgroup);
        $builder->update(['idleader'=>$idleader]);
    }
}
