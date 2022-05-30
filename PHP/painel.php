<?php

include('verifica_login.php');
?>

<h2>ola, <?php echo $_SESSION['usuario']; ?></h2>
<h2><a href="logout.php">SAIR</a></h2>