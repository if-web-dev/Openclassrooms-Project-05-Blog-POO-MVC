<?php

namespace App\Models;

use PDO;
/**
 * Encapsulates Comment Manager and manage comment datas
 */
class CommentsManager extends Model
{
    /**
     * adds Comment to the database
     * @param string $content content of the comment
     * @param int $editedBy id of the user
     * @param int $idPost id of the current post
     */
    public function addComment(string $content, int $editedBy, int $idPost)
    {
        $sql = 'INSERT INTO comments (content, edited_by, id_post) VALUES (:content, :edited_by, :id_post);';
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->bindValue("content", $content);
        $stmt->bindValue("edited_by", $editedBy);
        $stmt->bindValue("id_post", $idPost);
        $stmt->execute();
    }
    /**
     * deletes Comment
     * @param int $idComment id of the comment
     */
    public function deleteComment(int $idComment)
    {
        $sql = 'DELETE FROM comments WHERE id = ?';
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute([$idComment]);
        $stmt->closeCursor();
    }
    /**
     * gets pending comments list
     */
    public function getPendingCommentsList()
    {
        $sql = "SELECT C.*, U.email, P.title
        FROM comments C, users U, posts P
        WHERE C.is_accepted = 0
        AND U.id = C.edited_by
        AND P.id = C.id_post";
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }
    /**
     * gets comments allowed to the current post
     * @param int $idPost id of the current post
     */
    public function getPostsCommentsAllowed(int $idPost)
    {
        $sql = "SELECT C.*, U.name, U.firstname
        FROM comments C, users U
        WHERE C.id_post = $idPost
        AND C.edited_by = U.id
        AND C.is_accepted = 1";
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();/*a verif si c pertient*/
        return $datas;
    }
    /**
     * validates the comment 
     * @param int id of the comment
     */
    public function validateComment(int $idComment)
    {
        $sql = "UPDATE comments 
        SET is_accepted=1
        WHERE id=". $idComment;
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute();
        $stmt->closeCursor();
    }
}
