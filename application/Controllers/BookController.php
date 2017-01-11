<?php

namespace App\Controllers;

use Library\Framework\Db;
use App\Models\Books;
use Library\DataMapper\DataMapperMySQL;
use App\Models\Categories;

class BookController
{
    public function actionIndex()
    {

// old       $book_index = BookModel::getBooksIndex();
        $book = new Books();
//        $book->id = 7;
//        $book->title = 'Modern PHP. New Features and Good Practices';
//        $book->number_of_pages = 268;
//        $book->year = 2015;
        $books = new DataMapperMySQL(Db::getDbConnection());
//        $books->save($book);
        $books_index = $books::fetchAll($book);
//        var_dump($books_index);
//        die;
// old        $category_index = CategoryModel::getCategoryIndex();
        $category_index = Categories::fetchAll('ALL');
        $view = new View();
        $view->assign('items', $books_index);
        $view->assign('categories', $category_index);
        $view->display('books.php');
//        print_r($book_index);
    }

    public function actionView($id)
    {
        if ($id) {
            $joins = ['AuthorsBooks'=>'left/books.id/book_id',
                'Authors'=>'left/authors.id/author_id'
            ];
//            Models\Authors::pushTableFields('created_at');
//            Models\AuthorsBooks::pushTableFields('created_at');
//            Models\Books::pushTableFields('created_at');
            $book = Books::fetchOne($id, 'ALL', $joins);
//            $book = Books::getBookById($id);
            var_dump($book);
            die;
            $joins = ['Authors'=>'inner/authors.id/author_id',
                'Books'=>'inner/books.id/book_id'
            ];
            $books = Books::fetchAll('ALL', $joins);
//            var_dump($book);
//            die;
            $category_index = Categories::fetchAll('ALL');
            $view = new View();
            $view->assign('items', $book);
            $view->assign('categories', $category_index);
            $view->display('book.php');
//            print_r($author);
        }
    }
}
