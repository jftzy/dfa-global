<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 leading-tight">
            {{ __('Welcome to Dashboard, ') }} {{ auth()->user()->name }} !
        </h2>
    </x-slot>
    <input type="hidden" name="yr" id="yr" value="{{$year}}">
    <input type="hidden" name="reg" id="reg" value="{{$region}}">
    <div class="py-6" x-data="{}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg inline-flex justify-between items-center w-full">
                <div class="text-gray-800 inline-flex items-center">
                    <x-icons.icon-globe class="h-12 w-12 mr-2"></x-icons.icon-globe>
                    <div class="flex flex-col">
                        <p class="text-lg font-bold">
                            Geographical Statistics per Region
                        </p>
                        <small class="text-sm text-gray-500">Showing global map of cutural activities accross the selected regions.</small>
                    </div>
                </div>
                
                <div class="border border-gray-300 rounded-lg shadow p-2 flex flex-col">
                    <h3 class="text-gray-600 font-semibold text-xs pb-1">Filters</h3>
                    <div class="inline-flex items-center">
                        <form class="max-w-sm mx-1 inline-flex gap-2" method="get" action="{{route('dashboard.regional')}}" id="filter_form" name="filter_form">
                          <select id="year" name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Choose year</option>
                            @for($y = 2024; $y >= 2020; $y--)
                            <option value="{{$y}}" @if($y == $year) selected @endif>{{$y}}</option>
                            @endfor
                            
                            
                          </select>

                          <select id="region" name="region" class="min-w-[180px] bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            
                            
                            <option value="1" @if($region == 1) selected @endif selected>Americas and Canada</option>
                            <option value="2" @if($region == 2) selected @endif>Europe</option>
                            <option value="3" @if($region == 3) selected @endif>Middle East and Africa</option>
                            <option value="4" @if($region == 4) selected @endif>Asia and Pacific</option>
                           
                            
                            
                          </select>
                        </form>

                       

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
                  
                    <div class="p-5 text-gray-900 inline-flex w-full">

                        <!-- bar chart -->
                        <div class="hidden w-full bg-white rounded-lg dark:bg-gray-800" id="barChart_mode">
                          <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <div class="flex items-center justify-between">
                                  <div>
                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Data generated</p>
                                  </div>
                                </div>
                            </div>
                          </div>
                          <div id="bar-chart"></div>
                        </div>
                        <!-- end bar chart -->
                    
                          <div class="w-full">
                            <table class="table table-bordered w-full">
                              <thead>
                                  <tr class="table-info">
                                    <th>Country</th>
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
                        <div id="barchartB" class="w-full">
                          <table class="table table-bordered">
                            <thead>
                                <tr class="table-info">
                                  <th>Country</th>
                                  <th>Project Classification</th>
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
                        <div id="barchartC" class="w-full">
                          <table class="table table-bordered">
                            <thead>
                                <tr class="table-info">
                                  <th>Country</th>
                                  <th>Foreign Policy Pillar</th>
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
                        <div id="barchartD" class="w-full">
                          <table class="table table-bordered">
                            <thead>
                                <tr class="table-info">
                                  <th>Quarter</th>
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

            <!-- Comprehensive Bar Chart -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 w-6/12 inline-flex relative">
                <div class="p-5 text-gray-900 inline-flex w-full">
                    <div id="barchartA" style="width: fit-content; height: fit-content;"></div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 w-6/12 inline-flex relative">
                <div class="p-5 text-gray-900 inline-flex w-full">
                    <div id="barchartB" style="width: fit-content; height: fit-content;"></div>
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

    $('#year').on('change', function() {
      //console.log( this.value );
      //window.location.href = "{{route('dashboard.data.region',[':id','region'])}}".replace(':id', this.value).replace(':region', $(''));
      $('#filter_form').submit();
    });
    $('#region').on('change', function() {
      //console.log( this.value );
      //window.location.href = "{{route('dashboard.data.region',[':id','region'])}}".replace(':id', this.value).replace(':region', $(''));
      $('#filter_form').submit();
    });

    // your code here
    let baArrayCountry = [];
    let baArrayType = [];
    let baArrayTotal = [];
    let bbArray = [];
    let bcArray = [];
    let bdArray = [];
  
    google.charts.load('current', {
      'packages':['geochart','corechart','bar'],
      // 'mapsApiKey': 'AIzaSyDK2Grm03U3YrQScpSPB500wogvnlntydQ' //my API key
    });

    // google.charts.setOnLoadCallback(drawRegionsMap);
    google.charts.setOnLoadCallback(drawRegionsMapSubmissions);
    //google.charts.setOnLoadCallback(drawProjectType);
    //google.charts.setOnLoadCallback(drawBarChartA);

    get_data({{$region}});

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

    function get_data(region = null){
      $.ajax({
        url: "{{route('dashboard.data.region')}}",
        type: "get", 
        data: { 
          yr: $('#yr').val(), 
          region: region
        },
        success: function(response) {
      
          pt_chart($.parseJSON(response.pt_chart));
          pc_chart($.parseJSON(response.pc_chart));
          $('#tab_project_type').html('');
          $.each(response.project_type , function(index, val) {
            $('#tab_project_type').append('<tr><td>'+val.country+'</td><td>'+val.project_type+'</td><td align="center">'+val.total+'</td></tr>');
              baArrayCountry.push(val.country);        
              baArrayType.push(val.project_type);        
              baArrayTotal.push(val.total);        
          });
        

          $('#tab_project_classification').html('');
          $.each(response.project_classification , function(index, val) {
            $('#tab_project_classification').append('<tr><td>'+val.country+'</td><td>'+val.project_classification+'</td><td align="center">'+val.total+'</td></tr>');
          });

          $('#tab_foreign_policy_pillar').html('');
          $.each(response.foreign_policy_pillar , function(index, val) {
            $('#tab_foreign_policy_pillar').append('<tr><td>'+val.country+'</td><td>'+val.foreign_policy_pillar+'</td><td align="center">'+val.total+'</td></tr>');
          });          

          $('#tab_qtr').html('');
          $.each(response.qtr , function(index, val) {
            $('#tab_qtr').append('<tr><td>'+val.quarter+'</td><td align="center">'+val.total+'</td></tr>');
          });


         

        }
      });
    }

    function pt_chart(chart_data) {
        //console.log(chart_data);
        var data = google.visualization.arrayToDataTable(chart_data);

        var options = {
            width: 550,
            height: 400,
            legend: { position: 'top', maxLines: 4 },
            bar: { groupWidth: '75%' },
            isStacked: true,
            chart: {
            title: 'Project types',
            }
        };

        var barchart = new google.charts.Bar(document.getElementById('barchartA'));
        barchart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function pc_chart(chart_data) {
        //console.log(chart_data);
        var data = google.visualization.arrayToDataTable(chart_data);

        var options = {
            width: 550,
            height: 400,
            legend: { position: 'top', maxLines: 4 },
            bar: { groupWidth: '75%' },
            isStacked: true,
            chart: {
            title: 'Project Classification',
            subtitle: ''
            }
        };

        var barchartB = new google.charts.Bar(document.getElementById('barchartB'));
        barchartB.draw(data, google.charts.Bar.convertOptions(options));
    }

</script>