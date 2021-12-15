<?php
            session_start();
            require_once "config.php";
            $Numer_inwentarzowy_urządzenia = $_POST['numer_inwentarzowy_urzadzenia'];
            $ID = $_POST['id'];
            $sql = "UPDATE peryferia SET Numer_inwentarzowy_urządzenia='$Numer_inwentarzowy_urządzenia' WHERE ID='$ID'";
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