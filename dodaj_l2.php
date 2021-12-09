<?php
            session_start();
            require_once "config.php";
            $szkola = $_GET["szkola"];
            $pietro = $_GET["pietro"];
            $pokoj = $_GET["pokoj"];
            $rack = $_GET["rack"];
            $typ = $_GET["typ_U"];
            $producent = $_GET["producent_urządzenia"];
            $model = $_GET["model_urządzenia"];
            $SN = $_GET["numer_seryjny_urządzenia"];
            $PN = $_GET["part_number_urządzenia"];
            $Data = $_GET["data_zakupu_urządzenia"];
            $Gwarancja = $_GET["gwarancja"];
            $Numer_i = $_GET["numer_inwentarzowy_urządzenia"];
            $Nazwa_s = $_GET["nazwa_sieciowa_urządzenia"];
            $Awaria = $_GET["awarie"];
            $Uwagi = $_GET["uwagi"];
            
            $sql = "INSERT INTO `sieci_lan`(`Szkoła_ID`, `Piętro`, `Pokój`, `Lokalizacja_urządzeń_w_szafie_typu_Rack`, `Typ_urządzenia`, `Producent_urządzenia`, `Model_urządzenia`, `Numer_seryjny_urządzenia`, `Part_number_urządzenia`, `Data_zakupu_urządzenia`, `Gwarancja_urządzenia`, `Numer_inwentarzowy_urządzenia`, `Nazwa_sieciowa_urządzenia`, `Awarie`, `Uwagi`)
            VALUES ('$szkola','$pietro','$pokoj','$rack','$typ','$producent','$model','$SN','$PN','$Data','$Gwarancja','$Numer_i','$Nazwa_s','$Awaria','$Uwagi')";
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