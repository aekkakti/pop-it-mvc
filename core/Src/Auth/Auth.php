<?php

namespace Src\Auth;

use Src\Session;

class Auth
{
    private static IdentityInterface $user;

    public static function init(IdentityInterface $user): void
    {
        self::$user = $user;
        if (self::user()) {
            self::login(self::user());
        }
    }

    public static function login(IdentityInterface $user): void
    {
        self::$user = $user;
        Session::set('id', self::$user->getId());
    }

    public static function attempt(array $credentials): array
    {
        if ($user = self::$user->attemptIdentity($credentials)) {
            self::login($user);
            $authToken = self::generateAuthToken();
            return ['auth_token' => $authToken];
        }
        return [];
    }

    public static function user()
    {
        $id = Session::get('id') ?? 0;
        return self::$user->findIdentity($id);
    }

    public static function check(): bool
    {
        if (self::user()) {
            return true;
        }
        return false;
    }

    public static function logout(): bool
    {
        Session::clear('id');
        return true;
    }

    public static function generateCSRF(): string
    {
        $token = md5(time());
        Session::set('csrf_token', $token);
        return $token;
    }

    public static function generateAuthToken(): string
    {
        $token = uniqid();
        Session::set('auth_token', $token);
        return $token;
    }
}
