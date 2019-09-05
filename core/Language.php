<?php
class Language {

    private $l;
    private $ini;

    public function __construct() {
        global $config;
        $this->l = $config['default_lang'];

        if(!empty($_SESSION['lang']) && file_exists('languages/'.$_SESSION['lang'].'.ini')) {
            $this->l = $_SESSION['lang'];
        }

        $this->ini = parse_ini_file('languages/'.$this->l.'.ini'); //Carrega um arquivo ini e já transforma em array
    }

    public function get($word, $return = false) {
        $text = $word;

        if(isset($this->ini[$word])) {
            $text = $this->ini[$word];
        }


        if ($return) {
            return $text;
        } else {
            echo $text;
        }


    }

}