<?php

namespace i;
use i\Mod;

class Cmd {

    public function __construct()
    {
        echo \r\Cmd::cout('Initializing Rocket PHP Version 1.0.0'.PHP_EOL,7);
    }

    public function run()
    {
        echo \r\Cmd::cout('Checking core/modules'.PHP_EOL,7);
        $rep = CORE;
        $mod = new Mod($rep);
        $minfo = $mod->get();

        /*
        To Be Added:
        echo PHP_EOL.PHP_EOL.\r\Cmd::cout('Welcome! Create your rocket.json'.PHP_EOL,3);
        echo 'package: (rocketphp/rocket)';
        $package = fgets(STDIN);
        */

        
    }

}
