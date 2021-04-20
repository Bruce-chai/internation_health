<?php

namespace app\admin\controller;

use think\Controller;
use think\Log;
use think\Request;
use app\admin\Model\TInsInstitution;

class Institution extends Base
{
    /**
     * 机构资源信息
     *
     * @param  \think\Request  $request
     * @return array
     */
    public function save(TInsInstitution $insInstitution)
    {
        try {
            $url = $this->baseHost . 'Institution/institution';
            $data = create_curl($url);
            if ($data['code'] === 200) {
                $res = $insInstitution->createData($data['data']);
                if ($res === false) {
                    throw new \Exception($insInstitution->getError());
                }
            } else {
                throw new \Exception($data['msg']);
            }
            return ['code' => 200, 'msg' => '成功'];

        } catch (\Exception $e) {
            return ['code' => 400, 'msg' => $e->getMessage()];
        }
    }
}
