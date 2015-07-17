<?php
/* 
 * Created on 2014��3��16��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 require_once "../Path.php";
 
 
 class UploadHandler{
 	
 	protected $fileObject;
 	protected $options = array(
 		'max_image_size' => '200000',
 		'max_js_size' => '200000',
 		'path' => PHP_MODULES_DIR,
 		'upload_path' => UPLOAD_TMP_DIR,
 		'domain' => 'xssrat'
 	);
 	protected $messages = array(
 		'0' => 'File is empty',
 		'1' => 'File type error',
 		'2' => 'File size too large',
 		'3' => 'Can`t save file',
 		'4' => 'File not exist',
 		'5' => 'Can`t open file',
 		'6' => 'Failed delete file'
 	);
 	protected $imageType = '/\.(gif|jpe?g|png)$/i';
 	protected $jsType = '/\.js$/i';
 	
 	function __construct($options=null){
 		if($options!=null){
 			$this->options = $options;
 		}
 		
 	}
 	
 	public function Save($file,$fileType){
 		$res = $this->Validate($file,$fileType);
 		if($res['result']) {
	 		$file_name = md5($file['name'].uniqid()).$res['reason'];
			//sae upload
			$s = new SaeStorage();
	 		$save_path = SAE_MODULES.'/'.$file_name;
			$save = $s->upload(SAE_STORAGE_DOMAIN,$save_path,$file["tmp_name"]);
			if($save!==false){
				$res['reason'] = $file_name;
			}else{
	 			$res['result'] = false;
	 			$res['reason'] = $this->messages['3'];
	 		}
 		}
 		return $res;
 	}
 	
 	public function Delete($fileName){
 		$res = array(
 			'result' => false,
 			'reason' => ''
 		);
 		$file_path =  SAE_MODULES.'/'.$fileName;
 		$s = new SaeStorage();
 		if($s->fileExists(SAE_STORAGE_DOMAIN,$file_path)){
 			if($s->delete(SAE_STORAGE_DOMAIN,$file_path)){
 				$res['result'] = true;
 				$res['reason'] = $fileName;
 			}else{
 				$res['reason'] = $this->messages['6'];
 			}
 		}else $res['reason'] = $this->messages['4'];
 	
 	}
 	
 	public function Validate($file,$fileType){
 		$res = array('result'=>false,'reason'=>'');
 		if($file!==null){
 			if($file['error']>0){
 				$res['reason'] = $this->codeToMessage($file['error']);
 			}else{
 				if($fileType=='js'){
 					if($file['size']>$this->options['max_js_size']){
 						$res['reason'] = $this->messages['2'];
 					}else{
 						if(preg_match($this->jsType,$file['name'],$matches)){
 							$res['result'] = true;
 							$res['reason'] = $matches[0];
 						}else{
 							$res['reason'] = $this->messages['1'];
 						}
 					}
 					
 				}
 				if($fileType=='image'){
 					if($file['size']>$this->options['max_image_size']){
 						$res['reason'] = $this->messages['2'];
 					}else{
 						if(preg_match($this->imageType,$file['name'],$matches)){
 							$res['result'] = true;
 							$res['reason'] = $matches[0];
 						}else{
 							$res['reason'] = $this->messages['1'];
 						}
 					} 					
 					
 				}
 				
 			}
 		}else{
 			$res['reason'] = $this->messages['0'];
 		}
 		return $res;
 	}
 	
 	private function codeToMessage($code)
    {
        switch ($code) {
            case UPLOAD_ERR_INI_SIZE:
                $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                break;
            case UPLOAD_ERR_PARTIAL:
                $message = "The uploaded file was only partially uploaded";
                break;
            case UPLOAD_ERR_NO_FILE:
                $message = "No file was uploaded";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $message = "Missing a temporary folder";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $message = "Failed to write file to disk";
                break;
            case UPLOAD_ERR_EXTENSION:
                $message = "File upload stopped by extension";
                break;

            default:
                $message = "Unknown upload error";
                break;
        }
        return $message;
    } 
 	
 	
 	
 }
 
?>
