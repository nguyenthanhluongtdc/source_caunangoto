<?php
$src = "../".$_GET['src'];
$w_r = $_GET['w'];
$h_r = $_GET['h'];
$maxWidth = 1366;
$img = imagecreatefromstring(file_get_contents($src));
$size = getimagesize($src);
if (function_exists("exif_read_data")) {
	$exif = exif_read_data($src);
	switch ($exif['Orientation']) {
		case 2:
			imageflip($img, IMG_FLIP_HORIZONTAL);
			break;
		case 3:
			$img = imagerotate($img, 180, 0);
			break;
		case 4:
			imageflip($img, IMG_FLIP_VERTICAL);
			break;
		case 5:
			$img = imagerotate($img, -90, 0);
			imageflip($img, IMG_FLIP_HORIZONTAL);
			$t = $size[0];
			$size[0] = $size[1];
			$size[1] = $t;
			break;
		case 6:
			$img = imagerotate($img, -90, 0);
			$t = $size[0];
			$size[0] = $size[1];
			$size[1] = $t;
			break;
		case 7:
			$img = imagerotate($img, 90, 0);
			imageflip($img, IMG_FLIP_HORIZONTAL);
			$t = $size[0];
			$size[0] = $size[1];
			$size[1] = $t;
			break;
		case 8:
			$img = imagerotate($img, 90, 0);
			$t = $size[0];
			$size[0] = $size[1];
			$size[1] = $t;
			break;
	}
}
if ($w_r == 0) {
	if ($h_r > 0)
		$w_r = floatval($h_r) * $size[0] / $size[1];
	else {
		$w_r = $size[0];
		$h_r = $size[1];
	}
}
elseif ($h_r == 0)
	$h_r = floatval($w_r) * $size[1] / $size[0];
switch ($_GET['r']) {
	case "0": // Giữ kích thước hình gốc
		$w_n = floatval($size[1]) * $w_r / $h_r;
		$h_n = floatval($size[0]) * $h_r / $w_r;
		break;
	case "1": // Theo kích thước quy định
		$w_n = $w_r;
		$h_n = $h_r;
		break;
	default: // Giữ kích thước hình cũ với max-width = 1366px;
		$w_n = min(floatval($size[1]) * $w_r / $h_r, $maxWidth);
		$h_n = floatval(min($size[0], $maxWidth)) * $h_r / $w_r;
		break;
}
if ($w_n > floatval($size[0])) {
	$h = $h_n;
	$w = $h_n * $w_r / $h_r;
}
else {
	$w = $w_n;
	$h = $w_n * $h_r / $w_r;
}
$tw = floatval($size[1]) * $w / $h;
$ttw = floatval($h) * $size[0] / $size[1];
$th = floatval($size[0]) * $h / $w;
$tth = floatval($w) * $size[1] / $size[0];
$img_dst = imagecreatetruecolor($w, $h);
imagesavealpha($img_dst, true);
imagealphablending($img_dst, false);
imagefill($img_dst, 0, 0, imagecolorallocatealpha($img_dst, 0, 0, 0, 127));
switch (@$_GET['space']) {
	case "1": // Thu gọn hình với nền trong suốt
		if ($tw < $size[0])
			imagecopyresampled($img_dst, $img, 0, -($tth - $h)/2, 0, 0, $w, $tth, $size[0], $size[1]);
		else
			imagecopyresampled($img_dst, $img, -($ttw - $w)/2, 0, 0, 0, $ttw, $h, $size[0], $size[1]);
		break;
	case "2": // Thu gọn hình với nền trắng
		imagefill($img_dst, 0, 0, imagecolorallocatealpha($img_dst, 255, 255, 255, 0));
		if ($tw < $size[0])
			imagecopyresampled($img_dst, $img, 0, -($tth - $h)/2, 0, 0, $w, $tth, $size[0], $size[1]);
		else
			imagecopyresampled($img_dst, $img, -($ttw - $w)/2, 0, 0, 0, $ttw, $h, $size[0], $size[1]);
		break;
	default: // Cắt hình
		if ($tw > $size[0])
			imagecopyresampled($img_dst, $img, 0, -($tth - $h)/2, 0, 0, $w, $tth, $size[0], $size[1]);
		else
			imagecopyresampled($img_dst, $img, -($ttw - $w)/2, 0, 0, 0, $ttw, $h, $size[0], $size[1]);
		break;
}
$basename = explode(".", basename($src));
$end = array_pop($basename);
array_push($basename, $_GET['w']."x".$_GET['h']."_".@$_GET['r']."_".@$_GET['space']."_".filesize($src));
$basename = implode("_", $basename).".png";
$foldername = explode("upload/", $src);
$foldername = $foldername[0];
if (!is_dir("{$foldername}upload/.cache")) {
	mkdir("{$foldername}upload/.cache", 0777);
	chmod("{$foldername}upload/.cache", 0777);
}
imagepng($img_dst, "{$foldername}upload/.cache/".$basename);
header("Content-type: image/png");
imagepng($img_dst);
imagedestroy($img_dst);
?>