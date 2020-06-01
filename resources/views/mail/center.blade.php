<?php 
$contents="<p style='Margin-top: 20px;Margin-bottom: 0;'>Dear ".$aplication->name.",<br />
Warm Greetings from All Trust Consult Team!<br />
Thank you for coming forward in regards to being an All Trust Consult center <br >
in your respective region/country with the ultimate goal of  Ending world poverty. <br >
Your application will be reviewed and you will soon get a notification for approval or otherwise.</p>
<p style='Margin-top: 20px;Margin-bottom: 20px;'>Best Regards!<br />
Your Friends in Business from All Trust Consult!</p>";
?>

@include('mail.mail',['title'=>'Center Application Submitted!',
"contents"=>$contents,
'link_name'=>'Contact Us',
'link_url'=>env('APP_URL', 'http://alltrust.theeventx.com').'/more/contact'
])
