<?php

namespace App\Http\Controllers\Album;

//use Illuminate\Http\Request;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{	 
	/**
	 * 展示纪念册
	 * @return  数据库中所有纪念册的结果集
	 */
    public function displayAlbum(){
		if(!isset($_SESSION)){
			session_start();
		}
        $curName = $_SESSION['userName'];
    	$resSet = \DB::table('albums')->where('user_name', $curName)->get();
    	return $resSet;
    }

    /**
     * 创建纪念册
     */
    public function addAlbum(){
		if(!isset($_SESSION)){
			session_start();
		}
    	$uid = $_SESSION['userId'];
        $uname = $_SESSION['userName'];

        $albumName = $_POST['aName'];
        $authorName = $_POST['aAuthor'];
        $motto = $_POST['aCover'];
        $description = $_POST['aDesc'];
        $catNum = $_POST['catNum'];

        $tempPath="";
        $file = Request::file('fileUpload');
        $lenth = count($file);

        for ($i = 0; $i < $lenth; $i++) {
            if ($file[$i]!= null) {
                $clientName = $file[$i]->getClientOriginalName();
                $tmpName = $file[$i]->getFileName();
                $realPath = $file[$i]->getRealPath();
                //$extension = $file[$i]->getClientOriginalExtension();
                //$mimeTye = $file[$i]->getMimeType();
                // //$newName = md5(date('ymdhis') . $clientName) . "." . $extension;
                $newName = $clientName;
                $path = $file[$i]->move(public_path() . '/uploads/album', $newName);
                $tempPath = $tempPath . "/uploads/album/" . $newName . ";";
                
            }
            
        }

        // var_dump($file);
        // echo "#".$tempPath."#";

        if($tempPath == "" || $tempPath == null){
            $tempPath = "/images/defaultBack.jpg;";
        }
        

        $name = \DB::table('users')->where('id', $uid)->pluck('name');

    	$eid = \DB::table('albums')
	        ->insertGetId(
	            array(
	                'user_name' => $name[0],
	                'category' => $catNum,
	                'name' => $albumName,     
	                'author_name' => $authorName, 
	                'motto' => $motto,
	                'description' => $description,
	                'saving_path' => $tempPath       
	            )
	        );

        
        //return ".";
    	return \Redirect::intended('/showAlbums');

        //return $file123;
    }

    public function test(){
        $file123 = Request::file('fileUpload');
		$lenth = count($file123);
        // $tmpName = $file123[0]->getFileName();
		echo "asfsaf";
        \DB::table('albums')
            ->update(['description' => $lenth]);
            
        return $lenth;
    }

    /**
     * 获得当前纪念册的信息
     * @return 若当前存在纪念册编号 则返回当前纪念册的信息数组
     *         若不存在 返回false 
     */
    public function getCurAlbumInfo(){
		if(!isset($_SESSION)){
			session_start();
		}
    	if($_SESSION['curAlbum'] == 0){
    		return "false";
    	}else{
    		$res = \DB::table('albums')
    			->where('id', $_SESSION['curAlbum'])
    			->get();
    		return $res;
    	}
    }

    /**
     * 更新纪念册信息
     * @return 成功信息
     */
    public function updateAlbum(){
		if(!isset($_SESSION)){
			session_start();
		}
        $sss = $_SESSION['curAlbum'];
    	$uid = $_SESSION['userId'];
    	$category = $_GET['category'];
    	$albumName = $_GET['albumName'];
    	$authorName = $_GET['authorName'];
    	$motto = $_GET['motto'];
    	$description = $_GET['description'];


    	\DB::table('albums')
    		->where('id', $sss)
    		->update(
                array(
                    'category' => $category, 
                    'name' => $albumName,
                    'author_name' => $authorName,
                    'motto' => $motto,
                    'description' => $description
                )
            );
    	
        return "success";
    }

    /**
     * 删除纪念册
     * @return 成功信息
     */
    public function deleteAlbum(){
		if(!isset($_SESSION)){
			session_start();
		}
        $sss = $_GET['albumId'];
        
        \DB::table('albums')
            ->where('id', $sss)
            ->delete();

        $_SESSION['curAlbum'] = 0;

        return "success";
    }

    /**
     * 设置当前纪念册id以便进入纪念册获取数据
     * @return 成功信息
     */
    public function showAlbum(){
		if(!isset($_SESSION)){
			session_start();
		}
        $albumId = $_GET['albumId'];
        $_SESSION['curAlbum'] = $albumId;
        return "success";
    }


	public function albumInfo(){
		if(!isset($_SESSION)){
			session_start();
		}
		$albumId = $_SESSION['curAlbum'];
		$resset = \DB::table('albums')
            ->where('id', $albumId)
            ->get();
		return $resset;
		//  return $albumId;
	}
}
