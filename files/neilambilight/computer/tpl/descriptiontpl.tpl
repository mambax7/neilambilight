<{if $ifinstallation}>
<aside id="descriptiontpl">
<h3><{$smarty.const._THEME_DESCRIPTION}></h3>
</aside>
<{/if}>

<{if $updatethemes and $xoops_isadmin}>
<aside id="descriptiontpl">
<h3><{$smarty.const._MA_NEODWADMIN_THEMESDESCRIPTION}><{$smarty.const._THEME_TVersiona}><{$smarty.const._MA_NEODWADMIN_THEMESID}>,<{$smarty.const._MA_NEODWADMIN_UPTODATE}><{$smarty.const._THEME_TVersiona}><{$themesversion}>,<a href="<{$updatethemesurl}>" target="_blank"><{$smarty.const._MA_NEODWADMIN_DOWNLOAD1}></a>
<a href="http://neodw.com/neil/modules/tad_uploader/index.php?of_cat_sn=14" target="_blank"><{$smarty.const._MA_NEODWADMIN_DOWNLOAD}></a></h3>
</aside>
<{/if}>



<{if $nonumber and $xoops_isadmin}>
<aside id="descriptiontpl">
<h3><{$smarty.const._MA_UNREADNUMBER}><span>(<{$nonumber}>)</span><{$smarty.const._MA_UNREADNUMBER01}><a href="<{xoAppUrl /}>modules/neothemesadmin/admin/contactustable.php" ><{$smarty.const._MA_UNREADNUMBER02}></a></h3>
</aside>
<{/if}>


<{if $modulesversion and $xoops_isadmin}>
<aside id="descriptiontpl">
<h3><{$smarty.const._MA_MODULEUPDATE}><span><{$version}></span>,<{$smarty.const._MA_MODULEUPDATE01}><span><{$justnow}></span>

<a href="<{xoAppUrl /}>modules/system/admin.php?fct=modulesadmin&op=update&module=neothemesadmin" ><{$smarty.const._MA_MODULEUPDATE02}></a></h3>
</aside>
<{/if}>