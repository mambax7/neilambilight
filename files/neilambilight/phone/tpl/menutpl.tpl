<{if $categoryforum}>
<div id="menutbl">

<aside class="accordion">

<{section name=menu1 loop=$categoryforum max=7}>
<{assign var=a value=$smarty.section.menu1.iteration}>

<h1 id="b<{$a}>"  <{if $categoryforum[menu1].topic}>class='b<{$a}>open1' <{else}>class='b<{$a}>noopen1'<{/if}> ><{$categoryforum[menu1].category_name}> </h1><div>


<{section name=menu2 loop=$categoryforum[menu1].topic}>


<h2 <{if $categoryforum[menu1].topic[menu2].threepic}>class='open2' <{/if}>><{$categoryforum[menu1].topic[menu2].topic_name}></h2><div>

<{section name=menu3 loop=$categoryforum[menu1].topic[menu2].threepic}>


<h3><{$categoryforum[menu1].topic[menu2].threepic[menu3].threepic_name}></h3><div></div>

<{/section}>
</div>
<{/section}>
</div>
<{/section}>






</aside>

<div id="accordionfoot"></div>
</div>

<{/if}>

