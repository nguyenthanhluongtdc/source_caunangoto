<?php include _template."layout/breadcrumb.php" ?>
<section id="content" class="category-video">
	<div class="<?= $container ?>">
		<div class="video-list">
			<?php foreach ($row_video as $r_video): ?>
				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="video-item-container">
						<a data-fancybox="video" href="<?= $r_video['link'] ?>">
							<img src="<?= getResizedImageURL($r_video['thumbnail'], 760, 570) ?>">
							<span class="item-heading"><?= $r_video['title'] ?></span>
						</a>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<div class="clearfix"></div>
		<?php if ($num_video > $limit): ?>
			<div class="text-center">
				<button class="btn readmore-button">
					<span><?= $lang['column_15'] ?></span>
					<span><i class="fa fa-chevron-down"></i></span>
				</button>
			</div>
		<?php endif; ?>
	</div>
</section>