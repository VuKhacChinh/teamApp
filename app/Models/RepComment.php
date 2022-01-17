<?php namespace App\Models;
use CodeIgniter\Model;

class RepComment extends Model
{
    public function addRepComment($repcomment){
        $db = \Config\Database::connect();
        $builder = $db->table('repcomment');
        $builder->insert($repcomment);
    }

    public function getRepComments($idcomment){
        $db = \Config\Database::connect();
        $builder = $db->table('repcomment');
        $builder->where('idcomment',$idcomment);
        $builder->join('users','repcomment.iduser=users.iduser');
        $query = $builder->get();
        $result = $query->getResult();
        return $result;
    }

}