<?php

$session = \App\Models\TrainingWorkshopSession::where('allow_to_apply',1)->orderBy('id','DESC')->first();

$contents="<p style='Margin-top: 20px;Margin-bottom: 0;'>Dear ".$aplication->name.",<br />
Welcome in the movement of change makers and a cascade of business Technical know-how.
<br />
Thank you for applying for our training/workshop. <br />
We are looking forward to meeting you on ". date('d M Y',strtotime($session->event_date)).", ".date("h:i A",strtotime($session->event_time))." at ".$session->event_location."
   </p>
<p style='Margin-top: 20px;Margin-bottom: 20px;'>Best Regards!<br />
Your Friends in Business from All Trust Consult!</p>";
?>

@include('mail.mail',['title'=>'Trainings & Workshops Application Submitted!',
"contents"=>$contents,
'link_name'=>'Contact Us',
'link_url'=>env('APP_URL', 'http://alltrust.theeventx.com').'/more/contact'
])
