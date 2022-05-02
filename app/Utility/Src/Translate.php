<?php declare(strict_types=1);

namespace APP\Utility\Src;

use APP\Utility\Interface\Translate as InterfaceTranslate;

class Translate implements InterfaceTranslate {

    /**
     * @var Translate_list[]
     */
    public array $List = [];

    public function get(string $lang, string $name): string {
        
        return $this->List[$lang]->get($name);
    }


    public function add(string $lang, Translate_list $list): void {

        $this->List[$lang] = $list;
    }
}