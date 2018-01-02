<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = '联系我们 - 廊坊乐租房地产经纪有限公司';
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
		height:450px;
		background:white;
	}
	.sectionTitleSmall, .sectionTitleBig{
		color:#666;
	}
	.box1{
		float:left;
		margin-top:20px;
		width:100%;
	}
	.contactDiv{
		float:left;
		width:150px;
		margin:10px 70px;
		text-align:center;
	}
	.icon{
		width:60px;
	}
	.contactDiv p{
		color:#666;
		clear:both;
		line-height:30px;
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
		setAnimation("contactDiv1");
		setAnimation("contactDiv2");
		setAnimation("contactDiv3");
		setAnimation("contactDiv4");
	})
</script>

<section id="back">
	<img src="images/back5.jpg" />
</section>
<section id="about">
	<div class="box">
		<div id="aboutTitleSmall" class="sectionTitleSmall"><span>CONTACT US</span></div>
		<div id="aboutTitleBig" class="sectionTitleBig"><span>联系我们</span></div>
		<div class="box1">
			<div id="contactDiv1" class="contactDiv">
				<img class="icon" src="images/qq.png" />
				<p>QQ账号</p>
				<p>31657890</p>
			</div>
			<div id="contactDiv2" class="contactDiv">
				<img class="icon" src="images/mobile.png" />
				<p>手机号码</p>
				<p>18033670505</p>
			</div>
			<div id="contactDiv3" class="contactDiv">
				<img class="icon" src="images/email.png" />
				<p>联系邮箱</p>
				<p>lezufgj@163.com</p>
			</div>
			<div id="contactDiv4" class="contactDiv">
				<img class="icon" src="images/phone.png" />
				<p>联系电话</p>
				<p>0316-2274477</p>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="box">
		<iframe class="iframe" frameborder=0 width=1200 height=400 marginheight=0 marginwidth=0 scrolling=no src=map.html></iframe>
	</div>
</section>
