<?php namespace App\Controllers;
use App\Models\User;

class SignInC extends BaseController
{
	public function index()
	{
        
		session_start();
		if(isset($_POST['btndangnhap'])){
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$user_obj = new User();
			$res = $user_obj->checkUser($username,$password);
			if($res==0)
			{
				$user = $user_obj->getUser($username,$password);
				$_SESSION['username']=$username;
				$_SESSION['password']=$password;
				$_SESSION['iduser']=$user->iduser;
				$_SESSION['name']=$user->name;
				$_SESSION['avata']=$user->avata;
				return redirect()->to('GroupC');
			}
			if($res==1)
			{
                return redirect()->to('Trangquantri');
			}
			if($res==-1)
			{
				echo view('SignInV');
				echo "<h2 style='color:red; text-align:center'> Tên đăng nhập hoặc mật khẩu không chính xác </h2>";
			}
        }
        else echo view('SignInV');
	}

}
?>

