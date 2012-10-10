# Navigation

## Items

### Item

The item driver is the basic driver used for navigation. This driver represents a normal navigation item, like everyone would expect.

Driver's view:

	<li class="item<?php echo ( $item->breadcrumbled() ? ' active' : NULL); ?>">
		<?php echo HTML::anchor($item->uri, __($item->title), ( is_null($item->attributes) ? array() : $item->attributes )); ?>
	</li>

Results in an output like this examples show:

	<li class="item active">
		<a href="url/to/route">Titel</a>
	</li>
	<li class="item">
		<a href="url/to/route">Titel</a>
	</li>
