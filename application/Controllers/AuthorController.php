<?php

namespace App\Controllers;

//use App\AuthorModel;
//use App\CategoryModel;
use App\Models;
use App\CategoryModel;

class AuthorController
{
    public function actionIndex()
    {
//        $author = new AuthorsActiveRecord();
//        $author->id = 23;
//        $author->name = 'Пол';
//        $author->last_name = 'Мак-Федрис';
//        $author->save();
//        $author->save();
// old        $author_index = AuthorModel::getAuthorsIndex();
        $author_index = Models\Authors::fetchAll('ALL');
//        var_dump($author_index);
//        die;
// old        $category_index = CategoryModel::getCategoryIndex();
        $category_index = Models\Categories::fetchAll('ALL');
        $view = new View();
        $view->assign('items', $author_index);
        $view->assign('categories', $category_index);
        $view->display('authors.php');
//        print_r($author_index);
    }

    public function actionView($id)
    {
        if ($id) {
// old            $author = AuthorModel::getAuthorById($id);
//            $author = AuthorsActiveRecord::fetchOne($id,'ALL');
            $joins = ['AuthorsBooks'=>'left/authors.id/author_id',
                      'Books'=>'left/books.id/book_id'
                     ];
            Models\Authors::pushTableFields('created_at');
            Models\AuthorsBooks::pushTableFields('created_at');
            Models\Books::pushTableFields('created_at');
            $author = Models\Authors::fetchOne($id, 'ALL', $joins);
            $joins = ['Authors'=>'inner/authors.id/author_id',
                      'Books'=>'inner/books.id/book_id'
                     ];
            $books = Models\AuthorsBooks::fetchAll('ALL', $joins);
            var_dump($author);
            die;
            $category_index = Models\Categories::fetchAll('ALL');
            $view = new View();
            $view->assign('items', $author);
            $view->assign('categories', $category_index);
            $view->display('authors.php');
//            print_r($author);
        }
    }
}
