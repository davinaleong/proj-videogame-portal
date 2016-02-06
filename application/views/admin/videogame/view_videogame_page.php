<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
    - File Info -
        File name		: view_videogam_page.php
        Author(s)		: DAVINA Leong Shi Yun
        Date Created	: 13 Jan 2016

    - Contact Info -
        Email	: leong.shi.yun@gmail.com
        Mobile	: (+65) 9369 3752 [Singapore]

    All content (c) DAVINA Leong Shi Yun. All Rights Reserved.
 **********************************************************************************/
?>

<?php
/**
 * @var $videogame
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $this->load->view("templates/meta_common");
    $this->load->view("templates/css_common");
    ?>
    <title>Video Game Portal Admin</title>

    <style type="text/css">
        th
        {
            text-align: left;
            background-color: #eee;
            width: 30%;
        }
    </style>
</head>
<body>
<div class="container">
    <?php $this->load->view("admin/_templates/admin_navbar_view"); ?>

    <div class="page-header">
        <h1><i class="text-info fa fa-eye"></i> View Owned Videogame</h1>

        <div class="btn-group" role="group" aria-label="actionButtonGroup">
            <button name="browse" onclick="window.location.replace('<?=site_url("admin/videogame/browse_videogame")?>')" class="btn btn-default">
                <i class="fa fa-file-text-o"></i> Browse
            </button>

            <button name="back" onclick="window.location.replace('<?=site_url("admin/videogame/new_videogame/")?>')" type="button"
                    class="btn btn-default">
                <i class="fa fa-plus"></i> Add
            </button>

            <button name="edit" onclick="window.location.replace('<?=site_url("admin/videogame/edit_videogame/".$videogame["vg_id"])?>')" type="button" class="btn btn-default">
                <i class="fa fa-pencil-square-o"></i> Edit
            </button>

            <button name="delete" onclick="onDeleteButtonClicked(<?=$videogame['vg_id']?>)"
                    class="btn btn-default" data-toggle="modal" data-target="#confirm_delete_modal">
                <i class="fa fa-trash"></i> Delete
            </button>
        </div>
    </div>

    <?php $this->load->view("admin/_templates/user_message_view"); ?>

    <h2><?=$videogame["vg_name"];?></h2>

    <div class="box-placeholder">
        Screenshots Carousel
    </div>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Screenshots
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">

                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        More Details
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>ID:</th>
                                <td><span class="text-placeholder-left"><?= $videogame["vg_id"] ?></span></td>
                            </tr>
                            <tr>
                                <th>Abbr:</th>
                                <td>
                                    <?php if($videogame["vg_abbr"]): ?>
                                        <span class="vg-abbr"><?=$videogame["vg_abbr"]?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Platform:</th>
                                <td><span class="badge" style="background-color: #<?=$videogame["platform_label_col"]?>;"><?= $videogame["platform_abbr"] ?></span></td>
                            </tr>
                            <tr>
                                <th>Genre:</th>
                                <td><span class="label" style="background-color: #<?=$videogame["genre_label_col"]?>;"><?= $videogame["genre_abbr"] ?></span></td>
                            </tr>
                            <tr>
                                <th>Date Purchased:</th>
                                <td>
                                    <?php
                                    $date_purchased = new DateTime($videogame["date_purchased"], new DateTimeZone(DATETIMEZONE));
                                    echo $date_purchased->format("d M Y");
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Date Added:</th>
                                <td><span class="text-muted"><?=$videogame["vg_date_added"]?></span></td>
                            </tr>
                            <tr>
                                <th>Last Updated:</th>
                                <td><span class="text-muted"><?=$videogame["vg_last_updated"]?></span></td>
                            </tr>
                            <tr>
                                <th>Bought from Steam:</th>
                                <td>
                                    <?php
                                    if($videogame["from_steam"])
                                    {
                                        echo '<span class="text-success">Yes</span>';
                                    }
                                    else
                                    {
                                        echo '<span class="text-danger">No</span>';
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view("admin/_templates/admin_footer_view"); ?>
</div>

<!-- Confirm Delete Modal -->
<div class="modal fade" id="confirm_delete_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Game Platform</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure?</p>
                <p>This action <strong class="text-danger">cannot</strong> be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="OnConfirmDelete()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i> Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php $this->load->view("templates/js_common"); ?>

<script>
    var delete_platform_id = 0;
    function onDeleteButtonClicked(platform_id)
    {
        delete_platform_id = platform_id;
    }

    function OnConfirmDelete()
    {
        window.location.href = "<?=site_url('admin/videogame/delete_videogame')?>" + "/" + delete_platform_id;
    }
</script>
</body>
</html>