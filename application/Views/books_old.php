<?php
include 'header.phtml';
?>
      <div id="greenrow">

          <div class="nav">
              <h2 id="categories">Категории</h2>
              <ul>
                  <?php foreach ($categories as $category) : ?>
                      <li><a href="/category/view/<?php echo $category['id'];?>"><?php echo $category['title'];?></a></li>
                  <?php endforeach; ?>
              </ul>
          </div><!-- end .nav -->
          <br />
          <br />

          <ul class="flex-container">
              <?php foreach ($items as $item) : ?>
                  <li class="flex-item"><a href="/book/view/<?php echo $item['id'];?>"><p><?php echo $item['title'].' '.$item['year'].'г. '.$item['number_of_pages'].' стр';?></p></a></li>
              <?php endforeach; ?>
          </ul>
          <br />
      </div><!-- end greenrow -->
      
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
