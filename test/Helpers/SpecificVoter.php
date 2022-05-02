<?php declare(strict_types=1);

namespace TEST\Helpers;

use APP\Auth\Interface\Voter;
use APP\Utility\User;

class SpecificVoter implements Voter {
    
    public function canVote(string $permission, $subject = null): bool {
        return $permission === 'specific';
    }

    public function Vote(User $user, string $permission, $subject = null): bool {
        return true;        
    }
}