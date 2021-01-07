<main class="padding-top-mobile">
  <style>
  body {
    background: #fff;
  }
</style>
<?php $nhap = $layout['danhsachnhaplieu'] ?>
<section id="content">
  <form method="post" action="" accept-charset="UTF-8">
    <div class="container">
      <div class="row" id="load_a">
        <div id="load_b">
          	<div class="col-lg-7 col-md-4 col-sm-12 col-xs-12" style="padding-top: 10px;">
          		<div style="background: #fff;padding: 10px;    padding-left: 70px;">
		            <h2 class="coll-title cart-title"><?=$thongtin['title']?></h2>
		            <div class="header-tc">
			            <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#000" stroke-width="2" class="thanhcong-icon checkmark">
			            	<path class="checkmark_circle" d="M25 49c13.255 0 24-10.745 24-24S38.255 1 25 1 1 11.745 1 25s10.745 24 24 24z"></path>
			            	<path class="checkmark_check" d="M15 24.51l7.307 7.308L35.125 19"></path>
			            </svg>
			            <div class="headertc-title">
			            	<h2 class="headertc-h2">
			            		<?=$nhap['nhap-dathangthanhcong']['value']?>
			            	</h2>
			            	<span class="os-description">
			            		<?=$nhap['nhap-camonbandamuahang']['value']?>
			            	</span>
			            </div>
		        	</div>
		            <div class="right-cart">
		            	<div class="content-box">
		    				<div class="section-content-column">
		    					<h2 class="headertc-h2" style="padding-bottom: 10px;"><?=$nhap['nhap-thongtingiaohang']['value']?></h2>
		    					<p class="p_tc">
		    						<?=$nhap['nhap-hoten']['value']?>: <?=$_SESSION['cart_kh']['name']?>
		    						<br>
		    						<?=$nhap['nhap-dienthoaididong']['value']?>: <?=$_SESSION['cart_kh']['tel']?>
		    						<br>
		    						<?=$nhap['nhap-diachiemail']['value']?>: <?=$_SESSION['cart_kh']['email']?>
		    						<br>
		    						<?=$_SESSION['cart_kh']['address']?>
		    						<br>
		    						<?=$nhap['nhap-ghichu']['value']?>: <?=$_SESSION['cart_kh']['content']?>
		    						<br>
		    					</p>
		    					<h2 class="headertc-h2" style="padding-bottom: 10px;padding-top: 10px;"><?=$nhap['nhap-phuongthucthanhtoan']['value']?></h2>
		    					<p class="p_tc">
		    						<?=$nhap['nhap-thanhtoankhinhanhang']['value']?>
		    					</p>
		    				</div>
		            	</div>
		            </div>
	            </div>
          	</div>
          	<div class="col-lg-5 col-md-4 col-sm-12 col-xs-12" style="padding-top: 10px;">
          		<div style="background-color: #fafafa;padding: 10px;">
		          	<h2 class="coll-title cart-title" style="padding-bottom: 20px;"><?=$nhap['nhap-donhangcuaban']['value']?></h2>
		          	<div class="right-cart" style="background: #fafafa;">
		          		<div class="order">
		          			<div class="product_tt"><?php $cart_tc = $_SESSION['cart_kh']['cart'] ?>
		          			<?php foreach ($cart_tc as $key => $value): ?>
		          				<?php $cart_tcong = getItems(array('table'=>'product','condition'=>"where enable > 0 and id = '$key'")) ?>
			                  	<?php foreach ($cart_tcong as $k_product => $r_product): ?>
			          				<div class="item_tc">
			          					<div class="name_tt1"><span><?=$r_product['title']?></span> x <span><?php $sum_sl = array_sum(array_values($value)) ?><?=$sum_sl?></span><br>
			          						<?php foreach ($value as $ma_mau => $sl_mau): ?>
			          						<?php $mau_ten = getItems(array("table"=>"option","id" => $ma_mau)) ?>
			          							<span>(<?=$mau_ten['title']?> x <?=$sl_mau?>)</span>
			          						<?php endforeach ?>
			          						<?php if (!is_array($mau_ten) || empty($mau_ten)): ?>
			          							<?=$nhap['nhap-macdinh']['value']?>
			          						<?php endif ?>
			          					</div>
			          					<?php $sum_price = str_replace(",","",getPriceSale($r_product))*$sum_sl ?>
			          					<div class="name_tt2"><span><?=number_format($sum_price)?> đ</span></div>
			          				</div>
			          			<?php endforeach ?>
		          			<?php endforeach ?>
		          				<div class="item_tc">
		          					<div class="name_tt1"><span><?=$nhap['nhap-thanhtien']['value']?></span></div>
		          					<div class="name_tt2"><span><?= $_SESSION['cart_kh']['total_price'] ?></span></div>
		          				</div>
		          			</div>
		          		</div>
		          	</div>
	          	</div>
          	</div>
          	<div class="col-lg-12 col-md-12 col-sm-12" style="justify-content: center;display: flex;padding: 15px;">
	            <a href="." class="btn-tc">
	            	<span class="btn-content"><?=$nhap['nhap-tieptucmuahang']['value']?></span>
	            </a>
            </div>
        </div>
      </div>
    </div>
    
  </form>
</section>

</main>
<style type="text/css">
	
	.item_tc {
	    padding: 20px 0;
	    border-bottom: 1px solid #AFADAD;
	    font-family: 'Roboto', sans-serif;
	    font-weight: 400;
	    font-size: 17px;
	    color: #696969;
	    line-height: 26px;
	}
	.name_tt2 {
	    display: inline;
	    max-width: 48%;
	    float: right;
	    text-align: right;
	}
	.product_tt {
		padding-bottom: 25px;
	}
	.name_tt1 {
    display: inline;
    max-width: 48%;
	}
	.btn-tc{
		flex: 0 0 auto;
		float: right;
		display: inline-block;
		border-radius: 4px;
		font-weight: 500;
		padding: 1.0em 1.5em;
		box-sizing: border-box;
		text-align: center;
		cursor: pointer;
		transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
		position: relative;
		background: #ed1c24;
    	color: #ffffff;
	}
	.btn-content{
		font-size: 15px;
	}
	.btn-tc:hover {
    background: #d91219;
    color: #fff;
	}
	.p_tc{
		line-height: 25px !important;
	    margin: 0;	    
	    font-size: 14px;
	    font-family:  sans-serif;
	    line-height: 1.3em;
	    overflow-wrap: break-word;
	    word-wrap: break-word;
	    word-break: break-word;
	    -webkit-font-smoothing: subpixel-antialiased;
	}
	.headertc-h2{
		font-size: 1.5em;
    	margin-bottom: 0.1em;
    	    color: #333;
	}
	.headertc-title{
		padding-bottom: 15px;
		    flex-grow: 1;
	}
	.header-tc{
		    position: relative;
	}
	.thanhcong-icon {
    position: absolute;
    right: 100%;
    top: 40%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    margin-right: 0.8em;
        stroke: #55b3e5;
	}
	.os-description {
    color: #4d4d4d;
    background: white;
    font-size: 14px;
    font-family: Helvetica Neue, sans-serif;
    line-height: 1.3em;
    overflow-wrap: break-word;
    word-wrap: break-word;
    word-break: break-word;
    -webkit-font-smoothing: subpixel-antialiased;
    /*overflow-x: hidden;*/
	}

</style>