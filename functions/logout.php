<?php
// hapus session
session_start();
$_SESSION = [];
session_unset();
session_destroy();

// hapus cookie
setcookie('id', '', time() - 3600, '/', 'localhost', 1);
setcookie('key', '', time() - 3600, '/', 'localhost', 1);

header("Location: ../index.php");
exit;
