<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh mục</h1>
    </div>

    <?php if(isset($message)):?>
        <div><?php echo $message;?></div>
    <?php endif;?>
    <!-- Content Row -->
    <form method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary d-inline-block">Thêm mới</h6>
                <div class="float-right">
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group">
                            <div class="input-group-append">
                                <label class="btn btn-primary">
                                    Tên category
                                </label>
                            </div>
                            <input name="ten" type="text" class="form-control bg-light border-0 small">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <div class="input-group-append">
                                <label class="btn btn-primary">
                                    Chuyên mục cha
                                </label>
                            </div>
                            <select name="parent_id" class="custom-select" id="inputGroupSelect01">
                                <option selected>Chọn</option>
                                <?php foreach($cat as $i):?>
                                <option value="<?php echo $i['id'];?>"><?php echo $i['ten'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div><label>Mô tả</label></div>
                        <div>
                            <textarea id="myArea1" name="mota" style="width: 100%;" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/jhy47d6gwdqi26zhtnwcz21xy9fbjz7mxeut3a29ibfj5bcy/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: [
      // Core editing features
      'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
      // Your account includes a free trial of TinyMCE premium features
      // Try the most popular premium features until Nov 24, 2024:
      'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
      // Early access to document converters
      'importword', 'exportword', 'exportpdf'
    ],
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    exportpdf_converter_options: { 'format': 'Letter', 'margin_top': '1in', 'margin_right': '1in', 'margin_bottom': '1in', 'margin_left': '1in' },
    exportword_converter_options: { 'document': { 'size': 'Letter' } },
    importword_converter_options: { 'formatting': { 'styles': 'inline', 'resets': 'inline',	'defaults': 'inline', } },
  });
</script>
<!-- /.container-fluid -->