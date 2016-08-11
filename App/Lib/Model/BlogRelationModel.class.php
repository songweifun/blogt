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
        )

    );
}