<?php

$session = \App\Models\ConferenceSession::where('allow_to_apply',1)->orderBy('id','DESC')->first();

$contents="<p style='Margin-top: 20px;Margin-bottom: 0;'>Dear ".$aplication->name.",<br />
We are pleased to have received your application for ".$session->title.".<br />
We are looking forward to having a resourceful conference in your presence. </p>
<p style='Margin-top: 20px;Margin-bottom: 20px;'>Best Regards!<br />
Your Friends in Business from All Trust Consult!</p>";
?>

@include('mail.mail',['title'=>'Conference Application Submitted!',
"contents"=>$contents,
'link_name'=>'Contact Us',
'link_url'=>env('APP_URL', 'http://alltrust.theeventx.com').'/more/contact'
])
