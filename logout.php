<?php

session_start();
echo "signing out...";
unset($_SESSION['user_id']);

?>
<script>
    window.location = "index.php"
</script>