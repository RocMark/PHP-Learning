<?php

class ClassDemo {

    protected $key;
    protected $secret;

    public function __construct(array $options) {
        $this->key = $options['key'];
        $this->secret = $options['secret'];
    }

    public function getKey(){
        return $this->key;
    }

    protected static function hash(){
        return hash("sha512", time());
    }

    public static function getSecret(){
        return self::hash();
    }
}

