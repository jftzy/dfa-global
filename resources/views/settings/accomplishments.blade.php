<x-app-layout>
	
	<x-slot name="header">
	    <h2 class="font-semibold text-lg text-gray-800 leading-tight">
	        {{ __('Data Settings') }}
	    </h2>
	</x-slot>

	<x-validation-errors></x-validation-errors>
	<x-alert-success></x-alert-success>

	<div x-data="options">

		<div class="w-full flex flex-col p-6">
			<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row">
			    <img class="object-cover rounded-t-lg h-52 w-[250px] md:rounded-none md:rounded-s-lg" src="{{ ENV('APP_URL')}}/imgs/data-analysis.jpg" alt="">
			    <div class="flex flex-col justify-between p-4 leading-normal h-full">
			        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Upload Statistical Data</h5>
			        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Uploading statistical data typically involves transferring data sets that contain statistical information from a local device to the server. This process is crucial for data analysis, information sharing, reporting and storage.</p>

			        <button class="inline-flex items-center w-36 px-3 py-2 mt-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105" @click="toggle_upload">
		                 <x-icons.icon-arrow-right-thick class="h-6 mr-3"></x-icons.icon-arrow-right-thick>
		                 Get Started
		            </button>
			    </div>
			</div>

			<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg mt-4 shadow md:flex-row transition ease-in-out delay-150" :class="upload_form ? 'block' : 'hidden -translate-y-14 z-[-999]' ">
			    <div class="flex flex-col justify-between p-4 leading-normal h-full w-full">
			    	<p class="mb-3 font-normal text-xs text-gray-500 dark:text-gray-400">Please ensure to upload the standard format evaluated statistical data.</p>
					<form action="{{ route('settings.upload-accomplishments') }}" method="POST" enctype="multipart/form-data" class="flex gap-4 w-full">
						@csrf
						<div class="w-8/12">
							<label for="file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
							    <div class="flex flex-col items-center justify-center pt-5 pb-6">
							        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
							            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
							        </svg>
							        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
							        <p class="text-xs text-gray-500 dark:text-gray-400">.CSV (Max file size of 2MB)</p>
							        <p id="file_title" class="text-xs text-gray-400 dark:text-gray-400" x-text="fileTitle"></p>
							    </div>
							    <input id="file" name="file" type="file" accept=".csv" class="hidden" x-model="fileTitle"/>
							</label>
						</div>
						<div class="flex flex-col w-4/12">
							<div class="flex flex-col justify-between h-full">
								<div>
									<p class="mb-2 font-normal text-xs text-gray-500 dark:text-gray-400">Feed in additional details for year and month of data.</p>
									<label for="year" class="sr-only">Year</label>
									<div class="relative w-full py-2">
									    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
									        <x-icons.icon-calendar-year-flat class="h-5 opacity-50"></x-icons.icon-calendar-year-flat>
									    </div>
									    <input type="number" id="year" name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter year of data e.g. 2026" required />
									</div>

									<label for="month" class="mt-2 block mb-2 text-sm font-medium text-gray-400 dark:text-white">Select a month</label>
									<select id="month" name="month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
										<option value="1" selected>January</option>
										<option value="2">February</option>
										<option value="3">March</option>
										<option value="4">April</option>
										<option value="5">May</option>
										<option value="6">June</option>
										<option value="7">July</option>
										<option value="8">August</option>
										<option value="9">September</option>
										<option value="10">October</option>
										<option value="11">November</option>
										<option value="12">December</option>
									</select>

									<!-- <label for="month" class="sr-only">Month</label>
									<div class="relative w-full py-2">
									    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
									        <x-icons.icon-calendar-month-flat class="h-5 opacity-50"></x-icons.icon-calendar-month-flat>
									    </div>
									    <input type="text" id="month" name="month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter month of data e.g. January" required />
									</div> -->
								</div>
							    <button type="submit" class="inline-flex items-center justify-center w-full px-3 py-2 mt-4 text-sm font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-800 focus:ring-2 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
					                 <x-icons.icon-upload class="h-6 mr-3"></x-icons.icon-upload>
					                Upload Data
					            </button>
							</div>
						</div>
					</form>
			    </div>
			</div>
					    
		</div>

		<hr class="mt-4" />

		<div class="w-full p-6">
			<div class="w-full">
						<table id="stats_table_preview" class="display cell-border compact hover stripe">
						    <thead>
						        <tr>
						            <th><span class="flex items-center">Country</span></th>
						            <th><span class="flex items-center">Title</span></th>
						            <th><span class="flex items-center">Month</span></th>
						            <th><span class="flex items-center">Year</span></th>
						            <th><span class="flex items-center">Quarter</span></th>
						            <th><span class="flex items-center">Project Type</span></th>
						            <th><span class="flex items-center">Project Classification</span></th>
						            <th><span class="flex items-center">Foreign Policy Pillar</span></th>
						            <th><span class="flex items-center">Target Audience</span></th>
				                    <th><span class="flex items-center">Strategic Plan</span></th>
				                    <th><span class="flex items-center">Diplomacy</span></th>
				                    <th><span class="flex items-center">Cultural Domains</span></th>
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
		</div>

	</div>

</x-app-layout>

<script type="text/javascript">
	document.addEventListener('alpine:init', () => {
	        Alpine.data('options', () => ({
	            upload_form: false,
	            fileTitle: "",
	            toggle_upload() {
	                this.upload_form = ! this.upload_form;
	            }
	        }))
	    })

	$(document).ready(function() {

	    //code here
	    $('#stats_table_preview').dataTable( {
	    	"zeroRecords": "No Data Found.",
	    	"ordering": true, 
	    	"bLengthChange" : false, 
	    	"pageLength": 5,
	    	scrollX: true,
	    	paging: true,
	    	// "searching": true,
	         // "order": [[ 2, 'desc' ]],
	        //  "lengthMenu": [
	        //      [5, 10, 15, 25, -1],
	        //      [5, 10, 15, 25, "All"] // change per page values here
	        // ],
	        // dom: 'lBfrtip',
	        // buttons: [
	        //               // { extend: 'pdf', text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"> Exportar a PDF</i>' },
	        //               { extend: 'csv', text: '<i class="fas fa-file-csv fa-1x"> Exportar a CSV</i>' },
	        //               { extend: 'excel', text: '<i class="fas fa-file-excel" aria-hidden="true"> Exportar a EXCEL</i>' },
	        //               'pageLength'
	        //           ],
	        ajax: { url: '{{ ENV('APP_URL') }}/api/statistics', },
            columns: [
            	{ data: "country" },
            	{ data: "title" },
            	{ data: "month" },
            	{ data: "year" },
            	{ 
            		data: "quarter",
            		render: function(data, type, row) {
            			return "Q" + data;
            		}
            	},
            	{ data: "project_type" },
            	{ data: "project_classification" },
            	{ data: "foreign_policy_pillar" },
            	{ data: "target_audience" },
            	{ data: "strategic_plan" },
            	{ data: "diplomacy" },
            	{ data: "cultural_domains" }
         	],
	             error:  function(response){
	                 console.log("ERROR",response);
	             }
	        });
	});
</script>