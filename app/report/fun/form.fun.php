	<?php
        	function genInput($data,$labelW=2,$inputW=10){
        		$ret='';
        		global $systemFoot;
        		
        		foreach($data as $k=>$row){
        			if(count($row['attr'])){
        			$attr='';
        			foreach($row['attr'] as $a=>$c){
        				$attr.=$a."='".$c."'";
        			}
        		}
        			
        			if(!isset($row['class'])){
        				if($row['type']=='text'||$row['type']=='password'||$row['type']=='select'||$row['type']=='select')$row['class']='form-control';
        				else if($row['type']=='submit')$row['class']='btn btn-primary btn-block';
        				else if($row['type']=='checked'){
        					$row['class']='btn btn-primary btn-block';
        				}
        			}
        			$ret.="";
        		$ret.="<div class=\"form-group\">";
        		$ret.="<label for=\"".$k."\" class=\"col-sm-".$labelW." control-label\">".$row['label']."</label>";
        		$ret.="<div class=\"col-sm-".$inputW."  input-group\">";
        		static $wysiInit=false;
        		static $sourceHL=false;
        			if($row['type']=='wysiwyg'){
        				if(!$wysiInit){
        					$systemFoot.='<script src="'.site_url('system/library/ext/ckeditor/ckeditor.js',true).'"></script>';
        					//$systemFoot.="<script src='".site_url('asset/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',true)."'></script>";
      						$wysiInit=true;
        			}
        				$ret.="<textarea id='".$k."' name='".$k."' ".$attr.">".$row['value']."</textarea>";
        				$systemFoot.="
        				<script>
        				$(function () {
        					CKEDITOR.replace('".$k."');
        				});
        				</script>
        				";
        			}elseif($row['type']=='sourceHL'){
        				if(!$sourceHL){
        					$sourceHL=true;
        					$systemFoot.='<script src="'.
        					site_url("app/report/codemirror/lib/codemirror.js",true).'"></script>
<link rel="stylesheet" href="'.
site_url("app/report/codemirror/lib/codemirror.css",true).'">
<link rel="stylesheet" href="'.
site_url("app/report/codemirror/theme/midnight.css",true).'">
<script src="'.
site_url("app/report/codemirror/mode/javascript/javascript.js",true).'"></script>';
        				}
        				$ret.="<textarea id='".$k."' name='".$k."' ".$attr." class='".$row['class']."'>".$row['value']."</textarea>";
        			
        				$systemFoot.="
        				<script>
  var editor".$k." = CodeMirror.fromTextArea(".$k.", {
    lineNumbers: true
  });
editor".$k.".setOption(\"theme\", \"midnight\");
</script>";
        			
        			}elseif($row['type']=='file'){
        				
        				$row['class']=$row['class']==''?'btn btn-default':$row['class'];
        				
        				$ret.="<input type='file' name='".$k."' id='".$k."' ".$attr." class=\"hidden\">";
        				$ret.='<input type="text" id="'.$k.'_path" '.$attr.' class="'.$row['textClass'].'">
        				<span class="input-group-btn">';
        				$ret.='<button class="'.$row['class'].'" type="button" id="'.$k.'_btn">
                <i class="fa fa-search"></i> ค้นหา</button>
            </span>';
        				$systemFoot.='
        					<script>
        						$(\'#'.$k.'_btn\').click(function(e){
    								e.preventDefault();
    								$(\'#'.$k.'\').click();
								});
								$(\'#'.$k.'\').change(function(){
    								$(\'#'.$k.'_path\').val($(this).val());
								});
        					</script>
        				';
        				
        			}elseif($row['type']=='select'){
        				$ret.="<select id='".$k."' name='".$k."' ".$attr." class='".$row['class']."'>".gen_option($row['item'],$row['def'])."</select>";
        				
        			}else{
        		$ret.="<input type='".$row['type']."' name='".$k."' id='".$k."' placeholder='".$row['placeholder']."' value='".$row['value']."' ".$attr." ".$row['checked']." class='".$row['class']."'>";
        			}
        		if(isset($row['icon']))$ret.='
        		<div class="input-group-addon">
                      <i class="'.$row['icon'].'"></i>
                    </div>';
        		$ret.="</div></div>";
        		
        			if (strpos($row['class'], 'flat-red') !== false) {
        				icheck();	
        			}
        		}
        		return $ret;
        	}
        	
function genForm($data){
        		global $systemFoot;
        		if(count($data['attr'])){
        			$attr='';
        			foreach($data['attr'] as $k=>$v){
        				$attr.=$k."='".$v."'";
        			}
        		}
        		
        		if(!isset($data['method']))$data['method']='post';
        		$ret='';
        		if(isset($data['caption']))$ret.="<div class=\"box-header\"><h3>".$data['caption']."</h3></div>";
        		$ret.="<form id='".$data['id']."' action='".$data['action']."' ".$attr." class=\"form-horizontal\" method='".$data['method']."'>";
        		$ret.="<div class=\"box-body\">";
        		
        			$ret.=$data['item'];
        			
        			$ret.="</div>";
        		$ret.="</form>";
        		if(is_array($data['ajaxSubmit'])){
        			$systemFoot.='<script>
        			$( "#'.$data['id'].'" ).submit(function( event ) { 
        			$(\'#systemAlert\').html(\'<div class=\"alert alert-info alert-dismissible\">โปรดรอสักครู่.. <i class=\"fa fa-refresh fa-spin\"/></div>\');
                                
  event.preventDefault();
  var $form = $( this ),
  ';
$bindingInput='';
$inputNo=0;
  	foreach($data['ajaxSubmit'] as $inputName=>$detail){
  		if($inputNo){
  			$bindingInput.=',';
  		}
  		$inputNo++;
  		//$('textarea#mytextarea').val();
  		if($detail['type']=='checkbox'){
  			$systemFoot.='input_'.$inputName.' = $("#'.$inputName.'").is(\':checked\') ? "'.$detail['value'].'" : false,';
  		}elseif($detail['type']=='select'){
  			$systemFoot.='input_'.$inputName.' = $("#'.$inputName.' option:selected").val(),';
  		}elseif($detail['type']=='wysiwyg'){
  			$systemFoot.='input_'.$inputName.' = CKEDITOR.instances[\''.$inputName.'\'].getData(),';
  		}elseif($detail['type']=='sourceHL'){
  			$systemFoot.='input_'.$inputName.' = $("textarea#'.$inputName.'").val(),';
  		}else{
  		
  		$systemFoot.='input_'.$inputName.' = $form.find("input[name=\''.$inputName.'\']").val(),';
  		}
  		$bindingInput.=$inputName.':input_'.$inputName;
  	}
  $systemFoot.='
    url = $form.attr( "action" );
  var posting = $.post( url, {'.$bindingInput.'} );
  posting.done(function( data ) {
    //$( "#result" ).empty().append( data );
    showUpdate(data);
    window.scrollTo(0,0);
  });
});
</script>
';
        		} 
        		return $ret;
        	}
        	
        	function icheck(){
        		global $systemFoot;
        		static $called=0;
        		if(!$called){
        			$calles=1;
        		
        		$icheck_url=site_url('asset/AdminLTE/plugins/iCheck/icheck.min.js',true);
        		$icheckCssURL=site_url('asset/AdminLTE/plugins/iCheck/all.css',true);
        		$systemFoot.="<script src='".$icheck_url."'></script>";
        		$systemFoot.="
        		<script>
    $('input[type=\"checkbox\"].flat-red, input[type=\"radio\"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
    });

</script>
<link rel=\"stylesheet\" href=\"".$icheckCssURL."\">
        		";
        	}
        	}
        	?>