<div class="well">Phản hồi đánh giá & bình luận từ '<?=$item['name']?>' vào ngày '<?=date("d/m/Y", $item['create_date'])?>'</div>
<form action="<?= str_replace("&act=reply", "&act=save", getCurrentPageURL()) ?>" method="post" accept-charset="UTF-8">
	<div class="text-center">
		<button class="btn btn-success" type="submit">Lưu</button>
		<a href="<?=str_replace("&act=reply", "&act=list", getCurrentPageURL())?>" class="btn btn-warning">Quay lại</a>
	</div>
	<div>&nbsp;</div>
	<table class="table table-striped table-bordered">
		<!-- <tr>
			<td class="col-xs-3"><label class="form-control">Họ tên:</label></td>
			<td class="col-xs-9"><label class="form-control"><?=$item['name']?></label></td>
		</tr> -->
	<!--	<tr>
			<td><label class="form-control">Địa chỉ người gửi:</label></td>
			<td><label class="form-control"><?=$item['address']?></label></td>
		</tr>-->
		<!-- <tr>
			<td><label class="form-control">Điện thoại:</label></td>
			<td><label class="form-control"><?=$item['tel']?></label></td>
		</tr> -->
		<tr>
			<td><label class="form-control">Tên sản phẩm:</label></td>
			<td><label class="form-control">
				<?php $r_p = getItems(array("table" => "product", "id" => $item['product_id'])) ?>
				<?=$r_p['title']?>
			</label></td>
		</tr>
		<tr>
			<td><label class="form-control">Địa chỉ IP:</label></td>
			<td><label class="form-control">
				<?=$item['ip']?>
			</label></td>
		</tr>
		<?php if ($item['parent_id'] <= 0): ?>
			<tr>
				<td><label class="form-control">Email:</label></td>
				<td><label class="form-control"><?=$item['email']?></label></td>
			</tr>
		<?php endif ?>
		<tr>
			<td><label class="form-control">Họ tên:</label></td>
			<td><label class="form-control"><?=$item['name']?></label></td>
		</tr>
		<?php if ($item['parent_id'] <= 0): ?>
			<tr>
				<td><label class="form-control">Điểm đánh giá:</label></td>
				<td><label class="form-control"><?=number_format($item['rating'], 1)?></label></td>
			</tr>
		<?php endif ?>
		<tr>
			<td><label class="form-control">Ngày gửi:</label></td>
			<td><label class="form-control"><?=date('d/m/Y H:i:s', $item['create_date'])?></label></td>
		</tr>
		<tr>
			<td><label class="form-control">Nội dung đã gửi:</label></td>
			<td><label class="form-control"><?=$item['review']?></label></td>
		</tr>
		<tr>
			<td><label class="form-control">Nội dung phản hồi:</label></td>
			<td>
				<textarea class="form-control" name="reply_review" rows="5" placeholder="Nhập nội dung phản hồi" style="margin-top: 8px; margin-bottom: 8px;"><?= $item['reply_review'] ?></textarea>
			</td>
		</tr>
		<!-- <tr>
			<td><label class="form-control">Loại liên hệ:</label></td>
			<td><label class="form-control"><?=$item['type']?></label></td>
		</tr> -->
	</table>
	<div class="text-center">
		<button name="savebtn" class="btn btn-success" type="submit">Lưu</button>
		<a href="<?=str_replace("&act=reply", "&act=list", getCurrentPageURL())?>" class="btn btn-warning">Quay lại</a>
	</div>
</form>

<style type="text/css">
.well {
	font-size: 30px;
	color: darkred;
	font-weight: bold;
	text-align: center;
}
.table td {
	/*border: none !important;*/
	padding-top: 0 !important;
	padding-bottom: 0 !important;
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
	min-height: 34px;
	text-align: justify;
}

input[type='file'], select {
	width: auto !important;
}
</style>