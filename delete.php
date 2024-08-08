<?php
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM appointments WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Appointment deleted successfully'); window.location.href='home.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
