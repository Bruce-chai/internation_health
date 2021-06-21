<?php

namespace app\admin\controller;

use think\Controller;
use think\Log;

class TreatmentOrder extends Base
{
    public function saveOrder()
    {
        $date = input('post.date', '');
        $url = $this->baseHost . 'MedicalService/caseData';
        $data = create_curl($url, ['date' => $date, 'community' => $this->community]);
        if ($data['code'] === 200) {
            $res = $this->addAll('t_ms_treatment_order', $data['data']);
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
