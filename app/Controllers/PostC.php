<?php
namespace App\Controllers;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User_Group;

class PostC extends BaseController{
    public function index(){
        session_start();
        $post_obj = new Post();
        $comment_obj = new Comment();
        if(isset($_POST['btn_post_input'])){
            $post = array(
                'iduser' => $_SESSION['iduser'],
                'idgroup' => $_GET['idgroup'],
                'contentpost' => $_POST['post_input'],
                'posttime' => date("Y-m-d H:i:s")
            );
            $post_obj->createPost($post);
        }
        if(isset($_POST['btn_new_post_input'])){
            $newcontentpost = $_POST['edit_input'];
            $idpost = $_POST['idpost'];
            $post_obj->updatePost($idpost,$newcontentpost);
        }

        if(isset($_POST['btndeletepost'])){
            $idpost = $_POST['idpost'];
            $comment_obj->deleteComment($idpost);
            $post_obj->deletePost($idpost);
        }

        $user_group_obj = new User_Group();
        $users = $user_group_obj->getMembers($_GET['idgroup']);
        if($_SESSION['iduser']==$users[0]->iduser) $manager = 1;
        else $manager = 0;
        $data['manager'] = $manager;
        $data['posts'] = $post_obj->getPosts($_GET['idgroup']);
        return view('PostV',$data);
    }
}
?>