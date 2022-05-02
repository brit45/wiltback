<?php declare(strict_types=1);

namespace TEST\Helpers;

use APP\Utility\Src\Translate_list;

class fr_Translate extends Translate_list {

    public function __construct() {
        
        $this->add('home', 'accueil');
        $this->add('back', 'retour');
        $this->add('next', 'suivant');
    }
}