<div id="<{$centerdivwcss}>">
 <{if $xoBlocks.page_topleft or $xoBlocks.page_topcenter or $xoBlocks.page_topright}>  <{includeq file="$theme_name/centerblocks.tpl" id="topcentertpl"}>
<div class="table">
  <div class="tr"> 
     <{includeq file="$theme_name/centerblocks.tpl" id="toplefttpl"}>  
    <{includeq file="$theme_name/centerblocks.tpl" id="toprighttpl"}> 
    </div>
</div>
<{/if}>    
 
    <{if $xoops_contents|strip && ($xoops_contents|strip != ' ') }>             
    <{includeq file="$theme_name/contents.tpl"}>                
   <{/if}>

   <{if $xoopsad && $xoops_banner != ""}><{$xoops_banner}><{/if}>
   
   	<{if $xoBlocks.page_bottomleft or $xoBlocks.page_bottomright or $xoBlocks.page_bottomcenter}>
     <{includeq file="$theme_name/centerblocks.tpl" id="bottomcentertpl"}>
     <div class="table">
  <div class="tr"> 
  <{includeq file="$theme_name/centerblocks.tpl" id="bottomlefttpl"}>  
  <{includeq file="$theme_name/centerblocks.tpl" id="bottomrighttpl"}> 
  </div>
</div>
<{/if}> 
</div>