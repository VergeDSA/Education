<?php

namespace App\Http\Controllers;

use App\BookModel;
use App\DbModel;
use App\BooksDataMapper;
use App\Http\Controllers\DataMapper\DataMapperMySQL;
use App\CategoriesActiveRecord;
use App\CategoryModel;

class BookController
{
    public function actionIndex()
    {

// old       $book_index = BookModel::getBooksIndex();
        $book = new BooksDataMapper();
//        $book->id = 7;
//        $book->title = 'Modern PHP. New Features and Good Practices';
//        $book->number_of_pages = 268;
//        $book->year = 2015;
        $books = new DataMapperMySQL(DbModel::init());
//        $books->save($book);
        $books_index = $books::fetchAll($book);
//        var_dump($books_index);
//        die;
// old        $category_index = CategoryModel::getCategoryIndex();
        $category_index = CategoriesActiveRecord::fetchAll('ALL');
        $view = new View();
        $view->assign('items', $books_index);
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
