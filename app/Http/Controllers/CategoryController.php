<?php

namespace App\Http\Controllers;

use App\CategoryModel;

class CategoryController
{
    public function actionIndex()
    {
        $category_index = CategoryModel::getCategorysIndex();
//        $view = new View();
//        $view->assign('items', $category_index);
//        $view->display('categorys.php');
//        print_r($category_index);
    }

    public function actionView($id)
    {
        if ($id) {
            $category = CategoryModel::getCategoryById($id);
//            $view = new View();
//            $view->assign('items', $category);
//            $view->display('category.php');
//            print_r($category);
        }
    }
}
