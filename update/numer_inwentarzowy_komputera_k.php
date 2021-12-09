<?php
            session_start();
            require_once "config.php";
            $Numer_inwentarzowy_komputera = $_POST['numer_inwentarzowy_komputera'];
            $ID = $_POST['id'];
            $sql = "UPDATE komputery SET Numer_inwentarzowy_komputera='$Numer_inwentarzowy_komputera' WHERE ID='$ID'";
            if (mysqli_query($link, $sql)) 
                {
                    echo "<script type='text/javascript'>alert('Zaaktualizowano');</script>";
                    echo "<script>window.location = 'http://localhost/Strona/#loaded'</script>";
                } 
            else 
                {
                    echo "<script type='text/javascript'>alert('Błąd w wpisywaniu');</script>";
                    //echo "Error: " . $sql . "<br>" . mysqli_error($link);
                    echo "<script>window.location = 'http://localhost/Strona/update_k.php'</script>";
                } 
        ?>