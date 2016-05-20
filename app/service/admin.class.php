<?php

class service_admin extends components_service
{

    /**
     * @return components_model
     */
    public function getModel()
    {
        return new model_dm_admin($this->id);
    }

    public function login($name, $password)
    {
        return $this->invokeTransaction();
    }
    public function _login($name, $password)
    {
        if (!$name) {
            throw new Exception("无效用户名");
        }
        if (!$password) {
            throw new Exception("无效密码");
        }
        $user = $this->model->selectOne(
            array('admin_name' => $name),
            '*'
        );
        if (!$user || !$user['admin_id']) {
            throw new Exception("用户不存在");
        }
        if (md5($password) != $user['password']) {
            throw new Exception("用户名或密码错误");
        }
        return $user;
    }

}
