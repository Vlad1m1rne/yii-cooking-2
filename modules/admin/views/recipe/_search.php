<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\RecipeSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="recipe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'recipeId') ?>

    <?= $form->field($model, 'categoryId') ?>

    <?= $form->field($model, 'nameRecipe') ?>

    <?= $form->field($model, 'ingredient') ?>

    <?= $form->field($model, 'recipeDescription') ?>

    <?php // echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'dat') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
