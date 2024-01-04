<?php

namespace WixCore\Auth;

use WixCore\Helper\Cookie;

class Auth implements AuthInterface
{
    protected $authorized;
    protected $user;

    public function authorized()
    {
        return $this->authorized;
    }

    public function user()
    {
        return $this->user;
    }

    public function authorize($user)
    {
        Cookie::set('auth.authorized', true);
        Cookie::set('auth.user', $user);
        $this->authorized   =  true;
        $this->user         =  $user;
    }

    public function unAuthorize($user)
    {
        Cookie::delete('auth.authorized');
        Cookie::delete('auth.user');
        $this->authorized   =  false;
        $this->user         =  null;
    }

    public static function salt()
    {
        return (string) rand(1000000, 9999999);
    }

    public static function encryptPassword($password, $dalt='')
    {
        return hash('sha256, $password . $salt');
    }
}