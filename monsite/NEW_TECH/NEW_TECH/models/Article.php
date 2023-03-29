<?php
include "../app/Model.php";
class Article extends Model
{
    public function __construct()
    {
        $this->table = 'posts';
        $this->getConnection();
    }

    public function findBySlug(string $slug)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE slug = :slug";
        echo $sql;
        $querry = $this->_connection->prepare($sql);
        $querry->execute([':slug' => $slug]);
        return $querry->fetch();
    }
}

//Test2

/*$m = new Article();
var_dump($m->findBySlug('premier-article'));
*/
?>