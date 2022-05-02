<?php declare(strict_types=1);

namespace APP\Auth\Src;

use APP\Utility\User;
use APP\Auth\Interface\Voter;
use APP\Auth\Interface\PermissionDebugger;

final class ConsoleDebug implements PermissionDebugger {

    public function debug(Voter $voter, bool $vote, string $permission, User $user, $subject = null): void {

        $classname = get_class($voter);
        $vote = $vote ? 'Yes' : 'No';
        file_put_contents('php://stdout', "$classname  : $vote on $permission\n");
    }
};