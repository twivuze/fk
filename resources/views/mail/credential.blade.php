<?php 
$contents="<p style='Margin-top: 20px;Margin-bottom: 0;'>Dear ".$name.",<br />
Thank you for applying for All Trust Consult loan for business purposes.<br />
we sent to you credentials that will help you to login in into your account.<br />
<hr>
Email or username: ".$email." <br />
Default password: ".$password." <br />

</p>
<p style='Margin-top: 20px;Margin-bottom: 20px;'>Best Regards!<br />
Your Friends in Business from All Trust Consult!</p>";
?>

@include('mail.mail',[
'title'=>$title,
"contents"=>$contents,
'link_name'=>'Reset Your Password',
'link_url'=>env('APP_URL', 'http://alltrust.theeventx.com').'/password/reset'])
