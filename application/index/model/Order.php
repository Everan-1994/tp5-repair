<?php

namespace app\index\model;

use think\Db;
use think\Model;

class Order extends Model
{
    public function add_order($data)
    {
        $data['order_number'] = 'D' . generate_str() . date('YmdHis');
        $data['student_id'] = session('id');
        $data['create_time'] = date('Y-m-d H:i:s');
        $data['r_status'] = 1; // 1 表示待维修，2表示维修中，3表示已完成
        // p($data);die;
        return $this->insertGetId($data);

    }

    public function getMyRepairList()
    {
        return Db::table('order')->paginate(2);
    }
}