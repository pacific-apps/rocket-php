<?php

namespace a;
use a\Cli;

class Cli {

    private $ept;
    private $res;
    private $code;

    public function __construct(
        string $ept
        )
    {
        $this->ept = $ept;
    }

    public function get(
        string $ept = null
        )
    {
        $rep = $ept??$this->ept;
        echo \r\Cmd::cout('Pulling in '.$rep.'...'.PHP_EOL,7);
        $cli = curl_init(ROCKET_HOST.$rep);
        curl_setopt($cli, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cli, CURLOPT_HEADER, 0);
        curl_setopt($cli, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
        $this->res = curl_exec($cli);
        $this->code = curl_getinfo($cli, CURLINFO_HTTP_CODE);
        return $this->response();
    }

    public function response()
    {
        return $this->res;
    }

    public function doExist()
    {
        $this->get();
        if ($this->code===404) {
            return false;
        }
        return true;
    }

}
