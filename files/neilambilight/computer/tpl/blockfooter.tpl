<{if $id eq footerleft && $xoBlocks.footer_left}>
<article id="<{$id}>div" class="td">
  <{foreach item=block from=$xoBlocks.footer_left}>
      <aside id="xo-block<{$block.module}>" class="blockdiv">           
       <{if $block.title|truncate:7:"":true eq $smarty.const.THEME_NOBOX}>
      <{$block.content}>
      <{else}>
    <h4 class="block-title">
 <{if $block.module  neq  'system' && $block.module  neq  '' && $block.module  neq  'neothemesadmin'}>   
  <div id="more"><a href="<{xoAppUrl /}>modules/<{$block.module}>">more</a></div>
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


<{if $id eq footercenter && $xoBlocks.footer_center}>
<article id="<{$id}>div" class="td">
   <{foreach item=block from=$xoBlocks.footer_center}>
    <aside id="xo-block<{$block.module}>" class="blockdiv">           
       <{if $block.title|truncate:7:"":true eq $smarty.const.THEME_NOBOX}>
      <{$block.content}>
      <{else}>
    <h4 class="block-title">
 <{if $block.module  neq  'system' && $block.module  neq  '' && $block.module  neq  'neothemesadmin'}>   
  <div id="more"><a href="<{xoAppUrl /}>modules/<{$block.module}>">more</a></div>
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



<{if $id eq footerright && $xoBlocks.footer_right}>
<article id="<{$id}>div" class="td">
   <{foreach item=block from=$xoBlocks.footer_right}>
    <aside id="xo-block<{$block.module}>" class="blockdiv">           
       <{if $block.title|truncate:7:"":true eq $smarty.const.THEME_NOBOX}>
      <{$block.content}>
      <{else}>
    <h4 class="block-title">
 <{if $block.module  neq  'system' && $block.module  neq  '' && $block.module  neq  'neothemesadmin'}>   
  <div id="more"><a href="<{xoAppUrl /}>modules/<{$block.module}>">more</a></div>
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

