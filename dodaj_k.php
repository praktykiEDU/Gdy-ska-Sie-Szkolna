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
            <?php
                error_reporting(0);
                if (($_SESSION["loggedin"]) == true) {
                    echo "<button type='button' onclick='window.location.href=`panel_sterowania.php`' class='menu'>Panel sterowania</button>";
                } else {
                    echo "<button type='button' onclick='window.location.href=`login.php`' class='menu'>Zaloguj się</button>";
                }
            ?>
        </div>
    </div>
    <div id="content">
        <form action="dodaj_k2.php" method="get">
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
                        <th>Typ komputera</th>
                        <td>
                            <select name="typ_komputera">
                                <option selected hidden></option>
                                <option value="Notebook" >Notebook</option>
                                <option value="Desktop" >Desktop</option>
                                <option value="AiO" >AiO</option>
                                <option value="Serwer" >Serwer</option>
                                <option value="Tablet" >Tablet</option>
                                <option value="Inne" >Inne </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Producent komputera</th>
                        <td><input type='text' name='producent_komputera' /></td>
                    </tr>
                    <tr>
                        <th>Model komputera</th>
                        <td><input type='text' name='model_komputera' /></td>
                    </tr>
                    <tr>
                        <th>Numer seryjny komputera</th>
                        <td><input type='text' name='numer_seryjny_komputera' /></td>
                    </tr>
                    <tr>
                        <th>Part number komputera</th>
                        <td><input type='text' name='part_number_komputera' /></td>
                    </tr>
                    <tr>
                        <th>Data zakupu komputera</th>
                        <td><input type='date' name='data_zakupu_komputera' /></td>
                    </tr>
                    <tr>
                        <th>Gwarancja<br>(data wygaśnięcia)</th>
                        <td><input type='date' name='gwarancja' /></td>
                    </tr>
                    <tr>
                        <th>Numer inwentarzowy komputera</th>
                        <td><input type='text' name='numer_inwentarzowy_komputera' /></td>
                    </tr>
                    <tr>
                        <th>Nazwa hosta</th>
                        <td><input type='text' name='host_name' /></td>
                    </tr>
                    <tr>
                        <th>System operacyjny</th>
                        <td><input type='text' name='system_operacyjny' /></td>
                    </tr>
                    <tr>
                        <th>Wersja bitowa</th>
                        <td>
                            <select name="wersja_bitowa">
                                <option selected hidden></option>
                                <option value="32" >32</option>
                                <option value="64" >64</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Procesor</th>
                        <td><input type='text' name='procesor' /></td>
                    </tr>
                    <tr>
                        <th>Oznaczenie procesora</th>
                        <td><input type='text' name='oznaczenie_procesora' /></td>
                    </tr>
                    <tr>
                        <th>RAM<br>(GB)</th>
                        <td><input type='text' name='ram' /></td>
                    </tr>
                    <tr>
                        <th>Typ dysku 1</th>
                        <td>
                            <select name="dysk1">
                                <option selected hidden></option>
                                <option value="HDD" >HDD</option>
                                <option value="SSD" >SSD</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Wielkość dysku 1<br>(GB)</th>
                        <td><input type='text' name='dysk1_wielkość' /></td>
                    </tr>
                    <tr>
                        <th>Typ dysku 2</th>
                        <td>
                            <select name="dysk2">
                                <option selected hidden></option>
                                <option value="HDD" >HDD</option>
                                <option value="SSD" >SSD</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Wielkość dysku 2<br>(GB)</th>
                        <td><input type='text' name='dysk2_wielkość' /></td>
                    </tr>
                    <tr>
                        <th>Typ dysku 3</th>
                        <td>
                            <select name="dysk3">
                                <option selected hidden></option>
                                <option value="HDD" >HDD</option>
                                <option value="SSD" >SSD</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Wielkość dysku 3<br>(GB)</th>
                        <td><input type='text' name='dysk3_wielkość' /></td>
                    </tr>
                    <tr>
                        <th>Typ dysku 4</th>
                        <td>
                            <select name="dysk4">
                                <option selected hidden></option>
                                <option value="HDD" >HDD</option>
                                <option value="SSD" >SSD</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Wielkość dysku 4<br>(GB)</th>
                        <td><input type='text' name='dysk4_wielkość' /></td>
                    </tr>
                    <tr>
                        <th>RAID</th>
                        <td><input type='text' name='raid' /></td>
                    </tr>
                    <tr>
                        <th>Producent monitora</th>
                        <td><input type='text' name='producent_monitora' /></td>
                    </tr>
                    <tr>
                        <th>Model monitora</th>
                        <td><input type='text' name='model_monitora' /></td>
                    </tr>
                    <tr>
                        <th>Numer seryjny monitora</th>
                        <td><input type='text' name='numer_seryjny_monitora' /></td>
                    </tr>
                    <tr>
                        <th>Part number monitora</th>
                        <td><input type='text' name='part_number_monitora' /></td>
                    </tr>
                    <tr>
                        <th>Data zakupu monitora</th>
                        <td><input type='date' name='data_zakupu_monitora' /></td>
                    </tr>
                    <tr>
                        <th>Numer inwentarzowy monitora</th>
                        <td><input type='text' name='numer_inwentarzowy_monitora' /></td>
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