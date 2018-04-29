
<{if $id eq left && $xoBlocks.canvas_left}>
<article id="<{$id}>div" >
   
        <{foreach item=block from=$xoBlocks.canvas_left}>
  <aside id="xo-block<{$block.module}>" class="<{cycle values="left01,left02"}> blockdiv">           
       <{if $block.title|truncate:7:"":true eq $smarty.const.THEME_NOBOX}>
      <{$block.content}>
      <{else}>
    <h4 class="block-title"><span><{if $block.module  neq  'system' && $block.module  neq  '' && $block.module  neq  'neothemesadmin'}><a title="<{$block.title}>"  href="<{xoAppUrl /}>modules/<{$block.module}>"><{$block.title}></a><{else}><{$block.title}><{/if}>  </span></h4>
                <div class="blockcontent"><{$block.content}></div>
      <{/if}>          
                 <{includeq file="$theme_name/blocksadmin.tpl"}>
  </aside>
        <{/foreach}>
<{if $fbfansurlYN}>
<div id="fbfansbutton"><a href="<{$fbfansurl}>" title="<{$xoops_sitename}><{$smarty.const.THEME_FBBUTTON}>" target="_blank"><{$xoops_sitename}><{$smarty.const.THEME_FBBUTTON}></a></div>
<{/if}>
<{if $contactusYN}>
<div id="contactus"><a title="<{$xoops_sitename}><{$smarty.const.THEME_CONTACTUS}>" target="_blank" href="<{$mailto}><{$contactus}>"><{$xoops_sitename}><{$smarty.const.THEME_CONTACTUS}></a></div>
<{/if}>
</article>
<{/if}>




<{if $id eq right && $xoBlocks.canvas_right}>
<article  id="<{$id}>div" >
   
        <{foreach item=block from=$xoBlocks.canvas_right name=canvasright}>
          <aside id="xo-block<{$block.module}>" 
           <{if $smarty.foreach.canvasright.iteration eq '1'}>
          class="r1
           <{else}>
          class="<{cycle values="right01,right02"}>
          <{/if}>
           blockdiv r<{$smarty.foreach.canvasright.iteration}>">           
       <{if $block.title|truncate:7:"":true eq $smarty.const.THEME_NOBOX}>
      <{$block.content}>
      <{else}>
    <h4 class="block-title"><span><{if $block.module  neq  'system' && $block.module  neq  '' && $block.module  neq  'neothemesadmin'}><a title="<{$block.title}>"  href="<{xoAppUrl /}>modules/<{$block.module}>"><{$block.title}></a><{else}><{$block.title}><{/if}>  </span></h4>
                <div class="blockcontent"><{$block.content}>
                  <{includeq file="$theme_name/blocksadmin.tpl"}>
                </div>
      <{/if}>          
               
  </aside>
        <{/foreach}>
   
</article><{/if}>
