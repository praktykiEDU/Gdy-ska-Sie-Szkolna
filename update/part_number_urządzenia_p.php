<?php
        session_start();
        require_once "config.php";
        $part_number_monitora = $_POST['part_number_urzadzenia'];
        $ID = $_POST['id'];
        $sql = "UPDATE peryferia SET Part_number_urządzenia='$part_number_monitora' WHERE ID='$ID'";
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