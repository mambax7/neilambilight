 <article id="xo-content">
<div id="topbox">  <a title="<{$smarty.const.THEME_TOPBOXSHOW}>"  href="#"><{$smarty.const.THEME_TOPBOXSHOW}></a></div>
   
               <{if $menuitem}><div id="modulesort" class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"> 
   <{$smarty.const._MB_MODULESSORT0}>
    <span class="caret"></span>
  </button>  
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
 <li role='presentation'><a title='<{$modulename}>' role='menuitem' tabindex='-1' href='<{xoAppUrl /}>modules/<{$xoops_dirname}>'>  <{$modulename}></a></li>
    <{$menuitem}>
  </ul>
</div>
<{/if}>

     <h3 class="block-title"><span><a title="<{if $xoops_pagetitle}><{$xoops_pagetitle}>:<{/if}><{$xoops_sitename}><{if $seotitle}>-<{$seotitle}><{/if}>" href="<{$httphosturl}>"><{if $xoops_pagetitle}><{$xoops_pagetitle}>:<{/if}><{$xoops_sitename}><{if $seotitle}>-<{$seotitle}><{/if}></a></span></h3>
                  <div class="blockcontent">  
               
            

                  
                   <{$xoops_contents}>
                      <{includeq file="$theme_name/instructions.tpl"}>
                  </div>
              
              
                </article>