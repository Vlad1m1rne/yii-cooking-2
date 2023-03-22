<?

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;


AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>


<body>
  <?php $this->beginBody() ?>

  <header>

    <div class="container">
      <? if (Yii::$app->session->hasFlash('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= Yii::$app->session->getFlash('success') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <? endif; ?>

      <? if (Yii::$app->session->hasFlash('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?= Yii::$app->session->getFlash('error') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <? endif; ?>
      <? if (Yii::$app->session->hasFlash('updOk')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= Yii::$app->session->getFlash('updOk') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <? endif; ?>
      
    </div>

    <div class="contairen">
      <? if (Yii::$app->session->hasFlash('addOk')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= Yii::$app->session->getFlash('addOk') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <? endif; ?>

      <? if (Yii::$app->session->hasFlash('addErr')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?= Yii::$app->session->getFlash('addErr') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <? endif; ?>

    </div>

    <div class="container ">
      <h1 class="text-center text-white">Приятного аппетита!</h1>


      <div class="row row-header">


        <div class="col text-center">
          <button id='all' class="btn btn-outline-success btn-lg"><?= Html::a('Главная', ['my/index']) ?></button>
        </div>


        <div class="col text-center">
          <button id='first' class="btn btn-outline-success btn-lg"><?= Html::a('Первые блюда', ['my/first']) ?></button>
        </div>

        <div class="col text-center">
          <button id='second' class="btn btn-outline-success btn-lg"><?= Html::a('Вторые блюда', ['my/second']) ?></button>
        </div>
        <div class="col text-center">
          <button id='salat' class="btn btn-outline-success btn-lg"><?= Html::a('Салаты', ['my/salat']) ?></button>
        </div>
        <div class="col text-center">
          <button id='cake' class="btn btn-outline-success btn-lg"><?= Html::a('Выпечка', ['my/cake']) ?></button>
        </div>
        <div class="col text-center">
          <button id='other' class="btn btn-outline-success btn-lg"><?= Html::a('Другое', ['my/other']) ?></button>
        </div>

        <? if (Yii::$app->user->isGuest) : ?>
          <div class="col text-center">
            <button id="login" class="btn btn-outline-success btn-lg btnlog">Авторизация</button>
          </div>
        <? endif; ?>

        <? if (!Yii::$app->user->isGuest) : ?>

          <div class="col text-center">
            <button id="login" class="btn btn-outline-success btn-lg btnlog"><?=Yii::$app->user->identity['username']?></button>
          </div>
        <? endif; ?>


        <div id="log" class="col text-center" style="display:none">

          <? if (Yii::$app->user->isGuest) : ?>
            <button type="button" class="btn btn-success btn-sm"><?= Html::a('Войти', ['/site/login']) ?></button>
          <? endif; ?>

          <input id="otmena" type="button" class="btn btn-secondary btn-sm" value="Отмена">


          <!-- <button type="button" class="btn btn-warning btn-sm"><?//= Html::a('Админка', ['/admin']) ?></button> -->

          <? if (!Yii::$app->user->isGuest) : ?>
            <button id="btnExit" type="button" class="btn btn-info btn-sm"><?=Html::a('Выйти',Url::to(['/site/logout']),['data-method'=>'post'])?></button>
          <? endif; ?>

        </div>

        
      </div>
    </div>
  </header>

  <main>

    <?= $this->blocks['block1'];  ?>
    <? if(isset($this->blocks['block2'])):?>
    <?= $this->blocks['block2']; ?>
    <?endif;?>

    <?= $content ?>


  </main>

  <footer>
    <div class="container text-center">
      <img class='dn' src="/images/night.png" alt="Day/Night">
    </div>
  </footer>
  <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>