<div id="neilblockmenulayers">


<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
<{foreach item=blockmenulayers from=$category}>  

    <div class="mc<{$blockmenulayers.sortid}> panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
         <a data-toggle="collapse" data-parent="#accordion" title="<{$blockmenulayers.sorttitle}>" href="#munu<{$blockmenulayers.sortid}>" aria-expanded="true" aria-controls="collapseOne">
          <{$blockmenulayers.sorttitle}>
        </a>
      </h4>
    </div>   
  
   <div id="munu<{$blockmenulayers.sortid}>" class="panel-collapse collapse<{if $blockmenulayers.in}>in<{/if}> list-group" role="tabpanel" aria-labelledby="headingOne">
  
    <{foreach from=$blockmenulayers.table item=menu}> 
      <div id="m2<{$menu.bid}>" class="panel-body">
<a <{$menu.intwo}> title="<{$menu.buttontitle}>" href="<{$menu.buttonurl}>" target="<{$menu.target}>"><span class="<{$menu.glyphiconicon}> " aria-hidden="true"></span><{$menu.buttontitle}></a>
      </div>
   <{/foreach}>      
      
         <{if $xoops_isadmin}>    
<a style="width: 100%;" href="<{xoAppUrl /}>modules/neothemesadmin/admin/blockmenu.php?sortid=<{$blockmenulayers.sortid}>" target="_blank" class="btn btn-primary navbar-btn" role="button"><{$menuadmin}></a>
<{/if}> 
    </div>  
    
    <{/foreach}>    
  </div>  
</div>




















   

    </div>