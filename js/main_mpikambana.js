//variable globale
var data_1=[];
var data_2=[];
var Membres={
    //id:{info:undefined,data:[]}    
};
$(document).ready(function(){		
	var p=new Pagination(parseInt($('input[name="total"]').val()),parseInt($('input[name="npp"]').val()),3,$('input[name="uri"]').val());
	p.create('pagination');
	//classe .takona miasa amin'ny manakona formulaire
	$('.takona').width($('.tk').width()).height($('.tk').height()).addClass('takona');
	//classe .loading miasa amin'ny image gif chargement
	$('.loading').width($('.container').width()).height($('.container').height());
})

function updateArchives(id){
        resetSelect();
        resetCheckboxSemestre();
        if(typeof Membres[id]!='undefined'){
            if(typeof Membres[id].info!='undefined' && Membres[id].data.length!=0){
                updateSelect(Membres[id].data);
                return;
            }
        }        
	var d=new FormData();
	d.append('id',id);
	d.append('type','1');        
	$.ajax({
		url:'db.php',
		method:'post',
		data:d,
		processData:false,
		contentType:false,
		success:function(data){						
			data=jQuery.parseJSON(data);                        
                        if(!data.isAuthenitcated)return;
                        Membres[data.result.id]={
                            info:data.result.id,
                            data:data.result.data
                        };
                        if(data.result.data.length!=0){
                            updateSelect(data.result.data);
                        }
			$('#id').val(data.result.id);
			$('.takona').addClass('takona_top');
		},
		error:function(data){
			alert('Recup donn�es �chou�es. Veuillez rafra�chir la page!');
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
			$($('input[name="'+id+'"]')[0]).parent().parent().children().each(function(index,elt){$(elt).children().get(0).checked=$('input[name="S1_all"]')[0].checked;});
		else if(id=='S2_all')
			$($('input[name="'+id+'"]')[0]).parent().parent().children().each(function(index,elt){$(elt).children().get(0).checked=$('input[name="S2_all"]')[0].checked;});
	}		
};
function fillSem(){
	if(!checkYear($('input[name="year"]').val())){
		alert('Manomeza taona marina');
		return;
	}
	$('.loading').addClass('loading_top');
	$($('input[name="S1_all"]')[0]).parent().parent().children().each(function(index,elt){if(index!=0){data_1[index-1]=$(elt).children().get(0).checked;}});
	$($('input[name="S2_all"]')[0]).parent().parent().children().each(function(index,elt){if(index!=0){data_2[index-1]=$(elt).children().get(0).checked;}});
	var d=new FormData();
	var id=$('#id').val();
	d.append('id',id);
	d.append('type','2');
	d.append('data_1',data_1);
	d.append('data_2',data_2);
	d.append('year',$('input[name="year"]').val());
	d.append('date',$('input[name="date"]').val());
	$.ajax({
		url:'db.php',
		method:'post',
		data:d,
		processData:false,
		contentType:false,
		success:function(data){			
			$('.loading').removeClass('loading_top');			
			data_1=[];
			data_2=[];
			data=jQuery.parseJSON(data);
		},
		error:function(data){
			alert('La mise � jour a echou�');
			data_1=[];
			data_2=[];
		}
	});
};
function checkYear(year){
	if(/^\d{4}$/.test(year)){
		return true;
	}
	return false;
}
function resetSelect(){
    $('select[name="archiveYear"]').empty();
}
function resetCheckboxSemestre(){
    $($('input[name="S1_all"]')[0]).parent().parent().children().each(function(index,elt){$(elt).children().get(0).checked=false;});
    $($('input[name="S2_all"]')[0]).parent().parent().children().each(function(index,elt){$(elt).children().get(0).checked=false;});
}
function updateSelect(data){  
    $('select[name="archiveYear"]').append('<option>Misafidiana taona</option>');
    for(var i=0;i<data.length;i++){
        var addSelect='<option value="'+data[i].id+'_'+data[i].data.annee+'">'+data[i].data.annee+'</option>';
        $('select[name="archiveYear"]').append(addSelect);   
    }    
}
function selectArchiveOnchange(elt){
    if(elt.value.trim()!=''){
        console.log(elt.value.split('_')[1]);
    }
}