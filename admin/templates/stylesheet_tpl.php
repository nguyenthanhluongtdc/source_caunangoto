<script src="../assets/codemirror-5.49.0/lib/codemirror.js"></script>
<link rel="stylesheet" href="../assets/codemirror-5.49.0/lib/codemirror.css">
<link rel="stylesheet" href="../assets/codemirror-5.49.0/theme/midnight.css">
<link rel="stylesheet" href="../assets/codemirror-5.49.0/addon/hint/show-hint.css">
<link rel="stylesheet" href="../assets/codemirror-5.49.0/addon/dialog/dialog.css">
<script src="../assets/codemirror-5.49.0/mode/javascript/javascript.js"></script>
<script src="../assets/codemirror-5.49.0/mode/css/css.js"></script>
<script src="../assets/codemirror-5.49.0/addon/hint/show-hint.js"></script>
<script src="../assets/codemirror-5.49.0/addon/hint/css-hint.js"></script>
<script src="../assets/codemirror-5.49.0/addon/dialog/dialog.js"></script>
<script src="../assets/codemirror-5.49.0/addon/search/searchcursor.js"></script>
<script src="../assets/codemirror-5.49.0/addon/search/search.js"></script>
<script src="../assets/codemirror-5.49.0/addon/search/jump-to-line.js"></script>

<div class="well">Cập nhật file style.css</div>

<form action="" method="post" enctype="multipart/form-data">
  <div class="tab-content">
    <div id="<?= $r_language['uri'] ?>" role="tabpanel" class="tab-pane fade <?= $k_language==0 ? "in active" : "" ?>">
      <center><input name="savebtn" type="submit" class="btn btn-success" value="Lưu lại"></center>
      <textarea name="style" id="codemirror" -style="opacity: 0;"><?= file_get_contents(getThemeURL("../assets/css/style.css", true)) ?></textarea>
      <center><input name="savebtn" type="submit" class="btn btn-success" value="Lưu lại"></center>
    </div>
  </div>
</form>

<script>
  $(document).ready(function () {
    var myCodeMirror = CodeMirror.fromTextArea(document.getElementById("codemirror"), {
      mode: "css",
      theme: "midnight",
      lineNumbers: true,
      lineWrapping: true,
      extraKeys: { "Ctrl-Space" : "autocomplete" }
    });
  });
</script>

<style type="text/css">
  .CodeMirror {
    margin: 10px 0;
    height: calc(100vh - 250px);
    box-shadow: 0 0 3px #000;
  }
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
  
  input[type='file'],
  select {
    width: auto !important;
  }

  input[type='color'] {
    width: 100px !important;
    cursor: pointer;
  }
  
  abbr {
    color: gray;
  }
</style>
