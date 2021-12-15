<?php
            session_start();
            require_once "config.php";
            $szkola = $_GET["szkola"];
            $ulica = $_GET["ulica"];
            $kodpocztowy = $_GET["kodpocztowy"];
            $tel = $_GET["telefon"];
            
            $sql = "INSERT INTO `szkoly`(`Szkoła`, `Ulica`, `Kod_pocztowy`, `Telefon`)
            VALUES ('$szkola','$ulica','$kodpocztowy','$tel')";
            if (mysqli_query($link, $sql)) 
            {
                echo "<script type='text/javascript'>alert('Dodano');</script>";
                echo "<script>window.location = 'http://localhost/Gdynska-Siec-Szkolna-main/#loaded'</script>";
            } 
            else 
            {
                echo "<script type='text/javascript'>alert('Błąd w wpisywaniu');</script>";
                //echo "Error: " . $sql . "<br>" . mysqli_error($link);
                echo "<script>window.location = 'http://localhost/Gdynska-Siec-Szkolna-main/insert.php'</script>";
            } 
        ?>