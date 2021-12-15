<?php
            session_start();
            require_once "config.php";
            $typ_u = $_POST['typ_urzadzenia'];
            $ID = $_POST['id'];
            $sql = "UPDATE sieci_lan SET Typ_urządzenia='$typ_u' WHERE ID='$ID'";
            if (mysqli_query($link, $sql)) 
                {
                    echo "<script type='text/javascript'>alert('Zaaktualizowano');</script>";
                    echo "<script>window.location = 'http://localhost/Gdynska-Siec-Szkolna-main/#loaded'</script>";
                } 
            else 
                {
                    echo "<script type='text/javascript'>alert('Błąd w wpisywaniu');</script>";
                    //echo "Error: " . $sql . "<br>" . mysqli_error($link);
                    echo "<script>window.location = 'http://localhost/Gdynska-Siec-Szkolna-main/update_l.php'</script>";
                } 
        ?>