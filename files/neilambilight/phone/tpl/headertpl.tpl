
<header id="header">
<figure id="logobottom">

<figcaption <{if $logofileexists}> id="logoimga"<{else}>id="logoimgb" <{/if}>>
<strong><a title="<{$smarty.const._THEME_WELCOME01}><{$xoops_sitename}><{$smarty.const._THEME_WELCOME02}>"  href="<{xoAppUrl /}>" ><{$smarty.const._THEME_WELCOME01}><{$xoops_sitename}><{$smarty.const._THEME_WELCOME02}></a></strong>
</figcaption>
</figure>

<{if $lineYN}>
<div id="linebutton"><a title="<{$smarty.const._THEME_LINE01}><{$xoops_sitename}>LINE<{$smarty.const._THEME_LINE02}>" href="http://line.naver.jp/ti/p/~<{$line}>"><{$smarty.const._THEME_LINE01}><{$xoops_sitename}>LINE<{$smarty.const._THEME_LINE02}></a></div>
<{/if}>

<{if $fbYN}>
<div id="fbmessagesbutton"><a href="https://www.messenger.com/t/<{$fbuID}>" title="<{$smarty.const._THEME_LINE01}><{$xoops_sitename}>fb<{$smarty.const._THEME_FB02}>" target="_blank"><{$smarty.const._THEME_FB01}><{$xoops_sitename}>fb<{$smarty.const._THEME_FB02}></a></div>
<{/if}>

<em><{$tpl_pagetitle}></em>

<{if $xoops_isadmin}>
<div id="themesadmin">
<a  title="<{$smarty.const._THEME_THEMEADMIN}>"  href="<{xoAppUrl /}>modules/neothemesadmin/admin/index.php"><{$smarty.const._THEME_THEMEADMIN}></a></div>
<{/if}>

<div id="slowdivbotton0" class="eachclass" title="<{$smarty.const._THEME_KEYWORDBUTTON}>"></div>

<div title="<{$smarty.const._THEME_SEARCCH01}>" id="slowdivbotton2" class="eachclass"></div>

<div title="<{$smarty.const._THEME_MENU01}>" id="slowdivbotton4" class="eachclass"></div>






<div id="headerform" class="slowdiv4 slowdiv5">
<div id="slowdivbotton5" class="kclose eachclass">
<a title="<{$smarty.const._THEME_Close}>" mane="#NO">
<{$smarty.const._THEME_Close}></a></div>
<ul>
<{if $switching  eq '1'}> 
<li ><span class="glyphicon glyphicon-arrow-right"  aria-hidden="true"><a title="<{$smarty.const._THEME_MENU02}>" href="<{xoAppUrl /}><{$smarty.const._THEME_MENU02LINK}>"><{$smarty.const._THEME_MENU02}></a></span></li>
<{if $xoops_isadmin}>
<li>
<span class="glyphicon glyphicon-arrow-right"  aria-hidden="true"><a title="<{$smarty.const._THEME_MENU03}>" href="<{xoAppUrl /}>admin.php"><{$smarty.const._THEME_MENU03}></a></span>
</li>
<span class="glyphicon glyphicon-arrow-right"  aria-hidden="true"><a title="<{$smarty.const._THEME_MENU10}>" href="<{xoAppUrl /}>modules/system/admin.php?fct=maintenance"><{$smarty.const._THEME_MENU10}></a></span>
</li>
<{/if}>  
 
<{if $xoops_isuser}>  

<li><span class="glyphicon glyphicon-arrow-right"  aria-hidden="true"><a title="<{$smarty.const._THEME_MENU08}>" href="<{xoAppUrl /}><{$smarty.const._THEME_MENU08LINK}>"><{$smarty.const._THEME_MENU08}></a></span></li>

<li><span class="glyphicon glyphicon-arrow-right"  aria-hidden="true"><a title="<{$smarty.const._THEME_MENU04}>" href="<{xoAppUrl /}><{$smarty.const._THEME_MENU04LINK}>"><{$smarty.const._THEME_MENU04}></a></span></li>
 <{else}> 
<li><span class="glyphicon glyphicon-arrow-right"  aria-hidden="true"><a title="<{$smarty.const._THEME_MENU05}>" href="<{xoAppUrl /}><{$smarty.const._THEME_MENU05LINK}>"><{$smarty.const._THEME_MENU05}></a></span></li>
<{/if}>



<li><span class="glyphicon glyphicon-arrow-right"  aria-hidden="true"><a title="<{$smarty.const._THEME_MENU06}>" href="<{xoAppUrl /}><{$smarty.const._THEME_MENU06LINK}>"><{$smarty.const._THEME_MENU06}></a></span></li>
<li><span class="glyphicon glyphicon-arrow-right"  aria-hidden="true"><a title="<{$smarty.const._THEME_MENU07}>" href="<{xoAppUrl /}><{$smarty.const._THEME_MENU07LINK}>"><{$smarty.const._THEME_MENU07}></a></span></li>
<{/if}>

<{if $switching  eq '2'}> 

<{foreach item=rmenua from=$rmenua}>
<li><span class="glyphicon glyphicon-arrow-right"  aria-hidden="true"><a target="<{$rmenua.target}>" href="<{$rmenua.url}>" title="<{$rmenua.title}>" ><{$rmenua.title}></a></span></li>
<{/foreach}>  
 <{/if}>

<{if $switching  eq '3'}>
<{foreach item=rmenua from=$rmenub}>

<li><span class="glyphicon glyphicon-arrow-right"  aria-hidden="true"><a target="_self" href="<{xoAppUrl /}>modules/<{$rmenua.dirname}>" title="<{$rmenua.name}>"><{$rmenua.name}></a></span></li>

<{/foreach}>  
 <{/if}>


</ul>







</div>

<div id="playerimgdiv"> 

<a href="<{$flashimg.url}>" title="<{$smarty.const._THEME_WELCOME01}><{$xoops_sitename}><{$smarty.const._THEME_WELCOME02}><{if $flashimg.content}>-<{$flashimg.content}><{/if}>" target="<{$flashimg.target}>"><img  src="<{$flashimg.imgid}>"></a>
</div>
<{includeq file="$theme_name/alstpl.tpl"}> 

</header>