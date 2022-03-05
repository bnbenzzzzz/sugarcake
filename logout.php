

<?php
    session_start();

    echo"<script>alert('คุณได้ออกจากระบบแล้ว') </script>";
    session_destroy();
?>

<script>window.location = "./login.php"</script>