<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>
    <style>
        body {
            background-color: #000;
            color: #0dd511;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 40px;
        }

        h1,
        h2 {
            color: #0dd511;
        }

        form {
            background-color: #111;
            border: 1px solid #0dd511;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            max-width: 500px;
            text-align: left;
            /* Aligns content inside form to the left */
            margin: 20px auto;
            /* Centers the form itself horizontally */
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background-color: #222;
            color: #fff;
            border: 1px solid #0dd511;
            border-radius: 5px;
            margin-left: -10px;
        }

        button {
            background-color: #0dd511;
            color: #000;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            align-items: center;
        }

        button:hover {
            background-color: #11ff5a;
        }

        .message {
            color: #fff;
            padding: 10px;
            margin-top: 10px;
        }

        .success {
            background-color: #004400;
        }

        .error {
            background-color: #440000;
        }

        form button {
            display: block;
            /* Makes it take full width of the line */
            margin: 20px auto 0;
            /* Centers the button horizontally */
        }

        .whole-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            /* full screen height */
            text-align: center;
        }


        .textarea {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            font-size: 20px;
            background-color: #1e2a22;
            color: #ffffff;
            border: 1px solid #00ff88;
            border-radius: 8px;
            resize: vertical;
            margin-left: 50;
        }
    </style>
</head>

<body>
    <div class="whole-container">
        <h1>Admin Panel</h1>

        <h2>Add Product</h2>
        <form method="POST" enctype="multipart/form-data">
            Name: <input type="text" name="name" required>
            Price: <input type="text" name="price" required>
            Image: <input type="file" name="image" accept="image/*" required>
            description: <input type="textarea" name="description" required rows="4" cols="20" class="textarea">
            <button type="submit" name="add">Add Product</button>
        </form>

        <h2>Remove Product</h2>
        <form method="POST">
            Product ID: <input type="text" name="id">
            <button type="submit" name="delete">Delete Product</button>
        </form>

        <?php
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $price = (float)$_POST['price'];
            $description = $_POST['description'];
            $image_name = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $upload_dir = 'uploads/';
            $image_path = $upload_dir . basename($image_name);

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            if (move_uploaded_file($image_tmp, $image_path)) {
                $stmt = $conn->prepare("INSERT INTO products (name, price, image_path, description) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("sdss", $name, $price, $image_path, $description);
                $stmt->execute();
                echo "<div class='message success'>Product added successfully.</div>";
            } else {
                echo "<div class='message error'>Failed to upload image.</div>";
            }
        }

        if (isset($_POST['delete'])) {
            $id = (int)$_POST['id'];
            $conn->query("DELETE FROM products WHERE id = $id");
            echo "<div class='message success'>Product removed.</div>";
        }
        ?>
    </div>
</body>

</html>