<?php declare(strict_types=1);

namespace APP\Utility\Interface;

use APP\Utility\User;

interface Routage {

    public function add(string $route, $controller, $action, ?array $option);
    public function route(string $route, User $user);
    
};