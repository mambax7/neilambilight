<?php

class themesetclass
{
    public function themespublicb($variableok, $setting)
    {
        $xoops_theme = $GLOBALS['xoopsConfig']['theme_set'];
        //取得最頂層到Xoops根目錄的路徑
        $rootpath = XOOPS_ROOT_PATH;

        //引入佈景設定
        include "{$rootpath}/modules/neothemesadmin/class/detectfile.php";
        //佈景圖片格式設定參數
        $variableok= "{$a0};{$a1};{$a2};{$a3};{$a4};{$a5};{$a6};{$a7};{$a8};{$a9};{$a10};{$a11}";
        //佈景設定參數
        $setting="{$s0};{$s1};{$s2};{$s3};{$s4};{$s5};{$s6};{$s7};{$s8};{$s9};{$s10};{$s11};{$s12};{$s13};{$s14};{$s15};{$s16};{$s17};{$s18};{$s19};{$s20};{$s21};{$s22};{$s23};{$s24};{$s25};{$s26};{$s27};{$s28};{$s29};{$s30};{$s31};{$s32};{$s33};{$s34};{$s34};{$s35}";
        return array($variableok,$setting);
    }
}
