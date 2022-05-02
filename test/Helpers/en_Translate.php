<?php declare(strict_types=1);

namespace TEST\Helpers;

use APP\Utility\Src\Translate_list;

class en_Translate extends Translate_list {

    public function __construct() {
        
        $this->add('home', 'home');
        $this->add('back', 'back');
        $this->add('next', 'next');
    }
}