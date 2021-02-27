<?php
namespace app\helpers;
use app\models\Product;
use Yii;
use app\models\Cart;
class CartHelper{
    public static $statusNew = 1;
    public static function getTotal(){
        $cart = new Cart;
        $products = $cart->getProducts();
        $total = 0;
        $productInCart = $cart->getProducts();

        if (is_array($productInCart)){
            $cartProducts = array_keys($cart->getProducts());
            $products = implode(',',$cartProducts);
            $product = new Product();
            $productList = $product->getCartProducts($products);
            foreach ($productList as $product){
                $total +=$product['price']*$productInCart[$product->id];
            }
        }
        return $total;
    }
}
