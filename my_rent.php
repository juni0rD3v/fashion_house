    
</section>
<section class="page-section">
    <div class="container">
    <div class="w-100 justify-content-between d-flex">
        <h4><b>Rent Cart</b></h4>
        <!-- <a href="./?page=edit_account" class="btn btn btn-primary btn-flat"><div class="fa fa-user-cog"></div> Manage Account</a> -->
    </div>
        <hr class="border-warning">
        <table class="table table-stripped text-center text-dark">
            <colgroup>
                <col width="5%">
                <col width="10">
                <col width="25">
                <col width="25">
                <col width="25">
                <col width="15">
                <col width="10">
            </colgroup>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Apparel Name</th>
                    <th>Size</th>
                    <th>Schedule for picked-up</th>
                    <th>Schedule for return</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i=1;
                    $qry = $conn->query("SELECT b.*,p.title FROM rent_list b inner join `packages` p on p.id = b.package_id where b.user_id ='".$_settings->userdata('id')."' order by date(b.date_created) desc ");
                    while($row= $qry->fetch_assoc()):
                        $review = $conn->query("SELECT * FROM `rate_review` where package_id='{$row['id']}' and user_id = ".$_settings->userdata('id'))->num_rows;
                ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <!-- <td><?php //echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td> -->
                        <td><?php echo $row['title'] ?></td>
                        <!-- <td><?php echo $row['size'] ?></td> -->
                        <td><?php echo date("d-m-Y",strtotime($row['sched_pick'])) ?></td>
                        <td><?php echo date("d-m-Y",strtotime($row['sched_return'])) ?></td>
                        <td class="text-center">
                            <?php if($row['status'] == 0): ?>
                                <span class="badge badge-warning">Pending</span>
                            <?php elseif($row['status'] == 1): ?>
                                <span class="badge badge-primary">Confirmed</span>
                            <?php elseif($row['status'] == 2): ?>
                                <span class="badge badge-danger">Cancelled</span>
                            <?php elseif($row['status'] == 3): ?>
                                <span class="badge badge-success">Done</span>
                            <?php endif; ?>
                        </td>
                        <td align="center">
                                <button type="button" class="btn btn-flat btn-default border btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Action
                                <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                <!-- <a class="dropdown-item edit_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Edit</a> -->
                                <?php if($row['status'] == 3 && $review <= 0): ?>
                                    <a class="dropdown-item submit_review" href="javascript:void(0)" data-id="<?php echo $row['package_id'] ?>">Submit Review</a>
                                <?php endif; ?>
                                <?php if($row['status'] == 0 && $review <= 0): ?>
                                    <a class="dropdown-item cancel_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Cancel</a>
                                <?php endif; ?>
                                <div class="dropdown-divider"></div> 
                                <a class="dropdown-item view_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">View</a>
                                </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</section>
<script>
    function cancel_rent($id){
        start_loader()
        $.ajax({
            url:_base_url_+"classes/Master.php?f=update_rent_status",
            method:"POST",
            data:{id:$id,status:2},
            dataType:"json",
            error:err=>{
                console.log(err)
                alert_toast("an error occured",'error')
                end_loader()
            },
            success:function(resp){
                if(typeof resp == 'object' && resp.status == 'success'){
                    alert_toast("Rent cancelled successfully",'success')
                    setTimeout(function(){
                        location.reload()
                    },2000)
                }else{
                    console.log(resp)
                    alert_toast("an error occured",'error')
                }
                end_loader()
            }
        })
    }
    $(function(){
        $('.cancel_data').click(function(){
            _conf("Are you sure to cancel this Rent?","cancel_rent",[$(this).data('id')])
        })
        $('.submit_review').click(function(){
            uni_modal("Rate & Feedback","./rate_review.php?id="+$(this).data('id'),'mid-large')
        })
        $('.view_data').click(function(){
            uni_modal("Rent Information","./view_rent.php?id="+$(this).data('id'))
        })
        $('table').dataTable();
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
    td, th{
        color:white;
    }
</style>