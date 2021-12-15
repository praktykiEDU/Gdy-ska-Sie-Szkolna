<?php
        session_start();
        require_once "config.php";
        $super_admin = $_POST['super_admin'];
        $ID = $_POST['id'];
        $sql = "UPDATE uzytkownicy SET `super_admin`='$super_admin' WHERE ID='$ID'";
        if (mysqli_query($link, $sql)) 
            {
                echo "<script type='text/javascript'>alert('Zaaktualizowano');</script>";
                echo "<script>window.location = 'http://localhost/Gdynska-Siec-Szkolna-main/#loaded'</script>";
            } 
        else 
            {
                echo "<script type='text/javascript'>alert('Błąd w wpisywaniu');</script>";
                //echo "Error: " . $sql . "<br>" . mysqli_error($link);
                echo "<script>window.location = 'http://localhost/Strona/uprawnienia.php'</script>";
            } 
?>