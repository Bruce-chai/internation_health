<?php

namespace app\admin\controller;

use think\Log;
use app\admin\model\TPiPerson;

class Person extends Base
{
    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return array
     */
    public function save(TPiPerson $TPiPerson)
    {
        $url = $this->baseHost . 'Internet_health/Person/users';
        $data = create_curl($url);
        if ($data['code'] === 200) {
            $result = $TPiPerson->createData($data['data']);
            if ($result === false) {
                return ['code' => 400, 'msg' => $TPiPerson->getError()];
            }

            return ['code' => 200, 'msg' => '成功'];
        } else {
            Log::record('error_msg:   ' . $data['msg']);
            return ['code' => 400, 'msg' => $TPiPerson->getError()];
        }
    }
}
