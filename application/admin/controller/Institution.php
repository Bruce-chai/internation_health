<?php

namespace app\admin\controller;

use think\Controller;
use think\Log;
use think\Request;

class Institution extends Base
{
    /**
     * 机构资源信息
     *
     * @param  \think\Request  $request
     * @return array
     */
    public function save()
    {
        try {
            $url = $this->baseHost . 'Institution/institution';
        
            $data = create_curl($url, ['community' => $this->community]);
            if ($data['code'] === 200) {
                $res = $this->add('t_ins_institution', $data['data']);
                
                if ($res === false) {
                    throw new \Exception($this->error);
                }
            } else {
                throw new \Exception($data['msg']);
            }
            return ['code' => 200, 'msg' => '成功'];

        } catch (\Exception $e) {
            Log::record($e->getMessage());
            return ['code' => 400, 'msg' => 'ssd'];
        }
    }
}
