<?php
include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM appointments WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareWell Clinic - View Appointment</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>View Appointment</h1>
    <table>
        <tr><th>ID</th><td><?php echo $row['id']; ?></td></tr>
        <tr><th>Name</th><td><?php echo $row['name']; ?></td></tr>
        <tr><th>Email</th><td><?php echo $row['email']; ?></td></tr>
        <tr><th>Phone</th><td><?php echo $row['phone']; ?></td></tr>
        <tr><th>Address</th><td><?php echo $row['address']; ?></td></tr>
        <tr><th>Appointment Date</th><td><?php echo $row['appointment_date']; ?></td></tr>
        <tr><th>Appointment Type</th><td><?php echo $row['appointment_type']; ?></td></tr>
        <tr><th>Symptoms</th><td><?php echo $row['symptoms']; ?></td></tr>
    </table>
    <a href="home.php">Back to List</a>
</body>
</html>

<?php
$conn->close();
?>
