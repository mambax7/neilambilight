<!-- Rss -->
<link rel="alternate" type="application/rss+xml" title="RSS" href="<{xoAppUrl backend.php}>" />
<!-- icon -->
<link rel="icon" type="image/png" href="<{$iconimg}>" />
<link rel="stylesheet" media="all" type="text/css"  title="Style sheet" href="<{xoImgUrl}>default/xoops.css"/>
<!-- Bootstrap3 -->
<link href="<{xoAppUrl modules/tadtools/bootstrap3/css/bootstrap.css}>" media="all" rel="stylesheet" />
<!-- Bootstrap3Adjustment -->
<link href="<{xoImgUrl}><{$themefolder}>/css/style/bootstrapadjustment.css" rel="stylesheet" media="all">
<!-- SmartMenus jQuery Bootstrap Addon CSS -->
<link href="<{xoAppUrl modules/tadtools/smartmenus/addons/bootstrap/jquery.smartmenus.bootstrap.css}>" media="all" rel="stylesheet"/>
<!-- font-awesome -->
<link href="<{xoAppUrl modules/tadtools/css/font-awesome/css/font-awesome.css}>" rel="stylesheet" media="all">

<!--module_header-->
<{$xoops_module_header|replace:"browse.php?Frameworks/jquery/jquery.js":"$jqueryjs"|replace:"modules/tadtools/jquery/jquery-migrate-3.0.0.min.js":"$jqueryjsmigrate"}>

<!--themes CSS--->
<link href="<{xoImgUrl}><{$themefolder}>/css/style/style.css" rel="stylesheet" media="all">
<{$modulescss}>

  <!-- 載入 BootStrap所需的js --> 
  <{includeq file="$xoops_rootpath/modules/tadtools/themes3_tpl/bootstrap_js.tpl"}> 
  <!-- 載入佈景所需的js --> 
  <{includeq file="$theme_js/jstpl.tpl" jid=top}>