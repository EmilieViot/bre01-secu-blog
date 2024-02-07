<?php 

class Comment {
    private ?int $id = null;
    private User $user;
    private int $id_user;
    private Post $post;
    private int $id_post;

    
    public function __construct(private string $content) {
    }
    
    public function getContent(): string {
        return $this->content;
    }
    public function setContent(string $content): void {
        $this->content = $content;
    }
}
    