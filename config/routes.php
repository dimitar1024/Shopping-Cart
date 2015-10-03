<?php

const TO = 'goesTo';
const REQUESTS = 'REQUESTs';
const REQUEST = 'requestREQUEST';
const NS = 'namespace';
const CONTROLLERS = 'controllers';

// Default
$cnf['*'][NS] = 'Controllers';

// Home
$cnf['*'][CONTROLLERS]['home'][TO] = 'index';
$cnf['*'][CONTROLLERS]['home'][REQUESTS]['index'] = 'index';
$cnf['*'][CONTROLLERS]['home'][REQUEST]['index'] = 'get';

// Login
$cnf['*'][CONTROLLERS]['user'][TO] = 'user';
$cnf['*'][CONTROLLERS]['user'][REQUESTS]['login'] = 'login';
$cnf['*'][CONTROLLERS]['user'][REQUEST]['login'] = 'post';
// Register
$cnf['*'][CONTROLLERS]['user'][REQUESTS]['register'] = 'register';
$cnf['*'][CONTROLLERS]['user'][REQUEST]['register'] = 'post';
// Logout
$cnf['*'][CONTROLLERS]['user'][REQUESTS]['logout'] = 'logout';

// Categories
$cnf['*'][CONTROLLERS]['categories'][TO] = 'category';
$cnf['*'][CONTROLLERS]['categories'][REQUESTS]['index'] = 'index';

// Cart
$cnf['*'][CONTROLLERS]['cart'][TO] = 'cart';
$cnf['*'][CONTROLLERS]['cart'][REQUESTS]['index'] = 'index';

return $cnf;