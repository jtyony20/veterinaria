$(document).ready(function(){
	$.post(baseurl+'ceventos/getEventos',

		function(data){
	
			 $('#calendar').fullCalendar({
		    	header:{
		    		left:'prev,next today',
		    		center:'title',
		    		right:'month,agendaWeek,agendaDay'
		    	},
		    	defaultView: 'month',
		    	defaultDate:new Date(),
		    	navLinks:true,
		    	editable:true,
		    	eventLimit:true,
		    	events:$.parseJSON(data),
		    	eventDrop:function(event,delta,revertFunc){
		    		var id=event.id;
		    		var fein=event.start.format();
		    		var ffin=event.end.format();
		    		$.post(baseurl+"ceventos/update",{
		    			id:id,
		    			fecinicio:fein,
		    			fecfin:ffin
		    		},
		    		function(data){
		    			if (data==1) {
		    				alert('Se actualizo correctamente');
		    			}else{
		    				alert('Error');
		    			}

		    		});
		    	},
		    	eventResize: function(event, delta, revertFunc) {
		    		var id=event.id;
		    		var fein=event.start.format();
		    		var ffin=event.end.format();
		    		$.post(baseurl+"ceventos/update",{
		    			id:id,
		    			fecinicio:fein,
		    			fecfin:ffin
		    		},
		    		function(data){
		    			if (data==1) {
		    				alert('Se actualizo correctamente');
		    			}else{
		    				alert('Error');
		    			}

		    		});
			    },
			    eventRender:function(event,element){
			    	var el=element.html();
			    	element.html("<div style='width:90%;float:left;'>"+el+"</div><div><a style='width:5%; text-align;' class=' borrar btn btn-danger fa fa-trash'></a></div>");

			    element.find('.borrar').click(function(){
			    	if (!confirm("Estas seguro eliminar la fecha???")) {
				    	revertFunc();
				    }else{
				    	var id=event.id;
			    		$.post(baseurl+"ceventos/delete",{
			    			id:id,
			    		},
			    		function(data){
			    			if (data==1) {
			    				$('#calendar').fullCalendar('removeEvents',event.id);
			    				alert('Se elimino correctamente');
			    			}else{
			    				alert('Error');
			    			}

			    		});
				    }
			    		
			    	});
			    }
		    });

		});
     });