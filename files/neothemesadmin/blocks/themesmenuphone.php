<?php

//先建構class($themesetclass)
$themesetclass = new  themesetclass;
$topvsplit     = $themesetclass->themespublicb($variableok, $setting);
list($variableoka, $settinga) = $topvsplit;

//切割$variableok陣列內容
$variablesplit = preg_split('/;/', $variableoka);
$menulimit     = $variablesplit[6];          //按鈕上限

$xoopsurl  = XOOPS_URL . "";
$menuauto  = $fieldsplit[11];
$menuautoa = $fieldsplit[12];

//判斷是否啟用按鈕底70%透明度特效
if ($fieldsplit[13] == 1) {
    $menuautob  = 'icom10.png';
    $menuautoba = 'icom11.png';
} else {
    $menuautoc  = '#F48C42';
    $menuautoca = '#DDA439';
}

$selectdb = $xoopsDB->prefix('neothemesmenu');
$sql      = "select manugroup  from $selectdb  where `master_slave`=1  order by  manugroup  asc";   //小到大
$result   = $xoopsDB->query($sql);
while (list($manugroup) = $xoopsDB->fetchRow($result)) {
    $group[] = $manugroup;
}

$sqlas   = "select  manugroup  from  $selectdb  where  `master_slave`=1    order  by  nnumber  asc";   //小到大
$resulta = $xoopsDB->query($sqlas);
while (list($manugroupa) = $xoopsDB->fetchRow($resulta)) {
    $groupa[] = $manugroupa;
}

$y = count($group);
if ($y > $menulimit) {
    $y = $menulimit;
}
//主迴圈
$category = array();  //建構第一層陣列
for ($k = 1; $k <= $y; $k++) {
    $t = $k - 1;
    $groupa[$t];

    $sql1    = "select * from  $selectdb    where `master_slave`=1  and  `manugroup`=$groupa[$t]";   //小到大
    $result1 = $xoopsDB->query($sql1);
    while (list($nsn, $nnumber, $master_slave, $manugroup, $content, $url, $target, $post_date) = $xoopsDB->fetchRow($result1)) {
        $urlsplit = preg_split('/,/', $url);

        //先建構class($target)
        $targetclass = new  targetclass;
        //將$target變數送入class中，然後取得對應的值
        $target = $targetclass->functionpublica($target);

        $w         = "{$k}1";
        $topic[$k] = array();  //建構第二層陣列
        $sql2      = "select * from  $selectdb     where `master_slave`=2   and  `manugroup`=$groupa[$t]  order by  nnumber  asc";   //小到大
        $result2   = $xoopsDB->query($sql2);
        while (list($nsna, $nnumbera, $master_slavea, $manugroupa, $contenta, $urla, $targeta, $post_datea) = $xoopsDB->fetchRow($result2)) {


            //將$target變數送入class中，然後取得對應的值
            $targeta = $targetclass->functionpublica($targeta);

            $threepic[$w] = array();  //建構第三層陣列
            $sql3         = "select * from  $selectdb     where `master_slave`=3   and   `snid`=$nsna   order by  nnumber  asc";   //小到大
            $resultb[$w]  = $xoopsDB->query($sql3);
            while (list($nsnb, $nnumberb, $master_slaveb, $manugroupb, $contentb, $urlb, $targetb, $post_dateb) = $xoopsDB->fetchRow($resultb[$w])) {

                //將$target變數送入class中，然後取得對應的值
                $targetb = $targetclass->functionpublica($targetb);

                //第3層陣列取值

                $menub[$w]['threepic_name'] = "<a title='$contentb'  target='$targetb' href='$urlb'>$contentb</a>";
                $menub[$w]['threepic_name'];
                $item_threepic[$w] = $menub[$w];
                //將值推入$threepic[$k]陣列中
                array_push($threepic[$w], $item_threepic[$w]);
            }

            //第2層陣列取值

            $urla = empty($urla) ? '#NO' : $urla;

            if (strtoupper($urla) != '#NO') {
                $menua[$w]['topic_name'] = "<a class='nemu2c ' title='$contenta'  target='$targeta' href='$urla'>$contenta</a>";
            } else {
                $menua[$w]['topic_name'] = (string)$contenta;
            }

            $item_topic[$w] = $menua[$w];

            //吧第3層陣列加入第2層陣列中
            $item_topic[$w]['threepic'] = $threepic[$w];

            //將值推入$topic[$k]陣列中
            array_push($topic[$k], $item_topic[$w]);

            $w++;
        }

        //echo $url;

        //取得主按鈕字串數
        $menun[$k] = strlen($content);

        //設定過濾條件
        /*$menuaCheck[1] = "$xoopsurl/modules";
        $menuaCheck[2] = "/";
        $menuaCheck[3] = "#A";
        $menuaCheck[4] = "tadnews";
        
        
          $stringa1= ereg_replace("$menuaCheck[1]", "", $url);
          $stringa2= ereg_replace("$menuaCheck[2]", "", $stringa1);
          $stringa3= ereg_replace("{$menuaCheck[3]}", "", $stringa2);
          $stringa4= ereg_replace("{$menuaCheck[4]}", "ERTYU", $stringa3);
        
        
        //新增加判斷按鈕自動反向手動反向，($menuauto ==0)為手動1為自動
        if($menuauto ==0){
        $turl=$xoops_dirname==$urlsplit[1];
        $burl=$turl;
        }else{
        $stringaok=$stringa4;
        $burl=eregi("ERTYU",$stringaok);
        $turl=eregi("$xoops_dirname",$stringaok);
        }
        
        
        
        //當模組為tadnews時，更改tadnews的ID，以解決與news衝突問題
        $eregiurl=($xoops_dirname==tadnews)?"$burl":"$turl"; //假/真
        */

        //判斷按鈕的URL是否等於當前模組ID，如果是則 $ndirname= 'styletrue';

        $urlsplit[0] = empty($urlsplit[0]) ? '#NO' : $urlsplit[0];

        //強制小寫轉大寫
        if (strtoupper($urlsplit[0]) != '#NO') {
            $menu[$k]['category_name'] = "<a class='buttomtop' title='$content' target='$target'  href='{$urlsplit[0]}'>$content</a>";
        } else {
            $menu[$k]['category_name'] = (string)$content;
        }

        $item_category[$k] = $menu[$k];

        //吧第2層陣列加入第1層陣列中
        $item_category[$k]['topic'] = $topic[$k];

        //將值推入$category陣列中
        array_push($category, $item_category[$k]);
    }
}
$this->assign("texta", $menun);

//輸出總迴圈數
$this->assign("y", $y);
$this->assign("menufalse", $menuautoa);
$this->assign("menucolora", $menuautob);
$this->assign("menucoloraa", $menuautoba);

$this->assign("menucolorb", $menuautoc);
$this->assign("menucolorba", $menuautoca);

$this->assign("menulimit", $menulimit);
$this->assign("categoryforum", $category);
