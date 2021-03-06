<?php

namespace app\admin\controller;

use think\Log;

class Staff extends Base
{
    /**
     * 人力资源信息
     *
     * @return array
     */
    public function save()
    {
        $url = $this->baseHost . 'Staff/staff';
        $data = create_curl($url, ['community' => $this->community]);
        if ($data['code'] === 200) {
            $res = $this->addAll('t_ins_staff', $data['data']);
            if($res === true){
                return ['code' => 200, 'msg' => '成功'];
            } else {
                return ['code' => 400, 'msg' => $this->error];
            }
        } else {
            Log::record('error_msg:  ' . $data['msg']);
            return ['code' => 400, 'msg' => $data['msg']];
        }
    }
}