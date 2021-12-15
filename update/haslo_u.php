<?php
        session_start();
        require_once "config.php";
        $password = $_POST['haslo'];
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        $ID = $_POST['id'];
        $sql = "UPDATE uzytkownicy SET password='$param_password' WHERE ID='$ID'";
        if (mysqli_query($link, $sql)) 
            {
                echo "<script type='text/javascript'>alert('Zaaktualizowano');</script>";
                echo "<script>window.location = 'http://localhost/Gdynska-Siec-Szkolna-main/#loaded'</script>";
            } 
        else 
            {
                echo "<script type='text/javascript'>alert('Błąd w wpisywaniu');</script>";
                //echo "Error: " . $sql . "<br>" . mysqli_error($link);
                echo "<script>window.location = 'http://localhost/Gdynska-Siec-Szkolna-main/panel_sterowania.php'</script>";
            } 
?>