<?php
        session_start();
        require_once "config.php";
        $Typ_dysku_3 = $_POST['typ_dysku_3'];
        $ID = $_POST['id'];
        $sql = "UPDATE komputery SET Typ_dysku_3='$Typ_dysku_3' WHERE ID='$ID'";
        if (mysqli_query($link, $sql)) 
            {
                echo "<script type='text/javascript'>alert('Zaaktualizowano');</script>";
                echo "<script>window.location = 'http://localhost/Gdynska-Siec-Szkolna-main/#loaded'</script>";
            } 
        else 
            {
                echo "<script type='text/javascript'>alert('Błąd w wpisywaniu');</script>";
                //echo "Error: " . $sql . "<br>" . mysqli_error($link);
                echo "<script>window.location = 'http://localhost/Gdynska-Siec-Szkolna-main/update_k.php'</script>";
            } 
?>