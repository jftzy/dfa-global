<x-app-layout>
	
	<x-slot name="header">
	    <h2 class="font-semibold text-lg text-gray-800 leading-tight">
	        {{ __('Data Settings - Translations') }}
	    </h2>
	</x-slot>

	<x-validation-errors></x-validation-errors>
	<x-alert-success></x-alert-success>

	<div x-data="options">

		<div class="w-full flex flex-col p-6">
			<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row">
			    <img class="object-cover rounded-t-lg h-52 w-[250px] md:rounded-none md:rounded-s-lg" src="{{ ENV('APP_URL')}}/imgs/literature.jpg" alt="">
			    <div class="flex flex-col justify-between p-4 leading-normal h-full">
			        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Upload Literature Translations Data</h5>
			        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Uploading literature translations data typically involves contributing information to a database that tracks translated works. These databases, like the Literary Translation and the Translation, serve as comprehensive resources for identifying translated books, their original languages, and the publishers involved.</p>

		         <div class="inline-flex items-center justify-between">
    		        <div class="inline-flex items-center gap-4">
				        <button class="inline-flex items-center w-36 px-3 py-2 mt-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105" @click="toggle_upload_translations">
			                 <x-icons.icon-arrow-right-thick class="h-6 mr-3"></x-icons.icon-arrow-right-thick>
			                 Upload Data
			            </button>
	        	        <button class="inline-flex items-center w-36 px-3 py-2 mt-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105" @click="toggle_input_translations">
	                         <x-icons.icon-edit class="h-6 mr-3"></x-icons.icon-edit>
	                         Input Data
	                    </button>
			        </div>
        	        <a href="{{ asset('templates/template_translations.csv') }}" class="inline-flex items-center px-6 py-2 mt-4 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-500 focus:ring-2 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 hover:scale-105" :class="upload_form_translations ? 'block' : 'hidden'">
                         <x-icons.icon-download class="h-6 mr-3"></x-icons.icon-download>
                         Download Template
                    </a>
			    </div>

			    </div>
			</div>

			<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg mt-4 shadow md:flex-row transition ease-in-out delay-150" :class="upload_form_translations ? 'block' : 'hidden -translate-y-14 z-[-999]' ">
			    <div class="flex flex-col justify-between p-4 leading-normal h-full w-full">
			    	<p class="mb-3 font-normal text-xs text-gray-500 dark:text-gray-400">Please ensure to upload the standard format of cultural events and target audeinces under post's jurisdiction.</p>
					<form action="{{ route('settings.upload-translations') }}" method="POST" enctype="multipart/form-data" class="flex gap-4 w-full">
						@csrf
						<div class="w-full">
							<label for="file_translations" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
							    <div class="flex flex-col items-center justify-center pt-5 pb-6">
							        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
							            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
							        </svg>
							        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
							        <p class="text-xs text-gray-500 dark:text-gray-400">.CSV (Max file size of 2MB)</p>
							        <p id="file_title_translations" class="text-xs text-gray-400 dark:text-gray-400" x-text="fileTitleTranslations">test</p>
							    </div>
							    <input id="file_translations" name="file_translations" type="file" accept=".csv" class="hidden" x-model="fileTitleTranslations"/>
							</label>
						    <button type="submit" class="inline-flex items-center justify-center w-full px-3 py-2 mt-4 text-sm font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-800 focus:ring-2 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
				                 <x-icons.icon-upload class="h-6 mr-3"></x-icons.icon-upload>
				                Upload Data
				            </button>
						</div>
					</form>
			    </div>
			</div>
			
			<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg mt-4 shadow md:flex-row transition ease-in-out delay-150" :class="input_form_translations ? 'block' : 'hidden -translate-y-14 z-[-999]' ">
				<form action="{{ route('settings.store-translations') }}" method="POST" enctype="multipart/form-data" class="w-full p-4 inline-flex gap-5">
					@csrf
					<div class="w-1/2">

					  <div class="mb-3 mt-3">
					    <label for="input_book_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title of the Book</label>
					    <input type="text" id="input_book_title" name="input_book_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter book title" required />
					  </div>

					  <div class="mb-3 mt-3">
					    <label for="input_author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
					    <input type="text" id="input_author" name="input_author" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter author" required />
					  </div>

					  <div class="mb-3 mt-3">
					    <label for="input_translator" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Translator</label>
					    <input type="text" id="input_translator" name="input_translator" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter translator" required />
					  </div>

					  <div class="mb-3 mt-3">
					    <label for="input_language" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Langauge</label>
					    <input type="text" id="input_language" name="input_language" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter langauge" required />
					  </div>

					    <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
					  	  Submit
					    </button>

					</div>
					<div class="w-1/2">

						<div class="mb-3 mt-3">
						  <label for="input_title_of_book_and_link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title of translated book and link</label>
						  <input type="text" id="input_title_of_book_and_link" name="input_title_of_book_and_link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter title of translated book and link" required />
						</div>

						<div class="mb-3 mt-3">
						  <label for="input_year_of_translation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year of publication of translation</label>
						  <input type="text" id="input_year_of_translation" name="input_year_of_translation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter year of publication of translation" required />
						</div>

						<div class="mb-3 mt-3">
						  <label for="input_publisher" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publisher</label>
						  <input type="text" id="input_publisher" name="input_publisher" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter publisher" required />
						</div>

						<div class="mt-3">
						  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="input_file_translations">Upload File</label>
						  <input class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="input_file_translations" id="input_file_translations" name="input_file_translations" type="file" accept="text,.txt,.csv,.pdf,.word,.xlsx,.ppt">
						</div>

					</div>
				</form>
			</div> 
		</div>

			<hr class="mt-4" />

			<div class="w-full p-6">
				<div class="w-full">
					<table id="translations_table_preview" class="display cell-border compact hover stripe">
					    <thead>
					        <tr>
					            <th><span class="flex items-center">Title of the Book</span></th>
		    		            <th><span class="flex items-center">Author</span></th>
		    		            <th><span class="flex items-center">Translator</span></th>
		    		            <th><span class="flex items-center">Language</span></th>
		    		            <th><span class="flex items-center">Title of Translated Book and Link</span></th>
		    		            <th><span class="flex items-center">Year of Publication of Translation</span></th>
		    		            <th><span class="flex items-center">Publisher</span></th>
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
	            upload_form_translations: false,
	            input_form_translations: false,
	            fileTitleTranslations: "",
	            toggle_upload_translations() {
	                this.upload_form_translations = ! this.upload_form_translations;
	                this.input_form_translations = false;
	            },
	            toggle_input_translations() {
	                this.input_form_translations = ! this.input_form_translations;
	                this.upload_form_translations = false;
	            },
	        }))
	    });

	    //code here
	    $('#translations_table_preview').dataTable( {
	    	"zeroRecords": "No Data Found.",
	    	"ordering": true,
	    	"order": [],
	    	"bLengthChange" : false, 
	    	"pageLength": 5,
	    	scrollX: true,
	    	paging: true,
	        ajax: { url: '{{ ENV('APP_URL') }}/api/translations', },
            columns: [
            	
            	{ data: "book_title" },
            	{ data: "author" },
            	{ data: "translator" },
            	{ data: "language" },
            	{ data: "title_of_book_and_link" },
            	{ data: "year_of_translation" },
            	{ data: "publisher" },
            	{ 
            		data: "file_translations",
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