<?

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Recipe;

class MyController extends Controller
{

   public function actionIndex()
   {

      $model = new Recipe();
      $this->view->title = 'Кулинарная книга: Главная стр.';

      if (isset($_POST['Recipe']['recipeId'])) {
         $id = $_POST['Recipe']['recipeId'];
         $query = Recipe::findOne($id);
         if (!is_null($query)) {
            $query->delete();
            Yii::$app->session->setFlash('success', 'Рецепт удален');
            return $this->refresh();
         } else {
            Yii::$app->session->setFlash('error', 'Введите действительный id');
            return $this->refresh();
         }
      }
      return $this->render('index', compact('model'));
   }



   public function actionAdd()
   {
      $this->view->title = 'Добавить рецепт';
      $model = new Recipe();
      if ($model->load(Yii::$app->request->post())) {
         $model->dat = date('d-m-y', time());
         $model->save();
         Yii::$app->session->setFlash('addOk', 'Рецепт добавлен');
         return  $this->goHome();
      } else {
         Yii::$app->session->setFlash('errorAdd', 'Заполните корректно все поля формы');
         return $this->render('add', compact('model'));
      }
   }



   public function actionUpdate($id)
   {
      $model = Recipe::findOne($id);
      if ($this->request->isPost and $model->load($this->request->post()) and $model->save()) {
         Yii::$app->session->setFlash('updateOk', 'Рецепт изменен');
         return $this->redirect(['view', 'id' => $model->recipeId]);
      } else {
         return $this->render('update', ['model' => $model]);
      }
   }


   public function actionView($id)
   {
      $model = Recipe::findOne($id);

      return $this->render('view', ['model' => $model]);
   }

   public function actionSearch($searchVal)
   {

      $this->view->title = 'Результаты поиска';
      return $this->render('search', compact('searchVal'));
   }

   public function actionFirst()
   {
      $this->view->title = 'Первые блюда';
      return $this->render('first');
   }

   public function actionSecond()
   {
      $this->view->title = 'Вторые блюда';
      return $this->render('second');
   }

   public function actionSalat()
   {
      $this->view->title = 'Салаты';
      return $this->render('salat');
   }

   public function actionCake()
   {
      $this->view->title = 'Выпечка';
      return $this->render('cake');
   }

   public function actionOther()
   {
      $this->view->title = 'Другое';
      return $this->render('other');
   }
}
