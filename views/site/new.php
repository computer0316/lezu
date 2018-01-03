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
	.leftNew{
		float:left;
		width:250px;
		height:300px;
	}
	.iframe{
		float:left;
		width:900px;
		border:0px;
	}
	.button a{
		color:white;
		text-decoration:none;
	}
	.button, .button:visited {
		margin-top:30px;
		margin-left:50px;
		background: #222 url(overlay.png) repeat-x;
		display: inline-block;
		color: #fff;
		text-decoration: none;
		-moz-border-radius: 6px;
		-webkit-border-radius: 6px;
		-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.6);
		-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.6);
		text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
		border-bottom: 1px solid rgba(0,0,0,0.25);
		position: relative;
		cursor: pointer
	}

	.button:hover							{ background-color: #111; color: #fff; }
	.button:active							{ top: 1px; }
	.button, .button:visited,

	.large.button, .large.button:visited 			{ font-size: 34px;
													  padding: 8px 30px; }
	.blue.button, .blue.button:visited		    { background-color: #2981e4; }
	.blue.button:hover							{ background-color: #2575cf; }

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


    function changeFrameHeight(){
        var ifm= document.getElementById("iframepage");
        ifm.height=document.documentElement.clientHeight;

    }

    window.onresize=function(){
         changeFrameHeight();

    }

</script>

<section id="back">
	<img src="images/back4.jpg" />
</section>
<section id="about">
	<div class="box">
		<div class="leftNew">
			<div class="large button blue"><a target="_blank" href="http://weidian.51vfang.com/Web/Publish/saleLeaseOne/type/2.html?comp_id=238366&broker_id=">房东加盟</a></div>
			<div class="large button blue"><a target="_blank" href="http://weidian.51vfang.com/Web/Publish/rentOne.html?comp_id=238366&broker_id=">意向预约</a></div>
		</div>
		<div class="rightNew">
			<iframe id="iframepage" class="iframe" onload="changeFrameHeight()" scrolling=yes src=http://weidian.51vfang.com/web/lease/leaselist?comp_id=238366#!/list?comp_id=238366></iframe>
		</div>
	</div>
</section>
