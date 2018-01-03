<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = '最新房源 - 廊坊乐租房地产经纪有限公司';
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
		height:900px;
	}
	#aboutTitleSmall, #aboutTitleBig{
		color:#888888;
	}
	.newImg{
		margin:5px 16px;
	}
	.img1Div{
		color:black;
		float:left;
		margin-top:60px;
	}

</style>
<script>
	window.addEventListener('scroll',function(){
		setAnimation("aboutTitleSmall");
		setAnimation("aboutTitleBig");
		setAnimation("footer1");
		setAnimation("footer2");
		setAnimation("footer3");
		setAnimation("footer4");
		setAnimation("footer5");
		setAnimation("img1Div");
		setAnimation("img2Div");
		setAnimation("img3Div");
		setAnimation("img4Div");
		setAnimation("img5Div");
		setAnimation("img6Div");
	})
</script>

<section id="back">
	<img src="images/back4.jpg" />
</section>
<section id="about">
	<div class="box">
		<div id="aboutTitleSmall" class="sectionTitleSmall"><span>LASTEST LISTINGS</span></div>
		<div id="aboutTitleBig" class="sectionTitleBig"><span>最新房源</span></div>
		<div id="img1Div" class="img1Div">
			<img src="images/house1.jpg" class="newImg" />
			<p>新世界花园</p>
			<p>均价：16000</p>
		</div>
		<div id="img2Div"  class="img1Div">
			<img src="images/house2.jpg" class="newImg" />
			<p>新世界花园</p>
			<p>均价：16000</p>
		</div>
		<div id="img3Div"  class="img1Div">
			<img src="images/house3.jpg" class="newImg" />
			<p>新世界花园</p>
			<p>均价：16000</p>
		</div>
		<div id="img4Div"  class="img1Div">
			<img src="images/house4.jpg" class="newImg" />
			<p>新世界花园</p>
			<p>均价：16000</p>
		</div>
		<div id="img5Div"  class="img1Div">
			<img src="images/house5.jpg" class="newImg" />
			<p>新世界花园</p>
			<p>均价：16000</p>
		</div>
		<div id="img6Div"  class="img1Div">
			<img src="images/house6.jpg" class="newImg" />
			<p>新世界花园</p>
			<p>均价：16000</p>
		</div>

	</div>
</section>
