<div style="background-color: #fff">
	<div style="background-color: #fff;padding: 12px 10px;display: flex;justify-content: space-between;align-items: center;border-bottom: 1px solid #ddd;
}">
		<div style="flex: 1 1; color: #555;font-weight: 600;">Danh mục nổi bật</div>
	</div>
	<div class="danhmuc_mobile row">
        <?php foreach ($layout['header']['menu-center'] as $key => $value): ?>
	        <?php if ($value['popular']  > 0): ?>
	        	<div class="col-xs-3 item_dm_mobile">
	              <a href="<?=getURL($value['uri'])?>">
	                <img src="<?=$value['thumbnail']?>" style="width: 48px;height: 48px;border-radius: 10px;">
	                <span class="title_dm_mobile"><?=$value['title']?></span>
	              </a>
	          </div>
	        <?php endif ?>
        <?php endforeach ?>
      </div>
</div>
<div style="background-color: #fff">
	<div style="background-color: #fff;padding: 12px 10px;display: flex;justify-content: space-between;align-items: center;border-bottom: 1px solid #ddd;
}">
		<div style="flex: 1 1; color: #555;font-weight: 600;">Danh mục sản phẩm</div>
	</div>
	<div class="danhmuc_mobile row">
        <?php foreach ($layout['header']['menu-center'] as $key => $value): ?>
	        	<div class="col-xs-6 item_dm_mobile">
	              <a href="<?=getURL($value['uri'])?>">
	                <img src="<?=$value['thumbnail']?>" style="width: 48px;height: 48px;border-radius: 10px;">
	                <span class="title_dm_mobile"><?=$value['title']?></span>
	              </a>
	              <?php if (!empty($value['child']) && $value['child'] != ""): ?>
	              	<button class="btn btn_dmchild" id="btn_dmchild_<?=$key?>"  style="padding: 2px 10px;border: none;"><i class="fa fa-caret-down" aria-hidden="true"></i></button>
	              	<div class="tog" id="tog_<?=$key?>" style="display: none;">
		          	  	<?php foreach ($value['child'] as $cat => $chil): ?>
		          	  		<div style="display: flex;padding-left: 10px;align-items: center;">
		          	  			<i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 10px;"></i>
		          	  			<a href="<?=getURL($chil['uri'])?>" style="color:#555;"><?=$chil['title']?></a>
		          	  			<!-- <a href="" class="child_title">Quat cong nghe</a> -->
		          	  		</div>
		          	  		
		          	  	<?php endforeach ?>

		          	 </div>
	          	  <?php endif ?>
	          	  <script type="text/javascript">
	          	  	$('#btn_dmchild_<?=$key?>').click(function(){
	          	  		$('#tog_<?=$key?>').toggle();
	          	  	});
	          	  </script>
	          	</div>
        <?php endforeach ?>
      </div>
</div>
