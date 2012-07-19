<?php

namespace li3_phpspec\extensions\command;

class Phpspec extends \lithium\console\Command {

    /**
     * Enable displaying the backtrace on errors
     */
    public $backtrace = false;
    
    /**
     * Set the format mode
     */
    public $formatter = null;

    public function run($path) {
        if ($this->formatter === true) {
            $this->formatter = false;
        };
        $args = array(
            $path,
            $this->backtrace ? '-b' : '',
            $this->formatter ? '-f' : '',
            $this->formatter ?: '',
        );
        array_filter($args);
        $phpspec = new \PHPSpec\PHPSpec($args);
        $phpspec->execute();
    }
}