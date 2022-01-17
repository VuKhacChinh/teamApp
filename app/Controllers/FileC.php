<?php
namespace App\Controllers;
use App\Models\File;

class FileC extends BaseController{
    public function index(){
        $idgroup = $_GET['idgroup'];
        $file_obj = new File();
        $files = $_FILES['fileupload'];
        $name = $files['name'];
        $tmp_name = $files['tmp_name'];
        $sizes = $files['size'];      
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($name);
        $allowUpload = true;

        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $maxfilesize = 5 * 1024 * 1024;
        $allowtypes = array('pdf' , 'ppt' , 'docx' , 'txt', 'xlsx' );

        // If the file already exists, don't upload it anymore 
        if(file_exists($target_file)) {
            $allowUpload = false;
        }

        // File format error not allowed 
        if(!in_array($imageFileType , $allowtypes)) {
            $allowUpload = false;
        }

        // Check: Upload file successfully 
        if($allowUpload)
        {
            if (move_uploaded_file($tmp_name , $target_file)) {
                
                settype($idgroup,'int');
                $file = array(
                    'filepath' => basename($name),
                    'idgroup' => $idgroup
                );
                $file_obj->addFile($file);
            }
        }
        $data['files'] = $file_obj->getFile($idgroup);
        return view('FileV',$data);
    }
}
?>