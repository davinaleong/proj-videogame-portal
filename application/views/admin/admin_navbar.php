<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!----------------------------------------------------------------------------------
	- File Info -
		File name		: admin_navbar.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 12 Dec 2015

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

	All content © DAVINA Leong Shi Yun. All Rights Reserved.
----------------------------------------------------------------------------------->
<nav class="navbar navbar-default" xmlns="http://www.w3.org/1999/html">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#admin_navbar" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=site_url('admin/authenticate/start')?>">
		  <img src="<?=RESOURCES_FOLDER?>/images/site_logo.png" alt="Site Logo" width="24px" height="24px"/>
	  </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="admin_navbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-users"> </i> User <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?=site_url('admin/user/add_user')?>"><i class="fa fa-plus"></i> Add User</a></li>
            <li><a href="<?=site_url('admin/user/browse_user')?>"><i class="fa fa-file-text-o"></i> Browse Users</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-gamepad"></i> Owned Videogames <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?=site_url('admin/videogame/add_videogame')?>"><i class="fa fa-plus"></i> Add Video Game</a></li>
            <li><a href="<?=site_url('admin/videogame/browse_videogame')?>"><i class="fa fa-file-text-o"></i> Browse Video Games</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa
          fa-laptop"></i> Game Platform <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?=site_url('admin/game_platform/add_game_platform')?>"><i class="fa fa-plus"></i> Add Game
                Platform</a></li>
            <li><a href="<?=site_url('admin/game_platform/browse_game_platform/0')?>"><i class="fa
            fa-file-text-o"></i> Browse
                Game Platforms</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa
          fa-sitemap"></i> Game Genre <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?=site_url('admin/game_genre/add_game_genre')?>"><i class="fa fa-plus"></i> Add Game
                Genre</a></li>
            <li><a href="<?=site_url('admin/game_genre/browse_game_genre')?>"><i class="fa fa-file-text-o"></i> Browse
                Game Genres</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa
          fa-picture-o"></i> Screenshots <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?=site_url('admin/screenshot/add_screenshot')?>"><i class="fa fa-plus"></i> Add
                Screenshot</a></li>
            <li><a href="<?=site_url('admin/screenshot/browse_screenshot')?>"><i class="fa fa-file-text-o"></i> Browse
                Screenshot</a></li>
            <li class="divider" role="separator"></li>
            <li><a data-toggle="modal" data-target="#new_screenshot_type_modal" style="cursor: pointer;"><i class="fa fa-plus"></i> Add
                Screenshot Type</a></li>
            <li><a href="<?=site_url('admin/screenshot_type/browse_screenshot_type')?>"><i class="fa fa-file-text-o"></i>
                Browse Screenshot Type</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <?php if($this->session->userdata("avatar_url")): ?>&nbsp;
                  <img class="img-rounded" src="<?=site_url('uploads/' . $this->session->userdata("avatar_url"))?>"
                       width="24px" height="24px"/>
              <?php else: ?>
                  <i class="fa fa-user"></i>&nbsp;
              <?php endif; ?>
              <?=$this->session->userdata("name");?>&nbsp;
              <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="<?=site_url('admin/authenticate/change_password')?>"><i class="fa fa-key"></i> Change
                Password</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?=site_url('admin/authenticate/logout')?>"><i class="fa fa-sign-out"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- New Screenshot Type Modal -->
<div class="modal fade" id="new_screenshot_type_modal">
  <div class="modal-dialog">

    <form method="post" action="<?=site_url('admin/screenshot_type/new_screenshot_type')?>" data-parsley-validate>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">New Screenshot Type</h4>
        </div>

        <div class="modal-body">

          <?php $this->load->view("admin/template_user_message"); ?>
          <?php $this->load->view("admin/template_form_validation"); ?>

          <div class="form-group">
            <label for="ss_type_name">Name <span class="text-danger">*</span></label>
            <input name="ss_type_name" class="form-control" type="text" placeholder="Name" data-parsley-maxlength="32" data-parsley-required/>
          </div>

          <div class="form-group">
            <label for="ss_type_description">Description</label>
            <input name="ss_type_description" class="form-control" type="text" placeholder="Short description of Screenshot Type" data-parsley-maxlength="128" />
            <span class="help-block">Limited to 128 characters.</span>
          </div>

          <p class="text-danger text-right">* required fields</p>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i
                class="fa fa-check"></i> Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
        </div>
      </div><!-- /.modal-content -->
    </form>

  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->