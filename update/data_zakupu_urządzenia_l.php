<?php
            session_start();
            require_once "config.php";
            $data_zakupu_urządzenia = $_POST['data_zakupu_urzadzenia'];
            $ID = $_POST['id'];
            $sql = "UPDATE sieci_lan SET Data_zakupu_urządzenia='$data_zakupu_urządzenia' WHERE ID='$ID'";
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