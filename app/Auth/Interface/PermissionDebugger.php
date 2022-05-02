<?php declare(strict_types=1);

namespace APP\Auth\Interface;

use APP\Utility\User;

interface PermissionDebugger {
    
    public function debug(Voter $voter, bool $vote, string $permission, User $user, $subject = null): void;
};