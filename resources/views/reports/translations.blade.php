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
		      <input type="checkbox" id="is_interactive" class="sr-only peer">
		      <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
		      <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300" id="mode_click">Switch to Summary</span>
		    </label>
		</div>
	</x-slot>

</x-app-layout>