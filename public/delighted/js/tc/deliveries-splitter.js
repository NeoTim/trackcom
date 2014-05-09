$(document).ready(function () {
	

	var panels = {};
	
	panels = [{size: 350 }, {size:350}];
	

	$('#mainSplitter').jqxSplitter({ width: '100%', height: 800, orientation: 'horizontal', panels: [{ size: 100 }], splitBarSize: 10 });
	$('#nested1').jqxSplitter({ width: '100%', height: '100%',  orientation: 'vertical', panels: [{ size: '50%', collapsible: false}], splitBarSize: 10 });
	$('#nested1_split1').jqxSplitter({ width: '100%', height: '100%',  orientation: 'vertical', panels: [{ size: '50%'}], splitBarSize: 10 });
	$('#nested1_split2').jqxSplitter({ width: '100%', height: '100%',  orientation: 'vertical', panels: [{ size: '50%', collpasible: false}], splitBarSize: 10 });


	/*$('#nested2').jqxSplitter({ width: '100%', height: '100%',  orientation: 'vertical', panels: [{ size: '50%'}], splitBarSize: 10 });*/
	$('#nested2_split1').jqxSplitter({ width: '100%', height: '100%',  orientation: 'vertical', panels: [{ size: '50%', collapsible:false}], splitBarSize: 10 });
	$('#nested2_split2').jqxSplitter({ width: '100%', height: '100%',  orientation: 'vertical', panels: [{ size: '50%', collapsible: false}], splitBarSize: 10 });

	$('#dallas_tulsa_splitter').jqxSplitter({ width: '100%', height: '100%',  orientation: 'horizontal', showSplitBar: true, panels: [{ size: 350, collapsible: false}, {size: 350, collapsible: false}], splitBarSize: 10 });
	$('#dallas_splitter').jqxSplitter({ width: '100%', height: '100%',  orientation: 'horizontal', showSplitBar: true, panels: [{ size: 800, resizable:false}, {size: 800, resizable:false}], splitBarSize: 10 });
	$('#tulsa_splitter').jqxSplitter({ width: '100%', height: '100%',  orientation: 'horizontal', panels: [{ size: 800, resizable:false, collapsed:true}, {size: 800, collapsible: false, resizable:false}], splitBarSize: 10 });

	$('#stillwater_shawnee_splitter').jqxSplitter({ width: '100%', height: '100%',  orientation: 'horizontal', showSplitBar: true, panels: [{ size: 350, collapsible: false}, {size: 350, collapsible: false}], splitBarSize: 10 });
	$('#stillwater_splitter').jqxSplitter({ width: '100%', height: '100%',  orientation: 'horizontal', showSplitBar: true, panels: [{ size: 800, resizable:false}, {size: 800, resizable:false}], splitBarSize: 10 });
	$('#shawnee_splitter').jqxSplitter({ width: '100%', height: '100%',  orientation: 'horizontal', panels: [{ size: 800, resizable:false, collapsed:true}, {size: 800, collapsible: false, resizable:false}], splitBarSize: 10 });

	/*$('#north_splitter').jqxSplitter({ width: '100%', height: '100%',  orientation: 'horizontal', showSplitBar: true, panels: [{ size: 800, resizable:false}, {size: 800, resizable:false}], splitBarSize: 10 });*/
	/*$('#south_splitter').jqxSplitter({ width: '100%', height: '100%',  orientation: 'horizontal', panels: [{ size: 800, resizable:false, collapsed:true}, {size: 800, collapsible: false, resizable:false}], splitBarSize: 10 });*/


	//$('#easte_splitter').jqxSplitter({ width: '100%', height: '100%',  orientation: 'horizontal', showSplitBar: true, panels: [{ size: 800, resizable:false}, {size: 800, resizable:false}], splitBarSize: 10 });
	//$('#west_splitter').jqxSplitter({ width: '100%', height: '100%',  orientation: 'horizontal', panels: [{ size: 800, resizable:false, collapsed:true}, {size: 800, collapsible: false, resizable:false}], splitBarSize: 10 });

	var expandIt = function(bool, splitter){
		if(bool){
			
		} else {
			$(splitter).jqxSplitter('collapse');
		}
	} ;     
	$('#north_south_splitter').jqxSplitter({ width: '100%', height: '100%',  orientation: 'horizontal', showSplitBar: true, panels: panels, splitBarSize: 10 });
	$('#east_west_splitter').jqxSplitter({ width: '100%', height: '100%',  orientation: 'horizontal', showSplitBar: true, panels: panels, splitBarSize: 10 });
	$('#east_west_splitter').on('expanded', function(e){
		var p  = e.args.panels;
		var p1  = e.args.panels[0];
		var p2 = e.args.panels[1];		

	}).on('collapse', function(e){
		p2 = e.args.panels[1];
		$("#east_west_splitter").find("button.bottom").on('click', function(){
			$("#east_west_splitter").jqxSplitter('expand');
		});
		//doExpand = expandIt(true);
	});
		$("#east_west_splitter").find("button.top").on('click', function(){
			$("#east_west_splitter").jqxSplitter('collapse');
		});
		$("#east_west_splitter").find("button.bottom").on('click', function(){
			$("#east_west_splitter").jqxSplitter('expand');
		});
		



});