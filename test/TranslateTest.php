<?php declare(strict_types=1);

namespace TEST;

use APP\Utility\Src\Translate;
use PHPUnit\Framework\TestCase;
use TEST\Helpers\fr_Translate;

class TranslateTest extends TestCase {

    public function testtranslateValid() {

        $translate = new Translate();
        $translate->add('fr', new fr_Translate());

        $this->assertTrue(($translate->get('fr','next') == 'suivant'));
    }

    public function testtranslateInalid() {

        $translate = new Translate();
        $translate->add('fr',new fr_Translate());


        $this->assertFalse(($translate->get('fr','back') == 'back'));
    }

}