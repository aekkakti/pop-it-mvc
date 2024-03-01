<?php

namespace Controller;

use Model\Post;
use Model\User;
use Src\Request;
use Src\View;

class Api
{
    public function index(): void
    {
        $user = User::all()->toArray();

        (new View())->toJSON($user);

    }

    public function echo(Request $request): void
    {
        (new View())->toJSON($request->all());
    }
}