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
		@media only screen and (max-width: 768px) {
			.w-full.p-4.data-table-container .dt-search {
				position: inherit;
			}
		}
		@media print {
	        .no-print {
	            display: none !important;
	        }
	    }
	    .floats{
	    	position:fixed;
	    	width:60px;
	    	height:60px;
	    	bottom:40px;
	    	right:40px;
	    	background-color:#0C9;
	    	color:#FFF;
	    	border-radius:50px;
	    	text-align:center;
	    	box-shadow: 2px 2px 3px #999;
	    	cursor: pointer;
	    }
	</style>

	<x-slot name="header">
		<div class="w-full inline-flex justify-between no-print">
		    <h2 class="font-semibold text-lg text-gray-100 leading-tight">
		        {{ __('Reports -') }} <span class="text-[#fdc02f]">{{ __('Accomplishments') }}</span>
		    </h2>
		    <label class="inline-flex items-center cursor-pointer">
		      <input type="checkbox" id="is_interactive" class="sr-only peer">
		      <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-yellow-300 dark:peer-focus:ring-yellow-600 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-yellow-400"></div>
		      <span class="ms-3 text-sm font-medium text-gray-100 dark:text-gray-300" id="mode_click">Switch to Summary</span>
		    </label>
		</div>
	</x-slot>

	<div class="border-b border-gray-300 shadow rounded p-4 interactive-table no-print">
		<form class="inline-flex items-center gap-4 flex-wrap lg:flex-nowrap">
			<span class="text-sm font-bold- pl-2 text-gray-700">
				Filters:
			</span>
			<select id="region" name="region" class="lg:min-w-52 bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
				<option value="" selected>Choose Region</option>
				@foreach(\App\Models\Region::get() as $r)
				<option value="{{$r->id}}">{{$r->name}}</option>
				@endforeach
			</select>
			<select id="year" name="year" class="lg:min-w-52 bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
				<option value="" selected>Choose Year</option>
					@for($y = 2024; $y >= 2020; $y--)
					<option value="{{$y}}">{{$y}}</option>
					@endfor
			</select>
			<button type="submit" class="min-w-32 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 inline-flex items-center gap-2">
				<x-icons.icon-indent></x-icons.icon-indent>
				Submit
			</button>
		</form>
	</div>

	<div x-data="{}">
		<div class="w-full p-4 data-table-container interactive-table">
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
                        <th class="noExport"><span class="flex items-center">Attached File</span></th>
			        </tr>
			    </thead>
			    <tbody>
			        
						@forelse($stats as $d)
			        	<tr>
							<td>{{$d->country}}</td>
							<td>{{$d->title}}</td>
							<td>{{$d->month}}</td>
							<td>{{$d->year}}</td>
							<td>{{$d->quarter}}</td>
							<td>{{$d->project_type}}</td>
							<td>{{$d->project_classification}}</td>
							<td>{{$d->foreign_policy_pillar}}</td>
							<td>{{$d->target_audience}}</td>
							<td>{{$d->strategic_plan}}</td>
							<td>{{$d->diplomacy}}</td>
							<td>{{$d->cultural_domains}}</td>
							<td class="noExport"><a href="storage/uploads/{{$d->attached_file}}" title="View File">{{$d->attached_file}}</a></td>
						</tr>
						@empty
						@endforelse
			        
			    </tbody>
			    <tfoot>
			    	
			    </tfoot>
			</table>
		</div>

		<div class="w-full hidden" id="native-table">
			<div class="w-full border border-gray-300 p-4 rounded-lg">
				<div class="border text-center py-4 font-bold text-lg relative">
					DFA Cultural Diplomacy Framework 
					<br /> 
					Accomplishment Reports
					<button class="hidden no-print float-right border border-gray-300 rounded px-4 py-2" onclick="window.print()" style="transform: translate(-24px, -20px);">Print</button>
				</div>
				<button class="px-4 py-2 floats pointer no-print" title="Print" onclick="window.print()"><x-icons.icon-print class="w-8 h-8"></x-icons.icon-print></button>
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
			    $(".interactive-table").hide();  // unchecked
			    $("#native-table").show();  // checked
			    console.log("UN-checked!");
			} else {
			    $(".interactive-table").show();  // checked
			    $("#native-table").hide();  // unchecked
			    console.log("checked!");
			}
		});

	    //code here
	    $('#stats_table').dataTable( {
	    	"zeroRecords": "No Data Found.",
	    	"ordering": true,
	    	"order": [],
	    	"bLengthChange" : false, 
			paging: true,
	    	pageLength: 10,
	    	scrollX: true,
	        dom: 'lBfrtip',
            buttons: [
				{ extend: 'copy', text: '<i class="fas fa-file-copy fa-1x" aria-hidden="true"> <b>Copy Data</b></i>' },
				{ 
					extend: 'pdf', 
					text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"><b>PDF</b></i>', 
					orientation : 'landscape',
					exportOptions: {
						columns: ":visible:not(.noExport)"
					}
				},
				{ extend: 'csv', text: '<i class="fas fa-file-csv fa-1x"><b>CSV</b></i>' },
				{ extend: 'excel', text: '<i class="fas fa-file-excel" aria-hidden="true"><b>EXCEL</b></i>' },
				'pageLength'
			],
		});
	});
</script>

</x-app-layout>
