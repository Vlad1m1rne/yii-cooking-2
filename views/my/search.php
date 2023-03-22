<?
use app\components\TableWidget;
?>

<? $this->beginBlock('block1') ?>
<div class="container text-center">
  <h3>Результаты поиска.</h3>
  <h4>Вы искали: "<?=$_GET['searchVal']?>" в <? if($_GET['searchField']=='nameRecipe') echo "названиях.";
  elseif($_GET['searchField']=='recipeDescription') echo "рецептах.";
  elseif($_GET['searchField'] == 'ingredient') echo "ингредиентах.";
  ?>
</h4>
</div>
<? $this->endBlock() ?>

<? $this->beginBlock('block2') ?>
<div class="container text-center img">
  <img id='mainImg' class="mainImg img-fluid" src="/images/other.jpg">
</div>
<? $this->endBlock() ?>

<div class="container text-center tabl">
      <table class="mainT">
      <?= TableWidget::widget(['cat'=>'search','searchVal'=>$_GET['searchVal'],'searchField'=>$_GET['searchField']]) ?>
        <thead>
          <tr>
            <th>Id</th>
            <th>Категория</th>
            <th>Название</th>
            <th>Ингредиенты</th>
            <th>Рецепт</th>
            <th>Ссылка</th>
            <th>Дата добавления</th>
         
          </tr>
        </thead>
     
      </table>

    </div>
