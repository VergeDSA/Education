<?php
include 'header.phtml';
?>
    <div>
        <ul class="flex-container">
            <?php foreach ($items as $item) : ?>
                <li class="flex-item">
                    <a href="/book/view/<?php echo $item['id'];?>"><p><?php echo $item['title'].' '.$item['year'].'г. '.$item['number_of_pages'].' стр';?></p></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php
include 'footer.phtml';
?>