<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'db' => [
        'driver' => 'Sqlsrv',
        'servername' => '192.168.0.1',
        'database' => 'SISH',
        'uid' => 'admim',
        'pwd' => 'J@mer2019'
    ],
];
