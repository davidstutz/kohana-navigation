<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @param <object> item
 * 
 * @author David Stutz
 */
?>
<li <?php if ($item->breadcrumb) echo 'class="active"'; ?>>
	<?php echo HTML::anchor($item->uri, __($item->label), ( is_null($item->attributes) ? array() : $item->attributes )); ?>
</li>