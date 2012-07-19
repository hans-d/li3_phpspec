<?php

namespace li3_phpspec\spec;

use lithium\data\Connections;

class Context extends \PHPSpec\Context {

    protected function connectionsToMock($type = true) {
        $config = Connections::config();
        foreach (array_keys($config) as $name) {
            if ($type === true || $type == $config[$name]['type']) {
                $config[$name] = array('type' => 'Mock');
            }
        }
        Connections::config($config);
    }
}