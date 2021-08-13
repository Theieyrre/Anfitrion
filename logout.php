<?php   
    if(!session_id())
        session_start();
    session_destroy();  
    echo "<script> alert('Başarıyla çıkış yapıldı'); window.location.href='index.php'; </script>";
?>