<?php namespace App\Models;
use CodeIgniter\Model;

class Comment extends Model
{
    public function addComment($comment){
        $db = \Config\Database::connect();
        $builder = $db->table('comment');
        $builder->insert($comment);
    }

    public function getComments($idpost){
        $db = \Config\Database::connect();
        $builder = $db->table('comment');
        $builder->where('idpost',$idpost);
        $builder->join('users','comment.iduser=users.iduser');
        $query = $builder->get();
        $result = $query->getResult();
        return $result;
    }

    public function deleteComment($idpost)
    {   
        $db = \Config\Database::connect();
        $builder = $db->table('comment');
        $builder->delete(['idpost' => $idpost]);
    }

}