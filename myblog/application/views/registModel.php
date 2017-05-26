<div class="modal fade" id="registModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">欢迎来访！</h4>
            </div>
            <div class="modal-body">

                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1" ">用户名</label>
                        <input type="email" class="form-control"  placeholder="username" id="registName">
                  </div>
                    <div class="form-group">
                        <label>选择性别</label>
                        男：<input type="radio" name="sex" value="1" class="radieSex">
                        女：<input type="radio" name="sex" value="0" class="radieSex">
                    </div>
                  <div class="form-group">
                        <label for="exampleInputPassword1" >请输入密码</label>
                        <input type="password" class="form-control"  placeholder="Password" id="registPass">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1" id="registPass" >再次输入密码</label>
                        <input type="password" class="form-control" placeholder="Password" id="registPass1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">上传头像</label>
                        <input type="file" id="exampleInputFile">
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-loginRegist">注册</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>