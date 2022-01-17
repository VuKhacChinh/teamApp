<?php namespace App\Models;
use CodeIgniter\Model;

class File extends Model
{

    public function addFIle($file){
        $db = \Config\Database::connect();
        $builder = $db->table('file');
        $builder->insert($file);
    }

    public function getFile($idgroup){
        $db = \Config\Database::connect();
        $builder = $db->table('file');
        $builder->select('filepath')->where('idgroup',$idgroup);
        $query = $builder->get();
        $result = $query->getResult();
        return $result;
    }
}