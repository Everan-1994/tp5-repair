<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function p($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function generate_str($length = 8)
{
    // 密码字符集，可任意添加你需要的字符
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $str = '';
    for ($i = 0; $i < $length; $i++) {
    // 这里提供两种字符获取方式
    // 第一种是使用 substr 截取$chars中的任意一位字符；
    // 第二种是取字符数组 $chars 的任意元素
        $str .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
    return $str;
}
