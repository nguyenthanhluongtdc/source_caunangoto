<?php if (@$url == "") $url = $value['video']; ?>
<?php if (count(explode("www.youtube.com", $url))>1 || count(explode("youtu.be", $url))>1): ?>
	<a data-fancybox href="<?= $url ?>">
		<img width="160px" height="120px" src="<?= getYoutubeImg($url) ?>">
	</a>
<?php elseif ($url != ""): ?>
	<a data-fancybox href="<?= getThumbnailUrl($url) ?>">
		<video width="160px" height="120px">
		  <source src="<?= getThumbnailUrl($url) ?>" type="video/mp4">
		</video>
	</a>
<?php else: ?>
	<a data-fancybox href="../assets/img/no-image.png">
		<img src="../assets/img/no-image.png">
	</a>
<?php endif ?>
<?php $url = ""; ?>