<header id="header">
<figure id="logobottom">
<div id="logotext" ><{$smarty.const._THEME_WELCOME01}><{$xoops_sitename}><{$smarty.const._THEME_WELCOME02}></div>
<figcaption <{if $logofileexists}> id="logoimga"<{else}>id="logoimgb" <{/if}>>
<strong><a  href="<{xoAppUrl /}>" ><{$smarty.const._THEME_WELCOME01}><{$xoops_sitename}><{$smarty.const._THEME_WELCOME02}></a></strong>
</figcaption>
</figure>
<em><{$tpl_pagetitle}></em>
<{if $lineYN}>
<div id="linebutton"><a href="http://line.naver.jp/ti/p/~<{$line}>" title="<{$smarty.const._THEME_LINE01}><{$xoops_sitename}>LINE<{$smarty.const._THEME_LINE02}>" target="_blank"><{$smarty.const._THEME_LINE01}><{$xoops_sitename}>LINE<{$smarty.const._THEME_LINE02}></a></div>
<{/if}>
<{if $fbYN}>
<div id="fbmessagesbutton"><a href="https://www.messenger.com/t/<{$fbuID}>" title="<{$smarty.const._THEME_LINE01}><{$xoops_sitename}>FB<{$smarty.const._THEME_FB02}>" target="_blank"><{$smarty.const._THEME_FB01}><{$xoops_sitename}>fb<{$smarty.const._THEME_FB02}></a></div>
<{/if}>
<address id="address">
<{if $xoops_isuser}>
<a title="<{$xoops_uname}>" href="<{xoAppUrl /}>user.php"><{$xoops_uname}></a><{$smarty.const._THEME_USER01}>
<a title="<{$smarty.const._THEME_USER02}>" href="<{xoAppUrl /}>user.php"><{$smarty.const._THEME_USER02}></a>
   <{xoInboxCount assign=pmcount}>
  <a id="viewpmsg" title="<{$smarty.const._THEME_USERPM}>" href="<{xoAppUrl /viewpmsg.php}>"><{if $pmcount}>(<{$pmcount}>)<{else}>(0)<{/if}></a>
<{else}>
<a title="<{$smarty.const._THEME_MENU05}>" href="<{xoAppUrl /}>user.php">[<{$smarty.const._THEME_MENU05}>]</a>
<a title="<{$smarty.const._THEME_MENU09}>" href="<{xoAppUrl /}>register.php">[<{$smarty.const._THEME_MENU09}>]</a>
<{/if}>
</address>
<{if $xoops_isadmin}>
<div id="themesadmin">
<a  title="<{$smarty.const._THEME_THEMEADMIN}>"  href="<{xoAppUrl /}>modules/neothemesadmin/admin/index.php"><{$smarty.const._THEME_THEMEADMIN}></a></div>
<{/if}>
<div id="slowdivbotton0" class="eachclass" title="<{$smarty.const._THEME_KEYWORDBUTTON}>"></div>

<div id="headerform">
<form id="form" name="form">
    <select onchange="MM_jumpMenu('parent',this,0)" >  
    <option  selected="selected"><{$smarty.const._THEME_MENU01}></option>
<{if $switching  eq '1'}>      
<option title="<{$smarty.const._THEME_MENU02}>" value="<{xoAppUrl /}><{$smarty.const._THEME_MENU02LINK}>"><{$smarty.const._THEME_MENU02}> </option> 
<{if $xoops_isadmin}>
<option title="<{$smarty.const._THEME_MENU03}>" value="<{xoAppUrl /}>admin.php"><{$smarty.const._THEME_MENU03}> </option>  
<option title="<{$smarty.const._THEME_MENU10}>" value="<{xoAppUrl /}>modules/system/admin.php?fct=maintenance"><{$smarty.const._THEME_MENU10}> </option>
<{/if}>   
<{if $xoops_isuser}> 
    <option title="<{$smarty.const._THEME_MENU08}>" value="<{xoAppUrl /}><{$smarty.const._THEME_MENU08LINK}>"><{$smarty.const._THEME_MENU08}></option>  
    <option title="<{$smarty.const._THEME_MENU04}>" value="<{xoAppUrl /}><{$smarty.const._THEME_MENU04LINK}>"><{$smarty.const._THEME_MENU04}></option>
 <{else}>  
 <option title="<{$smarty.const._THEME_MENU05}>" value="<{xoAppUrl /}><{$smarty.const._THEME_MENU05LINK}>"><{$smarty.const._THEME_MENU05}> </option>
<{/if}> 
<option title="<{$smarty.const._THEME_MENU06}> " value="<{xoAppUrl /}><{$smarty.const._THEME_MENU06LINK}>"><{$smarty.const._THEME_MENU06}></option>

 <option title="<{$smarty.const._THEME_MENU07}>" value="<{xoAppUrl /}><{$smarty.const._THEME_MENU07LINK}>"><{$smarty.const._THEME_MENU07}></option> 
<{/if}>

<{if $switching  eq '2'}> 

<{foreach item=rmenua from=$rmenua}>
<option target="<{$rmenua.target}>" title="<{$rmenua.title}>" value="<{$rmenua.url}>"><{$rmenua.title}></option>
<{/foreach}>  
 <{/if}>
<{if $switching  eq '3'}>
<{foreach item=rmenua from=$rmenub}>
<option target="_self" title="<{$rmenua.name}>" value="<{xoAppUrl /}>modules/<{$rmenua.dirname}>"><{$rmenua.name}></option>
<{/foreach}>  
 <{/if}>
    </select>
</form>
</div>

<div title="<{$smarty.const._THEME_SEARCCH01}>" id="slowdivbotton2" class="eachclass"></div>
<{includeq file="$theme_name/playerimgtpl.tpl"}> 

</header>
