<?php include('connection.php') ?>

<?php

$sql = "SELECT * FROM hero LIMIT 1"; // Adjusted query to fetch the single existing record
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc(); // Fetch the record as an associative array
    // Now, $row['title'] and $row['description'] contain the data
}


?>

<section class="hero text-center py-5">
    <div class="container">
        <h1><?php echo $row['title'] ?? '' ?></h1>
        <p class="lead"><?php echo $row['description'] ?? '' ?></p>
        <a href="#posts" class="btn btn-primary btn-lg">Explore Posts</a>
    </div>
</section>