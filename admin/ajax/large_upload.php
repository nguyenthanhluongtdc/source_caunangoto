<?php
session_start();
@define ( '_template' , '../../templates/');
@define ( '_source' , '../../sources/');
@define ( '_lib' , '../../lib/');
include_once _lib."config.php";
include_once _lib."class.database.php";
// include_once _lib."pagination.php";
include_once _lib."functions.php";
$db = new database($config['database']);
$logged = @$_COOKIE['user']['username'] != "";
function verbose($ok=1,$info=""){
	if ($ok==0) { http_response_code(400); }
	die(json_encode(array("ok"=>$ok, "info"=>$info)));
}
if ($logged) {
	if (empty($_FILES) || $_FILES['file']['error']) {
		verbose(0, "Failed to move uploaded file.");
	}
	$filePath = "../../upload/tai-len";
	if (!is_dir($filePath)) {
		if (!mkdir($filePath, 0777, true)) {
			verbose(0, "Failed to create $filePath");
		}
	}
	$fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : $_FILES["file"]["name"];
	$filePath = $filePath . DIRECTORY_SEPARATOR . $fileName;
	while (is_file($filePath)) {
		$filePath = "../../upload/tai-len" . DIRECTORY_SEPARATOR . time() . "-" . $fileName;
	}
	$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
	$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
	$out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
	if ($out) {
		$in = @fopen($_FILES['file']['tmp_name'], "rb");
		if ($in) {
			while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
		} else {
			verbose(0, "Failed to open input stream");
		}
		@fclose($in);
		@fclose($out);
		@unlink($_FILES['file']['tmp_name']);
	} else {
		verbose(0, "Failed to open output stream");
	}
	if (!$chunks || $chunk == $chunks - 1) {
		rename("{$filePath}.part", $filePath);
	}
	verbose(1, "Upload OK");
}
else {
	verbose(0, "Failed to login");
}
?>