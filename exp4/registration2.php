 <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $mobile_number = $_POST['mobile_number'];
    $sql = "INSERT INTO students (first_name, last_name, email, dob, gender, mobile_number)
            VALUES ('$first_name', '$last_name', '$email', '$dob', '$gender', '$mobile_number')";
    if ($conn->query($sql) === TRUE) {
        header("Location: login2.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>