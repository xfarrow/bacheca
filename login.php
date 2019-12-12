<html>
<head>
	<link rel="icon" href="resources/scolaro.ico">
	<title>Login</title>
	
</head>
		<form name="frm" action="checkIscrizione.php" method="POST">
<body>

			<h2>Log-in</h2>
			<label for="username">Email</label>
			<br/>
			<input type="text" name="email" placeholder="e-mail">
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" name="psw" placeholder="********">
			<br/>
			<label for="username">Canale</label>
			<br/>
			<input type="text" name="canale" placeholder="123">
			<?php
				if(isset($_GET['err']) and ($_GET['err']==1))
				 echo "<font color=\"red\">Devi inserire un canale</font>";
			?>
			<br/>
			<button type="submit">Sign In</button>
			<br/>
			<a href="iscrizione.html"><p class="small">Non sei ancora registrato? Iscriviti Qui!</p></a>
		
</body>
</html>