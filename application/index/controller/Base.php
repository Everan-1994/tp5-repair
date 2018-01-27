<?php

namespace app\index\controller;

use think\Controller;

class Base extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $username = session('username');
        $id = session('id');

        if (!$username && !$id) {
            $this->error('请先登陆！', url('login/login'));
        }
    }
}