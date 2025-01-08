<?php
class Article {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Upload image
    private function uploadImage(array $file): string {
        $fileName = basename($file["name"]);
        $targetFilePath = "uploads/images/" . uniqid() . "_" . $fileName;

        // Move the uploaded file
        if (!move_uploaded_file($file["tmp_name"], "../".$targetFilePath)) {
            throw new Exception("Failed to upload image.");
        }

        return $targetFilePath;
    }

    // Create a new article
    public function create(string $title, string $content, array $imageFile, int $userId, int $categoryId): array {
        try {
            $imagePath = $this->uploadImage($imageFile);

            $stmt = $this->db->prepare("INSERT INTO articles (title, content, image, user_id, category_id, created_at) VALUES (:title, :content, :image, :user_id, :category_id, NOW())");
            $stmt->execute([
                'title' => $title,
                'content' => $content,
                'image' => $imagePath,
                'user_id' => $userId,
                'category_id' => $categoryId,
            ]);

            return ['status' => 'success', 'message' => 'Article created successfully'];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Failed to create article: ' . $e->getMessage()];
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    // Read an article by its ID
    public function read(int $id): array {
        $stmt = $this->db->prepare("SELECT * FROM articles WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($article) {
            return ['status' => 'success', 'data' => $article];
        } else {
            return ['status' => 'error', 'message' => 'Article not found'];
        }
    }

    // Update an article by its ID
    public function update(int $id, string $title, string $content, array $imageFile = null, int $categoryId): array {
        try {
            $imagePath = null;

            if ($imageFile && $imageFile['tmp_name']) {
                $imagePath = $this->uploadImage($imageFile);
            }

            $query = "UPDATE articles SET title = :title, content = :content, category_id = :category_id, updated_at = NOW()";
            $params = [
                'title' => $title,
                'content' => $content,
                'category_id' => $categoryId,
                'id' => $id,
            ];

            if ($imagePath) {
                $query .= ", image = :image";
                $params['image'] = $imagePath;
            }

            $query .= " WHERE id = :id";

            $stmt = $this->db->prepare($query);
            $stmt->execute($params);

            return ['status' => 'success', 'message' => 'Article updated successfully'];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Failed to update article: ' . $e->getMessage()];
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    // Delete an article by its ID
    public function delete(int $id): array {
        try {
            $stmt = $this->db->prepare("DELETE FROM articles WHERE id = :id");
            $stmt->execute(['id' => $id]);

            return ['status' => 'success', 'message' => 'Article deleted successfully'];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Failed to delete article: ' . $e->getMessage()];
        }
    }

    // List all articles
    public function listAll(): array {
        $stmt = $this->db->query("SELECT * FROM articles ORDER BY created_at DESC");
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return ['status' => 'success', 'data' => $articles];
    }
}