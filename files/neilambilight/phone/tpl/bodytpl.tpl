<body id="<{$xoops_dirname}>" class="<{$xoops_langcode}> <{$browser}>">
<div id="toplayerdiv">

<hgroup id="topheaderdiv">
<{includeq file="$theme_name/descriptiontpl.tpl"}> 
<{includeq file="$theme_name/keywordstpl.tpl"}> 
<{includeq file="$theme_name/searchtpl.tpl"}> 
</hgroup> 
<div id="tpl-content">


<{includeq file="$theme_name/headertpl.tpl"}> 

  <{if $xoops_contents|strip && ($xoops_contents|strip != ' ') }>             
    <{includeq file="$theme_name/$pagetpl" cenrte=true}>  
   <{includeq file="$theme_name/menutpl.tpl"}>              
   <{else}>


<{includeq file="$theme_name/menutpl.tpl"}>
 <!--內容區塊開始-->


 <section>

    <div id="xo-page" >
    
         <{includeq file="$theme_name/lrblockstpl.tpl" id=left}>
        <{includeq file="$theme_name/$pagetpl"}>
         <{includeq file="$theme_name/lrblockstpl.tpl" id=right}> 
    
       </div>
       
  </section>
 

  <{includeq file="$theme_name/bottomdiv.tpl"}>
  <{/if}>
<{includeq file="$theme_name/footertpl.tpl"}>
 <{includeq file="$theme_name/informationtpl.tpl"}> 
   </div>
   

     
  
     
  

  <!-- 載入佈景所需的js --> 
  <{includeq file="$theme_js/jstpl.tpl" jid=bottom}>
 </div>
</body>
