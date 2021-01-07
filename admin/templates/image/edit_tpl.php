<div class="well"><?=!empty($item) ? "Cập nhật" : "Thêm"?> <?=$title?>&nbsp;
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
		<?php foreach ($attribute_enable['edit']['category'] as $k_attr => $v_attr): ?>
			<tr>
				<td class="col-xs-2">
					<label class="form-control"><?= $v_attr['title'] ?>:</label>
				</td>
				<td class="col-xs-10">
					<select name="<?= $k_attr ?>" class="form-control <?= $v_attr['required'] ?>" title="<?= $v_attr['title'] ?>">
						<option value="" selected>Chọn <?= mb_strtolower($v_attr['title'], "UTF-8") ?></option>
						<?php
						foreach ($v_attr['list'] as $val) {
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
		<?php if (@$attribute_enable['edit']['thumbnail'] === true): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Hình hiện tại:</label></td>
				<td class="col-xs-10">
					<img id="thumb" src="<?=getThumbnailUrl($item['thumbnail'])?>" alt="Chưa có hình đại diện" onclick="openBrowser('#thumb', '#thumbnail');" style="cursor: pointer;">&nbsp;&nbsp;&nbsp;
					<button type="button" class="btn btn-primary" onclick="openBrowser('#thumb', '#thumbnail');">Chọn hình</button>&nbsp;&nbsp;&nbsp;
					<button type="button" class="btn btn-danger" onclick="$('#thumbnail').val('');$('#thumb').attr('src','');">Xóa hình hiện tại</button>
					<input id="thumbnail" name="thumbnail" type="hidden" value="<?=$item['thumbnail']?>">
				</td>
			</tr>
			<!-- <tr>
				<td class="col-xs-2"><label class="form-control">Đường dẫn khác:</label></td>
				<td class="col-xs-10">
					<input name="url" type="text" class="form-control" placeholder="Nhập đường dẫn khác cho hình ảnh" title="Đường dẫn cố định">
				</td>
			</tr> -->
		<?php endif ?>
		<?php if ($attribute_enable['edit']['link'] == true): ?>
			<tr>
				<td class="col-xs-2"><label class="form-control">Đường dẫn liên kết:</label></td>
				<td class="col-xs-10">
					<input name="link" type="text" class="form-control" placeholder="Nhập đường dẫn liên kết cho sản phẩm" title="Đường dẫn liên kết cho sản phẩm" value="<?= $_GET['link']!="null"?@$item['link']:"" ?>">
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
				<select name="enable" class="form-control required" title="Cho phép hiển thị và truy cập vào sản phẩm">
					<option value="1"<?=empty($item)||$item['enable']==1?" selected":""?>>Có</option>
					<option value="0"<?=!empty($item)&&$item['enable']==0?" selected":""?>>Không</option>
				</select>
			</td>
		</tr>
		<?php foreach ($attribute_enable['edit']['checkbox'] as $k_attr => $v_attr): ?>
			<tr>
				<td class="col-xs-2">
					<label class="form-control"><?= $v_attr['title'] ?></label>
					<div><input type="text" class="form-control checkbox-filter" data-target=".checkbox-container-<?= $k_attr ?>" placeholder="Tìm theo tên" value=""></div>
				</td>
				<td class="col-xs-10">
					<div class="well checkbox-container-<?= $k_attr ?>" style="padding: 5px; display: inline-block; width: 100%; padding: 5px 10px; min-height: 102px; max-height: 150px; overflow: auto;">
						<?php foreach ($v_attr['list'] as $va): ?>
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
	<?php if ((is_array($attribute_enable['edit']['input']) && !empty($attribute_enable['edit']['input'])) || (is_array($attribute_enable['edit']['editor']) && !empty($attribute_enable['edit']['editor']))): ?>
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
