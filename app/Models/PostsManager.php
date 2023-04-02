<?php 

namespace App\Models;

use PDO;
/**
 * Encapsulates de Posts manager and returns or gets
 * posts informations from database
 */
class PostsManager extends Model
{
    /**
     * adds post in database with data inputs
     * @param array $newPost data new post from inputs
     */
    public function addPost(array $newPost)
    {
        $sql = 'INSERT INTO posts ( id_category, title, chapo, excerpt, content) VALUES (:id_category, :title, :chapo, :excerpt, :content)';
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute([
                'id_category' => $newPost["category"],
                'title' => $newPost["title"],
                'chapo' => $newPost["chapo"],
                'excerpt' => $this->getExcerpt($newPost["content"]),
                'content' => $newPost["content"],
        ]);
        $stmt->closeCursor();
    }
    /**
     * returns Post from database with its id
     * @param int $id Id of post
     */
    public function getPost(int $id)
    {
        $sql = 'SELECT P.*, C.name 
        FROM posts P, categories C
        WHERE P.id ='.$id;
        $stmt= $this->getPdo()->prepare($sql);
        $stmt->execute();
        $datas = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }
    /**
     * returns number of all Posts
     */
    public function getNbrOfPosts()
    {
        $sql = 'SELECT COUNT(id) as cpt FROM posts';
        $stmt = $this->getPDO()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        $stmt->closeCursor();
        $nbrOfPosts = $result['cpt'];
        return $nbrOfPosts;
    }
    /**
     * returns all posts informations
     */
    public function getPostsList(): array
    {
        $sql = 'SELECT P.*, C.name 
        FROM posts P, categories C
        WHERE P.id_category = C.id
        ORDER BY created_at DESC';
        $stmt = $this->getPdo()->query($sql);
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }
    /**
     * deletes a post from its id
     * @param int $id Id of the post
     */
    public function deletePost(int $id)
    {
        $sql = 'DELETE FROM posts WHERE id = ?';
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute([$id]);
        $stmt->closeCursor();;
    }
    /**
     * edits a post from data inputs and its id
     * @param int $id Id of the post
     * @param array $updatePost the nes post datas
     */
    public function editPost(int $id, array $updatePost)
    {
        $sql = "UPDATE posts 
        SET title=?, chapo=?, excerpt=?, content=?, update_at=?
        WHERE id=?";
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute([$updatePost["title"], $updatePost["chapo"], $this->getExcerpt($updatePost["content"]), $updatePost["content"], date("Y-m-d H:i:s"), $id]);
        $stmt->closeCursor();
    }
    /**
     * get Posts list limited by a nulber in pages
     * @param int $start start of the post list
     * @param int $nbrOfElementbyPage number of elements by page
     */
    public function getPaginationPostsList(int $start,int $nbrOfElementbyPage)
    {
        $sql = "SELECT P.*, C.name 
        FROM posts P, categories C
        WHERE P.id_category = C.id
        ORDER BY created_at DESC
        LIMIT $start, $nbrOfElementbyPage";
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute();
        $datas = $stmt->fetchAll();
        $stmt->closeCursor();
        return $datas;
    }
    /**
     * Returns a part of a post
     * @param string $postContent content of a post
     */
    public function getExcerpt(string $postContent)
    {
       return substr($postContent, 0, 170) . '...';
    }
    
}