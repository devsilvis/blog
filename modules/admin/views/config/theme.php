<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\config\ThemeConfig */
/* @var $form ActiveForm */
?>
<div class="config-theme">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'site_theme') ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- config-theme -->
