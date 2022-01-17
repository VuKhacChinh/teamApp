<?php namespace App\Models;
use CodeIgniter\Model;

class Math extends Model
{

    public function countArray($array){
        $count = 0;
        foreach($array as $e){
            $count = $count + 1;
        }
        return $count;
    }
}