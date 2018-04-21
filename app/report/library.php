<?php
function sInit(){   
    return 0;
}

function noDirect(){
    
    if (!defined('BASE_PATH')) {
        exit('No direct script access allowed');
    }
}

function load_fun($name_func){
    if($name_func){
      $func_path="app/report/fun/".$name_func.".fun.php";
      //print $func_path;
      if(file_exists($func_path)) include_once($func_path);
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
    global $systemFoot;
    return '</section>
</div>
<script src="asset/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<script src="asset/AdminLTE/dist/js/adminlte.min.js"></script>
<script src="asset/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
'.$systemFoot;
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

function sBox($content,$md=3,$sm=6,$xs=12){
    if(!isset($md))$md=3;
    if(!isset($sm))$sm=6;
    if(!isset($xs))$xs=12;
    return '
		<div class="col-md-'.$md.' col-sm-'.$sm.' col-xs-'.$xs.'">
                    <div class="info-box-content">
                '.$content.'
                    </div>
            </div>
		';
    
}

function sRow($content){
    return '<div class="row">'
        .$content.
    '</div>';
}

function sIcon($title,$info,$icon){
    
    if(!isset($icon))$icon='ion ion-ios-gear-utline';
    return '   <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="'.$icon.'"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">'.$info.'</span>
              <span class="info-box-number">'.$title.'</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->';
}