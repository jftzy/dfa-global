<x-app-layout>

	<style type="text/css">
		.w-full.p-4.data-table-container .dt-container.dt-empty-footer {
			position: relative;
		}
		.w-full.p-4.data-table-container .dt-search {
			position: absolute;
		    right: 0px;
		    top: 5px;
		}
		.w-full.p-4.data-table-container .dt-paging {
			position: absolute;
			right: 0;
			bottom: -25px;
		}
		.w-full.p-4.data-table-container div#stats_table_info {
			padding-top: 15px;
		}
		@media only screen and (max-width: 768px) {
			.w-full.p-4.data-table-container .dt-search {
				position: inherit;
			}
		}
		@media print {
	        .no-print {
	            display: none !important;
	        }
	        .go-print {
	        	display: block !important;
	        }
	    }
	    .floats{
	    	position:fixed;
	    	width:60px;
	    	height:60px;
	    	bottom:40px;
	    	right:40px;
	    	background-color:#0C9;
	    	color:#FFF;
	    	border-radius:50px;
	    	text-align:center;
	    	box-shadow: 2px 2px 3px #999;
	    	cursor: pointer;
	    }
	</style>

	<x-slot name="header">
		<div class="w-full inline-flex justify-between no-print">
		    <h2 class="font-semibold text-lg text-gray-100 leading-tight">
		        {{ __('Reports -') }} <span class="text-[#fdc02f]">{{ __('Events') }}</span>
		    </h2>
		    <label class="inline-flex items-center cursor-pointer">
		      <input type="checkbox" id="events_toggle" class="sr-only peer">
		      <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-yellow-300 dark:peer-focus:ring-yellow-600 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-yellow-400"></div>
		      <span class="ms-3 text-sm font-medium text-gray-100 dark:text-gray-300" id="mode_click">Switch to Summary</span>
		    </label>
		</div>
	</x-slot>

	<div class="w-full">

		<div class="w-full p-4 data-table-container" id="events_interactive">
			<table id="events_table" class="display cell-border compact hover stripe">
			    <thead>
			        <tr>
    		            <th><span class="flex items-center">Host Communities</span></th>
    		            <th><span class="flex items-center">Filipino Commmunities</span></th>
    		            <th><span class="flex items-center">Other Stakeholders</span></th>
    		            <th><span class="flex items-center">Event Title</span></th>
    		            <th><span class="flex items-center">Short Description</span></th>
    		            <th><span class="flex items-center">Date</span></th>
    		            <th><span class="flex items-center">Attached File</span></th>
			        </tr>
			    </thead>
			    <!-- <tbody>
			        <tbody>
			        	
			        </tbody>
			    </tbody> -->
			    <tfoot>
			    	
			    </tfoot>
			</table>
		</div>

		<div class="hidden p-4" id="events_native">
			<div class="border text-center py-4 font-bold text-lg relative go-print hidden">
				Cultural Events Summary Report
			</div>
			<div class="relative overflow-x-auto overflow-y-auto shadow-md max-h-[620px]">
				<button class="px-4 py-2 floats pointer no-print" title="Print" onclick="window.print()"><x-icons.icon-print class="w-8 h-8"></x-icons.icon-print></button>
			    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
			        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
			            <tr>
			                <th scope="col" class="px-6 py-3 border border-gray-300">
			                    Host Communities
			                </th>
			                <th scope="col" class="px-6 py-3 border border-gray-300">
			                    Filipino Commmunities
			                </th>
			                <th scope="col" class="px-6 py-3 border border-gray-300">
			                    Other Stakeholders
			                </th>
			                <th scope="col" class="px-6 py-3 border border-gray-300">
			                    Event Title
			                </th>
			                <th scope="col" class="px-6 py-3 border border-gray-300">
			                    Short Description
			                </th>
			                <th scope="col" class="px-6 py-3 border border-gray-300">
			                    Date
			                </th>
			            </tr>
			        </thead>
			        <tbody>
			        	@forelse($events as $key => $event)
			            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
			                <th scope="row" class="px-3 py-2 font-medium {{!$key ? 'text-gray-900' : 'text-gray-700'}} dark:text-white text-xs border border-gray-300">
			                    {{ $event->host_communities }}
			                </th>
			                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs border border-gray-300">
			                	{{ $event->filipino_communities }}
			                </td>
			                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs border border-gray-300">
			                	{{ $event->other_stakeholders }}
			                </td>
			                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs border border-gray-300">
			                	{{ $event->title_of_the_event }}
			                </td>
			                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs border border-gray-300">
			                	{{ $event->short_description }}
			                </td>
			                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs border border-gray-300">
			                	{{ $event->date_from }} to {{ $event->date_to }}
			                </td>
			            </tr>
			            @empty
			            <tr><td colspan="6" class="text-center">No data found.</td></tr>
			            @endforelse
			        </tbody>
			    </table>
			</div>
		</div>
	</div>

</x-app-layout>

<script type="text/javascript">

	// functions
	$("#events_toggle").on('change', function() {
		if($("#events_toggle").is(':checked')) {
		    $("#events_interactive").hide();  // unchecked
		    $("#events_native").show();  // checked
		    console.log("UN-checked!");
		} else {
		    $("#events_interactive").show();  // checked
		    $("#events_native").hide();  // unchecked
		    console.log("checked!");
		}
	});

    //code here
    $('#events_table').dataTable( {
    	"zeroRecords": "No Data Found.",
    	"ordering": true,
    	"order": [],
    	"bLengthChange" : false, 
    	"pageLength": 5,
    	scrollX: true,
    	paging: true,
        "searching": true,
        dom: 'lBfrtip',
        buttons: [
			{ extend: 'copy', text: '<i class="fas fa-file-copy fa-1x" aria-hidden="true"> <b>Copy Data</b></i>' },
			{ extend: 'pdf', text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"><b>PDF</b></i>' },
			{ extend: 'csv', text: '<i class="fas fa-file-csv fa-1x"><b>CSV</b></i>' },
			{ extend: 'excel', text: '<i class="fas fa-file-excel" aria-hidden="true"><b>EXCEL</b></i>' },
			'pageLength'
		],
        ajax: { url: 'api/events', },
        columns: [
        	{ data: "host_communities" },
        	{ data: "filipino_communities" },
        	{ data: "other_stakeholders" },
        	{ data: "title_of_the_event" },
        	{ data: "short_description" },
        	{ 
        		data: {"date_from": "date_from", "date_from": "date_to"},
        		render: function(data, type, row) {
        			return data.date_from + " to " + data.date_from;
        		}
        	},
        	{ 
        		data: "file_events",
        		render: function(data, type, row) {
        			if(data !== null){
        					return '<a href="storage/uploads/' + data + '" title="View File">'+ data +'</a>';
        			    }else{
        			        return ' ';
        			    }
        		}
        	}
     	],
             error:  function(response){
                 console.log("ERROR",response);
             }
        });
</script>