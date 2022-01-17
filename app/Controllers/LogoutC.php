<?php namespace App\Controllers;

class LogoutC extends BaseController
{
    public function index(){
        session_start();
        unset($_SESSION['iduser']);
        unset($_SESSION['name']);
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        return redirect()->to('SignInC');
    }
}
?>