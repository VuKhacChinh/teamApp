<?php
namespace App\Controllers;
use App\Models\Notification;

class NotificationC extends BaseController{
    public function index(){
        session_start();
        $notification_obj = new Notification();
        $data['notifications'] = $notification_obj->getNotifications($_SESSION['iduser']);
        $notification_obj->viewNotification($_SESSION['iduser']);
        return view('NotificationV',$data);
    }
}