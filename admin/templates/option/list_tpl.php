<div class="well"><span>Danh sách <?= $attribute_enable[$_GET['type']]['title'] ?> (<?=$pagination->count_item?>)</span></div>

<table class="table table-striped table-bordered text-center">
	<tr>
		<td class="text-left" colspan="14">
			<?php include _template."input/add.php"; ?>
			<?php include _template."input/delall.php"; ?>
		</td>
	</tr>
	<tr>
		<td colspan="20" class="text-left">
			<form method="post" onsubmit="getFilter('<?=$filterStr?>'); return false;">
				&nbsp;&nbsp;&nbsp;<span class="text-muted">Lọc theo:</span>&nbsp;&nbsp;
				<input id="title" type="text" class="filter form-control" placeholder="Từ khóa" style="width: auto; display: inline-block; background: white;" autofocus value="<?=@$_SESSION[$filterStr]['title']?>">
				<select id="category_id" class="filter form-control" style="width: auto; display: inline-block; background: white;" onchange="getFilter('<?=$filterStr?>');">
					<option value="">-- Phân loại --</option>
					<?php foreach ($filter_items as $fi): ?>
						<option value="<?=$fi['id']?>" <?=$fi['id']==@$_SESSION[$filterStr]['category_id'] ? "selected" : ""?>><?=$fi['title']?></option>
					<?php endforeach ?>
				</select>
				<button type="submit" class="btn btn-success" style="margin-top: -3px;">Lọc</button>
				<button class="btn btn-danger" onclick="$('.filter').val(''); getFilter('<?=$filterStr?>');" style="margin-top: -3px;">Xóa lọc</button>
			</form>
		</td>
	</tr>
	<tr>
		<th><input class="selallbox" type="checkbox" onclick="$('.selbox').trigger('click');" /></th>
		<th>STT</th>
		<!-- <?//php if (@$_GET['type'] == "couple"): ?>
			<th>Giới tính nam</th>
			<th>Giới tính nữ</th>
		<?//php endif ?> -->
		<?php if (@$attribute_enable[$_GET['type']]['list']['thumbnail'] === true): ?>
			<th>Hình ảnh</th>
		<?php endif ?>
		<?php if (@$attribute_enable[$_GET['type']]['list']['video'] === true): ?>
			<th>Video</th>
		<?php endif ?>
		<?php foreach (@$attribute_enable[$_GET['type']]['list']['text'] as $k => $v): ?>
			<th><?= $v ?></th>
		<?php endforeach ?>
		<?php foreach ($attribute_enable[$_GET['type']]['list']['category'] as $k_attr => $v_attr): ?>
			<th><?= $v_attr['title'] ?></th>
		<?php endforeach ?>
		<?php if (@$attribute_enable[$_GET['type']]['list']['link'] === true): ?>
			<th>Liên kết</th>
		<?php endif ?>
		<th>Thứ tự hiển thị</th>
		<th>Sửa</th>
		<th>Hiển thị</th>
    <?php foreach (@$attribute_enable[$_GET['type']]['list']['popular'] as $r_attribute): ?>
      <th><?= $r_attribute ?></th>
    <?php endforeach ?>
		<th>Xóa</th>
		<!-- <th>Nhân đôi</th> -->
	</tr>
	<?php $u=($pagination->current-1)*$pagination->max_item; foreach ($items as $value) { $u++; ?>
		<tr>
			<td>
				<?php include _template."input/checkbox.php"; ?>
			</td>
			<td><?= $u ?></td>
			<!-- <?//php if (@$_GET['type'] == "couple"): ?>
				<?//php
					$couple_nam = explode(",", $value['category_id']);
					$couple_nu = $couple_nam[1];
					$couple_nam = $couple_nam[0];
					$couple_nam = getItems(array("table" => "product", "id" => $couple_nam));
					$couple_nu = getItems(array("table" => "product", "id" => $couple_nu));
				?>
				<td>
					<a href="<?//= getURL($couple_nam['uri'], true) ?>" target="_blank">
						<img src="../<?//= $couple_nam['thumbnail'] ?>" style="height: 100px !important; margin: 5px 0 10px 0;">
						<div><b><?//= $couple_nam['title'] ?></b></div>
					</a>
				</td>
				<td>
					<a href="<?//= getURL($couple_nu['uri'], true) ?>" target="_blank">
						<img src="../<?//= $couple_nu['thumbnail'] ?>" style="height: 100px !important; margin: 5px 0 10px 0;">
						<div><b><?//= $couple_nu['title'] ?></b></div>
					</a>
				</td>
			<?//php endif ?> -->
			<?php if (@$attribute_enable[$_GET['type']]['list']['thumbnail'] === true): ?>
				<td><?php include _template."input/thumbnail.php"; ?></td>
			<?php endif ?>
			<?php if (@$attribute_enable[$_GET['type']]['list']['video'] === true): ?>
				<td><?php include _template."input/video.php"; ?></td>
			<?php endif ?>
			<?php foreach (@$attribute_enable[$_GET['type']]['list']['text'] as $k => $v): ?>
				<?php if ($k == "link"): ?>
					<td><a <?= $value[$k]!="" ? 'href="'.$value[$k].'" target="_blank"' : "" ?>><?= $value[$k]!="" ? $v : "<b>...</b>" ?></a></td>
				<?php else: ?>
					<td><?= $value[$k]!="" ? $value[$k] : "<b>...</b>" ?></td>
				<?php endif ?>
			<?php endforeach ?>
			<?php foreach ($attribute_enable[$_GET['type']]['list']['category'] as $k_attr => $v_attr): ?>
				<td style="text-align: left;">
					<?php
          if(intval(end(explode(",", @$value[$k_attr]))) > 0):
						$ptitle = getItems(array("table" => $v_attr['table'], "condition" => "where id in ({$value[$k_attr]})"));
						if(is_array($ptitle) && !empty($ptitle)) {
							foreach ($ptitle as $k_tt => $v_tt)
								echo "<div style='white-space:nowrap;'><b>{$v_tt[$v_attr['column']]}</b></div>";
						}
						else
							echo '<b class="text-danger">Không có hoặc đã xóa danh mục!</b>';
					else:
						echo "...";
					endif;
					?>
				</td>
			<?php endforeach ?>
			<?php if (@$attribute_enable[$_GET['type']]['list']['link'] === true): ?>
				<td><b>
					<?php
					$url = getURL($value['uri'], true);
					$text = '<span class="fa fa-external-link"></span>';
					$current_page = false;
					include _template."input/link.php";
					?>
				</b></td>
			<?php endif ?>
			<td><?=$value['index']?></td>
			<td>
				<?php include _template."input/edit.php"; ?>
			</td>
			<td>
				<?php include _template."input/enable.php"; ?>
			</td>
			<?php foreach (@$attribute_enable[$_GET['type']]['list']['popular'] as $k => $v): ?>
				<td>
					<?php $column=$k; include _template."input/popular.php"; ?>
				</td>
			<?php endforeach ?>
			<td>
				<?php include _template."input/delete.php"; ?>
			</td>
			<!-- <td>
				<?php //include _template."input/duplicate.php"; ?>
			</td> -->
		</tr>
	<?php } ?>
	<tr>
		<td colspan="14">
			<?php include _template."input/add.php"; ?>
			<?php include _template."input/delall.php"; ?>
		</td>
	</tr>
	<?php if($pagination->count > 1) { ?>
		<tr>
			<td colspan="14">
				<?= $paging ?>
			</td>
		</tr>
	<?php } ?>
</table>

<style type="text/css">
.table th {
	text-align: center;
}
.table td {
	vertical-align: middle !important;
}
.table td[colspan='9'] {
	border-bottom: none !important;
	border-left: none !important;
	border-right: none !important;
}
.well {
	font-size: 30px;
	color: darkred;
	font-weight: bold;
	text-align: center;
}
</style>
