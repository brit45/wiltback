<?php declare(strict_types=1);

namespace APP\Auth\Rules;

use APP\Auth\Interface\Voter;
use APP\Utility\User;

class Admin_Permission implements Voter {

    public function canVote(string $permission, $subject = null): bool {
        
        if($permission == 'admin' && $subject == "global_access") {
            return true;
        }
        else {
            return false;
        }
    }

    public function Vote(User $user, string $permission, $subject = null): bool {
        
        if($permission == 'admin' && $subject == "global_access") {
            return true;
        }
        else {
            return false;
        }
    }
}
