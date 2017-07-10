<?php require_once(APPPATH . 'views/inner-css.php'); ?>
<?php echo $this->session->flashdata('msg'); ?>


<div class="row-fluid">
    <table id="sample-table-2" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                
                <th>Name</th>
                <th>Actions</th>
                <th>Views</th>                                    
                <th class="hidden-phone"></th>

            </tr>
        </thead>
        <tbody>

            <?php
            if (is_array($roles) && count($roles)) {
                $editable = "true";
                if ($this->session->userdata('companyID') != "") {
                    $editable = "false";
                }
                foreach ($roles as $loop) {
                    ?>  
                    <tr class="odd">
                       
                        <td id="name:<?php echo $loop->id; ?>" contenteditable="true">
                            <?php echo $loop->title; ?>
                        </td>
                        <td id="actions:<?php echo $loop->id; ?>" contenteditable="true">
                            <?php echo $loop->actions; ?>
                        </td>
                        <td id="views:<?php echo $loop->id; ?>" contenteditable="true">
                            <?php echo $loop->views; ?>
                        </td>

                        <td class="edit_td">
                            <a class="btn btn-danger btn-xs" href="<?php echo base_url() . "index.php/role/delete/" . $loop->id; ?>"><li class="fa fa-trash-o">Delete</li></a>

                        </td> 

                    </tr>
                    <?php
                }
            }
            ?>

        </tbody>

    </table>
</div><!--/table-responsive-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Role</h4>
            </div>
            <div class="modal-body">             
                <form id="station-form" parsley-validate novalidate role="form" class="form-horizontal" name="login-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/role/create'  method="post">

                    <div class="form-group">
                        <label>Permission/role</label>
                        <input type="text" name="name" placeholder="Name" id="name" required class="form-control"/>

                    </div>
                    <div class="form-group">
                        <label>User actions</label>
                        <textarea name="actions"  class="form-control"></textarea>

                    </div>
                    <div class="form-group">
                        <label>User views</label>
                        <textarea name="views"  class="form-control"></textarea>
                    </div>
                    <div class="form-group">

                        <div class="checkbox checkbox_margin">
                            <button class="btn btn-default pull-right" type="submit">SUBMIT</button> <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<?php require_once(APPPATH . 'views/inner-js.php'); ?>
<script>
    $(document).ready(function () {
        $("#status").hide();
        $(function () {
            //acknowledgement message
            var message_status = $("#status");
            $("td[contenteditable=true]").blur(function () {
                var field_id = $(this).attr("id");
                var value = $(this).text();
                $.post('<?php echo base_url() . "index.php/role/update/"; ?>', field_id + "=" + value, function (data) {
                    if (data != '')
                    {
                        message_status.show();
                        message_status.text(data);
                        //hide the message
                        setTimeout(function () {
                            message_status.hide()
                        }, 4000);
                    }
                });
            });

        });
    });

</script>