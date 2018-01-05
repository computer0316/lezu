<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Article;
use app\models\Tools;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
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

    /**
     * @inheritdoc
     */
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

	// 这些变量用于向 layout 传值
	public $indexLi;
	public $aboutLi;
	public $newLi;
	public $newsLi;
	public $recruitLi;
	public $contactLi;

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
		if(Tools::isMobile() == true){
			return $this->redirect("http://www.lflezu.cn/mobile");
		}
		else{
			$this->indexLi = 'active';
        	return $this->render('index');
        }
    }

    public function actionAbout(){
    	$this->aboutLi = 'active';
    	return $this->render('about');
    }

    public function actionNew(){
    	$this->newLi = 'active';
    	return $this->render('new');
    }

    public function actionNews(){
    	$this->newsLi = 'active';
    	$articleList = Article::find()->orderBy('id desc')->all();
    	return $this->render('news', ['articles' => $articleList]);
    }

    public function actionShow($id){
    	return $this->render('show', ['id' => $id]);
    }

    public function actionRecruit(){
    	$this->recruitLi = 'active';
    	return $this->render('recruit');
    }

    public function actionContact(){
    	$this->contactLi = 'active';
    	return $this->render('contact');
    }



    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }



}
