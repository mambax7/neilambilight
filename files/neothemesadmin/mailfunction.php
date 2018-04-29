<?php

//通知管理員有新的聯絡我們
function contactusadminmail($cfid="", $usermane="", $getGroupid="", $timedate="")
{
    global $xoopsConfig,$xoopsMailer;
    $_url = XOOPS_URL . "/modules/neothemesadmin/admin/contactuscontent.php?cfid=".$cfid."";
    $xoopsMailer = & xoops_getMailer();
    $xoopsMailer->addHeaders("MIME-Version: 1.0");
    $xoopsMailer->useMail();
    $member_handler =& xoops_getHandler('member');
    $xoopsMailer->setToGroups($member_handler->getGroup($getGroupid));
    $xoopsMailer->setFromEmail();
    $xoopsMailer->setFromName($xoopsConfig['sitename']);
    $xoopsMailer->setSubject(sprintf(_MA_MAIL03, $timedate, $usermane));
    //  define("_MA_MAIL03","%s-收到%s聯絡我們來函");
    $xoopsMailer->setBody(sprintf(_MA_MAIL04, $timedate, $usermane, $_url, $xoopsConfig['sitename']));
    //define("_MA_MAIL04","%s-收到%s聯絡我們來函,請管理員前往觀看回覆\n\r網址：%s\n\r%s");
    $xoopsMailer->send();
}
    
//回覆聯絡我們
function contactforreplymail($usermail="", $text="", $usermane="", $timedate="")
{
    global $xoopsConfig,$xoopsMailer;
    //  $_url = XOOPS_URL . "/neothemesadmin/admin/contactuscontent.php?cfid=".$cfid."";
    $xoopsMailer = & xoops_getMailer();
    $xoopsMailer->addHeaders("MIME-Version: 1.0");
    $xoopsMailer->useMail();
    $xoopsMailer->setToEmails($usermail);
    $xoopsMailer->setFromEmail();
    $xoopsMailer->setFromName($xoopsConfig['sitename']);
    $xoopsMailer->setSubject(sprintf(_MA_MAIL01, $usermane, $timedate));
    $xoopsMailer->setBody(sprintf(_MA_MAIL02, $usermane, $text, $xoopsConfig['sitename']));
    $xoopsMailer->send();
}
