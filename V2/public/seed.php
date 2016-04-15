<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Itb\User;

define('DB_HOST','localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'assighnmentphp');

$matt = new User();
$matt->setUsername('Andrew');
$matt->setPassword('connolly');
$matt->setRole(User::ROLE_USER);

$joe = new User();
$joe->setUsername('joe');
$joe->setPassword('bloggs');
$joe->setRole(User::ROLE_USER);

$admin = new User();
$admin->setUsername('Ryan');
$admin->setPassword('admin');
$admin->setRole(User::ROLE_ADMIN);

User::insert($matt);
User::insert($joe);
User::insert($admin);

$users = User::getAll();

var_dump($users);