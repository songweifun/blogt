<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/8/11
 * Time: 下午8:04
 */
class BlogRelationModel extends RelationModel{
    protected $tableName='blog';
    protected $_link=array(
        'attribute'=>array(

            "mapping_type"=>MANY_TO_MANY,
            "mapping_name"=>'attr',
            "foreign_key"=>"bid",
            "relation_foreign_key"=>"aid",
            "relation_table"=>'6d_blog_attribute'
        ),
        'category'=>array(
            'mapping_type'=>BELONGS_TO,
            'foreign_key'=>'cid',
            'mapping_fields'=>'cname',
            'as_fields'=>'cname:cate'//此名称要和上面的cname一样
        )

    );

    public function getBlogs($type){
        return $this->relation(true)->field('isdel',true)->where(array('isdel'=>$type))->select();

    }
}