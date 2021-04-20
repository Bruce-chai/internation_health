<?php

namespace app\admin\model;

use think\Log;
use think\Model;

class TPiPerson extends Model
{
    public function createData($data)
    {
        try {
            $res = $this->saveAll($data);
            if (!$res) {
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
