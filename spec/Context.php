<?php

namespace li3_phpspec\spec;

use lithium\data\Connections;

class Context extends \PHPSpec\Context {

    protected function databaseConnectionsToMock() {
        $config = Connections::config();
        foreach (array_keys($config) as $name) {
            switch ($config[$name]['type']) {
                case 'database':
                    $config[$name] = array('type' => 'Mock');
                    break;
            }
        }
        Connections::config($config);

    }

}