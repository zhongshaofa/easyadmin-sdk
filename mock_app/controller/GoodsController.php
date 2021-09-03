<?php

namespace MockApp\controller;

use IamTool\annotations\NodeAnnotation;
use MockApp\BaseController;


class GoodsController extends BaseController
{

    /**
     * @NodeAnnotation(cateTitle="商品管理",title="商品列表",route="goods/index",method="GET")
     */
    public function index()
    {
        var_dump(__METHOD__);
    }

    /**
     * @NodeAnnotation(cateTitle="商品管理",title="商品编辑",route="goods/edit",method="POST",authType=3)
     */
    public function edit()
    {
        var_dump(__METHOD__);
    }

    /**
     * @NodeAnnotation(cateTitle="商品管理",title="商品详情",route="goods/detail",method="GET",ruleType=2)
     */
    public function detail()
    {
        var_dump(__METHOD__);
    }

    /**
     * @NodeAnnotation(cateTitle="商品管理",title="商品添加",route="goods/add",method="POST")
     */
    public function add()
    {
        var_dump(__METHOD__);
    }


}