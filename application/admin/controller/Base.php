<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Log;

class Base extends Controller
{
    //测试地址
   protected $baseHost = 'devel2.joyhealth.net/homehealth/index.php/Internet_health/';
    //正式地址
    //  protected $baseHost = 'https://www.joyhealth.net/homehealth/index.php/Internet_health/';

    protected $community = 1;
    protected $error = '';
    protected $host = '127.0.0.1';
    protected $port = 5432;
    protected $dbName = 'posdb';
    protected $user = 'us_pos';
    protected $pass = 'bhhsz*6551';
    protected $dbconn = '';
    public function __construct()
    {
        $this->pgConnect();
        if ($this->dbconn === false) {
            $msg = "Failed to close connection to " . pg_host($this->dbconn) . ": " . pg_last_error($this->dbconn);
            Log::record($msg);
            Log::record($this->error);
            $this->response(400, $msg . $this->error);
        }
    }

    public function pgConnect()
    {
        try {
            //code...
            $this->dbconn = pg_connect("host=$this->host port=$this->port dbname=$this->dbName user=$this->user password=$this->pass");

        } catch (\Throwable $th) {
            $this->error = $th->getMessage();
        }
    }
    protected function response($code, $msg = '', $data = [])
    {
        echo json_encode([
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ]);exit();
    }
    protected function addAll($table, $data)
    {
        $sql = "insert into $table ";
        $name = '';
        foreach ($data[0] as $k => $v) {
            $name .= $k . ',';
        }
        $name = '(' . rtrim($name, ',') . ')';
        $value = '';
        
        foreach ($data as $k => $v) {
            $tmp = '';
            foreach($v as $key => $val){
                $tmp .= "'$val',";
            }
           
            $tmp = rtrim($tmp, ',');
          
            $value .= '(' . $tmp . '),';
        }
        $value = rtrim($value, ',');
        $sql .= $name . ' values ' . $value . ';';
        $res = pg_query($sql);
        Log::record('新增记录数： ' . pg_affected_rows($res));
        if ($res === false) {
            $this->error = pg_last_error();
            Log::record($this->error);
            return false;
        }

        return true;
    }
    protected function add($table, $data)
    {
        $sql = "insert into $table ";
        $field = '';
        $val = '';
        while(list($name, $value) = each($data)) {
            $field .= $name . ',';
            $val .= "'$value',";
        }
        $field = '(' . rtrim($field, ',') . ')';
        $val = '(' . rtrim($val, ',') . ')';
        $sql .= $field . ' values ' . $val . ';';
        $res = pg_query($sql);
        Log::record('新增记录数： ' . pg_affected_rows($res));
        if ($res === false) {
            $this->error = pg_last_error();
            Log::record($this->error);
            return false;
        }

        return true;
    }
}