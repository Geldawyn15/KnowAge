<?php
/**
 * This file hold all routes definitions.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

$routes = [
    'Front' => [ // Controller
        ['index', '/', 'GET'], // action, url, method
        ['landingFormateur', '/landingFormateur', 'GET'], // action, url, method
        ['search', '/search', ['GET', 'POST']], // action, url, method
    ],
];
