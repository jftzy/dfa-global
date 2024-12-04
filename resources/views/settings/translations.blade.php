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
			    <img class="object-cover rounded-t-lg h-52 w-[250px] md:rounded-none md:rounded-s-lg" src="{{ ENV('APP_URL')}}/imgs/literature.jpg" alt="">
			    <div class="flex flex-col justify-between p-4 leading-normal h-full">
			        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Upload Literature Translations Data</h5>
			        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Uploading literature translations data typically involves contributing information to a database that tracks translated works. These databases, like the Literary Translation and the Translation, serve as comprehensive resources for identifying translated books, their original languages, and the publishers involved.</p>

			        <button class="inline-flex items-center w-36 px-3 py-2 mt-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105" @click="toggle_upload_literatures">
		                 <x-icons.icon-arrow-right-thick class="h-6 mr-3"></x-icons.icon-arrow-right-thick>
		                 Get Started
		            </button>
			    </div>
			</div>

			<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg mt-4 shadow md:flex-row transition ease-in-out delay-150" :class="upload_form_literatures ? 'block' : 'hidden -translate-y-14 z-[-999]' ">
			    <div class="flex flex-col justify-between p-4 leading-normal h-full w-full">
			    	<div class="w-full inline-flex items-center justify-center bg-white">
			    		<img src="{{ asset('imgs/coming-soon.jpg') }}" class="max-w-[40%] bg-cover">
			    	</div>
			    </div>
			</div>
					    
		</div>

	</div>

</x-app-layout>

<script type="text/javascript">
	document.addEventListener('alpine:init', () => {
	        Alpine.data('options', () => ({
	            upload_form_literatures: false,
	            fileTitleTranslations: "",
	            toggle_upload_literatures() {
	                this.upload_form_literatures = ! this.upload_form_literatures;
	            },
	        }))
	    })
</script>