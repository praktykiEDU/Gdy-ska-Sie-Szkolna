<?php
            session_start();
            require_once "config.php";
            $SN_u = $_POST['numer_seryjny_urzadzenia'];
            $ID = $_POST['id'];
            $sql = "UPDATE sieci_lan SET Numer_seryjny_urządzenia='$SN_u' WHERE ID='$ID'";
            if (mysqli_query($link, $sql)) 
                {
                    echo "<script type='text/javascript'>alert('Zaaktualizowano');</script>";
                    echo "<script>window.location = 'http://localhost/Strona/#loaded'</script>";
                } 
            else 
                {
                    echo "<script type='text/javascript'>alert('Błąd w wpisywaniu');</script>";
                    //echo "Error: " . $sql . "<br>" . mysqli_error($link);
                    echo "<script>window.location = 'http://localhost/Gdynska-Siec-Szkolna-main/update_l.php'</script>";
                } 
        ?>