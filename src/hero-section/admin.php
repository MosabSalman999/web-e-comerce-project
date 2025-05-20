<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>
</head>

<body>
    <h1>Admin Panel</h1>

    <h2>Add Product</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        Name: <input type="text" name="name" required><br>
        Price: <input type="text" name="price" required><br>
        Image: <input type="file" name="image" accept="image/*" required><br>
        <button type="submit" name="add">Add Product</button>
    </form>


    <h2>Remove Product</h2>
    <form method="POST" action="">
        Product ID: <input type="text" name="id"><br>
        <button type="submit" name="delete">Delete Product</button>
    </form>

    <?php
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];

        // File upload handling
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $upload_dir = 'uploads/'; // Folder to store images
        $image_path = $upload_dir . basename($image_name);

        // Create uploads folder if it doesn't exist
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Move uploaded file
        if (move_uploaded_file($image_tmp, $image_path)) {
            // Save to database
            $stmt = $conn->prepare("INSERT INTO products (name, price, image_path) VALUES (?, ?, ?)");
            $stmt->bind_param("sds", $name, $price, $image_path);
            $stmt->execute();
            echo "<p style='color:green;'>Product added successfully.</p>";
        } else {
            echo "<p style='color:red;'>Failed to upload image.</p>";
        }
    }

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $conn->query("DELETE FROM products WHERE id = $id");
        echo "Product removed.";
    }
    ?>
</body>

</html>