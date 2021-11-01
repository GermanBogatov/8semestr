<?php

class indexController extends Controller {
    public function __construct( $prefix ) {
        parent::__construct( $prefix );
        $this ->view->setTitle('Админ панель') ;
        
    }
}

