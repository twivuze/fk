<?php 
$contents="<p style='Margin-top: 20px;Margin-bottom: 0;'>Dear ".$aplication->Company_or_organization.",<br />
All Trust Consult is pleased to have you  as a potential partner. <br />
Thank you for your consideration! <br />
May this partnership contribute highly towards ending World poverty.</p>
<p style='Margin-top: 20px;Margin-bottom: 20px;'>Best Regards!<br />
Your Friends in Business from All Trust Consult!</p>";
?>

@include('mail.mail',['title'=>'Partner Application Submitted!',
"contents"=>$contents,
'link_name'=>'Contact Us',
'link_url'=>env('APP_URL', 'http://alltrust.theeventx.com').'/more/contact'
])
