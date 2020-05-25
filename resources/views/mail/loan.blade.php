<?php 
$contents="<p style='Margin-top: 20px;Margin-bottom: 0;'>Dear ".$aplication->name.",<br />
Thank you for applying for All Trust Consult loan for business purposes.<br />
The team concerned will review your business model and application form and they will reach out to you as soon as possible.<br />
If your business model gets shortlisted you will be contacted and more details will be given to you.</p>
<p style='Margin-top: 20px;Margin-bottom: 20px;'>Best Regards!<br />
Your Friends in Business from All Trust Consult!</p>";
?>

@include('mail.mail',['title'=>'Loan Application Submitted!',
"contents"=>$contents])
