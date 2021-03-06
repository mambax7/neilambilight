<{include_php file="$xoops_rootpath/themes/$xoops_theme/program/tadloginblocks.php"}>
<{assign var="xoops_sitename" value="$lang_login"}>
<fieldset class="pad10">
  <legend class="bold"><{$lang_login}></legend>
  <form class="form-horizontal" role="form" action="user.php" method="post" >
    <div class="form-group">
      <label  class="col-sm-2 control-label"><{$lang_username}></label>
      <div class="col-sm-10">
        <input type="text" name="uname" class="form-control"  placeholder="<{$smarty.const.THEME_LOGIN}>">
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label"><{$lang_password}></label>
      <div class="col-sm-10">
        <input type="password" name="pass" class="form-control"  placeholder="<{$smarty.const.THEME_PASS}>">
      </div>
    </div>
    
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox"> <{if isset($lang_rememberme)}>
       
       
          <label>
            <input type="checkbox" name="rememberme" value="On" checked/><{$lang_rememberme}>
          </label>
           <br/>
          <{/if}> </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="hidden" name="op" value="login"/>
        <input type="hidden" name="xoops_redirect" value="<{$redirect_page}>"/>
        <button type="submit"  class="btn btn-primary" ><{$lang_login}></button>
      </div>
    </div>
           <li style="white-space: nowrap" class="text-center">
      <{foreach from=$tlogin item=login}>
     
        <a href="<{$login.link}>" class="btn" <{if $openid_logo!=1}>style="display:inline-block;width:32px;height:32px;padding:2px;margin:2px;background-color:transparent;"<{/if}>>
          <img src="<{$login.img}>" alt="<{$login.text}>" title="<{$login.text}>" >
               </a>

      <{/foreach}>
     </li>
  </form>
  <br/>
  <a name="lost"></a>
  
  <div><{$lang_notregister}>  </div><br/>
  <legend class="bold"><{$lang_lostpassword}></legend>  
  <form action="lostpass.php" method="post" class="form-horizontal" role="form">
  <span id="helpBlock" class="help-block"><{$lang_noproblem}></span>
    <div class="form-group">
      <label  class="col-sm-2 control-label"><{$smarty.const.THEME_MAILTEXT}></label>
      <div class="col-sm-10">
        <input  type="email"   name="email" class="form-control"  placeholder="<{$smarty.const.THEME_MAIL}>">
      </div>
    </div>
    
    
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="hidden" name="op"  value="mailpasswd"/>
        <input type="hidden" name="t"  value="<{$mailpasswd_token}>"/>
        <button type="submit" class="btn btn-primary" ><{$lang_sendpassword}></button>
      </div>
    </div>
  </form>
</fieldset>
