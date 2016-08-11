<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/8/6
 * Time: 下午10:44
 */

class Category{

    //利用一维数组实现无限级分类

    static function oneDimensionalArray($category,$pid=0,$level=0,$html='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;┠'){

        $arr=array();

        foreach($category as $v){
            if($pid==$v['pid']){
                $v['level']=$level+1;
                $v['html']=str_repeat($html,$level);
                $arr[]=$v;
                $arr=array_merge($arr,self::oneDimensionalArray($category,$v['id'],$v['level']));

            }
        }
        return $arr;
    }

    //利用二维数组实现无限级分类
    static function twoDimensionalArray($category,$pid=0,$level=0){
        $arr=array();
        foreach ($category as $v) {
            if($pid==$v['pid']){
                $v['level']=$level+1;
                $v['child']=self::twoDimensionalArray($category,$v['id'],$v['level']);
                $arr[]=$v;
            }

        }
        return $arr;
    }


    //通过子id获得所有父级元素
    static function getParents($category,$id){
        $arr=array();
        foreach ($category as $v) {
            if($v['id']==$id){
                $arr[]=$v;
                $arr=array_merge(self::getParents($category,$v['pid']),$arr);

            }
        }
        return $arr;
    }

    //通过父级id获得所有的子栏目id
    static function getChildId($category,$pid){
        $arr=array();
        foreach($category as $v){
            if($v['pid']==$pid){
                $arr[]=$v['id'];
                $arr=array_merge($arr,self::getChildId($category,$v['id']));
            }
        }
        return $arr;
    }
    //通过父级id获得所有的子栏目
    static function getChilds($category,$pid){
        $arr=array();
        foreach($category as $v){
            if($v['pid']==$pid){
                $arr[]=$v;
                $arr=array_merge($arr,self::getChilds($category,$v['id']));
            }
        }
        return $arr;
    }

}