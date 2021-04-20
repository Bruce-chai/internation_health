<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Base extends Controller
{
    //测试地址
    protected $baseHost = 'devel2.joyhealth.net/homehealth/index.php/Internet_health/';
    //正式地址
//    protected $baseHost = 'devel2.joyhealth.net/homehealth/index.php/';
}