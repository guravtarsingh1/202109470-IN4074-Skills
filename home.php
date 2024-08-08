<?php
include 'config.php';

$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareWell Clinic - Appointments</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Appointment List</h1>
    <a href="create.php">Create New Appointment</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['appointment_date']; ?></td>
                <td><?php echo $row['appointment_type']; ?></td>
                <td>
                    <a href="read.php?id=<?php echo $row['id']; ?>">View</a> |
                    <a href="update.php?id=<?php echo $row['id']; ?>">Update</a> |
                    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();
?>
