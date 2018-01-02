<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '乐租资讯 - 廊坊乐租房地产经纪有限公司';

?>
<style>
	#back{
		float:left;
		margin:0px;
		height:500px;
	}
	#about{
		float:left;
		width:100%;
		height:1300px;
		background:white;
	}
	.newsImgDiv{
		float:left;
		width:580px;
		margin:30px 10px;
	}
	.box *{
		color:#666;
	}
	.dateDiv{
		margin-top:10px;
		border-radius:5px;
		float:left;
		width:80px;
		height:80px;
		border:1px solid #ccc;
		background:#ccc;
		font-size:18px;
	}
	.list{
		float:left;
		margin-top:30px;
	}
	.p1{
		font-size:32px;
		margin-top:8px;
	}
	.pContent, .pTitle{
		float:left;
		width:1080px;
		text-align:left;
		margin:3px 10px;
	}

</style>
<script>
	window.addEventListener('scroll',function(){
		setAnimation("aboutTitleSmall");
		setAnimation("aboutTitleBig");
		setAnimation("newsImgDiv1");
		setAnimation("newsImgDiv2");
		setAnimation("footer1");
		setAnimation("footer2");
		setAnimation("footer3");
		setAnimation("footer4");
		setAnimation("footer5");
		setAnimation("article1");
		setAnimation("article2");
		setAnimation("article3");
		setAnimation("article4");
		setAnimation("article5");
		setAnimation("article6");

	})
</script>

<section id="back">
	<img src="images/back3.jpg" />
</section>
<section id="about">
	<div class="box">
		<div id="aboutTitleSmall" class="sectionTitleSmall"><span>PROPERTY NEWS</span></div>
		<div id="aboutTitleBig" class="sectionTitleBig"><span>楼市资讯</span></div>
		<div id="newsImgDiv1" class="newsImgDiv">
			<img src="images/house7.jpg" />
			<p>这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字</p>
		</div>
		<div id="newsImgDiv2" class="newsImgDiv">
			<img src="images/house8.jpg" />
			<p>这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字这里是文字</p>
		</div>
<?php
	$i = 1;
	foreach($articles as $article){
		echo '<div id="article' . $i++ . '" class="list">' . "\n";
		echo '<div class="dateDiv"><p class="p1">29</p><p>2017/10</p></div>' . "\n";
		echo '<a href="' . Url::toRoute(['show', 'id' => $article->id]) . '"><p class="pContent">' . $article->title . '</p></a><br />' . "\n";
		echo '<p class="pTitle">' . mb_substr(strip_tags($article->content),0,180, "utf-8") . '</p>' . "\n";
		echo "</div>\n";
	}
?>
	</div>
</section>
