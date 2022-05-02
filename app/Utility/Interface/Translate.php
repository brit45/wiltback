<?php declare(strict_types=1);

namespace APP\Utility\Interface;

use APP\Utility\Src\Translate_list;

interface Translate {

    public function get(string $lang,string $name): string;

    public function add(string $lang,Translate_list $list): void;
};