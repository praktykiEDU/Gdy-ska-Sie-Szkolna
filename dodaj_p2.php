<?php
            session_start();
            require_once "config.php";
            $szkola = $_GET["szkola"];
            $pietro = $_GET["pietro"];
            $pokoj = $_GET["pokoj"];
            $typu = $_GET["typ_U"];
            $producentu = $_GET["producent_urządzenia"];
            $modelu = $_GET["model_urządzenia"];
            $SNu = $_GET["numer_seryjny_urządzenia"];
            $PNu = $_GET["part_number_urządzenia"];
            $Datau = $_GET["data_zakupu_urządzenia"];
            $Gwarancja = $_GET["gwarancja"];
            $Numer_i_u = $_GET["numer_inwentarzowy_urządzenia"];
            $Nazwa_s_u = $_GET["nazwa_sieciowa_urządzenia"];
            $Stan = $_GET["stan_zużycia"];
            $Awaria = $_GET["awarie"];
            $Uwagi = $_GET["uwagi"];
            
            $sql = "INSERT INTO `peryferia`(`Szkoła_ID`, `Piętro`, `Pokój`, `Typ_urządzenia`, `Producent_urządzenia`, `Model_urządzenia`, `Numer_seryjny_urządzenia`, `Part_number_urządzenia`, `Data_zakupu_urządzenia`, `Gwarancja_urządzenia`, `Numer_inwentarzowy_urządzenia`, `Nazwa_sieciowa_urządzenia`, `Stan_zużycia`, `Awarie`, `Uwagi`)
            VALUES ('$szkola','$pietro','$pokoj','$typu','$producentu','$modelu','$SNu','$PNu','$Datau','$Gwarancja','$Numer_i_u','$Nazwa_s_u','$Stan','$Awaria','$Uwagi')";
            if (mysqli_query($link, $sql)) 
            {
                echo "<script type='text/javascript'>alert('Dodano');</script>";
                echo "<script>window.location = 'http://localhost/Strona/#loaded'</script>";
            } 
            else 
            {
                echo "<script type='text/javascript'>alert('Błąd w wpisywaniu');</script>";
                //echo "Error: " . $sql . "<br>" . mysqli_error($link);
                echo "<script>window.location = 'http://localhost/Strona/insert.php'</script>";
            } 
        ?>