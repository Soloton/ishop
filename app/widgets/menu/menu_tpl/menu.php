<li>
    <a href="?id=<?php echo $id; ?>"><?php echo $category['title']; ?></a>
    <?php if (isset($category['children'])): ?>
        <ul>
            <?php echo $this->getMenuHtml($category['children']); ?>
        </ul>
    <?php endif; ?>
</li>
