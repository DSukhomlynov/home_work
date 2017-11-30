<?php
/**
 * Created by PhpStorm.
 * User: moohii07
 * Date: 31.10.2017
 * Time: 12:10
 */
?>
<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AdminAsset;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="/image/favicon.ico" type="image/x-icon">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-list">
                <li class="nav-header">Админка</li>
                <li><a href="<?= Url::to(["default/index"]) ?>">На главную</a></li>
                <li><a href="<?= Url::to(["simple-page/index"]) ?>">Простые страницы</a></li>
                <li><a href="<?= Url::to(["post/index"]) ?>">Записи для блога</a></li>
                <li><a href="<?= Url::to(["category/index"]) ?>">Категории</a></li>
                <li><a href="<?= Url::to(["product/index"]) ?>">Товары</a></li>
                <li><a href="<?= Url::to(["event-calendar/index"]) ?>">Календарь событий</a></li>
                <li><a href="<?= Url::to(["subscription/index"]) ?>">Подписки</a></li>
                <li><a href="<?= Url::to(["users/index"]) ?>">Пользователи</a></li>
                <li><a href="<?= Url::to(["settings/index"]) ?>">Настройки</a></li>
                <li><a href="<?= Url::to(["default/cache"]) ?>">Работа с кэшем</a></li>
                <li><a href="<?= Url::to(["default/logout"])?>"><i class="fa fa-user"></i>(Выход)</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <?= $content ?>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

