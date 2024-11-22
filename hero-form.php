<?php include('components/head.php') ?>
<?php include('components/navbar.php') ?>
<?php include('connection.php') ?>



<?php

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Check if the table has any record
    $sql = "SELECT * FROM hero LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // A record exists, update it
        $stmt = $conn->prepare("UPDATE hero SET title = ?, description = ?");
        $stmt->bind_param("ss", $title, $description);

        if ($stmt->execute()) {
            echo 'Record updated successfully';
        } else {
            echo 'Error updating record';
        }
    } else {
        // No record exists, create a new one
        $stmt = $conn->prepare("INSERT INTO hero (title, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $description);

        if ($stmt->execute()) {
            echo 'Record created successfully';
        } else {
            echo 'Error creating record';
        }
    }
}

?>




<section class="container py-5">
    <h2 class="text-center mb-4">Update Hero Section</h2>
    <form action="hero-form.php" method="POST">
        <div class="mb-3">
            <label for="hero-title" class="form-label">Hero Title</label>
            <input
                type="text"
                id="hero-title"
                class="form-control"
                name="title"
                placeholder="Enter the title"
                required>
        </div>
        <div class="mb-3">
            <label for="hero-description" class="form-label">Hero Description</label>
            <textarea
                id="hero-description"
                class="form-control"
                rows="3"
                name="description"
                placeholder="Enter the description"
                required></textarea>
        </div>
        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">Update Hero Section</button>
        </div>
    </form>
</section>
<?php include('components/end.php') ?>