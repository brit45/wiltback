<?php declare(strict_types=1);

namespace TEST\Helpers;

use APP\Utility\User;

class TestPosts {

    private User $user;

    public function __construct(User $user) {
        $this->user = $user;    
    }

    public function get_Author() : User {
        return $this->user;
    }

    
};