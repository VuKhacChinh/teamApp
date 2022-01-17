<?php namespace App\Models;
use CodeIgniter\Model;

class Post extends Model
{

    public function createPost($post){
        $db = \Config\Database::connect();
        $builder = $db->table('post');
        $builder->insert($post);
    }

    public function getPosts($idgroup)
    {   
        $db = \Config\Database::connect();
        $builder = $db->table('post');
        $builder->where('idgroup',$idgroup);
        $builder->join('users','post.iduser=users.iduser');
        $builder->orderBy('idpost','desc');
        $query = $builder->get();
        $result = $query->getResult();
        return $result;
    }

    public function updatePost($idpost,$newcontentpost)
    {   
        $db = \Config\Database::connect();
        $builder = $db->table('post');
        $builder->where('idpost',$idpost);
        $builder->update(['contentpost'=>$newcontentpost]);
    }

    public function deletePost($idpost)
    {   
        $db = \Config\Database::connect();
        $builder = $db->table('post');
        $builder->delete(['idpost' => $idpost]);
    }

}