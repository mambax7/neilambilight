<body id="<{$xoops_dirname}>" class="<{$xoops_langcode}> <{$browser}>">
<div id="toplayerdiv" <{if !$webreptil}>class='box<{$contentstrue}>'<{/if}>>
<hgroup id="topheaderdiv">
<{includeq file="$theme_name/descriptiontpl.tpl"}> 
<{includeq file="$theme_name/keywordstpl.tpl"}> 
<{includeq file="$theme_name/searchtpl.tpl"}> 
</hgroup> 
<{includeq file="$theme_name/menutpl.tpl"}> 

<div id="tpl-content">

<{$frame.outer}>
<{includeq file="$theme_name/headertpl.tpl"}> 
<!--內容區塊開始-->


  <section>

    <div id="xo-page" class="table">
      <div class="tr"> 
         <{includeq file="$theme_name/lrblockstpl.tpl" id=left}>
         <{includeq file="$theme_name/$pagetpl"}>
        <{includeq file="$theme_name/lrblockstpl.tpl" id=right}> 
        </div>      
       </div>
       
  </section>
  

  <{includeq file="$theme_name/bottomdiv.tpl"}>
<{includeq file="$theme_name/footertpl.tpl"}>
 <{includeq file="$theme_name/informationtpl.tpl"}>  
   </div>
   

  <!-- 載入佈景所需的js --> 
  <{if $alertsncdr}>
  <{includeq file="$theme_js/jstpl.tpl" jsid=bottom}>     
  <{/if}>

 
  
  <!-- Include Administration Bar -->
<{includeq file="$theme_name/xo_footerstatic.tpl"}>

 </div>
</body>
