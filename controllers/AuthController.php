<?php

namespace app\controllers;

use app\models\LoginForm;
use yii\helpers\Url;
use Yii;
use yii\web\Controller;
use app\models\SignupForm;

class AuthController extends Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionSignup(){
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())&& $model->signup()){
            Yii::$app->session->setFlash('success','Thank you for registration.');
            return $this->redirect(Url::to(['auth/login']));
        }
        return $this->render('signup',[
            'model'=>$model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}

?>