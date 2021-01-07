<link rel="stylesheet" href="../assets/css/swiper.min.css">
<script src="../assets/js/jquery-ui.min.js"></script>
<script src="../assets/js/swiper.min.js"></script>
<div class="layout-left">
	<form action="" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
		<div class="layout-container">
			<center class="col-xs-12">
				<button class="btn btn-primary" type="submit" name="layout_submit" value="true">Lưu</button>
			</center>
			<div class="clearfix"></div>
			<?php if ($information['theme']!="" && is_file(_theme.$information['theme']."/graph/{$_GET['type']}.php")): ?>
				<?php include _theme.$information['theme']."/graph/{$_GET['type']}.php" ?>
			<?php else: ?>
				<?php include _template.$com."/{$_GET['type']}.php" ?>
			<?php endif ?>
			<div class="clearfix"></div>
			<center>
				<button class="btn btn-primary" type="submit" name="layout_submit" value="true">Lưu</button>
			</center>
		</div>
	</form>
</div>
<div class="layout-right">
	<div class="panel panel-primary panel-scroll">
		<div class="panel-heading">
			<b>Danh mục</b>
			<button class="btn btn-danger" style="float: right; padding: 0; width: 24px; height: 24px; min-width: unset; margin-bottom: 10px; border: none; box-shadow: 0 0 3px 0px #fff;" onclick="removeSelectedCategory();" title="Xóa danh mục đã chọn"><span class="fa fa-trash"></span></button>
			<button class="btn btn-success" style="float: right; padding: 0; width: 24px; height: 24px; min-width: unset; margin-bottom: 10px; border: none; margin-right: 5px; box-shadow: 0 0 3px 0px #fff; font-size: 16px;" onclick="if($('.category:visible .close.checkbox').is(':checked')) $('.category:visible .close.checkbox').prop('checked', false); else $('.category:visible .close.checkbox').prop('checked', true);" title="Chọn tất cả danh mục"><span class="fa fa-list-ul"></span></button>
			<button class="btn btn-warning" style="float: right; padding: 0; width: 24px; height: 24px; min-width: unset; margin-bottom: 10px; border: none; margin-right: 5px; box-shadow: 0 0 3px 0px #fff;" onclick="addCategory();" title="Thêm mới danh mục"><span class="fa fa-plus"></span></button>
			<div class="filter-container">
				<div>
					<input class="filter-input form-control" type="text" placeholder="Lọc theo tên" value="" oninput="getCategoryFilter();" style="color: #000; margin-bottom: 10px; height: 26px; padding: 0 5px; font-size: 12px;">
				</div>
				<div class="display-flex flex-center- flex-wrap fullwidth">
					<input id="filter-chkbox-1" class="filter-chkbox" type="checkbox" value="product" checked onchange="getCategoryFilter();" style="margin-right: 5px; margin-top: -2px;">
					<label for="filter-chkbox-1" style="-user-select: none; -webkit-user-select: none; -moz-user-select: none; -o-user-select: none; cursor: pointer; margin-right: 15px; margin-bottom: 0;">Sản phẩm</label>
					<input id="filter-chkbox-2" class="filter-chkbox" type="checkbox" value="post" checked onchange="getCategoryFilter();" style="margin-right: 5px; margin-top: -2px;">
					<label for="filter-chkbox-2" style="-user-select: none; -webkit-user-select: none; -moz-user-select: none; -o-user-select: none; cursor: pointer; margin-right: 15px; margin-bottom: 0;">Bài viết</label>
					<input id="filter-chkbox-3" class="filter-chkbox" type="checkbox" value="page" checked onchange="getCategoryFilter();" style="margin-right: 5px; margin-top: -2px;">
					<label for="filter-chkbox-3" style="-user-select: none; -webkit-user-select: none; -moz-user-select: none; -o-user-select: none; cursor: pointer; margin-bottom: 0;">Trang</label>
					<div class="flex-shrink-1 fullwidth display-flex flex-wrap filter-option-container">
					</div>
				</div>
			</div>
		</div>
		<div class="panel-body sortable">
			<?php foreach ($row_category as $r_category): ?>
				<div data-id="<?= $r_category['id'] ?>" data-type="<?= $r_category['type'] ?>" class="category enable-<?= $r_category['enable'] ?> lock-<?= $r_category['lock'] ?> draggable text-primary <?= count(explode("category_image", $r_category['checkbox_admin']))>1 ? "" : "lock-image" ?> <?= count(explode("category_tab", $r_category['checkbox_admin']))>1 ? "" : "lock-tab" ?>" data-text="<?= $r_category['title'] ?>">
					<div>
						<?= $r_category['title'] ?>
						<span class="text-muted fa fa-lock" title="Danh mục được khóa vì lý do kỹ thuật" style="margin-top: 0; margin-left: 5px; cursor: help;"></span>
					</div>
					<div class="close-container" style="display: inline-block; margin-top: 3px; margin-bottom: -5px; border-top: solid 1px #ddd; padding-top: 5px;">
						<button class="close hidden" type="button" title="Gỡ bỏ" onclick="removeCategory(this)">x</button>
						<?php if ($user['type'] == "master" || intval($r_category['lock'])<1): ?>
							<input type="checkbox" class="close checkbox" value="<?= $r_category['id'] ?>" style="margin-top: 0; margin-left: 5px;">
						<?php endif ?>
						<?php if ($user['type'] == "master" || intval($r_category['lock'])<1): ?>
							<button class="close duplicate" type="button" title="Nhân bản" onclick="duplicate('category', '<?= $r_category['id'] ?>', function() { if(confirm('Nhân bản danh mục thành công. Bạn có muốn tải lại trang không?\n* Chú ý: dữ liệu chưa lưu sẽ bị mất!')) window.location.reload(true); });" style="margin-left: 5px;">
								<span class="fa fa-copy"></span>
							</button>
						<?php endif ?>
						<?php if ($user['type'] == "master" || intval($r_category['lock'])<1): ?>
							<button class="close delete" type="button" title="Xóa" onclick="update('category', '<?= $r_category['id'] ?>', 'delete', function() { if(confirm('Xóa danh mục thành công. Bạn có muốn tải lại trang không?\n* Chú ý: dữ liệu chưa lưu sẽ bị mất!')) window.location.reload(true); });" style="margin-left: 5px;">
								<span class="fa fa-trash"></span>
							</button>
						<?php endif ?>
						<button class="close edit" type="button" title="Chỉnh sửa" onclick="editCategory(this);" style="margin-left: 5px;">
							<span class="fa fa-pencil"></span>
						</button>
						<button class="close imglist" type="button" title="Danh sách ảnh" onclick="showImageList(this);" style="margin-left: 5px;"><span class="fa fa-image"></span></button>
						<button class="close children hidden" type="button" title="Danh mục con" onclick="toggleChildren(this);" data-text="<?= $r_category['title'] ?>">
							<span class="fa fa-chevron-down"></span>
						</button>
						<button class="close tablist" type="button" title="Danh sách thẻ" onclick="showTabList(this);"><span class="fa fa-tag"></span></button>
					</div>
				</div>
			<?php endforeach ?>
			<?php $row_filter_option=array(); foreach ($row_option as $r_option):
				if (!in_array($r_option['type'], $row_filter_option)) $row_filter_option[]=$r_option['type']; ?>
				<div data-id="o-<?= $r_option['id'] ?>" data-type="<?= $r_option['type'] ?>" class="category option enable-<?= $r_option['enable'] ?> draggable text-muted" data-text="<?= $r_option['title'] ?>">
					<div><?= $r_option['title'] ?></div>
					<div class="close-container" style="display: inline-block; margin-top: 3px; margin-bottom: -5px; border-top: solid 1px #ddd; padding-top: 5px;">
						<button class="close hidden" type="button" title="Gỡ bỏ" onclick="removeCategory(this)">x</button>
						<button class="close children hidden" type="button" title="Danh mục con" onclick="toggleChildren(this);" data-text="<?= $r_option['title'] ?>">
							<span class="fa fa-chevron-down"></span>
						</button>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		<?php foreach ($row_filter_option as $r_filter_option): ?>
			$(".filter-option-container").append(`<span class="display-flex flex-center-" style="margin-right: 15px; margin-top: 5px;">
				<input id="filter-chkbox-<?= $r_filter_option ?>" class="filter-chkbox" type="checkbox" value="<?= $r_filter_option ?>" checked onchange="getCategoryFilter();" style="margin-right: 5px; margin-top: -2px;">
				<label for="filter-chkbox-<?= $r_filter_option ?>" style="-user-select: none; -webkit-user-select: none; -moz-user-select: none; -o-user-select: none; cursor: pointer; margin-bottom: 0;"><?= mb_strtoupper($row_option_type[$r_filter_option]['title'][0], "UTF-8").mb_substr($row_option_type[$r_filter_option]['title'], 1, mb_strlen($row_option_type[$r_filter_option]['title']), "UTF-8") ?></label>
			</span>`);
		<?php endforeach ?>
	});
