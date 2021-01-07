<style>
	.border-color-transparent {
		border: solid 1px transparent;
	}
	.background-color-transparent {
		background-color: transparent;
	}
	:root {
		<?php foreach ($layout['color'] as $k_color => $r_color): ?>
			--<?= $k_color ?>: <?= $r_color ?>;
		<?php endforeach ?>
		<?php foreach ($layout['image'] as $k_image => $r_image): ?>
			--<?= $k_image ?>: url(<?= $r_image['thumbnail'] ?>);
		<?php endforeach ?>
	}
	<?php foreach ($layout['color'] as $k_color => $r_color): ?>
		.border-color-<?= implode("-", array_slice(explode("-", $k_color), 1)) ?>:focus,
		.border-color-<?= implode("-", array_slice(explode("-", $k_color), 1)) ?>:active,
		.border-color-<?= implode("-", array_slice(explode("-", $k_color), 1)) ?>:visited,
		.border-color-<?= implode("-", array_slice(explode("-", $k_color), 1)) ?> {
			border: solid 1px <?= $r_color ?>;
			-webkit-transition: all .5s;
			-o-transition: all .5s;
			transition: all .5s;
		}
		.color-<?= implode("-", array_slice(explode("-", $k_color), 1)) ?>:focus,
		.color-<?= implode("-", array_slice(explode("-", $k_color), 1)) ?>:active,
		.color-<?= implode("-", array_slice(explode("-", $k_color), 1)) ?>:visited,
		.color-<?= implode("-", array_slice(explode("-", $k_color), 1)) ?> {
			color: <?= $r_color ?>;
			-webkit-transition: all .5s;
			-o-transition: all .5s;
			transition: all .5s;
		}
		.background-color-<?= implode("-", array_slice(explode("-", $k_color), 1)) ?>:focus,
		.background-color-<?= implode("-", array_slice(explode("-", $k_color), 1)) ?>:active,
		.background-color-<?= implode("-", array_slice(explode("-", $k_color), 1)) ?>:visited,
		.background-color-<?= implode("-", array_slice(explode("-", $k_color), 1)) ?> {
			background-color: <?= $r_color ?>;
			-webkit-transition: all .5s;
			-o-transition: all .5s;
			transition: all .5s;
		}
	<?php endforeach ?>
	<?php foreach ($layout['image'] as $k_image => $r_image): ?>
		.background-image-<?= implode("-", array_slice(explode("-", $k_image), 1)) ?>:focus,
		.background-image-<?= implode("-", array_slice(explode("-", $k_image), 1)) ?>:active,
		.background-image-<?= implode("-", array_slice(explode("-", $k_image), 1)) ?>:visited,
		.background-image-<?= implode("-", array_slice(explode("-", $k_image), 1)) ?> {
			background-image: url("<?= $r_image['thumbnail'] ?>");
		}
	<?php endforeach ?>
	<?php foreach ($layout['color'] as $k_color => $r_color): ?>
		.border-color-hover-<?= implode("-", array_slice(explode("-", $k_color), 1)) ?>:hover {
			border: solid 1px <?= $r_color ?>;
		}
		.color-hover-<?= implode("-", array_slice(explode("-", $k_color), 1)) ?>:hover {
			color: <?= $r_color ?>;
		}
		.background-color-hover-<?= implode("-", array_slice(explode("-", $k_color), 1)) ?>:hover {
			background-color: <?= $r_color ?>;
		}
	<?php endforeach ?>
	<?php foreach ($layout['image'] as $k_image => $r_image): ?>
		.background-image-hover-<?= implode("-", array_slice(explode("-", $k_image), 1)) ?>:hover {
			background-image: url("<?= $r_image['thumbnail'] ?>");
		}
	<?php endforeach ?>
</style>