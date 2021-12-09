<?php
            session_start();
            require_once "config.php";
            $rack_l = $_POST['rack_l'];
            $ID = $_POST['id'];
            $sql = "UPDATE sieci_lan SET Lokalizacja_urządzeń_w_szafie_typu_Rack='$rack_l' WHERE ID='$ID'";
            if (mysqli_query($link, $sql)) 
                {
                    echo "<script type='text/javascript'>alert('Zaaktualizowano');</script>";
                    echo "<script>window.location = 'http://localhost/Strona/#loaded'</script>";
                } 
            else 
                {
                    echo "<script type='text/javascript'>alert('Błąd w wpisywaniu');</script>";
                    //echo "Error: " . $sql . "<br>" . mysqli_error($link);
                    echo "<script>window.location = 'http://localhost/Strona/update_l.php'</script>";
                } 
        ?>