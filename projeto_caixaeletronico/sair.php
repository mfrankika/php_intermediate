<?php
session_start();

// terminar a sessao 
unset($_SESSION['banco']);
header("Location: index.php");
exit;