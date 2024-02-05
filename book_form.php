<div class="container-fluid">
    <form action="" id="book-form">
        <div class="form-group">
            <input name="package_id" type="hidden" value="<?php echo $_GET['package_id'] ?>" >
            <label for="">Size </label>
            <select name="size" id="" class="form form-control">
                <option value=""></option>
                <option value="">SELECT YOUR SIZE</option>
                <option value="EXTRA SMALL">EXTRA SMALL</option>
                <option value="SMALL">SMALL</option>
                <option value="MEDIUM">MEDIUM</option>
                <option value="LARGE">LARGE</option>
                <option value="EXTRA LARGE">EXTRA LARGE</option>
            </select>
            <label for="">  Picked Up and Fitting Schedule </label>
            <input type="date" class='form form-control' required  name='schedule'>
        </div>
    </form>
</div>
<script>
    $(function(){
        $('#book-form').submit(function(e){
            e.preventDefault();
            start_loader()
            $.ajax({
                url:_base_url_+"classes/Master.php?f=book_tour",
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
                        alert_toast("Book Request Successfully sent.")
                        $('.modal').modal('hide')
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