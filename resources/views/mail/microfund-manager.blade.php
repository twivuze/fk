<?php 
$contents="<p style='Margin-top: 20px;Margin-bottom: 0;'>Dear ".$aplication->full_name.",<br />
Thank you for applying as a MicroFund manager at All Trust Consult.<br />
Your application is well received and will be viewed by the team as soon as possible.<br />
Kindly check your email frequently to know whether your application is accepted or otherwise.</p>
<p style='Margin-top: 20px;Margin-bottom: 20px;'>Best Regards!<br />
Your Friends in Business from All Trust Consult!</p>";
?>

@include('mail.mail',['title'=>'MicroFund manager Application Submitted!',
"contents"=>$contents,
'link_name'=>'Contact Us',
'link_url'=>env('APP_URL', 'http://alltrust.theeventx.com').'/more/contact'
])
