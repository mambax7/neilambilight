<{if $id eq topcentertpl && $xoBlocks.page_topcenter}>
<article id="<{$id}>div" >
  <{foreach item=block from=$xoBlocks.page_topcenter}>
   <aside id="xo-block<{$block.module}>" class="<{cycle values="center01,center02"}> blockdiv">    
          
       <{if $block.title|truncate:7:"":true eq $smarty.const.THEME_NOBOX}>
      <{$block.content}>
      <{else}>
    <h4 class="block-title">
 <{if $block.module  neq  'system' && $block.module  neq  ''}>   
 
  <{/if}> 
  
    <span><{if $block.module  neq  'system' && $block.module  neq  '' && $block.module  neq  'neothemesadmin'}><a title="<{$block.title}>"  href="<{xoAppUrl /}>modules/<{$block.module}>"><{$block.title}></a><{else}><{$block.title}><{/if}>  </span>
    
    </h4>
                <div class="blockcontent"><{$block.content}></div>
      <{/if}>          
                 <{includeq file="$theme_name/blocksadmin.tpl"}>
  </aside>
    <{/foreach}>
</article>
<{/if}>


<{if $id eq toplefttpl && $xoBlocks.page_topleft}>
<article id="<{$id}>div" >
  <{foreach item=block from=$xoBlocks.page_topleft}>
   <aside id="xo-block<{$block.module}>" class="blockdiv">           
       <{if $block.title|truncate:7:"":true eq $smarty.const.THEME_NOBOX}>
      <{$block.content}>
      <{else}>
    <h4 class="block-title">

  
    <span><{if $block.module  neq  'system' && $block.module  neq  '' && $block.module  neq  'neothemesadmin'}><a title="<{$block.title}>"  href="<{xoAppUrl /}>modules/<{$block.module}>"><{$block.title}></a><{else}><{$block.title}><{/if}>  </span>
    
    </h4>
                <div class="blockcontent"><{$block.content}></div>
      <{/if}>          
                 <{includeq file="$theme_name/blocksadmin.tpl"}>
  </aside>
    <{/foreach}> 
</article>
<{/if}>



<{if $id eq toprighttpl && $xoBlocks.page_topright}>
<article id="<{$id}>div" >
 <{foreach item=block from=$xoBlocks.page_topright}>
    <aside id="xo-block<{$block.module}>" class="blockdiv">           
       <{if $block.title|truncate:7:"":true eq $smarty.const.THEME_NOBOX}>
      <{$block.content}>
      <{else}>
    <h4 class="block-title">

  
    <span><{if $block.module  neq  'system' && $block.module  neq  '' && $block.module  neq  'neothemesadmin'}><a title="<{$block.title}>"  href="<{xoAppUrl /}>modules/<{$block.module}>"><{$block.title}></a><{else}><{$block.title}><{/if}>  </span>
    
    </h4>
                <div class="blockcontent"><{$block.content}></div>
      <{/if}>          
                 <{includeq file="$theme_name/blocksadmin.tpl"}>
  </aside>
    <{/foreach}> 
</article>
<{/if}>


<{if $id eq bottomcentertpl && $xoBlocks.page_bottomcenter}>
<article id="<{$id}>div" >
   <{foreach item=block from=$xoBlocks.page_bottomcenter}>
    <aside id="xo-block<{$block.module}>" class="<{cycle values="center01,center02"}> blockdiv">           
       <{if $block.title|truncate:7:"":true eq $smarty.const.THEME_NOBOX}>
      <{$block.content}>
      <{else}>
    <h4 class="block-title">

  
    <span><{if $block.module  neq  'system' && $block.module  neq  '' && $block.module  neq  'neothemesadmin'}><a title="<{$block.title}>"  href="<{xoAppUrl /}>modules/<{$block.module}>"><{$block.title}></a><{else}><{$block.title}><{/if}>  </span>
    
    </h4>
                <div class="blockcontent"><{$block.content}></div>
      <{/if}>          
                 <{includeq file="$theme_name/blocksadmin.tpl"}>
  </aside>
    <{/foreach}> 
</article>
<{/if}>


<{if $id eq bottomlefttpl && $xoBlocks.page_bottomleft}>
<article id="<{$id}>div" >
  <{foreach item=block from=$xoBlocks.page_bottomleft}>
    <aside id="xo-block<{$block.module}>" class="blockdiv">           
       <{if $block.title|truncate:7:"":true eq $smarty.const.THEME_NOBOX}>
      <{$block.content}>
      <{else}>
    <h4 class="block-title">
 
  
    <span><{if $block.module  neq  'system' && $block.module  neq  '' && $block.module  neq  'neothemesadmin'}><a title="<{$block.title}>"  href="<{xoAppUrl /}>modules/<{$block.module}>"><{$block.title}></a><{else}><{$block.title}><{/if}>  </span>
    
    </h4>
                <div class="blockcontent"><{$block.content}></div>
      <{/if}>          
                 <{includeq file="$theme_name/blocksadmin.tpl"}>
  </aside>
    <{/foreach}>
</article>
<{/if}>

<{if $id eq bottomrighttpl && $xoBlocks.page_bottomright}>
<article id="<{$id}>div" >
   <{foreach item=block from=$xoBlocks.page_bottomright}>
    <aside id="xo-block<{$block.module}>" class="blockdiv">           
       <{if $block.title|truncate:7:"":true eq $smarty.const.THEME_NOBOX}>
      <{$block.content}>
      <{else}>
    <h4 class="block-title">

    <span><{if $block.module  neq  'system' && $block.module  neq  '' && $block.module  neq  'neothemesadmin'}><a title="<{$block.title}>"  href="<{xoAppUrl /}>modules/<{$block.module}>"><{$block.title}></a><{else}><{$block.title}><{/if}>  </span>
    
    </h4>
                <div class="blockcontent"><{$block.content}></div>
      <{/if}>          
                 <{includeq file="$theme_name/blocksadmin.tpl"}>
  </aside>
    <{/foreach}> 
</article>
<{/if}>