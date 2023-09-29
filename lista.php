<!DOCTYPE HTML>
<html lang="pl-PL">    
<head>
  <meta charset=utf-8 >
	<title>Panel administratora</title>
  <link href="styl4.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div class="baner">
    <h3>Portal Społecznościowy - panel administratora</h3>
  </div>
  <div class="left">
    <h4>Użytkownicy</h4>

    <?php 
    $connect = mysqli_connect("localhost", "root", "", "dane4");
    $sql = "SELECT id, imie, nazwisko, rok_urodzenia FROM osoby LIMIT 30;";
    $result = mysqli_query($connect, $sql);

    $rokA = (int) date('Y');
    
    while ($row = mysqli_fetch_row($result)) {
      $rok = (int) $row[3];
      $wiek = $rokA-$rok;
      echo $row[0]." ".$row[1]." ".$row[2]." ".$wiek."<br>";
    }
    mysqli_close($connect);
    ?>
    <a href="settings.html">Inne ustawienia</a>
    </div>
    <div class="right">
      <h4>Podaj id użytkownika</h4>
      <form action="lista.php" method="POST">
        <input type="number" name="numer" id="numer">
        <input type="submit" name="zobacz" value="ZOBACZ">
      </form>
      <?php 
    if(!empty($_POST["numer"])){
    $id = $_POST['numer'];
    $connect = mysqli_connect("localhost", "root", "", "dane4");
    $sql = "SELECT imie, nazwisko, rok_urodzenia, opis, zdjecie, nazwa FROM osoby JOIN hobby ON osoby.Hobby_id = hobby.id WHERE osoby.id = $id;";
    $result = mysqli_query($connect, $sql);
    
    while ($row = mysqli_fetch_row($result)) {
      echo '<hr>';
      echo '<h2>'.$id." ".$row[0]." ".$row[1].'</h2>';
      echo "<img  src='$row[4]' alt='$id'>";
      echo '<p>Rok urodzenia '.$row[2].'</p>';
      echo '<p>Opis '.$row[3].'</p>';
      echo '<p>Hobby '.$row[5].'</p>';
      }
    mysqli_close($connect);
    }
    ?>
  <h4>
    </div>
    
    <div class="stopka">
      Stronę wykonał: 00000000000000
    </div>
</body>

</html>