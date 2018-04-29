<{if $jsid eq 'top'}>

<{*引入跑馬燈JS*}>
<script type="text/javascript" src="<{$xoops_imageurl}><{$themefolder}>/js/kxbdSuperMarquee.js"></script>
<script type="text/javascript">
$(function(){
	//Marquee
	$('#marquee').kxbdSuperMarquee({
		isMarquee:true,
		isEqual:false,
		isEqual : true,
		scrollDelay: <{if $scrollingitems eq '0'}><{else}><{$alsspeed}><{/if}>,
		scrollAmount:1,
		
		controlBtn:{up:'#goUM',down:'#goDM'},
		btnGo:{left:'#goL',right:'#goR'},
		direction:'<{$marqueesdirection}>'
	});
});
</script>

<{*測試滑鼠上下*}>
<script src="<{$xoops_imageurl}><{$themefolder}>/js/jquery.mousewheel.js" type="text/javascript"></script>
<{*平滑移動*}>
<script src="<{$xoops_imageurl}><{$themefolder}>/js/smoothscroll/modernizr.js" type="text/javascript"></script>
<script src="<{$xoops_imageurl}><{$themefolder}>/js/smoothscroll/smoothscroll.js" type="text/javascript"></script>
<{*去除#後數值*}>
<script type="text/javascript">
var $hash=location.hash;
var search= document.location.search;
if($hash){
location=search;
	}
</script>
<script>
var $di01="<{$smarty.const._THEME_NEODW}>";
var $di02="<{$smarty.const._THEME_CREATIVECOMMONS}>";
var $contentstrue="<{$contentstrue}>";
var $ajaxurl="<{$xoops_imageurl}>program";
var $zoomwidth="<{$zoomwidth}>";
var $scrollDelay="<{if $scrollingitems eq '0'}><{else}><{$alsspeed}><{/if}>"
var $direction="<{$marqueesdirection}>";

</script>

<{*網站放大*}>
<{if $zoomswitch}>
<script type="text/javascript" src="<{$xoops_imageurl}><{$themefolder}>/js/zoom.js"></script>
<{/if}>

<{*自訂JS*}>
<script type="text/javascript" src="<{$xoops_imageurl}><{$themefolder}>/js/customize.js"></script>

<{*防機器人*}>
<{if $xoops_dirname eq profile}>
<script>

var $notarobot="<{$smarty.const._MD_IMNOTAROBOT}>";
</script>
<script type="text/javascript" src="<{$xoops_imageurl}><{$themefolder}>/js/anti-robot.js"></script>
<{/if}>


<{/if}>

<{if $jsid eq 'bottom'}>
<{*災害示警引入*}>
 <script type="text/javascript" src="https://alerts.ncdr.nat.gov.tw/temp/StaticFiles/Immediately/<{$alertsncdr}>"></script>
 <script>
css2.href = "";
</script>
<link href="<{xoImgUrl}><{$themefolder}>/css/style/alerts.css" rel="stylesheet" media="all"> 
<{/if}>