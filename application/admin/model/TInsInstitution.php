<?php

namespace app\admin\model;

use think\Model;

class TInsInstitution extends Model
{
    private $jgdm = '49AMU40A0X1UB4209Y';  //机构标识
    private $zzjgdm = '';  //实体医院统一社会信用代码
    private $jgmc = '';  //机构名称（互联网医院名称）
    private $xzqhdm = '';  //行政区划代码
    private $zzjgdm = '';  //
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    private $zzjgdm = '';
    public function creat($data)
    {
        try {
            $res = $this->save($data);
            if (!$res) {
                throw new Exception("添加失败");       
            }

            return true;
        } catch (Exception $e) {
            //throw $th;
            Log::record($e->get_message());
            $this->error = $e->get_message();

            return false;
        }
    }
}
