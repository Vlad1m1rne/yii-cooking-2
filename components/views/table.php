<?

use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?

if($models == null){
  echo "<h4>По Вашему запросу ничего не найдено.</h4>";
}
  foreach ($models as $line) {
    echo "<tr>";
    echo "<td>" .Html::a($line['recipeId'], Url::toRoute(['my/view','id'=> $line['recipeId']])) . "</td>";
    echo "<td>" . $line['category']['nameCategory'] . "</td>";
    echo "<td>" .Html::a($line['nameRecipe'],Url::toRoute(['my/view','id'=>$line['recipeId']]) ) . "</td>";
    echo "<td>" . $line['ingredient'] . "</td>";
    echo "<td>" . $line['recipeDescription'] . "</td>";
    if ($line['link'] != null) {
      echo "<td>" . Html::a('ссылка', Url::to($line['link']), ['target' => '_blank']) . "</td>";
    } else {
      echo "<td>" . $line['link'] . "</td>";
    }
    echo "<td>" . $line['dat'] . "</td>";
    echo "<td><button class='upd btn btn-success btnM'>" . Html::a('Изменить', Url::toRoute(['my/update','id'=> $line['recipeId']])) . "</button></td>";
    echo "</tr>";
   
  }

echo LinkPager::widget([
  'pagination' => $pages,
]);


?>