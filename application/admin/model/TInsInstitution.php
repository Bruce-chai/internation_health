<?php

namespace app\admin\model;

use think\Log;
use think\Model;

class TInsInstitution extends Model
{
    private $jgdm = '49AMU40A0X1UB4209Y';  //机构标识
    private $zzjgdm = '91442000MA4UYBXA9U';  //实体医院统一社会信用代码
    private $jgmc = '山市家有一生综合门诊有限公司';  //机构名称（互联网医院名称）
    private $xzqhdm = '442000';  //行政区划代码
    private $jglx = '01';  //机构类型(互联网医院的属性) 01 互联网医院诊疗
    private $jgclrq = '2021-05-01';  //机构成立日期(互联网医院成立日期格 式 YYYY-MM-DD)
    private $dwlsgxdm = '40';  //单位隶属关系代码(互联网医院的单位隶属关系代码。GB/T 12404单位隶属关系代码)
    private $jgflgllbdm = '2';  //机构分类管理类别代码(互联网医院的机构分类管理类别代码。);
    private $jgfldm = '';  //机构分类代码;
    private $jjlxdm = '';  //经济类型代码
    private $dz = '';  //地址
    private $styyzzjgdm = '';  //实体医院医疗组织机构代码
    private $styymc = '';  //实体医院名称
    private $styljgjb = '';  //实体医疗机构级别
    private $styljgdj = '';  //实体医院机构等级
    private $hlwyywz = '';  //互联网医院网址
    private $xkzhm = '';  //许可证号码
    private $xkxmmc = '';  //许可项目名称
    private $xkzyxq = '';  //许可证有效期(实体医院的许可证有效期格式:YYYY-MM-DD)
    private $xxaqxxbh = '';  //信息安全等级保护
    private $xxaqxxbhbh = '';  //信息安全等级保护证 书编号(当信息安全等级保护为1-4 级时，此字段为必填)
    private $kbzjjes = '';  //开办资金金额数
    private $frdb = '';  //法人代表/负责人
    private $jgszdmzzzdfbz = '';  //机构所在地民族自治地方标志
    private $sffzjg = '';  //是否分支机构
    private $bspt = '';  //部署平台(编码，首次上传数据时为必填项，当变更时需重新提交变更记录。01 自建，02-阿里云，03-腾讯云，04-天翼云，05-沃云，06-联通云，90-其他)
    private $sfslgd = '';  //是否具备双路供电或紧急发电设施
    private $sjscsj = '';  //数据生成日期时间(业务操作上获取该信息的时间，如数据生成日期时间、数据修改日期时间或数据撤销日期时间。
    private $cxbz = '1';  //撤销标志(1：正常；2：撤销该记录)
    public function createData($data)
    {
        try {
            $data = [
                'jgdm' => $this->jgdm,
                'zzjgdm' => $this->zzjgdm,
                'jgmc' => $this->jgmc,
                'xzqhdm' => $this->xzqhdm,
                'jglx' => $this->jglx,
                'jgclrq' => $this->jgclrq,
                'dwlsgxdm' => $this->dwlsgxdm,
                'jgflgllbdm' => $this->jgflgllbdm,
                'jgfldm' => $this->jgfldm,
                'jjlxdm' => $this->jjlxdm,
                'dz' => $this->dz,
                'styyzzjgdm' => $this->styyzzjgdm,
                'styymc' => $this->styymc,
                'styljgjb' => $this->styljgjb,
                'styljgdj' => $this->styljgdj,
                'hlwyywz' => $this->hlwyywz,
                'xkzhm' => $this->xkzhm,
                'xkxmmc' => $this->xkxmmc,
                'xkzyxq' => $this->xkzyxq,
                'xxaqxxbh' => $this->xxaqxxbh,
                'xxaqxxbhbh' => $this->xxaqxxbhbh,
                'kbzjjes' => $this->kbzjjes,
                'frdb' => $this->frdb,
                'jgszdmzzzdfbz' => $this->jgszdmzzzdfbz,
                'sffzjg' => $this->sffzjg,
                'bspt' => $this->bspt,
                'sfslgd' => $this->sfslgd,
                'sjscsj' => $this->sjscsj,
                'cxbz' => $this->cxbz,
            ];
            $this->save($data);
            if (!$this->id) {
                throw new \Exception("添加失败");
            }

            return true;
        } catch (\Exception $e) {
            Log::record($e->getMessage());
            $this->error = $e->getMessage();

            return false;
        }
    }
}
