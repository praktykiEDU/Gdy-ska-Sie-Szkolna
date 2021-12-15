<?php
        session_start();
        require_once "config.php";
        $kod_pocztowy = $_POST['kod_pocztowy'];
        $ID = $_POST['id'];
        $sql = "UPDATE szkoly SET Kod_pocztowy='$kod_pocztowy' WHERE ID='$ID'";
        if (mysqli_query($link, $sql)) 
            {
                echo "<script type='text/javascript'>alert('Zaaktualizowano');</script>";
                echo "<script>window.location = 'http://localhost/Gdynska-Siec-Szkolna-main/#loaded'</script>";
            } 
        else 
            {
                echo "<script type='text/javascript'>alert('Błąd w wpisywaniu');</script>";
                //echo "Error: " . $sql . "<br>" . mysqli_error($link);
                echo "<script>window.location = 'http://localhost/Gdynska-Siec-Szkolna-main/update_s.php'</script>";
            } 
?>