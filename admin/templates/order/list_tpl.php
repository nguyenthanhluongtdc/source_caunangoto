<div class="well"><span>Quản lý đơn hàng (<?=$pagination->count_item?>)</span></div>

<table class="table table-striped table-bordered text-center">
	<tr>
		<td colspan="9">
			<?php include _template."input/delall.php"; ?>
		</td>
	</tr>
	<tr>
		<th><input class="selallbox" type="checkbox" onclick="$('.selbox').trigger('click');" /></th>
		<th>Số thứ tự</th>
		<th>Email</th>
		<th>Họ tênn</th>
		<th>Điện thoại</th>
		<th>Ngày gửi</th>
		<th>Xem</th>
		<th>Xóa</th>
	</tr>
	<?php $u=($pagination->current-1)*$pagination->max_item; foreach ($items as $value) { $u++; ?>
	<tr>
		<td>
			<?php $id=$value['id']; include _template."input/checkbox.php"; ?>
		</td>
		<td><?=$u?></td>
		<?php if ($value['email'] != ""): ?>
			<td><?=$value['email']?></td>
		<?php else: ?>
			<td><b>...</b></td>
		<?php endif ?>
		<td><?=$value['name']?></td>
		<td><?=$value['tel']?></td>
		<td><?=date('d/m/Y', $value['create_date'])?></td>
		<td><a href="index.php?com=order&act=view&id=<?= $value['id'] ?>"><i class="glyphicon glyphicon-eye-open"></i></a></td>
		<td>
			<?php include _template."input/delete.php"; ?>
		</td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="9">
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
