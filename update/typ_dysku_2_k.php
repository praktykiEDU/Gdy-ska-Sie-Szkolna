<?php
        session_start();
        require_once "config.php";
        $Typ_dysku_2 = $_POST['typ_dysku_2'];
        $ID = $_POST['id'];
        $sql = "UPDATE komputery SET Typ_dysku_2='$Typ_dysku_2' WHERE ID='$ID'";
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