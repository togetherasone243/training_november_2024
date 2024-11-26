<?php
require "index.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Read the JSON input
    $input = json_decode(file_get_contents('php://input'), true);

    // Retrieve title and description from the JSON data
    $title = $input['title'] ?? null;
    $description = $input['description'] ?? null;

    if ($title && $description) {
        // Insert data into the database
        $stmt = $pdo->prepare("INSERT INTO tasks (title, descriptiion) VALUES (?, ?)");
        $stmt->execute([$title, $description]);

        echo json_encode(["message" => "Tâche créée avec succès !"]);
    } else {
        echo json_encode(["error" => "Invalid input"]);
    }
} else {
    echo json_encode(["error" => "Invalid request method"]);
}
?>
