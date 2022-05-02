<?php declare(strict_types=1);

namespace TEST\Helpers;

use APP\Auth\Interface\Voter;
use APP\Utility\User;

class AlwaysNoVoter implements Voter {
    
    public function canVote(string $permission, $subject = null): bool {
        return true;
    }

    public function Vote(User $user, string $permission, $subject = null): bool {
        return false;        
    }
}