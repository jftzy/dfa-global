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
			bottom: -20px;
		}
		.w-full.p-4.data-table-container .dt-info {
			padding-top: 10px;
		}
	</style>

	<x-slot name="header">
		<div class="w-full inline-flex justify-between">
		    <h2 class="font-semibold text-lg text-gray-800 leading-tight">
		        {{ __('Reports - Events') }}
		    </h2>
		    <label class="inline-flex items-center cursor-pointer">
		      <input type="checkbox" id="events_toggle" class="sr-only peer">
		      <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
		      <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300" id="mode_click">Switch to Summary</span>
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
			<div class="relative overflow-x-auto overflow-y-auto shadow-md max-h-[620px]">
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
    	"bLengthChange" : false, 
    	"pageLength": 5,
    	scrollX: true,
    	paging: true,
         "order": [[ 2, 'desc' ]],
         "searching": true,
         "lengthMenu": [
             [5, 10, 15, 25, -1],
             [5, 10, 15, 25, "All"] // change per page values here
        ],
        dom: 'lBfrtip',
        buttons: [
                      // { extend: 'pdf', text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"> Exportar a PDF</i>' },
                      { extend: 'csv', text: '<i class="fas fa-file-csv fa-1x"> Exportar a CSV</i>' },
                      { extend: 'excel', text: '<i class="fas fa-file-excel" aria-hidden="true"> Exportar a EXCEL</i>' },
                      'pageLength'
                  ],
        ajax: { url: '{{ ENV('APP_URL') }}/api/events', },
        columns: [
        	{ data: "host_communities" },
        	{ data: "filipino_communities" },
        	{ data: "other_stakeholders" },
        	{ data: "title_of_the_event" },
        	{ data: "short_description" },
        	{ 
        		data: {"from": "date_from", "to": "date_to"},
        		render: function(data, type, row) {
        			return data.from + " to " + data.to;
        		}
        	}
     	],
             error:  function(response){
                 console.log("ERROR",response);
             }
        });
</script>