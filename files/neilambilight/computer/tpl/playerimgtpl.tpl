<div id="playerimgdiv"> 
<{if $jsplaystyle eq  1}>
<div id="myCarousel" class="carousel slide slideshow" data-ride="carousel">
<{if $xoops_isadmin}>
<div id="playerimgdivadmin"><a href="<{xoAppUrl /}>modules/neothemesadmin/admin/flashimgtable.php"><{$smarty.const._THEME_IMGADMIN}></a></div>
<{/if}>
<!-- Indicators -->
<{if $jsbuttom}>
<ol class="carousel-indicators">
<{foreach item=jsbuttoma from=$jsbuttom}>
<li class="<{$jsbuttoma.active}>" data-slide-to="<{$jsbuttoma.a}>" data-target="#myCarousel"></li>
<{/foreach}>
</ol><{/if}>
<div class="carousel-inner">
<{foreach item=jsimg from=$flashimg}>
<div class="<{$jsimg.itemactive}>"> <a  href="<{$jsimg.url}>" target="<{$jsimg.target}>" title="<{$jsimg.content}>"  ><{if $webreptil2}><img  src="<{xoAppUrl /}>themes/<{$xoops_theme}>/default/xoops.jpg"><{else}><img  src="<{$jsimg.imgid}>"><{/if}><{*<div class="carousel-caption hidden-xs">
  <{if $jsimg.flashtext}>
      <p><{$jsimg.flashtext}></p>   
  <{/if}>      
    </div>*}></a>   
</div>


<{/foreach}>
</div>


</div>
<{/if}>
<{if $jsplaystyle eq  0}>

<div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="4000" >


<{if $xoops_isadmin}>
<div id="playerimgdivadmin"><a href="<{xoAppUrl /}>modules/neothemesadmin/admin/flashimgtable.php"><{$smarty.const._THEME_IMGADMIN}></a></div>
<{/if}>

<!-- Indicators -->
<{if $jsbuttom}>
<ol  class="carousel-indicators">
<{foreach item=jsbuttoma from=$jsbuttom}>
<li class="<{$jsbuttoma.active}>" data-slide-to="<{$jsbuttoma.a}>" data-target="#bootstrap-touch-slider" ></li>


<{/foreach}>
</ol><{/if}>

 <div class="carousel-inner" role="listbox"> 
<{foreach item=jsimg from=$flashimg}>

    <div class="<{$jsimg.itemactive}>"> 
      
      <!-- Slide Background --> 
    <a  href="<{$jsimg.url}>" target="<{$jsimg.target}>"  title="<{$jsimg.content}>"  > <{if $webreptil2}><img  src="<{xoAppUrl /}>themes/<{$xoops_theme}>/default/xoops.jpg"><{else}> <img src="<{$jsimg.imgid}>" alt="Bootstrap Touch Slider"  class="slide-image"/><{/if}> </a></div>




<{/foreach}>
</div>


</div>




<{/if}>   
<{includeq file="$theme_name/alstpl.tpl"}>  
 </div>

