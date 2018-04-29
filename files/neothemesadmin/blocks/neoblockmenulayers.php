<?php

include_once XOOPS_ROOT_PATH . "/modules/neothemesadmin/block_function.php";
include_once XOOPS_ROOT_PATH . "/modules/neothemesadmin/glyphicon.php";
function neoblockmenulayers_block_show($options)
{
    global $xoopsDB, $xoTheme, $xoopsModule;
    if (!empty($xoopsModule)) {
        $moduleid = $xoopsModule->dirname();
    }

    //擷取網址
    $weburl = $_SERVER['REQUEST_URI'];
    //比對字串找到modules
    $weburl = strpos($weburl, 'modules');

    $optionsval = preg_split('/,/', $options[2]);

    $optionscount = count($optionsval) - 1;
    foreach ($optionsval as $key => $val) {
        if ($optionscount == $key) {
            $y = '';
        } else {
            $y = '||';
        }
        $Displayfield .= "`sortid`=$val {$y}";
    }

    $invariable = $_SERVER[QUERY_STRING];

    $category = array();  //建構第一層陣列
    //01
    $sql = "select * from " . $xoopsDB->prefix('neoblockmenusort' . $mydirnumber) . "
     where {$Displayfield}
    order by  sorting ASC
    limit 0 , {$options[1]}";
    $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'], 3, mysql_error());

    while (list($sortid, $sorttitle, $sortimg, $sorting, $radiogstyle, $imgstyle) = $xoopsDB->fetchRow($result)) {
        $order = orderfunction($radiogstyle, $imgstyle);

        $table[$sortid] = array();  //建構第二層陣列
        $sql2           = "select * from " . $xoopsDB->prefix('neoblockmenubutton' . $mydirnumber) . "
     where `sortid`='{$sortid}'
    {$order}
    limit 0 , {$options[0]}";

        $result2 = $xoopsDB->query($sql2) or redirect_header($_SERVER['PHP_SELF'], 3, mysql_error());

        while (list($bid, $sortid2, $buttontitle, $buttonurl, $target, $sortyn, $modulesid, $variableid) = $xoopsDB->fetchRow($result2)) {
            $target = target($target);

            if (!empty($weburl)) { //確認為模組頁面才執行以下程式
                switch ($sortyn) {
                    case "y":         //分類頁面
                        if ($modulesid == $moduleid and $sortid2 == $sortid and !empty($invariable)) {
                            $variableidarray[] = $variableid;
                            $modulesidarray[]  = $modulesid;
                            list($in, $intwo) = menufunction($sortyn, $modulesid, $variableid, $variableidarray, $modulesidarray, $moduleid);

                            if ($intwo == true) {
                                $menuin[$sortid][$sortyn] = $in;
                                $styleintwo               = "id=focus";
                                $menua[$bid]['intwo']     = $styleintwo;
                            }
                        }

                        break;
                    case "n":   //單頁
                        if ($modulesid == $moduleid and $sortid2 == $sortid and !empty($invariable)) {
                            $variableidarray[] = $variableid;
                            $modulesidarray[]  = $modulesid;
                            list($in, $intwo) = menufunction($sortyn, $modulesid, $variableid, $variableidarray, $modulesidarray, $moduleid);

                            if ($intwo == true) {
                                $menuin[$sortid][$sortyn] = $in;
                                $styleintwo               = "id=focus";
                                $menua[$bid]['intwo']     = $styleintwo;
                            }
                        }

                        break;

                    case "z":   //模組全部
                        if ($modulesid == $moduleid and !empty($xoopsModule) and $sortid2 == $sortid) {
                            $variableidarray[] = $variableid;
                            $modulesidarray[]  = $modulesid;
                            list($in, $intwo) = menufunction($sortyn, $modulesid, $variableid, $variableidarray, $modulesidarray, $moduleid);

                            if ($intwo == true) {
                                $menuin[$sortid][$sortyn] = $in;
                                $styleintwo               = "id=focus";
                                $menua[$bid]['intwo']     = $styleintwo;
                            }
                        }

                        break;

                    default:
                        $styleintwo           = "";
                        $menua[$bid]['intwo'] = '';

                }
            }

            $glyphiconicon = glyphiconicon($sortimg);

            //第2層陣列取值
            $menua[$bid]['glyphiconicon'] = $glyphiconicon;
            $menua[$bid]['buttontitle']   = $buttontitle;
            $menua[$bid]['bid']           = $bid;
            $menua[$bid]['buttonurl']     = $buttonurl;
            $menua[$bid]['target']        = $target;

            array_push($table[$sortid], $menua[$bid]);
        }

        //第一層取值

        $menu[$sortid]['in'] = $menuin[$sortid];
        //var_dump($menuin[$sortid]);exit;

        $menu[$sortid]['sortid']      = $sortid;
        $menu[$sortid]['sorttitle']   = $sorttitle;
        $menu[$sortid]['sortimg']     = $sortimg;
        $menu[$sortid]['radiogstyle'] = $radiogstyle;

        $menu[$sortid]['table'] = $table[$sortid];

        //吧第2層陣列加入第1層陣列中
        array_push($category, $menu[$sortid]);
    }

    $GLOBALS['xoopsTpl']->assign('category', $category);
    $GLOBALS['xoopsTpl']->assign('menuadmin', _MB_MENUADMINBUTTON);

    return $category;
}

function neoblockmenulayers_block_edit($options)
{
    global $xoopsDB, $xoTheme;

    $optionsval = preg_split('/,/', $options[2]);

    $sql = "select sortid,sorttitle from " . $xoopsDB->prefix('neoblockmenusort') . " where `radiogstyle` != 'img'";
    $result = $xoopsDB->query($sql) or die($sql);
    $num = $xoopsDB->getRowsNum($result);
    while (list($sortid, $sorttitle) = $xoopsDB->fetchRow($result)) {
        foreach ($optionsval as $key => $val) {
            if ($val == $sortid) {
                $selected = "selected='selected'";
            }
        }

        $optioncenter .= "<option value='{$sortid}' {$selected}>{$sorttitle}</option>";
        unset($selected);
    }

    $form = "{$option['js']}
  <table>
   <tr><th>
  " . _MB_SHOWTHENUMBER1 . "
  </th><td>
  <INPUT type='text' name='options[0]' value='{$options[0]}'>
  </td></tr>
  <tr><th>
  " . _MB_SHOWTHENUMBER2 . "
  </th><td>
  <INPUT type='text' name='options[1]' value='{$options[1]}'>
  </td></tr>	  
  	  
  <tr><th>
  " . _MB_CHOOSECATEGORY2 . "
  </th><td>
	<select size='{$num}'  multiple name='options[2][]' id='options[0]'  >
{$optioncenter}												
	</select>
  </td></tr> 	  
   <input type='hidden' name='options[3]' value='{$num}'>   	  
 
  
  </table>
  ";
    return $form;
}
