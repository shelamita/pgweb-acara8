<html>
<?php
// Sesuaikan dengan setting MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pgweb-acara8";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM acara8";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1px'><tr>
    <th>kecamatan</th>
    <th>longitude</th>
    <th>latitude</th>
    <th>luas</th>
    <th>jumlah_Penduduk</th>
    <th>aksi</th></tr>";

    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["kecamatan"] . "</td>
            <td>" . $row["longitude"] . "</td>
            <td>" . $row["latitude"] . "</td>
            <td>" . $row["luas"] . "</td>
            <td align='right'>" . $row["jumlah_penduduk"] . "</td>
            <td>
                <a href='delete.php?id=" . $row["ID"] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">Delete</a>
            </td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
</html>
