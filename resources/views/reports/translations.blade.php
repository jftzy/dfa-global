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
			bottom: -10px;
		}
		.w-full.p-4.data-table-container div#stats_table_info {
			padding-top: 15px;
		}
	</style>

	<x-slot name="header">
		<div class="w-full inline-flex justify-between">
		    <h2 class="font-semibold text-lg text-gray-800 leading-tight">
		        {{ __('Reports - Translations') }}
		    </h2>
		    <label class="inline-flex items-center cursor-pointer">
		      <input type="checkbox" id="translations_toggle" class="sr-only peer">
		      <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
		      <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300" id="mode_click">Switch to Summary</span>
		    </label>
		</div>
	</x-slot>

		<div class="w-full">

			<div class="w-full p-4 data-table-container" id="translations_interactive">
				<table id="translations_table" class="display cell-border compact hover stripe">
				    <thead>
				        <tr>
	    		            <th><span class="flex items-center">Title of the Book</span></th>
	    		            <th><span class="flex items-center">Author</span></th>
	    		            <th><span class="flex items-center">Translator</span></th>
	    		            <th><span class="flex items-center">Langauge</span></th>
	    		            <th><span class="flex items-center">Title of translated book and link</span></th>
	    		            <th><span class="flex items-center">Year of publication of translation</span></th>
	    		            <th><span class="flex items-center">Publisher</span></th>
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

			<div class="hidden p-4" id="translations_native">
				<div class="relative overflow-x-auto overflow-y-auto shadow-md max-h-[620px]">
				    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
				        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
				            <tr>
				                <th scope="col" class="px-6 py-3 border border-gray-300">
				                    Title of the Book
				                </th>
				                <th scope="col" class="px-6 py-3 border border-gray-300">
				                    Author
				                </th>
				                <th scope="col" class="px-6 py-3 border border-gray-300">
				                    Translator
				                </th>
				                <th scope="col" class="px-6 py-3 border border-gray-300">
				                    Langauge
				                </th>
				                <th scope="col" class="px-6 py-3 border border-gray-300">
				                    Title of translated book and link
				                </th>
				                <th scope="col" class="px-6 py-3 border border-gray-300">
				                    Year of publication of translation
				                </th>
				                <th scope="col" class="px-6 py-3 border border-gray-300">
				                    Publisher
				                </th>
				            </tr>
				        </thead>
				        <tbody>
				        	@forelse($translations as $key => $translations)
				            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
				                <th scope="row" class="px-3 py-2 font-medium {{!$key ? 'text-gray-900' : 'text-gray-700'}} dark:text-white text-xs border border-gray-300">
				                    {{ $translations->book_title }}
				                </th>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs border border-gray-300">
				                	{{ $translations->author }}
				                </td>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs border border-gray-300">
				                	{{ $translations->translator }}
				                </td>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs border border-gray-300">
				                	{{ $translations->language }}
				                </td>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs border border-gray-300">
				                	{{ $translations->title_of_book_and_link }}
				                </td>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs border border-gray-300">
				                	{{ $translations->year_of_translation }}
				                </td>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs border border-gray-300">
				                	{{ $translations->publisher }}
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
	$("#translations_toggle").on('change', function() {
		if($("#translations_toggle").is(':checked')) {
		    $("#translations_interactive").hide();  // unchecked
		    $("#translations_native").show();  // checked
		    console.log("UN-checked!");
		} else {
		    $("#translations_interactive").show();  // checked
		    $("#translations_native").hide();  // unchecked
		    console.log("checked!");
		}
	});

	//code here
	$('#translations_table').dataTable( {
		"zeroRecords": "No Data Found.",
		"ordering": true,
		"order": [],
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
	    ajax: { url: '{{ ENV('APP_URL') }}/api/translations', },
	    columns: [
	    	{ data: "book_title" },
	    	{ data: "author" },
	    	{ data: "translator" },
	    	{ data: "language" },
	    	{ data: "title_of_book_and_link" },
	    	{ data: "year_of_translation" },
	    	{ data: "publisher" }
	 	],
	         error:  function(response){
	             console.log("ERROR",response);
	         }
	    });
</script>
'book_title',
'',
'translator',
'language',
'title_of_book_and_link',
'year_of_translation',
'publisher'