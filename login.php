<style>
    #uni_modal .modal-content>.modal-footer,#uni_modal .modal-content>.modal-header{
        display:none;
    }
</style>
<div class="container">
    <h3 class="float-left">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </h3>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">Login</h3>
            <hr>
            <form action="" id="login-form">
                <div class="form-group">
                    <label for="" class="control-label">Username</label>
                    <input type="text" class="form-control form" name="username" required>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Password</label>
                    <input type="password" class="form-control form" name="password" required>
                </div>
                <hr>
              <div class="row">
              <div class="form-group col-9">
                    <button class="btn btn-primary btn-flat">Login</button>
                </div>
                <div class="form-group col-3">
                    <a class="btn btn-dark" href="javascript:void(0)" id="signup_btn">Sign Up</a>
                </div>
              </div>
            </form>
        </div>
        <!-- <div class="col-lg-7">
            <h3 class="text-center">Create New Account</h3>
            <hr class='border-primary'>
            <form action="" id="registration">
               <div class="row">
                <div class="form-group col-md-6">
                        <label for="" class="control-label">Firstname</label>
                        <input type="text" class="form-control form-control-sm form" name="firstname" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="control-label">Lastname</label>
                        <input type="text" class="form-control form-control-sm form" name="lastname" required>
                    </div>
               </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="" class="control-label">Address</label>
                        <input type="text" class="form-control form-control-sm form" name="address" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="control-label">Contact Number</label>
                        <input type="number" class="form-control form-control-sm form" name="number" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="" class="control-label">Username</label>
                        <input type="text" class="form-control form-control-sm form" name="username" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="control-label">Password</label>
                        <input type="password" class="form-control form-control-sm form" name="password" required>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button class="btn btn-primary btn-flat">Register</button>
                </div>
            </form>
        </div> -->
    </div>
</div>
<script>
    $(function(){
        $('#signup_btn').click(function(){
        uni_modal("","signup.php","small")
        })
        $('#registration').submit(function(e){
            e.preventDefault();
            start_loader()
            if($('.err-msg').length > 0)
                $('.err-msg').remove();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=register",
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                error:err=>{
                    console.log(err)
                    alert_toast("an error occured",'error')
                    end_loader()
                },
                success:function(resp){
                    if(typeof resp == 'object' && resp.status == 'success'){
                        alert_toast("Account succesfully registered",'success')
                        setTimeout(function(){
                            location.reload()
                        },2000)
                    }else if(resp.status == 'failed' && !!resp.msg){
                        var _err_el = $('<div>')
                            _err_el.addClass("alert alert-danger err-msg").text(resp.msg)
                        $('#registration').prepend(_err_el)
                        end_loader()
                        
                    }else{
                        console.log(resp)
                        alert_toast("an error occured",'error')
                        end_loader()
                    }
                }
            })
        })
        $('#login-form').submit(function(e){
            e.preventDefault();
            start_loader()
            if($('.err-msg').length > 0)
                $('.err-msg').remove();
            $.ajax({
                url:_base_url_+"classes/Login.php?f=login_user",
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                error:err=>{
                    console.log(err)
                    alert_toast("an error occured",'error')
                    end_loader()
                },
                success:function(resp){
                    if(typeof resp == 'object' && resp.status == 'success'){
                        alert_toast("Login Successfully",'success')
                        setTimeout(function(){
                            location.reload()
                        },2000)
                    }else if(resp.status == 'incorrect'){
                        var _err_el = $('<div>')
                            _err_el.addClass("alert alert-danger err-msg").text("Incorrect Credentials.")
                        $('#login-form').prepend(_err_el)
                        end_loader()
                        
                    }else{
                        console.log(resp)
                        alert_toast("an error occured",'error')
                        end_loader()
                    }
                }
            })
        })
    })
</script>