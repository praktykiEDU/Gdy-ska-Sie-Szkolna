<?php
        session_start();
        require_once "config.php";
        $szkola_id = $_POST['szkola_id'];
        $ID = $_POST['id'];
        $sql = "UPDATE uzytkownicy SET szkoła_id='$szkola_id' WHERE ID='$ID'";
        if (mysqli_query($link, $sql)) 
            {
                echo "<script type='text/javascript'>alert('Zaaktualizowano');</script>";
                echo "<script>window.location = 'http://localhost/Gdynska-Siec-Szkolna-main/#loaded'</script>";
            } 
        else 
            {
                echo "<script type='text/javascript'>alert('Błąd w wpisywaniu');</script>";
                //echo "Error: " . $sql . "<br>" . mysqli_error($link);
                echo "<script>window.location = 'http://localhost/Gdynska-Siec-Szkolna-main/uprawnienia.php'</script>";
            } 
?>