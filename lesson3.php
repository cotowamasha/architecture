<?php

use App\entities\Good;
use App\repositories\Repository;

/**
 * Ниже представлен спагетти-код: 3 return'а, 4 redirect'а
 * В данном случае надо разделить логику на несколько частей: обращение к DB и создание sql-запроса - в одну часть, работа с session - в другую
 */

function loginAction()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        redirect('?p=auth', 'Что-то пошло не так');
        return;
    }

    if (empty($_POST['login']) || empty($_POST['password'])) {
        redirect('?p=auth', 'Не все данные переданы');
        return;
    }

    $login = clearStr($_POST['login']);
    $password = $_POST['password'];

    $sql = "SELECT id, login, password FROM users WHERE login = '$login'";
    $result = mysqli_query(getConnect(), $sql);
    $row = mysqli_fetch_assoc($result);
    if (empty($row)) {
        redirect('?p=auth', 'Не верный логин или пароль');
        return;
    }

    if (password_verify($password, $row['password'])) {
        $_SESSION[AUTH] = true;
    }

    redirect('?p=auth', 'Добро пожаловать!');
}

/**
 * не уверенна, но вроде это можно назвать полтергейстом, тупо хранит название таблицы из DB
 * таких классов несколько
 * решение предлагается в методичке: либо довляем в этой класс еще функцилнальности, либо удалем и общаемся между классами, где этот посредник, напрямую
 */

class GoodRepository extends Repository
{
    protected function getTableName()
    {
        return 'goods';
    }

    protected function getEntityName()
    {
        return Good::class;
    }
}
