<?php

  if (count(explode("/admin/", $_SERVER['REQUEST_URI'])) <= 1) {
    header("location: admin/");
    exit();
  }
  header('X-XSS-Protection:0');
  session_start();
  date_default_timezone_set("Asia/Ho_Chi_Minh");
  @define ( '_template' , './templates/');
  @define ( '_source' , './sources/');
  @define ( '_lib' , '../lib/');
  include_once _lib."config.php";
  include_once _lib."class.database.php";
  include_once _lib."functions.php";
  include_once _lib."pagination.php";
  include_once _lib."file_requick_admin.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?=getBaseURL(true)?>assets/fonts/roboto/roboto.css" rel="stylesheet">
    <link href="<?=getBaseURL(true)?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=getBaseURL(true)?>assets/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?=getBaseURL(true)?>assets/css/dashboard.min.css" rel="stylesheet">
    <link href="<?=getBaseURL(true)?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="<?=getBaseURL(true)?>assets/js/jquery.min.js"></script>
    <script src="<?=getBaseURL(true)?>assets/js/bootstrap.min.js"></script>
    <script src="<?=getBaseURL(true)?>assets/js/metisMenu.js"></script>
    <link rel="shortcut icon" href="<?=getBaseURL(true).$information['favicon']?>">
    <title><?=$information['title']?></title>
  </head>
  <body style="min-width: 1170px;">
    <?php if(@$_COOKIE['user']['username'] != ""): ?>
      <?php include _source."ajax.php"; ?>
      <?php if ($_GET['act']!="quick-add" && $_GET['com']!="category-image"): ?>
        <div id="header">
          <?php include _template."layout/header.php"; ?>
        </div>
      <?php endif ?>
      <div id="content" class="container-fluid">
        <div class="row">
          <?php if ($_GET['act']!="quick-add" && $_GET['com']!="category-image"): ?>
            <div class="col-xs-2 sidebar">
              <?php include _template."layout/sidebar.php"; ?>
            </div>
          <?php endif ?>
          <?php if ($_GET['act']!="quick-add" && $_GET['com']!="category-image"): ?>
            <div class="col-xs-10 main">
          <?php else: ?>
            <div class="col-xs-12 main">
          <?php endif ?>
            <?php include _template.$template."_tpl.php"; ?>
          </div>
        </div>
      </div>
      <?php if ($_GET['com']!="category" && ($_GET['act']!="quick-add") && $_GET['com']!="category-image"):
        include _template."layout/footer.php";
      endif;
    else:
      include _template.$template."_tpl.php";
    endif;?>
    <style type="text/css">
      /*html, body {
        user-select: none;
        -webkit-user-select: none;
        cursor: default;
      }*/
      textarea.form-control {
        resize: vertical;
      }
    </style>
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.fancybox.min.css"/>
    <script src="../assets/js/jquery.fancybox.min.js"></script>
    <script src="<?=getBaseURL(true)?>assets/ckeditor/ckeditor.js"></script>
    <script src="<?=getBaseURL(true)?>assets/ckfinder/ckfinder.js"></script>
    <script>CKEDITOR.dtd.$removeEmpty['span'] = false;</script>
    <script type="text/javascript">
      $(document).ready(function() {
        CKEDITOR.on( 'dialogDefinition', function( ev ) {
          var dialogName = ev.data.name;
          var dialogDefinition = ev.data.definition;
          if ( dialogName == 'image' ) {
            var infoTab = dialogDefinition.getContents( 'info' );
            var browseHidden = infoTab.get( 'txtUrl' );
            var browseButton = infoTab.get( 'browse' );
            browseButton.hidden = false;
            dialogDefinition.dialog.on("show", function () {
              $(".cke_dialog_background_cover").css("z-index", "1002");
              $(".cke_dialog").css("z-index", "1003");
            });
            browseButton.onClick = function () {
              var selectedImageBrowser = function(fileUrl, data) {
                $("#modal-ckfinder").modal("hide");
                dialogDefinition.dialog.setValueOf('info', 'txtUrl', fileUrl);
                setTimeout(function () {
                  dialogDefinition.dialog.setValueOf('info', 'txtWidth', '');
                  dialogDefinition.dialog.setValueOf('info', 'txtHeight', '');
                }, 100);
              };
              window.ckPopupCloseEvent = true;
              var finder = new CKFinder();
              finder.disableHelpButton = true;
              finder.selectMultiple = true;
              finder.callback = function (api) {
                var toolGroup = api.document.getElementsByClassName("cke_toolgroup");
                var toolGroupItem = $(api.document.getElementsByClassName("cke_button_upload")).parent().clone();
                toolGroupItem.find("[id]").removeAttr("id");
                toolGroupItem.find(".cke_icon").css("background-image", "url('../assets/img/ckfinder_select_icon.png')");
                toolGroupItem.find(".cke_icon").css("background-size", "calc(100% - 1px) calc(100% - 1px)");
                toolGroupItem.find(".cke_icon").css("background-position", "top center");
                toolGroupItem.find(".cke_label").html("Chọn hình");
                toolGroupItem.find(".cke_button_upload").removeAttr("onclick");
                toolGroupItem.find(".cke_button_upload").attr("href", "javascript:void('Chọn hình')");
                toolGroupItem.find(".cke_button_upload").click(function () {
                  finder.selectActionFunction(api.getSelectedFile().getUrl(), null, null);
                });
                $(toolGroup).prepend(toolGroupItem);
                // api.showTool(api.addTool(`<h2 style="color: red;">Lưu ý: Giữ Ctrl để chọn nhiều hình!</h2>`));
              };
              finder.selectActionFunction = selectedImageBrowser;
              $("#modal-ckfinder-body").html("");
              $("#modal-ckfinder").modal("show");
              finder.replace("modal-ckfinder-body");
            };
          }
        });
        $(".editor").each(function() {
          CKEDITOR.replace( this.id, {
            baseHref: "<?= getBaseURL(true) ?>",
            contentsCss: ['<?=getBaseURL(true)?>assets/css/bootstrap.min.css'],
            // enterMode: CKEDITOR.ENTER_BR,
            autoParagraph: false,
            qtBorder: '1',
            qtStyle: { 'border-collapse' : 'collapse' },
            qtClass: 'table_ckeditor',
            qtCellPadding: '5',
            qtCellSpacing: '5',
            width: '100%',
            height: 350,
            removePlugins : 'elementspath',
            filebrowserImageBrowseUrl: '<?=getBaseURL(true)?>assets/ckfinder/ckfinder.html',
            filebrowserFlashBrowseUrl: '<?=getBaseURL(true)?>assets/ckfinder/ckfinder.html',
            filebrowserLinkBrowseUrl: '<?=getBaseURL(true)?>assets/ckfinder/ckfinder.html'
          });
        });
        $('*[disabled]').each(function() {
          $('form').append('<input name="'+$(this).attr('name')+'" type="hidden" value="'+$(this).val()+'">');
        });
      });
      function openBrowser(imgid, inputid, rf=undefined, cb=undefined) {
        var selectedImage = function(fileUrl, data, fileList) {
          if(imgid == "folder") {
            var fileListUrl = [];
            for(i in fileList) {
              if(fileListUrl.indexOf(fileList[i].url) >= 0) continue;
              fileListUrl.push(fileList[i].url);
            }
            rf(fileListUrl);
            $("#modal-ckfinder").modal("hide");
            return;
          }
          var fileListUrl = [];
          for (i in fileList)
            fileListUrl.push(fileList[i].url);
          $("#modal-ckfinder").modal("hide");
          if(rf == undefined || rf == false || rf) {
            $(imgid).attr("src", "../" + fileUrl);
            $(inputid).val(fileUrl);
            if(cb != undefined && cb)
              setTimeout(function() { cb(fileUrl, fileListUrl); }, 100);
          }
          else {
            rf(fileUrl, fileListUrl);
          }
        };
        window.ckPopupCloseEvent = true;
        var finder = new CKFinder();
        finder.disableHelpButton = true;
        if(imgid == "folder")
	        finder.selectMultiple = true;
	      else
	        finder.selectMultiple = false;
        finder.callback = function (api) {
          var toolGroup = api.document.getElementsByClassName("cke_toolgroup");
          var toolGroupItem = $(api.document.getElementsByClassName("cke_button_upload")).parent().clone();
          toolGroupItem.find("[id]").removeAttr("id");
          toolGroupItem.find(".cke_icon").css("background-image", "url('../assets/img/ckfinder_select_icon.png')");
          toolGroupItem.find(".cke_icon").css("background-size", "calc(100% - 1px) calc(100% - 1px)");
          toolGroupItem.find(".cke_icon").css("background-position", "top center");
          toolGroupItem.find(".cke_label").html("Chọn hình");
          toolGroupItem.find(".cke_button_upload").removeAttr("onclick");
          toolGroupItem.find(".cke_button_upload").attr("href", "javascript:void('Chọn hình')");
          toolGroupItem.find(".cke_button_upload").click(function () {
            var fileListUrl = [];
            var fileList = api.getSelectedFiles();
            for(i in fileList) {
              if(fileListUrl.indexOf(fileList[i].getUrl()) >= 0) continue;
              fileListUrl.push({ url: fileList[i].getUrl() });
            }
            finder.selectActionFunction(api.getSelectedFile().getUrl(), null, fileListUrl);
          });
          $(toolGroup).prepend(toolGroupItem);
          api.showTool(api.addTool(`<h2 style="color: red;">Lưu ý: Giữ Ctrl để chọn nhiều hình!</h2>`));
          if(imgid == "folder") {
            api.addFolderContextMenuOption({ label: 'Chọn thư mục' }, function( api, folder ) {
            	folder.getFiles(function (fileList) {
            		for(i in fileList)
            			fileList[i].url = fileList[i].getUrl();
	              finder.selectActionFunction(folder.getUrl(), null, fileList);
            	});
            });
          }
        };
        finder.selectActionFunction = selectedImage;
        <?php if ($source == "graph"): ?>
          if (cb != undefined && cb != false) {
            $("#modal-ckfinder").on("hidden.bs.modal", function () {
              cb();
            });
          }
        <?php endif ?>
        $("#modal-ckfinder-body").html("");
        $("#modal-ckfinder").modal("show");
        finder.replace("modal-ckfinder-body");
      }
      function openFileDialog(imgid, inputid, rf=undefined, cb=undefined) {
        var fileDialog = $('<input type="file" '+(imgid=="folder" ? "multiple" : "")+'>');
        fileDialog.on('change', function (e) {
            var uploadUrl = "<?= getBaseURL(true) ?>assets/ckeditor/upload.php";
            var files = fileDialog[0].files;
            var imageData = new FormData();
            for(i in files)
              imageData.append('file[]', files[i]);
            $.ajax({
              url: uploadUrl,
              type: 'POST',
              contentType: false,
              processData: false,
              data: imageData
            }).done(function(done) {
              var result = done.split(";");
              var fileListUrl = [];
              if(imgid == "folder") {
                for(i in result) {
                  if(fileListUrl.indexOf(result[i]) >= 0) continue;
                  fileListUrl.push(result[i]);
                }
                rf(fileListUrl);
                return;
              }
              for (i in result)
                fileListUrl.push(result[i]);
              if(rf == undefined || rf == false) {
                $(imgid).attr("src", "../" + fileListUrl[0]);
                $(inputid).val(fileListUrl[0]);
                if(cb != undefined && cb && false)
                  setTimeout(function() { cb(fileListUrl[0], fileListUrl); }, 100);
              }
              else {
                rf(fileListUrl[0], fileListUrl);
              }
            });
        });
        fileDialog.trigger("click");
      }
    </script>
    <?php if (in_array($_GET['com'], array( "graph", "website", "email" )) || in_array($_GET['act'], array( "edit", "quick-add" ))): ?>
      <script>
        $(document).ready(function () {
          window.escapePressing = false;
          $("body").on("keyup", function (e) {
            if(!window.escapePressing) {
              window.escapePressing = true;
              if(e.keyCode == 113) {
                if(confirm("Bạn có chắc chắn muốn LƯU thay đổi ?")) {
                  $($('[type="submit"]').get(0)).trigger("click");
                }
                else
                  setTimeout(function() { window.escapePressing = false; }, 500);
              }
              if(e.keyCode == 27) {
                if(confirm("Bạn có chắc chắn muốn TẢI LẠI trang ?\nChú ý: Mọi thay đổi sẽ bị mất!")) {
                  <?php if (in_array($_GET['com'], array( "graph", "website", "email" ))): ?>
                    window.location.reload(true);
                    <?php else: ?>
                      if($('[type="submit"]').next().hasClass("btn-danger")) {
                        window.history.go(-1);
                      }
                      else {
                        window.location.reload(true);
                      }
                    <?php endif ?>
                  }
                  else
                    setTimeout(function() { window.escapePressing = false; }, 500);
                }
              }
            });
        });
      </script>
    <?php endif ?>
    <script>
      $(document).ready(function () {
        $("form").submit(function () {
          if($(this).find(".required").length > 0) {
            var kt = 0;
            $(this).find(".required").each(function () {
              if($(this).val() == "" || $(this).val() == null) {
                kt=1;
                alert("Vui lòng nhập nội dung trường '" + $(this).attr("title") + "'");
                $(this).focus();
              }
            });
            if(kt == 1)
              return false;
          }
        });
      });
    </script>
    <style type="text/css">
      table img,
      .well img,
      table svg,
      .well svg {
        max-width: 150px;
        height: auto !important;
        background-color: #E9E9E9 !important;
      }
      label.form-control {
        height: auto;
      }
    </style>
    <script>
      $(document).ready(function () {
        $(".checkbox-filter").on("input", function () {
          var target = $($(this).data("target"));
          var val = $(this).val();
          if(val == "") {
            target.find('.checkbox-container').show(0);
          }
          else {
            target.find('.checkbox-container').hide(0);
            target.find('.checkbox-container').each(function () {
              if(changeTitle($(this).data("text")).split(changeTitle(val)).length>1) {
                $(this).show(0);
              }
            });
          }
        });
        $('.checkbox-container input[type="checkbox"]').attr("tabindex", "-1");
      });
      function changeTitle(str) {
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a").replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e").replace(/ì|í|ị|ỉ|ĩ/g, "i").replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o").replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u").replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y").replace(/đ/g, "d").replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A").replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E").replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I").replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O").replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U").replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y").replace(/Đ/g, "D");
        str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); // huyền, sắc, hỏi, ngã, nặng 
        str = str.replace(/\u02C6|\u0306|\u031B/g, ""); // mũ â (ê), mũ ă, mũ ơ (ư)
        str = str.trim().replace(/[^a-zA-Z0-9]+/g, "-"); // mũ â (ê), mũ ă, mũ ơ (ư)
        return str.toLowerCase();
      }
    </script>
    <div id="modal-ckfinder" class="modal fade" style="background: #fff;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div id="modal-ckfinder-body" class="modal-body" style="height: calc(100vh - 60px);"></div>
        </div>
      </div>
    </div>
    <style>
      #modal-ckfinder .modal-dialog {
        width: 934px;
      }
      #modal-ckfinder iframe {
        height: 100% !important;
      }
      form table.table {
        margin-bottom: 0;
      }
    </style>
    <script src="<?= getBaseURL(true) ?>assets/plupload-3.1.2/js/plupload.full.min.js"></script>
    <script>
      window.addEventListener("load", function () {
        if (document.getElementById("pickfiles") != null) {
          var uploader = new plupload.Uploader({
            runtimes : 'html5,flash,silverlight,html4',
            browse_button : 'pickfiles',
            container: document.getElementById('container'),
            url : "<?= getAjaxURL() ?>large_upload.php",
            chunk_size: '5120kb',
            filters : {
              max_file_size : '2048mb',
              mime_types: [ { extensions : $("#filelist").data("ext") } ]
            },
            flash_swf_url : '<?= getBaseURL(true) ?>assets/plupload-3.1.2/js/Moxie.swf',
            silverlight_xap_url : '<?= getBaseURL(true) ?>assets/plupload-3.1.2/js/Moxie.xap',
            init: {
              PostInit: function() {
                document.getElementById('filelist').innerHTML = '';
                document.getElementById('uploadfiles').onclick = function() {
                  uploader.start();
                  return false;
                };
              },
              FilesAdded: function(up, files) {
                plupload.each(files, function(file) {
                  document.getElementById('filelist').innerHTML += '<div id="' + file.id + '"><b>[ Files/tai-len/' + file.name + ' ] (' + plupload.formatSize(file.size) + ') </b></div>';
                });
              },
              UploadProgress: function(up, file) {
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>[ Files/tai-len/' + file.name + ' ] (' + plupload.formatSize(file.size*file.percent/100) + "/" + plupload.formatSize(file.size) + ') ' + file.percent + "%</span>";
              },
              Error: function(up, err) {
                alert("Lỗi #" + err.code + ": " + err.message);
              },
              UploadComplete: function () {
                alert("Tải lên thành công!");
                // window.location.reload(true);
              }
            }
          });
          uploader.init();
        }
      });
    </script>
  </body>
</html>
