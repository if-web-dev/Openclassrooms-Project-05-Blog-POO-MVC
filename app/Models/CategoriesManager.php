<?php

namespace App\Models;

use PDO;
/**
 * Encapsulates the Categories manager
 * Returns categories data from database
 */
class CategoriesManager extends Model
{
    /**
     * Returns all Categories informations from database
     */
    public function getAllCategories()
    {
        $sql = "SELECT * FROM categories";
        $req = $this->getPdo()->prepare($sql);
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }
    /**
     * Returns Posts by Categorie and pagination
     * @param int $id id of category
     * @param int $start id of category
     * @param int $nbrOfElementbyPage number of posts by page
     */
    public function getPostsbyCategory(int $id, int $start,int $nbrOfElementbyPage)
    {
        $sql = "SELECT P.*, C.name 
        FROM posts P, categories C
        WHERE P.id_category = C.id
        AND C.id = $id
        ORDER BY P.created_at DESC
        LIMIT $start, $nbrOfElementbyPage";
        $req = $this->getPdo()->prepare($sql);
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }
    /**
     * Returns number of posts by category
     * @param int $id Id of the category
     */
    public function getNbrOfPostsbyCategory(int $id)
    {
        $sql = 'SELECT COUNT(id) as cpt 
        FROM posts
        WHERE id_category =' . $id;
        $stmt = $this->getPDO()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        $stmt->closeCursor();
        $nbrOfPosts = $result['cpt'];
        return $nbrOfPosts;
    }

}