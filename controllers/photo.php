<?php

class Controller_Photo extends Controller_Base {

	function index() {
		$idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
		
		if ($idu > 0) {
			$this->template->view('index', true);
		} else {
			unset($_SESSION['idu']);
			header('Location:' . WEB_APP);
		}
	}

	function upload() {
		$idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
		
		if ($idu > 0) {
			
			if (isset($_FILES['add-photo'])) {
				var_dump($_FILES['add-photo']);
				
				$tmpFile = $_FILES['add-photo']["tmp_name"];
				
				$info = getimagesize($tmpFile);
				
				echo ("<BR>");
				print_r($info);
				
				
				list($width, $height, $mime) = getimagesize($tmpFile);
				if ($width == null && $height == null) {
					// header('Location:' . WEB_APP);
					return;
				} else {
					$fileName = 'c:/1.jpg';
					
					echo ("<BR>.mime:$mime");
					
					if ($mime == 'image/jpeg')
						$image = imagecreatefromjpeg($tmpFile);
					elseif ($mime == 'image/gif')
						$image = imagecreatefromgif($tmpFile);
					elseif ($mime == 'image/png')
						$image = imagecreatefrompng($tmpFile);
					
					echo ("<BR>.m:$image");
					
					$side = min($width, $height);
					// $side = min($side, 600);
					
					echo ("<BR>.side:$side");
					
					$rect = array('x' => 0, 'y' => 0, 'width' => $side, 'height' => $side);
					$image = imagecrop($image, $rect);
					echo ("<BR>.m:$image");
					
					imagejpeg($image, $fileName, 80);
					
					list($width, $height) = getimagesize($fileName);
					
					echo ("<BR>.w:$width");
					echo ("<BR>.h:$height");
					
					// $image = new Imagick("d:/develop/eclipse workspace/Eclipse PHP Learning/flirt/images/23.jpg");
					// // $image = new Imagick($tmpFile);
					
					// $image->thumbnailImage(400, 400);
					// $image->writeImage($fileName);
				}
			}
			
			// header('Location:' . WEB_APP . '/profile/');
		} else {
			unset($_SESSION['idu']);
			header('Location:' . WEB_APP);
		}
	
	}
}