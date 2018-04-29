<?php

if ($xoops_dirname == tad_evaluation and !empty($evaluation_sn)) {
    $instructions['text'] = '使用tad_evaluation模組匯入檔案時需要再新建立一個資料夾來存放評鑑檔案，否則整個站的JS功能都會發生錯誤，例如匯入檔案位置為F:/xampp/htdocs/xoops258/uploads/tad_evaluation/評鑑名稱/，需要於【評鑑名稱】資料夾底下再建一個資料夾做為收合選單的按鈕名稱，然後吧檔案放到新建的資料夾底下，這樣tad_evaluation模組的檔案收合功能才能正常使用';
}

if ($xoops_dirname == tad_tv) {
    $instructions['text'] = "可以到這個網站複製m3u8連結貼到tad_tv模組中觀看直播電視<br /><a href='http://tubbysong.blogspot.tw/2015/10/vlc-player.html' target='_blank'>http://tubbysong.blogspot.tw/2015/10/vlc-player.html</a>";
}

$this->assign("instructions", $instructions);
