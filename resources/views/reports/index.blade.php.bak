<x-app-layout>

	<x-slot name="header">
	    <h2 class="font-semibold text-lg text-gray-800 leading-tight">
	        {{ __('Reports - Accomplishments') }}
	    </h2>
	</x-slot>


	<div x-data="{}">
		
		<div class="border-b border-gray-200 dark:border-gray-700 pl-4">
		    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="reports-tab" data-tabs-toggle="#reports-tab-content" data-tabs-active-classes="text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">

		        <li class="me-2" role="presentation">
		            <button type="button" id="report-stats-tab" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" data-tabs-target="#report-stats" aria-current="page" role="tab" aria-controls="stats" aria-labelledby="stats-tab">

		            	<x-icons.icon-rain-chart class="mr-2"></x-icons.icon-rain-chart>
		                Statistics

		            </button>
		        </li>
		        <li class="me-2" role="presentation">
		            <button type="button" id="report-events-tab" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" data-tabs-target="#report-events" aria-current="page" role="tab" aria-controls="stats" aria-labelledby="stats-tab">
		                
		                <x-icons.icon-award class="mr-2"></x-icons.icon-award>
		                Events

		            </button>
		        </li>
		        <li class="me-2" role="presentation">
		            <button type="button" id="report-literatures-tab" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" data-tabs-target="#report-literature" aria-current="page" role="tab" aria-controls="stats" aria-labelledby="stats-tab">
		                
		                <x-icons.icon-news class="mr-2"></x-icons.icon-news>
		                Literatures

		            </button>
		        </li>

		    </ul>
		</div>

		<div class="w-full p-2" id="reports-tab-content" role="tabpanel" aria-labelledby="tables-tab">

			<div class="hidden border border-gray-200 shadow rounded" id="report-stats">
				<div class="relative overflow-x-auto overflow-y-auto shadow-md sm:rounded-lg max-h-[620px]">
				    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
				        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
				            <tr>
				                <th scope="col" class="px-6 py-3">
				                    Country
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Title
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Month & Year / Quarter
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Project Type
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Project Classification
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Foreign Policy Pillar
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Target Audience
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Strategic Plan
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Diplomacy
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Cultural Domains
				                </th>
				               <!--  <th scope="col" class="px-6 py-3">
				                    Action
				                </th> -->
				            </tr>
				        </thead>
				        <tbody>
				        	@forelse($data_stats as $key => $data_stat)
				            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
				                <th scope="row" class="px-3 py-2 font-medium {{!$key ? 'text-gray-900' : 'text-gray-700'}} dark:text-white text-xs">
				                    {{ $data_stat->title }}
				                </th>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
				                	{{ $data_stat->country->name }}
				                </td>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
				                	{{ $data_stat->month }} {{ $data_stat->year }}/Q{{ $data_stat->quarter }}
				                </td>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
				                	{{ $data_stat->project_type }}
				                </td>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
				                	{{ $data_stat->project_classification }}
				                </td>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
				                	{{ $data_stat->foreign_policy_pillar }}
				                </td>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
				                	{{ $data_stat->target_audience }}
				                </td>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
				                	{{ $data_stat->strategic_plan }}
				                </td>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
				                	{{ $data_stat->diplomacy }}
				                </td>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
				                	{{ $data_stat->cultural_domains }}
				                </td>
				                <!-- <td class="px-6 py-4 text-right">
				                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
				                </td> -->
				            </tr>
				            @empty
				            <tr><td colspan="6" class="text-center">No data found.</td></tr>
				            @endforelse
				        </tbody>
				    </table>
				</div>
			</div>

			<div class="hidden border border-gray-200 shadow rounded" id="report-events">
				<div class="relative overflow-x-auto overflow-y-auto shadow-md sm:rounded-lg max-h-[620px]">
				    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
				        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
				            <tr>
				                <th scope="col" class="px-6 py-3">
				                    Host Communities
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Filipino Commmunities
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Other Stakeholders
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Event Title
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Short Description
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Date
				                </th>
				            </tr>
				        </thead>
				        <tbody>
				        	@forelse($data_events as $key => $data_event)
				            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
				                <th scope="row" class="px-3 py-2 font-medium {{!$key ? 'text-gray-900' : 'text-gray-700'}} dark:text-white text-xs">
				                    {{ $data_event->host_communities }}
				                </th>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
				                	{{ $data_event->filipino_communities }}
				                </td>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
				                	{{ $data_event->other_stakeholders }}
				                </td>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
				                	{{ $data_event->title_of_the_event }}
				                </td>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
				                	{{ $data_event->short_description }}
				                </td>
				                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
				                	{{ $data_event->date_from }} to {{ $data_event->date_to }}
				                </td>
				            </tr>
				            @empty
				            <tr><td colspan="6" class="text-center">No data found.</td></tr>
				            @endforelse
				        </tbody>
				    </table>
				</div>
			</div>

			<div class="hidden border border-gray-200 shadow rounded" id="report-literature">
				Literature tab
			</div>

		</div>
	</div>

</x-app-layout>