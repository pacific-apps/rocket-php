<?php

# Modules
namespace i;
use a\Cli;

class Mod {

    private $rep;
    private $modInfo;

    public function __construct(
        $rep
        )
    {
        $this->rep = $rep;
        $cli = new Cli($rep.'/module.json');
        try {
            if (!$cli->doExist()) {
                throw new \Exception(\r\Cmd::cout(ERROR_MODULE_DO_NOT_EXIST,1).PHP_EOL, 1);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        $this->modInfo = $cli->response();
    }

    public function get()
    {
        $mods = json_decode($this->modInfo,TRUE);
        foreach ($mods['dirs'] as $dir) {
            echo 'Created /dir '.$dir.'...'.PHP_EOL;
            mkdir($dir);
        }
        $cli = new Cli('');
        foreach ($mods['files'] as $path => $name) {
            $file = $cli->get($this->rep.$name);
            $local = fopen($path, 'w');
            fwrite($local,$file);
            fclose($local);
        }
    }

}
