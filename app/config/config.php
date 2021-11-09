<?php
$conn = pg_connect("postgres://xuklgoejfaifxm:33534417702b7ddf2baf4c0b08f631e7e818967a93b3a31fedbc6ac266c3b0c5@ec2-23-23-181-251.compute-1.amazonaws.com:5432/dau7m45aks763a");
	echo 'Connected Successfully!!!';
	if(!$conn)
	{
		die("Could not connect to database");
    }
    ?>