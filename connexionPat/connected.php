<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }

    include 'cnx.php';

    $query = mysqli_query($conn, "SELECT * FROM patient WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        echo "Welcome " . $row['nom'] . " <a href='logout.php'>Logout</a>";
    }
?>