<?php

namespace App\core;

class View {

        public function __construct( string  $view, array $data=null)
        {
           require_once("../views/$view.php");
        }
}


//src/views/$view.php