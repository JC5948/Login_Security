<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$varUsers = $_POST["users"];
$varPassword = $_POST["password"];

$sql = "SELECT * FROM `comptes` WHERE `Users`='$varUsers' AND `Password`='$varPassword';";
$result = mysqli_query($conn, $sql);

$varValide = 0;

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $varValide = 1;
    echo "id: " . $row["ID"]. " - Utilisateur: " . $row["Users"]. " " . $row["Password"]. "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);

if ($varValide == 1){

}
?>

Utilisateur : <?php echo $_POST["users"]; ?><br>
Mot de passe : <?php echo $_POST["password"]; ?>

</body>
</html>