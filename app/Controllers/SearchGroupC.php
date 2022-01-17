<?php
namespace App\Controllers;
use App\Models\Group;
use App\Models\User_Group;
use App\Models\User_Req_Group;

class SearchGroupC extends BaseController{
    public function index(){
        session_start();
        $iduser = $_SESSION['iduser'];
        $group_obj = new Group();
        $user_group_obj = new User_Group();
        $user_req_group_obj = new User_Req_Group();
        if(isset($_POST['btnthamgia'])){
            $user_req_group = array(
                'iduser' => $iduser,
                'idgroup' => $_POST['idgroup']
            );
            $user_req_group_obj->requestGroup($user_req_group);
        }
        $searchkey = $_POST['searchkey'];
        $data['reqgroups'] = $user_req_group_obj->searchGroups($searchkey,$iduser);
        $group = $user_group_obj->getIdGroups($searchkey, $iduser);
        $req_group = $user_req_group_obj->getIdGroups($searchkey, $iduser);
        $data['exceptgroup'] = $group_obj->exceptGroup($searchkey,$group, $req_group);
        $data['searchkey'] = $searchkey;
        return view('SearchGroupV',$data);
    }
}
?>
