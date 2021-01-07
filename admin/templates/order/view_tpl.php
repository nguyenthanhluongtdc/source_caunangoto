<div class="well">Nội dung chi tiết đơn hàng  từ '<?=$item['name']?>' vào ngày '<?=date("d/m/Y", $item['create_date'])?>'</div>
<table class="table table-striped table-bordered">
	<tr>
		<td class="col-xs-3"><label class="form-control">Họ tên:</label></td>
		<td class="col-xs-9"><label class="form-control"><?=$item['name']?></label></td>
	</tr>
<!-- 	<tr>
		<td class="col-xs-3"><label class="form-control">Giới tính:</label></td>
		<td class="col-xs-9"><label class="form-control"><?=$item['gender']?></label></td>
	</tr> -->
	<tr>
		<td><label class="form-control">Điện thoại:</label></td>
		<td><label class="form-control"><?=$item['tel']?></label></td>
	</tr>
<!-- 	<tr>
		<td><label class="form-control">Phương thức giao hàng:</label></td>
		<td><label class="form-control"><?=$item['delivery']?></label></td>
	</tr> -->

	<?php if ($item['address'] != ""): ?>
		<tr>
			<td><label class="form-control">Địa chỉ giao hàng:</label></td>
			<td><label class="form-control"><?=$item['address']?></label></td>
		</tr>
	<?php endif ?>
	<?php if ($item['store'] != ""): ?>
		<tr>
			<td><label class="form-control">Địa chỉ siêu thị:</label></td>
			<td><label class="form-control"><?=$item['store']?></label></td>
		</tr>
	<?php endif ?>
	<?php if ($item['email'] != ""): ?>
		<tr>
			<td><label class="form-control">Email:</label></td>
			<td><label class="form-control"><?=$item['email']?></label></td>
		</tr>
	<?php endif ?>
	<tr>
		<td><label class="form-control">Ngày gửi:</label></td>
		<td><label class="form-control"><?=date('d/m/Y H:i:s', $item['create_date'])?></label></td>
	</tr>
	<tr>
		<td><label class="form-control">Nội dung:</label></td>
		<td><label class="form-control"><?=$item['content']?></label></td>
	</tr>
</table>
<div>
	<label>Chi tiết đơn hàng:</label>
	<div><?= $item['detail'] ?></div>
</div>
<div class="text-center">
	<a href="<?=str_replace("&act=view", "&act=list", getCurrentPageURL())?>" class="btn btn-warning">Quay lại</a>
</div>

<style type="text/css">
.well {
	font-size: 30px;
	color: darkred;
	font-weight: bold;
	text-align: center;
}
.table label {
	/*border: none !important;*/
	padding-top: 0 !important;
	padding-bottom: 0 !important;
	height: auto !important;
}
.table td:first-child {
	white-space: nowrap;
}

label.form-control {
	border: none;
	box-shadow: none;
	margin-bottom: 0;
	background: transparent;
	height: auto !important;
	/*min-height: 34px;*/
	text-align: justify;
}

input[type='file'], select {
	width: auto !important;
}
</style>