<div class="well"><span>Danh sách <?=$title?> (<?=$pagination->count_item?>)</span></div>

<table class="table table-striped table-bordered text-center">
	<tr>
		<td class="text-left" colspan="14">
			<?php include _template."input/add.php"; ?>
			<?php include _template."input/delall.php"; ?>
		</td>
	</tr>
	<tr>
		<th><input class="selallbox" type="checkbox" onclick="$('.selbox').trigger('click');" /></th>
		<th>STT</th>
		<?php if (@$attribute_enable['list']['thumbnail'] === true): ?>
			<th>Hình ảnh</th>
		<?php endif ?>
		<?php foreach (@$attribute_enable['list']['text'] as $k => $v): ?>
			<th><?= $v ?></th>
		<?php endforeach ?>
		<th>Thứ tự hiển thị</th>
		<th>Sửa</th>
		<th>Hiển thị</th>
		<th>Xóa</th>
		<!-- <th>Nhân đôi</th> -->
	</tr>
	<?php $u=($pagination->current-1)*$pagination->max_item; foreach ($items as $value) { $u++; ?>
		<tr>
			<td>
				<?php include _template."input/checkbox.php"; ?>
			</td>
			<td><?= $u ?></td>
			<?php if (@$attribute_enable['list']['thumbnail'] === true): ?>
				<td><?php include _template."input/thumbnail.php"; ?></td>
			<?php endif ?>
			<?php foreach (@$attribute_enable['list']['text'] as $k => $v): ?>
				<?php if ($k == "link"): ?>
					<td><a <?= $value[$k]!="" ? 'href="'.$value[$k].'" target="_blank"' : "" ?>"><?= $value[$k]!="" ? $v : "<b>...</b>" ?></a></td>
				<?php else: ?>
					<td><?= $value[$k]!="" ? $value[$k] : "<b>...</b>" ?></td>
				<?php endif ?>
			<?php endforeach ?>
			<td><?=$value['index']?></td>
			<td>
				<?php include _template."input/edit.php"; ?>
			</td>
			<td>
				<?php include _template."input/enable.php"; ?>
			</td>
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
