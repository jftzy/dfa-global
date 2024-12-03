<x-app-layout>

    <style type="text/css">
        #pieTable_mode table tbody td,
        #columnTable_mode table tbody td,
        #barTable_mode table tbody td,
        #lineTable_mode table tbody td {
            padding: 5px;
            border-top: 1px solid #E5E7EB;
            border-right: 1px solid #E5E7EB;
            text-align: center;
        }
    </style>
    
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 leading-tight">
            {{ __('Welcome to Dashboard, ') }} {{ auth()->user()->name }} !
        </h2>
    </x-slot>
    
    <input type="hidden" name="yr" id="yr" value="{{$year}}">
    <div class="py-6" x-data="{}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg inline-flex justify-between items-center w-full">
                <div class="text-gray-800 inline-flex items-center">
                    <x-icons.icon-globe class="h-12 w-12 mr-2"></x-icons.icon-globe>
                    <div class="flex flex-col">
                        <p class="text-lg font-bold">
                            Geographical Statistics per Country
                        </p>
                        <small class="text-sm text-gray-500">Showing global map of cutural activities accross the selected regions.</small>
                    </div>
                </div>
                
                <div class="border border-gray-300 rounded-lg shadow p-2 flex flex-col">
                    <h3 class="text-gray-600 font-semibold text-xs pb-1">Filters</h3>
                    <div class="inline-flex items-center">
                        <form class="max-w-sm mx-1">
                          <select id="year" name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Choose year</option>
                            @for($y = 2024; $y >= 2020; $y--)
                            <option value="{{$y}}" @if($y == $year) selected @endif>{{$y}}</option>
                            @endfor
                          </select>
                        </form>

                        <button id="totalCA" data-dropdown-toggle="totalCAdropdown" class=" hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mx-1" type="button">
                            <x-icons.icon-file-lines class="h-4 w-4 mr-2"></x-icons.icon-file-lines>
                            Total Cultural Activity<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                        </button>

                        <button id="projectType" data-dropdown-toggle="projectTypedropdown" class=" hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mx-1" type="button">
                            <x-icons.icon-folder class="h-4 w-4 mr-2"></x-icons.icon-folder>
                            Project Type<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                        </button>

                        <!-- Dropdown menu totalCA -->
                        <div id="totalCAdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="totalCA">
                              <li>
                                <a class="cursor-pointer block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" @click="drawRegionsMapSubmissions()">All Regions</a>
                              </li>
                              <li>
                                <a class="cursor-pointer block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" @click="drawRegionsMapFilterAC()">Americas and Canada</a>
                              </li>
                              <li>
                                <a class="cursor-pointer block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" @click="drawRegionsMapFilterEU()">Europe</a>
                              </li>
                              <li>
                                <a class="cursor-pointer block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" @click="drawRegionsMapFilterME()">Middle East and Africa</a>
                              </li>
                              <li>
                                <a class="cursor-pointer block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" @click="drawRegionsMapFilterAP()">Asia and Pacific</a>
                              </li>
                            </ul>
                        </div>

                        <!-- Dropdown menu totalCA -->
                        <div id="projectTypedropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="projectType">
                              <li>
                                <a class="cursor-pointer block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" @click="drawRegionsMapProjectRec()">Recurring</a>
                              </li>
                              <li>
                                <a class="cursor-pointer block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" @click="drawRegionsMapProjectFlg()">Flagship</a>
                              </li>
                              <li>
                                <a class="cursor-pointer block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" @click="drawRegionsMapProjectOT()">One Time</a>
                              </li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Regional Global Map Chart -->
            <div class="hidden bg-white overflow-hidden shadow-sm sm:rounded-t-lg w-full inline-flex justify-between mt-4 p-3">
                <div>
                    <h3 class="font-bold table_mode_title pt-1" style="display: none;">Report 2024</h3>
                </div>
                <label for="switch_view" class="flex items-center cursor-pointer">
                <!-- label -->
                    <div class="mr-2 text-gray-700 font-medium text-sm">
                      Switch View
                    </div>
                <!-- toggle -->
                    <div class="relative">
                      <!-- input -->
                      <input type="checkbox" id="switch_view" class="sr-only">
                      <!-- line -->
                      <div class="block bg-gray-600 w-14 h-8 rounded-full"></div>
                      <!-- dot -->
                      <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition"></div>
                    </div>
                </label>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-b-lg chart_mode mt-4">
                <div class="p-6 text-gray-900 inline-flex items-center justify-center w-full">
                    <div id="regions_div" style="width: 900px; height: 500px;"></div>
                </div>
            </div>


            <div class="w-full inline-flex gap-4">
                <!-- Comprehensive Bar Chart -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 w-6/12 inline-flex relative">
                    <div class="p-5 text-gray-900 inline-flex w-full relative">

                        <label for="switch_columnChart" class="inline-flex items-center mb-5 cursor-pointer absolute top-7 right-5">
                          <!-- toggle -->
                          <input type="checkbox" id="switch_columnChart" class="sr-only peer">
                          <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                          <!-- label -->
                          <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Switch View</span>
                        </label>

                        <!-- column chart -->
                        <div class="w-full bg-white rounded-lg dark:bg-gray-800" id="columnChart_mode">
                          <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-center justify-between">
                              <div>
                                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Project Type Total</h5>
                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Data generated</p>
                              </div>
                            </div>
                          </div>


                          <div id="column-chart"></div>
                            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between"></div>
                        </div>
                        <!-- end column chart -->

                        <div id="columnTable_mode" class="hidden w-full">
                          <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Project Type Total</h5>
                          <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Data generated</p>
                          <div class="mt-4 border border-gray-300 shadow rounded-lg">
                              <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                      <th class="p-2 border">Project Type</th>
                                      <th class="p-2 border">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="tab_project_type">

                                </tbody>
                              </table>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 w-6/12 inline-flex relative">
                    <div class="p-5 text-gray-900 inline-flex w-full">

                        <label for="switch_barChart" class="inline-flex items-center mb-5 cursor-pointer absolute top-7 right-5">
                          <!-- toggle -->
                          <input type="checkbox" id="switch_barChart" class="sr-only peer">
                          <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                          <!-- label -->
                          <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Switch View</span>
                        </label>

                        <!-- line chart -->
                        <div class="w-full bg-white rounded-lg dark:bg-gray-800" id="barChart_mode">
                          <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <div class="flex items-center justify-between">
                                  <div>
                                    <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Project Classification Total</h5>
                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Data generated</p>
                                  </div>
                                </div>
                            </div>
                          </div>
                          <div id="bar-chart"></div>
                        </div>
                        <!-- end line chart -->

                        <div id="barTable_mode" class="hidden w-full">
                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Project Classification Total</h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Data generated</p>
                            <div class="mt-4 border border-gray-300 shadow rounded-lg">
                                <table class="table-auto w-full">
                                    <thead>
                                        <tr>
                                          <th class="p-2 border">Project Classification</th>
                                          <th class="p-2 border">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tab_project_classification">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="w-full inline-flex gap-4">
                <!-- Comprehensive Bar Chart -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 w-6/12 inline-flex relative">
                    <div class="p-5 text-gray-900 inline-flex w-full">

                        <label for="switch_pieChart" class="inline-flex items-center mb-5 cursor-pointer absolute top-7 right-5">
                          <!-- toggle -->
                          <input type="checkbox" id="switch_pieChart" class="sr-only peer">
                          <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                          <!-- label -->
                          <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Switch View</span>
                        </label>

                        <!-- pie chart -->
                        <div class="w-full bg-white rounded-lg dark:bg-gray-800" id="pieChart_mode">
                            <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Foreign Policy Pillar</h5>
                                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Data generated</p>
                                    </div>
                                </div>
                            </div>
                            <div class="py-6" id="pie-chart"></div>
                        </div>
                        <!-- end pie chart -->

                        <div id="pieTable_mode" class="hidden w-full">
                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Foreign Policy Pillar</h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Data generated</p>
                            <div class="mt-4 border border-gray-300 shadow rounded-lg">
                                <table class="table-auto w-full">
                                    <thead>
                                        <tr>
                                          <th class="p-2 border">Foreign Policy Pillar</th>
                                          <th class="p-2 border">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tab_foreign_policy_pillar">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 w-6/12 inline-flex relative">
                    <div class="p-5 text-gray-900 inline-flex w-full">

                        <label for="switch_lineChart" class="inline-flex items-center mb-5 cursor-pointer absolute top-7 right-5">
                          <!-- toggle -->
                          <input type="checkbox" id="switch_lineChart" class="sr-only peer">
                          <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                          <!-- label -->
                          <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Switch View</span>
                        </label>

                        <!-- line chart -->
                        <div class="w-full bg-white rounded-lg dark:bg-gray-800" id="lineChart_mode">
                          <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <div class="flex items-center justify-between">
                                  <div>
                                    <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Quarterly Accomplishment Reports</h5>
                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Data generated</p>
                                  </div>
                                </div>
                            </div>
                          </div>
                          <div id="area-chart"></div>
                        </div>
                        <!-- end line chart -->

                        <div id="lineTable_mode" class="hidden w-full">
                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Quarterly Accomplishment Reports</h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Data generated</p>
                            <div class="mt-4 border border-gray-300 shadow rounded-lg">
                                <table class="table-auto w-full">
                                    <thead>
                                        <tr>
                                          <th class="p-2 border">Quarterly Accomplishment Reports</th>
                                          <th class="p-2 border">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tab_qtr">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style type="text/css">
    input:checked ~ .dot {
      transform: translateX(100%);
      background-color: #48bb78;
    }
