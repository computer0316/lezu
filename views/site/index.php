<?php

/* @var $this yii\web\View */

$this->title = '首页 - 廊坊乐租房地产经纪有限公司';

?>
<script>
	   window.addEventListener('scroll',function(){
            //var scrollT=document.documentElement.scrollTop||document.body.scrollTop;
            setAnimation("section1TitleSmall");
            setAnimation("section1TitleBig");
			setAnimation("diamondSmall1");
			setAnimation("diamondSmall2");
			setAnimation("diamondSmall3");
			setAnimation("diamondSmall4");
			setAnimation("diamondBig1");
			setAnimation("diamondBig2");
			setAnimation("diamondBig3");
			setAnimation("section3Back");
			setAnimation("section3TitleSmall");
			setAnimation("section3TitleBig");
			setAnimation("hammer");
			setAnimation("computer");
			setAnimation("people");
			setAnimation("shield");
			setAnimation("trophy");
			setAnimation("section31");
			setAnimation("section32");
			setAnimation("section33");
			setAnimation("section34");
			setAnimation("section35");
			setAnimation("section3Red1");
			setAnimation("section3Red2");
			setAnimation("section3Red3");
			setAnimation("section3Gray1");
			setAnimation("section3Gray2");
			setAnimation("section4TitleSmall");
			setAnimation("section4TitleBig");
			setAnimation("section4Div1");
			setAnimation("section4Div2");
			setAnimation("section4Div3");
			setAnimation("section5TitleSmall");
			setAnimation("section5TitleBig");
			setAnimation("section5Text1");
			setAnimation("section5Text2");
			setAnimation("section5Text3");
			setAnimation("section5Text4");
			setAnimation("section5Text5");
			setAnimation("section5Img");
			setAnimation("footer1");
			setAnimation("footer2");
			setAnimation("footer3");
			setAnimation("footer4");
			setAnimation("footer5");
        })

</script>
<style>
/******************************* section 1 **************************************/
		#section1 {
			height:690px;
		}
		#back1{
			width:100%;
			float:left;
		}

		#section1Img1{
			position:absolute;
			left:50%;
			top:365px;
			margin-left:-240px;
		}
		#section1Img2{
			position:absolute;
			left:50%;
			top:465px;
			margin-left:-240px;
		}
		#word{
			position:absolute;
			left:50%;
			top:395px;
			margin-left:-240px;
			font-size:48px;
			font-family:微软雅黑;
			font-weight:bold;
			color:white;
		}
		.word1{
			color:#e4393c;
		}
		.word2{
			color:black;
		}
/******************************* section 2 **************************************/
		#section2{
			position:relative;
			height:700px;
			background:#ff6666 url(images/back2.jpg);
			text-align:center;
		}
		#diamondBig{
			margin-top:150px;
		}
		#diamondBig img{
			margin-right:15px;
		}
		.diamondSmall{
			position:absolute;
			background:url(images/diamond4.png) no-repeat;
			width:155px;
			height:162px;
		}

		.pd1{
			margin-top:30px;
			font-size:48Px;
			color:#ff6666;
			font-family:微软雅黑;
			font-weight:bold;
		}
		.pd2{
			font-size:18Px;
			font-family:微软雅黑;
			color:#ff6666;
		}

		#diamondSmall1{
			left:698px;
			top:246px;
		}
		#diamondSmall2{
			left:1035px;
			top:246px;
		}
		#diamondSmall3{
			left:698px;
			top:486px;
		}
		#diamondSmall4{
			left:1035px;
			top:486px;
		}
