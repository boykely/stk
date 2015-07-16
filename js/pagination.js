/*Une classe pagination
<param>total</param> Nombre total d'enregistrement dans la BD
<param>npp</npp> Nombre d'enregistrement par pages
<param>npm</param> Nombre de page maximal à afficher
*/
function Pagination(total,npp,npm,uri){
	this.records=total;
	this.recordsPerPage=npp;
	this.pages=Math.ceil(total/npp);
	this.npm=npm;
	/*id est l'élément contenant la pagination*/
	this.create=function(id){
		var target=$('.'+id+'');
		var description='<ul class="pagination_ul pagination">';
		for(var i=1;i<=this.pages;i++){
			//une fois notre base de données se multiplie, on augmentera la valeur "3" pour la pagination
			if(i<=this.npm){
				description+='<li><a href="'+uri+'?npp='+this.recordsPerPage+'&page='+i+'" onclick="getData(this,\''+uri+'\');return false;">'+i+'</a></li>';
			}			
		}
		description+='</ul>';
		target.append(description);
	};		
	this.getNext=function(){
	
	};
	this.getPrev=function(){
	
	};
};
/* Pour extraire les données par javascript dans la BD
<param>elt</param> URL 
*/
function getData(elt,uri){	
	$.ajax({
		url:elt.href,
		dataType:'html',
		success:function(data){	
			$('.mpikambana_lisitra .table').html('').html($(data).find('.table').html());
			var last_cp=parseInt($('input[name="currentPage"]').val());			
			var cp=parseInt(elt.href.split('&')[1].split('=')[1]);
			$('input[name="currentPage"]').val(cp);
			if(cp){
				updatePage(last_cp,cp,uri);
			}
		},
		error:function(){
			alert('erreur');
		}
	});
};
/*Pour regénérer les paginations lors de navigation
<param>currentPage</param> Le numero de page actuellement visible
*/
function updatePage(last_currentPage,currentPage,uri){
	$('.pagination_ul').remove();
	var target=$('.pagination');
	var max=Math.ceil(parseInt($('input[name="total"]').val())/parseInt($('input[name="npp"]').val()));console.log(max);
	var description='<ul class="pagination_ul pagination">';
	if(currentPage<=1){		
		for(var i=1;i<=3;i++){
			//une fois notre base de données se multiplie, on augmentera la valeur "3" pour la pagination
			if(i<=3){
				description+='<li><a href="'+uri+'?npp='+this.recordsPerPage+'&page='+i+'" onclick="getData(this,\''+uri+'\');return false;">'+i+'</a></li>';
			}			
		}		
	}
	else{
		for(var i=currentPage-1;i<=(currentPage+1);i++){
			//une fois notre base de données se multiplie, on augmentera la valeur "3" pour la pagination
			if(i<=max){
				description+='<li><a href="'+uri+'?npp='+this.recordsPerPage+'&page='+i+'" onclick="getData(this,\''+uri+'\');return false;">'+i+'</a></li>';	
			}			
		}				
	}
	description+='</ul>';
	target.append(description);
}
