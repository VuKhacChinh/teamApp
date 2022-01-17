<?php namespace App\Models;
use CodeIgniter\Model;

class Notification extends Model
{

    public function getNumOfNotificationById($iduser){
        $db = \Config\Database::connect();
        $builder = $db->table('notification');
        $condition = array(
            'iduser2' => $iduser,
            'state' => 1
        );
        $builder->where($condition);
        $result = $builder->countAllResults(false);
        return $result;
    }

    public function addNotification($notification){
        $db = \Config\Database::connect();
        $builder = $db->table('notification');
        $builder->insert($notification);
    }

    public function setStateNotification($idnotification){
        $db = \Config\Database::connect();
        $builder = $db->table('notification');
        $builder->where('idnotification',$idnotification);
        $change = array(
            'state' => 0
        );
        $builder->update($change);
    }

    public function getNotifications($iduser){
        $db = \Config\Database::connect();
        $builder = $db->table('notification');
        $builder->join('users','notification.idcmtuser=users.iduser');
        $builder->join('group','notification.idgroup=group.idgroup');
        $builder->where('idownuser',$iduser);
        $builder->orderBy('idnotification','desc');
        $query = $builder->get();
        $result = $query->getResult();
        return $result;
    }

    public function viewNotification($iduser){
        $db = \Config\Database::connect();
        $builder = $db->table('notification');
        $builder->where('idownuser', $iduser);
        $builder->update(['view' => 1]);
    }
}
