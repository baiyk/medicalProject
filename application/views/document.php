<div class="document_context" style="display: none;">
    <div>
        <form  action="<?php echo site_url("/"); ?>/File/uploadFile" method="post"  id="file" enctype="multipart/form-data">
            <input name="userfile" type="file">请选择文件
            <input type="hidden" name="classification" class="file_classification" value="XXG">
            <input type="submit" value="提交">
        </form>
    </div>
    <div class="document_list">
        <table class="table">
            <thead>
            <th>序号</th>
            <th>文件名</th>
            <th>上传时间</th>
            <th>拥有者</th>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>