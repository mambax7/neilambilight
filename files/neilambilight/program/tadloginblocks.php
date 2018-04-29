<?php
      global $xoopsConfig,$xoopsTpl;


      $modhandler = xoops_gethandler('module');
      $config_handler =xoops_gethandler('config');

      $TadLoginXoopsModule = &$modhandler->getByDirname("tad_login");

      if($TadLoginXoopsModule){
        include_once XOOPS_ROOT_PATH."/modules/tad_login/function.php";
        include_once XOOPS_ROOT_PATH."/modules/tad_login/language/{$xoopsConfig['language']}/county.php";

        $config_handler =xoops_gethandler('config');
        $modConfig= &$config_handler->getConfigsByCat(0, $TadLoginXoopsModule->getVar('mid'));


	
if(!empty($modConfig['appId']) and  !empty($modConfig['secret'])){
        if (in_array('facebook', $modConfig['auth_method'])) {
            $tad_login['facebook'] = facebook_login('return');
        } else {
            $tad_login['facebook'] = '';
        }
}
        if (in_array('google', $modConfig['auth_method'])) {
            $tad_login['google'] = google_login('return');
        } else {
            $tad_login['google'] = '';
        }


        $auth_method=$modConfig['auth_method'];
        $i=0;

        foreach($auth_method as $method){
          $method_const="_".strtoupper($method);
          $loginTitle=sprintf(_TAD_LOGIN_BY,constant($method_const));

          if($method=="facebook"){
          $tlogin[$i]['link']=$tad_login['facebook'];
          }elseif($method=="google"){
            $tlogin[$i]['link']=$tad_login['google'];
          }else{
            $tlogin[$i]['link']=XOOPS_URL."/modules/tad_login/index.php?login&op={$method}";
          }
          $tlogin[$i]['img']=XOOPS_URL."/modules/tad_login/images/{$method}.png";
          $tlogin[$i]['text']=$loginTitle;

          $i++;
        }
        $xoopsTpl->assign('tlogin',$tlogin);
      }

	
	
	
	?>