</script>
<div id="modal-area-link" class="modal fade" tabindex="-1" role="dialog" style="background: #fff;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #f9f9f9;">
    	<form onsubmit="return false;">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <div class="modal-title h4">Nhập nội dung liên kết <span class="modal-title link"></span></div>
	      </div>
	      <div class="modal-body">
	        <input type="text" class="modal-txt link form-control" placeholder="Mặc định: javascript:void(0);" style="border-radius: 0; background: #fff;">
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary modal-savebtn link" onclick="saveLinkPopup(this);">Chấp nhận</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
	      </div>
	    </form>
    </div>
  </div>
</div>
<div id="modal-area-input" class="modal fade" tabindex="-1" role="dialog" style="background: #fff;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #f9f9f9;">
    	<form onsubmit="return false;">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <div class="modal-title h4">Nhập nội dung chuỗi <span class="modal-title input"></span></div>
	      </div>
	      <div class="modal-body">
	        <input type="text" class="modal-txt input form-control" style="border-radius: 0; background: #fff;" placeholder="Nhập nội dung">
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary modal-savebtn input" onclick="saveInputPopup(this);">Chấp nhận</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
	      </div>
	    </form>
    </div>
  </div>
</div>
<div id="modal-area-email" class="modal fade" tabindex="-1" role="dialog" style="background: #fff;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #f9f9f9;">
    	<form onsubmit="return false;">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <div class="modal-title h4">Nhập nội dung chuỗi <span class="modal-title email"></span></div>
	      </div>
	      <div class="modal-body">
	        <input type="email" class="modal-txt email form-control" placeholder="Nhập nội dung" style="border-radius: 0; background: #fff;">
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary modal-savebtn email" onclick="saveEmailPopup(this);">Chấp nhận</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
	      </div>
	    </form>
    </div>
  </div>
</div>
<div id="modal-area-tel" class="modal fade" tabindex="-1" role="dialog" style="background: #fff;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #f9f9f9;">
    	<form onsubmit="return false;">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <div class="modal-title h4">Nhập nội dung chuỗi <span class="modal-title tel"></span></div>
	      </div>
	      <div class="modal-body">
	        <input type="text" pattern="[0-9.+()\s]{3,}" class="modal-txt tel form-control" title="Vui lòng nhập số điện thoại" placeholder="Nhập số điện thoại" style="border-radius: 0; background: #fff;">
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary modal-savebtn tel" onclick="saveTelPopup(this);">Chấp nhận</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
	      </div>
	    </form>
    </div>
  </div>
</div>
<div id="modal-area-text" class="modal fade" tabindex="-1" role="dialog" style="background: #fff;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #f9f9f9;">
    	<form onsubmit="return false;">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <div class="modal-title h4">Nhập nội dung chuỗi <span class="modal-title text"></span></div>
	      </div>
	      <div class="modal-body">
	        <textarea class="modal-txt text form-control" rows="10" placeholder="Nhập nội dung" style="border-radius: 0; background: #fff;"></textarea>
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary modal-savebtn text" onclick="saveTextPopup(this);">Chấp nhận</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
	      </div>
	    </form>
    </div>
  </div>
</div>
<div id="modal-area-editor" class="modal fade" tabindex="-1" role="dialog" style="background: #fff;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #f9f9f9;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-title h4">Nhập nội dung chuỗi <span id="modal-title-editor"></span></div>
      </div>
      <div class="modal-body">
        <textarea id="modal-txt-editor"></textarea>
      </div>
      <div class="modal-footer">
        <button id="modal-savebtn-editor" type="button" class="btn btn-primary" onclick="saveEditorPopup(this);">Chấp nhận</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
      </div>
    </div>
  </div>
</div>
<div id="modal-area-color" class="modal fade" tabindex="-1" role="dialog" style="background: #fff;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #f9f9f9;">
    	<form onsubmit="return false;">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <div class="modal-title h4">Nhập mã màu <span class="modal-title color"></span></div>
	      </div>
	      <div class="modal-body" style="position: relative;">
	        <input type="text" class="modal-txt color form-control" placeholder="#abcdef&nbsp;&minus;&nbsp;rgb(r,g,b)&nbsp;&minus;&nbsp;rgba(r,g,b,a)&nbsp;&minus;&nbsp;hsl(h,s,l)&nbsp;&minus;&nbsp;hsla(h,s,l,a)" style="border-radius: 0; background: #fff; padding-right: 46px; letter-spacing: 1.2px;">
	        <input class="unfocus" type="color" onchange="$(this).prev().val(this.value);" value="#abcdef" style="position: absolute; width: 33px; height: 32px; top: 16px; right: 16px; border-left: solid 1px #ccc;">
	        <div style="position: absolute; width: 32px; height: 32px; top: 16px; right: 16px; color: #fff; text-shadow: 0 0 3px #000; pointer-events: none; display: -webkit-flex; display: -moz-flex; display: -ms-flex; display: -o-flex; display: flex; -ms-align-items: center; align-items: center; -webkit-justify-content: center; -moz-justify-content: center; -ms-justify-content: center; -o-justify-content: center; justify-content: center;"><div class="fa fa-paint-brush"></div></div>
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary modal-savebtn color" onclick="saveColorPopup(this);">Chấp nhận</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
	      </div>
	    </form>
    </div>
  </div>
