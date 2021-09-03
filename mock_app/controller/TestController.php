<?php

namespace MockApp\controller;

use IamTool\annotations\NodeAnnotation;
use MockApp\BaseController;


class TestController extends BaseController
{

    /**
     * @NodeAnnotation(cateTitle="测试管理",title="测试列表",route="test/index",method="POST")
     */
    public function index()
    {
        var_dump(__METHOD__);
    }

    /**
     * @NodeAnnotation(cateTitle="测试管理",title="测试详情",route="test/details",method="GET")
     */
    public function details()
    {
        var_dump(__METHOD__);
    }


}