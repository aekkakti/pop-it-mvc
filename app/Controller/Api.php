<?php

namespace Controller;

use Model\Post;
use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\View;

class Api
{
    public function index(Request $request): void
    {
        $csrfToken = $request->get('csrf_token');

        (new View())->toJSON($csrfToken);

    }

    public function echo(Request $request): void
    {
        (new View())->toJSON($request->all());
    }
}