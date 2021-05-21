<?php

namespace app\admin\controller;

use app\admin\model\TInsInstitution;
use think\Controller;
use think\Log;
use app\admin\model\TInsServicePoint;

class InsServicePoint extends Base
{
    /**
     * 服务点字典表
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save()
    {
        try {
            $data = array(
                'JGDM' => '49AMU40A0X1UB4209Y',  //机构标识
                'ZZJGDM' => '91442000MA4UYBXA9U',  //统一社会信用代码
                'FWWDDM' => '91442000MA4UYBXA9U',  //服务网点代码
                'FWDMC' => '中山家有一生综合门诊部',  //服务点名称
                'FWDLX' => '05',  //服务点类型
                'FWDCLRQ' => '2021-05-01',  //服务点成立日期
                'DWLSGXDM' => '50',  //单位隶属关系代码
                'FWDFLGLLBDM' => '2',  //服务点分类管理类别代码
                'FWDFLDM' => 'D110',  //服务点分类代码
                'JJLXDM' => '50',  //经济类型代码
                'DZ' => '中山市火炬开发区博爱七路113号百合家园3幢13、14卡、二层1卡',  //地址
                'FWDYYJB' => '0',  //服务点医院级别 0 基层卫生服务站 1 一级医院 2 二级医 院 3 三级医院 4 未定级
                'FWDYYDJ' => '3',  //服务点医院等级 0 甲等 1 乙等 2 丙等 3 未定等
                'XKZHM' => '91442000MA4UYBXA9U',  //许可证号码
                'XKXMMC' => '西医',  //许可项目名称
                'XKZYXQ' => '2025-01-01',  //许可证有效期
                'FWDSZDMZZZDFBZ' => '2',  //服务点所在地民族自治地方标志  1 是 2 否
                'SFFZJG' => '2',  //是否分支机构 1 是 2 否
                'SJSCSJ' => date('Y-m-d H:i:d'), //数据生成日期
            );
            $res = $this->add('t_ins_service_point', $data);
            if ($res === false) {
                throw new \Exception($this->error);
            }

            return ['code' => 200, 'msg' => '成功'];
        } catch (\Exception $e) {
            Log::record($e->getMessage());

            return ['code' => 400, 'msg' => 'ssd'];
        }

    }
}
