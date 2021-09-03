<?php

namespace MockApp\controllerV2;


use IamTool\annotations\NodeAnnotation;
use MockApp\BaseController;

class CateController extends BaseController
{

    /**
     * @NodeAnnotation(cateTitle="分类管理",title="分类列表",route="cate/index",method="GET")
     */
    public function index()
    {
        var_dump(__METHOD__);
    }

    /**
     * @NodeAnnotation(cateTitle="分类管理",title="新增分类",route="cate/add",method="POST")
     */
    public function add()
    {
        var_dump(__METHOD__);
    }

    /**
     * @NodeAnnotation(cateTitle="分类管理",title="编辑分类",route="cate/edit",method="POST")
     */
    public function edit()
    {
        var_dump(__METHOD__);
    }

    /**
     * @NodeAnnotation(cateTitle="分类管理",title="分类详情",route="cate/detail",method="GET")
     */
    public function detail()
    {
        var_dump(__METHOD__);
    }

}