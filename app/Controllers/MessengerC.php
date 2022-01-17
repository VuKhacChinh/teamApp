<?php
namespace App\Controllers;
use App\Models\Messenger;
use App\Models\User_Group;

class MessengerC extends BaseController{
    public function index(){
        $idgroup = $_GET['idgroup'];
        $mess_obj = new Messenger();
        $mess = $mess_obj->getMess($idgroup);
        $data['mess'] = $mess;
        $data['idgroup'] = $idgroup;
        return view('MessengerV',$data);
    }
}
?>