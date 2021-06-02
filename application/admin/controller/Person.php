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
        Log::record(json_encode($data));
        if ($data['code'] === 200) {
           /*  $users = $this->dataDeDuplication($data['data']);
            if (empty($users)) {
                return ['code' => 400, 'msg' => '无新用户'];
            }*/
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

    private function dataDeDuplication($data)
    {
        $kh = '';
        foreach ($data as $v) {
            $kh .="'" . $v['kh'] . "',";
        }
        
        $kh = rtrim($kh, ',');
        
        $sql = "select kh from t_pi_person where kh in($kh);";
        $resource = pg_query($sql);
        $users = [];
        while($row = pg_fetch_array($resource)){
            $users[] = $row;
        }
        if (!$users) {
            return $data;
        } else {
            Log::record(json_encode($users));
            foreach ($data as $k => $v) {
                foreach ($users as $user) {
                    if ($v['kh'] == $user['kh'] && $v['cxbz'] == $user['cxbz']) {
                        unset($data[$k]);
                    }
                }
            }
            $data = array_values($data);
        }
        return $data;
    }
}
