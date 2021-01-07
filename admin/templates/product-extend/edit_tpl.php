<div class="well"><?= $_GET['id']!="" ? "Cập nhật" : "Thêm" ?> <?= $attribute_enable[$_GET['type']]['title'] ?> mở rộng <?= @$item['title']!="" ? "'".$item['title']."'" : (@$item['thumbnail']!="" ? "<img src='".getThumbnailUrl($item['thumbnail'])."' style='max-width: unset !important; height:40px !important;'>" : "") ?> (sản phẩm '<?= !empty($product) ? implode(" ", array_slice(explode(" ", $product['title']), 0, 3)) . (substr_count($product['title'], " ")>2 ? "..." : "") : "" ?>')
</div>

<form action="<?=preg_replace('/(&id=\d*)/', '', str_replace("&act=edit", "&act=save", getCurrentPageURL()))?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
	<table class="table">
		<tr>
			<td colspan="2" class="text-left">
				<input name="id" type="hidden" value="<?=@$item['id']?>">
				<input name="type" type="hidden" value="<?=@$type?>">
				<input name="product_id" type="hidden" value="<?=@$product['id']?>">
				<input name="savebtn" type="submit" class="btn btn-success" value="Lưu lại">
				<a href="<?=preg_replace('/(&id=\d*)/', '', str_replace("&act=edit", "&act=list", getCurrentPageURL()))?>" class="btn btn-danger">Hủy</a>
			</td>
		</tr>
		<?php if ($attribute_enable[$_GET['type']]['edit']['thumbnail'] == true): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Hình hiện tại:<?//= getSize(800, 500) ?></label></td>
				<td class="col-xs-10">
					<img id="thumb" src="<?=getThumbnailUrl($item['thumbnail'])?>" alt="Chưa có hình đại diện" onclick="openBrowser('#thumb', '#thumbnail');" style="cursor: pointer; -height: calc(150px * 500 / 800) !important;">&nbsp;&nbsp;&nbsp;
					<button type="button" class="btn btn-primary" onclick="openBrowser('#thumb', '#thumbnail');">Chọn hình</button>&nbsp;&nbsp;&nbsp;
					<button type="button" class="btn btn-danger" onclick="$('#thumbnail').val('');$('#thumb').attr('src','');">Xóa hình hiện tại</button>
					<input id="thumbnail" name="thumbnail" type="hidden" value="<?=$item['thumbnail']?>">
				</td>
			</tr>
		<?php endif ?>
		<?php if ($attribute_enable[$_GET['type']]['edit']['video'] == true): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Video (nếu có):</label></td>
				<td class="col-xs-10">
					<div>
						<video id="video" src="<?= getThumbnailUrl($item['video']) ?>" controls style="<?= getYoutubeId($item['video'])!==false ? "display: none;" : "display: block;"; ?> margin-bottom: 5px; height: 150px;"></video>
						<iframe id="video-youtube" src="<?= getYoutubeId($item['video'])!==false ? getYoutubeEmbed($item['video']) : ""; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="<?= getYoutubeId($item['video'])!==false ? "display: block;" : "display: none;"; ?> margin-bottom: 5px; height: 150px;"></iframe>
					</div>
					<button type="button" class="btn btn-primary" onclick="openBrowser('#video', '#video_', null, function(fileUrl) { $('#video').show(); $('#video-youtube').attr('src', ''); $('#video-youtube').hide(); });">Chọn video</button>&nbsp;&nbsp;&nbsp;
					<button type="button" class="btn btn-primary" onclick="if(lnk=prompt('Nhập link Youtube (Ví dụ: https://www.youtube.com/watch?v=9GoaQJyCjMM)')) { $('#video_').val(lnk); $('#video-youtube').attr('src', lnk.replace('/watch?v=', '/embed/')); $('#video-youtube').show(); $('#video').attr('src', ''); $('#video').hide(); }">Nhập link Youtube</button>&nbsp;&nbsp;&nbsp;
					<button type="button" class="btn btn-danger" onclick="$('#video_').val(''); $('#video').attr('src',''); $('#video-youtube').attr('src',''); $('#video').show(); $('#video-youtube').hide();">Xóa video hiện tại</button>
					<input id="video_" name="video" type="hidden" value="<?=$item['video']?>">
				</td>
			</tr>
			<tr>
				<td class="col-xs-2"><label class="form-control">Tải file lớn (trên 8MB):</label></td>
				<td class="col-xs-10">
					<div id="filelist" data-ext="mp4" style="margin-bottom: 5px;"></div>
					<div id="container">
						<a id="pickfiles" href="javascript:;" class="btn btn-primary">Chọn file từ máy tính</a>&nbsp;&nbsp;&nbsp;
						<a id="uploadfiles" href="javascript:;" class="btn btn-warning">Tải file lên máy chủ</a>
					</div>
				</td>
			</tr>
		<?php endif ?>
		<tr>
			<td class="col-xs-2"><label class="form-control">Thứ tự hiển thị:</label></td>
			<td class="col-xs-10">
				<input name="index" type="number" min="0" max="10000" class="form-control" placeholder="Nhập thứ tự hiển thị" title="Thứ tự hiển thị của hình ảnh" value="<?=empty($item)?"0":$item['index']?>">
			</td>
		</tr>
		<tr>
			<td class="col-xs-2"><label class="form-control">Trạng thái hiển thị:</label></td>
			<td class="col-xs-10">
				<select name="enable" class="form-control" title="Cho phép hiển thị">
					<option value="1"<?=in_array($item['enable'], array(NULL, 1))?" selected":""?>>Có</option>
					<option value="0"<?=!in_array($item['enable'], array(NULL, 1))?" selected":""?>>Không</option>
				</select>
			</td>
		</tr>
		<?php foreach ($attribute_enable[$_GET['type']]['edit']['popular'] as $k_popular => $v_popular): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control"><?= $v_popular ?>:</label></td>
				<td class="col-xs-10">
					<select name="<?= $k_popular ?>" class="form-control">
						<option value="1"<?=in_array($item[$k_popular], array(1))?" selected":""?>>Có</option>
						<option value="0"<?=!in_array($item[$k_popular], array(1))?" selected":""?>>Không</option>
					</select>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
	<?php if ((is_array($attribute_enable[$_GET['type']]['edit']['input']) && !empty($attribute_enable[$_GET['type']]['edit']['input'])) || (is_array($attribute_enable[$_GET['type']]['edit']['editor']) && !empty($attribute_enable[$_GET['type']]['edit']['editor']))): ?>
		<?php if (is_array($row_language) && count($row_language)>1): ?>
			<ul class="nav nav-tabs" role="tablist">
				<?php foreach($row_language as $k_language => $r_language): ?>
					<li role="presentation" <?= $k_language==0 ? 'class="active"' : "" ?>>
						<a href="#<?= $r_language['uri'] ?>" aria-controls="<?= $r_language['uri'] ?>" role="tab" data-toggle="tab">
							<img src="<?= getThumbnailUrl($r_language['thumbnail']) ?>" style="height: 30px;">
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif ?>
		<div class="tab-content">
			<?php foreach($row_language as $k_language => $r_language):
				$item = $row_translate[$k_language]; ?>
				<div id="<?= $r_language['uri'] ?>" role="tabpanel" class="tab-pane fade <?= $k_language==0 ? "in active" : "" ?>">
					<table class="table">
						<?php foreach ($attribute_enable[$_GET['type']]['edit']['input'] as $k_attr => $v_attr): ?>
							<tr>
								<td class="col-xs-2">
									<label class="form-control"><?= $v_attr ?>:</label>
								</td>
								<td class="col-xs-10">
									<input name="<?= $k_attr ?>_<?=$r_language['uri']?>" type="text" class="form-control" placeholder="Nhập <?= mb_strtolower($v_attr, "UTF-8") ?>" value="<?=@$item[$k_attr]?>">
								</td>
							</tr>
						<?php endforeach ?>
						<?php foreach ($attribute_enable[$_GET['type']]['edit']['text'] as $k_attr => $v_attr): ?>
							<tr>
								<td class="col-xs-2">
									<label class="form-control"><?= $v_attr ?>:</label>
								</td>
								<td class="col-xs-10">
									<textarea name="<?= $k_attr ?>_<?=$r_language['uri']?>" rows="4" class="form-control" placeholder="Nhập <?= mb_strtolower($v_attr, "UTF-8") ?>"><?=$item[$k_attr]?></textarea>
								</td>
							</tr>
						<?php endforeach ?>
						<?php foreach ($attribute_enable[$_GET['type']]['edit']['editor'] as $k_attr => $v_attr): ?>
							<tr>
								<td class="col-xs-2">
									<label class="form-control"><?= $v_attr ?>:</label>
								</td>
								<td class="col-xs-10">
									<textarea id="<?= $k_attr ?>_<?=$r_language['uri']?>" name="<?= $k_attr ?>_<?=$r_language['uri']?>" class="editor"><?=$item[$k_attr]?></textarea>
								</td>
							</tr>
						<?php endforeach ?>
					</table>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif ?>
	<table class="table">
		<tr>
			<td colspan="2" class="text-center">
				<input name="savebtn" type="submit" class="btn btn-success" value="Lưu lại">
				<a href="<?=preg_replace('/(&id=\d*)/', '', str_replace("&act=edit", "&act=list", getCurrentPageURL()))?>" class="btn btn-danger">Hủy</a>
			</td>
		</tr>
	</table>
</form>

<style type="text/css">
.well {
	font-size: 30px;
	color: darkred;
	font-weight: bold;
	text-align: center;
}
.table td {
	border: none !important;
}

label.form-control {
	border: none;
	box-shadow: none;
}

input[type='file'], select {
	width: auto !important;
}

abbr {
	color: gray;
}
</style>
