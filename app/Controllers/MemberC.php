<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Group;
use App\Models\User_Group;
use App\Models\User_Req_Group;

class MemberC extends BaseController{
    public function index(){
        session_start();
        $iduser = $_SESSION['iduser'];
        $idgroup = $_GET['idgroup'];
        $user_obj = new User();
        $group_obj = new Group();
        $user_group_obj = new User_Group();
        $user_req_group_obj = new User_Req_Group();

        $group = $group_obj->getGroupById($idgroup);
        if(isset($_GET['out'])){
            $member = $user_group_obj->getMembers($idgroup);
            if($iduser==$group->idleader){
                $nummem = count($member);
                if($nummem>1){
                    for($i = 0; $i < $nummem; ++$i){
                        if($member[$i]->iduser != $iduser){
                            $idnewmanager = $member[$i]->iduser;
                            break;
                        }
                    }
                    $group_obj->changeLeader($idnewmanager,$idgroup);
                    $user_group_obj->expelMember($iduser,$idgroup);
                }
                else{
                    $user_group_obj->expelMember($iduser,$idgroup);
                    $group_obj->deleteGroup($idgroup);
                }
            }
            $user_group_obj->expelMember($iduser,$idgroup);
            return redirect()->to('GroupC');
        }
        if(isset($_POST['btnaddmember'])){
            $email = $_POST['email'];
            $iduser = $user_obj->getUserByEmail($email)->iduser;
            $exist = $user_group_obj->checkExistUser($iduser,$idgroup);
            if($exist==0){
                $user_group_obj->approvalMember($iduser, $idgroup);
                $data['addmemsucess'] = 1;
            }
            else $data['addmemsucess'] = 0;
        }
        $idgroup = $_GET['idgroup'];
        if(isset($_GET['joinning_request'])){
            $users = $user_req_group_obj->getUserRequests($idgroup);
            $manager = 1;
            $viewrequest = 1;
        }
        else{
            $users = $user_group_obj->getMembers($idgroup);
            if($_SESSION['iduser']==$group->idleader) $manager = 1;
            else $manager = 0;
            $viewrequest = 0;
        }
        $data['manager'] = $manager;
        $data['viewrequest'] = $viewrequest;
        $data['users'] = $users;
        return view('MemberV',$data);
    }
}
?>
