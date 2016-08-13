<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/8/13
 * Time: 上午8:58
 */
//import('TagLib');
class TagLibSelf extends TagLib{
    protected $tags=array(
      'nav'=>array('attr'=>'order','close'=>1),
    );
    public function _nav($attr,$content){
        $tag=$this->parseXmlAttr($attr,'nav');
        $order=$tag['order'];
        import('Class.Category',APP_NAME);
        $str=<<<str
<?php
    \$_nav_cate=Category::twoDimensionalArray(M('category')->order("{$order}")->select());
    //p(\$_nav_cate);
    foreach(\$_nav_cate as \$v):
    extract(\$v);
    \$url=U('/c_'.\$id);
?>
str;
        $str.=$content;
        $str.='<?php endforeach;?>';

        return $str;

    }
}