<div id="menutbl">
<div id="himglc">
<ul class="menu">
<{section name=menu1 loop=$categoryforum max=7}>
<{assign var=a value=$smarty.section.menu1.iteration}>
<style type="text/css"> <!-- 

<{*最後一圈按鈕位置CSS定義*}>

<{if $a > 4 }>
#divu<{$a}>{
width: auto;
position: absolute;
left: -20px;
top: 80px;
z-index: <{$a}>00;
}

#divub<{$a}>{
position: absolute;	
width: 100%;
left: -220px;
top: -0px; 
z-index: <{$a}>00;
}
<{/if}>
<{*扣除倒數第一圈的按鈕位置CSS定義*}>	
<{if $a <= 4 }>
#divu<{$a}>{
width: auto;
position: absolute;
left: 0px;
top: 80px;
z-index: <{$a}>00;
}

#divub<{$a}>{
position: absolute;	
width: 100%;
left: 220px;
top: 0px; 
z-index: <{$a}>00;
}
<{/if}>
--> 
</style> 

 <li  id="b<{$a}>"> 
 <{if $a  neq $y}>
<div id="separated"></div>
<{/if}>
<{$categoryforum[menu1].category_name}> 
<ul id="divu<{$a}>"> 
<{section name=menu2 loop=$categoryforum[menu1].topic}>
<{assign var=b value=$smarty.section.menu2.iteration}>
<li id="parentimgcenter" class="parenta" onmouseover="this.className='parentaOn'" onmouseout="this.className='parenta'">
<{$categoryforum[menu1].topic[menu2].topic_name}>
<ul id="divub<{$a}>">
<{section name=menu3 loop=$categoryforum[menu1].topic[menu2].threepic}>
<li id="parentimgcenter"> 
<{$categoryforum[menu1].topic[menu2].threepic[menu3].threepic_name}>
</li>
<{/section}>
</ul>
</li>
<{/section}>
</ul>
</li> 
<{/section}>
</ul>
</div>
</div>



