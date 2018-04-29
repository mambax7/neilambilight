                 
<div id='marqueetop'> <div id="marquee" class="marqueestyle<{$marqueestyle}>"><ul>
  	<{foreach item=marquee from=$marqueetext }>
                        
                       <li><div id='marqueebox'><div><a title="<{$marquee.title}>" target="<{$marquee.target}>" href="<{$marquee.url}>" ><{$marquee.title}></a></div></div></li>
						<{/foreach}>
				
	
  </ul>
</div>


           </div>   

       