`<section class="container-fluid">
    <div class="row index4">
        <div class="container">
            <div>
            	<div class="h3_title" style="text-align: center; ">Thanh toán</div>
            </div>
            <div class="row">
		    	<form action="" method="post" accept="utf-8" onsubmit="return cartSubmit();" >
	            	<div class="col-md-6">
	            		<div style="padding-right: 50px;padding-left: 50px;">
	            			<h4 class="h4_title">Thông tin liên lạc</h4>
	            			<div class="form-group">
	            				<span class="label_title">Họ Tên:</span>
	            				<input type="text" autocomplete="off" name="name" required placeholder="Vui lòng nhập họ tên">
	            			</div>
	            			<div class="form-group">
	            				<span class="label_title">Số điện thoại:</span>
	            				<input type="text" autocomplete="off" name="tel" required placeholder="Vui lòng nhập số điện thoại">
	            			</div>
	            			<div class="form-group">
	            				<span class="label_title">Email:</span>
	            				<input type="email" autocomplete="off" name="email" required placeholder="Vui lòng nhập email">
	            			</div>
	            			<div class="form-group" style="position: relative;">
	            				<span class="label_title">Tỉnh/Thành Phố:</span>
	            				<?php $province = getItems(array("table" => "province", "condition" => "")); ?>
	            				<i class="fa fa-angle-down pro" aria-hidden="true"></i>
	            				<select name="pid" id="province" class="ngu_tinh form-control" required>
	            					<option value="" selected="selected"> Chọn tỉnh / thành</option>
	            				<?php foreach ($province as $pro): ?>
	            					<option value="<?= $pro['id'] ?>"><?= $pro['name'] ?></option>
	            				<?php endforeach ?>
	            				</select>
	            			</div>
	            			<div class="form-group ngu_huyen_cha" style="position: relative;">
	            				<div class="ngu_huyen">
		            				<span class="label_title">Quận/Huyện:</span>
		            				<?php $district = getItems(array("table" => "district", "condition" => "where pid like '{$_SESSION['cart_pid']}'"));?>
		            				<i class="fa fa-angle-down pro" aria-hidden="true"></i>
		            				<select name="did" id="district" class="form-control" required>
		            					<option value="" selected="selected"> Vui lòng chọn quận huyện</option>
		            					<?php foreach ($district as $dis): ?>
		            					<option value="<?= $dis['id'] ?>"><?= $dis['name'] ?></option>
	                                    <?php endforeach ?>
		            				</select>
	            				</div>
	            			</div>
	            			<div class="form-group">
	            				<span class="label_title">Địa chỉ:</span>
	            				<input type="text" autocomplete="off" name="address" placeholder="Số nhà, tên đường, phường / xã">
	            			</div>
	            			<div class="note">
	            				<h4>Ghi chú đơn hàng</h4>
	            				<textarea name="content" rows="8" cols="80" placeholder="Lưu ý khi nhận hàng, kiểm tra hàng trước khi nhận... "></textarea>
	            			</div>
	            		</div>
	            	</div>
	            	<dir class="col-md-6">
	            		<div class="order">
	            			<h4 class="h4_title">Đơn hàng của bạn</h4>
	            			<div class="product_tt">
	            			<?php foreach ($cart['product'] as $k_product => $r_product): ?>
	            				<div class="item">
	            					<div class="name_tt1"><span><?= $r_product['title'] ?></span> x <span><?= $r_product['quantity'] ?></span></div>
	            					<div class="name_tt2"><span><?= number_format($r_product['total'])?> đ</span></div>
	            				</div>
	            			<?php endforeach ?>
	            				<div class="item">
	            					<div class="name_tt1"><span>Tạm tính</span></div>
	            					<div class="name_tt2"><span><?= $cart['total_price'] ?></span></div>
	            				</div>
	            				<div class="item">
	            					<div class="name_tt1"><span>Tổng cộng</span></div>
	            					<div class="name_tt2"><span><?= $cart['total_price'] ?></span></div>
	            				</div>
	            				<center style="margin-top: 10px;padding-bottom: 20px;">
	            					<div class="label label-default" style="padding: 7px 10px; background: #eee; color: #333;">Chú ý: Thanh toán khi nhận hàng !
	            					</div>
	            				</center>
	            				<div>
	            					<button type="submit" name="orderbtn" class="btn_checkout">Đặt hàng</button>
	            				</div>
	            			</div>
	            		</div>
	            	</dir>
	            </form>
            </div>
        </div>
    </div>
</section>
<script>
	$(document).ready(function () {
		// $('input[name="delivery"]').change(function () {
		// 	if(this.checked) {
		// 		$($(this).data("target")).fadeIn(500);
		// 		$($(this).data("up")).fadeOut(0);
		// 	}
		// });
		$(".ngu_tinh").change(function () {
			if (this.value != "") {
				$.post("<?= getAjaxURL() ?>ajax_getdistrict.php", { pid: this.value }, function (res) {
					console.log(res);
					$(".ngu_huyen_cha").load(" .ngu_huyen_cha > .ngu_huyen");
				});
			}
		});
		// $(".sel-province").trigger("change");
	});
</script>