<?php
include 'header.phtml';
?>
    <div>
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