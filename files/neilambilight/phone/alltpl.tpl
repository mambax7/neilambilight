<{assign var=theme_name value=$xoTheme->folderName|cat:'/phone/tpl'}>
<{assign var=theme_js value=$xoTheme->folderName|cat:'/phone/js'}>
<head>
<{includeq file="$theme_name/metatpl.tpl"}>
<{includeq file="$theme_name/headtpl.tpl"}>
</head>
<{includeq file="$theme_name/bodytpl.tpl"}>