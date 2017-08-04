<div class="modal-dialog"> 
	<div class="modal-content"> 
    	<div class="modal-header"> 
        	<button type="button" class="close" data-dismiss="modal">&times;</button> 
            <h4 class="modal-title">修改我的头像<?php $url = $_SERVER['SERVER_NAME']; ?></h4> 
        </div>
        <form action="<?php echo "http://".$url."/zkadmin/admin/avatar"; ?>" class="form-horizontal" enctype="multipart/form-data" method="post"> 
        <div class="modal-body">
        	<div class="row"> 
                <div class="col-md-3"></div>
                <div class="col-md-6"> 
                    <div class="text-center thumb-lg pull-left m-r-md"> 
                        <img src="<?php echo "http://".$url."/zeros/zkadmin/images/avatar.jpg"; ?>" alt="..." class="img-circle m-b">
                        128x128 
                    </div>
                    <div class="text-center thumb-md pull-left m-r-md" style=" margin-top:64px;"> 
                        <img src="<?php echo "http://".$url."/zeros/zkadmin/images/avatar.jpg"; ?>" alt="..." class="img-circle m-b"> 
                        64x64
                    </div> 
                    <div class="text-center thumb-sm pull-left" style=" margin-top:96px;"> 
                        <img src="<?php echo "http://".$url."/zeros/zkadmin/images/avatar.jpg"; ?>" alt="..." class="img-circle m-b">
                        32x32 
                    </div> 
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-12"> 
                	<div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">上传新头像</label> 
                        <div class="col-sm-8"> 
                            <input type="file" name="images" class="filestyle" data-icon="false" data-classbutton="btn btn-default" data-classinput="form-control inline v-middle input-s">
                        </div> 
                    </div>
                </div>
            </div>
        </div> 
        <div class="modal-footer"> 
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
            <button type="submit" class="btn btn-primary">确认修改</button> 
        </div>
        </form> 
    </div>
    <script src="<?php echo "http://".$url."/zeros/zkadmin/js/file-input/bootstrap-filestyle.min.js"; ?>"></script>
</div>