<?php

namespace app\admin\model;

use think\Log;
use think\Model;

class TInsServicePoint extends Model
{
    public function createData($data)
    {
        try {
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
