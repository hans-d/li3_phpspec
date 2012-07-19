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

    /**
     * Run examples that contain
     */
    public $example = null;

    public function run($path) {
        foreach (array('formatter', 'example') as $field) {
            if ($this->$field === true) {
                $this->$field = false;
            };
        }
        $args = array(
            $path,
            $this->backtrace ? '-b' : '',
        );
        foreach (array('formatter' => '-f', 'example' => '-e') as $field => $option) {
            $args[] = $this->$field ? $option : '';
            $args[] = $this->$field ?: '';
        }
        $args = array_filter($args);
        $phpspec = new \PHPSpec\PHPSpec($args);
        $phpspec->execute();
    }
}