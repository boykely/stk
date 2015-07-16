$(document).ready(function(){		
	var p=new Pagination(parseInt($('input[name="total"]').val()),parseInt($('input[name="npp"]').val()),3,$('input[name="uri"]').val());
	p.create('pagination');
	$('.takona').width($('.f1').width()).height($('.f1').height()).addClass('takona');
})

function updateArchives(id){
	console.log('Recup '+id);
	var data=new FormData();
	data.append('id',id);
	$.ajax({
		url:'',
		type:'post',
		data:data,
		success:function(data){
			$('.takona').removeClass('takona');
		},
		error:function(data){
			alert('Recup données échouées');
		}
	});
}