</style>

<!-- include charts assets -->
<script src="{{ asset('charts/js/apexcharts.js') }}"></script>
<!-- end include charts assets -->

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    // your code here
    $('#year').on('change', function() {
      //console.log( this.value );
      window.location.href = "{{route('dashboard',':id')}}".replace(':id', this.value);
    });

    let ptArray = [];
    let pcArray = [];
    let fppArray = [];
    let qtArray = [];

    google.charts.load('current', {
      'packages':['geochart','corechart','bar'],
      // 'mapsApiKey': 'AIzaSyDK2Grm03U3YrQScpSPB500wogvnlntydQ' //my API key
    });

    // google.charts.setOnLoadCallback(drawRegionsMap);
    google.charts.setOnLoadCallback(drawRegionsMapSubmissions);
    //google.charts.setOnLoadCallback(drawProjectType);
   
    get_data();

    function drawRegionsMapSubmissions() {

        let year = document.getElementById('year').value;

      
            var data = google.visualization.arrayToDataTable([
              {!!$r!!}
            ]);
      

        var options = {
            colorAxis: {colors: ['gray', 'green']},
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        google.visualization.events.addListener(chart, 'select', function () {
          const selection = chart.getSelection();
          if (selection.length > 0) {
            const row = selection[0].row;
            const country = data.getValue(row, 0);
            get_data(country);
          }
        });

        chart.draw(data, options);
    }

    function get_data(country = null){
      $.ajax({
        url: "{{route('dashboard.data')}}",
        type: "get", 
        data: { 
          yr: $('#yr').val(), 
          country: country
        },
        success: function(response) {
          //console.log(response);

          project_type_graph_data = [];
          $('#tab_project_type').html('');
          $.each(response.project_type , function(index, val) {
            $('#tab_project_type').append('<tr><td>'+val.project_type+'</td><td>'+val.total+'</td></tr>');
            project_type_graph_data.push({
              x: val.project_type, y: val.total
            });
            ptArray.push(val.total);
          });

          $('#tab_project_classification').html('');
          $.each(response.project_classification , function(index, val) {
            $('#tab_project_classification').append('<tr><td>'+val.project_classification+'</td><td>'+val.total+'</td></tr>');
            pcArray.push(val.total);
          });

          $('#tab_foreign_policy_pillar').html('');
          $.each(response.foreign_policy_pillar , function(index, val) {
            $('#tab_foreign_policy_pillar').append('<tr><td>'+val.foreign_policy_pillar+'</td><td>'+val.total+'</td></tr>');
            fppArray.push(val.total);
          });          

          $('#tab_qtr').html('');
          $.each(response.qtr , function(index, val) {
            $('#tab_qtr').append('<tr><td>&nbsp;Q'+val.quarter+'</td><td>'+val.total+'</td></tr>');
            qtArray.push(val.total);
          });

          console.log(ptArray);
          // pass data to column chart A
          // [
          //         { x: "Flagship", y: ptArray[0] },
          //         { x: "One Time", y: ptArray[1] },
          //         { x: "Recurring", y: ptArray[2] },
          //       ]
          const columnOptions = {
            colors: ["#1A56DB", "#FDBA8C"],
            series: [
              {
                name: "Project Type Total",
                color: "#1A56DB",
                data: project_type_graph_data,
              },
            ],
            chart: {
              type: "bar",
              height: "320px",
              fontFamily: "Inter, sans-serif",
              toolbar: {
                show: false,
              },
            },
            plotOptions: {
              bar: {
                horizontal: false,
                columnWidth: "70%",
                borderRadiusApplication: "end",
                borderRadius: 8,
              },
            },
            tooltip: {
              shared: true,
              intersect: false,
              style: {
                fontFamily: "Inter, sans-serif",
              },
            },
            states: {
              hover: {
                filter: {
                  type: "darken",
                  value: 1,
                },
              },
            },
            stroke: {
              show: true,
              width: 0,
              colors: ["transparent"],
            },
            grid: {
              show: false,
              strokeDashArray: 4,
              padding: {
                left: 2,
                right: 2,
                top: -14
              },
            },
            dataLabels: {
              enabled: false,
            },
            legend: {
              show: false,
            },
            xaxis: {
              floating: false,
              labels: {
                show: true,
                style: {
                  fontFamily: "Inter, sans-serif",
                  cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                }
              },
              axisBorder: {
                show: false,
              },
              axisTicks: {
                show: false,
              },
            },
            yaxis: {
              show: false,
            },
            fill: {
              opacity: 1,
            },
          }

          // pass data to bar chart A
          const barOptions = {
            series: [
              {
                name: "Cultural Heritage",
                color: "#31C48D",
                data: [pcArray[0]],
              },
              {
                name: "Filipino Identity",
                data: [pcArray[1]],
                color: "#ff8944",
              },
              {
                name: "Pop Culture",
                data: [pcArray[2]],
                color: "#5b92ff",
              }
            ],
            chart: {
              sparkline: {
                enabled: false,
              },
              type: "bar",
              width: "100%",
              height: 400,
              toolbar: {
                show: false,
              }
            },
            fill: {
              opacity: 1,
            },
            plotOptions: {
              bar: {
                horizontal: true,
                columnWidth: "100%",
                borderRadiusApplication: "end",
                borderRadius: 6,
                dataLabels: {
                  position: "top",
                },
              },
            },
            legend: {
              show: true,
              position: "bottom",
            },
            dataLabels: {
              enabled: false,
            },
            tooltip: {
              shared: true,
              intersect: false,
              formatter: function (value) {
                return "" + value
              }
            },
            xaxis: {
              labels: {
                show: true,
                style: {
                  fontFamily: "Inter, sans-serif",
                  cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                },
                formatter: function(value) {
                  return "" + value
                }
              },
              categories: ["Reports"],
              axisTicks: {
                show: false,
              },
              axisBorder: {
                show: false,
              },
            },
            yaxis: {
              labels: {
                show: true,
                style: {
                  fontFamily: "Inter, sans-serif",
                  cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                }
              }
            },
            grid: {
              show: true,
              strokeDashArray: 4,
              padding: {
                left: 2,
                right: 2,
                top: -20
              },
            },
            fill: {
              opacity: 1,
            }
          }

          // pass data to pie chart A
          pie_total = fppArray[0] + fppArray[1] + fppArray[2];
          pie_total1 = pie_total / fppArray[0];
          pie_total2 = pie_total / fppArray[1];
          pie_total3 = pie_total / fppArray[2];

          const getChartOptions = () => {
            return {
              series: [pie_total1, pie_total2, pie_total3],
              colors: ["#1C64F2", "#16BDCA", "#9061F9"],
              chart: {
                height: 420,
                width: "100%",
                type: "pie",
              },
              stroke: {
                colors: ["white"],
                lineCap: "",
              },
              plotOptions: {
                pie: {
                  labels: {
                    show: true,
                  },
                  size: "100%",
                  dataLabels: {
                    offset: -25
                  }
                },
              },
              labels: ["Cultural Promotion", "Economic Diplomacy", "National Security"],
              dataLabels: {
                enabled: true,
                style: {
                  fontFamily: "Inter, sans-serif",
                },
              },
              legend: {
                position: "bottom",
                fontFamily: "Inter, sans-serif",
              },
              yaxis: {
                labels: {
                  formatter: function (value) {
                    return value + "%"
                  },
                },
              },
              xaxis: {
                labels: {
                  formatter: function (value) {
                    return value  + "%"
                  },
                },
                axisTicks: {
                  show: false,
                },
                axisBorder: {
                  show: false,
                },
              },
            }
          }

          // pass data to line chart A
          const lineOptions = {
            chart: {
              height: "100%",
              maxWidth: "100%",
              type: "area",
              fontFamily: "Inter, sans-serif",
              dropShadow: {
                enabled: false,
              },
              toolbar: {
                show: false,
              },
            },
            tooltip: {
              enabled: true,
              x: {
                show: false,
              },
            },
            fill: {
              type: "gradient",
              gradient: {
                opacityFrom: 0.55,
                opacityTo: 0,
                shade: "#1C64F2",
                gradientToColors: ["#1C64F2"],
              },
            },
            dataLabels: {
              enabled: false,
            },
            stroke: {
              width: 6,
            },
            grid: {
              show: false,
              strokeDashArray: 4,
              padding: {
                left: 2,
                right: 2,
                top: 0
              },
            },
            series: [
              {
                name: "Reports per Quarter",
                data: [ qtArray[0], qtArray[1], qtArray[2], qtArray[3]],
                color: "#1A56DB",
              },
            ],
            xaxis: {
              categories: ['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'],
              labels: {
                show: false,
              },
              axisBorder: {
                show: false,
              },
              axisTicks: {
                show: false,
              },
            },
            yaxis: {
              show: false,
            },
          }


          // below is charts code configs
          //if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
            const pchart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
            pchart.render();
          //}

          //if(document.getElementById("bar-chart") && typeof ApexCharts !== 'undefined') {
            const bchart = new ApexCharts(document.getElementById("bar-chart"), barOptions);
            bchart.render();
          //}

          //if(document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
            const cchart = new ApexCharts(document.getElementById("column-chart"), columnOptions);
            cchart.render();
          //}

          //if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
            const lchart = new ApexCharts(document.getElementById("area-chart"), lineOptions);
            lchart.render();
          //}

          
          // end chart configs

        }
      });
    }

    document.getElementById('switch_columnChart').onclick = function(){

        let switcher = document.querySelector('#switch_columnChart').checked;

        if (switcher) {
            document.querySelector('#columnChart_mode').style.display = 'none';
            document.querySelector('#columnTable_mode').style.display = 'block';
        } else {
            document.querySelector('#columnChart_mode').style.display = 'block';
            document.querySelector('#columnTable_mode').style.display = 'none';
        }
    }
    
    document.getElementById('switch_barChart').onclick = function(){

        let switcher = document.querySelector('#switch_barChart').checked;

        if (switcher) {
            document.querySelector('#barChart_mode').style.display = 'none';
            document.querySelector('#barTable_mode').style.display = 'block';
        } else {
            document.querySelector('#barChart_mode').style.display = 'block';
            document.querySelector('#barTable_mode').style.display = 'none';
        }
    }

    document.getElementById('switch_pieChart').onclick = function(){

        let switcher = document.querySelector('#switch_pieChart').checked;

        if (switcher) {
            document.querySelector('#pieChart_mode').style.display = 'none';
            document.querySelector('#pieTable_mode').style.display = 'block';
        } else {
            document.querySelector('#pieChart_mode').style.display = 'block';
            document.querySelector('#pieTable_mode').style.display = 'none';
        }
    }

    document.getElementById('switch_lineChart').onclick = function(){

        let switcher = document.querySelector('#switch_lineChart').checked;

        if (switcher) {
            document.querySelector('#lineChart_mode').style.display = 'none';
            document.querySelector('#lineTable_mode').style.display = 'block';
        } else {
            document.querySelector('#lineChart_mode').style.display = 'block';
            document.querySelector('#lineTable_mode').style.display = 'none';
        }
    }

    /*
    function drawProjectType(data){
          var data = google.visualization.arrayToDataTable(data);
            //console.log(data);
            var options = {
              title: 'Project Types',
              is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('chartProjectType'));
            chart.draw(data, options);
        }
*/
</script>