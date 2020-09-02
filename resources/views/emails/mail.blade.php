<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<p>Alhamdulillah Its working now.........</p>
<p>Now verify Your Account</p>

<?php 
use Carbon\Carbon;
$dtime=Carbon::now()->toFormattedDateString();
echo $dtime;
?>
</body>
</html>