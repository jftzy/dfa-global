<x-app-layout>
	
	<x-slot name="header">
		<div class="inline-flex items-center justify-between w-full">
		    <h2 class="font-semibold text-lg text-gray-100 leading-tight">
		        {{ __('Data Settings -') }} <span class="text-[#fdc02f]">{{ __('Edit Accomplishments') }}</span>
		    </h2>
		    <small class="font-semibold text-gray-400"><i>Data ID #{{ $accomplishment->id }}</i></small>
		</div>
	</x-slot>

	<x-validation-errors></x-validation-errors>
	<x-alert-success></x-alert-success>


	<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg mt-4 mx-3 shadow md:flex-row transition ease-in-out delay-150" :class="input_form ? 'block' : 'hidden -translate-y-14 z-[-999]' ">

		@php
			$countries = \App\Models\Country::all();
		@endphp
		
		<form action="{{ route('settings.accomplishment-update', $accomplishment->id) }}" method="POST" enctype="multipart/form-data" class="w-full p-4 inline-flex gap-5">
			@csrf
			<div class="w-1/2">

				<label for="input_country" class="mt-2 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
				<select id="input_country" name="input_country" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
						<option>-- Select Country --</option>
					@foreach($countries as $country)
						<option value="{{ $country->id }}" {{$accomplishment->country_id == $country->id ? 'selected' : '' }} >{{ $country->name }}</option>
					@endforeach
				</select>

			  <div class="mb-3 mt-3">
			    <label for="input_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
			    <input type="text" id="input_title" name="input_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="e.g. National Womens Month" required value="{{$accomplishment->title}}" />
			  </div>

			  <div class="mb-3">

			    <label for="input_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year</label>
			    <select id="input_year" name="input_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
			      <option value="" selected>-- Select a year --</option>
			      @for($y = 2024; $y >= 2000; $y--)
			      <option value="{{$y}}" {{$accomplishment->year == $y ? 'selected' : '' }}>{{$y}}</option>
			      @endfor
			    </select>
			  </div>

			  <label for="input_month" class="mt-2 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a month</label>
			  <select id="input_month" name="input_month" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
			  	<option selected>-- Select Month --</option>
			  	<option value="1" {{$accomplishment->month == 'January' ? 'selected' : '' }}>January</option>
			  	<option value="2" {{$accomplishment->month == 'February' ? 'selected' : '' }}>February</option>
			  	<option value="3" {{$accomplishment->month == 'March' ? 'selected' : '' }}>March</option>
			  	<option value="4" {{$accomplishment->month == 'April' ? 'selected' : '' }}>April</option>
			  	<option value="5" {{$accomplishment->month == 'May' ? 'selected' : '' }}>May</option>
			  	<option value="6" {{$accomplishment->month == 'June' ? 'selected' : '' }}>June</option>
			  	<option value="7" {{$accomplishment->month == 'July' ? 'selected' : '' }}>July</option>
			  	<option value="8" {{$accomplishment->month == 'August' ? 'selected' : '' }}>August</option>
			  	<option value="9" {{$accomplishment->month == 'September' ? 'selected' : '' }}>September</option>
			  	<option value="10" {{$accomplishment->month == 'October' ? 'selected' : '' }}>October</option>
			  	<option value="11" {{$accomplishment->month == 'November' ? 'selected' : '' }}>November</option>
			  	<option value="12" {{$accomplishment->month == 'December' ? 'selected' : '' }}>December</option>
			  </select>

			  <label for="input_project_type" class="mt-3 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project Type</label>
			  <select id="input_project_type" name="input_project_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
			  	<option selected>-- Select Project Type --</option>
			  	<option value="Flagship" {{$accomplishment->project_type == 'Flagship' ? 'selected' : '' }}>Flagship</option>
			  	<option value="One Time" {{$accomplishment->project_type == 'One Time' ? 'selected' : '' }}>One Time</option>
			  	<option value="Recurring" {{$accomplishment->project_type == 'Recurring' ? 'selected' : '' }}>Recurring</option>
			  	<option value="Others" {{$accomplishment->project_type == 'Others' ? 'selected' : '' }}>Others</option>
			  </select>

			  <label for="input_project_classification" class="mt-3 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project Classification</label>
			  <select id="input_project_classification" name="input_project_classification" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
			  	<option selected>-- Select Project Classification --</option>
			  	<option value="Cultural Heritage" {{$accomplishment->project_classification == 'Cultural Heritage' ? 'selected' : '' }}>Cultural Heritage</option>
			  	<option value="Filipino Heritage" {{$accomplishment->project_classification == 'Filipino Heritage' ? 'selected' : '' }}>Filipino Heritage</option>
			  	<option value="Pop Culture" {{$accomplishment->project_classification == 'Pop Culture' ? 'selected' : '' }}>Pop Culture</option>
			  	<option value="Others" {{$accomplishment->project_classification == 'Others' ? 'selected' : '' }}>Others</option>
			  </select>
			  
			    <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
			  	  Submit
			    </button>
			</div>

			<div class="w-1/2">
			  <label for="input_foreign_policy_pillar" class="mt-2 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foreign Policy Pillar</label>
			  <select id="input_foreign_policy_pillar" name="input_foreign_policy_pillar" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
			  	<option selected>-- Select Foreign Policy Pillar --</option>
			  	<option value="Cultural Promotion" {{$accomplishment->foreign_policy_pillar == 'Cultural Promotion' ? 'selected' : '' }}>Cultural Promotion</option>
			  	<option value="Economic Diplomacy" {{$accomplishment->foreign_policy_pillar == 'Economic Diplomacy' ? 'selected' : '' }}>Economic Diplomacy</option>
			  	<option value="National Security" {{$accomplishment->foreign_policy_pillar == 'National Security' ? 'selected' : '' }}>National Security</option>
			  	<option value="Others" {{$accomplishment->foreign_policy_pillar == 'Others' ? 'selected' : '' }}>Others</option>
			  </select>
			  <div class="mb-3 mt-3">
			    <label for="input_target_audience" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Target Audience</label>
			    <input type="text" id="input_target_audience" name="input_target_audience" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="e.g. Filipino Cummunity" value="{{$accomplishment->target_audience}}"/>
			  </div>

			  <div class="mb-3">
			    <label for="input_strategic_plan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Strategic Plan</label>
			    <input type="text" id="input_strategic_plan" name="input_strategic_plan" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter strategic plan.." value="{{$accomplishment->strategic_plan}}"/>
			  </div>

			  <div class="mb-3">
			    <label for="input_diplomacy" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diplomacy</label>
			    <input type="text" id="input_diplomacy" name="input_diplomacy" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter diplomacy" value="{{$accomplishment->diplomacy}}"/>
			  </div>

			  <div class="mb-3">
			    <label for="input_cultural_domains" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cultural Domains</label>
			    <input type="text" id="input_cultural_domains" name="input_cultural_domains" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter cultural domain" value="{{$accomplishment->cultural_domains}}"/>
			  </div>

			  <div class="mb-3">
			    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="input_file_accomplishments">Upload File</label>
			    <input class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="input_file_accomplishments" id="input_file_accomplishments" name="input_file_accomplishments" type="file" accept="text,.txt,.csv,.pdf,.word,.xlsx,.ppt" value="{{$accomplishment->attached_file}}">
			  </div>

			</div>

		</form>

	</div>
	

</x-app-layout>

<script type="text/javascript">
	
</script>