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
            <button type="button" onclick="window.location.href='select.php'" class="menu" >Przegladaj</button>
        </div>
        <div id="dodaj">
            <button type="button" onclick="window.location.href='insert.php'" class="menu" >Dodaj</Button>
        </div>
        <div id="aktualizuj">
            <button type="button" onclick="window.location.href='update.php'" class="menu" >Aktualizuj</button>
        </div>
        <div id="lan">
            <button type="button" onclick="window.location.href='lan.php'" class="menu" >LAN</button>
        </div>
        <div id="logowanie">
            <button type='button' onclick='window.location.href=`panel_sterowania.php`' class='menu'>Panel sterowania</button>
        </div>
    </div>
    <div id="content">
        <form action="dodaj_p2.php" method="get">
            <?php
                    error_reporting(0);
                    $admin = mysqli_query($link, "SELECT * FROM uzytkownicy WHERE username = '".$_SESSION['username']."'");
                    $permissions = mysqli_fetch_assoc($admin);
                        if ($permissions["admin"] == true) {
                            echo '<table id="input">';
                        } else {
                            echo '<p id="error">Nie posiadasz uprawnień!</p>';
                            echo '<table id="input" style="visibility: hidden">';
                        }
            ?>
                    <tr>
                        <th>ID szkoły</th>
                        <td><input type="text" name='szkola'></td>
                    </tr>
                    <tr>
                        <th>Piętro</th>
                        <td><input type='text' name='pietro' /></td>
                    </tr>
                    <tr>
                        <th>Pokój</th>
                        <td><input type='text' name='pokoj' /></td>
                    </tr>
                    <tr>
                        <th>Typ urządzenia</th>
                        <td>
                            <select name="typ_U">
                                <option selected hidden></option>
                                <option value="Projektor" >Projektor</option>
                                <option value="Tablica" >Tablica interaktywna</option>
                                <option value="Drukarka" >Durkarka</option>
                                <option value="Dysk" >Dysk sieciowy</option>
                                <option value="Inne" >Inne</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Producent urządzenia</th>
                        <td><input type='text' name='producent_urządzenia' /></td>
                    </tr>
                    <tr>
                        <th>Model urządzenia</th>
                        <td><input type='text' name='model_urządzenia' /></td>
                    </tr>
                    <tr>
                        <th>Numer seryjny urządzenia</th>
                        <td><input type='text' name='numer_seryjny_urządzenia' /></td>
                    </tr>
                    <tr>
                        <th>Part number urządzenia</th>
                        <td><input type='text' name='part_number_urządzenia' /></td>
                    </tr>
                    <tr>
                        <th>Data zakupu urządzenia</th>
                        <td><input type='date' name='data_zakupu_urządzenia' /></td>
                    </tr>
                    <tr>
                        <th>Gwarancja<br>(data wygaśnięcia)</th>
                        <td><input type='date' name='gwarancja' /></td>
                    </tr>
                    <tr>
                        <th>Numer inwentarzowy urządzenia</th>
                        <td><input type='text' name='numer_inwentarzowy_urządzenia' /></td>
                    </tr>
                    <tr>
                        <th>Nazwa sieciowa urządzenia</th>
                        <td><input type='text' name='nazwa_sieciowa_urządzenia' /></td>
                    </tr>
                    <tr>
                        <th>Stan zużycia</th>
                        <td><input type='text' name='stan_zużycia' /></td>
                    </tr>
                    <tr>
                        <th>Naprawy i awarie</th>
                        <td><input type='text' name='awarie' /></td>
                    </tr>
                    <tr>
                        <th>Uwagi</th>
                        <td><input type='text' name='uwagi' /></td>
                    </tr>
                </table>
                <input type='submit' class='lista2' value='Dodaj' />
            </form>
        <?php

                if(isset($_POST['submit'])){
                    if(!empty($_POST['Pietro'])) {
                        $Pietro = $_POST['Pietro'];
                        echo 'You have chosen: '. $Pietro;
                    } else {
                        echo 'Please select.';
                    }
                 }
        ?>
        <div class="back">
            <a href="insert.php" title="Przejdź na stronę główną">
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
</body>
</html>