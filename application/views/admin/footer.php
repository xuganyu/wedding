</body>
</html>


<script type="text/javascript">
<!-- AJAX 方法，删除项目的动画 --->
function delone(del_id,number_id){
	if(confirm("是否确认删除？")){
		//$('#block_'+number_id).addClass('animated fadeOut');
		$('#block_'+number_id).toggle(1000);
		$.ajax({
			type: "POST",
			url: "<?php echo site_url("zkadmin/pay/delone");?>",
			data: { del_id: del_id},
			
		})
	}else{
		return false;
	}
}

<!-- AJAX 方法，删除项目的动画 --->
function delones(del_id,number_id){
	if(confirm("是否确认删除？")){
		//$('#block_'+number_id).addClass('animated fadeOut');
		$('#block_'+number_id).toggle(1000);
		$.ajax({
			type: "POST",
			url: "<?php echo site_url("zkadmin/comment/delone");?>",
			data: { del_id: del_id},
			//success:function(data){
			//	alert(data);
			//}
		})
	}else{
		return false;
	}
}
</script>