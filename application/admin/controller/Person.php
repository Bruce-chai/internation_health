<?php

namespace app\admin\controller;

use think\Log;

class Person extends Base
{
    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return array
     */
    public function save()
    {
        $date = input('post.date', '');
        $url = $this->baseHost . 'Person/users';
        $data = create_curl($url, ['date' => $date, 'community' => $this->community]);
        if ($data['code'] === 200) {
            $res = $this->addAll('t_pi_person', $data['data']);
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
