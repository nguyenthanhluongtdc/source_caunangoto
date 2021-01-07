
<div class="div15">
	<div>
		<H3 class="h2-color">SẢN PHẨM BÁN CHẠY</H3>
		<?php $sanpham = getItems(array('table'=>'product','condition'=>'where popular > 0 and enable > 0 limit 5')) ?>
		<?php foreach ($sanpham as $key => $value): ?>
			<div class="div22">
				<div class="div23">
					<img src="<?= getResizedImageURL($value['thumbnail'],320,320) ?>" class="img-spm" alt="" >
				</div>
				<div>
					<span><a href="<?= getURL($value['uri']) ?>"><?= $value['title'] ?></a></span><br>
					<span class="discount "><?= getPriceOrigin($value) ?></span><br>
					<span class="price"><?= getPriceSale($value) ?></span>
				</div>
			</div>
		<?php endforeach ?>
		
		
	</div>
	<div class="div-martop">
		<H3 class="h2-color">BLOG CHIA SẼ</H3>
		<?php $post = getItems(array('table'=>'post','condition'=>'where new > 0 and enable > 0 limit 5')) ?>
		<?php foreach ($post as $key => $post_tin): ?>
			<div class="div22">
				<div class="div23">
					<img src="<?= getResizedImageURL($post_tin['thumbnail'],320,320) ?>" class="img-spm" alt="" >
				</div>
				<div>
					<span><a href="<?= getURL($post_tin['uri']) ?>"><?= $post_tin['title'] ?></a></span><br>
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<div class="div24">
		<label><h3 class="h3-ct">Tư Vấn / Giải Đáp</h3></label>
		<div class="modal-body">
			<div>
				<form action="" method="post">
					<div class="div26">
						<div>
							<label class="indam" for="txtTen">Họ và tên(*):</label><br>
							<input type="text" placeholder="Họ và tên" name="name" value="" class="width-in">
							<input type="hidden" name="type" value="contact">
						</div>
						<div>
							<label class="indam" for="txtTen">Địa chỉ:</label><br>
							<input type="text" placeholder="Nhập địa chỉ" name="address" value="" class="width-in">
						</div>
						<div>
							<label class="indam" for="txtSdt">Điện thoại(*):</label><br>
							<input type="text" placeholder="Nhập điện thoại" name="tel" value="" class="width-in">
						</div>
						<div>
							<label class="indam" for="txtEmail">Email(*):</label><br>
							<input type="text" placeholder="Nhập email" name="email" value="" class="width-in">
						</div>
						<div>
							<label class="indam" for="txtDiachi">Nội dung yêu cầu:</label><br>
							<textarea name="content" id="content" class="width-in"></textarea>
						</div>
						<div class="a1">
							<button value="1" type="submit" name="contactbtn" class="btn-hotro">Nhận hỗ trợ</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>