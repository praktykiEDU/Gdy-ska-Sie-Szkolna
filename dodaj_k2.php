<?php
            session_start();
            require_once "config.php";
            $szkola = $_GET["szkola"];
            $pietro = $_GET["pietro"];
            $pokoj = $_GET["pokoj"];
            $typk = $_GET["typ_komputera"];
            $producentk = $_GET["producent_komputera"];
            $modelk = $_GET["model_komputera"];
            $SNk = $_GET["numer_seryjny_komputera"];
            $PNk = $_GET["part_number_komputera"];
            $Datak = $_GET["data_zakupu_komputera"];
            $Gwarancja = $_GET["gwarancja"];
            $Numer_i_k = $_GET["numer_inwentarzowy_komputera"];
            $Host = $_GET["host_name"];
            $System_o = $_GET["system_operacyjny"];
            $Bit = $_GET["wersja_bitowa"];
            $Procesor = $_GET["procesor"];
            $Oznaczenie_p = $_GET["oznaczenie_procesora"];
            $RAM = $_GET["ram"];
            $Dysk1 = $_GET["dysk1"];
            $Dysk1_w = $_GET["dysk1_wielkość"];
            $Dysk2 = $_GET["dysk2"];
            $Dysk2_w = $_GET["dysk2_wielkość"];
            $Dysk3 = $_GET["dysk3"];
            $Dysk3_w = $_GET["dysk3_wielkość"];
            $Dysk4 = $_GET["dysk4"];
            $Dysk4_w = $_GET["dysk4_wielkość"];
            $RAID = $_GET["raid"];
            $Producentm = $_GET["producent_monitora"];
            $Modelm = $_GET["model_monitora"];
            $SNm = $_GET["numer_seryjny_monitora"];
            $PNm = $_GET["part_number_monitora"];
            $Datam = $_GET["data_zakupu_monitora"];
            $Numer_i_m = $_GET["numer_inwentarzowy_monitora"];
            $Awaria = $_GET["awarie"];
            $Uwagi = $_GET["uwagi"];
            
            $sql = "INSERT INTO `komputery`(`Szkoła_ID`, `Piętro`, `Pokój`, `Typ_komputera`, `Producent_komputera`, `Model_komputera`, `Numer_seryjny_komputera`, `Part_number_komputera`, `Data_zakupu_komputera`, `Gwarancja_komputera`, `Numer_inwentarzowy_komputera`, `Nazwa_hosta`, `System_operacyjny`, `Wersja_bitowa`, `Nazwa_procesora`, `Oznaczenie_procesora`, `RAM`, `Typ_dysku_1`, `Wielkość_dysku_1`, `Typ_dysku_2`, `Wielkość_dysku_2`, `Typ_dysku_3`, `Wielkość_dysku_3`, `Typ_dysku_4`, `Wielkość_dysku_4`, `RAID`, `Producent_monitora`, `Model_monitora`, `Numer_seryjny_monitora`, `Part_number_monitora`, `Data_zakupu_monitora`, `Numer_inwentarzowy_monitora`, `Awarie`, `Uwagi`)
            VALUES ('$szkola','$pietro','$pokoj','$typk','$producentk','$modelk','$SNk','$PNk','$Datak','$Gwarancja','$Numer_i_k','$Host','$System_o','$Bit','$Procesor','$Oznaczenie_p','$RAM','$Dysk1','$Dysk1_w','$Dysk2','$Dysk2_w','$Dysk3','$Dysk3_w','$Dysk4','$Dysk4_w','$RAID','$Producentm','$Modelm','$SNm','$PNm','$Datam','$Numer_i_m','$Awaria','$Uwagi')";
            if (mysqli_query($link, $sql)) 
            {
                echo "<script type='text/javascript'>alert('Dodano');</script>";
                echo "<script>window.location = 'http://localhost/Gdynska-Siec-Szkolna-main/#loaded'</script>";
            } 
            else 
            {
                //echo "<script type='text/javascript'>alert('Błąd w wpisywaniu');</script>";
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
                //echo "<script>window.location = 'http://localhost/Gdynska-Siec-Szkolna-main/insert.php'</script>";
            } 
        ?>