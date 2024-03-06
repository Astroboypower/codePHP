<?php

namespace MonNamespace;

class classParent {
    public static function square($number) {
        return $number * $number;
    }

    public $prop = 0;

    public function increment() {
        $this->prop++;
    }
}
