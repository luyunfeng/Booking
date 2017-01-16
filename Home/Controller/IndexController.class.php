<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
//访问  和view中的  同名
class IndexController extends Controller {
    public function index()
    {
        $obj=D();
        $this->display();
    }
}

