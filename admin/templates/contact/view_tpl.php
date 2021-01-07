<div class="well">Nội dung chi tiết tin <?= $row_type[$_GET['type']] ?>  từ '<?=$item['name']?>' vào ngày '<?=date("d/m/Y", $item['create_date'])?>'</div>
<table class="table table-striped table-bordered">
	<?php foreach ($row_attribute as $key => $value): if (trim(trim($value), ".")=="" || $value=="0") continue; ?>
		<tr>
			<td class="col-xs-3"><label class="form-control"><?= $key ?>:</label></td>
			<td class="col-xs-9"><label class="form-control"><?= $value ?></label></td>
		</tr>
	<?php endforeach ?>
</table>
<div class="text-center">
	<a href="<?=preg_replace('/\&id=\d*/i', '', str_replace("&act=view", "&act=list", getCurrentPageURL()))?>" class="btn btn-warning">Quay lại</a>
</div>

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