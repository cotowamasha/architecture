<?php

/**
 * task 1: FrontController - app/Kernel
 */

/**
 * task 2: Registry - app/framework/Registry: получение данных из конфигурационного файла и получение страницы по названию роута
 */

/**
 * task 3: перепишем UserController
 */

// в BaseController добавим методы authenticationAction, logoutAction из UserController и вместо UserController пропишем:

class AuthController extends \Framework\BaseController {
    public function action () {
        $this->auth();
    }
}

class LogoutController extends \Framework\BaseController {
    public function action () {
        $this->logout();
    }
}
