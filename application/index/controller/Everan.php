<?php

namespace app\index\controller;

use think\Controller;

class Everan extends Controller
{
    protected $studentModel;

    public function __construct()
    {
        $this->studentModel = \think\Loader::model('Student', 'model');
    }

    public function aa()
    {
        // echo '1111111111';

        for ($i = 1; $i <= 9; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                echo $j . 'x' . $i . '=' . $j * $i . ' ';
                if ($j == $i) {
                    echo '<br>';
                }
            }
        }

    }

    public function add()
    {
        $data = [
            'username'    => 'Amy',
            'password'    => '123456',
            'status'      => 1,
            'create_time' => date('Y-m-d H:i:s')
        ];

        $id = $this->studentModel->add($data);

        if ($id > 0) {
            echo '新增成功';
        } else {
            echo '新增失败';
        }
    }

    public function edit()
    {
        $data = [
            'username'    => 'Amy1111111111111111',
            'password'    => '123456789',
            'status'      => 2,
            'update_time' => date('Y-m-d H:i:s')
        ];
        $id = 6;
        $res = $this->studentModel->edit($id, $data);

        if ($res) {
            echo '修改成功';
        } else {
            echo '修改失败';
        }
    }

    public function del()
    {
        $id = 6;
        $res = $this->studentModel->del($id);

        if ($res) {
            echo '删除成功';
        } else {
            echo '删除失败';
        }
    }

    public function query()
    {
        $list = $this->studentModel->query();

        var_dump($list);
    }

}