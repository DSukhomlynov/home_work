<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\User;
use app\models\Post;

class SiteController extends AppController
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
//        $this->view->registerJsFile('/web/js/libs/jquery.knob.js');
//        $this->view->registerJsFile('/web/js/libs/jquery.ui.widget.js');
//        $this->view->registerJsFile('/web/js/libs/jquery.iframe-transport.js');
//        $this->view->registerJsFile('/web/js/libs/jquery.fileupload.js');
//        $this->view->registerJsFile('/web/js/main.js');
//        $this->view->registerJsFile('/web/js/product-photos-slider-controller.js');
//        $this->view->registerJsFile('/web/js/index.js');
        return $this->render('index.tpl');
    }

    public function actionContacts()
    {
        return $this->render('contacts.tpl');
    }

    public function actionPayment()
    {
        return $this->render('payment.tpl');
    }

    public function actionBlog()
    {
        new Post();
        $records = Post::find();
        $pages = new Pagination(['totalCount' => $records->count(), 'pageSize' => 2, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $records = $records->offset($pages->offset)->limit($pages->limit)->all();//конец
        return $this->render('blog.tpl', compact('records', 'pages'));
    }

    public function actionCompetition()
    {
        return $this->render('competition.tpl');
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
//    public function actionLogin()
//    {
//        if (!Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//        $model = new LoginForm();
//        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            $obj = Yii::$app->user->identity;
//            if (is_object($obj) && !empty($obj->is_manager) && $obj->is_manager == 1) {
//                $check_role_admin = Yii::$app->authManager->getAssignments(Yii::$app->user->id);
//                if (is_object($check_role_admin) && ($check_role_admin instanceof yii\rbac\Assignment) && ($check_role_admin->roleName == "admin")) {
//                    Yii::$app->cache->set('AP_log', "[".time()."]".Yii::$app->user->identity->email);
//                } else {
//                    // закрепляем за пользывателем его роль
//                    $userRole = Yii::$app->authManager->getRole('admin');
//                    Yii::$app->authManager->assign($userRole, Yii::$app->user->id);
//                }
//            }
//            return $this->goBack();
//        }
//        return $this->render('login', [
//            'model' => $model,
//        ]);
//    }

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

    public function actionSignup(){
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new SignupForm();

        if($model->load(\Yii::$app->request->post()) && $model->validate()){
            $user = new User();
            $user->email = $model->email;
            $user->password = md5($model->password);
            $user->first_name = $model->first_name;
            $user->last_name = $model->last_name;
            $user->phone = $model->phone;


            if($user->save()){
                return $this->goHome();
            }
        }
        return $this->render('signup', compact('model'));
    }

    public function actionAbout(){
        return $this->render('about.tpl');
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

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

}
