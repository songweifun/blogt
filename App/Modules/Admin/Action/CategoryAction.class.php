<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/8/5
 * Time: 下午6:15
 */
class CategoryAction extends CommonAction{
    /**
     * 栏目列表
     */
    public function index(){
        $category=M('Category')->order('sort asc')->select();
        import('Class.Category',APP_PATH);
        //$category=Category::oneDimensionalArray($category);
        $category=Category::twoDimensionalArray($category);
        //$category=Category::getParents($category,15);
        //$category=Category::getChildId($category,4);
        //$category=Category::getChilds($category,4);
        //p($category);die;
        $this->assign('category',$category)->display();
    }

    /**
     * 添加栏目
     */
    public function addCategory(){
        $this->pid=I('pid',0,'intval');
        //p($this->pid);die;
        $this->display();
    }

    /**
     * 添加栏目表单处理
     */
    public function addCategoryHandel(){

        if(M('Category')->add($_POST)){
            $this->success('添加栏目成功',U(GROUP_NAME.'/Category/index'));
        }else{
            $this->error('添加栏目失败',U(GROUP_NAME.'/Category/addCategory'));
        }

    }

    /**
     * 栏目排序
     */
    public function setSort(){
        $db=M('category');
        foreach($_POST as $id=>$sort){
            $db->where(array('id'=>$id))->setField('sort',$sort);
        }

        $this->redirect(GROUP_NAME.'/Category/index');
    }
}