</div>
<style>
  .modal-backdrop {
    display: none !important;
  }
</style>
<script>
	$(document).ready(function () {
		setTimeout(function() {
			var hmax = $(window).outerHeight() - $("#footer").outerHeight() - $(".layout-right .panel-heading").outerHeight() - 2 - 20;
			$(".layout-right .panel-scroll").css("width", $(".layout-right").outerWidth() + "px");
			$(".layout-right .panel-scroll .panel-body").css("height", hmax + "px");
			$(".layout-right .panel-scroll").addClass("loaded");
			setTimeout(function () {
				$(".layout-left .swiper-wrapper .swiper-wrapper").each(function () {
					var mh = 0;
					var target = $(this);
					target.find(" > .swiper-slide").each(function () {
						if(mh < $(this).outerHeight())
							mh = $(this).outerHeight();
					});
					if(mh > 0)
						target.find(".swiper-slide > .panel").css("height", mh + "px");
				});
			}, 500)
		}, 500);
		$(".sortable").sortable({
			// revert: true,
			placeholder: "ui-state-highlight",
			start: function (e, ui) {
				$(this).find(".ui-state-highlight").css("width", ui.helper.css("width"));
				$(this).find(".ui-state-highlight").css("height", ui.helper.css("height"));
			},
			create: function () {
				var limit = Number($(this).data("limit"));
				if(limit > 0 && $(this).find(".category").length >= limit)
					$(this).sortable("disable");
			},
			receive: function (e, ui) {
				var limit = Number($(this).data("limit"));
				if(limit > 0 && $(this).find(".category").length >= limit)
					$(this).sortable("disable");
			},
			over: function (e, ui) {
				console.log(ui);
			}
		});
		$(".image-list-container").sortable({
			items: ".image-container",
			placeholder: "ui-state-highlight",
			start: function (e, ui) {
				$(this).find(".ui-state-highlight").css("width", ui.helper.css("width"));
				$(this).find(".ui-state-highlight").css("height", ui.helper.css("height"));
				$(this).find(".ui-state-highlight").css("margin", ui.helper.css("margin"));
			}
		});
		$(".input-list-container").sortable({
			items: ".text-container",
			placeholder: "ui-state-highlight",
			start: function (e, ui) {
				$(this).find(".ui-state-highlight").css("width", ui.helper.css("width"));
				$(this).find(".ui-state-highlight").css("height", ui.helper.css("height"));
				$(this).find(".ui-state-highlight").css("margin", ui.helper.css("margin"));
			}
		});
		$(".draggable").draggable({
			connectToSortable: ".layout-left .sortable",
			helper: "clone",
      revert: true,
      opacity: 0.7,
      snap: true,
      snapMode: "inner",
      snapTolerance: 0
		});
		// $(".category").attr("title", "Kéo thả để chọn vị trí hiển thị");
		$(".category").each(function () {
			$(this).attr("title", $(this).find(".children").data("text"));
		});
		$(".layout-left form").submit(function() {
			$(".input.text").each(function () {
				var input_val_arr = {};
				<?php $row_language = getItems(array("table" => "language", "condition" => "order by `index`")) ?>
				<?php foreach ($row_language as $r_language) { ?>
					input_val_arr.<?= $r_language['uri'] ?> = $(this).data("value_<?= $r_language['uri'] ?>");
				<?php } ?>
				$(this).css("opacity", "0");
				$(this).val(JSON.stringify(input_val_arr));
			});
			$(".position-container").each(function () {
				var input_arr = [];
				var target = $(this);
				target.find(".sortable:not(.children) .category").each(function () {
					var cat = $(this);
					if(cat.data("id") != "") {
						input_arr.push(getCategoryValue(cat, target));
					};
				});
				target.find(".input:not(.layout-input)").val(JSON.stringify(input_arr));
			});
			$(".image-list-container").each(function () {
				var input_arr = [];
				var target = $(this);
				target.find("input:not(.input), textarea:not(.input)").each(function () {
					if($(this).val() != "assets/img/no-image.png") {
						var obj_tmp = { value: $(this).val(), link: $(this).data("link") };
						<?php $row_language = getItems(array("table" => "language", "condition" => "order by `index`")) ?>
						<?php foreach ($row_language as $r_language) { ?>
							obj_tmp.value_<?= $r_language['uri'] ?> = $(this).data("value_<?= $r_language['uri'] ?>");
						<?php } ?>
						input_arr.push(obj_tmp);
					}
				});
				target.find(".input").val(JSON.stringify(input_arr));
			});
			$(".input-list-container").each(function () {
				var input_arr = [];
				var target = $(this);
				target.find("input:not(.input), textarea:not(.input)").each(function () {
					if($(this).val() != "") {
						var obj_tmp = { link: $(this).data("link") };
						<?php $row_language = getItems(array("table" => "language", "condition" => "order by `index`")) ?>
						<?php foreach ($row_language as $r_language) { ?>
							if ($(this).data("value_<?= $r_language['uri'] ?>") != undefined && $(this).data("value_<?= $r_language['uri'] ?>") != "")
								obj_tmp.value_<?= $r_language['uri'] ?> = $(this).data("value_<?= $r_language['uri'] ?>");
						<?php } ?>
						input_arr.push(obj_tmp);
					}
				});
				target.find(".input").val(JSON.stringify(input_arr));
			});
			var success_count = 0;
			var input_count = $(this).find(".input").length;
			$(this).find(".input:not(.group):not(.link)").each(function () {
				var target = $(this);
				$.ajax({
					url: "<?= getAjaxURL() ?>ajax_graph.php",
					type: "post",
					data: { type: target.data("type"), name: target.data("name"), value: target.val(), link: target.data("link") },
					success: function (response) {
						if(response.trim() == "1") {
							success_count++;
							if(success_count == input_count) {
								window.location.reload(true);
							}
						}
						if(response.trim() != "1") {
							alert("Đã có lỗi xảy ra trong quá trình xử lý. Vui lòng thử lại sau!");
						}
					}
				});
			});
			var group_arr = "#";
			$(this).find(".input.group").each(function () {
				var target = $(this);
				if(group_arr.split(target.data("name")).length > 1) {
					success_count++;
					return;
				}
				group_arr += target.data("name") + "#";
				var group_input = [];
				$(".group.group-"+target.data("name")).each(function () {
					var obj_tmp = { type: $(this).data("type"), name: $(this).data("group"), value: $(this).val(), link: $(this).data("link") };
					<?php $row_language = getItems(array("table" => "language", "condition" => "order by `index`")) ?>
					<?php foreach ($row_language as $r_language) { ?>
						if ($(this).data("value_<?= $r_language['uri'] ?>") != undefined && $(this).data("value_<?= $r_language['uri'] ?>") != "")
							obj_tmp.value_<?= $r_language['uri'] ?> = $(this).data("value_<?= $r_language['uri'] ?>");
					<?php } ?>
					group_input.push(obj_tmp);
				});
				var value = JSON.stringify(group_input);
				$.ajax({
					url: "<?= getAjaxURL() ?>ajax_graph.php",
					type: "post",
					data: { type: "group", name: target.data("name"), value: value },
					success: function (response) {
						if(response.trim() == "1") {
							success_count++;
							if(success_count == input_count) {
								window.location.reload(true);
							}
						}
						if(response.trim() != "1") {
							alert("Đã có lỗi xảy ra trong quá trình xử lý. Vui lòng thử lại sau!");
						}
					}
				});
			});
			$(this).find(".input.link:not(.group)").each(function () {
				var target = $(this);
				var group_input = { value: $(this).val(), link: $(this).data("link") };
				var value = JSON.stringify(group_input);
				$.ajax({
					url: "<?= getAjaxURL() ?>ajax_graph.php",
					type: "post",
					data: { type: target.data("type"), name: target.data("name"), value: value },
					success: function (response) {
						if(response.trim() == "1") {
							success_count++;
							if(success_count == input_count) {
								window.location.reload(true);
							}
						}
						if(response.trim() != "1") {
							alert("Đã có lỗi xảy ra trong quá trình xử lý. Vui lòng thử lại sau!");
						}
					}
				});
			});
			return false;
		});
		$(document).scroll(function () {
			var sctop = $(this).scrollTop();
			var lrtop = $(".layout-right").offset().top - 10;
			if(sctop >= lrtop) {
				var pstop = sctop - lrtop;
				$(".layout-right .panel-scroll").css("top", pstop + "px");
			}
			else {
				$(".layout-right .panel-scroll").css("top", "0");
			}
		});
		$(document).trigger("scroll");
	});
	function imgError(target) {
		$(target).attr("src", "../assets/img/no-image.png");
	}
	function removeCategory(target) {
		var limit = Number($(target).closest(".sortable").data("limit"));
		if(limit > 0 && $(target).closest(".sortable").find(".category").length <= limit)
			$(target).closest(".sortable").sortable("enable");
		$(target).closest(".category").remove();
	}
	function editCategory(target) {
		var id = $(target).closest(".category").data("id");
		var width = $(window).outerWidth() - 200;
		var height = $(window).outerHeight() - 50;
		var left = ($(window).outerWidth() - width) / 2;
		var top = ($(window).outerHeight() - height) / 2 + 20;
		var w = window.open("index.php?com=category&act=quick-add&id="+id, "_blank", "titlebar=0,width="+width+",height="+height+",top="+top+",left="+left);
		var intv = setInterval(function () {
			if(w.closed) {
				if(confirm('Cập nhật danh mục thành công. Bạn có muốn tải lại trang không?\n* Chú ý: dữ liệu chưa lưu sẽ bị mất!')) window.location.reload(true);
				clearInterval(intv);
			}
		}, 500);
	}
	function showImageList(target) {
		var id = $(target).closest(".category").data("id");
		var width = $(window).outerWidth() - 200;
		var height = $(window).outerHeight() - 50;
		var left = ($(window).outerWidth() - width) / 2;
		var top = ($(window).outerHeight() - height) / 2 + 20;
		var w = window.open("index.php?com=category-image&act=list&category_id="+id, "_blank", "titlebar=0,width="+width+",height="+height+",top="+top+",left="+left);
	}
	function showTabList(target) {
		var id = $(target).closest(".category").data("id");
		var width = $(window).outerWidth() - 200;
		var height = $(window).outerHeight() - 50;
		var left = ($(window).outerWidth() - width) / 2;
		var top = ($(window).outerHeight() - height) / 2 + 20;
		var w = window.open("index.php?com=category-tab&act=list&category_id="+id, "_blank", "titlebar=0,width="+width+",height="+height+",top="+top+",left="+left);
	}
	function removeSelectedCategory() {
		var id = "(";
		$(".close.checkbox:checked").each(function() {
			id = id + "'" + this.value + "',";
		});
		if(id == "(")
			alert("Bạn chưa chọn mục nào!");
		else {
			id = id.substr(0, id.length - 1) + ")";
			update("category", id, 'delall', function () {
				if(confirm('Thêm danh mục thành công. Bạn có muốn tải lại trang không?\n* Chú ý: dữ liệu chưa lưu sẽ bị mất!')) window.location.reload(true);
			});
		}
	}
	function addCategory() {
		var width = $(window).outerWidth() - 200;
		var height = $(window).outerHeight() - 50;
		var left = ($(window).outerWidth() - width) / 2;
		var top = ($(window).outerHeight() - height) / 2 + 20;
		var w = window.open("index.php?com=category&act=quick-add", "_blank", "titlebar=0,width="+width+",height="+height+",top="+top+",left="+left);
		var intv = setInterval(function () {
			if(w.closed) {
				if(confirm('Thêm danh mục thành công. Bạn có muốn tải lại trang không?\n* Chú ý: dữ liệu chưa lưu sẽ bị mất!')) window.location.reload(true);
				clearInterval(intv);
			}
		}, 500);
	}
	function removeText(id) {
		<?php $row_language = getItems(array("table" => "language", "condition", "order by `index`")) ?>
		<?php foreach ($row_language as $r_language) { ?>
			$(id).attr("data-value_<?= $r_language['uri'] ?>", "");
		<?php } ?>
		$(id).val("");
	}
	function toggleChildren(obj) {
		var cat = $(obj).closest(".category");
		if(cat.data("t") == undefined || cat.data("t") == null || cat.data("t") == "") {
			var tmp = cat.closest(".sortable").attr("data-index") + "-" + cat.closest(".sortable").attr("data-count");
			cat.attr("data-t", tmp);
			cat.closest(".sortable").attr("data-count", (Number(cat.closest(".sortable").attr("data-count"))+1));
		}
		var level = Number(cat.closest(".sortable").attr("data-level")) + 1;
		var limit = JSON.parse(cat.closest(".position-container").attr("data-limit"));
		var datar = cat.attr("data-t");
		if($('.sortable.children.n-' + datar).length > 0) {
			$('.sortable.children.n-' + datar).animate({ height: "100%" }, 500);
			$('.children-close:not(.n-' + datar + ')').fadeOut(500);
			$('.children-close.n-' + datar).fadeIn(500);
			return;
		}
		var target = $(obj).closest(".sortable-container");
		var panel = $(document.createElement("div"));
		panel.attr("class", "sortable children n-" + datar);
		panel.attr("data-limit", limit["level-"+level]);
		panel.attr("data-level", level);
		panel.attr("data-index", datar);
		panel.attr("data-count", 0);
		panel.sortable({
			// revert: true,
			placeholder: "ui-state-highlight",
			start: function (e, ui) {
				$(this).find(".ui-state-highlight").css("width", ui.helper.css("width"));
				$(this).find(".ui-state-highlight").css("height", ui.helper.css("height"));
			},
			create: function () {
				var limit = Number($(this).data("limit"));
				if(limit > 0 && $(this).find(".category").length >= limit)
					$(this).sortable("disable");
			},
			receive: function (e, ui) {
				var limit = Number($(this).data("limit"));
				if(limit > 0 && $(this).find(".category").length >= limit)
					$(this).sortable("disable");
			}
		});
		target.append(panel);
		setTimeout(function () {
			panel.animate({ height: "100%" }, 500);
		}, 0);
		var close = $(document.createElement("button"));
		var datab = datar.split("-");
		datab.shift();
		datab = datab.join("-");
		close.html("<b>" + $(obj).data("text") + '</b>&nbsp;<span class="fa fa-close"></span>');
		close.attr("class", "children-close btn btn-default n-" + datar);
		close.attr("type", "button");
		close.attr("onclick", "$(this).fadeOut(500); $('.sortable.children.n-" + datar + "').animate({ height: '0' }, 500); $('.children-close.n-" + datab + "').fadeIn(500);");
		target.closest(".panel").append(close);
		setTimeout(function () {
			close.fadeIn(500);
		}, 0);
	}
	function getCategoryValue(cat, target) {
		var object = { id: cat.attr("data-id"), value: [] };
		if(cat.attr("data-t")==undefined || cat.attr("data-t")==null || cat.attr("data-t")=="")
			return object;
		target.find('.sortable.children.n-'+cat.attr("data-t")+' .category').each(function (index) {
			if($(this).attr("data-id") != "")
				object.value.push(getCategoryValue($(this), target));
		});
		return object;
	}
	function getCategoryFilter() {
		var val = $(".layout-right .filter-container .filter-input").val();
		if(val == "") {
			$(".layout-right .category").show(0);
		}
		else {
			$(".layout-right .category").hide(0);
			$(".layout-right .category > div:not(.close-container)").each(function () {
				var target = $(this).closest(".category");
				if(changeTitle(target.data("text")).split(changeTitle(val)).length>1) {
					target.show(0);
				}
			});
		}
		var ft = "";
		$(".layout-right .filter-container .filter-chkbox:checked").each(function () {
			ft += ':not([data-type="' + this.value + '"])';
		});
		$(".layout-right .category" + ft).hide(0);
		$('.layout-right .category:hidden .close.checkbox').prop('checked', false);
	}
	$(document).ready(function () {
		CKEDITOR.replace( "modal-txt-editor", {
			baseHref: "<?= getBaseURL(true) ?>",
			contentsCss: ['<?= getBaseURL(true) ?>assets/css/bootstrap.min.css'],
      // enterMode: CKEDITOR.ENTER_BR,
      autoParagraph: false,
      qtBorder: '1',
      qtStyle: { 'border-collapse' : 'collapse' },
      qtClass: 'table_ckeditor',
      qtCellPadding: '5',
      qtCellSpacing: '5',
      width: '100%',
      height: 150,
      removePlugins : 'elementspath',
      filebrowserImageBrowseUrl: '<?= getBaseURL(true) ?>assets/ckfinder/ckfinder.html',
      filebrowserFlashBrowseUrl: '<?= getBaseURL(true) ?>assets/ckfinder/ckfinder.html',
      filebrowserLinkBrowseUrl: '<?= getBaseURL(true) ?>assets/ckfinder/ckfinder.html'
    });
    $("#modal-area-link, #modal-area-input, #modal-area-email, #modal-area-tel, #modal-area-text, #modal-area-color").on("shown.bs.modal", function () {
    	$(this).find(".modal-txt").focus();
    });
	});
	$.fn.modal.Constructor.prototype.enforceFocus = function() {
		var $modalElement = this.$element;
		$(document).on('focusin.modal',function(e) {
			var $parent = $(e.target.parentNode);
			if ($modalElement[0] !== e.target && !$modalElement.has(e.target).length && $(e.target).parentsUntil('*[role="dialog"]').length === 0) {
				$modalElement.focus();
			}
		});
	};
	function linkPopup(obj, title, data="link") {
		if($("#modal-area-input.shown, #modal-area-email.shown, #modal-area-tel.shown, #modal-area-text.shown, #modal-area-editor.shown").length > 0) {
			setTimeout(function () {
				linkPopup(obj, title, data);
			}, 50);
			return;
		}
		$("#modal-area-link").addClass("shown");
		$("#modal-area-link").modal("show");
		$(".modal-txt.link").val($(obj).attr("data-" + data));
		$(".modal-savebtn.link").attr("data-obj", obj);
		$(".modal-savebtn.link").attr("data-data", data);
		$(".modal-title.link").html("'" + title + "'");
		$("#modal-area-link").on("hidden.bs.modal", function () {
			$("#modal-area-link").removeClass("shown");
		});
	}
	function saveLinkPopup(target) {
		if($(".modal-txt.link").is(":invalid"))
			return;
		var obj = $(target).attr("data-obj");
		var data = $(target).attr("data-data");
		var klang = $(target).attr("data-klang");
		var content = $(target).closest(".modal").find(".modal-txt.link").val().trim();
		if(content == "")
			content = "javascript:void(0);";
		$(obj).attr("data-" + data, content);
		if(Number(klang) == 0)
			$(obj).html(content);
		$("#modal-area-link").modal("hide");
		$("#modal-area-link").removeClass("shown");
	}
	function inputPopup(obj, data, title, klang) {
		if ($("#modal-area-input").hasClass("shown")) {
			setTimeout(function () {
				inputPopup(obj, data, title, klang);
			}, 50);
		}
		else {
			$("#modal-area-input").addClass("shown");
			$("#modal-area-input").modal("show");
			$(".modal-txt.input").val($(obj).attr("data-" + data));
			$(".modal-savebtn.input").attr("data-obj", obj);
			$(".modal-savebtn.input").attr("data-data", data);
			$(".modal-savebtn.input").attr("data-klang", klang);
			$(".modal-title.input").html("'" + title + "'");
			$("#modal-area-input").on("hidden.bs.modal", function () {
				$("#modal-area-input").removeClass("shown");
			});
		}
	}
	function saveInputPopup(target) {
		if($(".modal-txt.input").is(":invalid"))
			return;
		var obj = $(target).attr("data-obj");
		var data = $(target).attr("data-data");
		var klang = $(target).attr("data-klang");
		var content = $(target).closest(".modal").find(".modal-txt.input").val().trim();
		$(obj).attr("data-" + data, content);
		if(Number(klang) == 0)
			$(obj).html(content);
		$("#modal-area-input").modal("hide");
		$("#modal-area-input").removeClass("shown");
	}
	function emailPopup(obj, data, title, klang) {
		if ($("#modal-area-email").hasClass("shown")) {
			setTimeout(function () {
				emailPopup(obj, data, title, klang);
			}, 50);
		}
		else {
			$("#modal-area-email").addClass("shown");
			$("#modal-area-email").modal("show");
			$(".modal-txt.email").val($(obj).attr("data-" + data));
			$(".modal-savebtn.email").attr("data-obj", obj);
			$(".modal-savebtn.email").attr("data-data", data);
			$(".modal-savebtn.email").attr("data-klang", klang);
			$(".modal-title.email").html("'" + title + "'");
			$("#modal-area-email").on("hidden.bs.modal", function () {
				$("#modal-area-email").removeClass("shown");
			});
		}
	}
	function saveEmailPopup(target) {
		if($(".modal-txt.email").is(":invalid"))
			return;
		var obj = $(target).attr("data-obj");
		var data = $(target).attr("data-data");
		var klang = $(target).attr("data-klang");
		var content = $(target).closest(".modal").find(".modal-txt.email").val().trim();
		$(obj).attr("data-" + data, content);
		if(Number(klang) == 0)
			$(obj).html(content);
		$("#modal-area-email").modal("hide");
		$("#modal-area-email").removeClass("shown");
	}
	function telPopup(obj, data, title, klang) {
		if ($("#modal-area-tel").hasClass("shown")) {
			setTimeout(function () {
				telPopup(obj, data, title, klang);
			}, 50);
		}
		else {
			$("#modal-area-tel").addClass("shown");
			$("#modal-area-tel").modal("show");
			$(".modal-txt.tel").val($(obj).attr("data-" + data));
			$(".modal-savebtn.tel").attr("data-obj", obj);
			$(".modal-savebtn.tel").attr("data-data", data);
			$(".modal-savebtn.tel").attr("data-klang", klang);
			$(".modal-title.tel").html("'" + title + "'");
			$("#modal-area-tel").on("hidden.bs.modal", function () {
				$("#modal-area-tel").removeClass("shown");
			});
		}
	}
	function saveTelPopup(target) {
		if($(".modal-txt.tel").is(":invalid"))
			return;
		var obj = $(target).attr("data-obj");
		var data = $(target).attr("data-data");
		var klang = $(target).attr("data-klang");
		var content = $(target).closest(".modal").find(".modal-txt.tel").val().trim();
		$(obj).attr("data-" + data, content);
		if(Number(klang) == 0)
			$(obj).html(content);
		$("#modal-area-tel").modal("hide");
		$("#modal-area-tel").removeClass("shown");
	}
	function textPopup(obj, data, title, klang) {
		if ($("#modal-area-text").hasClass("shown")) {
			setTimeout(function () {
				textPopup(obj, data, title, klang);
			}, 50);
		}
		else {
			$("#modal-area-text").addClass("shown");
			$("#modal-area-text").modal("show");
			$(".modal-txt.text").val($(obj).attr("data-" + data));
			$(".modal-savebtn.text").attr("data-obj", obj);
			$(".modal-savebtn.text").attr("data-data", data);
			$(".modal-savebtn.text").attr("data-klang", klang);
			$(".modal-title.text").html("'" + title + "'");
			$("#modal-area-text").on("hidden.bs.modal", function () {
				$("#modal-area-text").removeClass("shown");
			});
		}
	}
	function saveTextPopup(target) {
		if($(".modal-txt.text").is(":invalid"))
			return;
		var obj = $(target).attr("data-obj");
		var data = $(target).attr("data-data");
		var klang = $(target).attr("data-klang");
		var content = $(target).closest(".modal").find(".modal-txt.text").val().trim();
		$(obj).attr("data-" + data, content);
		if(Number(klang) == 0)
			$(obj).html(content);
		$("#modal-area-text").modal("hide");
		$("#modal-area-text").removeClass("shown");
	}
	function editorPopup(obj, data, title, klang) {
		if ($("#modal-area-editor").hasClass("shown")) {
			setTimeout(function () {
				editorPopup(obj, data, title, klang);
			}, 50);
		}
		else {
			$("#modal-area-editor").addClass("shown");
			$("#modal-area-editor").modal("show");
			CKEDITOR.instances['modal-txt-editor'].setData($(obj).attr("data-" + data));
			$("#modal-savebtn-editor").attr("data-obj", obj);
			$("#modal-savebtn-editor").attr("data-data", data);
			$("#modal-savebtn-editor").attr("data-klang", klang);
			$("#modal-title-editor").html("'" + title + "'");
			$("#modal-area-editor").on("hidden.bs.modal", function () {
				$("#modal-area-editor").removeClass("shown");
			});
		}
	}
	function saveEditorPopup(target) {
		var obj = $(target).attr("data-obj");
		var data = $(target).attr("data-data");
		var klang = $(target).attr("data-klang");
		var content = CKEDITOR.instances['modal-txt-editor'].getData();
		$(obj).attr("data-" + data, content);
		if(Number(klang) == 0)
			$(obj).html(content);
		$("#modal-area-editor").modal("hide");
		$("#modal-area-editor").removeClass("shown");
	}
	function colorPopup(obj, title) {
		if ($("#modal-area-color").hasClass("shown")) {
			setTimeout(function () {
				colorPopup(obj, title);
			}, 50);
		}
		else {
			$("#modal-area-color").addClass("shown");
			$("#modal-area-color").modal("show");
			$(".modal-txt.color").val($(obj).val());
			if($(obj).val().trim() != "")
				$(".modal-txt.color").next().val($(obj).val());
			else
				$(".modal-txt.color").next().val("#abcdef");
			$(".modal-savebtn.color").attr("data-obj", obj);
			$(".modal-title.color").html(title);
			$("#modal-area-color").on("hidden.bs.modal", function () {
				$("#modal-area-color").removeClass("shown");
			});
		}
	}
	function saveColorPopup(target) {
		if($(".modal-txt.color").is(":invalid"))
			return;
		var obj = $(target).attr("data-obj");
		var content = $(target).closest(".modal").find(".modal-txt.color").val().trim();
		$(obj).val(content);
		$(obj).css("background-color", content);
		$("#modal-area-color").modal("hide");
		$("#modal-area-color").removeClass("shown");
	}
	function addImage(target, link, type) {
		$(target).parent().attr("data-count", (Number($(target).parent().attr("data-count"))+1));
		var name = $(target).parent().attr("data-name");
		var group = $(target).parent().attr("data-group");
		var title = $(target).parent().attr("data-title");
		var count = $(target).parent().attr("data-count");
		var lfunc = "";
		var func = [];
		if(link == true || link == "true")
			lfunc = " linkPopup('#"+name+"_input_"+group+"_"+count+"', '"+title+"');";
		if(type) {
			<?php foreach ($row_language as $k_language => $r_language): ?>
				func.push(type+"Popup('#"+name+"_input_"+group+"_"+count+"', 'value_<?= $r_language['uri'] ?>', '"+title+" <?= $r_language['title'] ?>', <?= $k_language ?>); ");
			<?php endforeach ?>
		}
		func = func.join("") + lfunc;
		$(target).parent().append(`<div class="image-container" style="float: left; width: ` + $(target).css("width") + `;"><button type="button" class="close image-close" onclick="$(this).parent().remove();">x</button><div onclick="openBrowser('#`+name+`_img_`+group+`_`+count+`', '#`+name+`_input_`+group+`_`+count+`', false); `+func+`"><img id="`+name+`_img_`+group+`_`+count+`" src="../assets/img/no-image.png" onerror="imgError(this)" title="Chọn hình `+title+`" style="cursor: pointer;"><input id="`+name+`_input_`+group+`_`+count+`" name="`+name+`[]" type="hidden" value="assets/img/no-image.png" data-value=""><div class="image-label">Hình `+title+`</div></div></div>`);
	}
	function addInput(target, link, type) {
		$(target).parent().attr("data-count", (Number($(target).parent().attr("data-count"))+1));
		var name = $(target).parent().attr("data-name");
		var group = $(target).parent().attr("data-group");
		var title = $(target).parent().attr("data-title");
		var count = $(target).parent().attr("data-count");
		var lfunc = "";
		var func = [];
		var data_content = [];
		if(link == true || link == "true")
			lfunc = "linkPopup('#"+name+"_input_"+group+"_"+count+"', '"+title+"');";
		if(type) {
			<?php foreach ($row_language as $k_language => $r_language): ?>
				func.push(type+"Popup('#"+name+"_input_"+group+"_"+count+"', 'value_<?= $r_language['uri'] ?>', '"+title+" <?= $r_language['title'] ?>', <?= $k_language ?>); ");
				data_content.push("data-value_<?= $r_language['uri'] ?>");
			<?php endforeach ?>
		}
		func = func.join("") + lfunc;
		data_content = data_content.join(" ");
		$(target).parent().append(`<div class="text-container" style="float: left; width: ` + $(target).css("width") + `;"><button type="button" class="close text-close" onclick="$(this).parent().remove();">x</button><div onclick="`+func+`"><textarea class="form-control" id="`+name+`_input_`+group+`_`+count+`" name="`+name+`[]" type="hidden" value="" data-value="" data-type="text" data-link="" `+data_content+` placeholder="Không có nội dung" readonly></textarea><div class="text-label">Hình `+title+`</div></div></div>`);
	}
