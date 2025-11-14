<?php

namespace app\controllers;

use app\bases\CaptchaNumbers;
use app\models\Contacts;
use app\models\Realty;
use app\models\RealtySearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => CaptchaNumbers::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'default';
        return $this->render('index');
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'default';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        $timeout = Yii::$app->session->get('timeout', 0);
        $now = time();
        $dif = $now - $timeout;

        if ($dif > 60 && $model->load(Yii::$app->request->post()) && $model->login()) {
            $user = Yii::$app->user->identity;
            $user->last_login_date = date('Y-m-d H:i:s');
            $user->save(false);
            Yii::$app->session->setFlash('success', 'Bem vindo administrador!');
            return $this->redirect(['realty/index']);
        }

        if ($dif < 60) {
            Yii::$app->session->setFlash('warning', 'Acesso bloqueado temporariamente por excesso de erros.');
        }

        $model->password = '';
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
        Yii::$app->session->setFlash('info', 'Obrigado por utilizar nosso sistema.');
        return $this->goHome();
    }

    public function actionSearch()
    {
        $this->layout = 'default';
        $searchModel = new RealtySearch();
        $dataProvider = $searchModel->search($this->request->post());


//        if ($this->request->isPost) {
//            Yii::$app->params['debug']($this->request->post());
//            return null;
//        }

        return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $this->layout = 'default';
        $model = Realty::findOne($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $this->layout = 'default';
        $model = new Contacts();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
