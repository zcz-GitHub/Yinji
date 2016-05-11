<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Template;
use App\Order;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CpyController extends Controller
{
    /**
     * 获取所有订单
     * @return 所有订单
     */
    public function getOrders(){
        return Order::all();
    }

    /**
     * 删除订单
     * @return int
     */
    public function deleteOrder(){
        $orderId = $_GET['id'];
        if (Order::where('id',$orderId)->delete())
            return 1;
        else return 0;
    }

    /**
     * 编辑订单状态
     * @return int
     */
    public function editOrder(){
        $id = $_GET['id'];
        $quantity = $_GET['quantity'];
        $price = $_GET['price'];
        $status = $_GET['status'];
        $address = $_GET['address'];
        $comment = $_GET['comment'];
        if (Order::where('id',$id)->update(array(
            'quantity'=>$quantity,
            'price'=>$price,
            'status'=>$status,
            'address'=>$address,
            'comment'=>$comment
        )))
            return 1;
        else return 0;
    }


    /**
     * 上传公司模板到服务器，同时在数据库中新增数据
     * @return mixed
     */
    public function uploadTemplate(){


        $path = app_path()."\\..\\public\\company\\template\\".$_SESSION['userName'].'\\';
        if (!empty($_FILES)){
            //得到上传文件的临时流
            $tempFile = $_FILES['file_data']['tmp_name'];
            //得到文件原名
            $fileName = iconv("UTF-8","GB2312",$_FILES['file_data']['name']);
            $fileParts = pathinfo($_FILES['file_data']['name']);
            //保存服务器地址，若不存在该文件夹，则新建
            if (!is_dir($path))
                mkdir($path,0777,true);

            //往templates表中新增数据
            $author_name = $_SESSION['userName'];
            $saving_path = "company\\template\\".$_SESSION['userName'].'\\'.$fileName;
            $info = array('response'=>0);
            if ($this->addTemplate($fileName,$author_name,$saving_path,"没有描述")){
                //成功往数据库添加数据之后才把图片保存到硬盘，这样可以防止重名
                $info = array('response'=>$author_name);
                if (move_uploaded_file($tempFile,$path.$fileName)){
                    $info = array('response'=>1);
                }
            }


            return json_encode($info);
        }
    }

    /**
     * 添加模板
     * @param $template_name 模板名称
     * @param $author_name 作者名称
     * @param $saving_path 模板保存路径
     * @param $description 模板描述
     *
     * @return 是否添加模板成功
     */
    public function addTemplate($template_name,$author_name,$saving_path,$description){
        try{
            $result = Template::create(
                array(
                    'template_name'=>$template_name,
                    'author_name'=>$author_name,
                    'saving_path'=>$saving_path,
                    'description'=>$description
                ));
            if ($result != null)
                return true;
            else return false;
        }catch(QueryException $e){
            return false;
        }

    }


    /**
     * 获取所有模板
     * @return 返回所有的模板
     */
    public function getTemplates(){
        return Template::all();
    }

    /**
     * 删除某个模板
     * @return 是否删除成功
     */
    public function deleteTemplate(){
        $name = $_GET['name'];
        if (Template::where('template_name',$name)->delete())
            return 1;
        else return 0;
    }


}