/******************************* section 3 **************************************/
		#section3{
			position:relative;
			height:1000px;
			background:white;
			text-align:center;
		}
		#section3TitleSmall{
			color:#aaaaaa;
		}
		#section3TitleBig{
			color:#ff6666;
		}
		#section3Back{
			margin-top:80px;
		}
		#hammer{
			position:absolute;
			left:510px;
			top:280px;
		}
		#computer{
			position:absolute;
			left:923Px;
			top:280px;
		}
		#people{
			position:absolute;
			left:1330Px;
			top:280px;
		}
		#shield{
			position:absolute;
			left:718Px;
			top:460px;
		}
		#trophy{
			position:absolute;
			left:1125Px;
			top:460px;
		}
		#section31{
			position:absolute;
			font-size:64px;
			font-family:微软雅黑;
			color:#ff6666;
			left:500px;
			top:785px;
		}
		#section32{
			position:absolute;
			font-size:64px;
			font-family:微软雅黑;
			color:#ff6666;
			left:710px;
			top:270px;
		}
		#section33{
			position:absolute;
			font-size:64px;
			font-family:微软雅黑;
			color:#ff6666;
			left:910px;
			top:785px;
		}
		#section34{
			position:absolute;
			font-size:64px;
			font-family:微软雅黑;
			color:#ff6666;
			left:1110px;
			top:270px;
		}
		#section35{
			position:absolute;
			font-size:64px;
			font-family:微软雅黑;
			color:#ff6666;
			left:1310px;
			top:785px;
		}
		#section3Red1{
			position:absolute;
			background:url(images/red1.png) no-repeat;
			width:206px;
			height:340px;
			left:436px;
			top:398px;
		}
		#section3Red2{
			position:absolute;
			background:url(images/red1.png) no-repeat;
			width:206px;
			height:340px;
			left:848px;
			top:398px;
		}
		#section3Red3{
			position:absolute;
			background:url(images/red1.png) no-repeat;
			width:206px;
			height:340px;
			left:1260px;
			top:398px;
		}
		#section3Gray1{
			position:absolute;
			background:url(images/gray.png) no-repeat;
			width:206px;
			height:340px;
			left:642px;
			top:571px;
		}
		#section3Gray2{
			position:absolute;
			background:url(images/gray.png) no-repeat;
			width:206px;
			height:340px;
			left:1054px;
			top:571px;
		}
		.section3Text{
			color:white;
			line-height:36px;
			text-align:center;
		}
		.section3Text span{
			font-size:28px;
			display:block;
			clear:both;
			margin-top:30px;
			margin-bottom:20px;
		}
/******************************* section 4 **************************************/
		#section4{
			height:600px;
			background:#ffcc00;
			float:left;
			text-align:center;
		}
		.section4Div{
			margin-top:100px;
			color:#ff0000;
			width:400px;
			float:left;
		}
		.section4Div img{
			margin:50px 25px;
			float:left;
		}
		.section4Div div{
			float:left;
			color:blue;
			text-align:left;
		}
		.section4Div p{
			line-height:48px;
		}

		.section4Title{
			font-size:28px;
		}
/******************************* section 5 **************************************/
		#section5{
			height:700px;
			background:url(images/back1.jpg) no-repeat;
			position:relative;
		}
		.filter5{
			background:#000;
			filter:Alpha(Opacity=70);
			opacity:0.7;
			width:100%;
			height:100%;
		}
		#section5Img{
			position:absolute;
			left:430px;
			top:300px;
		}
		#section5Text1{
			position:absolute;
			color:white;
			font-size:28px;
			left:440px;
			top:365px;
		}
		#section5Text2{
			position:absolute;
			color:white;
			font-size:28px;
			left:660px;
			top:465px;
		}
		#section5Text3{
			position:absolute;
			color:white;
			font-size:28px;
			left:895px;
			top:360px;
		}
		#section5Text4{
			position:absolute;
			color:white;
			font-size:28px;
			left:1128px;
			top:465px;
		}
		#section5Text5{
			position:absolute;
			color:white;
			font-size:28px;
			left:1360px;
			top:365px;
		}
