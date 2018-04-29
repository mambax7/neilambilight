<div id="neilblockmenu">
<{if $radiogstyle eq text}>  
<div class="list-group">
<{foreach item=blockmenu from=$block.blockmenu}>

<a <{$blockmenu.intwo}> href="<{$blockmenu.buttonurl}>" title="<{$blockmenu.buttontitle}>"  target="<{$blockmenu.target}>" class="list-group-item"><span class="<{$blockmenu.sortimg}> " aria-hidden="true"></span><{$blockmenu.buttontitle}></a>

<{*
<{$blockmenu.bid}>
<{$blockmenu.sortid}>

*}>
    <{/foreach}>
    </div>   
<{/if}>   



<{if $radiogstyle eq img}>  
<div class="buttonimg">

<{foreach item=blockmenu from=$block.blockmenu}>

<a  href="<{$blockmenu.buttonurl}>" title="<{$blockmenu.buttontitle}>"  target="<{$blockmenu.target}>" ><img  src="<{xoAppUrl /}><{$blockmenu.buttonimg}>"  /></a>

    <{/foreach}>

    </div>   
<{/if}>   







   
    <{if $xoops_isadmin}>    
<a style="width: 100%;" href="<{xoAppUrl /}>modules/neothemesadmin/admin/blockmenu.php?sortid=<{$menusortid}>" target="_blank" class="btn btn-primary navbar-btn" role="button"><{$menuadmin}></a>
<{/if}>
    </div>