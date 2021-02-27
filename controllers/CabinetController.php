<?php


namespace app\controllers;
use app\models\OrderItem;
use app\models\UserToOrder;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\EditForm;

class CabinetController extends Controller
{
    public function actionIndex(){

        $order = new UserToOrder();
        $orders = $order->getOrderList();
        return $this->render('index',compact('orders'));
    }

    public function actionEdit(){
        $modelUser = new EditForm();
        $model = $modelUser->findUser();
        if ($modelUser->load(Yii::$app->request->post())){
            $modelUser->edit();
            return $this->redirect(Url::to(['/cabinet']));
        }
        return $this->render('edit',compact('model'));
    }

    public function actionItems($id){
        $items = OrderItem::find()->where(['order_id'=>$id])->all();
        return $this->render('items',compact('items'));

    }

}

