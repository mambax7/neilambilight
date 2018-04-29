 <article id="xo-content>">
 
<div id="sponsorshiplist">
     <h3 class="block-title"><span><a title="<{if !$titleif}><{$xoops_pagetitle}>:<{/if}><{$xoops_sitename}><{if $seotitle}>-<{$seotitle}><{/if}>" href="<{$httphosturl}>"><{$smarty.const._THEME_SPONSORLIST}></a></span></h3>
                  <div class="blockcontent">  
                  
                  <div id="pagetable">

<table >

<{foreach item=sponsor from=$sponsortext}>
  <tr>
    <th style="width: 210px;"><{$smarty.const._THEME_Sponsor}></th>
    <th style="width: 150px;"><{$smarty.const._THEME_Sponsors}></th>
    <th><{$smarty.const._THEME_Sponsoredcontent}></th>
     <th style="width: 150px;"><{$smarty.const._THEME_Website}></th>
  </tr>
  <tr>
    <td style="width: 200px;"><{$sponsor.content01}></td>
    <td><{$sponsor.content02}></td>
    <td><{$sponsor.content03}></td>
  
    <td style="width: 120px;"><{$sponsor.content05}></td>
  </tr>
  <tr>
   <th colspan="4"><{$smarty.const._THEME_CompanyProfile}></th>
     </tr>
       <tr>
    <td colspan="4"><{$sponsor.content04}></td>
  </tr>
  
<{/foreach}>  
</table>

</div>
                  
                   </div>
              
</div>                
                </article>