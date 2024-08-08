<?php
include 'config.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_type = $_POST['appointment_type'];
    $symptoms = $_POST['symptoms'];

    $sql = "UPDATE appointments SET name='$name', email='$email', phone='$phone', address='$address', appointment_date='$appointment_date', appointment_type='$appointment_type', symptoms='$symptoms' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Appointment updated successfully'); window.location.href='home.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $sql = "SELECT * FROM appointments WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareWell Clinic - Update Appointment</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Update Appointment</h1>
    <form action="update.php?id=<?php echo $id; ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required><?php echo $row['address']; ?></textarea><br>

        <label for="appointment_date">Appointment Date:</label>
        <input type="date" id="appointment_date" name="appointment_date" value="<?php echo $row['appointment_date']; ?>" required><br>

        <label for="appointment_type">Appointment Type:</label>
        <select id="appointment_type" name="appointment_type">
            <option value="general" <?php if ($row['appointment_type'] == 'general') echo 'selected'; ?>>General Checkup</option>
            <option value="specialist" <?php if ($row['appointment_type'] == 'specialist') echo 'selected'; ?>>Specialist Consultation</option>
            <option value="vaccine" <?php if ($row['appointment_type'] == 'vaccine') echo 'selected'; ?>>Vaccine Appointment</option>
        </select><br>

        <label for="symptoms">Symptoms:</label>
        <textarea id="symptoms" name="symptoms"><?php echo $row['symptoms']; ?></textarea><br>

        <input type="submit" value="Update Appointment">
    </form>
    <a href="home.php">Back to List</a>
</body>
</html>
