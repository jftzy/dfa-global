<x-app-layout>
	
	<x-slot name="header">
	    <h2 class="font-semibold text-lg text-gray-100 leading-tight">
	        {{ __('Data Settings -') }} <span class="text-[#fdc02f]">{{ __('Events') }}</span>
	    </h2>
	</x-slot>

	<x-validation-errors></x-validation-errors>
	<x-alert-success></x-alert-success>

	<div x-data="options">

		<div class="w-full flex flex-col p-6">
			<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row">
			    <img class="hidden md:block object-cover rounded-t-lg h-52 w-[250px] md:rounded-none md:rounded-s-lg" src="{{ ENV('APP_URL')}}/imgs/events.jpg" alt="">
			    <div class="flex flex-col justify-between p-4 leading-normal h-full">
			        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Upload Events and Audience Data</h5>
			        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Uploading events and audience data involves contributing detailed information about various events and their respective audiences to a database or analytics platform. This process is crucial for organizations to track, analyze, and optimize their events and audience engagement strategies.</p>

    		        <div class="inline-flex items-center justify-between">
        		        <div class="inline-flex items-center gap-4">
		        	        <button class="inline-flex items-center w-36 px-3 py-2 mt-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105" @click="toggle_upload_events">
		                         <x-icons.icon-arrow-right-thick class="h-6 mr-3"></x-icons.icon-arrow-right-thick>
		                         Upload Data
		                    </button>
	            	        <button class="inline-flex items-center w-36 px-3 py-2 mt-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105" @click="toggle_input_events">
	                             <x-icons.icon-edit class="h-6 mr-3"></x-icons.icon-edit>
	                             Input Data
	                        </button>
	                    </div>
	        	        <a href="{{ asset('templates/template_events.csv') }}" class="inline-flex items-center px-6 py-2 mt-4 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-500 focus:ring-2 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 hover:scale-105" :class="upload_form_events ? 'block' : 'hidden'">
	                         <x-icons.icon-download class="h-6 mr-3"></x-icons.icon-download>
	                         Download Template
	                    </a>
    		        </div>

			    </div>
			</div>

			<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg mt-4 shadow md:flex-row transition ease-in-out delay-150" :class="upload_form_events ? 'block' : 'hidden -translate-y-14 z-[-999]' ">
			    <div class="flex flex-col justify-between p-4 leading-normal h-full w-full">
			    	<p class="mb-3 font-normal text-xs text-gray-500 dark:text-gray-400">Please ensure to upload the standard format of cultural events and target audeinces under post's jurisdiction.</p>
					<form action="{{ route('settings.upload-events') }}" method="POST" enctype="multipart/form-data" class="flex gap-4 w-full">
						@csrf
						<div class="w-8/12">
							<label for="file_event" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
							    <div class="flex flex-col items-center justify-center pt-5 pb-6">
							        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
							            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
							        </svg>
							        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
							        <p class="text-xs text-gray-500 dark:text-gray-400">.CSV (Max file size of 2MB)</p>
							        <p id="file_title_event" class="text-xs text-gray-400 dark:text-gray-400" x-text="fileTitleEvents">test</p>
							    </div>
							    <input id="file_event" name="file_event" type="file" accept=".csv" class="hidden" x-model="fileTitleEvents"/>
							</label>
						</div>
						<div class="flex flex-col w-4/12">
							<div class="flex flex-col justify-between h-full">
								<div>
									<p class="mb-2 font-normal text-xs text-gray-500 dark:text-gray-400">Feed in additional details, date from and date to of events data.</p>

									<label for="date_from" class="text-xs text-gray-400">Date From</label>
									<div class="relative w-full py-2">
									    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
									        <x-icons.icon-calendar-year-flat class="h-5 opacity-50"></x-icons.icon-calendar-year-flat>
									    </div>
									    <input type="date" id="date_from" name="date_from" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select a Date From" required />
									</div>

									<label for="date_to" class="text-xs text-gray-400 mt-4">Date To</label>
									<div class="relative w-full py-2">
									    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
									        <x-icons.icon-calendar-year-flat class="h-5 opacity-50"></x-icons.icon-calendar-year-flat>
									    </div>
									    <input type="date" id="date_to" name="date_to" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select a Date To" required />
									</div>

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
			
			<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg mt-4 shadow md:flex-row transition ease-in-out delay-150" :class="input_form_events ? 'block' : 'hidden -translate-y-14 z-[-999]' ">

				<form action="{{ route('settings.store-events') }}" method="POST" enctype="multipart/form-data" class="w-full p-4 inline-flex gap-5">
					@csrf
					<div class="w-1/2">

					  <div class="mb-3 mt-3">
					    <label for="input_host_communities" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Host Communities</label>
					    <input type="text" id="input_host_communities" name="input_host_communities" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter host communities" required />
					  </div>

					  <div class="mb-3 mt-3">
					    <label for="input_filipino_communities" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Filipino Communities</label>
					    <input type="text" id="input_filipino_communities" name="input_filipino_communities" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter filipino communities" required />
					  </div>

					  <div class="mb-3 mt-3">
					    <label for="input_other_stakeholders" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Other Stakeholders</label>
					    <input type="text" id="input_other_stakeholders" name="input_other_stakeholders" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter other stakeholders" required />
					  </div>

					    <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
					  	  Submit
					    </button>

					</div>
					<div class="w-1/2">

					  <div class="mb-3 mt-3">
					    <label for="input_event_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Title</label>
					    <input type="text" id="input_event_title" name="input_event_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter event title" required />
					  </div>

					  <div class="mt-3">
					    <label for="input_short_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Short Description</label>
					    <input type="text" id="input_short_description" name="input_short_description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter short description" required />
					  </div>

					  <div class="mt-3">
					    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="input_file_events">Upload File</label>
					    <input class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="input_file_events" id="input_file_events" name="input_file_events" type="file" accept="text,.txt,.csv,.pdf,.word,.xlsx,.ppt">
					  </div>

					  <div class="inline-flex items-center gap-4 w-full">
					  	<div class="w-1/2">
					  		<div class="mb-3 mt-3">
					  		  <label for="input_date_from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date From</label>
					  		  <input type="date" id="input_date_from" name="input_date_from" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
					  		</div>
					  	</div>
					  	<div class="w-1/2">
					  		<div class="mb-3 mt-3">
					  		  <label for="input_date_to" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date To</label>
					  		  <input type="date" id="input_date_to" name="input_date_to" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
					  		</div>
					  	</div>
					  </div>

					</div>
				</form>

			</div>

		</div>

		<hr class="mt-4" />

		<div class="w-full p-6">
			<div class="w-full">
				<table id="events_table_preview" class="display cell-border compact hover stripe">
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
		</div>

	</div>

</x-app-layout>

<script type="text/javascript">
	document.addEventListener('alpine:init', () => {
	        Alpine.data('options', () => ({
	            upload_form_events: false,
	            input_form_events: false,
	            fileTitleEvents: "",
	            toggle_upload_events() {
	                this.upload_form_events = ! this.upload_form_events;
	                this.input_form_events = false;
	            },
	            toggle_input_events() {
	                this.input_form_events = ! this.input_form_events;
	                this.upload_form_events = false;
	            }
	        }))
	    })

	    //code here
	    $('#events_table_preview').dataTable( {
	    	"zeroRecords": "No Data Found.",
	    	"ordering": true, 
	    	"order": [],
	    	"bLengthChange" : false, 
	    	"pageLength": 5,
	    	scrollX: true,
	    	paging: true,
	        ajax: { url: '{{ ENV('APP_URL') }}/api/events', },
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