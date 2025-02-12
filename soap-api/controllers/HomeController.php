<?php

namespace app\controllers;

use yii\web\Controller;

use app\models\wowsoap\Wowsoap;

class HomeController extends Controller
{

    public function actionIndex()
    {
        $model = new Wowsoap();
 
        $return = $model->help();
        return $this->success($return);

	}

    public function actionTest()
    {
        return $this->error('100',"系统测试中.............");
		//$a = new BaseWowsoap;
        //$return = $a->help();
        //return $this->success($return);
	}

public function error($code,$msg){
    if(is_array($msg)){
        $msg = json_encode($msg,JSON_UNESCAPED_UNICODE);
    }
    $return = [
        "code"=>$code,
        "msg"=>$msg,
        "data"=>[],
    ];
    print_r(json_encode($return,JSON_UNESCAPED_UNICODE));
    exit;
}


    public function success($data=''){
        $return = [
            "code"=>0,
            "msg"=>"成功",
            "data"=>$data,
        ];
        print_r(json_encode($return,JSON_UNESCAPED_UNICODE));
        exit;
    }
    
}
