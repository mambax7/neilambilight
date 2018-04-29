<?php

$xoops_theme = $GLOBALS['xoopsConfig']['theme_set'];	

$xoopsTpl->assign('xoops_module_header', "
<script>var xoopsjsurl='".XOOPS_URL."';</script>
<script src='" . XOOPS_URL . "/modules/neillibrary/js/dist/sweetalert.min.js'></script>	
<script src='" . XOOPS_URL . "/modules/tadtools/jquery/jquery.js'></script>	
<script src='" . XOOPS_URL . "/modules/". $xoopsModule->getVar("dirname")."/js/customize.js'></script>	
<script src='" . XOOPS_URL . "/modules/neillibrary/js/customize.js'></script>	
<link rel='stylesheet' type='text/css' media='screen' href='" . XOOPS_URL . "/themes/{$xoops_theme}/computer/css/style/reset.css'>
<link rel='stylesheet' type='text/css' media='screen' href='" . XOOPS_URL . "/themes/{$xoops_theme}/default/neothemesadmin.css'>
<link rel='stylesheet' type='text/css' media='screen' href='" . XOOPS_URL . "/modules/tadtools/bootstrap3/css/bootstrap.css'>
<link rel='stylesheet' type='text/css' media='screen' href='" . XOOPS_URL . "/modules/neillibrary/js/dist/sweetalert.css'>	

");

	
		?>