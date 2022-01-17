<?php namespace App\Models;
use CodeIgniter\Model;

class Messenger extends Model
{

    public function getMess($idgroup)
    {   
        $db = \Config\Database::connect();
        $builder = $db->table('messenger');
        $builder->where('idgroup',$idgroup);
        $builder->join('users','messenger.iduser=users.iduser');
        $query = $builder->get();
        $result = $query->getResult();
        return $result;
    }

    public function addMess($mess)
    {   
        $db = \Config\Database::connect();
        $builder = $db->table('messenger');
        $builder->insert($mess);
    }


}