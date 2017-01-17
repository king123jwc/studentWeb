<?php if (!defined('THINK_PATH')) exit();?>!DOCTYPE html>
<html>
<head>
	<title>
		test
	</title>
</head>
<body>
<table>
<form action="/index.php/Admin/Activity/test" method="post">
	<tr>
        <td colspan="2">
	<input type="text" name="name" value="12"></input>
            <textarea id="des" name="des"></textarea>
            <button type="submit" class="btn btn-info" >上传&nbsp;&nbsp;总结</button>
               <button type="reset" class="btn btn-warning" id="submit1">重新&nbsp;&nbsp;填写</button>
        </td>
    </tr>
</form>
</table>
<?php
foreach($data as $k=>$v){ print_r($v); echo html_entity_decode($v['des']); echo "<br>"; } ?>
</body>
</html>
<script>window.UEDITOR_HOME_URL = "/Public/ueditor/";</script>
<script src="/Public/ueditor/ueditor.config.js"></script>
<script src="/Public/ueditor/ueditor.all.min.js"></script>
<script>
		// UE.getEditor('des',{toolbars:[
		// 	['fullscreen','source']
		// ]});
		UE.getEditor('des');
		var editor=new UE.ui.Editor();
		editor.sync(des);
		form.submit();
		var content= editor.getContent();alert(content);
</script>