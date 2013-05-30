<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @param <object> item
 * 
 * @author David Stutz
 */
?>
<li class="<?php echo Navigation::classes('item'); if ($item->breadcrumb) echo ' ' . Navigation::classes('active'); ?>">
	<?php echo HTML::anchor($item->uri, __($item->title), ( is_null($item->attributes) ? array() : $item->attributes )); ?>
</li>
