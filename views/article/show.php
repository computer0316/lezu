<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\helpers\Url;
	use yii\widgets\LinkPager;

	// 客户信息窗体

?>
	<link rel="stylesheet" type="text/css" href="css/userlogin.css" />


    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
	<div class="form1">
	<?= $article->title ?>
	<br />
	<?= $article->content ?>
	</div>




