<?php

namespace app\admin\controller;

use think\Controller;
use think\Log;

class Department extends Base
{
    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save()
    {
        try {
            $url = $this->baseHost . 'Institution/institution';

            $data = create_curl($url, ['community' => $this->community]);
            if ($data['code'] === 200) {
                $res = $this->addAll('t_ins_department', $data['data']);

                if ($res === false) {
                    throw new \Exception($this->error);
                }
            } else {
                throw new \Exception($data['msg']);
            }
            return ['code' => 200, 'msg' => '成功'];

        } catch (\Exception $e) {
            Log::record($e->getMessage());
            return ['code' => 400, 'msg' => $e->getMessage()];
        }
    }

}
