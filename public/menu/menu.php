<?php $parent = isset($category['children']); ?>
<li>
    <a href="category/<?php echo $category['alias']; ?>"><?php echo $category['title']; ?></a>
    <?php if (isset($category['children'])): ?>
        <ul>
            <?php echo $this->getMenuHtml($category['children']); ?>
        </ul>
    <?php endif; ?>
</li>
