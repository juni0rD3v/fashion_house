<section class="page-section p-5">
    <div class="container p-5">
    <div class="w-100 justify-content-between d-flex">
        <h4><b>Update Account Details</b></h4>
        <!-- <a href="./?page=my_account" class="btn btn btn-primary btn-flat"><div class="fa fa-angle-left"></div> Back to Booking List</a> -->
    </div>
        <hr class="border-warning">
        <div class="col-md-12">
            <form action="" id="update_account">
            <input type="hidden" name="id" value="<?php echo $_settings->userdata('id') ?>">
              <div class="row">
              <div class="form-group col-6">
                    <label for="firstname" class="control-label">Firstname</label>
                    <input type="text" name="firstname" class="form-control form" value="<?php echo $_settings->userdata('firstname') ?>" required>
                </div>
                <div class="form-group col-6">
                    <label for="lastname" class="control-label">Lastname</label>
                    <input type="text" name="lastname" class="form-control form" value="<?php echo $_settings->userdata('lastname') ?>" required>
                </div>
              </div>
              <div class="row">
              <div class="form-group col-6">
                    <label for="firstname" class="control-label">Username</label>
                    <input type="text" name="username" class="form-control form" value="<?php echo $_settings->userdata('username') ?>" required>
                </div>
                <div class="form-group col-6">
                    <label for="lastname" class="control-label">Contact</label>
                    <input type="text" name="number" class="form-control form" value="<?php echo $_settings->userdata('number') ?>" required>
                </div>
              </div>
                <div class="form-group">
                    <label for="username" class="control-label">Address</label>
                    <input type="text" name="address" class="form-control form" value="<?php echo $_settings->userdata('address') ?>" required>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="password" class="control-label">New Password</label>
                        <input type="password" name="password" class="form-control form" value="" placeholder="(Enter value to change password)">
                    </div>
                    <div class="form-group col-6">
                        <label for="cpassword" class="control-label">Current Password</label>
                        <input type="password" name="cpassword" class="form-control form" value="" placeholder="(Enter value to change password)">
                    </div>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button class="btn btn-dark btn-flat">Update</button>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
$(function(){
        $('#update_account [name="password"],#update_account [name="cpassword"]').on('input',function(){
            if($('#update_account [name="password"]').val() != '' || $('#update_account [name="cpassword"]').val() != '')
            $('#update_account [name="password"],#update_account [name="cpassword"]').attr('required',true);
            else
            $('#update_account [name="password"],#update_account [name="cpassword"]').attr('required',false);
        })
        $('#update_account').submit(function(e){
            e.preventDefault();
            start_loader()
            if($('.err-msg').length > 0)
                $('.err-msg').remove();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=update_account",
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
                        alert_toast("Account succesfully updated",'success');
                        $('#update_account [name="password"],#update_account [name="cpassword"]').attr('required',false);
                        $('#update_account [name="password"],#update_account [name="cpassword"]').val('');
                    }else if(resp.status == 'failed' && !!resp.msg){
                        var _err_el = $('<div>')
                            _err_el.addClass("alert alert-danger err-msg").text(resp.msg)
                        $('#update_account').prepend(_err_el)
                        end_loader()
                        
                    }else{
                        console.log(resp)
                        alert_toast("an error occured",'error')
                    }
                    end_loader()
                }
            })
        })
    })
</script>
<style>
     body, table, .bg-dark{
        color:white;
        background: #000000;
    background: -moz-linear-gradient(-45deg,  #000000 20%, #fbbf3b 80%);
    background: -webkit-linear-gradient(-45deg,  #000000 20%,#fbbf3b 80%);
    background: linear-gradient(155deg,  #000000 20%,#fbbf3b 80%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000', endColorstr='#fbbf3b',GradientType=1 );
    
    }
</style>