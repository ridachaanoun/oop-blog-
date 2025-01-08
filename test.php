<?php
// $auth = new AuthController($db);
// $response = $auth->register('JohnDoe', 'Password123', 'johndoe@example.com');

// if ($response['status'] === 'error') {
//     if (isset($response['errors'])) {
//         foreach ($response['errors'] as $field => $error) {
//             echo "$field: $error<br>";
//         }
//     } else {
//         echo $response['message'];
//     }
// } else {
//     echo $response['message'];
// }



// Instantiate the Article class
$article = new Article($db);

// Example usage

// // Create a new article with image upload
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
//     $title = $_POST['title'];
//     $content = $_POST['content'];
//     $userId = 1; // Replace with the actual user ID
//     $categoryId = 2; // Replace with the actual category ID
//     $imageFile = $_FILES['image'];

//     $result = $article->create($title, $content, $imageFile, $userId, $categoryId);
//     echo json_encode($result);
// }

// // Read an article
// $articleId = 1; // Replace with the actual article ID
// $result = $article->read($articleId);
// echo "<pre>";
// print_r($result);
// echo "</pre>";

// // Update an article
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
//     $id = $_POST['id'];
//     $title = $_POST['title'];
//     $content = $_POST['content'];
//     $categoryId = 3; // Replace with the actual category ID
//     $imageFile = $_FILES['image'] ?? null; // Optional image update

//     $result = $article->update($id, $title, $content, $imageFile, $categoryId);
//     echo json_encode($result);
// }

// // Delete an article
// $articleIdToDelete = 2; // Replace with the actual article ID
// $result = $article->delete($articleIdToDelete);
// echo json_encode($result);

// // List all articles
// $result = $article->listAll();
// echo "<pre>";
// print_r($result);
// echo "</pre>";

// <form method="POST" enctype="multipart/form-data">
//     <label>Title:</label>
//     <input type="text" name="title" required>

//     <label>Content:</label>
//     <textarea name="content" required></textarea>

//     <label>Category ID:</label>
//     <input type="number" name="category_id" required>

//     <label>Image:</label>
//     <input type="file" name="image" accept="image/*">

//     <button type="submit">Submit</button>
// </form>
