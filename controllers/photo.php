<?php

class Controller_Photo extends Controller_Base {

    function index() {
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        
        $this->stat->saveStat($idu, "photo/index");
        
        if ($idu > 0) {
            $this->template->view('index', true);
        } else {
            unset($_SESSION['idu']);
            header('Location:' . WEB_APP);
        }
    }

    function upload() {
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        
        $this->stat->saveStat($idu, "photo/upload");
        
        if ($idu > 0) {
            if (isset($_FILES['add-photo'])) {
//                 var_dump($_FILES['add-photo']);
                
                $tmpFile = $_FILES['add-photo']['tmp_name'];
                $info = getimagesize($tmpFile);
                
                $width = $info[0];
                $height = $info[1];
                $mime = $info['mime'];
                
                if ($width != null && $height != null) {
                    $md = md5(time());
                    $path = rtrim(LOCAL_DIR_PHOTO, '/\\') . '/';
                    
                    $dir = $path . $idu . '/';
                    if (!is_dir($dir)) {
                        mkdir($dir, 0777, true);
                    }
                    
                    $fileName = $idu . '/' . $md . '.jpg';
                    $fileFullPath = $path . $fileName;
                    
                    if ($mime == 'image/jpeg')
                        $image = imagecreatefromjpeg($tmpFile);
                    if ($mime == 'image/png')
                        $image = imagecreatefrompng($tmpFile);
                    
                    if (isset($image)) {
                        $side = min($width, $height);
                        $rect = array('x' => 0, 'y' => 0, 'width' => $side, 'height' => $side);
                        
                        $imageThumb = imagecreatetruecolor(PHOTO_SIZE, PHOTO_SIZE);
                        $image = imagecrop($image, $rect);
                        imagecopyresampled($imageThumb, $image, 0, 0, 0, 0, PHOTO_SIZE, PHOTO_SIZE, $side, $side);
                        imagejpeg($imageThumb, $fileFullPath, 80);
                        
                        $model = new Model_Profile();
                        $model->uploadPhoto($idu, $fileName);
                        
                        imagedestroy($image);
                        imagedestroy($imageThumb);
                    } else {
                        header('Location:' . WEB_APP . '/photo/');
                        return;
                    }
                } else {
                    header('Location:' . WEB_APP . '/photo/');
                    return;
                }
            }
            header('Location:' . WEB_APP . '/profile/');
        } else {
            unset($_SESSION['idu']);
            header('Location:' . WEB_APP);
        }
    }
}