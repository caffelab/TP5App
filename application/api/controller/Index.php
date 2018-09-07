<?php
namespace app\api\controller;

//首页
class Index extends Home
{
    public function getLists()
    {
        $category = $this->getCategory();
        return json($category);
    }

    
}