</script>
<style>
.layout-left .sortable:not(.children),
.image-list-container,
.input-list-container {
	position: relative !important;
	padding: 5px !important;
	border: none !important;
	background: transparent !important;
	overflow: hidden !important;
}
.image-list-container,
.input-list-container,
.layout-left .panel-body .sortable-container {
	box-shadow: 0 0 3px 1px #000 !important;
	width: calc(100% - 16px) !important;
	margin: 8px !important;
}
.input-list-container .text-container {
	cursor: pointer;
}
.input-list-container .text-container textarea {
	pointer-events: none;
}
.layout-left .sortable:not(.children) {
	min-height: 114px !important;
}
.layout-left .sortable.children {
	position: absolute !important;
	top: 0;
	right: 0;
	left: 0;
	height: 0;
	width: unset !important;
	z-index: 999 !important;
	background: #fff !important;
	overflow-x: hidden !important;
	overflow-y: auto !important;
}
.children-close {
	display: none;
	position: absolute;
	top: 5px;
	right: 5px;
	padding: 0px 10px;
	height: 30px;
	outline: none !important;
	box-shadow: none !important;
}
.layout-right .category {
	width: calc(50% - 4px) !important;
	z-index: 999 !important;
}
.layout-left .sortable:before {
	content: "Kéo danh mục vào đây!";
	position: absolute;
	top: 50%;
	left: 50%;
	-webkit-transform: translate(-50%, -50%);
	-ms-transform: translate(-50%, -50%);
	-o-transform: translate(-50%, -50%);
	transform: translate(-50%, -50%);
	pointer-events: none;
	color: #777;
	opacity: .5;
}
.layout-left .sortable .ui-draggable-dragging {
	margin: 0 !important;
}
.layout-container {
	position: relative;
	padding: 10px;
	border: solid 1px #ccc;
	background: #f9f9f9;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	-o-user-select: none;
	user-select: none;
}
.layout-container .well {
	border-radius: 0;
	margin-bottom: 0;
	border-color: #337AB7;
	background: rgba(0,0,0,.1);
	box-shadow: none;
	min-height: 108px;
}
.layout-container > center:first-child {
	margin-top: 10px;
	margin-bottom: 15px;
}
.layout-container > center:last-child {
	margin-top: 15px;
	margin-bottom: 10px;
}
.layout-container .row {
	margin: 0;
}
.layout-container .row > div {
	padding: 0;
}
.panel {
	border-radius: 0;
	margin-bottom: 0;
	font-weight: 600;
}
.panel-heading {
	border-radius: 0;
	border: none;
}
.panel-body {
	padding: 5px;
	overflow: auto;
	min-height: 65px;
}
.layout-left .panel {
	position: relative;
}
.layout-left .panel-body {
	position: relative;
}
.layout-left .panel-body .sortable-container {
	position: relative;
}
.panel .category {
	position: relative;
	margin: calc(20px / 2);
	background: #f3f3f3;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	-o-user-select: none;
	user-select: none;
}
.layout-right .panel-body {
	padding: calc(8px - 5px / 2) calc(8px - (5px - 3px) / 2);
	min-height: 55px;
}
.layout-right .panel .category {
	text-align: center;
	margin: calc(5px / 2) calc((5px - 3px) / 2)
}
.layout-left .panel .category {
	max-width: calc(100% - 24px);
}
.layout-container .close-container,
.ui-draggable-dragging .close-container {
	margin-top: 0 !important;
	display: unset !important;
  margin-bottom: 0 !important;
  border-top: none !important;
  padding-top: 0 !important;
}
.layout-right .category.option .close-container {
	display: none !important;
}
.close {
	font-size: 14px;
	opacity: .8 !important;
	-webkit-transition: all .3s;
	-o-transition: all .3s;
	transition: all .3s;
}
.category .close {
	opacity: .5 !important;
}
.close:hover {
	opacity: 1 !important;
}
.layout-container .close {
	display: block !important;
	position: absolute !important;
	top: -9px !important;
	right: -9px !important;
	background: white !important;
	box-shadow: 0 0 1px #000 !important;
	width: 18px !important;
	height: 18px !important;
	line-height: 0 !important;
	font-size: 14px !important;
	border-radius: 50% !important;
	outline: none !important;
	-webkit-transition: background .2s;
	-o-transition: background .2s;
	transition: background .2s;
}
.layout-container .close.edit,
.layout-container .close.children {
	display: block !important;
	top: auto !important;
	bottom: -9px !important;
}
.layout-container .close.picker {
	top: auto !important;
	right: auto !important;
	bottom: -9px !important;
	left: -9px !important;
}
.layout-container .close.children {
	left: -9px !important;
}
.layout-container .close.imglist {
	top: -9px !important;
	left: -9px !important;
	bottom: auto !important;
	margin-left: 0 !important;
	font-size: 12px !important;
}
.layout-container .close.tablist {
	top: -9px !important;
	left: 14px !important;
	bottom: auto !important;
	margin-left: 0 !important;
	font-size: 12px !important;
}
.layout-container .nosub-1 [data-level="1"] .close.children,
.layout-container .nosub-2 [data-level="2"] .close.children,
.layout-container .nosub-3 [data-level="3"] .close.children,
.layout-container .nosub-4 [data-level="4"] .close.children,
.layout-container .nosub-5 [data-level="5"] .close.children {
	display: none !important;
}
.layout-container .delete,
.layout-container .duplicate,
.layout-container .checkbox {
	display: none !important;
}
.ui-draggable-dragging .close {
	display: none !important;
}
.layout-container .close:hover {
	background: #ddd !important;
}
.fullwidth .draggable:not(.ui-draggable-dragging) {
	width: calc(100% - 12px) !important;
}
.layout-left {
	float: left;
	width: calc(100% - 360px);
}
.layout-right {
	position: relative;
	float: right;
	width: 350px;
}
.category {
	float: left;
	text-align: center;
	padding: 5px 10px;
	border-radius: 4px;
	background: #fff;
	border: solid 1px rgba(0,0,0,.2);
	cursor: move;
	z-index: 999 !important;
	width: max-content !important;
	width: -webkit-max-content !important;
	height: auto !important;
}
.layout-right .panel-scroll.loaded {
	position: absolute;
	top: 0;
}
.ui-sortable-helper .close.hidden {
	display: block !important;
}
.ui-draggable-dragging,
.ui-sortable-helper {
	color: #777;
}
.layout-left .category.draggable {
	color: #a94442;
}
.category.enable-0 > div:not(.close-container) {
	opacity: .5;
}
.image-container,
.mp4-container,
.color-container,
.text-container,
.video-container {
	position: relative;
	box-shadow: 0 0 3px 1px #000;
	margin: 8px;
}
.video-container .iframe-container {
	cursor: pointer;
}
.add-container {
	height: 100px;
	margin: 8px;
	font-size: 42px;
	color: #fff;
	background: #eee;
	box-shadow: 0 0 3px 1px #000;
	text-shadow: 0px 1px 3px #000;
	cursor: pointer;
}
.video-container iframe {
	width: 100%;
	height: 100px;
	pointer-events: none;
}
.image-container.panel-body,
.mp4-container.panel-body,
.color-container.panel-body,
.text-container.panel-body,
.video-container.panel-body {
	padding: 5px;
}
.image-container .panel-body,
.mp4-container .panel-body {
	min-height: max-content;
}
.image-container > div,
.mp4-container > div {
	cursor: pointer;
}
.image-container img,
.mp4-container video {
	padding: 5px;
	max-width: 100%;
	height: 100px;
	margin: auto;
	display: block;
	-webkit-transition: all .5s;
	-o-transition: all .5s;
	transition: all .5s;
}
.image-container .text-primary,
.mp4-container .text-primary {
	margin-bottom: 5px;
}
.image-container .image-close,
.mp4-container .mp4-close,
.color-container .color-close,
.text-container .text-close,
.video-container .video-close {
	position: absolute;
	right: 15px;
	top: 15px;
	line-height: 14px;
	z-index: 999;
}
.image-container .image-label,
.mp4-container .mp4-label,
.color-container .color-label,
.text-container .text-label,
.video-container .video-label {
	position: absolute;
	/*top: 50%;*/
	/*left: 50%;*/
	top: 5px;
	left: 5px;
	width: max-content;
	max-width: calc(100% - 10px);
	padding: 2px 5px;
	margin: auto;
	font-size: 11px;
	line-height: 18px;
	box-shadow: 0 0 0 1px #000;
	pointer-events: none;
	z-index: 9;
	color: #000;
	background: rgba(255,255,255,.2);
	/*-webkit-transform: translate(-50%, -50%);*/
	/*-ms-transform: translate(-50%, -50%);*/
	/*-o-transform: translate(-50%, -50%);*/
	/*transform: translate(-50%, -50%);*/
	-webkit-transition: background .5s, color .5s, box-shadow .5s;
	-o-transition: background .5s, color .5s, box-shadow .5s;
	transition: background .5s, color .5s, box-shadow .5s;
}
.text-container .text-label {
	left: auto;
	right: 5px;
	background: #fff;
	top: auto;
	bottom: 5px;
}
.image-container:hover .image-label,
.mp4-container:hover .mp4-label,
.color-container:hover .color-label,
.text-container:hover .text-label,
.video-container:hover .video-label {
	background: #000;
	color: #fff;
	box-shadow: 0 0 0 1px #fff;
}
textarea[data-type="text"],
input[data-type="color"],
input[type="color"] {
	position: relative;
	display: block;
	margin: auto;
	border-radius: 0;
	width: 100%;
	height: 100px;
	outline: none !important;
	border: none;
	cursor: pointer;
	-webkit-transition: all .5s;
	-o-transition: all .5s;
	transition: all .5s;
}
textarea[data-type="text"] {
	cursor: text;
	-webkit-transition: all .5s, opacity 0s;
	-o-transition: all .5s, opacity 0s;
	transition: all .5s, opacity 0s;
}
input[data-type="color"] {
	color: #000;
	text-shadow: calc(0.5px) calc(0.5px) 1px #fff;
	font-size: 16px;
	letter-spacing: 1px;
}
input[type="color"]::-webkit-color-swatch-wrapper {
	padding: 0;
}
input[type="color"]::-webkit-color-swatch {
	border: none;
}
input[type="color" i] {
	padding: 0 !important;
}
<?php if($user['type'] != "master"): ?>
	.category.lock-1 .imglist,
	.category.lock-1 .tablist/*,
	.category.lock-1 .close:not(.children):not(.edit)*/ {
		display: none !important;
	}
	.position-container.lock-panel .category .close:not(.children):not(.edit) {
		display: none !important;
	}
<?php endif ?>
.category.lock-image .imglist,
.category.lock-tab .tablist {
	display: none !important;
}
.category .fa.fa-lock {
	font-size: 12px;
}
.category.lock-0 .fa.fa-lock {
	display: none;
}
.ui-state-highlight {
	float: left;
	background: rgba(255,165,0,.2);
}
.layout-left .sortable .ui-state-highlight {
	margin: calc(24px / 2);
}
#modal-area-editor {
	z-index: 1001 !important;
}
</style>