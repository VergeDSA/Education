<?php

namespace App\Http\Controllers;

//use App\AuthorModel;
//use App\CategoryModel;
use App\AuthorsActiveRecord;
use App\AuthorsBooksActiveRecord;
use App\CategoriesActiveRecord;
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
        $author_index = AuthorsActiveRecord::fetchAll('ALL');
//        var_dump($author_index);
//        die;
// old        $category_index = CategoryModel::getCategoryIndex();
        $category_index = CategoriesActiveRecord::fetchAll('ALL');
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
            $joins = ['authors_books'=>'right/authors.id/author_id',
                      'books'=>'left/books.id/book_id'
                     ];
            $author = AuthorsActiveRecord::fetchOne($id,'ALL',$joins);
            $joins = ['authors'=>'inner/authors.id/author_id',
                      'books'=>'inner/books.id/book_id'
                     ];
            $books = AuthorsBooksActiveRecord::fetchAll('ALL', $joins);
            var_dump($author);
            die;
            $category_index = CategoriesActiveRecord::fetchAll('ALL');
            $view = new View();
            $view->assign('items', $author);
            $view->assign('categories', $category_index);
            $view->display('authors.php');
//            print_r($author);
        }
    }
}
