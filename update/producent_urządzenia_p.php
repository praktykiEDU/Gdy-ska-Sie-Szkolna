<?php
        session_start();
        require_once "config.php";
        $producent_urządzenia = $_POST['producent_urzadzenia'];
        $ID = $_POST['id'];
        $sql = "UPDATE peryferia SET Producent_urządzenia='$producent_urządzenia' WHERE ID='$ID'";
        if (mysqli_query($link, $sql)) 
            {
                echo "<script type='text/javascript'>alert('Zaaktualizowano');</script>";
                echo "<script>window.location = 'http://localhost/Gdynska-Siec-Szkolna-main/#loaded'</script>";
            } 
        else 
            {
                echo "<script type='text/javascript'>alert('Błąd w wpisywaniu');</script>";
                //echo "Error: " . $sql . "<br>" . mysqli_error($link);
                echo "<script>window.location = 'http://localhost/Gdynska-Siec-Szkolna-main/update_p.php'</script>";
            } 
?>