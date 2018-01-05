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
use yii\helpers\VarDumper;

//AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
		<?= Html::csrfMetaTags() ?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Description" />
		<link rel="stylesheet" href="roc/animate.css" type="text/css" />
		<link rel="stylesheet" href="roc/main.css" type="text/css" />
		<link rel="stylesheet" href="roc/about.css" type="text/css" />
		<script src="roc/jquery.3.2.1.js"></script>
		<script src="roc/animate.js"></script>
		<script src="roc/flash.js"></script>
	</head>
<body>
	<?php $this->beginBody() ?>
	<header>
		<div class="nameDiv">
			<img id="logo" src="images/logo.gif" /><span class="name red">乐租</span><span class="name"> · </span><span class="name blue">房管家</span>
		</div>
		<nav>
			<ul>
				<a href="<?=Url::toRoute('index')?>"><li id="indexLi" class="<?= $this->context->indexLi ?>">首页</li></a>
				<a href="<?=Url::toRoute('about')?>"><li id="aboutLi" class="<?= $this->context->aboutLi ?>">关于我们</li></a>
				<a href="<?=Url::toRoute('new')?>"><li id="newLi" class="<?= $this->context->newLi ?>">最新房源</li></a>
				<a href="<?=Url::toRoute('news')?>"><li id="newsLi" class="<?= $this->context->newsLi ?>">楼市资讯</li></a>
				<a href="<?=Url::toRoute('recruit')?>"><li id="recruitLi" class="<?= $this->context->recruitLi ?>">招聘信息</li></a>
				<a href="<?=Url::toRoute('contact')?>"><li id="contactLi" class="<?= $this->context->contactLi ?>">联系我们</li></a>
			</ul>
		</nav>
	</header>
	<?= $content ?>
	<footer>
		<p id="footer1">联系QQ：31657890</p>
		<p id="footer2">手机号码：18033670505</p>
		<p id="footer3">邮箱：<a href="mailto:lezufgj@163.com">lezufgj@163.com</a></p>
		<p id="footer4" class="tel">0316-2274477</p>
		<p id="footer5">
			<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1271967937'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s13.cnzz.com/z_stat.php%3Fid%3D1271967937%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script>
			2017-2018 廊坊乐租房地产经纪有限公司</p>
	</footer>


<?php $this->endBody() ?>
</body>
</html>

<?php
	$this->endPage();
	if(Yii::$app->session->hasFlash('message')){
		echo "<script>alert('" . Yii::$app->session->getFlash('message') . "')</script>";
	}
?>
