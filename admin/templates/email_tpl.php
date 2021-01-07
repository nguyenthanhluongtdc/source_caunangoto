<div class="well">Cập nhật thông tin email</div>

<form action="" method="post" enctype="multipart/form-data">
	<ul class="nav nav-tabs" role="tablist">
		<?php foreach($row_language as $k_language => $r_language): ?>
			<li role="presentation" <?= $k_language==0 ? 'class="active"' : "" ?>>
				<a href="#<?= $r_language['uri'] ?>" aria-controls="<?= $r_language['uri'] ?>" role="tab" data-toggle="tab">
					<img src="<?= getThumbnailUrl($r_language['thumbnail']) ?>" style="height: 30px;">
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	<div class="tab-content">
		<?php foreach($row_language as $k_language => $r_language): $item = $items[$k_language]; ?>
			<div id="<?= $r_language['uri'] ?>" role="tabpanel" class="tab-pane fade <?= $k_language==0 ? "in active" : "" ?>">
				<table class="table">
					<tr>
						<td colspan="2" class="text-center">
							<input name="id_<?=$r_language['uri']?>" type="hidden" value="<?=@$item['id']?>">
							<input name="savebtn" type="submit" class="btn btn-success" value="Lưu lại">
						</td>
					</tr>
					<tr>
						<td class="col-xs-2"><label class="form-control">Email liên hệ:</label></td>
						<td class="col-xs-10">
							<input id="email_receive_<?=$r_language['uri']?>" name="email_receive_<?=$r_language['uri']?>" class="form-control" placeholder="Nhập email nhận" type="email" value="<?=$item['email_receive']?>">
						</td>
					</tr>
					<tr>
						<td class="col-xs-2"><label class="form-control">Email gửi:</label></td>
						<td class="col-xs-10">
							<input id="email_send_<?=$r_language['uri']?>" name="email_send_<?=$r_language['uri']?>" class="form-control" placeholder="Nhập email gửi (gmail)" type="email" value="<?=$item['email_send']?>">
						</td>
					</tr>
					<tr>
						<td class="col-xs-2"><label class="form-control">Mật khẩu gửi:</label></td>
						<td class="col-xs-10">
							<input name="password_send_<?=$r_language['uri']?>" placeholder="Nhập mật khẩu email gửi (gmail)" type="password" class="form-control" value="<?=$item['password_send']?>">
						</td>
					</tr>
					<tr>
						<td class="col-xs-2"><label class="form-control">Host:</label></td>
						<td class="col-xs-10">
							<input name="email_host_<?=$r_language['uri']?>" placeholder="Nhập địa chỉ host mail gửi (liên hệ kỹ thuật viên)" type="text" class="form-control" value="<?=$item['email_host']?>" <?= $_GET['command']=="admin"&&checkAdmin($db) ? "" : "readonly" ?>>
						</td>
					</tr>
					<tr>
						<td class="col-xs-2"><label class="form-control">Port:</label></td>
						<td class="col-xs-10">
							<input name="email_port_<?=$r_language['uri']?>" placeholder="Nhập cổng mail gửi (liên hệ kỹ thuật viên)" type="text" class="form-control" value="<?=$item['email_port']?>" <?= $_GET['command']=="admin"&&checkAdmin($db) ? "" : "readonly" ?>>
						</td>
					</tr>
					<tr>
						<td class="col-xs-2"><label class="form-control">Secure:</label></td>
						<td class="col-xs-10">
							<input name="email_secure_<?=$r_language['uri']?>" placeholder="Nhập phương thức bảo mật mail gửi (liên hệ kỹ thuật viên)" type="text" class="form-control" value="<?=$item['email_secure']?>" <?= $_GET['command']=="admin"&&checkAdmin($db) ? "" : "readonly" ?>>
						</td>
					</tr>
					<tr>
						<td class="col-xs-2"><label class="form-control">Tên đại diện:</label></td>
						<td class="col-xs-10">
							<input name="email_name_<?=$r_language['uri']?>" placeholder="Nhập tên người gửi (danh tính người gửi)" type="text" class="form-control" value="<?=$item['email_name']?>">
						</td>
					</tr>
					<tr>
						<td class="col-xs-2"><label class="form-control">Chủ đề:</label></td>
						<td class="col-xs-10">
							<input name="email_subject_<?=$r_language['uri']?>" placeholder="Nhập chủ đề email gửi" type="text" class="form-control" value="<?=$item['email_subject']?>">
						</td>
					</tr>
					<!-- <tr>
						<td class="col-xs-2"><label class="form-control">Nội dung email:</label></td>
						<td class="col-xs-10">
							<textarea id="email_content_<?=$r_language['uri']?>" name="email_content_<?=$r_language['uri']?>" class="editor"><?=$item['email_content']?></textarea>
						</td>
					</tr> -->
					<tr>
						<td colspan="2" class="text-center">
							<input name="savebtn" type="submit" class="btn btn-success" value="Lưu lại">
						</td>
					</tr>
				</table>
			</div>
		<?php endforeach; ?>
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
	border: none !important;
}
.table td img {
	max-width: 100%;
	max-height: 100px;
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
