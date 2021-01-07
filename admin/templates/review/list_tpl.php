<div class="well"><span>Quản lý đánh giá & bình luận (<?=$pagination->count_item?>)</span></div>

<table class="table table-striped table-bordered text-center">
	<tr>
		<td colspan="20">
			<?php include _template."input/delall.php"; ?>
		</td>
	</tr>
	<tr>
		<th><input class="selallbox" type="checkbox" onclick="$('.selbox').trigger('click');" /></th>
		<th>Số thứ tự</th>
		<th>Sản phẩm đánh giá</th>
		<th>Email</th>
		<th>Họ tên</th>
		<th>Điểm đánh giá</th>
		<th>Phân loại</th>
		<th>Ngày đánh giá</th>
		<th>Phê duyệt</th>
		<th>Phản hồi</th>
		<th>Hiển thị</th>
		<th>Xóa</th>
	</tr>
	<?php $u=($pagination->current-1)*$pagination->max_item; foreach ($items as $value) { $u++; ?>
	<tr>
		<td>
			<?php $id=$value['id']; include _template."input/checkbox.php"; ?>
		</td>
		<td><?=$u?></td>
		<td>
			<?php $r_p = getItems(array("table" => "product", "id" => $value['product_id'])); ?>
			<b><a href="<?= getURL($r_p['uri'], true) ?>"><?= $r_p['title'] ?></a></b>
		</td>
		<td><?=$value['parent_id']>0?"...":$value['email']?></td>
		<td><?=$value['name']?></td>
		<td><b><?=$value['parent_id']>0?"...":number_format($value['rating'], 1)?></b></td>
		<td><?= $value['parent_id']>0?'<b style="color: blue; white-space: nowrap;">Bình luận</b>':'<b style="color: red; white-space: nowrap;">Đánh giá</b>' ?></td>
		<td><?=date('d/m/Y', $value['create_date'])?></td>
		<td><?= intval($value['confirm_date'])>0 ? '<b class="text-success">Đã duyệt..</b>' : '<button style="background:none;outline:none;box-shadow:none;" class="btn text-danger" onclick="confirm_review('.$value['id'].');"><b>Duyệt ngay!</b></button>' ?></td>
		<td><a href="index.php?com=review&act=reply&id=<?= $value['id'] ?>">
			<i class="fa fa-reply"></i>
			<?php if (trim(@$value['reply_review']) != ""): ?>
				<br><b style="white-space: nowrap;" class="text-success">(đã phản hồi)</b>
			<?php endif ?>
		</a></td>
		<td>
			<?php include _template."input/enable.php"; ?>
		</td>
		<td>
			<?php include _template."input/delete.php"; ?>
		</td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="20">
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

<script>
	function confirm_review(id) {
		$.ajax({
			url: "<?= getAjaxURL() ?>ajax.php",
			method: "post",
			dataType: "text",
			data: { column: "confirm_review", id: id },
			success: function (res) {
				if(res == "1" || res == 1) {
					window.location.reload();
				}
			}
		});
	}
</script>

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
