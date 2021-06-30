<?php

$json = file_get_contents('http://api.passivereferral.com/index.php/api/portal/jobs');
$alljos = json_decode($json);
foreach ($alljos as $key=>$job)
{
   ?> 
    
<h1> <?php echo $job->job_title;?></h1>
<p><?php  echo $job->referralBonus; ?></p>
    
    
    <?php
}
?>