<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class PostManager extends AbstractManager
{
    public function construct()
    {
        parent::__construct();
    }
    
    
    public function findLatest(): array {
        $query = $this->db->prepare("
            SELECT 
                posts.*,
                users.id AS users_id
            FROM 
                posts 
            JOIN  
                users 
                    ON 
                        posts.author = users.id
            ORDER BY created_at DESC LIMIT 4
        ");
        
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $posts = [];

        foreach ($result as $item) {
            $newUser = new User($user["username"], $user["email"], $user["password"], $user["role"]);
            $newUser->setId($user["id"]);
            $newPost = new Post($post['title'], $post['excerpt'], $post['content'], $newUser);
            $newPost-> setId($post['id']);
            
            $posts_array[] = $newPost;
        }
    }
    
    
    public function findOne(int $id): ?Post {
        $query = $this->db->prepare("SELECT * FROM posts WHERE id = :id");
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);
        $post = $query->fetch(PDO::FETCH_ASSOC);
        
        $newUser = new User()
        }
        return null;
    }
}