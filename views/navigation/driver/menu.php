<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @param <object> menu
 * 
 * @author David Stutz
 */
?>
<?php if (!$item->root()): ?>
	<li class="<?php echo Navigation::classes('submenu'); ?>">
<?php endif; ?>
	<ul <?php echo HTML::attributes($item->attributes()); ?>>
		<?php foreach($item->items as $alias => $i): ?>
			<?php echo $i->render(); ?>
		<?php endforeach; ?>
	</ul>
<?php if (!$item->root()): ?>
	</li>
<?php endif; ?>