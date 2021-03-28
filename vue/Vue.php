<?php

class Vue {
        private $file;

        private $titre;

        public function __construct($filename)
        {
           $this->file="vue/vue_".$filename.".php";
        }

        public function load($data)
        {
            $contenu=$this->genereContenu($this->file,$data);
            $vue=$this->genereContenu("vue/template.php",array('contenu'=>$contenu));
            echo $vue;
        }

        public function genereContenu($file,$data)
        {
            if(file_exists($file))
            {

                //extrait les données du tableau
                extract($data);
                ob_start();

                require $file;

                return ob_get_clean();

            }
            else console_log("Fichier $file pas trouvé !");

        }

}

?>
