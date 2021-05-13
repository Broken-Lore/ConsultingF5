<?php

namespace App\core;

class View {

        public function __construct( string  $view, array $data=null)
        {
           require_once ("src/views/$view.php");
        }
}