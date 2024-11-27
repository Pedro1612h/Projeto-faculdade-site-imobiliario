<?php
session_start();
session_unset();
session_destroy();
header("Location: admin.html"); // Redireciona de volta para a página de login
exit();
?>