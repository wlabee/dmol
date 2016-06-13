<?php

class service_dma extends components_service
{
    /**
     * @return components_model
     */
    public function getModel()
    {
        return new model_dm_dma($this->id);
    }

    //添加页面
    public function add($data)
    {
        return $this->invokeTransaction();
    }

    public function _add($data)
    {
        $in_data = Tarray::getSub($data, array('dm_title', 'dm_content'));
        if (!$in_data['dm_title']) {
            throw new Exception('无效页面标题');
        }

        $admin_user = $this->getUser();
        $in_data = array_merge($in_data, array(
            'user_id' =>1,
            'user_name' => 'default',
            'admin_id' => $admin_user['_userid']?:0,
            'admin_name' => $admin_user['_username']?:'',
            'create_time' => $this->_time,
            'create_date' => $this->_ymd,
        ));
        $in_data['dm_content'] = $this->formatDmCnt($in_data['dm_content']);

        $dm_id = $this->model->insert($in_data);
        if ($dm_id === false) {
            throw new Exception('数据操作错误');
            // throw new Exception($this->model->getDbError());
        }
        return $dm_id;
    }

    //格式化dm的内容
    public function formatDmCnt($content)
    {
        if (! $content) {
            return '';
        }
        foreach ($content as $key => $value) {
            switch ($value['mk_type']) {
                case 'number':
                    if (! is_numeric($value)) {
                        $content['value'] = 0;
                    }
                    break;
                case 'text':
                case 'textarea':
                case 'editor':
                    $content[$key] = Tsafe::filter($value);
                    break;
                case 'image':
                    break;
                case 'file':
                    break;
                case 'email':
                    break;
                case 'mobile':
                    break;
                case 'url':
                    break;
                case 'qq':
                    break;
                default:
                    # code...
                    break;
            }
        }
    }

    //删除标签
    public function delete()
    {
        return $this->invokeTransaction();
    }
    public function _delete()
    {
        if (! $this->id) {
            throw new Exception("无效对象");
        }

        $succ = $this->model->update(array('dm_id' => $this->id), array('is_delete' => 1));
        if ($succ === false) {
            throw new Exception('数据操作错误');
            // throw new Exception($this->model->getDbError());
        }
        return true;
    }
}
