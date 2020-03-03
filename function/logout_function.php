<?php

session_start();
session_unset();
unset($_SESSION['email']);
unset($_SESSION['accNo']);
session_destroy(); 

?>
<script>
	alert("Account has been Log out!!!");
	window.location.assign("../index.php");
</script>

<?php 

?>