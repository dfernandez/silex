<?php

namespace ElDelantal\Model;

use \MongoDB;

class Recipes
{
    /**
     * @var MongoDB
     */
    private $mongodb;

    public function __construct(MongoDB $mongodb)
    {
        $this->mongodb = $mongodb;
    }

    public function getLastRecipes($limit = 5)
    {

        return $this->mongodb->recipes->find()->limit($limit)->sort(['created_at' => -1]);
    }

    public function getMostPopular($limit = 5)
    {
        return $this->mongodb->recipes->find()->limit($limit)->sort(['popularity' => -1]);
    }

    public function getBySlug($slug_url)
    {
        return $this->mongodb->recipes->findOne(['slug_url' => $slug_url]);
    }
}
