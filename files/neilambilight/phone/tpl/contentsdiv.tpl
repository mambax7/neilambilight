<{if $cenrte}>
 <{includeq file="$theme_name/contents.tpl"}> 
 <{/if}> 
<div id="contentsdiv">
 <{if $xoBlocks.page_topleft or $xoBlocks.page_topcenter or $xoBlocks.page_topright}>  <{includeq file="$theme_name/centerblocks.tpl" id="topcentertpl"}>
 
     <{includeq file="$theme_name/centerblocks.tpl" id="toplefttpl"}>  
    <{includeq file="$theme_name/centerblocks.tpl" id="toprighttpl"}> 

<{/if}>    
  
  
   
   <{if $xoopsad && $xoops_banner != ""}><{$xoops_banner}><{/if}>
   
   	<{if $xoBlocks.page_bottomleft or $xoBlocks.page_bottomright or $xoBlocks.page_bottomcenter}>
     <{includeq file="$theme_name/centerblocks.tpl" id="bottomcentertpl"}>

  <{includeq file="$theme_name/centerblocks.tpl" id="bottomlefttpl"}>  
  <{includeq file="$theme_name/centerblocks.tpl" id="bottomrighttpl"}> 

<{/if}> 
</div>