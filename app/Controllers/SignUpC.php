<?php namespace App\Controllers;
use App\Models\User;

class SignUPC extends BaseController{
    public function index(){
        if(isset($_POST['btndangki'])){
            $validation = \Config\Services::validation();
            $config = array(
                'name' =>'required',
                'username' => 'required|is_unique[users.username]',
                'password' => 'required',
                'pass_confirm' => 'required|matches[password]',
                'email'=>'required|valid_email'
            );
            $validation->setRules($config);
            if(!$validation->run($_POST)){
                if ($validation->hasError('username')){
                    if($_POST['username']) echo "<h2 style='color:red; text-align:center;'>Tên tài khoản đã tồn tại</h2>";
                    else echo "<h2 style='color:red; text-align:center;'>Bạn hãy điền thông tin hợp lệ</h2>"; 
                }
                else{
                    echo "<h2 style='color:red; text-align:center;'>Bạn hãy điền thông tin hợp lệ</h2>";
                }
                echo view('SignUpV');
            }
            else{
                $user = array(
                    'name' => $_POST['name'],
                    'username' => $_POST['username'],
                    'password' => md5($_POST['password']),
                    'email' => $_POST['email']
                    
                );
                $user_table = new User();
                $user_table->addUser($user);
                echo "<h2 style='color:red; text-align:center;'>Đăng kí tài khoản thành công</h2>";
                echo "<a href='SignInC'>Đăng nhập</a>";
            }
        }
        else echo view('SignUpV');
    }
}
?>