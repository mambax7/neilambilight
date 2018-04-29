
<div id="contactusform">

<form class="form-horizontal" role="form" action='<{$xoops_url}>/modules/<{$xoops_dirname}>/contactusform.php' method='post' >

  <div class="form-group">
   <label class="col-sm-2 control-label"><{$smarty.const._MD_CONTACTNAME}></label>
    <div class="col-sm-10">
 <{$contactusform.name_user}>
    <span id="helpBlockname_user" class="help-block"><{$smarty.const._MD_CONTACTREQUIRED}></span>
    </div>
  </div>	
    
  
   <div class="form-group">
   <label class="col-sm-2 control-label"><{$smarty.const._MD_CONTACTEMAIL}></label>
    <div class="col-sm-10">
   <{$contactusform.email_user}>
     <span id="helpBlockemail_user" class="help-block"><{$smarty.const._MD_CONTACTREQUIRED}></span>
    </div>
  </div>	
  
     <div class="form-group">
   <label class="col-sm-2 control-label"><{$smarty.const._MD_CONTACTTELEPHONE}></label>
    <div class="col-sm-10">
     <{$contactusform.tel_user}>
     <span id="helpBlocktel_user" class="help-block"><{$smarty.const._MD_CONTACTREQUIRED}></span>
    </div>
  </div>	
    
     <div class="form-group">
   <label class="col-sm-2 control-label"><{$smarty.const._MD_CONTACTTELECITYPHONE}></label>
    <div class="col-sm-10">
     <{$contactusform.citytel_user}>
 
    </div>
  </div>	  
 
   <div class="form-group">
 
 <label class="col-sm-2 control-label"><{$smarty.const._MD_CONTACTGENDER}></label>
     <div class="col-sm-10">
   <{$contactusform.radiog}>
  </div>  </div>	 
 
 <{if $contactusform.contactmatters}>
    <div class="form-group">
 
 <label class="col-sm-2 control-label"><{$smarty.const._MD_CONTACTUSADMIN01}></label>
     <div class="col-sm-10">
  <select  class='form-control' name='contactmatters' >
    <option value=''  data-id='1' ><{$smarty.const._MD_CONTACTUSADMIN02}></option>
  <{$contactusform.contactmatters}>
  </select>
  </div>  </div>	
  <{/if}>
 
    <div class="form-group">
   <label class="col-sm-2 control-label"><{$smarty.const._MD_CONTACTTEXT}></label>
    <div class="col-sm-10">
   <{$contactusform.texe_user}>
     <span id="helpBlocktexe_user" class="help-block"><{$smarty.const._MD_CONTACTREQUIRED}></span>
    </div>
  </div>	
 
    <div class="form-group">
   <label class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
 <div class="checkboxmycheck">
   <{$contactusform.mycheck}>   
</div>

    </div>
  </div>	  
        
<input type='hidden' name='op' value='contactustosend'>
<input class='verification' type='hidden' disabled="disabled" name='verification' value='agree'>
<button type='submit' disabled="disabled"  class="buttond btn btn-primary btn-lg btn-block">  <{$smarty.const._MD_CONTACTSENTOUT}></button>
<div id='help-blocktext' class='text-center'><span id='helpBlock' class='help-block'><span  class='red'><{$smarty.const._MS_SHARED30}></span></span></div></form>
<{if $xoops_isadmin}>
<br />
<div class="btn btn-default btn-lg btn-block"><a href="<{xoAppUrl /}>modules/neothemesadmin/admin/contactustable.php"><{$smarty.const._MD_CONTACTUSADMIN}></a></div>
<{/if}>
</div>



