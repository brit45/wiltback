<?php declare(strict_types=1);

namespace TEST\Helpers;

use APP\Auth\Interface\Voter;
use APP\Utility\User;
use RuntimeException;

class AuthorVoter implements Voter {


    const EDIT   = 'edit_post';
    const DELETE = 'delete_post';
    const ADD    = 'add_post';

    public function canVote(string $permission, $subject = null): bool {

        return $permission === self::EDIT && $subject instanceOf TestPosts;
        
    }

    public function Vote(User $user, string $permission, $subject = null): bool {
        if(!$subject instanceof TestPosts) {
            throw new RuntimeException("Le sujet n'est pas valide. Instance attendue : ".TestPosts::class);
        }

        return $subject->get_Author() === $user;
    }

};