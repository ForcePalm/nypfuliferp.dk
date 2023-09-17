<?php
$baseDir = dirname(dirname(__FILE__));

return [
    'plugins' => [
        'AdminTheme' => $baseDir . '/plugins/AdminTheme/',
        'Authentication' => $baseDir . '/vendor/cakephp/authentication/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'Cake/TwigView' => $baseDir . '/vendor/cakephp/twig-view/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'PfuTheme' => $baseDir . '/plugins/PfuTheme/',
    ],
];
