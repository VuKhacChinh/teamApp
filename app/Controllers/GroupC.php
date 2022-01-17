<?php
namespace App\Controllers;
use App\Models\Group;
use App\Models\User_Group;

class GroupC extends BaseController{
    public function index(){
        session_start();
        $group_obj = new Group();
        if(isset($_POST["groupname"])){
            $R = rand(0,255);
            $G = rand(0,255);
            $B = rand(0,255);
            $RGB = "rgb(".$R.",".$G.",".$B.")";
            $group = array(
                'groupname' => $_POST['groupname'],
                'groupcolor' => $RGB,
                'idleader' => $_SESSION['iduser'],
            );
            $group_obj->createGroup($group);
            $idgroup = $group_obj->getLastID();
            $user_group = array(
                'iduser' => $_SESSION['iduser'],
                'idgroup' => $idgroup,
            );
            $user_group_obj = new User_Group();
            $user_group_obj->makeRelationship($user_group);
        }
        $data['groups'] = $group_obj->getGroups($_SESSION['iduser']);
        return view('GroupV',$data);
    }
}
?>