<{if $xoBlocks.footer_left || $xoBlocks.footer_right || $xoBlocks.footer_center}>
 <div id="bottompage" >
   <div id="bottompagelimg"></div><div id="bottompagerimg"></div> 
 <div class="table">
<{$frame.bottomimg}>
        <div  class="tr">
       
 <div id="bottomcontents">

  <{includeq file="$theme_name/blockfooter.tpl" id="footerleft"}>  
 <{includeq file="$theme_name/blockfooter.tpl" id="footercenter"}>          
 <{includeq file="$theme_name/blockfooter.tpl" id="footerright"}>         
 </div>       </div>      
     </div>  </div> 
        <{else}>
        <div id="bottompageimg"></div>        
         <{/if}>
         
         
         
