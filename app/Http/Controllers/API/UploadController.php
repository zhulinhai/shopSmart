<?php namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tool\UUID;
use App\Entity\M3Result;

class UploadController extends Controller {

	/**
	 * @brief 上传文件
	 */
	 public function uploadFile(Request $request, $type)
	 {
	 	$width = $request->input("width", '');
		$height = $request->input("height", '');
		$m3_result = new M3Result();

		if( $_FILES["file"]["error"] > 0 )
		{
			$m3_result->status = 2;
			$m3_result->message = "未知错误, 错误码: " . $_FILES["file"]["error"];
			return $m3_result->toJson();
		}

        $file_size = $_FILES["file"]["size"];
            if ( $file_size > 1024*1024) {
                $m3_result->status = 2;
                $m3_result->message = "请注意图片上传大小不能超过1M";
                return $m3_result->toJson();
            }

            $public_dir = sprintf('/uploads/%s/%s/', $type, date('Ymd') );
            $upload_dir = public_path() . $public_dir;
            if( !file_exists($upload_dir) ) {
            mkdir($upload_dir, 0777, true);
        }
		// 获取文件扩展名
		$arr_ext = explode('.', $_FILES["file"]['name']);
		$file_ext = count($arr_ext) > 1 && strlen( end($arr_ext) ) ? end($arr_ext) : "unknow";
		// 合成上传目标文件名
		$upload_filename = UUID::create();
		$upload_file_path = $upload_dir . $upload_filename . '.' . $file_ext;
		if (strlen($width) > 0) {
			$public_uri = $public_dir . $upload_filename . '.' . $file_ext;
			$m3_result->status = 0;
			$m3_result->message = "上传成功";
			$m3_result->uri = $public_uri;
		} else {
			// 从临时目标移到上传目录
			if( move_uploaded_file($_FILES["file"]["tmp_name"], $upload_file_path) )
			{
			    $relative_uri = $public_dir . $upload_filename . '.' . $file_ext;
                $public_uri = config('app.url'). ':'.config('app.port') . $relative_uri;
                if ($type == 'images') {
                    $public_uri = $relative_uri;
                }

				$m3_result->status = 0;
				$m3_result->message = "上传成功";
				$m3_result->uri = $public_uri;
			}
			else
			{
				$m3_result->status = 1;
				$m3_result->message = "上传失败, 权限不足";
			}
		}

		return $m3_result->toJson();
	 }

    /*
    *功能：php完美实现下载远程图片保存到本地
    *参数：文件url,保存文件目录,保存文件名称，使用的下载方式
    *当保存文件名称为空时则使用远程文件原来的名称
    */
    public function getImage($url,$save_dir='',$filename='',$type=0){
        if(trim($url)==''){
            return array('file_name'=>'','save_path'=>'','error'=>1);
        }
        if(trim($save_dir)==''){
            $save_dir='./';
        }
        if(trim($filename)==''){//保存文件名
            $ext=strrchr($url,'.');
            if($ext!='.gif'&&$ext!='.jpg'){
                return array('file_name'=>'','save_path'=>'','error'=>3);
            }
            $filename=time().$ext;
        }
        if(0!==strrpos($save_dir,'/')){
            $save_dir.='/';
        }
        //创建保存目录
        if(!file_exists($save_dir)&&!mkdir($save_dir,0777,true)){
            return array('file_name'=>'','save_path'=>'','error'=>5);
        }
        //获取远程文件所采用的方法
        if($type){
            $ch=curl_init();
            $timeout=5;
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
            $img=curl_exec($ch);
            curl_close($ch);
        }else{
            ob_start();
            readfile($url);
            $img=ob_get_contents();
            ob_end_clean();
        }
        //$size=strlen($img);
        //文件大小
        $fp2=@fopen($save_dir.$filename,'a');
        fwrite($fp2,$img);
        fclose($fp2);
        unset($img,$url);
        return array('file_name'=>$filename,'save_path'=>$save_dir.$filename,'error'=>0);
    }
}
