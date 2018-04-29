<{assign var=theme_name value=$xoTheme->folderName|cat:'/computer/tpl'}>
<{assign var=theme_js value=$xoTheme->folderName|cat:'/computer/js'}>
<head>
<{includeq file="$theme_name/metatpl.tpl"}>
<{includeq file="$theme_name/headtpl.tpl"}>
</head>
<{includeq file="$theme_name/bodytpl.tpl"}>