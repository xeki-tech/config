<?php
namespace xeki_modules\config;

class config{
    private $vars = [];
    public function __construct($config){
        if($config['env_file']){
            $this->readFile();
        }
    }

    private function readFile(){
        $path = \xeki\core::$SYSTEM_PATH_BASE;
        $path_base = "$path/../";
        if(file_exists( "$path/.env")){
            $dotenv = \Dotenv\Dotenv::createImmutable($path);
            $dotenv->safeLoad();
        }
        else if (file_exists( "$path_base/.env")){
            $dotenv = \Dotenv\Dotenv::createImmutable($path_base);
            $dotenv->safeLoad();
        }
    }

    public function getVar($key){
        if(isset( $_ENV[$key])){
            return  $_ENV[$key];
        }
        return getenv($key);
    }
}