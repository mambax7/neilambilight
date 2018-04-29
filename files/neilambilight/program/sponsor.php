<?php

define('_THEME_Sponsor', '贊助單位');
define('_THEME_Sponsors', '贊助者');
define('_THEME_Sponsoredcontent', '贊助內容');
define('_THEME_CompanyProfile', '單位簡介');
define('_THEME_Website', '贊助時間');

$s                        = 1;
$sponsor[$s]['content01'] = '<strong><a title="臺北醫學大學附設醫院" href="http://tmuh.tmu.edu.tw/" target="_blank">臺北醫學大學附設醫院</a></strong>';     //贊助單位
$sponsor[$s]['content02'] = '蔡龍文';     //贊助者
$sponsor[$s]['content03'] = '贊助neilambilight佈景開發與neothemesadmin模組升級工作';     //贊助內容
$sponsor[$s]['content04'] = '北醫導入實證醫學的理念相當地早，早在民國91年北醫體系的萬芳醫學中心即在時任邱文達院長的理念下，率先成立實證醫學中心，並成為國內實證醫學臨床應用推廣的重要推手之一。其後，北醫附設醫院及雙和醫院也陸續成立實證醫學中心。';     //公司簡介
$sponsor[$s]['content05'] = '2017年3月1日';     //贊助時間
$s++;

$sponsor[$s]['content01'] = '<strong><a title="蔡明貴校長個人簡介" href="http://mingkult.friendly.tw" target="_blank">蔡明貴校長個人簡介</a></strong>';     //贊助單位
$sponsor[$s]['content02'] = '蔡明貴';     //贊助者
$sponsor[$s]['content03'] = '贊助neilambilight佈景開發與neothemesadmin模組升級工作。';     //贊助內容
$sponsor[$s]['content04'] = '新北市同榮國民小學、國家教育研究院130期、新北市第13期校長';     //公司簡介
$sponsor[$s]['content05'] = '2017年3月1日';     //贊助時間
$s++;

if (!empty($designerid)) {
    $qa = $querytrue;
}

$sponsor[$s]['content01'] = '<strong><a title="Neil網站設計工坊" href="http://neodw.com/neil/" target="_blank">Neil網站設計工坊</a></strong>';     //贊助單位
$sponsor[$s]['content02'] = '<strong><a title="徐嘉裕" href=' . $httphosturl['url'] . '>徐嘉裕</a></strong>';     //贊助者
$sponsor[$s]['content03'] = '贊助neilambilight佈景開發與neothemesadmin模組升級工作。';     //贊助內容
$sponsor[$s]['content04'] = '網站設計,Xoops佈景設計開發,xoops模組設計開發,xoops免費佈景下載';     //公司簡介
$sponsor[$s]['content05'] = '2017年3月1日';     //贊助時間
$s++;

$sponsor[$s]['content01'] = '<strong><a title="屏東縣立枋寮高中" href="http://web.flhs.ptc.edu.tw/" target="_blank">屏東縣立枋寮高中</a></strong>';     //贊助單位
$sponsor[$s]['content02'] = '黃文昌';     //贊助者
$sponsor[$s]['content03'] = '協助neilambilight佈景功能測試與BUG回報工作';     //贊助內容
$sponsor[$s]['content04'] = '民國五十三年八月屏東縣政府順應本鄉民意，設置縣立東港中學枋寮分部，由縣政府許昇龍先生為分部主任，五十五年奉准獨立，更名屏東縣立枋寮初級中學，許昇龍先生為代理校長，二月謝德明先生奉派為首任校長。';     //公司簡介
$sponsor[$s]['content05'] = '2017年4月20日';     //贊助時間
$s++;

$this->assign("sponsortext", $sponsor);
