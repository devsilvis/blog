<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CategoryContent */

$this->title = 'Create Category Content';
$this->params['breadcrumbs'][] = ['label' => 'Category Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
