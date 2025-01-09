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
// $article = new Article($db);

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




// $db = (new Database())->connect();


// $comment = new Comment($db);

// // Example 1: Create a new comment
// $result = $comment->createComment(6, 1, "This is a great article!");
// echo json_encode($result);

// // Example 2: Fetch all comments for an article
// $comments = $comment->getCommentsByArticle(1);
// echo "<h3>Comments for Article ID 1:</h3>";
// foreach ($comments as $c) {
//     echo "<p><strong>{$c['username']}</strong>: {$c['content']} ({$c['created_at']})</p>";
// }

// // Example 3: Update a comment
// $updateResult = $comment->updateComment(3, 2, "Updated comment content.");
// echo json_encode($updateResult);

// // Example 4: Delete a comment
// $deleteResult = $comment->deleteComment(3, 2);
// echo json_encode($deleteResult);





$pdo = (new Database())->connect();

// Initialize the Category class
$category = new Category($pdo);

// Start the session and set user information
// session_start();
// $_SESSION["user_id"] = 1; // Example user ID
// $_SESSION["role"] = "admin"; // Example role: admin or user

// // Example 1: Add a category (only admins can add categories)
// echo "<h3>Adding a Category:</h3>";
// $result = $category->addCategory("Technology");
// echo $result['message'] . "<br>";

// Example 2: Delete a category (only admins can delete categories)
// echo "<h3>Deleting a Category:</h3>";
// $result = $category->deleteCategory(5); // Assuming category ID 1 exists
// echo $result['message'] . "<br>";

// Example 3: List all categories
// echo "<h3>List of Categories:</h3>";
// $categories = $category->listCategories();

// if (count($categories) > 0) {
//     foreach ($categories as $cat) {
//         echo $cat['id'] . ": " . $cat['name'] . "<br>";
//     }
// } else {
//     echo "No categories found.";
// }
