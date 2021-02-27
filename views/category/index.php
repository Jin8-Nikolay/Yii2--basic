<?php
use yii\widgets\ListView;

?>

<div>
    <?php
    echo ListView::widget([
        'itemView'=>'_item',
        'dataProvider'=>$dataProvider,
        'layout'=>"{items}\n{summary}\n{pager}",
    ])
    ?>
</div>
