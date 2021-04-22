<?php

namespace app\admin\controller;

use think\Log;

class Device extends Base
{
    /**
     * 设备信息
     *
     * @return array
     */
    public function save()
    {
        $url = $this->baseHost . 'Device/device';
        $data = create_curl($url, ['community' => $this->community]);
        if ($data['code'] === 200) {
            $res = $this->addAll('t_ins_device', $data['data']);
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
