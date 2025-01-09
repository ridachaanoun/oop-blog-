<?php
// Include the database connection and Article class
include 'db/database.php'; // Assuming you have a separate file for the DB connection
include 'classes/Article.php'; // Include the Article class
include 'classes/LikeDislike.php'; // Include the Article class

$db = (new Database())->connect();
$likeDislike = new LikeDislike($db);

// Instantiate the Article class
$article = new Article($db);

// Fetch all articles
$articles = $article->listAll();

// Check if there are any articles
if ($articles['status'] === 'success') {
    $articlesData = $articles['data'];
} else {
    $articlesData = [];
}

$likeDislike = new LikeDislike($db);

// Handle like and dislike form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  session_start();
  $userId = $_SESSION['user_id'] ?? 0; // Assuming the user ID is stored in the session
  if ($userId > 0) {
      $action = $_POST['action'] ?? '';
      $articleId = (int)$_POST['article_id'] ?? 0;

      if ($articleId > 0) {
          if ($action === 'like') {
              $likeDislike->addLike($userId, $articleId);
          } elseif ($action === 'dislike') {
              $likeDislike->addDislike($userId, $articleId);
          }
      }
  }
}
include_once "pages/header.php"
?>


    <div class="font-[sans-serif]">
    <div class="min-h-screen flex flex-col items-center justify-center p-6">
      <div class="w-full max-w-7xl">
        <h1 class="text-4xl font-bold text-center mb-8">All Articles</h1>

        <?php if (!empty($articlesData)): ?>
          <div class="space-y-8">
            <?php foreach ($articlesData as $article): ?>
              <div class="border border-gray-300 p-6 rounded-lg" id="article-<?= $article['id'] ?>">
                <h2 class="text-2xl font-semibold text-gray-800"><?= htmlspecialchars($article['title']) ?></h2>
                <p class="text-gray-600"><?= htmlspecialchars(substr($article['content'], 0, 150)) ?>...</p>
                <img src="../<?= htmlspecialchars($article['image']) ?>" alt="Article Image" class="w-full h-48 object-cover mt-4">
                
                <!-- Like and Dislike forms -->
                <div class="mt-4 flex space-x-4">
                    <form method="POST" action="">
                        <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
                        <input type="hidden" name="action" value="like">
                        <button type="submit" class="like-button text-green-600">Like</button>
                    </form>
                    <span class="text-green-600"><?= $likeDislike->getLikes($article['id']) ?></span>

                    <form method="POST" action="">
                        <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
                        <input type="hidden" name="action" value="dislike">
                        <button type="submit" class="dislike-button text-red-600">Dislike</button>
                    </form>
                    <span class="text-red-600"><?= $likeDislike->getDislikes($article['id']) ?></span>
                </div>

                <div class="mt-4">
                  <a href="article.php?id=<?= htmlspecialchars($article['id']) ?>" class="text-blue-600">Read more</a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <p class="text-lg text-gray-700">No articles found.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</body>
</html>