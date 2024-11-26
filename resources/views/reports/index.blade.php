<x-app-layout>

	<x-slot name="header">
	    <h2 class="font-semibold text-lg text-gray-800 leading-tight">
	        {{ __('Reports - Accomplishments') }}
	    </h2>
	</x-slot>

	<div class="w-full p-2" x-data="{}">
		<div class="border border-gray-200 shadow rounded">
			

			<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
			        	@foreach($data as $key => $datum)
			            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
			                <th scope="row" class="px-3 py-2 font-medium {{!$key ? 'text-gray-900' : 'text-gray-700'}} dark:text-white text-xs">
			                    {{ $datum->title }}
			                </th>
			                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
			                	{{ $datum->country->name }}
			                </td>
			                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
			                	{{ $datum->month }} {{ $datum->year }}/Q{{ $datum->quarter }}
			                </td>
			                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
			                	{{ $datum->project_type }}
			                </td>
			                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
			                	{{ $datum->project_classification }}
			                </td>
			                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
			                	{{ $datum->foreign_policy_pillar }}
			                </td>
			                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
			                	{{ $datum->target_audience }}
			                </td>
			                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
			                	{{ $datum->strategic_plan }}
			                </td>
			                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
			                	{{ $datum->diplomacy }}
			                </td>
			                <td class="px-3 py-2 font-medium text-gray-700 dark:text-white text-xs">
			                	{{ $datum->cultural_domains }}
			                </td>
			                <!-- <td class="px-6 py-4 text-right">
			                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
			                </td> -->
			            </tr>
			            @endforeach
			        </tbody>
			    </table>
			</div>

		</div>
	</div>

</x-app-layout>