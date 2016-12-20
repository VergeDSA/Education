<?php

namespace App\Http\Controllers;

use App\BookModel;
use App\DbModel;
use App\BooksDataMapper;
use App\Http\Controllers\DataMapper\DataMapper;
use App\CategoryModel;

class BookController
{
    public function actionIndex()
    {

//        $book_index = BookModel::getBooksIndex();
        $book = new BooksDataMapper();
//        $book->title = 'Использование JavaScript';
//        $book->number_of_pages = 896;
//        $book->year = 2002;
//        $books = new DataMapper(DbModel::init());
//        $books->saveMySQL($book);
        $books_index = $books::fetchAllMySQL($book);
        var_dump($books_index);
        die;
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
