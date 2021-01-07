<div class="well"><?= !empty($item) ? "Cập nhật" : "Thêm" ?> sản phẩm <?=!empty($item) ? "'" . subString($item['title'], 0, 5) . "'" : ""?></div>

<form action="<?=preg_replace('/(&id=\d*)/', '', str_replace("&act=edit", "&act=save", getCurrentPageURL()))?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
	<table class="table">
		<tr>
			<td colspan="2" class="text-left">
				<input name="id" type="hidden" value="<?=@$item['id']?>">
				<input name="savebtn" type="submit" class="btn btn-success" value="Lưu lại">
				<a href="<?=preg_replace('/(&id=\d*)/', '', str_replace("&act=edit", "&act=list", getCurrentPageURL()))?>" class="btn btn-danger">Hủy</a>
			</td>
		</tr>
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
		<?php if ($attribute_enable['edit']['thumbnail'] === true): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Ảnh đại diện:<?= getSize(360,380) ?></label></td>
				<td class="col-xs-10">
					<img id="thumb" src="<?=getThumbnailUrl($item['thumbnail'])?>" alt="Chưa có hình" onclick="openBrowser('#thumb', '#thumbnail');" style="cursor: pointer; height: calc(150px * 500 / 800) !important;">&nbsp;&nbsp;&nbsp;
					<button type="button" class="btn btn-primary" onclick="openBrowser('#thumb', '#thumbnail');">Chọn hình</button>&nbsp;&nbsp;&nbsp;
					<button type="button" class="btn btn-danger" onclick="$('#thumbnail').val('');$('#thumb').attr('src','');">Xóa hình hiện tại</button>
					<input id="thumbnail" name="thumbnail" type="hidden" value="<?=$item['thumbnail']?>">
				</td>
			</tr>
		<?php endif ?>
		<?php if ($attribute_enable['edit']['gallery'] === true): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Hình ảnh khác:<?= getSize(360, 380) ?></label></td>
				<td class="col-xs-10">
					<link rel="stylesheet" href="../assets/css/swiper.min.css">
					<script src="../assets/js/swiper.min.js"></script>
					<script src="../assets/js/jquery-ui.min.js"></script>
					<div id="imagelist-container" style="margin-bottom: 10px; overflow: hidden;">
						<?php if (@$_GET['id'] != ""): ?>
							<?php $row_image = getItems(array("table" => "product_extend", "condition" => "where type like 'image' and product_id like '{$_GET['id']}'")); ?>
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
							<?php $row_image = getItems(array("table" => "product_extend", "condition" => "where type like 'image' and product_id like '{$_GET['id']}'")); ?>
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
		<?php if ($attribute_enable['edit']['video'] === true): ?>
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
		<?php if (is_array($attribute_enable['edit']['extend']) && !empty($attribute_enable['edit']['extend']) && $_GET['id']!=""): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Danh sách mở rộng:</label></td>
				<td class="col-xs-10">
					<?php foreach ($attribute_enable['edit']['extend'] as $k_l => $v_l): ?>
						<a href="javascript:;" class="btn btn-warning" onclick="extendPopup(<?= $_GET['id'] ?>, '<?= $k_l ?>')"><?= $v_l ?></a>
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
					var w = window.open("index.php?com=product-extend&type="+type+"&act=list&product_id="+id, "_blank", "titlebar=0,width="+width+",height="+height+",top="+top+",left="+left);
				}
			</script>
		<?php endif ?>
		<?php if ($attribute_enable['edit']['uri'] == true): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Đường dẫn cố định:</label></td>
				<td class="col-xs-10">
					<input name="uri" type="text" class="form-control" placeholder="Nhập đường dẫn cố định cho sản phẩm" title="Đường dẫn cố định cho sản phẩm" value="<?= $_GET['uri']!="null"?@$item['uri']:"" ?>">
				</td>
			</tr>
		<?php endif ?>
		<?php if ($attribute_enable['edit']['serial'] == true): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Mã sản phẩm:</label></td>
				<td class="col-xs-10">
					<input name="serial" type="text" class="form-control" placeholder="Nhập mã sản phẩm" value="<?= @$item['serial'] ?>">
				</td>
			</tr>
		<?php endif ?>
		<?php if ($attribute_enable['edit']['status'] == true): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Tình trạng:</label></td>
				<td class="col-xs-10">
					<select name="status" class="form-control" title="Tình trạng sản phẩm">
						<option value="1"<?=in_array(@$item['status'], array("", 1, "1"))?" selected":""?>>Còn hàng</option>
						<option value="0"<?=!in_array(@$item['status'], array("", 1, "1"))?" selected":""?>>Hết hàng</option>
					</select>
				</td>
			</tr>
		<?php endif ?>
		<?php if ($attribute_enable['edit']['province'] == true): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Tỉnh - Thành phố:</label></td>
				<td class="col-xs-10">
					<select class="form-control fleft" name="province" data-table="district" data-target="select[name='district']" onchange="load_sel(this);">
						<option value="" selected disabled>Chọn Tỉnh - Thành phố</option>
						<?php foreach ($row_province as $r_province): ?>
							<option value="<?=$r_province['id']?>" <?= $r_province['id']==@$item['province'] ? "selected" : "" ?>><?=$r_province['type']?> <?=$r_province['name']?></option>
						<?php endforeach ?>
					</select>
			</tr>
		<?php endif ?>
		<?php if ($attribute_enable['edit']['district'] == true): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Quận - Huyện:</label></td>
				<td class="col-xs-10">
					<select class="form-control fleft" name="district" data-table="ward" data-target="select[name='ward']" onchange="load_sel(this);" data-default="<option value='' selected disabled>Chọn Quận - Huyện</option>">
						<option value="" selected disabled>Chọn Quận - Huyện</option>
						<?php foreach ($row_district as $r_district): ?>
							<option value="<?=$r_district['id']?>" <?= $r_district['id']==@$item['district'] ? "selected" : "" ?>><?=$r_district['type']?> <?=$r_district['name']?></option>
						<?php endforeach ?>
					</select>
			</tr>
		<?php endif ?>
		<?php if ($attribute_enable['edit']['ward'] == true): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Phường - Xã:</label></td>
				<td class="col-xs-10">
					<select class="form-control fleft" name="ward" data-default="<option value='' selected disabled>Chọn Phường - Xã</option>">
						<option value="" selected disabled>Chọn Phường - Xã</option>
						<?php foreach ($row_ward as $r_ward): ?>
							<option value="<?=$r_ward['id']?>" <?= $r_ward['id']==@$item['ward'] ? "selected" : "" ?>><?=$r_ward['type']?> <?=$r_ward['name']?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
		<?php endif ?>
		<?php if ($attribute_enable['edit']['address'] == true): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Vận chuyển:</label></td>
				<td class="col-xs-10">
					<input name="address" type="text" class="form-control" placeholder="Nhập địa chỉ" value="<?=$item['address']?>">
				</td>
			</tr>
		<?php endif ?>
		<?php if ($attribute_enable['edit']['level'] == true): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Độ ưu tiên:</label></td>
				<td class="col-xs-10">
					<input name="level" type="number" min="0" max="10000" class="form-control" placeholder="Độ ưu tiên" title="Mức độ hiển thị ưu tiên" value="<?=empty($item)?"0":$item['level']?>">
				</td>
			</tr>
		<?php endif ?>
		<tr>
			<td class="col-xs-2"><label class="form-control">Trạng thái hiển thị:</label></td>
			<td class="col-xs-10">
				<select name="enable" class="form-control" title="Cho phép hiển thị và truy cập vào sản phẩm">
					<option value="1"<?=in_array(@$item['enable'], array("", 1, "1"))?" selected":""?>>Có</option>
					<option value="0"<?=!in_array(@$item['enable'], array("", 1, "1"))?" selected":""?>>Không</option>
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
		<?php if ($attribute_enable['edit']['combo'] == true): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Ưu đãi khi mua sản phẩm mới:</label></td>
				<td class="col-xs-10">
					<?php $arr = get_object_vars(json_decode($item['combo']));
					$k_arr = array_keys($arr);
					$p_arr = array_values($arr); ?>
					<?php for ($i=0; $i < $row_promotion_items['count']; $i++) {
						$r_p = getItems(array("table" => "product", "id" => $k_arr[$i])); ?>
						<div style="width: calc(100% / <?= $row_promotion_items['count'] ?> - 5px); margin-right: calc(15px / <?= $row_promotion_items['count'] - 1 ?>); float: left;">
							<input type="hidden" name="combo_id[]" value="<?= @$k_arr[$i] ?>">
							<input list="combo_list_<?= $i+1 ?>" type="text" class="form-control combo_list" placeholder="Chọn ưu đãi" style="width: 100% !important; margin-bottom: 5px;" value="<?= @$r_p['title'] ?>">
							<datalist id="combo_list_<?= $i+1 ?>">
								<option value="-- Chọn phụ kiện ưu đãi --"></option>
								<?php foreach ($row_promotion_items['items'] as $r_p): ?>
									<option value="<?= $r_p['title'] ?>"><?= $r_p['id'] ?></option>
								<?php endforeach ?>
							</datalist>
							<input class="form-control" type="number" name="combo_percent[]" step="1" min="1" max="100%" placeholder="Phần trăm ưu đãi" value="<?= @$p_arr[$i] ?>">
						</div>
					<?php } ?>
					<script>
						$(document).ready(function () {
							$(".combo_list").change(function () {
								$(this).prev().val($(this).next().find('option[value="'+this.value+'"]').html());
							});
							<?php
							foreach ($arr as $k => $v): if (intval($k) == 0 || floatval($v) == 0) continue; ?>
							<?php endforeach ?>
						});
					</script>
				</td>
			</tr>
		<?php endif ?>
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
		<?php foreach($row_language as $k_language => $r_language): $it=$item; $item = $row_translate[$k_language]; if(trim($item['title'])=="") $item['title']=$it['title'] ?>
			<div id="<?= $r_language['uri'] ?>" role="tabpanel" class="tab-pane fade <?= $k_language==0 ? "in active" : "" ?>">
				<table class="table">
					<tr>
						<td class="col-xs-2"><label class="form-control">Tên sản phẩm:</label></td>
						<td class="col-xs-10">
							<input name="title_<?=$r_language['uri']?>" type="text" class="form-control <?= $k_language==0 ? "required" : "" ?>" placeholder="Nhập tiêu đề <?=$r_language['title']?>" title="Tiêu đề hiển thị <?= $r_language['title'] ?>" value="<?=$item['title']?>" autofocus>
						</td>
					</tr>
					<?php if ($attribute_enable['edit']['price'] != false): ?>
						<tr>
							<td class="col-xs-2"><label class="form-control">Giá bán:</label></td>
							<td class="col-xs-10">
								<div class="row-price-sale">
									<input name="price_sale_<?= $r_language['uri'] ?>"  type="<?= $attribute_enable['edit']['price'] ?>" step="1" class="form-control price_sale" placeholder="Nhập giá bán sản phẩm" value="<?= $item['price_sale'] ?>" style="display: inline-block; width: 300px;">
										<?php if ($attribute_enable['edit']['price'] == "number"): ?>
											<span style="display: inline-block; margin-left: 5px; width: 100px; text-align: right; letter-spacing: 0.5px;"></span>
											
											<b> (Nhập giá gốc và giá giảm(nếu có) giá bán sẽ tự phát sinh)  </b>
										<?php endif ?>
								</div>
							</td>
						</tr>
						<?php if ($attribute_enable['edit']['origin'] != false): ?>
							<tr>
								<td class="col-xs-2"><label class="form-control">Giá gốc (nếu có):</label></td>
								<td class="col-xs-10">
									<input name="price_<?= $r_language['uri'] ?>" type="<?= $attribute_enable['edit']['price'] ?>" step="1" class="form-control price price_origin" placeholder="Nhập giá gốc sản phẩm" value="<?= $item['price'] ?>" style="display: inline-block; width: 300px;">
									<?php if ($attribute_enable['edit']['price'] == "number"): ?>
										<span style="display: inline-block; margin-left: 5px; width: 100px; text-align: right; letter-spacing: 0.5px;"></span>
									<?php endif ?>
								</td>
							</tr>
						<?php endif ?>
						<?php if ($attribute_enable['edit']['promotion'] != false): ?>
							<tr>
								<td class="col-xs-2"><label class="form-control">Giảm theo giá (nếu có):</label></td>
								<td class="col-xs-10">
									<input name="promotion_price_<?= $r_language['uri'] ?>" type="<?= $attribute_enable['edit']['price'] ?>" step="1" class="form-control promotion_price" placeholder="Nhập giá giảm" value="<?= $item['promotion_price'] ?>" style="display: inline-block; width: 300px;">
									<?php if ($attribute_enable['edit']['price'] == "number"): ?>
										<span style="display: inline-block; margin-left: 5px; width: 100px; text-align: right; letter-spacing: 0.5px;"></span>
									<?php endif ?>
								</td>
							</tr>
							<tr>
								<td class="col-xs-2"><label class="form-control">Giảm theo phần trăm (nếu có):</label></td>
								<td class="col-xs-10">
									<input name="promotion_percent_<?=$r_language['uri']?>" type="<?= $attribute_enable['edit']['price'] ?>" step="1" min="0" max="100" class="form-control promotion_percent" placeholder="Nhập giảm theo phần trăm (vd: 10)" value="<?=$item['promotion_percent']?>" style="display: inline-block; width: 300px;">
									<?php if ($attribute_enable['edit']['price'] == "number"): ?>
										<span style="display: inline-block; margin-left: 5px; width: 100px; text-align: right; letter-spacing: 0.5px;"></span>
									<?php endif ?>
								</td>
							</tr>
						<?php endif; ?>
						<?php if ($attribute_enable['edit']['price'] == "number"): ?>
							<script>
								$(document).ready(function() {
									$(".price").change(function () {
										$(".price_sale").attr("max", $(this).val());
									});
									$(".price").trigger("change");
									$(".price_sale").next().html(Number($(".price_sale").val()).toLocaleString('en-US')+'đ');
									$(".price").next().html(Number($(".price").val()).toLocaleString('en-US')+'đ');
									$(".promotion_price").next().html(Number($(".promotion_price").val()).toLocaleString('en-US')+'đ');
									$(".promotion_percent").next().html(Number($(".promotion_percent").val())+'%');

									$(".price_sale, .price").on("input", function () {
										$(this).next().html(Number(this.value).toLocaleString('en-US')+'đ');
										$(".price_sale").val($(this).val());
										$(".price_sale").next().html(Number($(this).val()).toLocaleString('en-US')+'đ');
										$(".promotion_percent").val("");
										$(".promotion_price").val("");
									});

									$(".promotion_price").on("input", function () {
										$(this).next().html(Number(this.value).toLocaleString('en-US')+'đ');
										if($(this).val() != "") {
											$(".promotion_percent").val("");
											$(".price_sale").val(Number($(".price").val()) - Number($(this).val()));
											$(".price_sale").next().html(Number($(".price_sale").val()).toLocaleString('en-US')+'đ');
										}
									});

									

									$(".promotion_percent").on("input", function () {
										$(this).next().html(Number(this.value)+'%');
										if($(this).val() != "")
											$(".promotion_price").val("");
											$(".price_sale").val(Number($(".price").val()) - Number($(".price").val()) * Number($(this).val()) / 100);
											$(".price_sale").next().html(Number($(".price_sale").val()).toLocaleString('en-US')+'đ');
									});
								});
							</script>
						<?php endif ?>
					<?php endif ?>
					<?php foreach ($attribute_enable['edit']['input'] as $k_attr => $v_attr): ?>
						<tr>
							<td class="col-xs-2">
								<label class="form-control"><?= $v_attr ?>:</label>
							</td>
							<td class="col-xs-10">
								<input name="<?= $k_attr ?>_<?=$r_language['uri']?>" type="text" class="form-control" placeholder="Nhập <?= mb_strtolower($v_attr, "UTF-8") ?>" value="<?=@$item[$k_attr]?>">
							</td>
						</tr>
					<?php endforeach ?>
					<?php foreach ($attribute_enable['edit']['text'] as $k_attr => $v_attr): ?>
						<tr>
							<td class="col-xs-2">
								<label class="form-control"><?= $v_attr ?>:</label>
							</td>
							<td class="col-xs-10">
								<textarea name="<?= $k_attr ?>_<?=$r_language['uri']?>" class="form-control" rows="4" placeholder="Nhập <?= mb_strtolower($v_attr, "UTF-8") ?>"><?=@$item[$k_attr]?></textarea>
							</td>
						</tr>
					<?php endforeach ?>
					<?php foreach ($attribute_enable['edit']['editor'] as $k_attr => $v_attr): ?>
						<tr>
							<td class="col-xs-2">
								<label class="form-control"><?= $v_attr ?>:</label>
							</td>
							<td class="col-xs-10">
								<textarea id="<?= $k_attr ?>_<?=$r_language['uri']?>" name="<?= $k_attr ?>_<?=$r_language['uri']?>" class="editor"><?=$item[$k_attr]?></textarea>
							</td>
						</tr>
					<?php endforeach ?>
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

.row-price-sale{
	position: relative;
	background-color: #ccc;
}

.row-price-sale:before{
	content:'';
	position: absolute;
	top: 0;
	left: 0;
	bottom: 0;
	right: 0;
	z-index: 100;
}
</style>
