<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\helpers\Url;
	use yii\widgets\LinkPager;
	use app\models\Article;

	// 客户信息窗体

	$article = Article::findOne($id);
	echo '<div class="line"></div>' . "\n";
	if($article){
		echo '<section class="article">' . "\n";
			echo '<div class="title">' . $article->title . '</div>' . "\n";
			echo '<div class="content">' . $article->content . '</div><br />' . "\n";
			showPreviousNext($id);
		echo "</section>\n";
	}
	else{
		echo '文章没找到';
	}

	function showPreviousNext($id){
		$previous = Article::find()->where(['<', 'id', $id])->orderBy('id desc')->one();
		echo '上一篇：';
		if($previous){
			echo  '<a  href="?r=site/show&id=' . $previous->id . '">' . $previous->title . '</a><br />';
		}
		else{
			echo '没有了<br />';
		}
		echo '下一篇：';
		$next = Article::find()->where(['>', 'id', $id])->orderBy('id')->one();
		if($next){
			echo  '<a  href="?r=site/show&id=' . $next->id . '">' . $next->title . '</a><br />';
		}
		else{
			echo '没有了<br />';
		}
	}
?>
<style>
	.line{
		float:left;
		width:100%;
		border-bottom:1px solid red;
	}
	.article{
		width:1200px;
		margin:0px auto;
		clear:both;
	}
	.title{
		float:left;
		width:100%;
		text-align:center;
		font-size:24px;
		padding:36px;
	}
	.content{
		line-height:32px;
	}
</style>



