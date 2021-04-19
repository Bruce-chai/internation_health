<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\Model\TInsInstitution;

class Institution extends Controller
{
    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return array
     */
    public function save(TInsInstitution $insInstitution)
    {
        $res = $insInstitution->createData();
        if ($res === false) {
            return ['code' => 400, 'msg' => $insInstitution->getError()];
        }

        return ['code' => 200, 'msg' => '成功'];
    }
}
