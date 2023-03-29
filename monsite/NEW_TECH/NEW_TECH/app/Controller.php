<?php
abstract class Controller
{
    public function loadModel(string $model)
    {
        require_once("/home/guillaume/Bureau/Web/NEW_TECH/". "models/" . $model . ".php");
        $this->$model = new $model();
    }

    public function render($vue, array $data = [])
    {
        extract($data);
        echo "<h1>***********</h1>";
        require_once(ROOT. "views/". strtolower(get_class($this)) . "/" . $vue . ".php");
    }
}

/*$m = new Controller();
$m->loadModel('Article');
$m->Article->getConnection();
var_dump($m->Article->findBySlug('premier-article'));
*/
?>