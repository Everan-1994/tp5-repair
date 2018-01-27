<?php

namespace app\index\controller;

class Home extends Base
{
    protected $orderModel;

    public function __construct()
    {
        parent::__construct();
        $this->orderModel = \think\Loader::model('Order', 'model');
    }

    // 我要报修
    public function index()
    {
        return view('index');
    }

    public function myRepair()
    {
        $list = $this->orderModel->getMyRepairList();
        return view('repair', ['list' => $list]);
    }

    // 提交工单
    public function submit_order()
    {
        // 数组
        $data = [
            'r_type'    => input('post.r_type'),
            'r_area'    => input('post.r_area'),
            'r_tel'     => input('post.r_tel'),
            'r_content' => input('post.r_content')
        ];
        // 接收数据 进行验证
        $rules = $this->validate($data,
            [
                'r_type'    => 'require',
                'r_area'    => 'require',
                'r_tel'     => 'require',
                'r_content' => 'require'
            ],
            [
                'r_type.require'    => '请选择报修类型',
                'r_area.require'    => '请填写报修地址',
                'r_tel.require'     => '请填写联系人方式',
                'r_content.require' => '请填写报修描述'
            ]
        );
        if (true !== $rules) {
            // 验证失败 输出错误信息
            $this->error($rules);
        }

        $result = $this->orderModel->add_order($data);

        if ($result) {
            $this->success('报修成功，请耐心等待维修员上门维修。');
        } else {
            $this->error('报修失败，请重试！');
        }
    }

}