<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use Receivemail;
use yii\data\Pagination;


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
        return $this->render('inbox');
    }
    public function actionCompose()
    {
        return $this->render('compose');
    }
    public function actionMessage()
    {
        $host = 'imap.qq.com';
        $mail='yangjunalns@qq.com'; 
        $password = 'jxbqtbonmoobbejd';
        $port = '993';
        $array = [];
        $obj= new receiveMail($host,$mail,$password,'imap',$port,true,false);

        $obj->connect(); 

        if($obj->is_connected()){
            $request = Yii::$app->request;
            $i = $request->get('id'); 
            $head = $obj->get_email_header($i);
            $content = $obj->get_email_body($i); 
            // $arrFiles=$obj->get_attachments($i,"./"); 
                                
            return $this->render('message',[
                    'head'=>$head,
                    'content'=>$content,
                    'id'=>$i
                    // 'arrFiles'=>$arrFiles
                ]);
        }
        $obj->close_mailbox(); 
    }
    public function actionDelete(){
        
        $host = 'imap.qq.com';
        $mail='yangjunalns@qq.com'; 
        $password = 'jxbqtbonmoobbejd';
        $port = '993';
        $array = [];
        $obj= new receiveMail($host,$mail,$password,'imap',$port,true,false);

        $obj->connect(); 

        if($obj->is_connected()){
            $request = Yii::$app->request;
            $id = $request->get('id'); 
            $obj->delete_email($id); 
            $this->redirect('index.php?r=mail/inbox');
        }
        $obj->close_mailbox(); 
    }
    /*数据处理--JSON数据*/
    public function actionProcessing(){
        $host = 'imap.qq.com';
        $mail='yangjunalns@qq.com'; 
        $password = 'jxbqtbonmoobbejd';
        $port = '993';
        $array = [];
        $obj= new receiveMail($host,$mail,$password,'imap',$port,true,false);
        $obj->connect(); 
        if($obj->is_connected()){
            $pageSize = 20;     /*每页数量*/
            $request = Yii::$app->request;
            
            $offset = $request->get('offset');  /*获取传递过来的偏移量*/
            if($offset==null){
                $offset = 0;
            }
            $total = $obj->get_total_emails();  /*总共邮件数量*/
            $unread = $obj->get_unread_emails();    /*未读邮件数量*/

            $currpage = $total-$offset*$pageSize;   /*当前的总量*/
            
            for($i=$currpage;$i>$currpage-$pageSize;$i--){
                $head = $obj->get_email_header($i);
                $array[$i] = $head;
            }
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $items = [
                'data'=>$array,
                'total'=>$total,
                'unread'=>$unread,
                'offset'=>$offset,
                'currpage'=>$currpage
                ];
            return $items;
        }
        $obj->close_mailbox(); 
    }
}
