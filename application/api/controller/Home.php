<?php
namespace app\api\controller;
 
use think\Controller;

class Home extends Controller
{
    /**
     * 获取分类页面
     */
    public function getCategory()
    {
        $list = [];
        $arr = db('course_category')->field('id,title,pid,icon')->select();
        foreach($arr as &$v){
            if($v['pid']==0){
                $icon = db('picture')->where(['status'=>1,'id'=>$v['icon']])->value('path');
                $v['icon'] = $icon;
                $list[] = $v;
            }
            foreach($list as &$k){
                
                if($v['pid']==$k['id']){
                    $k[] = $v;
                }
            }
        }
        return $list;
    }
}