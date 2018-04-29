<{if $jid eq 'top'}>
<{*引入跑馬燈JS*}>
<script type="text/javascript" src="<{$xoops_imageurl}><{$themefolder}>/js/kxbdSuperMarquee.js"></script>
<script type="text/javascript">
$(function(){
	//Marquee
	$('#marquee').kxbdSuperMarquee({
		isMarquee:true,
		isEqual:false,
		scrollDelay: <{if $scrollingitems eq '0'}><{else}><{$alsspeed}><{/if}>,
		scrollAmount:1,
		controlBtn:{up:'#goUM',down:'#goDM'},
		btnGo:{left:'#goL',right:'#goR'},
		direction:'<{$marqueesdirection}>'
	});
});
</script>



<script>
var $di01="<{$smarty.const._THEME_NEODW}>";
var $di02="<{$smarty.const._THEME_CREATIVECOMMONS}>";
var $contentstrue="<{$contentstrue}>";

</script>
<{*自訂JS*}>
<script type="text/javascript" src="<{$xoops_imageurl}><{$themefolder}>/js/customize.js"></script>

<{*防機器人*}>
<{if $xoops_dirname eq profile}>
<script>
var $ajaxurl="<{$xoops_imageurl}>program";
var $notarobot="<{$smarty.const._MD_IMNOTAROBOT}>";
</script>
<script type="text/javascript" src="<{$xoops_imageurl}><{$themefolder}>/js/anti-robot.js"></script>
<{/if}>


<{/if}>

<{if $jid eq 'bottom'}>
<{*主選單JS*}>
 <script type="text/javascript" src="<{$xoops_imageurl}><{$themefolder}>/js/pmenu/index.js"></script>
 <{*災害示警引入*}>
 <{if $alertsncdr}>
 <script type="text/javascript" src="https://alerts.ncdr.nat.gov.tw/temp/StaticFiles/Immediately/<{$alertsncdr}>"></script>
 <script>
css2.href = "";
</script>
<link href="<{xoImgUrl}><{$themefolder}>/css/style/alerts.css" rel="stylesheet" media="all"> 
<{/if}>
 <{/if}>