<?php namespace App\Controllers;

use App\Models\User;
class SuaThongTin extends BaseController
{
    public function index(){
        session_start();
        $user = new User();
        if(isset($_GET['doimatkhau'])){
            return view('ChangePassword');
        }
        if(isset($_POST['btndoimatkhau'])){
            if(md5($_POST['password'])!=$_SESSION['password']){
                $data['PasswordException'] = 1;
                return view('ChangePassword',$data);
            }
            $validation = \Config\Services::validation();
            $config = array(
                'password' => 'required',
                'newpassword1' => 'required',
                'newpassword2' => 'required|matches[newpassword1]'
            );
            $validation->setRules($config);
            if(!$validation->run($_POST)){
                $data['Exception'] = 1;
                return view('ChangePassword',$data);
            }
            $user->changePassword($_SESSION['iduser'],md5($_POST['newpassword1']));
            $_SESSION['password'] = md5($_POST['newpassword1']);
            $data['success']=1;
            return view('ChangePassword',$data);
        }
        if(isset($_GET['suathongtin'])){
            $dt = $user->getUser($_SESSION['username'],$_SESSION['password']);
            $data['name'] = $dt->name;
            $data['avata'] = $dt->avata;
            return view('ChangeInfor',$data);
        }
        if(isset($_POST['btnsuathongtin'])){
            $validation = \Config\Services::validation();
            $config = array(
                'newname' => 'required'
            );
            $validation->setRules($config);
            if(!$validation->run($_POST)){
                $data['name'] = $_POST['name'];
                $data['Exception'] = 1;
                return view('ChangeInfor',$data);
            }
            $avata = $_POST['avata'];
            $data['name'] = $_POST['newname'];
            $data['avata'] = $avata;

            $target_dir = "avata/";
            $target_file = $target_dir.basename($_FILES["avata"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["avata"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $data['UploadException'] = 1;
                return view('ChangeInfor',$data);
            } else {
                move_uploaded_file($_FILES["avata"]["tmp_name"], $target_file);
                $oldername =  $target_file;
                $newnamne = $avata;
                if($oldername!=$newnamne) rename($oldername,$newnamne);
                $data['success']=1;
                $user->changeInfor($_SESSION['iduser'],$data['name']);
                return view('ChangeInfor',$data);
            }

        }
    }
}
?>
