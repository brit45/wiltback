<?php declare(strict_types=1);

namespace APP\Utility\Src;

class Translate_list {

    private array $list = [];

    public function get(string $name) : string {
        return $this->list[$name];
    }

    public function add(string $name, string $text) {
        $this->list[$name] = $text;
    }
}