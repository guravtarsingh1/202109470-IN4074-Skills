<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_type = $_POST['appointment_type'];
    $symptoms = $_POST['symptoms'];

    $sql = "INSERT INTO appointments (name, email, phone, address, appointment_date, appointment_type, symptoms) VALUES ('$name', '$email', '$phone', '$address', '$appointment_date', '$appointment_type', '$symptoms')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New appointment created successfully'); window.location.href='home.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareWell Clinic - Create Appointment</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Create Appointment</h1>
    <form action="create.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br>

        <label for="appointment_date">Appointment Date:</label>
        <input type="date" id="appointment_date" name="appointment_date" required><br>

        <label for="appointment_type">Appointment Type:</label>
        <select id="appointment_type" name="appointment_type">
            <option value="general">General Checkup</option>
            <option value="specialist">Specialist Consultation</option>
            <option value="vaccine">Vaccine Appointment</option>
        </select><br>

        <label for="symptoms">Symptoms:</label>
        <textarea id="symptoms" name="symptoms"></textarea><br>

        <input type="submit" value="Create Appointment">
    </form>
</body>
</html>
