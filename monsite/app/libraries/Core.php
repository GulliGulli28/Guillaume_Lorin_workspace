<?php
    
    class Core{
        protected $currentController ='pages';
        protected $currentMethod = 'index';
        protected $params=[];

        public function __construct()
        {
            $url=$this->getUrl();
            if (file_exists(APPROOT."/controller/".ucwords($url[0]).".php")) {
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }

            $this->currentController = new $this->currentController;
            if (isset($url[1])) {
                if (method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }
            }
            $this->params = $url ? array_values($url) : [];
        }

        public function getUrl(){
            if (isset($_GET['url'])){
                $url = rtrim($_GET['url'], "/");
                $url = explode("/", $url);
                return $url;
            }
        }
    }

    $m = new Core();
?>