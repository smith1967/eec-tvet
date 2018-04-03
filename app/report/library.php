<?php

function sInit(){   
    return 0;
}

function noDirect(){
    
    if (!defined('BASE_PATH')) {
        exit('No direct script access allowed');
    }
}

function sHeader($title,$subTitle){
require_once('template/header.php');
    return '
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        '.$title.'
        <small>'.$subTitle.'</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> '.$title.'</a></li>
        <li class="active">'.$subTitle.'</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">';
}

function sFooter(){
    return '</section>
</div>
<script src="asset/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<script src="asset/AdminLTE/dist/js/adminlte.min.js"></script>
';
 require_once 'template/footer.php';
}

function sInfoBox($title,$content,$icon){
    if(!isset($icon))$icon='fa fa-bar-chart-o';
    return '<div class="box box-solid">
	  <div class="box-header">
              <i class="'.$icon.'"></i>

              <h3 class="box-title">'.$title.'</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i>
                </button>
              </div>
              </div>
              <div class="box-body">
            '.$content.'
            </div>
	  </div>';
}

function sBox($title,$info,$icon){
    if(!isset($icon))$icon='ion ion-ios-gear-utline';
    return '
		<div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="'.$icon.'"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">'.$title.'</span>
                        <span class="info-box-number">'.$info.'</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
		';
    
}

function sRow($content){
    return '<div class="row">'
        .$content.
    '</div>';
}