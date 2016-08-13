<?php
return array(
	//'配置项'=>'配置值'
    'APP_GROUP_LIST'=>'Admin,Index',
    'DEFAULT_GROUP'=>'Index',
    'APP_GROUP_MODE'=>1,
    'APP_GROUP_PATH'=>"Modules",

    'LOAD_EXT_CONFIG'=>'db',
    //'SHOW_PAGE_TRACE'=>true,//显示调试页面

    /************************路由*************************************/
    'URL_MODEL'=>2,
    'URL_ROUTER_ON'   => true,
    'URL_ROUTE_RULES' => array( //定义路由规则
        //'c/:id'=>"Index/List/index",//普通路由
        '/^c_(\d+)$/'=>'Index/List/index?id=:1',//正则路由
        ':id\d'=>'Index/Show/index',

    ),
);
?>