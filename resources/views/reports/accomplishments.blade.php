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
		        {{ __('Reports - Accomplishments') }}
		    </h2>
		    <label class="inline-flex items-center cursor-pointer">
		      <input type="checkbox" id="is_interactive" class="sr-only peer">
		      <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
		      <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300" id="mode_click">Switch to Summary</span>
		    </label>
		</div>
	</x-slot>

	<div x-data="{}">
		<div class="w-full p-4 data-table-container" id="interactive-table">
			<table id="stats_table" class="display cell-border compact hover stripe">
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

		<div class="w-full hidden" id="native-table">
			<div class="w-full border border-gray-300 p-4 rounded-lg">
				<div class="border text-center py-4 font-bold text-lg">DFA Cultural Diplomacy Framework <br /> 2023 Accomplishment Reports</div>
				<table class="w-full">
					<thead>
						<tr>
							<th class="border border-gray-600 text-center" rowspan="2">FSP</th>
							<th class="border border-gray-600 text-center" colspan="3">Project Type</th>
							<th class="border border-gray-600 text-center">&nbsp;</th>
							<th class="border border-gray-600 text-center" colspan="5">Project Classicfication</th>
							<th class="border border-gray-600 text-center" colspan="5">Foreign Policy Pillar</th>
							<th class="border border-gray-600 text-center" colspan="5">Target Audience</th>
							<th class="border border-gray-600 text-center">Remarks</th>
						</tr>
						<tr>
							<th class="border border-gray-600 text-center">Rec</th>
							<th class="border border-gray-600 text-center">Flg</th>
							<th class="border border-gray-600 text-center">OT</th>
							<th class="border border-gray-600 text-center">Others</th>
							<th class="border border-gray-600 text-center">FI</th>
							<th class="border border-gray-600 text-center">CH</th>
							<th class="border border-gray-600 text-center">PC</th>
							<th class="border border-gray-600 text-center">MI/MI</th>
							<th class="border border-gray-600 text-center">Others</th>
							<th class="border border-gray-600 text-center">NS</th>
							<th class="border border-gray-600 text-center">ED</th>
							<th class="border border-gray-600 text-center">OF</th>
							<th class="border border-gray-600 text-center">CP</th>
							<th class="border border-gray-600 text-center">Others</th>
							<th class="border border-gray-600 text-center">IC</th>
							<th class="border border-gray-600 text-center">BC</th>
							<th class="border border-gray-600 text-center">ICS</th>
							<th class="border border-gray-600 text-center">FD</th>
							<th class="border border-gray-600 text-center">Others</th>
							<th class="border border-gray-600 text-center">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@forelse($stats->unique('country_id') as $country)
						@php
							$country_name = \App\Models\Country::find($country->country_id);
						@endphp
						<tr>
							<td class="border border-gray-600 text-center">{{ $country_name->name }}</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('project_type','Recurring')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('project_type','Flagship')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('project_type','One Time')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('project_type','Others')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('project_classification','Filipino Identity')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('project_classification','Cultural Heritage')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('project_classification','Pop Culture')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('project_classification','Bilateral and Multilateral Relations')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('project_classification','Others')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('foreign_policy_pillar','National Security')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('foreign_policy_pillar','Economic Diplomacy')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('foreign_policy_pillar','Promotion and Protection of the rights of Overseas Filipinos')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('foreign_policy_pillar','Cultural Promotion')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('foreign_policy_pillar','Others')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('target_audience','Foreign Governments/International Community')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('target_audience','Business Community')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('target_audience','Foreign/International CIvil Society')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('target_audience','Filipino Diaspora')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								{{ $stats->where('target_audience','Others')->where('country_id',$country->country_id)->count() }}
							</td>
							<td class="border border-gray-600 text-center">
								&nbsp;
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="21" class="text-center">No Data Found.</td>
						</tr>
						@endforelse
					</tbody>
					<tfoot></tfoot>
				</table>
			</div>
		</div>
	</div>

<script type="text/javascript">
	$(document).ready(function() {

		// functions
		$("#is_interactive").on('change', function() {
			if($("#is_interactive").is(':checked')) {
			    $("#interactive-table").hide();  // unchecked
			    $("#native-table").show();  // checked
			    console.log("UN-checked!");
			} else {
			    $("#interactive-table").show();  // checked
			    $("#native-table").hide();  // unchecked
			    console.log("checked!");
			}
		});

	    //code here
	    $('#stats_table').dataTable( {
	    	"zeroRecords": "No Data Found.",
	    	"ordering": true, 
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

</x-app-layout>