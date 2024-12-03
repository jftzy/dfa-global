<x-app-layout>
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
                            Geographical Statistics
                        </p>
                        <small class="text-sm text-gray-500">Showing global map of cutural activities accross the selected regions.</small>
                    </div>
                </div>
                
                <div class="border border-gray-300 rounded-lg shadow p-2 flex flex-col">
                    <h3 class="text-gray-600 font-semibold text-xs pb-1">Filters</h3>
                    <div class="inline-flex items-center">
                        <form class="max-w-sm mx-1">
                          <select id="year" name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="0" selected>Choose a year</option>
                            <option value="22">2022</option>
                            <option value="23">2023</option>
                            <option value="24">2024</option>
                          </select>
                        </form>

                        <button id="totalCA" data-dropdown-toggle="totalCAdropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mx-1" type="button">
                            <x-icons.icon-file-lines class="h-4 w-4 mr-2"></x-icons.icon-file-lines>
                            Total Cultural Activity<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                        </button>

                        <button id="projectType" data-dropdown-toggle="projectTypedropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mx-1" type="button">
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-t-lg w-full inline-flex justify-between mt-4 p-3">
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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-b-lg chart_mode">
                <div class="p-6 text-gray-900 inline-flex items-center justify-center w-full">
                    <div id="regions_div" style="width: 900px; height: 500px;"></div>
                </div>
            </div>


            <div class="w-full inline-flex gap-4">
                <!-- Comprehensive Bar Chart -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 w-6/12 inline-flex relative">
                    <div class="p-5 text-gray-900 inline-flex w-full">
                        <div id="barchartA" style="width: fit-content; height: fit-content;">
                          <table class="table-auto">
                            <thead>
                                <tr>
                                  <th>Project Type</th>
                                  <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="tab_project_type">

                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 w-6/12 inline-flex relative">
                    <div class="p-5 text-gray-900 inline-flex w-full">
                        <div id="barchartB" style="width: fit-content; height: fit-content;">
                          <table>
                            <thead>
                                <tr>
                                  <th>Project Type</th>
                                  <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="tab_project_classification">

                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="w-full inline-flex gap-4">
                <!-- Comprehensive Bar Chart -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 w-6/12 inline-flex relative">
                    <div class="p-5 text-gray-900 inline-flex w-full">
                        <div id="barchartC" style="width: fit-content; height: fit-content;">
                          <table>
                            <thead>
                                <tr>
                                  <th>Project Type</th>
                                  <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="tab_foreign_policy_pillar">

                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 w-6/12 inline-flex relative">
                    <div class="p-5 text-gray-900 inline-flex w-full">
                        <div id="barchartD" style="width: fit-content; height: fit-content;">
                          <table>
                            <thead>
                                <tr>
                                  <th>Quarterly</th>
                                  <th>Total</th>
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
</x-app-layout>

<style type="text/css">
    input:checked ~ .dot {
      transform: translateX(100%);
      background-color: #48bb78;
    }
</style>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">



    // your code here
    let countAmericasAndCanada = 150;
    let countMiddleEastAndAfrica = 12;
    let countEurope = 111;
    let countAsiaAndPacific = 68;

    let submmitted = 1;
    let notsubmmitted = 0;
    let year_chosen = '24';

  



    google.charts.load('current', {
      'packages':['geochart','corechart','bar'],
      // 'mapsApiKey': 'AIzaSyDK2Grm03U3YrQScpSPB500wogvnlntydQ' //my API key
    });

    // google.charts.setOnLoadCallback(drawRegionsMap);
    google.charts.setOnLoadCallback(drawRegionsMapSubmissions);
   

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
          $('#tab_project_type').html('');
          $.each(response.project_type , function(index, val) {
            $('#tab_project_type').append('<tr><td>'+val.project_type+'</td><td>'+val.total+'</td></tr>');
          });

          $('#tab_project_classification').html('');
          $.each(response.project_classification , function(index, val) {
            $('#tab_project_classification').append('<tr><td>'+val.project_classification+'</td><td>'+val.total+'</td></tr>');
          });

          $('#tab_foreign_policy_pillar').html('');
          $.each(response.foreign_policy_pillar , function(index, val) {
            $('#tab_foreign_policy_pillar').append('<tr><td>'+val.foreign_policy_pillar+'</td><td>'+val.total+'</td></tr>');
          });          

          $('#tab_qtr').html('');
          $.each(response.qtr , function(index, val) {
            $('#tab_qtr').append('<tr><td>'+val.quarter+'</td><td>'+val.total+'</td></tr>');
          });

        }
      });
    }

    


</script>