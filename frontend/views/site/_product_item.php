<?php

/**
 * User: MadarasiD
 * Date: 2025/11/16
 * Time: 18:37
 */

use yii\helpers\StringHelper;

/** @var \common\models\Produtcs $model */
?>


    <div class="card h-100">
        <!-- Product image-->
        <img class="card-img-top" src="<?php echo $model->getImageUrl() ?>" alt="..." />
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder"><?php echo $model->name ?></h5>
                <!-- Product price-->
                <?php echo $model->price ?>

                <div class="card-text">
                    <?php echo $model->getShortDescription() ?>
                </div>
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?php echo $model->name ?>">Bővebben</a></div>
        </div>
    </div>
