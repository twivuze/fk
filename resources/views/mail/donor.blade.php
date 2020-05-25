<?php 
$contents="<p style='Margin-top: 20px;Margin-bottom: 0;'>Dear ".$aplication->name.",<br />
Thank you for joining All Trust Consult in this battle to reduce world poverty.<br />
Your lending portion means a lot as it will change someone's life.<br />
And we assure you, business you selected for capital funding/loan will be carried on as soon as possible.</p>
<p><h3>Your Code:".$aplication->donor_code."</h3></p>
<p style='Margin-top: 20px;Margin-bottom: 20px;'>Best Regards!<br />
Your Friends in Business from All Trust Consult!</p>";
?>

@include('mail.mail',['title'=>'Donor Application Submitted!',
"contents"=>$contents])
