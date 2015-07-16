//variable globale
var data_1=[];
var data_2=[];
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
		url:'db.php',
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
function checkSemAll(id,type){
	if(type=='d'){
		if(id=='S1_all')
			$($('input[name="'+id+'"]')[0]).parent().parent().children().each(function(index,elt){$(elt).children().get(0).checked=$('input[name="S1_all"]')[0].checked;});
		else if(id=='S2_all')
			$($('input[name="'+id+'"]')[0]).parent().parent().children().each(function(index,elt){$(elt).children().get(0).checked=$('input[name="S2_all"]')[0].checked;});
	}
	else if(type=='n'){
		if(id=='S1_all')
			$($('input[name="'+id+'"]')[1]).parent().parent().children().each(function(index,elt){$(elt).children().get(0).checked=$('input[name="S1_all"]')[1].checked;});
		else if(id=='S2_all')
			$($('input[name="'+id+'"]')[1]).parent().parent().children().each(function(index,elt){$(elt).children().get(0).checked=$('input[name="S2_all"]')[1].checked;});
	}		
};
function fillSem(){
	$($('input[name="S1_all"]')[1]).parent().parent().children().each(function(index,elt){if(index!=0){data_1[index-1]=$(elt).children().get(0).checked;}});
	$($('input[name="S2_all"]')[1]).parent().parent().children().each(function(index,elt){if(index!=0){data_2[index-1]=$(elt).children().get(0).checked;}});
};