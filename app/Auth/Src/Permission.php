<?php declare(strict_types=1);

namespace APP\Auth\Src;

use APP\Utility\User;
use APP\Auth\Interface\Voter;
use APP\Auth\Interface\PermissionDebugger;

class Permission {

    /**
     * @var Voter
     */
    private array $voters = [];
    private ?PermissionDebugger $debugger;


    public function __construct(?PermissionDebugger $debugger = null) {
        $this->debugger = $debugger;        
    }

    public function can (User $user, string $permission, $subject = null) : bool {

        foreach($this->voters as $voter) {

            $name = get_class($voter);

            

            if($voter->canVote($permission, $subject)) {

                $vote = $voter->Vote($user, $permission, $subject);
                
                if($this->debugger) {

                    $this->debugger->debug($voter, $vote, $permission, $user, $subject);
                }

                if($vote == true) {
                    return true;
                }
            }

            
        }
        return false;
    }

    public function addVoter (Voter $voter) {

        $this->voters[] = $voter;

        file_put_contents('php://stdout', "\n\tADD new Voter\n");
    }
};