 <article id="xo-content">

     <h3 class="block-title"><span><a title="<{if !$titleif}><{$xoops_pagetitle}>:<{/if}><{$xoops_sitename}><{if $seotitle}>-<{$seotitle}><{/if}>" href="<{$httphosturl}>"><{if !$titleif}><{$xoops_pagetitle}>:<{/if}><{$xoops_sitename}><{if $seotitle}>-<{$seotitle}><{/if}></a></span></h3>
     

     
                  <div class="blockcontent"> 
                       <div id='goBack'>
<span class="glyphicon glyphicon glyphicon-arrow-left goBackl" aria-hidden="true"><a  onclick="goBack()" href='#NO'><{$smarty.const._MD_GLYPHICONARROWLEFT}></a></span><span class="glyphicon glyphicon glyphicon-home goBackr" aria-hidden="true"><a href="<{xoAppUrl /}>"><{$smarty.const._MD_GLYPHICONHOME}></a></span>
</div>
                  
                                 <{if $menuitem}><div id="modulesort" class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"> 
   <{$smarty.const._MB_MODULESSORT0}>
    <span class="caret"></span>
  </button>  
  <ul id="dropdown-menu" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
 <li role='presentation'><a title='<{$modulename}>' role='menuitem' tabindex='-1' href='<{xoAppUrl /}>modules/<{$xoops_dirname}>'>  <{$modulename}></a></li>
    <{$menuitem}>
  </ul>
</div>
<{/if}>
                    <{$xoops_contents}>
                      <{includeq file="$theme_name/instructions.tpl"}>
                  </div>
              
              
                </article>
                
                
                <script>
function goBack() {
    window.history.go(-1);
}
</script>