<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @param <object> menu
 * 
 * @author David Stutz
 */
?>
<?php if (!$item->root()): ?>
    <li>
<?php endif; ?>

<ul class="nav nav-pills">
    <?php foreach($item->items as $alias => $i): ?>
        <?php echo $i->render($theme); ?>
    <?php endforeach; ?>
</ul>

<?php if (!$item->root()): ?>
    </li>
<?php endif; ?>