<?php

namespace App\Http\Controllers;

use App\AuthorModel;
use App\CategoryModel;

class AuthorController
{
    public function actionIndex()
    {
        $author_index = AuthorModel::getAuthorsIndex();
        $category_index = CategoryModel::getCategoryIndex();
        $view = new View();
        $view->assign('items', $author_index);
        $view->assign('categories', $category_index);
        $view->display('authors.php');
//        print_r($author_index);
    }

    public function actionView($id)
    {
        if ($id) {
            $author = AuthorModel::getAuthorById($id);
            $view = new View();
            $view->assign('items', $author);
            $view->display('author.php');
//            print_r($author);
        }
    }
}
