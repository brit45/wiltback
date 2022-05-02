<?php declare(strict_types=1);

namespace APP\Translate;

use APP\Utility\Src\Translate_list;

class fr_translater extends Translate_list {

    public function __construct() {

        $this->add('home','accueil');
        $this->add('back', 'retour');
        $this->add('next', 'suivant');
        $this->add('last_name', 'prénom');
        $this->add('name', 'nom');
        $this->add('old', 'âge');
    }
}