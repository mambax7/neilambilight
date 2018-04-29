<?php
include_once XOOPS_ROOT_PATH . "/modules/neothemesadmin/block_function.php";

function neoblockmenubutton_block_show($options)
{
    global $xoopsDB, $xoTheme, $xoopsModule;
    if (!empty($xoopsModule)) {
        $moduleid = $xoopsModule->dirname();
    }
    //擷取網址
    $weburl = $_SERVER['REQUEST_URI'];
    //比對字串找到modules
    $weburl = strpos($weburl, 'modules');

    $invariable = $_SERVER[QUERY_STRING];
    //搜尋資料表判斷圖檔還是文字

    $sql    = "select radiogstyle,imgstyle from " . $xoopsDB->prefix("neoblockmenusort");
    $result = $xoopsDB->query($sql);

    if (!empty($result)) {
        $sql = "select radiogstyle,imgstyle  from " . $xoopsDB->prefix('neoblockmenusort') . " where `sortid` = '{$options[0]}'";
        $result = $xoopsDB->query($sql) or die($sql);
        list($radiogstyle, $imgstyle) = $xoopsDB->fetchRow($result);
    }

    if ($radiogstyle == text) {  //如果分類是文字

        include_once XOOPS_ROOT_PATH . "/modules/neothemesadmin/glyphicon.php";
        $sql = "select * from " . $xoopsDB->prefix('neoblockmenubutton' . $mydirnumber) . "
     where `sortid`='{$options[0]}'
    order by  orderid ASC
    limit 0 , {$options[1]}";

        $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'], 3, mysql_error());
        $myts =& MyTextSanitizer::getInstance();
        while (list($bid, $sortid, $buttontitle, $buttonurl, $target, $sortyn, $modulesid, $variableid) = $xoopsDB->fetchRow($result)) {


            /*
            if($sortyn!=y){ //如果按鈕類型不是分類

            if($modulesid==$moduleid and ($invariable==$variableid and !empty($xoopsModule)) and $sortid==$sortid){
            $variableidarray[]=$variableid;
            $modulesidarray[]=$modulesid;
            list($in,$intwo) = menufunction($sortyn,$modulesid,$variableid,$variableidarray,$modulesidarray,$moduleid);
            $menuin[$sortid]=$in;
            if($intwo==true){
            $styleintwo="id=focus";
            //$menua[$bid]['intwo']= $styleintwo;
            $block['blockmenu'][$bid]['intwo']=$styleintwo;
            }

            }
            }else{ //如果按鈕類是分類
            if($modulesid==$moduleid and $sortid==$sortid and !empty($invariable)){
            $variableidarray[]=$variableid;
            $modulesidarray[]=$modulesid;
            list($in,$intwo) = menufunction($sortyn,$modulesid,$variableid,$variableidarray,$modulesidarray,$moduleid);
            $menuin[$sortid]=$in;
            if($intwo==true){
            $styleintwo="id=focus";
            //$menua[$bid]['intwo']= $styleintwo;
            $block['blockmenu'][$bid]['intwo']=$styleintwo;
            }

            }
            }
            */

            if (!empty($weburl)) { //確認為模組頁面才執行以下程式

                switch ($sortyn) {
                    case "y":         //分類頁面
                        if ($modulesid == $moduleid and !empty($invariable)) {
                            $variableidarray[] = $variableid;
                            $modulesidarray[]  = $modulesid;
                            list($in, $intwo) = menufunction($sortyn, $modulesid, $variableid, $variableidarray, $modulesidarray, $moduleid);

                            if ($intwo == true) {
                                $menuin[$sortid][$sortyn]          = $in;
                                $styleintwo                        = "id=focus";
                                $block['blockmenu'][$bid]['intwo'] = $styleintwo;
                            }
                        }

                        break;
                    case "n":   //單頁

                        if ($modulesid == $moduleid and !empty($invariable)) {
                            $variableidarray[] = $variableid;
                            $modulesidarray[]  = $modulesid;
                            list($in, $intwo) = menufunction($sortyn, $modulesid, $variableid, $variableidarray, $modulesidarray, $moduleid);

                            if ($intwo == true) {
                                $menuin[$sortid][$sortyn]          = $in;
                                $styleintwo                        = "id=focus";
                                $block['blockmenu'][$bid]['intwo'] = $styleintwo;
                            }
                        }

                        break;

                    case "z":   //模組全部
                        if ($modulesid == $moduleid and !empty($xoopsModule)) {
                            $variableidarray[] = $variableid;
                            $modulesidarray[]  = $modulesid;
                            list($in, $intwo) = menufunction($sortyn, $modulesid, $variableid, $variableidarray, $modulesidarray, $moduleid);

                            if ($intwo == true) {
                                $menuin[$sortid][$sortyn]          = $in;
                                $styleintwo                        = "id=focus";
                                $block['blockmenu'][$bid]['intwo'] = $styleintwo;
                            }
                        }

                        break;

                    default:
                        $styleintwo                        = "";
                        $block['blockmenu'][$bid]['intwo'] = '';

                }
            }

            if (!empty($sortid)) {
                $sqla = "select sortimg
    from " . $xoopsDB->prefix('neoblockmenusort') . "
     where `sortid`='{$sortid}'";
                $resulta = $xoopsDB->query($sqla) or redirect_header($_SERVER['PHP_SELF'], 3, mysql_error());
                list($sortimg) = $xoopsDB->fetchRow($resulta);
            }

            $glyphiconicon = glyphiconicon($sortimg);

            $block['blockmenu'][$bid]['sortimg']     = $glyphiconicon;
            $block['blockmenu'][$bid]['bid']         = $bid;
            $block['blockmenu'][$bid]['sortid']      = $sortid;
            $block['blockmenu'][$bid]['buttontitle'] = $buttontitle;
            $block['blockmenu'][$bid]['buttonurl']   = $buttonurl;

            switch ($target) {
                case "0":
                    $target = '_self';
                    break;
                case "1":
                    $target = '_blank';
                    break;
            }
            $block['blockmenu'][$bid]['target'] = $target;
        }
    }

    if ($radiogstyle == img) {  //如果分類是圖片

        $img_date    = date("H:i:s");
        $xoops_theme = $GLOBALS['xoopsConfig']['theme_set'];

        switch ($imgstyle) {
            case "random":
                $order = "order by RAND()";
                break;
            case "sorting":
                $order = "order by  orderid ASC";
                break;

        }

        $sql = "select bid,sortid,buttontitle,buttonurl,target,buttonimg  from " . $xoopsDB->prefix('neoblockmenubutton' . $mydirnumber) . "
     where `sortid`='{$options[0]}'
   {$order}
    limit 0 , {$options[1]}";

        $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'], 3, mysql_error());
        $myts =& MyTextSanitizer::getInstance();
        while (list($bid, $sortid, $buttontitle, $buttonurl, $target, $buttonimg) = $xoopsDB->fetchRow($result)) {
            $block['blockmenu'][$bid]['bid']         = $bid;
            $block['blockmenu'][$bid]['sortid']      = $sortid;
            $block['blockmenu'][$bid]['buttontitle'] = $buttontitle;
            $block['blockmenu'][$bid]['buttonurl']   = $buttonurl;

            $block['blockmenu'][$bid]['buttonimg'] = "uploads/{$xoops_theme}/{$buttonimg}.png?state={$img_date}";
            switch ($target) {
                case "0":
                    $target = '_self';
                    break;
                case "1":
                    $target = '_blank';
                    break;
            }
            $block['blockmenu'][$bid]['target'] = $target;
        }
    }

    $GLOBALS['xoopsTpl']->assign('radiogstyle', $radiogstyle);
    $GLOBALS['xoopsTpl']->assign('menusortid', $options[0]);
    $GLOBALS['xoopsTpl']->assign('menuadmin', _MB_MENUADMINBUTTON);

    return $block;
}

//區塊編輯函式
function neoblockmenubutton_block_edit($options)
{
    global $xoopsDB, $xoTheme;

    $sql = "select sortid,sorttitle from " . $xoopsDB->prefix('neoblockmenusort');
    $result = $xoopsDB->query($sql) or die($sql);
    while (list($sortid, $sorttitle) = $xoopsDB->fetchRow($result)) {
        if ($options[0] == $sortid) {
            $selected = "selected='selected'";
        }
        $optioncenter .= "<option value='{$sortid}' {$selected}>{$sorttitle}</option>";
        unset($selected);
    }

    $form = "{$option['js']}
  <table>
  <tr><th>
  " . _MB_CHOOSECATEGORY . "
  </th><td>
	<select size='1'  name='options[0]' id='options[0]'  >
{$optioncenter}												
	</select>
  </td></tr> 	  
  	  
  <tr><th>
  " . _MB_SHOWTHENUMBER . "
  </th><td>
  <INPUT type='text' name='options[1]' value='{$options[1]}'>
  </td></tr>
 
  
  </table>
  ";
    return $form;
}
