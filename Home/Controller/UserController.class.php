<?php
namespace Home\Controller;
use Think\Controller;
//访问  和view中的  同名
class UserController extends Controller {
    public function login()
    {
        $this->display();
    }
    public function regist()
    {
        $this->display();
    }
}

