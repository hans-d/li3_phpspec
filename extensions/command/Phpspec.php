<?php

namespace li3_phpspec\extensions\command;

class Phpspec extends \lithium\console\Command {

    public function run($path) {
        $args = (array)$path;
        $phpspec = new \PHPSpec\PHPSpec($args);
        $phpspec->execute();
    }
}