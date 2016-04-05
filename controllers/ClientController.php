<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class ClientController extends Controller
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
	public function actionIndex()  
	{  
	    return $this->render('index');  
	} 
    public function actionAdd()  
    {  
        return $this->render('add');  
    } 
    public function actionList()  
    {  
        return $this->render('list');  
    } 
    public function actionLife()  
    {  
        return $this->render('life');  
    }
    public function actionCompose()  
    {  
        return $this->render('compose');  
    } 
    public function actionData()  
    {  
        return $this->render('data');  
    } 
    public function actionManager()  
    {  
        return $this->render('manager');  
    } 
    public function actionWork()  
    {  
        return $this->render('work');  
    }  
     public function actionTool()  
    {  
        return $this->render('tool');  
    }  
}