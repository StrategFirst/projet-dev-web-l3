<?php 



class Vue {
        private $file;

        public function __construct($filename)
        {
           $this->file="vue/".$filename.".php";
        }

        public function genere()
        {
            if(file_exists($this->file))
            {
                ob_start();
                require $this->file;
                return ob_get_clean();
            }
            else echo "<h1>404 file: ".$this->file." not found</h1>";
            
        }
    
}