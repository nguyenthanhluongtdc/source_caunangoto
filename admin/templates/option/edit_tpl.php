<div class="well"><?=!empty($item) ? "Cập nhật" : "Thêm"?> <?= $attribute_enable[$_GET['type']]['title'] ?>&nbsp;
<?php if(@$item!=""):
	if(!in_array($item['type'], array( "color" ))): ?>
		<img src="<?=getThumbnailUrl($item['thumbnail'])?>">
	<?php else: ?>
		<input type="color" style="width: 30px; height: 30px; pointer-events: none;" value="<?= $item['thumbnail']!="" ? $item['thumbnail'] : "#000000" ?>">
	<?php endif; ?>
<?php endif; ?>
</div>

<form action="<?=preg_replace('/(&id=\d*)/', '', str_replace("&act=edit", "&act=save", getCurrentPageURL()))?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
	<input name="id" type="hidden" value="<?=@$item['id']?>">
	<input name="type" type="hidden" value="<?=@$type?>">
	<table class="table">
		<tr>
			<td colspan="2" class="text-left">
				<input name="savebtn" type="submit" class="btn btn-success" value="Lưu lại">
				<a href="<?=preg_replace('/(&id=\d*)/', '', str_replace("&act=edit", "&act=list", getCurrentPageURL()))?>" class="btn btn-danger">Hủy</a>
			</td>
		</tr>
		<!-- <?php/* if ($_GET['type'] == "couple"): ?>
			<?php $couple_nam = getItems(array("table" => "product", "id" => $item['male_id']));
			$couple_nu = getItems(array("table" => "product", "id" => $item['female_id'])); ?>
			<tr>
				<td class="col-xs-2">
					<label class="form-control">Giới tính nam:</label>
				</td>
				<td class="col-xs-10">
					<input class="couple-nam form-control" list="nam_list" type="text" placeholder="Chọn giới tính nam" style="max-width: 600px;" value="<?= @$couple_nam['title'] ?>">
					<input class="couple-nam-input required" name="male_id" type="hidden" title="Giới tính nam" value="<?= @$item['male_id'] ?>">
					<datalist id="nam_list">
						<?php
						$list = getItems(array("table" => "product", "condition" => "where find_in_set({$category_nam['id']}, gender_id) order by level desc, create_date desc"));
						foreach ($list as $val) {
							?>
							<option data-value="<?= $val['id'] ?>" data-text="<?= $val['title'] ?>" value="<?= $val['title'] ?>"><?= $val['serial'] ?>&nbsp;|&nbsp;<?= $val['serial_international'] ?></option>
							<?php
						}
						?>
					</datalist>
					<script>
						$(document).ready(function () {
							$("input.couple-nam").on("input", function () {
								if(!$(`#nam_list [value="`+this.value.trim()+`"]`).length)
									$("input.couple-nam-input").val("");
								else
									$("input.couple-nam-input").val($(`#nam_list [value="`+this.value.trim()+`"]`).attr("data-value"));
							});
							$("input.couple-nam").on("blur", function () {
								if(!$(`#nam_list [value="`+this.value.trim()+`"]`).length) {
									if(confirm("Vui lòng chọn sản phẩm có trong danh sách!"))
										setTimeout(function () {
											$("input.couple-nam").focus();
										}, 100);
									else
										setTimeout(function () {
											$("input.couple-nam").focus();
										}, 100);
								}
							});
						});
					</script>
				</td>
			</tr>
			<tr>
				<td class="col-xs-2">
					<label class="form-control">Giới tính nữ:</label>
				</td>
				<td class="col-xs-10">
					<input class="couple-nu form-control" list="nu_list" type="text" placeholder="Chọn giới tính nữ" style="max-width: 600px;" value="<?= @$couple_nu['title'] ?>">
					<input class="couple-nu-input required" name="female_id" type="hidden" title="Giới tính nữ" value="<?= @$item['female_id'] ?>">
					<datalist id="nu_list">
						<?php
						$list = getItems(array("table" => "product", "condition" => "where find_in_set({$category_nu['id']}, gender_id) order by level desc, create_date desc"));
						foreach ($list as $val) {
							?>
							<option data-value="<?= $val['id'] ?>" data-text="<?= $val['title'] ?>" value="<?= $val['title'] ?>"><?= $val['serial'] ?>&nbsp;-&nbsp;<?= $val['serial_international'] ?></option>
							<?php
						}
						?>
					</datalist>
					<script>
						$(document).ready(function () {
							$("input.couple-nu").on("input", function () {
								if(!$(`#nu_list [value="`+this.value.trim()+`"]`).length)
									$("input.couple-nu-input").val("");
								else
									$("input.couple-nu-input").val($(`#nu_list [value="`+this.value.trim()+`"]`).attr("data-value"));
							});
							$("input.couple-nu").on("blur", function () {
								if(!$(`#nu_list [value="`+this.value.trim()+`"]`).length) {
									if(confirm("Vui lòng chọn sản phẩm có trong danh sách!"))
										setTimeout(function () {
											$("input.couple-nu").focus();
										}, 100);
									else
										setTimeout(function () {
											$("input.couple-nu").focus();
										}, 100);
								}
							});
						});
					</script>
				</td>
			</tr>
		<?php endif */?> -->
		<?php foreach ($attribute_enable[$_GET['type']]['edit']['category'] as $k_attr => $v_attr): ?>
			<tr>
				<td class="col-xs-2">
					<label class="form-control"><?= $v_attr['title'] ?>:</label>
				</td>
				<td class="col-xs-10">
					<select name="<?= $k_attr ?>" class="form-control <?= $v_attr['required'] ?>" title="<?= $v_attr['title'] ?>">
						<option value="" selected>Chọn <?= mb_strtolower($v_attr['title'], "UTF-8") ?></option>
						<?php
						if (is_array($v_attr['list']))
							$row_item = $v_attr['list'];
						else
							$row_item = getItems(array("table" => $v_attr['table'], "condition" => $v_attr['condition']));
						foreach ($row_item as $val) {
							$tmp = explode(" / ", getCategoryPath($val['id']));
							array_pop($tmp);
							$tmp = implode(" / ", $tmp);
							?>
							<option value="<?=$val['id']?>" <?=$val['id']==$item[$k_attr] ? " selected" : ""?>>
								<?= $val['title'] ?><?= $tmp!="" ? "&nbsp;&nbsp;&nbsp;({$tmp})" : "" ?>
							</option>
							<?php
						}
						?>
					</select>
				</td>
			</tr>
		<?php endforeach ?>
		<?php if (@$attribute_enable[$_GET['type']]['edit']['thumbnail'] === true): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Hình hiện tại:</label></td>
				<td class="col-xs-10">
					<img id="thumb" src="<?=getThumbnailUrl($item['thumbnail'])?>" alt="Chưa có hình đại diện" onclick="openBrowser('#thumb', '#thumbnail');" style="cursor: pointer;">&nbsp;&nbsp;&nbsp;
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
		<?php if ($attribute_enable[$_GET['type']]['edit']['link'] == true): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Đường dẫn liên kết:</label></td>
				<td class="col-xs-10">
					<input name="link" type="text" class="form-control" placeholder="Nhập đường dẫn liên kết" title="Đường dẫn liên kết" value="<?= $_GET['link']!="null"?@$item['link']:"" ?>">
				</td>
			</tr>
		<?php endif ?>
		<tr>
			<td class="col-xs-2"><label class="form-control">
				Thứ tự hiển thị:
			</label></td>
			<td class="col-xs-10">
				<input name="index" type="number" min="0" max="10000" class="form-control" placeholder="Độ ưu tiên" title="Mức độ hiển thị ưu tiên" value="<?=empty($item)?"0":$item['index']?>">
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
		<?php foreach ($attribute_enable[$_GET['type']]['edit']['checkbox'] as $k_attr => $v_attr): ?>
			<tr>
				<td class="col-xs-2">
					<label class="form-control"><?= $v_attr['title'] ?></label>
					<div><input type="text" class="form-control checkbox-filter" data-target=".checkbox-container-<?= $k_attr ?>" placeholder="Tìm theo tên" value=""></div>
				</td>
				<td class="col-xs-10">
					<div class="well checkbox-container-<?= $k_attr ?>" style="padding: 5px; display: inline-block; width: 100%; padding: 5px 10px; min-height: 102px; max-height: 150px; overflow: auto;">
						<?php if (is_array($v_attr['list']))
							$row_item = $v_attr['list'];
						else
							$row_item = getItems(array("table" => $v_attr['table'], "condition" => $v_attr['condition']));
						foreach ($row_item as $va): ?>
							<div class="checkbox-container" style="float: left; line-height: 30px; height: 30px; margin-right: 15px;" data-text="<?= $va['title'] ?>">
								<input name="<?= $k_attr ?>[]" type="checkbox" id="<?= $k_attr ?>-<?= $va['id'] ?>" value="<?= $va['id'] ?>" style="float: left; width: 16px; height: 16px; margin-top: 7px; cursor: pointer;" <?= in_array($va['id'], explode(",", $item[$k_attr])) ? "checked" : "" ?>>
								<label style="font-size: 14px; margin-left: 3px; float: left; margin-bottom: 0; user-select: none; -webkit-user-select: none; cursor: pointer;" for="<?= $k_attr ?>-<?= $va['id'] ?>"><?= $va['title'] ?></label>
							</div>
						<?php endforeach ?>
					</div>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
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
		<?php foreach($row_language as $k_language => $r_language): $item = $row_translate[$k_language]; ?>
			<div id="<?= $r_language['uri'] ?>" role="tabpanel" class="tab-pane fade <?= $k_language==0 ? "in active" : "" ?>">
				<table class="table">
					<?php foreach ($attribute_enable[$_GET['type']]['edit']['input'] as $k_attr => $v_attr): ?>
						<tr>
							<td class="col-xs-2">
								<label class="form-control"><?= $v_attr ?>:</label>
							</td>
							<td class="col-xs-10">
								<input name="<?= $k_attr ?>_<?=$r_language['uri']?>" type="text" class="form-control" placeholder="Nhập <?= mb_strtolower($v_attr, "UTF-8") ?>" value="<?=@$item[$k_attr]?>" <?= $k_attr=="title" ? "autofocus" : "" ?>>
							</td>
						</tr>
					<?php endforeach ?>
					<?php foreach ($attribute_enable[$_GET['type']]['edit']['text'] as $k_attr => $v_attr): ?>
						<tr>
							<td class="col-xs-2">
								<label class="form-control"><?= $v_attr ?>:</label>
							</td>
							<td class="col-xs-10">
								<textarea name="<?= $k_attr ?>_<?=$r_language['uri']?>" class="form-control" rows="4" placeholder="Nhập <?= mb_strtolower($v_attr, "UTF-8") ?>"><?=@$item[$k_attr]?></textarea>
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
					<?php if ($_GET['uri_enable'] == "1"): ?>
						<tr>
							<td class="col-xs-2"><label class="form-control">Keyword (SEO):</label></td>
							<td class="col-xs-10">
								<input name="keyword_<?=$r_language['uri']?>" type="text" class="form-control" placeholder="Nhập keyword" title="Keyword <?=$r_language['title']?> có chức năng tăng mức độ SEO" value="<?=@$item['keyword']?>">
							</td>
						</tr>
						<tr>
							<td class="col-xs-2"><label class="form-control">Description (SEO):</label></td>
							<td class="col-xs-10">
								<input name="desc_<?=$r_language['uri']?>" type="text" class="form-control" placeholder="Nhập description" title="Description <?=$r_language['title']?> có chức năng tăng mức độ SEO" value="<?=@$item['desc']?>">
							</td>
						</tr>
						<tr>
							<td class="col-xs-2"><label class="form-control">H1 (SEO):</label></td>
							<td class="col-xs-10">
								<input name="h1_<?=$r_language['uri']?>" type="text" class="form-control" placeholder="Nhập H1" title="H1, H2, H3 <?=$r_language['title']?> có chức năng tăng mức độ SEO" value="<?=@$item['h1']?>">
							</td>
						</tr>
						<tr>
							<td class="col-xs-2"><label class="form-control">H2 (SEO):</label></td>
							<td class="col-xs-10">
								<input name="h2_<?=$r_language['uri']?>" type="text" class="form-control" placeholder="Nhập H2" title="H1, H2, H3 <?=$r_language['title']?> có chức năng tăng mức độ SEO" value="<?=@$item['h2']?>">
							</td>
						</tr>
						<tr>
							<td class="col-xs-2"><label class="form-control">H3 (SEO):</label></td>
							<td class="col-xs-10">
								<input name="h3_<?=$r_language['uri']?>" type="text" class="form-control" placeholder="Nhập H3" title="H1, H2, H3 <?=$r_language['title']?> có chức năng tăng mức độ SEO" value="<?=@$item['h3']?>">
							</td>
						</tr>
					<?php endif ?>
				</table>
			</div>
		<?php endforeach; ?>
	</div>
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
