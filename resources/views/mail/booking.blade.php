<?php 
$contents="<p style='Margin-top: 20px;Margin-bottom: 0;'>Dear ".$aplication->full_name.",<br />
Thank you for booking Frank Rubaduka, he will send you confirmation mail after review your request.</p>

<p style='Margin-top: 20px;Margin-bottom: 20px;'>Best Regards!<br />
Frank Rubaduka!</p>";
?>

@include('mail.mail',['title'=>'Booking Request Submitted!',
"contents"=>$contents
])
