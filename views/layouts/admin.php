<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;
use app\models\Role;
use yii\helpers\VarDumper;

//AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="js/jquery-3.0.0.js"></script>
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
		<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
	</head>
<body>
	<?php $this->beginBody() ?>
	<div class="top">
		<h1 id="h1">莱恩内容管理系统</h1>
<?php
	echo '<span class="right"><a href="' . Url::toRoute('/site/clear-sessions') . '">清除缓存</a></span>';
	$userid = Yii::$app->session->get('userid');
	if(isset($userid) && $userid>0){
		echo '<span class="right"><a href="' . Url::toRoute('/user/chpass') . '">修改密码</a></span>';
		echo '<span class="right"><a href="' . Url::toRoute('/user/logout') . '">退出</a></span>';
		echo '<span class="right">你好：' . User::findOne($userid)->name . '</span>';
	}
	else{
		echo '<span class="right">登录</span>';
		echo '<span class="right">注册</span>';
	}


	// 显示菜单组
	function showGroupName($title, $img=''){
		echo '<li class="menu-title"><img class="menu-image" src="' . $img . '"><span>' . $title . '</span></li>';
	}

	// 显示菜单
	function showMenu($title, $url, $class){
		echo '<li class="' . $class . '"><a href="' . Url::toRoute($url) . '">' . $title . '</a></li>';
	}
?>
	</div>
	<div class="leftform">
		<ul>
			<li class="menu-top"><span>菜单</span></li>
			<?= showGroupName('文章管理', 'images/menu.png') ?>
				<?= showMenu('添加文章', 'article/add', 'menu') ?>
				<?= showMenu('文章列表', 'article/list', 'menu-last') ?>
		</ul>
	</div>
	<div id="content">
		<div class="bread">
			<?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],])?>
		</div>
		<div class="content-box">
			<?= $content ?>
		</div>
	</div>
	<div class="footer">
		<p>&copy; <strong>&copy; 廊坊市莱恩网络科技有限公司 2017</strong></p>
	</div>


<?php $this->endBody() ?>
</body>
</html>

<?php
	$this->endPage();
	if(Yii::$app->session->hasFlash('message')){
		echo "<script>alert('" . Yii::$app->session->getFlash('message') . "')</script>";
	}
?>
