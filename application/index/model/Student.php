<?php

namespace app\index\model;

use think\Model;

class Student extends Model
{
    // 注册
    public function register($username, $password)
    {
        $data = [
            'username'    => $username,
            'password'    => md5($password),
            'status'      => 1,
            'create_time' => date('Y-m-d H:i:s')
        ];

        return $this->insertGetId($data);
    }

    // 登陆
    public function login_do($username, $password)
    {
        $map = [
            'username' => $username,
            'password' => md5($password)
        ];
        return $this->where($map)->find();
    }

    // 数据入库
    public function add($data)
    {
        return $this->insertGetId($data);
    }

    // 修改数据
    public function edit($id, $data)
    {
        return $this->where('id', $id)->update($data);
    }

    // 删除数据
    public function del($id)
    {
        return $this->where('id', $id)->delete();
    }

    // 查询
    public function query()
    {
        return $this->where('id', 5)->find(); // select 方法 查询全部
    }

}