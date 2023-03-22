<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Recipe $model */

$this->title = $model->recipeId;
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recipe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'recipeId' => $model->recipeId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'recipeId' => $model->recipeId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'recipeId',
            'categoryId',
            'nameRecipe',
            'ingredient:ntext',
            'recipeDescription:ntext',
            'link:ntext',
            'dat',
            'photo:ntext',
        ],
    ]) ?>

</div>
