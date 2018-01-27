<?php

namespace app\index\controller;

use think\Controller;

class Login extends Controller
{
    protected $studenModel;

    public function __construct()
    {
        $this->studenModel = \think\Loader::model('Student', 'model');
    }

    // 登陆
    public function login()
    {

        return view();
    }

    // 登陆操作
    public function login_do()
    {
        // 数组
        $data = [
            'username' => input('post.username'),
            'password' => input('post.password'),
            'captcha'  => input('post.vercode')
        ];
        // 接收数据 进行验证
        $rules = $this->validate($data,
            [
                'username'    => 'require|max:18|min:6',
                'password'    => 'require',
                'captcha|验证码' => 'require|captcha'
            ],
            [
                'username.require' => '用户名不能为空',
                'username.max'     => '用户名最长不能超过18位',
                'username.min'     => '用户名不能少于6位',
                'password.require' => '密码不能为空',
                'captcha.require'  => '验证码不能为空'
            ]
        );
        if (true !== $rules) {
            // 验证失败 输出错误信息
            $this->error($rules);
        }

        $result = $this->studenModel->login_do(input('post.username'), input('post.password'));

        if ($result) {
            // 存储用户名和用户id
            session('username', $result['username']);
            session('id', $result['id']);
            $this->success('登陆成功',url('index/index'));
        } else {
            $this->error('登陆失败');
        }

    }

    // 注册
    public function register()
    {
        return view();
    }

    // 注册操作
    public function reg_do()
    {
        // 数组
        $data = [
            'username' => input('post.username'),
            'password' => input('post.password')
        ];
        // 接收数据 进行验证
        $rules = $this->validate($data,
            [
                'username'    => 'require|max:18|min:6',
                'password'    => 'require'
            ],
            [
                'username.require' => '用户名不能为空',
                'username.max'     => '用户名最长不能超过18位',
                'username.min'     => '用户名不能少于6位',
                'password.require' => '密码不能为空'
            ]
        );
        if (true !== $rules) {
            // 验证失败 输出错误信息
            $this->error($rules);
        }

        $result = $this->studenModel->register(input('post.username'), input('post.password'));

        if ($result) {
            $this->success('注册成功', url('login'));
        } else {
            $this->error('注册失败');
        }
    }
    
    // 退出
    public function logout()
    {
        session(null);
        $this->success('退出成功', url('login'));
    }
}