<div class="modal-dialog"> 
	<div class="modal-content"> 
    	<div class="modal-header"> 
        	<button type="button" class="close" data-dismiss="modal">&times;</button> 
            <h4 class="modal-title">修改密码<?php $url = $_SERVER['SERVER_NAME']; ?></h4> 
        </div>
        <form action="<?php echo "http://".$url."/zkadmin/admin/passmi"; ?>" class="form-horizontal" method="post"> 
        <div class="modal-body">
        	<div class="form-group">
                <label class="col-sm-3 control-label">旧密码</label>
                <div class="col-sm-7">
                    <input type="password" name="pass_a" class="form-control" placeholder="初始密码默认是123456" >
                </div>
            </div>
            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">6位数新密码</label>
                <div class="col-sm-7">
                    <input type="password" name="pass_b" class="form-control" placeholder="填写新的密码" >
                </div>
            </div>
            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">确认新密码</label>
                <div class="col-sm-7">
                    <input type="password" name="pass_c" class="form-control" placeholder="同新密码一致" >
                </div>
            </div>
        </div>
        <div class="modal-footer"> 
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
            <button type="submit" class="btn btn-primary">确认修改</button> 
        </div>
        </form> 
    </div>
</div>