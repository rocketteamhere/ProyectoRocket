<?php
	session_start();
		unset ($_SESSION['usuario']);
			session_destroy();
	  echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../index.php'>";
	?>