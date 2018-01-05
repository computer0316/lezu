<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\helpers\Url;
	use yii\widgets\LinkPager;

	// 客户信息窗体


	echo '<div class="form1">';

	foreach($articles as $article){
		echo '<a href="' . Url::toRoute(['show', 'id' => $article->id]) . '">' . $article->title . '</a><br />';
	}
?>

	</div>



