<section class="container-fluid">
	<div class="row tuyendung1">
		<?php $loaituyendung = getItems(array('table'=>'option','condition'=>'where enable > 0 and type = "loaituyendung" ')) ?>
		<?php foreach ($loaituyendung as $key => $loai): ?>
	  		<div class="container">
	  			<h2 class="tuyendung_title"><?= $loai['title'] ?></h2>
	  			<?php $vitrituyendung = getItems(array('table'=>'option','condition'=>'where enable > 0 and find_in_set ('.$loai['id'].',category_id)' )) ?>
  				<?php foreach ($vitrituyendung as $cat => $vitri): ?>	
		  			<div class="row vitri">
		  				<h3 class="vitri_title col-md-8"><?= $vitri['title'] ?></h3>
		  				<a class="col-md-2 a_right">
		  					<button data-fancybox data-src="#myModal_<?=$key?>_<?=$cat?>" type="button" class="btn_mota">Mô tả công việc</button>
		  				</a>
		  				<a class="col-md-2 a_left">
		  					<button data-fancybox data-src="#CVModal_<?=$key?>_<?=$cat?>" type="button" class="btn_ungtuyen">Ứng tuyển</button>
		  				</a>
		  			</div>
		  			<div style="display: none;width: 90%;" id="myModal_<?=$key?>_<?=$cat?>" role="dialog">
		  					<div class="modal-dialog">
		  						<!-- Modal content-->
	  							<div class="-modal-content">
	  								<div class="modal-header" style="padding:0;">
	  									<p class="h2_tieude"><?= $vitri['title'] ?></p>
	  								</div>
	  								<div class="modal-body row">
	  									<div class="col-md-8" style="margin: 0 0 0 -15px;padding-right: 15px !important;padding-left: 15px !important;">
	  										<?= $vitri['content'] ?>
	  									</div>
	  									<div class="col-md-4" style="border: 1px solid #BBBBBB;padding-left: 15px !important;padding-right: 15px !important;margin-bottom: 20px;">
	  										<?= $vitri['description'] ?>
	  									</div>

	  								</div>
	  								<div class="modal-footer">
	  									<button data-fancybox-close type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  								</div>
	  							</div>
		  					</div>
		  			</div>
		  			<div style="display: none;width: 90%;" id="CVModal_<?=$key?>_<?=$cat?>" role="dialog">
		  					<div class="modal-dialog">
		  						<!-- Modal content-->
	  							<div class="-modal-content">
	  								<div class="modal-header" style="padding:0;">
	  									<p class="h2_tieude">Đăng ký tuyển dụng - <?= $vitri['title'] ?></p>
	  								</div>
	  								<div class="modal-body row">
	  									<form class="form-horizontal" role="form" method="post" action="">
	  										<input type="hidden" name="location" value="<?= $vitri['title'] ?>">
	  										<div class="form-group">
	  											<label for="name" class="label_lh">Họ và tên(*):</label>
	  											<input type="text" class="form-control" id="name" name="name" placeholder="Tên nhân viên" value="" required>
	  											<input type="hidden" name="type" value="recruitment">
	  										</div>
	  										<div class="form-group">
	  											<label for="email" class="label_lh">Email(*):</label>
	  											<input type="Email" class="form-control" id="email" name="email" placeholder="Nhập email" required value="" >
	  										</div>
	  										<div class="form-group">
	  											<label for="tel" class="label_lh">Số Điện Thoại(*):</label>
	  											<input type="number" class="form-control" id="tel" name="tel" placeholder="Nhập số điện thoại" value="" required>
	  										</div>
	  										<div class="form-group">
	  											<label for="content" class="label_lh">Địa chỉ(*):</label>
	  											<textarea class="form-control" style="min-height: 200px;" name="content" id="content">
	  											</textarea>
	  										</div>
	  										<div class="form-group last" style="display: flex;justify-content: center;">
	  											<input type="submit" class="btn btn-success btn-hover" style="width: 200px;" name="contactbtn" id="contactbtn" value="Ứng tuyển">
	  										</div>
	  									</form>
	  								</div>
	  								<div class="modal-footer">
	  									<button data-fancybox-close type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  								</div>
	  							</div>
		  					</div>
		  			</div>

  				<?php endforeach ?>
	  		</div>
  		<?php endforeach ?>
  	</div>
  	
</section>

