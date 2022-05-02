<?php declare(strict_types=1);

namespace APP\Translate;

use APP\Utility\Src\Translate as SrcTranslate;
use TEST\Helpers\fr_Translate;

class Translate extends SrcTranslate {

    public function __construct() {

        $this->add('fr', new fr_Translate());
    }
}