<?php declare(strict_types=1);

namespace APP\Configuration;

class ReadedEnv {

    public array $get_env = [];

    public function __construct() {

        $file = file_get_contents(ROOT."/Configuration/.env");

        if(!$this->Parse($file)) {
           file_put_contents("php://stdout","Error durring the read configuration.\n");
           return;
        }
    }


    private function Parse(string $info) : bool {

        if(preg_match_all("/([a-zA-Z0-9]+)=\"([a-zA-Z0-9]+)\"/",$info,$match)) {
            
            foreach($match as $k=>$v) {
                $this->get_env[$k] = $v;
            }

            return true;
        }

        return false;

    }
};