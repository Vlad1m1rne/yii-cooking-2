<?

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="container text-center">

  <? if (Yii::$app->session->hasFlash('errorAdd')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= Yii::$app->session->getFlash('errorAdd') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <? endif; ?>

</div>

<? $this->beginBlock('block1') ?>
<div class="container text-center">
  <h3>Добавить рецепт</h3>
</div>
<? $this->endBlock() ?>

<div class="container text-center">

  <? $form = ActiveForm::begin(['options' => ['id' => 'add-form']]) ?>
  <?= $form->field($model, 'photo')->fileInput()->label('Фото') ?>
  <?= $form->field($model, 'categoryId')->label('Категория')->dropDownList([1 => 'Первые блюда', 2 => 'Вторые блюда', 3 => 'Салаты', 4 => 'Выпечка', 5 => 'Другое']) ?>
  <?= $form->field($model, 'nameRecipe')->input('text', ['required' => 'required'])->label('Название рецепта')  ?>
  <?= $form->field($model, 'ingredient')->label('Ингредиенты')->textArea(['rows' => 3, 'required' => 'required']) ?>
    <?= $form->field($model, 'recipeDescription')->label('Рецепт')->textArea(['rows' => 4, 'required' => 'required']) ?>
  <?= $form->field($model, 'link')->label('Ссылка на рецепт') ?>
    <? if (!Yii::$app->user->isGuest) : ?>
    <?= Html::submitButton('Добавить рецепт', ['class' => 'btn btn-success btnM']) ?>
  <? endif; ?>
  <? if (Yii::$app->user->isGuest) : ?>
    <button class='btn btn-success btnM' disabled>Авторизуйтесь!</button>
  <? endif; ?>
  <? ActiveForm::end() ?>


</div>