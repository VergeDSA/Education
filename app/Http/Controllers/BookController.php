<?php

namespace App\Http\Controllers;

use App\BookModel;
use App\CategoryModel;

class BookController
{
    public function actionIndex()
    {
        $book_index = BookModel::getBooksIndex();
        $category_index = CategoryModel::getCategoryIndex();
        $view = new View();
        $view->assign('items', $book_index);
        $view->assign('categories', $category_index);
        $view->display('books.php');
//        print_r($book_index);
    }

    public function actionView($id)
    {
        if ($id) {
            $book = BookModel::getBookById($id);
            $view = new View();
            $view->assign('items', $book);
            $view->display('book.php');
//            print_r($book);
        }
    }
}
