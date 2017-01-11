<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 30.11.16
 * Time: 22:11
 */
return array(
    'author/([a-z]+)/([0-9]+)' => 'author/$1/$2',
    'authors' => 'author/index',
    'book/([a-z]+)/([0-9]+)' => 'book/$1/$2',
    'books' => 'book/index',
    'reader/([a-z]+)/([0-9]+)' => 'reader/$1/$2',
    'readers' => 'reader/index',
    'category/([a-z]+)/([0-9]+)' => 'category/$1/$2',
    'categories' => 'category/index',
    '([a-zA-Z0-9]+)' => 'author/index',
    '' => 'author/index'
);