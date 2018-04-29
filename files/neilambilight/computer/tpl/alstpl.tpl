          
<div id='marqueetop'> <div id="marquee" class="marqueestyle<{$marqueestyle}>"><ul>
  	<{foreach item=marquee from=$marqueetext }>
                        
                       <li><div id='marqueebox'><div><a title="<{$marquee.title}>" target="<{$marquee.target}>" href="<{$marquee.url}>" >[<{$marquee.time}>]-<{$marquee.title}></a></div></div></li>
						<{/foreach}>
				
	
  </ul>
</div>
<{if $xoops_isadmin}>
 <a href='<{xoAppUrl /}>modules/neothemesadmin/admin/marqueetable.php'  class='btn btn-md btn-primary marqueeadmin  active'><{$smarty.const._MS_SHARED20}></a>  

<{/if}>

           </div>   

       