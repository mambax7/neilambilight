<?php	

define('_THEME_Designer01','開發者簡介');
define('_THEME_Designer02','開發者相片');
define('_THEME_Designer03','設計專長');
define('_THEME_Designer04','喜愛名言');
define('_THEME_Designer05','相關連結');





$designer01="本名：<strong><a title='徐嘉裕 Neil Hsu'  href=".$httphosturl['page'].">徐嘉裕</a></strong> Neil Hsu<br />
出生年份：1976年<br />
現職：網站程式設計師<br />
任職公司：<a title='Neil網站設計工坊' target='_blank' href='http://neodw.com/neil/'>Neil網站設計工坊</a><br />	 
目前興趣：程式研究，創意突破。<br />
簡介：本人致力於Xoops相關研究開發工作已有數十餘年，希望能將所研發之技術開發成各類型Xoops模組及Xoops佈景回饋給長期支持本人的用戶，提供台灣更優質的web網站架設環境。
";
$designer02="Photoshop PSD模板設計<br />
Xoops佈景/網站/設計開發<br />
Xoops模組功能開發<br />
熟悉程式：php7 , JavaScrupt , JQuery , ajax , Html5 , css3 , 網站seo優化與相關功能開發。";

$designer03="
1、求知若飢 虛懷若愚<br /> 2、任何被視為感情的枷鎖，都試著不因幸運而捕捉指間流逝的風<br /> 3、自強不息
";
$designer04="
<lu>
<li><strong><a title='徐嘉裕(Neil Hsu)的工作心得網誌'  target='_blank' href='http://neohsuxoops.blogspot.tw/'>徐嘉裕(Neil Hsu)的工作心得網誌</a></strong></li>
<li><strong><a title='徐嘉裕FB個人網頁'  target='_blank' href='https://www.facebook.com/NeohsuXoops'>徐嘉裕FB個人網頁</a></strong></li>
<li><strong><a title='徐嘉裕FB粉絲團'  target='_blank' href='https://www.facebook.com/NeilHsu168/'>徐嘉裕FB粉絲團</a></strong></li>
<li><strong>E-MAIL：<a title='徐嘉裕聯絡信箱'  href='mailto:b168168tw@gmail.com'>b168168tw@gmail.com</a></strong></li>
</ul>
";	

if(!empty($designer)){
$this->assign('xoops_sitename', _THEME_DESIGNER);
}

 
$this->assign("designer01", $designer01);
$this->assign("designer02", $designer02);
$this->assign("designer03", $designer03);
$this->assign("designer04", $designer04);
?>