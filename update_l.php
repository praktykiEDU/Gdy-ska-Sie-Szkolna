<?php
    session_start();

    require_once "config.php";
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Gdyńska Sieć Szkolna</title>
    <link rel="stylesheet" href="styleV2.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<script src="jquery.js"></script>
</head>
<body>
    <div id="logo">
        <a href="index.php" title="Przejdź na stronę główną">
            <img src="logo.png" alt="logo" height="100px" width="400px">
        </a>
    </div>
    <div id="menu">
        <div id="przegladaj">
            <button type="button" onclick="window.location.href='select.php'" class="menu">Przegladaj</button>
        </div>
        <div id="dodaj">
            <button type="button" onclick="window.location.href='insert.php'" class="menu">Dodaj</Button>
        </div>
        <div id="aktualizuj">
            <button type="button" onclick="window.location.href='update.php'" class="menu">Aktualizuj</button>
        </div>
        <div id="lan">
            <button type="button" onclick="window.location.href='lan.php'" class="menu">LAN</button>
        </div>
        <div id="logowanie">
            <button type='button' onclick='window.location.href=`panel_sterowania.php`' class='menu'>Panel sterowania</button>
        </div>
    </div>
    <div id="content">
        <?php
                error_reporting(0);
                $admin = mysqli_query($link, "SELECT * FROM uzytkownicy WHERE username = '".$_SESSION['username']."'");
                $permissions = mysqli_fetch_assoc($admin);
                    if ($permissions["admin"] == true) {
                        echo '<h1>Aktualizuj bazę "komputery"</h1>';
                        echo '<select onChange="update(this)">';
                    } else {
                        echo '<p id="error">Nie posiadasz uprawnień!</p>';
                        echo '<select onChange="update(this)" style="visibility: hidden">';
                    }
        ?>
            <option selected hidden></option>
            <?php
                $sql = "SELECT * FROM komputery";
                $result = mysqli_query($link,$sql);
                $admin = mysqli_query($link, "SELECT * FROM uzytkownicy WHERE username = '".$_SESSION['username']."'");
                $permissions = mysqli_fetch_assoc($admin);
                    if ($permissions["admin"] == true) {
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='".$row["ID"]."'>".$row["ID"]."</option>"; 
                            }                            } 
                        else {
                            echo "0 wyników";
                        }
                    }
                ?>
                <script>
                    function update(select) {
                        var id = select.options[select.selectedIndex].getAttribute('value');
                        document.getElementById("content").innerHTML = "<h1>Aktualizujesz sieć lan o ID. " + id + 
                        "</h1><table id='output'><tr><th>ID szkoły</th><td><form action='../Gdynska-Siec-Szkolna-main/update/szkola_id_l.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='text' name='szkola_id'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>Piętro</th><td><form action='../Gdynska-Siec-Szkolna-main/update/pietro_l.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='text' name='pietro'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>Pokój</th><td><form action='../Gdynska-Siec-Szkolna-main/update/pokoj_l.php' method='POST'><input type='hidden' name='id' value='" + id +
                        "' readonly> <input type='text' name='pokoj'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>Lokalizacja urządzeń w szafie typu Rack</th><td><form action='../Gdynska-Siec-Szkolna-main/update/rack_l.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='text' name='rack'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>Typ urządzenia</th><td><form action='../Gdynska-Siec-Szkolna-main/update/typ_urządzenia_l.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <select name='typ_urzadzenia'><option selected hidden></option><option value='Router' >Router</option><option value='Switch' >Switch</option><option value='Hub' >Hub</option><option value='AP' >AP</option><option value='Inne' >Inne</option></select> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>Producent urządzenia</th><td><form action='../Gdynska-Siec-Szkolna-main/update/producent_urzadzenia_l.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='text' name='producent_urzadzenia'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>Model urządzenia</th><td><form action='../Gdynska-Siec-Szkolna-main/update/model_urządzenia_l.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='text' name='model_urzadzenia'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>Numer seryjny urządzenia</th><td><form action='../Gdynska-Siec-Szkolna-main/update/numer_seryjny_urzadzenia_l.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='text' name='numer_seryjny_urzadzenia'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>Part number urządzenia</th><td><form action='../Gdynska-Siec-Szkolna-main/update/part_number_urzadzenia_l.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='text' name='part_number_urzadzenia'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>Data zakupu urządzenia</th><td><form action='../Gdynska-Siec-Szkolna-main/update/data_zakupu_urzadzenia_l.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='date' name='data_zakupu_urzadzenia'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>Gwarancja urządzenia</th><td><form action='../Gdynska-Siec-Szkolna-main/update/gwarancja_urzadzenia_l.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='date' name='gwarancja_urzadznia'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>Numer inwentarzowy urządzenia</th><td><form action='../Gdynska-Siec-Szkolna-main/update/numer_inwentarzowy_urzadzenia_l.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='text' name='numer_inwentarzowy_urzadzenia'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>Nazwa sieciowa urządzenia</th><td><form action='../Gdynska-Siec-Szkolna-main/update/nazwa_sieciowa_urzadzenia_l.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='text' name='nazwa_sieciowa_urzadzenia'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>Awarie</th><td><form action='../Gdynska-Siec-Szkolna-main/update/awarie_l.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='text' name='awarie'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>Uwagi</th><td><form action='../Gdynska-Siec-Szkolna-main/update/uwagi_l.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='text' name='uwagi'> <button type='submit'>Zaktualizuj</button></form></td></tr></table><div class='back'><a href='update.php' title='Przejdź na stronę główną'><img src='back.png' alt='Powrót do poprzedniej strony' height='100px' width='100px'></img></a></div>";
                    }
                </script>
        </select>
        <br>
        <div class="back">
            <a href="update.php" title="Przejdź na stronę główną">
                <img src="back.png" alt="Powrót do poprzedniej strony" height="100px" width="100px"></img>
            </a>
        </div>
    </div>
    <footer>
        <div id="uzytkownik">
            <p>
                <?php
                    if (isset($_SESSION["username"])) {
                        $logout = '"logout.php"';
                        echo "Jesteś zalogowany jako: ". $_SESSION["username"]. "<br><a href=". $logout. ">Wyloguj się</a>";
                    } else {
                        echo "Nie jesteś zalogowany";
                    }
                ?>
            </p>
        </div>
        <div id="kontakt">
            <h2>Kontakt</h2>
            <p style="color:#8287b5;">Wydział Edukacji<br>ul. Śląska 35-37<br>81-314 Gdynia</p>
            <ul>
                <li><a href="mailto:wydz.edukacji@gdynia.pl" title="Wyślij e-mail na adres wydz.edukacji@gdynia.pl"><span>wydz.edukacji@gdynia.pl</span></a></li>
                <li><a href="tel:+587617700" title="Zadzwoń na numer +58 7617700"><span>+58 761 77 00</span></a></li>
            </ul>
        </div>
    </footer>
    <script>
        window.onload = function() {
            if(!window.location.hash) {
                window.location = window.location + '#loaded';
                window.location.reload();
            }
        }
    </script>
</body>
</html>