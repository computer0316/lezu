<?php
include 'head.php';
?>
<script>
    function changeFrameHeight(){
        var ifm= document.getElementById("iframepage");
        ifm.height=document.documentElement.clientHeight;

    }

    window.onresize=function(){
         changeFrameHeight();

    }
</script>
<style>
	.button a{
		color:white;
		text-decoration:none;
	}
	.button, .button:visited {
		margin:3px 25px;
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

	.large.button, .large.button:visited 			{ font-size: 18px;
													  padding: 8px 30px; }
	.blue.button, .blue.button:visited		    { background-color: #2981e4; }
	.blue.button:hover							{ background-color: #2575cf; }

	.iframe{
		width:100%;
		border:0px;
	}
</style>

	<section id="section1">
		<div class="large button blue"><a target="_blank" href="http://weidian.51vfang.com/Web/Publish/saleLeaseOne/type/2.html?comp_id=238366&broker_id=">房东加盟</a></div>
		<div class="large button blue"><a target="_blank" href="http://weidian.51vfang.com/Web/Publish/rentOne.html?comp_id=238366&broker_id=">意向预约</a></div>

		<iframe id="iframepage" class="iframe" onload="changeFrameHeight()" scrolling=yes src=http://weidian.51vfang.com/web/lease/leaselist?comp_id=238366#!/list?comp_id=238366></iframe>
	</section>



<?php
include 'footer.php';
?>