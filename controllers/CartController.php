<?php

namespace app\controllers;

use app\helpers\CartHelper;
use app\helpers\UserHelper;
use app\models\Delivery;
use app\models\Order;
use app\models\OrderItem;
use app\models\Payment;
use app\models\Product;
use app\models\User;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\Cart;
use yii\web\HttpException;
use app\models\UserToOrder;
class CartController extends Controller
{

    public function actionIndex()
    {
        $productList = [];
        $cart = new Cart;
        $productInCart = $cart->getProducts();
        if(is_array($productInCart)) {
            $cartProducts = array_keys($cart->getProducts());
            $products = implode(',', $cartProducts);
            $product = new Product();
            $productList = $product->getCartProducts($products);
        }
        return $this->render('index', [
            'products' => $productList,
            'productInCart' => $productInCart
        ]);
    }

    public function actionCheckout(){
        $model = new Order;
        $cart = new Cart;
        $orderItem = new OrderItem;
        $userOrderModel = new UserToOrder;
        $productInCart = $cart->getProducts();
        $deliveryList = Delivery::getActive();
        $paymentList = Payment::getActive();
        if($model->load(Yii::$app->request->post())){
            if(!Yii::$app->user->isGuest){
                $model->user_id = Yii::$app->user->id;
            }
            $model->hash =Yii::$app->security->generateRandomString(255);
            $model->ip = UserHelper::getIpAddr();
            $model->system_info = UserHelper::getBrowser();
            $model->total = CartHelper::getTotal();
            $model->count = Cart::countProducts();
            $model->status = CartHelper::$statusNew;
            $model->save(false);
            $orderId = $model->id;
            if(!Yii::$app->user->isGuest){
                $userOrderModel->add(Yii::$app->user->id,$orderId);
            }
            if(is_array($productInCart)) {
                $cartProducts = array_keys($cart->getProducts());
                $products = implode(',', $cartProducts);
                $product = new Product();
                $productList = $product->getCartProducts($products);
                foreach ($productList as $product) {
                    $count = $productInCart[$product->id];
                    $total = $count * $product->price;
                    $orderItem->add($product, $orderId, $count, $total);
                }
                Cart::clear();
            }
            return $this->redirect(Url::to(['/cart/success', 'id' => $orderId]));
        }
        if(!Yii::$app->user->isGuest) {
            $user = $this->findUser();
            return $this->render('checkout-auth', compact('model', 'deliveryList', 'paymentList','user'));
        }
        else{
            return $this->render('checkout', compact('model', 'deliveryList', 'paymentList'));
        }
    }


    public function actionSuccess($id){
        $model = Order::findOne($id);
        if(!$model){
            throw  new HttpException(404, Yii::t('frontend','Order Not Found'));
        }
        return $this->render('success', ['model' => $model]);
    }

    public function actionAdd($id)
    {
        if (Yii::$app->request->isPost) {
            Cart::add($id);
        } else {
            Cart::add($id);
            return $this->goBack(Yii::$app->request->referrer);
        }
    }

    public function actionRemove($id)
    {
        if (Yii::$app->request->isPost) {
            Cart::remove($id);
        } else {
            Cart::remove($id);
            return $this->goBack(Yii::$app->request->referrer);
        }
    }

    public function actionDelete($id)
    {
        if (Yii::$app->request->isPost) {
            Cart::delete($id);
        } else {
            Cart::delete($id);
            return $this->goBack(Yii::$app->request->referrer);
        }
    }


    public function actionClear()
    {
        if (Yii::$app->request->isPost) {
            Cart::clear();
            return $this->goBack(Yii::$app->request->referrer);
        } else {
            Cart::clear();
        }
    }

    protected function findUser(){
        return User::findOne(Yii::$app->user->id);
    }
}

?>
