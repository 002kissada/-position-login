<?php
session_start();
if (empty($_SESSION['mem_id'])) { 
    echo "<script>
        window.location='login.php';
    </script>";
}
?>