<?php
/**
 * Created by PhpStorm.
 * User: zhongzhiliang
 * Date: 2018/5/13
 * Time: 下午4:09
 */

namespace App\Controller;


class IndexController
{
    public function index()
    {
        return json_encode([
            'name' => 'eric',
        ]);
    }

//    public function __invoke()
//    {
//        return 'index';
//    }
}