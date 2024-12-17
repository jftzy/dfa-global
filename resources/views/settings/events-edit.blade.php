<x-app-layout>
	
	<x-slot name="header">
		<div class="inline-flex items-center justify-between w-full">
		    <h2 class="font-semibold text-lg text-gray-100 leading-tight">
		        {{ __('Data Settings -') }} <span class="text-[#fdc02f]">{{ __('Edit Event') }}</span>
		    </h2>
		    <small class="font-semibold text-gray-400"><i>Data ID #{{ $event->id }}</i></small>
		</div>
	</x-slot>

	<x-validation-errors></x-validation-errors>
	<x-alert-success></x-alert-success>


	<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg mt-4 mx-3 shadow md:flex-row transition ease-in-out delay-150" :class="input_form ? 'block' : 'hidden -translate-y-14 z-[-999]' ">
		<form action="{{ route('settings.event-update') }}" method="POST" enctype="multipart/form-data" class="w-full p-4 inline-flex gap-5">
			@csrf
			<div class="w-1/2">

			  <div class="mb-3 mt-3">
			    <label for="input_host_communities" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Host Communities</label>
			    <input type="text" id="input_host_communities" name="input_host_communities" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter host communities" required value="{{$event->host_communities}}"/>
			  </div>

			  <div class="mb-3 mt-3">
			    <label for="input_filipino_communities" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Filipino Communities</label>
			    <input type="text" id="input_filipino_communities" name="input_filipino_communities" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter filipino communities" required value="{{$event->filipino_communities}}"/>
			  </div>

			  <div class="mb-3 mt-3">
			    <label for="input_other_stakeholders" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Other Stakeholders</label>
			    <input type="text" id="input_other_stakeholders" name="input_other_stakeholders" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter other stakeholders" required value="{{$event->other_stakeholders}}"/>
			  </div>

			    <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
			  	  Submit
			    </button>

			</div>
			<div class="w-1/2">

			  <div class="mb-3 mt-3">
			    <label for="input_event_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Title</label>
			    <input type="text" id="input_event_title" name="input_event_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter event title" required value="{{$event->title_of_the_event}}"/>
			  </div>

			  <div class="mt-3">
			    <label for="input_short_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Short Description</label>
			    <input type="text" id="input_short_description" name="input_short_description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter short description" required value="{{$event->short_description}}"/>
			  </div>

			  <div class="mt-3">
			    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="input_file_events">Upload File</label>
			    <input class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="input_file_events" id="input_file_events" name="input_file_events" type="file" accept="text,.txt,.csv,.pdf,.word,.xlsx,.ppt" value="{{$event->file_events}}">
			  </div>

			  <div class="inline-flex items-center gap-4 w-full">
			  	<div class="w-1/2">
			  		<div class="mb-3 mt-3">
			  		  <label for="input_date_from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date From</label>
			  		  <input type="date" id="input_date_from" name="input_date_from" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{$event->date_from}}"/>
			  		</div>
			  	</div>
			  	<div class="w-1/2">
			  		<div class="mb-3 mt-3">
			  		  <label for="input_date_to" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date To</label>
			  		  <input type="date" id="input_date_to" name="input_date_to" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{$event->date_to}}"/>
			  		</div>
			  	</div>
			  </div>

			</div>
		</form>

	</div>
	

</x-app-layout>

<script type="text/javascript">
	
</script>