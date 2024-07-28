<?php

namespace App\Services;

interface UserService
{
    function login(string $username,string $password);

    function getUsers();

    function storeUser($request);

    function getUserById($id);

    function updateUserById($request, $id);

    function deleteUser($id);

}