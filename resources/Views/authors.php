<?php
include 'header.phtml';
?>
<div class="header">
    <div class="menu">
        <ul class="nav yellow">
            <li><h2 class="categories">Категории</h2></li>
            <?php foreach ($categories as $category) : ?>
                <li><a href="/category/view/<?php echo $category['id']; ?>"><?php echo $category['title']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div><!-- end menu -->
    <div class="mainheader flex-center">
        <ul class="flex-container">
            <?php foreach ($items as $item) : ?>
                <li class="flex-item">
                    <a href="/author/view/<?php echo $item['id']; ?>"><?php echo $item['name'] . ' ' . $item['last_name']; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php
include 'footer.phtml';
?>