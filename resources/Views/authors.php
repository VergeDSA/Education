<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
	<title>Books online</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div id="wrapper">
      <div id="menu">
          <h1><a href="http://www.freewebsitetemplates.com"><img src="/images/logo.gif" width="121" height="22" alt="Books Online" /></a></h1>
          <ul id="navblue">
              <li><a href="/books">Книги</a></li>
              <li><a href="/authors">Авторы</a></li>
              <li><a href="http://www.freewebsitetemplates.com">Читатели</a></li>
              <li><a href="http://www.freewebsitetemplates.com">Подписки по авторам</a></li>
              <li><a href="http://www.freewebsitetemplates.com">Подписки по категориям</a></li>
          </ul>
      </div><!-- end menu -->
      <div id="header">
          <div id="navtop">
              <a>&nbsp;</a>
              <a href="http://www.freewebsitetemplates.com">Войти</a>
          </div>
          <h2><img src="/images/title_explore.gif" width="185" height="20" alt="explore your knowledge" /></h2>
		  <div class="exploretext">
			  <ul id="explore">
			  </ul>
		  </div>
          <div id="books"></div>
          <div id="girl"></div>
      </div><!-- end header -->
      <div class="divider"></div>
      <div id="searchbar">
          <form action="/" method="get">
              Title: <input name="title" type="text" value="" class="text" /> &nbsp;
              Author: <input name="author" type="text" value="" class="text" /> &nbsp;
              <input type="submit" value="Go" class="submit" />
          </form>
      </div><!-- end searchbar -->
      
      <div id="orangerow">
          
          <div class="nav">
              <h2 id="categories">Категории</h2>
              <ul>
                  <?php foreach ($categories as $category) : ?>
                      <li><a href="/category/view/<?php echo $category['id'];?>"><?php echo $category['title'];?></a></li>
                  <?php endforeach; ?>

              </ul>
          </div><!-- end .nav -->
          <div id="authormonth">
              <img class="firstportrait" src="/images/picture_1.jpg" width="77" height="133" alt="Author" />
              <ul class="flex-container">

<?php foreach ($items as $item) : ?>
              <li class="flex-item"><a href="/author/view/<?php echo $item['id'];?>"><?php echo $item['name'].' '.$item['last_name'];?></a></li>
              <?php endforeach; ?>

              </ul>
              <img class="secondportrait" src="/images/picture_1.gif" width="71" height="122" alt="Author" />
          </div><!-- end authormonth -->
      </div><!-- end orangerow -->
      

          

      <div id="footer">
          <div id="footeri">
              <span class="copyright">Powered by <a href="http://www.freewebsitetemplates.com">Free Website Templates</a></span> 
              <a href="http://www.freewebsitetemplates.com">bestsellers</a> &nbsp;
              <a href="http://www.freewebsitetemplates.com">magazines</a> &nbsp;
              <a href="http://www.freewebsitetemplates.com">e-books</a> &nbsp;
              <a href="http://www.freewebsitetemplates.com">contact</a> &nbsp;
          </div><!-- end footeri -->
      </div><!-- end footer -->
  </div><!-- end wrapper -->
</body>
</html>
