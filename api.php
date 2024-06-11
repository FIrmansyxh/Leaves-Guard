<?php
header("Content-Type: application/json");

include 'config.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        handleGet($conn);
        break;
    case 'POST':
        handlePost($conn);
        break;
    case 'PUT':
        handlePut($conn);
        break;
    case 'DELETE':
        handleDelete($conn);
        break;
    default:
        echo json_encode(["message" => "Method not allowed"]);
        break;
}

function handleGet($conn) {
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($id > 0) {
        $sql = "SELECT * FROM product WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo json_encode($row);
        } else {
            echo json_encode(["message" => "Product not found"]);
        }
    } else {
        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);

        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        echo json_encode($products);
    }
}

function handlePost($conn) {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['name']) && isset($data['photo']) && isset($data['location']) && isset($data['description']) && isset($data['price']) && isset($data['link_product'])) {
        $name = $conn->real_escape_string($data['name']);
        $photo = $conn->real_escape_string($data['photo']);
        $location = $conn->real_escape_string($data['location']);
        $description = $conn->real_escape_string($data['description']);
        $price = $conn->real_escape_string($data['price']);
        $link_product = $conn->real_escape_string($data['link_product']);

        $sql = "INSERT INTO product (name, photo, location, description, price, link_product) VALUES ('$name', '$photo', '$location', '$description', $price, '$link_product')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "Product created successfully"]);
        } else {
            echo json_encode(["message" => "Error: " . $conn->error]);
        }
    } else {
        echo json_encode(["message" => "Invalid input"]);
    }
}

function handlePut($conn) {
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $data = json_decode(file_get_contents("php://input"), true);

    if ($id > 0 && isset($data['name']) && isset($data['photo']) && isset($data['location']) && isset($data['description']) && isset($data['price']) && isset($data['link_product'])) {
        $name = $conn->real_escape_string($data['name']);
        $photo = $conn->real_escape_string($data['photo']);
        $location = $conn->real_escape_string($data['location']);
        $description = $conn->real_escape_string($data['description']);
        $price = $conn->real_escape_string($data['price']);
        $link_product = $conn->real_escape_string($data['link_product']);

        $sql = "UPDATE product SET name='$name', photo='$photo', location='$location', description='$description', price=$price, link_product='$link_product' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "Product updated successfully"]);
        } else {
            echo json_encode(["message" => "Error: " . $conn->error]);
        }
    } else {
        echo json_encode(["message" => "Invalid input or product ID"]);
    }
}

function handleDelete($conn) {
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($id > 0) {
        $sql = "DELETE FROM product WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "Product deleted successfully"]);
        } else {
            echo json_encode(["message" => "Error: " . $conn->error]);
        }
    } else {
        echo json_encode(["message" => "Invalid product ID"]);
    }
}

$conn->close();
?>
