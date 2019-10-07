<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
    
    if (isset ($_POST['message'])) {
       $sql = "INSERT INTO client_base(id, username, usermail, comment) VALUE (NULL, '{$_POST['username']}', '{$_POST['usermail']}', '{$_POST['message']}')";  
    } else {
        $sql = "INSERT INTO client_base(id, username, usermail) VALUE (NULL, '{$_POST['username']}', '{$_POST['usermail']}')";  
    }
   
    $result = mysqli_query($db, $sql);

    if ($result) {
        echo "Отправлено";
    } else {
        echo "Oшибка";
    }

