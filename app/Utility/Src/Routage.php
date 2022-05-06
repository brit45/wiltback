<?php declare(strict_types=1);

namespace APP\Utility\Src;

use APP\Middleware\Permission_Access;
use APP\Utility\Interface\Routage as InterfaceRoutage;
use APP\Utility\User;

class Routage implements InterfaceRoutage {

    private array $list;

    public function add(string $route, $controller, $action, ?array $option) {

        $this->list[] = [
            'pathern' => $route,
            'controller' => get_class($controller),
            'action' => $action,
            'options' => $option
        ];
        

    }

    public function route(string $route, User $user) {


        foreach($this->list as $k) {
            if(preg_match($k['pathern'], $route,$match)) {

                if(!empty($k['options'])) {
                
                    foreach($k['options']['permissions'] as $permission) {
                
                        $p = get_class($permission);
                        
                        $voter = new Permission_Access();
                       
                        if($voter->can($user,$p::$k['options']['access'], $p) == true) {
                           
                            return true;
                        }
                        else {
                           
                            return false;
                        }
                    }
                }
            }
        }



    }
};