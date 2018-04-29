<?php

//搜尋themesset資料夾，取出其中檔案
  $dir = XOOPS_ROOT_PATH . '/modules/neothemesadmin/class/themesset';
  $filelist="";
  if (is_dir($dir)) {
      if ($dh = opendir($dir)) {
          while (($file = readdir($dh)) !== false) {
              if (preg_match("/$file/", "{$xoops_theme}")) { 	//判斷$file中是否有與目前$xoops_theme一樣的ID

                  // if(ereg("{$xoops_theme}",$file)){  //判斷$file中是否有與目前$xoops_theme一樣的ID
                  $filelist="{$xoops_theme}.php";
              }
          }
          closedir($dh);
      }
  }


include "{$rootpath}/modules/neothemesadmin/class/themesset/$filelist";
