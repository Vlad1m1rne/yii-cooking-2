<?
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<? $this->beginBlock('block1') ?>
<div class="container text-center">
  <h3>Изменить рецепт: <?=$model->nameRecipe  ?></h3>
</div>
<? $this->endBlock() ?>

<div class="container text-center">

<? $form = ActiveForm::begin(['options' => ['id' => 'upd-form']]) ?>
    <?= $form->field($model, 'recipeId')->label('ID')->input('text', ['class' => 'inpUpd', 'readonly' => '']) ?>
<? if($model->photoName):?>
    <?= $form->field($model, 'photo')->fileInput()->label('Заменить фото') ?>
    <? else: ?>
      <?= $form->field($model, 'photo')->fileInput()->label('Добавить фото') ?>
      <? endif; ?>

    <?= $form->field($model, 'categoryId')->label('Категория')->dropDownList([1 => 'Первые блюда', 2 => 'Вторые блюда', 3 => 'Салаты', 4 => 'Выпечка', 5 => 'Другое']) ?>
    <?= $form->field($model, 'nameRecipe')->input('text',['required'=>'required'])->label('Название рецепта')  ?>
    <?= $form->field($model, 'ingredient')->input('text',['required'=>'required'])->label('Ингредиенты') ?>
    <?= $form->field($model, 'recipeDescription')->label('Рецепт')->textArea(['rows' => 4,'required'=>'required']) ?>
    <?= $form->field($model, 'link')->label('Ссылка на рецепт') ?>
    <? if (!Yii::$app->user->isGuest): ?>
    <?= Html::submitButton('Изменить рецепт', ['class' => 'btn btn-success btnM']) ?>
<?endif;?>
<? if (Yii::$app->user->isGuest) : ?>
<button class='btn btn-success btnM' disabled>Авторизуйтесь!</button>
  <? endif; ?>
       <? ActiveForm::end() ?>


</div>
