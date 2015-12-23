<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!----------------------------------------------------------------------------------
	- File Info -
		File name		: browse_screenshot_type_page.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 20 Dec 2015

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

	All content � DAVINA Leong Shi Yun. All Rights Reserved.
----------------------------------------------------------------------------------->

<?php
/**
 * @var $screenshot_types
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
</head>
<body>
<div class="container">
    <?php $this->load->view("admin/admin_navbar"); ?>

    <div class="page-header">
        <h1>
            <i class="text-info fa fa-file-text-o"></i> Browse Game Platforms&nbsp;
            <button onclick="window.location.replace('<?= site_url("admin/game_platform/add_screenshot_type/") ?>')" type="button"
                    class="btn btn-danger"><i class="fa
            fa-plus"></i> Add Game Platform
            </button>
        </h1>
    </div>

    <?php $this->load->view("admin/template_user_message"); ?>

    <div class="table-responsive">
        <table class="table table-hover" id="platform_table">
            <thead>
            <tr>
                <th>#</th>
                <th>Screenshot Type Name</th>
                <th>Screenshot Description</th>
                <th>&nbsp;</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach($screenshot_types as $index=>$screenshot_type): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?=$screenshot_type["platform_name"]?></td>
                    <td><?=$screenshot_type["abbr"]?></td>
                    <td>
                        <?php if($screenshot_type["logo_url"]): ?>
                            <img class="img-rounded" src="<?=site_url('uploads/' . $screenshot_type["logo_url"])?>" alt="<?=$screenshot_type['platform_name']?>_avatar" width="50px" height="50px"/>
                        <?php else: ?>
                            <span class="text-placeholder">No logo</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($screenshot_type["developer"] == "none"): ?>
                            <span class="text-placeholder"><?=$screenshot_type["developer"]?></span>
                        <?php elseif($screenshot_type["developer"]):
                            echo $screenshot_type["developer"];
                            else:
                        ?>
                            <span class="text-placeholder">NA</span>
                        <?php endif; ?>
                    </td>

                    <td>
                        <?php if($screenshot_type["year_intro"] == "0"): ?>
                            <span class="text-placeholder">0</span>
                        <?php else: ?>
                            <?=$screenshot_type["year_intro"]?>
                        <?php endif; ?>
                    </td>

                    <td class="button-col">
                        <button name="view" onclick="window.location.replace('<?=site_url("admin/game_platform/view_screenshot_type/".$screenshot_type["platform_id"])?>')" type="button" class="btn btn-default"><i class="fa fa-eye"></i> View</button>
                        <button name="edit" onclick="window.location.replace('<?=site_url("admin/game_platform/edit_screenshot_type/".$screenshot_type["platform_id"])?>')" type="button" class="btn btn-default"><i class="fa fa-pencil-square-o"></i> Edit</button>
                        <button name="delete" onclick="onDeleteButtonClicked(<?=$screenshot_type['platform_id']?>)" type="button" class="btn btn-default confirm-delete" data-toggle="modal" data-target="#confirm_delete_modal"><i class="fa fa-trash"></i> Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
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
                    <button type="button" onclick="OnConfirmDelete()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i> Delete
                        Game Platform</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <?php
    $this->load->view("admin/admin_footer");
    $this->load->view("templates/js_common");
    $this->load->view("templates/datatables_resources");
    ?>

    <script>
        $(document).ready(function()
        {
            $("#platform_table").dataTable();
        });

        function onDeleteButtonClicked(platform_id)
        {
            $("#confirm_delete_modal").data("platform_id", platform_id).modal("show");
        }

        function OnConfirmDelete()
        {
            var platform_id = $("#confirm_delete_modal").data("platform_id");
            var delete_platform_url = "<?=site_url('admin/game_platform/delete_screenshot_type/')?>" + platform_id;
            window.location.href = delete_platform_url;
        }
    </script>
</div>
</body>
</html>
