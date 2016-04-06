<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use Receivemail;

class MailController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionInbox(){
       
        $host = 'imap.qq.com';
        $mail='yangjunalns@qq.com'; 
        $password = 'jxbqtbonmoobbejd';
        $port = '993';
        $array = [];
        $obj= new receiveMail($host,$mail,$password,'imap',$port,true,false);
        $total = $obj->get_total_emails();
        $unread = $obj->get_unread_emails();
        $obj->connect(); 
        if($obj->is_connected()){
            $tot = $obj->get_total_emails(); 
            $unread = $obj->get_unread_emails();
            for($i=100;$i>90;$i--){
                $head = $obj->get_email_header($i);
                $array[$i] = $head;
            }
            return $this->render('inbox',[
                    'array'=>$array,
                    'total'=>$total,
                    'unread'=>$unread,
                ]);
        }
        $obj->close_mailbox(); 
    }
    public function actionCompose()
    {
        return $this->render('compose');
    }
    public function actionMessage()
    {
        return $this->render('message');
    }
}
