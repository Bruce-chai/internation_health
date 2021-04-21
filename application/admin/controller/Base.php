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

    protected $host = '127.0.0.1';
    protected $port = 5432;
    protected $dbName = 'posdb';
    protected $user = 'us_pos';
    protected $pass = 'bszhh*6551';
    protected $dbconn = '';
    public function __construct()
    {
        parent::__construct();
        $this->pgConnect();
        if ($this->dbconn === false) {
            $msg = "Failed to close connection to " . pg_host($this->dbconn) . ": " . pg_last_error($this->dbconn);
            return ['code' => 400, 'msg' => $msg];
        }
    }

    public function pgConnect()
    {
        $this->dbconn = pg_connect("host=$this->host port=$this->port dbname=$this->dbName user=$this->user password=$this->pass");
    }
}