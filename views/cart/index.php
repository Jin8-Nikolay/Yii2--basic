
<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Корзина');
$totalPrice = 0; ?>
<?php if (count($products) > 0): ?>
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="cart-title mt-50">
                        <h2><?php echo $this->title ?></h2>
                    </div>

                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th></th>
                                <th><?php echo Yii::t('app', 'Ім\'я') ?></th>
                                <th><?php echo Yii::t('app', 'Ціна') ?></th>
                                <th><?php echo Yii::t('app', 'Кількість') ?></th>
                                <th><?php echo Yii::t('app', 'Видалити') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td class="cart_product_img">
                                        <a href="#"><img
                                                    src="<?php echo Yii::$app->request->baseUrl ?>/img/bg-img/cart1.jpg"
                                                    alt="Product"></a>
                                    </td>
                                    <td class="cart_product_desc">
                                        <h5><?php echo $product->header ?></h5>
                                    </td>
                                    <td class="price">
                                        <span><?php echo $product->price ?><?php echo Yii::$app->params['currency'] ?></span>
                                    </td>
                                    <td class="qty">
                                        <div class="qty-btn d-flex">
                                            <p><?php echo Yii::t('app', 'Кіл.') ?></p>
                                            <div class="quantity">
                                                <?php echo Html::a('<i class="fa fa-minus" aria-hidden="true"></i>', Url::to(['/cart/remove', 'id' => $product->id]), ['class' => 'qty-minus']) ?>
                                                <input type="number" class="qty-text" id="qty" step="1" min="1" max="300"
                                                       name="quantity" value="<?php echo $productInCart[$product->id] ?>">
                                                <?php echo Html::a('<i class="fa fa-plus" aria-hidden="true"></i>', Url::to(['/cart/add', 'id' => $product->id]), ['class' => 'qty-plus']) ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="">
                                        <?php echo Html::a('<i class="fa fa-remove" aria-hidden="true"></i>', Url::to(['/cart/delete', 'id' => $product->id]), ['class' => 'qty-minus']) ?></td>
                                </tr>
                                <?php $totalPrice += $productInCart[$product->id] * $product->price; ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5><?php echo Yii::t('app','Загальна вартість')?></h5>
                        <ul class="summary-table">
                            <li><span><?php echo Yii::t('app','Сума')?>:</span>
                                <span><?php echo $totalPrice?><?php echo Yii::$app->params['currency'];?></span></li>
                            <li><span><?php echo Yii::t('app','Доставка')?>:</span>
                                <span><?php echo Yii::t('app','Безкоштовно')?></span></li>
                            <li><span><?php echo Yii::t('app','Всього')?>:</span>
                                <span><?php echo $totalPrice?><?php echo Yii::$app->params['currency'];?></span></li>
                        </ul>
                        <div class="cart-btn mt-100">
                            <a href="cart.html" class="btn amado-btn w-100">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <h2>Cart empty</h2>

    <?php echo Html::beginForm(Url::to(['/cart/clear'])); ?>
    <?php echo Html::submitButton('Clear cart') ?>
    <?php echo Html::a('Checkout', Url::to(['/cart/checkout'])) ?>
    <?php echo Html::endForm() ?>

<?php endif; ?>