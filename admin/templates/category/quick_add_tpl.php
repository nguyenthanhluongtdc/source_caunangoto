<?php $user = getUser(); ?>
<div class="well"><?=$title?></div>

<form action="<?=preg_replace('/(&id=\d*)/', '', str_replace("&act=quick-add", "&act=save", getCurrentPageURL()))?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
	<table class="table">
		<tr>
			<td colspan="2" class="text-left">
				<input name="id" type="hidden" value="<?=@$item['id']?>">
				<input type="hidden" name="quick_add" value="1">
				<input name="savebtn" type="submit" class="btn btn-success" value="Lưu lại">
				<a href="#" class="btn btn-danger" onclick="window.close();">Hủy</a>
				<?php if ($user['type'] != "master"): ?>
					<input type="hidden" name="lock" value="<?= intval(@$item['lock']) ?>">
					<input type="hidden" name="admin" value="<?= intval(@$item['admin']) ?>">
					<input name="checkbox_admin[]" type="hidden" value="<?= $item['checkbox_admin'] ?>">
				<?php endif ?>
			</td>
		</tr>
		<tr>
			<td class="col-xs-2"><label class="form-control">Loại danh mục:</label></td>
			<td class="col-xs-10">
				<select id="type" name="type" class="form-control required" title="Loại danh mục" <?= @$item['lock']=="1"&&$user['type']!="master" ? "disabled" : "" ?>>
					<option value="">-- Chưa phân loại --</option>
					<?php foreach ($row_type as $key => $value) { ?>
						<option value="<?=$key?>" <?= $key==@$item['type'] ? "selected" : "" ?>><?= $value ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<?php if (in_array("thumbnail", $checkbox_admin)): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Ảnh đại diện:<?= getSize(800, 500) ?></label></td>
				<td class="col-xs-10">
					<img id="thumb" src="<?=getThumbnailUrl($item['thumbnail'])?>" alt="Chưa có hình" onclick="openBrowser('#thumb', '#thumbnail');" style="cursor: pointer; height: calc(150px * 500 / 800) !important;">&nbsp;&nbsp;&nbsp;
					<button type="button" class="btn btn-primary" onclick="openBrowser('#thumb', '#thumbnail');">Chọn hình</button>&nbsp;&nbsp;&nbsp;
					<button type="button" class="btn btn-danger" onclick="$('#thumbnail').val('');$('#thumb').attr('src','');">Xóa hình hiện tại</button>
					<input id="thumbnail" name="thumbnail" type="hidden" value="<?=$item['thumbnail']?>">
				</td>
			</tr>
		<?php endif ?>
		<?php if (in_array("gallery", $checkbox_admin)): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Hình ảnh khác:<?= getSize(800, 500) ?></label></td>
				<td class="col-xs-10">
					<link rel="stylesheet" href="../assets/css/swiper.min.css">
					<script src="../assets/js/swiper.min.js"></script>
					<script src="../assets/js/jquery-ui.min.js"></script>
					<div id="imagelist-container" style="margin-bottom: 10px; overflow: hidden;">
						<?php if (@$_GET['id'] != ""): ?>
							<?php $row_image = getItems(array("table" => "category_extend", "condition" => "where type like 'image' and category_id like '{$_GET['id']}'")); ?>
							<?php if (is_array($row_image) && !empty($row_image)): ?>
								<?php foreach ($row_image as $r_image): ?>
									<div style="position: relative; float: left; margin-right: 5px; margin-bottom: 5px;">
										<span class='close' style='position: absolute; top: 8px; right: 8px; background: #fff; width: 20px; height: 20px; line-height: 18px; text-align: center; font-size: 16px; opacity: 1; user-select: none;' onclick='$(this).parent().remove(); refreshImageList();'>x</span>
										<img src='../<?= $r_image['thumbnail'] ?>' class='thumbnail' style='-width: 100px !important; height: 70px !important; background: transparent !important; margin-bottom: 0;'>
									</div>
								<?php endforeach ?>
							<?php endif ?>
						<?php endif ?>
					</div>
					<div class="clearfix"></div>
					<button type="button" class="btn btn-primary" onclick="openBrowser('folder', '#imagelist', function(fileListUrl) { for(i in fileListUrl) { addToImagList(fileListUrl[i]); } refreshImageList(); });">Thêm hình</button>&nbsp;&nbsp;&nbsp;
					<button type="button" class="btn btn-danger" onclick="$('#imagelist-container').html(''); refreshImageList();">Xóa tất cả</button>
					<div id="inputlist-container">
						<?php if (@$_GET['id'] != ""): ?>
							<?php $row_image = getItems(array("table" => "category_extend", "condition" => "where type like 'image' and category_id like '{$_GET['id']}'")); ?>
							<?php if (is_array($row_image) && !empty($row_image)): ?>
								<?php foreach ($row_image as $r_image): ?>
									<input type="hidden" name="image[]" value="<?= $r_image['thumbnail'] ?>">
								<?php endforeach ?>
							<?php endif ?>
						<?php endif ?>
					</div>
					<style>
						#imagelist-container .ui-state-highlight {
							float: left;
							width: 100px;
							height: 70px;
							margin-right: 5px;
							background: rgba(255,165,0,.2);
						}
					</style>
					<script>
						$(document).ready(function () {
							$("#imagelist-container").sortable({
								revert: true,
								placeholder: "ui-state-highlight",
								stop: function () {
									refreshImageList();
								}
							});
						});
						function addToImagList(url) {
							$("#imagelist-container").append(`<div style="position: relative; float: left; margin-right: 5px; margin-bottom: 5px;">
								<span class='close' style='position: absolute; top: 8px; right: 8px; background: #fff; box-shadow: 0 0 3px #000; width: 20px; height: 20px; line-height: 18px; text-align: center; font-size: 16px; opacity: 1; user-select: none;' onclick='$(this).parent().remove(); refreshImageList();'>x</span>
								<img src='../`+url+`' class='thumbnail' style='-width: 100px !important; height: 70px !important; background: transparent !important; margin-bottom: 0;'>
							</div>`);
						}
						function refreshImageList() {
							var urlList = [];
							$("#inputlist-container").html("");
							$("#imagelist-container img").each(function () {
								if(urlList.indexOf($(this).attr("src").replace(/\.\.\//g, "")) < 0) {
									$("#inputlist-container").append(`<input type="hidden" name="image[]" value="`+$(this).attr("src").replace(/\.\.\//g, "")+`">`);
									urlList.push($(this).attr("src").replace(/\.\.\//g, ""));
								}
							});
						}
					</script>
				</td>
			</tr>
		<?php endif ?>
		<?php if (count(explode("category_extend", @$item['checkbox_admin'])) > 1): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Danh sách mở rộng:</label></td>
				<td class="col-xs-10">
					<?php foreach ($attribute_enable['edit']['checkbox_admin']['list']['category_extend'] as $k_l => $v_l): ?>
						<?php if (in_array("category_extend_".$k_l, $checkbox_admin) && $_GET['id'] != ""): ?>
							<a href="javascript:;" class="btn btn-warning" onclick="extendPopup(<?= $_GET['id'] ?>, '<?= $k_l ?>')"><?= $v_l ?></a>
						<?php endif ?>
					<?php endforeach ?>
				</td>
			</tr>
			<script>
				function extendPopup(id=undefined, type=undefined) {
					if(id==undefined || id=="" || type=="" || type=="") return;
					var width = $(window).outerWidth() - 200;
					var height = $(window).outerHeight() - 50;
					var left = ($(window).outerWidth() - width) / 2;
					var top = ($(window).outerHeight() - height) / 2 + 20;
					var w = window.open("index.php?com=category-extend&type="+type+"&act=list&category_id="+id, "_blank", "titlebar=0,width="+width+",height="+height+",top="+top+",left="+left);
				}
			</script>
		<?php endif ?>
		<?php if (in_array("video", $checkbox_admin)): ?>
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
		<?php if (in_array("uri", $checkbox_admin)): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Đường dẫn cố định:</label></td>
				<td class="col-xs-10">
					<input name="uri" type="text" class="form-control" placeholder="Nhập đường dẫn cố định cho danh mục" value="<?= $_GET['uri']=="null" ? "" : @$item['uri'] ?>">
				</td>
			</tr>
		<?php endif ?>
		<tr>
			<td class="col-xs-2"><label class="form-control">Thứ tự hiển thị:</label></td>
			<td class="col-xs-10">
				<input name="index" type="number" min="0" max="10000" class="form-control" placeholder="Nhập thứ tự" title="Thứ tự hiển thị trên trang chủ" value="<?=@$item!="" ? $item['index'] : "0"?>">
			</td>
		</tr>
		<tr>
			<td class="col-xs-2"><label class="form-control">Trạng thái hiển thị:</label></td>
			<td class="col-xs-10">
				<select name="enable" class="form-control" title="Cho phép hiển thị và truy cập vào sản phẩm">
					<option value="1"<?=in_array($item['enable'], array(NULL, 1))?" selected":""?>>Có</option>
					<option value="0"<?=!in_array($item['enable'], array(NULL, 1))?" selected":""?>>Không</option>
				</select>
			</td>
		</tr>
		<?php foreach ($attribute_enable['edit']['popular'] as $k_popular => $v_popular): ?>
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
		<?php if ($user['type'] == "master"): ?>
			<!-- <tr>
				<td class="col-xs-2"><label class="form-control">Hiện trên menu trái:</label></td>
				<td class="col-xs-10">
					<select name="admin" class="form-control" title="Hiện trên menu trái">
						<option value="1"<?//=in_array($item['admin'], array(1))?" selected":""?>>Có</option>
						<option value="0"<?//=!in_array($item['admin'], array(1))?" selected":""?>>Không</option>
					</select>
				</td>
			</tr> -->
			<tr>
				<td class="col-xs-2"><label class="form-control">Khóa danh mục:</label></td>
				<td class="col-xs-10">
					<select name="lock" class="form-control" title="Khóa danh mục này (master only)">
						<option value="1"<?=in_array($item['lock'], array(1))?" selected":""?>>Có</option>
						<option value="0"<?=!in_array($item['lock'], array(1))?" selected":""?>>Không</option>
					</select>
				</td>
			</tr>
		<?php endif ?>
		<?php foreach ($attribute_enable['edit']['category'] as $k_attr => $v_attr): ?>
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
		<?php foreach ($attribute_enable['edit']['checkbox'] as $k_attr => $v_attr): ?>
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
		<?php if ($user['type'] == "master"): ?>
				<tr>
					<td class="col-xs-2">
						<label class="form-control"><?= $attribute_enable['edit']['checkbox_admin']['title'] ?></label>
						<div><input type="text" class="form-control checkbox-filter" data-target=".checkbox-admin-container" placeholder="Lọc theo tên" value=""></div>
					</td>
					<td class="col-xs-10">
						<div class="well checkbox-admin-container" style="padding: 5px; display: inline-block; width: 100%; padding: 5px 10px; min-height: 102px; max-height: 150px; overflow: auto;">
							<?php foreach ($attribute_enable['edit']['checkbox_admin']['list'] as $ka => $va): ?>
								<?php if (is_array($va)): ?>
									<?php foreach ($va as $ke => $ve): ?>
										<div class="checkbox-container" style="float: left; line-height: 30px; height: 30px; margin-right: 15px;" data-text="<?= $ve ?>">
											<input name="checkbox_admin[]" type="checkbox" id="checkbox-<?= $ka."_".$ke ?>" value="<?= $ka."_".$ke ?>" style="float: left; width: 16px; height: 16px; margin-top: 7px; cursor: pointer;" <?= in_array($ka."_".$ke, explode(",", $item['checkbox_admin'])) ? "checked" : "" ?>>
											<label style="font-size: 14px; margin-left: 3px; float: left; margin-bottom: 0; user-select: none; -webkit-user-select: none; cursor: pointer;" for="checkbox-<?= $ka."_".$ke ?>"><?= $ve ?></label>
										</div>
									<?php endforeach ?>
								<?php else: ?>
									<div class="checkbox-container" style="float: left; line-height: 30px; height: 30px; margin-right: 15px;" data-text="<?= $va ?>">
										<input name="checkbox_admin[]" type="checkbox" id="checkbox-<?= $ka ?>" value="<?= $ka ?>" style="float: left; width: 16px; height: 16px; margin-top: 7px; cursor: pointer;" <?= in_array($ka, explode(",", $item['checkbox_admin'])) ? "checked" : "" ?>>
										<label style="font-size: 14px; margin-left: 3px; float: left; margin-bottom: 0; user-select: none; -webkit-user-select: none; cursor: pointer;" for="checkbox-<?= $ka ?>"><?= $va ?></label>
									</div>
								<?php endif ?>
							<?php endforeach ?>
						</div>
					</td>
				</tr>
		<?php endif ?>
	</table>
	<script>
		$(document).ready(function () {
			$('input[name="row"]').on("input", function () {
				if(Number(this.value) > 1)
					$('select[name="slide"]').val("0");
			});
		});
	</script>
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
		<?php foreach($row_language as $k_language => $r_language): $it = $item; $item = $row_translate[$k_language]; if(trim($item['title'])=="") $item['title']=$it['title'] ?>
			<div id="<?= $r_language['uri'] ?>" role="tabpanel" class="tab-pane fade <?= $k_language==0 ? "in active" : "" ?>">
				<table class="table">
					<?php foreach ($attribute_enable['edit']['input'] as $k_attr => $v_attr):
						if(!in_array($k_attr, $checkbox_admin)) continue; ?>
						<tr>
							<td class="col-xs-2">
								<label class="form-control"><?= $v_attr ?>:</label>
							</td>
							<td class="col-xs-10">
								<input name="<?= $k_attr ?>_<?=$r_language['uri']?>" type="text" class="form-control" placeholder="Nhập <?= mb_strtolower($v_attr, "UTF-8") ?>" value="<?=@$item[$k_attr]?>">
							</td>
						</tr>
					<?php endforeach ?>
					<?php foreach ($attribute_enable['edit']['text'] as $k_attr => $v_attr):
						if(!in_array($k_attr, $checkbox_admin)) continue; ?>
						<tr>
							<td class="col-xs-2">
								<label class="form-control"><?= $v_attr ?>:</label>
							</td>
							<td class="col-xs-10">
								<textarea id="<?= $k_attr ?>_<?=$r_language['uri']?>" name="<?= $k_attr ?>_<?=$r_language['uri']?>" rows="4" class="form-control" placeholder="Nhập <?= mb_strtolower($v_attr, "UTF-8") ?>"><?=$item[$k_attr]?></textarea>
							</td>
						</tr>
					<?php endforeach ?>
					<?php foreach ($attribute_enable['edit']['editor'] as $k_attr => $v_attr):
						if(!in_array($k_attr, $checkbox_admin)) continue; ?>
						<tr>
							<td class="col-xs-2">
								<label class="form-control"><?= $v_attr ?>:</label>
							</td>
							<td class="col-xs-10">
								<textarea id="<?= $k_attr ?>_<?=$r_language['uri']?>" name="<?= $k_attr ?>_<?=$r_language['uri']?>" class="editor"><?=$item[$k_attr]?></textarea>
							</td>
						</tr>
					<?php endforeach ?>
					<?php if (@$it['enable'] > 0): ?>
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
					<?php else: ?>
						<input type="hidden" name="keyword_<?= $r_language['uri'] ?>" value="<?=@$item['keyword']?>">
						<input type="hidden" name="description_<?= $r_language['uri'] ?>" value="<?=@$item['description']?>">
						<input type="hidden" name="h1_<?= $r_language['uri'] ?>" value="<?=@$item['h1']?>">
						<input type="hidden" name="h2_<?= $r_language['uri'] ?>" value="<?=@$item['h2']?>">
						<input type="hidden" name="h3_<?= $r_language['uri'] ?>" value="<?=@$item['h3']?>">
					<?php endif ?>
				</table>
			</div>
		<?php endforeach; ?>
	</div>
	<table class="table">
		<tr>
			<td colspan="2" class="text-center">
				<input name="savebtn" type="submit" class="btn btn-success" value="Lưu lại">
				<a href="#" class="btn btn-danger" onclick="window.close();">Hủy</a>
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
	body,
	.container {
		min-width: 100% !important;
	}
</style>
