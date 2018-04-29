<?php


function alertsncdr_block_show($options){
global $xoopsDB, $xoTheme,$xoopsModule;


 switch ($options[0]){	
case "capinfo":   //一般示警
	
switch ($options[1]){	
 case "alltaiwan":   //全台灣

$alertsncdr="CAP300250_CapInfo.js";	 
$alertsncdrdiv="capInfo300250";
break;		
case "countycity":   //縣市別
$alertsncdr="CapInfoNormal_{$options[2]}_300250.js";
$alertsncdrdiv="capInfo300250_Normal_{$options[2]}";	 	 
break;
}           



	
		  	 
break; 
case "capinfoextreme":  //高嚴重示警
	

switch ($options[1]){	
 case "alltaiwan":   //全台灣
$alertsncdr="CapInfoExtreme_300250.js";	 
$alertsncdrdiv="capInfo300250_Extreme";	 
break;		
  case "countycity":   //縣市別
$alertsncdr="CapInfoExtreme_{$options[2]}_300250.js";	 
$alertsncdrdiv="capInfo300250_Extreme_{$options[2]}";		 	 
break;
}   	

break; 
} 	







  $GLOBALS['xoopsTpl']->assign('alertsncdr', $alertsncdr);  


 $block['alertsncdrdiv']=$alertsncdrdiv;	
    return $block;
}



//區塊編輯函式
function alertsncdr_block_edit($options)
{
  global $xoopsDB, $xoTheme;
  
  

 switch ($options[0]){	
case "capinfo":  	  	 
$inlineRadio1="checked=checked'";
break; 
case "capinfoextreme":  
$inlineRadio2="checked=checked'";
break; 
} 	

 switch ($options[1]){	
case "alltaiwan":  	  	 
$rangeRadio1="checked=checked'";
$stylebox="style='display: none;'";
break; 
case "countycity":  
$rangeRadio2="checked=checked'";
$stylebox="style='display: bolck;'";
break; 

default:
$stylebox="style='display: none;'";	
} 

 switch ($options[2]){	
case "09007":  	  	 
$cityRadio09007="selected='selected'";
break; 
case "09020":  
$cityRadio09020="selected='selected'";
break; 
case "10002":  
$cityRadio10002="selected='selected'";
break; 
case "10007":  
$cityRadio10007="selected='selected'";
break; 
case "10008":  
$cityRadio10008="selected='selected'";
break; 
case "10009":  
$cityRadio10009="selected='selected'";
break; 
case "10013":  
$cityRadio10013="selected='selected'";
break; 
case "10014":  
$cityRadio10014="selected='selected'";
break; 
case "10015":  
$cityRadio10015="selected='selected'";
break; 
case "10016":  
$cityRadio10016="selected='selected'";
break; 
case "10017":  
$cityRadio10017="selected='selected'";
break; 
case "10018":  
$cityRadio10018="selected='selected'";
break; 
case "63":  
$cityRadio63="selected='selected'";
break; 
case "65":  
$cityRadio65="selected='selected'";
break; 
case "66":  
$cityRadio66="selected='selected'";
break; 
case "67":  
$cityRadio67="selected='selected'";
break; 
case "68":  
$cityRadio68="selected='selected'";
break; 
case "10005":  
$cityRadio10005="selected='selected'";
break; 
case "10004":  
$cityRadio10004="selected='selected'";
break; 
case "10020":  
$cityRadio10020="selected='selected'";
break; 
case "10010":  
$cityRadio10010="selected='selected'";
break; 
case "64":  
$cityRadio64="selected='selected'";
break; 

} 



    $form = "{$option['js']}
  <table>
  <tr><th>
  " ._MB_ALERTSNCDRTEXT01. "
  </th><td>
 <label class='radio-inline'>
  <input type='radio' id='project1' {$inlineRadio1} name='options[0]' value='capinfo'> "._MB_ALERTSNCDRTEXT04."
</label>
<label class='radio-inline'>
  <input type='radio'  id='project2' {$inlineRadio2}  name='options[0]' value='capinfoextreme'>"._MB_ALERTSNCDRTEXT05."
</label>
  </td></tr> 	  
  	  
  <tr><th>
  " ._MB_ALERTSNCDRTEXT02. "
  </th><td>
  <label class='radio-inline'>
  <input type='radio' id='range1' {$rangeRadio1} name='options[1]' value='alltaiwan'> "._MB_ALERTSNCDRTEXT06."
</label>
<label class='radio-inline'>
  <input type='radio'  id='range2' {$rangeRadio2}  name='options[1]' value='countycity'>"._MB_ALERTSNCDRTEXT07."
</label>

  </td></tr>
 <tr class='citynamelist' ".$stylebox."><th>
  " ._MB_ALERTSNCDRTEXT03."".$options[2]."
  </th><td>
  	  	<select size='22'   name='options[2]' id='cityname'  >
           <option ".$cityRadio09007." value='09007' >"._MB_ALERTSNCDRTEXT08."</option>		
         <option ".$cityRadio09020." value='09020' >"._MB_ALERTSNCDRTEXT09."</option>		
         <option ".$cityRadio10002."  value='10002' >"._MB_ALERTSNCDRTEXT010."</option>		
         <option ".$cityRadio10007."  value='10007' >"._MB_ALERTSNCDRTEXT011."</option>	
        <option ".$cityRadio10008." value='10008' >"._MB_ALERTSNCDRTEXT012."</option>	 
             <option ".$cityRadio10009." value='10009' >"._MB_ALERTSNCDRTEXT013."</option>
                  <option ".$cityRadio10013." value='10013' >"._MB_ALERTSNCDRTEXT014."</option> 
                       <option ".$cityRadio10014." value='10014' >"._MB_ALERTSNCDRTEXT015."</option>  	
                    <option ".$cityRadio10015." value='10015' >"._MB_ALERTSNCDRTEXT016."</option> 
                          <option ".$cityRadio10016." value='10016' >"._MB_ALERTSNCDRTEXT017."</option>  
        <option ".$cityRadio10017." value='10017' >"._MB_ALERTSNCDRTEXT018."</option>   
              <option ".$cityRadio10018." value='10018' >"._MB_ALERTSNCDRTEXT019."</option>  
              <option ".$cityRadio63." value='63' >"._MB_ALERTSNCDRTEXT020."</option>   
               <option ".$cityRadio65." value='65' >"._MB_ALERTSNCDRTEXT021."</option>    
        <option ".$cityRadio66." value='66' >"._MB_ALERTSNCDRTEXT022."</option>    
        <option ".$cityRadio67." value='67' >"._MB_ALERTSNCDRTEXT023."</option> 
             <option ".$cityRadio68." value='68' >"._MB_ALERTSNCDRTEXT024."</option>   
                   <option ".$cityRadio10005." value='10005' >"._MB_ALERTSNCDRTEXT025."</option>  
                         <option ".$cityRadio10004." value='10004' >"._MB_ALERTSNCDRTEXT026."</option>     
                       <option  ".$cityRadio10020." value='10020' >"._MB_ALERTSNCDRTEXT027."</option>   
                        <option ".$cityRadio10010." value='10010' >"._MB_ALERTSNCDRTEXT028."</option>   
            <option ".$cityRadio64." value='64' >"._MB_ALERTSNCDRTEXT029."</option>         	      	   	  	        							
	</select>
  </td></tr>
  
  </table>
  	  <script type=text/javascript src=".XOOPS_URL."/modules/neothemesadmin/js/customize.js></script>	
  ";
    return $form;
}
