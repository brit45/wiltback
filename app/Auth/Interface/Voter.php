<?php declare(strict_types=1);

namespace APP\Auth\Interface;

use APP\Utility\User;

interface Voter {

    public function canVote (string $permission, $subject = null) : bool;

    public function Vote (User $user, string $permission, $subject = null) : bool;
};