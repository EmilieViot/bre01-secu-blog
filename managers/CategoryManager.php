<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class CategoryManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function findAll(): array
    {
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);

        $categories_array = [];

        foreach ($categories as $category) {
            $newCategory = new Category($category["name"]);
            $newCategory->setId($category["id"]);
            $categories_array[] = $newCategory;
        }

        return $categories_array;
    }
    
    public function findOne(int $id): ?Category
    {
        $query = $this->db->prepare('SELECT * FROM categories WHERE id = :id');
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);
        $category = $query->fetch(PDO::FETCH_ASSOC);


        if (isset($category)) {
            $newCategory = new Category($category["name"]);
            $newCategory->setId($category["id"]);

            return $newCategory;
        }
        return null;
    }
}