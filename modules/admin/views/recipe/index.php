<?php

use app\modules\admin\models\Recipe;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\RecipeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Recipes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recipe', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'recipeId',
            'categoryId',
            'nameRecipe',
            'ingredient:ntext',
            'recipeDescription:ntext',
            //'link:ntext',
            //'dat',
            //'photo:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Recipe $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'recipeId' => $model->recipeId]);
                 }
            ],
        ],
    ]); ?>


</div>
