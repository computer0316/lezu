<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = '关于我们 - 廊坊乐租房地产经纪有限公司';
?>
<script>
	window.addEventListener('scroll',function(){
		setAnimation("aboutTitleSmall");
		setAnimation("aboutTitleBig");
		setAnimation("aboutP1");
		setAnimation("aboutP2");
		setAnimation("aboutP3");
		setAnimation("footer1");
		setAnimation("footer2");
		setAnimation("footer3");
		setAnimation("footer4");
		setAnimation("footer5");
		setAnimation("circle1");
		setAnimation("circle2");
		setAnimation("circle3");
		setAnimation("circle4");

	})
</script>
<style>
	#back{
		float:left;
		margin:0px;
		height:500px;
	}
	#about{
		float:left;
		width:100%;
		height:700px;
		background:#ff6699;
	}
	#about p{
		color:white;
		font-size:18px;
		margin-top:40px;
	}
	.circle{
		width:176px;
		height:176px;
		border-radius:88px;
		float:left;
		margin:0px 60px;
		color:white;
		font-size:32px;
		line-height:172px;
	}
	#circle1{
		background:#333333;
	}
	#circle2{
		background:#e4393c;
	}
	#circle3{
		background:#333333;
	}
	#circle4{
		background:#e4393c;
	}
	#circleDiv{
		margin-top:60px;
		float:left;
	}
</style>

<section id="back">
	<img src="images/back3.jpg" />
</section>
<section id="about">
	<div class="box">
		<div id="aboutTitleSmall" class="sectionTitleSmall"><span>ABOUT US</span></div>
		<div id="aboutTitleBig" class="sectionTitleBig"><span>关于我们</span></div>
		<p id="aboutP1">廊坊乐租房地产经纪限公司是廊坊房产租赁行业中的一支新力军。</p>
　　	<p id="aboutP2">公司人才鼎盛，资金实力雄厚，决心打造房产租赁行业的第一品牌，员工团结一致向这一目标迈进。</p>
　　	<p id="aboutP3">满怀豪情的乐租人正带着“为人类创造美好生活”的坚定信念，以“为客户提供优质、快捷的服务。为员工搭建实现、梦想的平台。为祖国繁荣昌盛、而全力以赴。”为使命，全力以赴走向更加辉煌的未来…</p>
		<div id="circleDiv" class="box">
			<div id="circle1" class="circle">
				乐租友家
			</div>
			<div id="circle2" class="circle">
				精装公寓
			</div>
			<div id="circle3" class="circle">
				新房出售
			</div>
			<div id="circle4" class="circle">
				二手房转让
			</div>
		</div>
	</div>
</section>