</style>
	<section id="section1">
		<img id="back1" src="images\back1.jpg" />
		<img id="section1Img1" src="images/word1.png" />
		<div id="word">
			<span class="word1">乐租</span><span class="word2">房管家</span>&nbsp;·&nbsp;<span class="word1">租房</span><span class="word2">我找他</span>
		</div>
		<img id="section1Img2" src="images/word2.png" />
	</section>
	<section id="section2">
		<div id="section1TitleSmall" class="sectionTitleSmall"><span>RECOMMENDED LISTINGS</span></div>
		<div id="section1TitleBig" class="sectionTitleBig"><span>推荐房源 热门套间</span></div>
		<div id="diamondBig">
			<img id="diamondBig1" src="images/diamond.png" />
			<img id="diamondBig2" src="images/diamond2.png" />
			<img id="diamondBig3" src="images/diamond3.png" />
		</div>
		<div id="diamondSmall1" class="diamondSmall"><p class="pd1">1</p><p class="pd2">学区房</p></div>
		<div id="diamondSmall2" class="diamondSmall"><p class="pd1">2</p><p class="pd2">精品房</p></div>
		<div id="diamondSmall3" class="diamondSmall"><p class="pd1">3</p><p class="pd2">二手房</p></div>
		<div id="diamondSmall4" class="diamondSmall"><p class="pd1">4</p><p class="pd2">公寓式</p></div>
	</section>
	<section id="section3">
		<div id="section3TitleSmall" class="sectionTitleSmall"><span>REGISTER PROCEDURE</span></div>
		<div id="section3TitleBig" class="sectionTitleBig"><span>私有物业 出租无忧</span></div>
		<img id="section3Back" src="images/square.png" />
		<img id="hammer" src="images/hammer.png" />
		<img id="computer" src="images/computer.png" />
		<img id="people" src="images/people.png" />
		<img id="shield" src="images/shield.png" />
		<img id="trophy" src="images/trophy.png" />
		<div id="section31">01</div>
		<div id="section32">02</div>
		<div id="section33">03</div>
		<div id="section34">04</div>
		<div id="section35">05</div>
		<div id="section3Red1" class="section3Text"><span>房屋委托</span><p>和客户达成初步合作意向<p><p>房屋出租事宜全权交由乐租</p></div>
		<div id="section3Red2" class="section3Text"><span>设计装修</span><p>装修风格经过精心设计</p><p>全部使用环保材料</p><p>正规施工队伍实施</p></div>
		<div id="section3Red3" class="section3Text"><span>坐享收益</span><p>剩下的事</p><p>就是坐在家里收钱了</p></div>
		<div id="section3Gray1" class="section3Text"><span>现场勘察</span><p>专业工程师实地勘察<p><p>根据户型给出合理方案</p></div>
		<div id="section3Gray2" class="section3Text"><span>签署合同</span><p>与客户沟通具体合作细节</p><p>双方同意后签署正式合同</p></div>
	</section>
	<section id="section4">
		<div class="box">
		<div id="section4TitleSmall" class="sectionTitleSmall"><span>WHY LEZU</span></div>
		<div id="section4TitleBig" class="sectionTitleBig"><span>为什么选择乐租</span></div>

			<div id="section4Div1" class="section4Div">
				<img src="images/s41.png" />
				<div>
					<p class="section4Title">稳增</p>
					<p>租金稳定</p>
					<p>品质装修（到期赠送）</p>
					<p>优质家具（到期赠送）</p>
					<p>品质家电（到期赠送） </p>
				</div>
			</div>
			<div id="section4Div2" class="section4Div">
				<img src="images/s42.png" />
				<div>
					<p class="section4Title">省心</p>
					<p>双周保洁</p>
					<p>专业维修</p>
					<p>一站式托管</p>
					<p>水电燃气物业费代缴</p>
				</div>
			</div>
			<div id="section4Div3" class="section4Div">
				<img src="images/s43.png" />
				<div>
					<p class="section4Title">安全</p>
					<p>租客认证</p>
					<p>定期巡房</p>
					<p>租客信用体系</p>
					<p>家财保险（赠送）</p>
				</div>
			</div>
		</div>
	</section>
	<section id="section5">
		<div class="box filter5">
			<div id="section5TitleSmall" class="sectionTitleSmall"><span>REGISTER PROCEDURE</span></div>
			<div id="section5TitleBig" class="sectionTitleBig"><span>收房流程</span></div>
		</div>
		<img id="section5Img" src="images/five.png" />
		<div id="section5Text1">房屋委托</div>
		<div id="section5Text2">现场勘察</div>
		<div id="section5Text3">设计装修</div>
		<div id="section5Text4">签署合同</div>
		<div id="section5Text5">坐享收益</div>
	</section>
