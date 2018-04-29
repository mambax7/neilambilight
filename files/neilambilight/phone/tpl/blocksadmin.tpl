<{if $xoops_isadmin}>
<div id="blocksadmin">
<div title="<{$smarty.const.THEME_BLOCKSADMIN01A}>" id="adminimg01" class="adminimgid<{$block.id}>"></div>
<div title="<{$smarty.const.THEME_BLOCKSADMIN01B}>" id="adminimg01a" class="adminimgaid<{$block.id}>"></div>
<div id="adminimgbox" class="adminimgbox<{$block.id}>">
<ul>
<li><div id="adminimg02"><a title="<{$smarty.const.THEME_BLOCKSADMIN02}>" href="<{xoAppUrl /}>modules/system/admin.php?fct=blocksadmin&op=edit&bid=<{$block.id}>" target="_blank"><{$smarty.const.THEME_BLOCKSADMIN02}></a></div></li>

<li><div id="adminimg03"><a title="<{$smarty.const.THEME_BLOCKSADMIN03}>"  href="<{xoAppUrl /}>modules/system/admin.php?fct=blocksadmin&op=clone&bid=<{$block.id}>" target="_blank"><{$smarty.const.THEME_BLOCKSADMIN03}></a></div></li>

<{if $block.module &&  $block.module neq 'system'}>
<li><div id="adminimg04"><a title="<{$smarty.const.THEME_BLOCKSADMIN04}>" href="<{xoAppUrl /}>modules/<{$block.module}>/admin/index.php" target="_blank"><{$smarty.const.THEME_BLOCKSADMIN04}></a></div></li>
<{elseif $block.module neq 'system'}>
<li><div id="adminimg05"><a title="<{$smarty.const.THEME_BLOCKSADMIN05}>" href="<{xoAppUrl /}>modules/system/admin.php?fct=blocksadmin&op=delete&bid=<{$block.id}>" target="_blank"><{$smarty.const.THEME_BLOCKSADMIN05}></a></div></li>

<{/if}>

</ul>


</div>
</div>
<div style="clear: both;"></div>
<{/if}>


<script type="text/javascript">
$(document).ready(function(){
  $(".adminimgid<{$block.id}>").click(function(){
	 $('.adminimgid<{$block.id}>').toggleClass('adminimg-transition');	
	    $(".adminimgbox<{$block.id}>").css({"animation-name":"slidein","opacity":"0.9","display":"block"}); 
  });
});


$(document).ready(function(){
  $(".adminimgaid<{$block.id}>").click(function(){
	 $('.adminimgid<{$block.id}>').toggleClass('adminimg-transition');
	 	$(".adminimgbox<{$block.id}>").css("display", "none");
  });
});


$(window).load(function() {	
　　$(".adminimgid<{$block.id}>,.adminimgaid<{$block.id}>").css("cursor", "pointer");

});

</script>