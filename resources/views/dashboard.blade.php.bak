<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 leading-tight">
            {{ __('Welcome to Dashboard, ') }} {{ auth()->user()->name }} !
        </h2>
    </x-slot>

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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-b-lg table_mode" style="display: none;">
                <div class="p-6 text-gray-900 flex flex-col w-full">
                    <table class="w-full text-left table-auto min-w-max">
                        <thead>
                          <tr>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                              <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Region
                              </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                              <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Total Cultural Activities
                              </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                              <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Recurring
                              </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                              <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Flagship
                              </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                              <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                One Time
                              </p>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="p-4 border-b border-blue-gray-50">
                              <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                Americas and Canada
                              </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                              <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                {{ rand(10, 200) }}
                              </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                              <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                {{ rand(10, 200) }}
                              </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                              <a href="#" class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                                {{ rand(10, 200) }}
                              </a>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                              <a href="#" class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                                {{ rand(10, 200) }}
                              </a>
                            </td>
                          </tr>
                          <tr>
                            <td class="p-4 border-b border-blue-gray-50">
                              <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                Europe
                              </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                              <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                {{ rand(10, 200) }}
                              </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                              <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                {{ rand(10, 200) }}
                              </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                              <a href="#" class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                                {{ rand(10, 200) }}
                              </a>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                              <a href="#" class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                                {{ rand(10, 200) }}
                              </a>
                            </td>
                          </tr>
                          <tr>
                            <td class="p-4 border-b border-blue-gray-50">
                              <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                Middle East and Africa
                              </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                              <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                {{ rand(10, 200) }}
                              </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                              <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                {{ rand(10, 200) }}
                              </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                              <a href="#" class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                                {{ rand(10, 200) }}
                              </a>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                              <a href="#" class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                                {{ rand(10, 200) }}
                              </a>
                            </td>
                          </tr>
                          <tr>
                            <td class="p-4 border-b border-blue-gray-50">
                              <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                Asia and Pacific
                              </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                              <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                {{ rand(10, 200) }}
                              </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                              <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                {{ rand(10, 200) }}
                              </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                              <a href="#" class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                                {{ rand(10, 200) }}
                              </a>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                              <a href="#" class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                                {{ rand(10, 200) }}
                              </a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>

            <div class="w-full inline-flex gap-4">
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
                <!-- Donut Chart -->
                <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 w-4/12 inline-flex items-center">
                    <div class="p-5 text-gray-900 inline-flex w-full">
                        <div id="donutchart" style="width: fit-content; height: fit-content; transform: scale(1.25);"></div>
                    </div>
                </div> -->
            </div>
            <div class="w-full inline-flex gap-4">
                <!-- Comprehensive Bar Chart -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 w-6/12 inline-flex relative">
                    <div class="p-5 text-gray-900 inline-flex w-full">
                        <div id="barchartC" style="width: fit-content; height: fit-content;"></div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 w-6/12 inline-flex relative">
                    <div class="p-5 text-gray-900 inline-flex w-full">
                        <div id="barchartD" style="width: fit-content; height: fit-content;"></div>
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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    // data for Bar Chart A
    let barchart1AC = @json($barchart1AC);
    let barchart1Eu = @json($barchart1Eu);
    let barchart1MA = @json($barchart1MA);
    let barchart1AP = @json($barchart1AP);
    let barchart2AC = @json($barchart2AC);
    let barchart2Eu = @json($barchart2Eu);
    let barchart2MA = @json($barchart2MA);
    let barchart2AP = @json($barchart2AP);
    let barchart3AC = @json($barchart3AC);
    let barchart3Eu = @json($barchart3Eu);
    let barchart3MA = @json($barchart3MA);
    let barchart3AP = @json($barchart3AP);
    let barchart4AC = @json($barchart4AC);
    let barchart4Eu = @json($barchart4Eu);
    let barchart4MA = @json($barchart4MA);
    let barchart4AP = @json($barchart4AP);
    // end Bar Chart A

    // your code here
    let countAmericasAndCanada = 150;
    let countMiddleEastAndAfrica = 12;
    let countEurope = 111;
    let countAsiaAndPacific = 68;

    let submmitted = 1;
    let notsubmmitted = 0;
    let year_chosen = '24';

    let barchartAmALow = 30;
    let barchartAmAHigh = 33;
    let barchartEuALow = 10;
    let barchartEuAHigh = 45;
    let barchartMeALow = 15;
    let barchartMeAHigh = 29;
    let barchartAsALow = 9;
    let barchartAsAHigh = 30;

    let barchartAmBLow = 3;
    let barchartAmBHigh = 30;
    let barchartEuBLow = 1;
    let barchartEuBHigh = 25;
    let barchartMeBLow = 9;
    let barchartMeBHigh = 19;
    let barchartAsBLow = 19;
    let barchartAsBHigh = 35;

    let barchartAmCLow = 2;
    let barchartAmCHigh = 10;
    let barchartEuCLow = 11;
    let barchartEuCHigh = 19;
    let barchartMeCLow = 5;
    let barchartMeCHigh = 25;
    let barchartAsCLow = 5;
    let barchartAsCHigh = 15;

    let barchartAmDLow = 13;
    let barchartAmDHigh = 15;
    let barchartEuDLow = 1;
    let barchartEuDHigh = 10;
    let barchartMeDLow = 25;
    let barchartMeDHigh = 27;
    let barchartAsDLow = 11;
    let barchartAsDHigh = 20;

    document.getElementById('year').addEventListener('change', function() {
        this.year_chosen = document.getElementById('year').value;
        console.log(year_chosen);
        drawBarChartA(this.year_chosen);
        drawBarChartB(this.year_chosen);
        drawBarChartC(this.year_chosen);
        drawBarChartD(this.year_chosen);
    });

    function drawRegionsMapFilterAC() {

        let year = document.getElementById('year').value;

        switch (year) {
            case '22':
                countAmericasAndCanada = 55;
                countMiddleEastAndAfrica = 0;
                countEurope = 0;
                countAsiaAndPacific = 0;
            break;
            case '23':
                countAmericasAndCanada = 119;
                countMiddleEastAndAfrica = 0;
                countEurope = 0;
                countAsiaAndPacific = 0;
            break;
            default:
                countAmericasAndCanada = 150;
                countMiddleEastAndAfrica = 0;
                countEurope = 0;
                countAsiaAndPacific = 0;
        };

        google.charts.setOnLoadCallback(this.drawRegionsMap);
    }

    function drawRegionsMapFilterEU() {

        let year = document.getElementById('year').value;

        switch (year) {
            case '22':
                countAmericasAndCanada = 0;
                countMiddleEastAndAfrica = 0;
                countEurope = 120;
                countAsiaAndPacific = 0;
            break;
            case '23':
                countAmericasAndCanada = 0;
                countMiddleEastAndAfrica = 0;
                countEurope = 241;
                countAsiaAndPacific = 0;
            break;
            default:
                countAmericasAndCanada = 0;
                countMiddleEastAndAfrica = 0;
                countEurope = 211;
                countAsiaAndPacific = 0;
        };

        google.charts.setOnLoadCallback(this.drawRegionsMap);
    }

    function drawRegionsMapFilterME() {
        
        let year = document.getElementById('year').value;

        switch (year) {
            case '22':
                countAmericasAndCanada = 0;
                countMiddleEastAndAfrica = 55;
                countEurope = 0;
                countAsiaAndPacific = 0;
            break;
            case '23':
                countAmericasAndCanada = 0;
                countMiddleEastAndAfrica = 126;
                countEurope = 0;
                countAsiaAndPacific = 0;
            break;
            default:
                countAmericasAndCanada = 0;
                countMiddleEastAndAfrica = 22;
                countEurope = 0;
                countAsiaAndPacific = 0;
        };

        google.charts.setOnLoadCallback(this.drawRegionsMap);
    }

    function drawRegionsMapFilterAP() {
        
        let year = document.getElementById('year').value;

        switch (year) {
            case '22':
                countAmericasAndCanada = 0;
                countMiddleEastAndAfrica = 0;
                countEurope = 0;
                countAsiaAndPacific = 371;
            break;
            case '23':
                countAmericasAndCanada = 0;
                countMiddleEastAndAfrica = 0;
                countEurope = 0;
                countAsiaAndPacific = 310;
            break;
            default:
                countAmericasAndCanada = 0;
                countMiddleEastAndAfrica = 0;
                countEurope = 0;
                countAsiaAndPacific = 368;
        };

        google.charts.setOnLoadCallback(this.drawRegionsMap);
    }

    function drawRegionsMapFilter(filter) {

        switch (filter) {
            case 'ac':
                countAmericasAndCanada = countAmericasAndCanada;
                countMiddleEastAndAfrica = 0;
                countEurope = 0;
                countAsiaAndPacific = 0;
            break;
            case 'me':
                countAmericasAndCanada = 0;
                countMiddleEastAndAfrica = countMiddleEastAndAfrica;
                countEurope = 0;
                countAsiaAndPacific = 0;
            break;
            case 'eu':
                countAmericasAndCanada = 0;
                countMiddleEastAndAfrica = 0;
                countEurope = countEurope;
                countAsiaAndPacific = 0;
            break;
            case 'ap':
                countAmericasAndCanada = 0;
                countMiddleEastAndAfrica = 0;
                countEurope = 0;
                countAsiaAndPacific = countAsiaAndPacific;
            break;
            default:
        }
        
        google.charts.setOnLoadCallback(drawRegionsMap);
        
    }

    function drawRegionsMapProjectRec() {

        let year = document.getElementById('year').value;

        switch (year) {
            case '22':
                var data = google.visualization.arrayToDataTable([

                  // Europe
                  ['Country',   'Recurring Project', {label: 'FSA', role: 'tooltip'}],
                  ['Greece',  110, 'Barcelona PCG: 110'],
                  ['Spain', 125, 'Athens PE: 117\nMadrid PE: 8'],
                  ['Turkey',  120, 'Ankara PE: 118\nIstanbul PCG: 2\r'],
                  ['Switzerland',  120, 'Berne PE: 0\nGeneva PM: 120\r'],
                  ['Belgium',  10, 'Brussels PE: 10'],
                  ['Hungary',  0, 'Budapest PE: 0'],
                  ['Denmark',  20, 'Copenhagen PE: 20'],
                  ['Belgium',  0, 'Brussels PE: 0'],
                  ['Portugal',  30, 'Lisbon PE: 30'],
                  ['United Kingdom',  112, 'London PE: 112'],
                  ['Italy',  33, 'Milan PCG: 3\nRome: 30\r'],
                  ['Russia',  119, 'Moscow PE: 119'],
                  ['Norway',  54, 'Oslo PE: 54'],
                  ['France',  103, 'Paris PE: 103'],
                  ['Sweden',  252, 'Stockholm PE: 252'],
                  ['Netherlands',  371, 'Hague PE: 371'],
                  ['Vatican',  25, 'Vatican PE: 25'],
                  ['Austria',  217, 'Vienna PE/PM: 217'],
                  ['Poland',  217, 'Warsaw PE: 217'],
                  ['Czech Republic',  10, 'Prague PE: 10'],
                  ['Germany',  216, 'Berlin PE: 216\nFrankfurt PCG: 0\r'],

                  // Americas and Canadas
                  ['Guam',  10, 'Agana PCG: 10'],
                  ['Argentina',  91, 'Buenos Aires PE: 91'],
                  ['Canada',  50, 'Calgary PCG: 10\nOttawa PE: 10\nToronto PCG: 30\nVancouver PCG: 0\r'],
                  ['Mexico',  19, 'Mexico PE: 19'],
                  ['Chile',  123, 'Santiago PE: 123'],
                  ['US',  157, 'Chicago PCG: 10\nHonolulu PCG: 9\nHouston PCG: 9\nLos Angeles: 10\nNew York PCG: 2\nNew York PM: 80\nSan Francisco PCG: 37\nWashington DC PE: 0\r'],
                  ['Brazil',  0, 'Brasilia PE: 0'],

                  // Middle East and Africa
                  ['United Arab Emirates',  111, 'Abu Dhabi PE: 7\nDubai PCG: 104\r'],
                  ['Jordan',  59, 'Amman PE: 59'],
                  ['Iraq',  90, 'Baghdad PE: 90'],
                  ['Lebanon',  20, 'Beirut PE: 20'],
                  ['Egypt',  30, 'Cairo PE: 30'],
                  ['Syria',  10, 'Damascus PE: 10'],
                  ['Qatar',  22, 'Doha PE: 22'],
                  ['Pakistan',  82, 'Islamabad PE: 82'],
                  ['Saudi Arabia',  0, 'Jeddah PCG: 0\nRiyadh: 0\r'],
                  ['Kuwait',  0, 'Kuwait PE: 0'],
                  ['Bahrain',  8, 'Manama PE: 8'],
                  ['Oman',  10, 'Nairobi PE: 10'],
                  ['South Africa',  0, 'Pretoria PE: 0'],
                  ['Morocco',  40, 'Rabat PE: 40'],
                  ['Iran',  10, 'Tehran PE: 10'],
                  ['Israel',  50, 'Tel Aviv PE: 50'],
                  ['Libya',  20, 'Tripoli PE: 20'],
                  ['Nigeria',  20, 'Abuja PE: 20'],

                  // Asia and Pacific
                  ['Thailand',  20, 'Bangkok PE: 20'],
                  ['China',  94, 'Beijing PE: 63\nChongqing PCG: 0\nGuangzhou PCG: 0\nShanghai PCG: 31\nXiamen PCG: 0\r'],
                  ['Brunei',  10, 'Brunei PE: 10'],
                  ['Australia',  12, 'Canberra PE: 0\nMelbourne: PCG: 12\nSydney PCG: 26\r'],
                  ['Bangladesh',  0, 'Dhaka PE: 0'],
                  ['East Timor',  10, 'Dili PE: 10'],
                  ['Vietnam',  22, 'Hanoi PE: 22'],
                  ['Hong Kong',  60, 'Hong Kong PE: 60'],
                  ['Indonesia',  66, 'Jakarta PE: 66\Jakarta PM: 0\nManado PCG: 0\r'],
                  ['Malaysia',  36, 'Kuala Lumpur PE: 36'],
                  ['Macao',  90, 'Macau SAR PCG: 90'],
                  ['Japan',  64, 'Nagoya PCG: 7\nOsaka PCG: 15\nTokyo PE: 42\r'],
                  ['India',  15, 'New Delhi PE: 15'],
                  ['Cambodia',  26, 'Phnom Penh PE: 26'],
                  ['Papua New Guinea',  90, 'Port Moresby PE: 90'],
                  ['South Korea',  100, 'Seoul PE: 100'],
                  ['Singapore',  50, 'Singapore PE: 50'],
                  ['Laos',  50, 'Vientiane PE: 50'],
                  ['New Zealand',  95, 'Wellington PE: 95'],
                  ['Myanmar',  50, 'Yangon PE: 50'],
                  ['Philippines',  145, 'Manila PE: 55\nDavao PE: 90\r']

                ]);

                var options = {
                      colorAxis: {colors: ['#e7711c', '#4374e0','#00853f']} // orange to blue
                };

                var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
                chart.draw(data, options);
            break;

            case '23':
                var data = google.visualization.arrayToDataTable([

                  // Europe
                  ['Country',   'Recurring Project', {label: 'FSA', role: 'tooltip'}],
                  ['Greece',  110, 'Barcelona PCG: 110'],
                  ['Spain', 125, 'Athens PE: 117\nMadrid PE: 8'],
                  ['Turkey',  120, 'Ankara PE: 118\nIstanbul PCG: 2\r'],
                  ['Switzerland',  120, 'Berne PE: 0\nGeneva PM: 120\r'],
                  ['Belgium',  10, 'Brussels PE: 10'],
                  ['Hungary',  10, 'Budapest PE: 10'],
                  ['Denmark',  20, 'Copenhagen PE: 20'],
                  ['Belgium',  10, 'Brussels PE: 10'],
                  ['Portugal',  30, 'Lisbon PE: 30'],
                  ['United Kingdom',  112, 'London PE: 112'],
                  ['Italy',  133, 'Milan PCG: 3\nRome: 130\r'],
                  ['Russia',  225, 'Moscow PE: 225'],
                  ['Norway',  54, 'Oslo PE: 54'],
                  ['France',  103, 'Paris PE: 103'],
                  ['Sweden',  252, 'Stockholm PE: 252'],
                  ['Netherlands',  371, 'Hague PE: 371'],
                  ['Vatican',  25, 'Vatican PE: 25'],
                  ['Austria',  217, 'Vienna PE/PM: 217'],
                  ['Poland',  217, 'Warsaw PE: 217'],
                  ['Czech Republic',  10, 'Prague PE: 10'],
                  ['Germany',  216, 'Berlin PE: 216\nFrankfurt PCG: 0\r'],

                  // Americas and Canadas
                  ['Guam',  10, 'Agana PCG: 10'],
                  ['Argentina',  91, 'Buenos Aires PE: 91'],
                  ['Canada',  510, 'Calgary PCG: 10\nOttawa PE: 10\nToronto PCG: 310\nVancouver PCG: 0\r'],
                  ['Mexico',  19, 'Mexico PE: 19'],
                  ['Chile',  123, 'Santiago PE: 123'],
                  ['US',  167, 'Chicago PCG: 10\nHonolulu PCG: 19\nHouston PCG: 9\nLos Angeles: 10\nNew York PCG: 2\nNew York PM: 80\nSan Francisco PCG: 37\nWashington DC PE: 0\r'],
                  ['Brazil',  0, 'Brasilia PE: 0'],

                  // Middle East and Africa
                  ['United Arab Emirates',  111, 'Abu Dhabi PE: 7\nDubai PCG: 104\r'],
                  ['Jordan',  59, 'Amman PE: 59'],
                  ['Iraq',  90, 'Baghdad PE: 90'],
                  ['Lebanon',  20, 'Beirut PE: 20'],
                  ['Egypt',  30, 'Cairo PE: 30'],
                  ['Syria',  10, 'Damascus PE: 10'],
                  ['Qatar',  212, 'Doha PE: 212'],
                  ['Pakistan',  82, 'Islamabad PE: 82'],
                  ['Saudi Arabia',  0, 'Jeddah PCG: 0\nRiyadh: 0\r'],
                  ['Kuwait',  0, 'Kuwait PE: 0'],
                  ['Bahrain',  8, 'Manama PE: 8'],
                  ['Oman',  110, 'Nairobi PE: 110'],
                  ['South Africa',  0, 'Pretoria PE: 0'],
                  ['Morocco',  410, 'Rabat PE: 410'],
                  ['Iran',  110, 'Tehran PE: 110'],
                  ['Israel',  50, 'Tel Aviv PE: 50'],
                  ['Libya',  120, 'Tripoli PE: 20'],
                  ['Nigeria',  120, 'Abuja PE: 20'],

                  // Asia and Pacific
                  ['Thailand',  120, 'Bangkok PE: 120'],
                  ['China',  394, 'Beijing PE: 163\nChongqing PCG: 200\nGuangzhou PCG: 0\nShanghai PCG: 31\nXiamen PCG: 0\r'],
                  ['Brunei',  110, 'Brunei PE: 110'],
                  ['Australia',  112, 'Canberra PE: 0\nMelbourne: PCG: 112\nSydney PCG: 26\r'],
                  ['Bangladesh',  0, 'Dhaka PE: 0'],
                  ['East Timor',  10, 'Dili PE: 10'],
                  ['Vietnam',  122, 'Hanoi PE: 122'],
                  ['Hong Kong',  160, 'Hong Kong PE: 160'],
                  ['Indonesia',  66, 'Jakarta PE: 66\Jakarta PM: 0\nManado PCG: 0\r'],
                  ['Malaysia',  136, 'Kuala Lumpur PE: 136'],
                  ['Macao',  190, 'Macau SAR PCG: 190'],
                  ['Japan',  164, 'Nagoya PCG: 7\nOsaka PCG: 115\nTokyo PE: 42\r'],
                  ['India',  115, 'New Delhi PE: 115'],
                  ['Cambodia',  126, 'Phnom Penh PE: 126'],
                  ['Papua New Guinea',  90, 'Port Moresby PE: 90'],
                  ['South Korea',  10, 'Seoul PE: 10'],
                  ['Singapore',  0, 'Singapore PE: 0'],
                  ['Laos',  150, 'Vientiane PE: 150'],
                  ['New Zealand',  95, 'Wellington PE: 95'],
                  ['Myanmar',  150, 'Yangon PE: 150'],
                  ['Philippines',  245, 'Manila PE: 55\nDavao PE: 190\r']

                ]);

                var options = {
                      colorAxis: {colors: ['#e7711c', '#4374e0','#00853f']} // orange to blue
                };

                var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
                chart.draw(data, options);
            break;

            default:

                var data = google.visualization.arrayToDataTable([

                  // Europe
                  ['Country',   'Recurring Project', {label: 'FSA', role: 'tooltip'}],
                  ['Greece',  10, 'Barcelona PCG: 10'],
                  ['Spain', 25, 'Athens PE: 17\nMadrid PE: 8'],
                  ['Turkey',  20, 'Ankara PE: 18\nIstanbul PCG: 2\r'],
                  ['Switzerland',  20, 'Berne PE: 0\nGeneva PM: 20\r'],
                  ['Belgium',  0, 'Brussels PE: 0'],
                  ['Hungary',  0, 'Budapest PE: 0'],
                  ['Denmark',  0, 'Copenhagen PE: 0'],
                  ['Belgium',  0, 'Brussels PE: 0'],
                  ['Portugal',  0, 'Lisbon PE: 0'],
                  ['United Kingdom',  12, 'London PE: 12'],
                  ['Italy',  3, 'Milan PCG: 3\nRome: 0\r'],
                  ['Russia',  19, 'Moscow PE: 19'],
                  ['Norway',  5, 'Oslo PE: 5'],
                  ['France',  10, 'Paris PE: 10'],
                  ['Sweden',  25, 'Stockholm PE: 25'],
                  ['Netherlands',  37, 'Hague PE: 37'],
                  ['Vatican',  5, 'Vatican PE: 5'],
                  ['Austria',  17, 'Vienna PE/PM: 17'],
                  ['Poland',  17, 'Warsaw PE: 17'],
                  ['Czech Republic',  0, 'Prague PE: 0'],
                  ['Germany',  16, 'Berlin PE: 16\nFrankfurt PCG: 0\r'],

                  // Americas and Canadas
                  ['Guam',  0, 'Agana PCG: 0'],
                  ['Argentina',  9, 'Buenos Aires PE: 9'],
                  ['Canada',  0, 'Calgary PCG: 0\nOttawa PE: 0\nToronto PCG: 0\nVancouver PCG: 0\r'],
                  ['Mexico',  9, 'Mexico PE: 9'],
                  ['Chile',  12, 'Santiago PE: 12'],
                  ['US',  57, 'Chicago PCG: 0\nHonolulu PCG: 9\nHouston PCG: 9\nLos Angeles: 0\nNew York PCG: 2\nNew York PM: 0\nSan Francisco PCG: 37\nWashington DC PE: 0\r'],
                  ['Brazil',  0, 'Brasilia PE: 0'],

                  // Middle East and Africa
                  ['United Arab Emirates',  11, 'Abu Dhabi PE: 7\nDubai PCG: 4\r'],
                  ['Jordan',  5, 'Amman PE: 5'],
                  ['Iraq',  0, 'Baghdad PE: 0'],
                  ['Lebanon',  0, 'Beirut PE: 0'],
                  ['Egypt',  0, 'Cairo PE: 0'],
                  ['Syria',  10, 'Damascus PE: 10'],
                  ['Qatar',  2, 'Doha PE: 2'],
                  ['Pakistan',  8, 'Islamabad PE: 8'],
                  ['Saudi Arabia',  0, 'Jeddah PCG: 0\nRiyadh: 0\r'],
                  ['Kuwait',  0, 'Kuwait PE: 0'],
                  ['Bahrain',  8, 'Manama PE: 8'],
                  ['Oman',  0, 'Nairobi PE: 0'],
                  ['South Africa',  0, 'Pretoria PE: 0'],
                  ['Morocco',  0, 'Rabat PE: 0'],
                  ['Iran',  10, 'Tehran PE: 10'],
                  ['Israel',  0, 'Tel Aviv PE: 0'],
                  ['Libya',  0, 'Tripoli PE: 0'],
                  ['Nigeria',  0, 'Abuja PE: 0'],

                  // Asia and Pacific
                  ['Thailand',  0, 'Bangkok PE: 0'],
                  ['China',  94, 'Beijing PE: 63\nChongqing PCG: 0\nGuangzhou PCG: 0\nShanghai PCG: 31\nXiamen PCG: 0\r'],
                  ['Brunei',  0, 'Brunei PE: 0'],
                  ['Australia',  2, 'Canberra PE: 0\nMelbourne: PCG: 2\nSydney PCG: 26\r'],
                  ['Bangladesh',  0, 'Dhaka PE: 0'],
                  ['East Timor',  0, 'Dili PE: 0'],
                  ['Vietnam',  22, 'Hanoi PE: 22'],
                  ['Hong Kong',  0, 'Hong Kong PE: 0'],
                  ['Indonesia',  6, 'Jakarta PE: 6\Jakarta PM: 0\nManado PCG: 0\r'],
                  ['Malaysia',  3, 'Kuala Lumpur PE: 3'],
                  ['Macao',  0, 'Macau SAR PCG: 0'],
                  ['Japan',  64, 'Nagoya PCG: 7\nOsaka PCG: 15\nTokyo PE: 42\r'],
                  ['India',  15, 'New Delhi PE: 15'],
                  ['Cambodia',  26, 'Phnom Penh PE: 26'],
                  ['Papua New Guinea',  0, 'Port Moresby PE: 0'],
                  ['South Korea',  0, 'Seoul PE: 0'],
                  ['Singapore',  0, 'Singapore PE: 0'],
                  ['Laos',  0, 'Vientiane PE: 0'],
                  ['New Zealand',  9, 'Wellington PE: 9'],
                  ['Myanmar',  0, 'Yangon PE: 0'],
                  ['Philippines',  145, 'Manila PE: 55\nDavao PE: 90\r']

                ]);

                var options = {
                      colorAxis: {colors: ['#e7711c', '#4374e0','#00853f']} // orange to blue
                };

                var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
                chart.draw(data, options);
        }

        
    }

    function drawRegionsMapProjectFlg() {
        
        var data = google.visualization.arrayToDataTable([

          // Europe
          ['Country',   'Recurring Project', {label: 'FSA', role: 'tooltip'}],
          ['Greece',  20, 'Barcelona PCG: 20'],
          ['Spain', 35, 'Athens PE: 27\nMadrid PE: 8'],
          ['Turkey',  30, 'Ankara PE: 28\nIstanbul PCG: 2\r'],
          ['Switzerland',  30, 'Berne PE: 10\nGeneva PM: 20\r'],
          ['Belgium',  10, 'Brussels PE: 10'],
          ['Hungary',  111, 'Budapest PE: 111'],
          ['Denmark',  150, 'Copenhagen PE: 150'],
          ['Belgium',  40, 'Brussels PE: 40'],
          ['Portugal',  50, 'Lisbon PE: 50'],
          ['United Kingdom',  12, 'London PE: 12'],
          ['Italy',  13, 'Milan PCG: 13\nRome: 0\r'],
          ['Russia',  29, 'Moscow PE: 29'],
          ['Norway',  51, 'Oslo PE: 51'],
          ['France',  88, 'Paris PE: 88'],
          ['Sweden',  25, 'Stockholm PE: 25'],
          ['Netherlands',  37, 'Hague PE: 37'],
          ['Vatican',  15, 'Vatican PE: 15'],
          ['Austria',  37, 'Vienna PE/PM: 37'],
          ['Poland',  17, 'Warsaw PE: 17'],
          ['Czech Republic',  0, 'Prague PE: 0'],
          ['Germany',  164, 'Berlin PE: 164\nFrankfurt PCG: 0\r'],

          // Americas and Canadas
          ['Guam',  70, 'Agana PCG: 70'],
          ['Argentina',  91, 'Buenos Aires PE: 91'],
          ['Canada',  20, 'Calgary PCG: 0\nOttawa PE: 20\nToronto PCG: 0\nVancouver PCG: 0\r'],
          ['Mexico',  9, 'Mexico PE: 9'],
          ['Chile',  12, 'Santiago PE: 12'],
          ['US',  57, 'Chicago PCG: 0\nHonolulu PCG: 9\nHouston PCG: 9\nLos Angeles: 0\nNew York PCG: 2\nNew York PM: 0\nSan Francisco PCG: 37\nWashington DC PE: 0\r'],
          ['Brazil',  10, 'Brasilia PE: 10'],

          // Middle East and Africa
          ['United Arab Emirates',  11, 'Abu Dhabi PE: 7\nDubai PCG: 4\r'],
          ['Jordan',  51, 'Amman PE: 51'],
          ['Iraq',  0, 'Baghdad PE: 0'],
          ['Lebanon',  0, 'Beirut PE: 0'],
          ['Egypt',  0, 'Cairo PE: 0'],
          ['Syria',  10, 'Damascus PE: 10'],
          ['Qatar',  21, 'Doha PE: 21'],
          ['Pakistan',  82, 'Islamabad PE: 82'],
          ['Saudi Arabia',  0, 'Jeddah PCG: 0\nRiyadh: 0\r'],
          ['Kuwait',  10, 'Kuwait PE: 10'],
          ['Bahrain',  18, 'Manama PE: 18'],
          ['Oman',  0, 'Nairobi PE: 0'],
          ['South Africa',  0, 'Pretoria PE: 0'],
          ['Morocco',  30, 'Rabat PE: 30'],
          ['Iran',  10, 'Tehran PE: 10'],
          ['Israel',  0, 'Tel Aviv PE: 0'],
          ['Libya',  10, 'Tripoli PE: 10'],
          ['Nigeria',  40, 'Abuja PE: 40'],

          // Asia and Pacific
          ['Thailand',  60, 'Bangkok PE: 60'],
          ['China',  94, 'Beijing PE: 63\nChongqing PCG: 0\nGuangzhou PCG: 0\nShanghai PCG: 31\nXiamen PCG: 0\r'],
          ['Brunei',  0, 'Brunei PE: 0'],
          ['Australia',  2, 'Canberra PE: 0\nMelbourne: PCG: 2\nSydney PCG: 26\r'],
          ['Bangladesh',  0, 'Dhaka PE: 0'],
          ['East Timor',  20, 'Dili PE: 20'],
          ['Vietnam',  22, 'Hanoi PE: 22'],
          ['Hong Kong',  103, 'Hong Kong PE: 103'],
          ['Indonesia',  63, 'Jakarta PE: 63\Jakarta PM: 0\nManado PCG: 0\r'],
          ['Malaysia',  36, 'Kuala Lumpur PE: 36'],
          ['Macao',  0, 'Macau SAR PCG: 0'],
          ['Japan',  64, 'Nagoya PCG: 7\nOsaka PCG: 15\nTokyo PE: 42\r'],
          ['India',  152, 'New Delhi PE: 152'],
          ['Cambodia',  26, 'Phnom Penh PE: 26'],
          ['Papua New Guinea',  0, 'Port Moresby PE: 0'],
          ['South Korea',  10, 'Seoul PE: 10'],
          ['Singapore',  0, 'Singapore PE: 0'],
          ['Laos',  110, 'Vientiane PE: 110'],
          ['New Zealand',  95, 'Wellington PE: 95'],
          ['Myanmar',  90, 'Yangon PE: 90'],
          ['Philippines',  217, 'Manila PE: 217']

        ]);

        var options = {
              colorAxis: {colors: ['#fe9cff', '#ffe200','#00d3df']} // orange to blue
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
        chart.draw(data, options);

    }

    function drawRegionsMapProjectOT() {
        
        var data = google.visualization.arrayToDataTable([

          // Europe
          ['Country',   'Recurring Project', {label: 'FSA', role: 'tooltip'}],
          ['Greece',  20, 'Barcelona PCG: 20'],
          ['Spain', 35, 'Athens PE: 27\nMadrid PE: 8'],
          ['Turkey',  30, 'Ankara PE: 28\nIstanbul PCG: 2\r'],
          ['Switzerland',  30, 'Berne PE: 10\nGeneva PM: 20\r'],
          ['Belgium',  10, 'Brussels PE: 10'],
          ['Hungary',  111, 'Budapest PE: 111'],
          ['Denmark',  150, 'Copenhagen PE: 150'],
          ['Belgium',  40, 'Brussels PE: 40'],
          ['Portugal',  50, 'Lisbon PE: 50'],
          ['United Kingdom',  12, 'London PE: 12'],
          ['Italy',  13, 'Milan PCG: 13\nRome: 0\r'],
          ['Russia',  95, 'Moscow PE: 95'],
          ['Norway',  51, 'Oslo PE: 51'],
          ['France',  88, 'Paris PE: 88'],
          ['Sweden',  25, 'Stockholm PE: 25'],
          ['Netherlands',  37, 'Hague PE: 37'],
          ['Vatican',  15, 'Vatican PE: 15'],
          ['Austria',  37, 'Vienna PE/PM: 37'],
          ['Poland',  117, 'Warsaw PE: 117'],
          ['Czech Republic',  0, 'Prague PE: 0'],
          ['Germany',  164, 'Berlin PE: 164\nFrankfurt PCG: 0\r'],

          // Americas and Canadas
          ['Guam',  170, 'Agana PCG: 170'],
          ['Argentina',  91, 'Buenos Aires PE: 91'],
          ['Canada',  67, 'Calgary PCG: 0\nOttawa PE: 62\nToronto PCG: 5\nVancouver PCG: 0\r'],
          ['Mexico',  9, 'Mexico PE: 9'],
          ['Chile',  12, 'Santiago PE: 12'],
          ['US',  257, 'Chicago PCG: 0\nHonolulu PCG: 9\nHouston PCG: 9\nLos Angeles: 200\nNew York PCG: 2\nNew York PM: 0\nSan Francisco PCG: 37\nWashington DC PE: 0\r'],
          ['Brazil',  10, 'Brasilia PE: 10'],

          // Middle East and Africa
          ['United Arab Emirates',  11, 'Abu Dhabi PE: 7\nDubai PCG: 4\r'],
          ['Jordan',  151, 'Amman PE: 151'],
          ['Iraq',  10, 'Baghdad PE: 10'],
          ['Lebanon',  10, 'Beirut PE: 10'],
          ['Egypt',  0, 'Cairo PE: 0'],
          ['Syria',  10, 'Damascus PE: 10'],
          ['Qatar',  21, 'Doha PE: 21'],
          ['Pakistan',  82, 'Islamabad PE: 82'],
          ['Saudi Arabia',  0, 'Jeddah PCG: 0\nRiyadh: 0\r'],
          ['Kuwait',  10, 'Kuwait PE: 10'],
          ['Bahrain',  18, 'Manama PE: 18'],
          ['Oman',  0, 'Nairobi PE: 0'],
          ['South Africa',  0, 'Pretoria PE: 0'],
          ['Morocco',  30, 'Rabat PE: 30'],
          ['Iran',  10, 'Tehran PE: 10'],
          ['Israel',  0, 'Tel Aviv PE: 0'],
          ['Libya',  10, 'Tripoli PE: 10'],
          ['Nigeria',  40, 'Abuja PE: 40'],

          // Asia and Pacific
          ['Thailand',  60, 'Bangkok PE: 60'],
          ['China',  94, 'Beijing PE: 63\nChongqing PCG: 0\nGuangzhou PCG: 0\nShanghai PCG: 31\nXiamen PCG: 0\r'],
          ['Brunei',  0, 'Brunei PE: 0'],
          ['Australia',  2, 'Canberra PE: 0\nMelbourne: PCG: 2\nSydney PCG: 26\r'],
          ['Bangladesh',  0, 'Dhaka PE: 0'],
          ['East Timor',  20, 'Dili PE: 20'],
          ['Vietnam',  22, 'Hanoi PE: 22'],
          ['Hong Kong',  103, 'Hong Kong PE: 103'],
          ['Indonesia',  63, 'Jakarta PE: 63\Jakarta PM: 0\nManado PCG: 0\r'],
          ['Malaysia',  36, 'Kuala Lumpur PE: 36'],
          ['Macao',  30, 'Macau SAR PCG: 30'],
          ['Japan',  64, 'Nagoya PCG: 7\nOsaka PCG: 15\nTokyo PE: 42\r'],
          ['India',  152, 'New Delhi PE: 152'],
          ['Cambodia',  26, 'Phnom Penh PE: 26'],
          ['Papua New Guinea',  0, 'Port Moresby PE: 0'],
          ['South Korea',  10, 'Seoul PE: 10'],
          ['Singapore',  0, 'Singapore PE: 0'],
          ['Laos',  110, 'Vientiane PE: 110'],
          ['New Zealand',  95, 'Wellington PE: 95'],
          ['Myanmar',  90, 'Yangon PE: 90'],
          ['Philippines',  135, 'Manila PE: 135']

        ]);

        var options = {
              colorAxis: {colors: ['brown', 'black','orange']} // orange to blue
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
        chart.draw(data, options);

    }

    google.charts.load('current', {
      'packages':['geochart','corechart','bar'],
      // 'mapsApiKey': 'AIzaSyDK2Grm03U3YrQScpSPB500wogvnlntydQ' //my API key
    });

    // google.charts.setOnLoadCallback(drawRegionsMap);
    google.charts.setOnLoadCallback(drawRegionsMapSubmissions);
    google.charts.setOnLoadCallback(drawDonutChart);
    google.charts.setOnLoadCallback(drawBarChartA);
    google.charts.setOnLoadCallback(drawBarChartB);
    google.charts.setOnLoadCallback(drawBarChartC);
    google.charts.setOnLoadCallback(drawBarChartD);

    function drawRegionsMap() {

        var data = google.visualization.arrayToDataTable([
          ['Continents', 'Overall Regional Cultural Activity Count'],

          // Americas and Canada
          ['United States', countAmericasAndCanada ],
          ['Brazil', countAmericasAndCanada ],
          ['Mexico', countAmericasAndCanada ],
          ['Colombia', countAmericasAndCanada ],
          ['Argentina', countAmericasAndCanada ],
          ['Canada', countAmericasAndCanada ],
          ['Peru', countAmericasAndCanada ],
          ['Venezuela', countAmericasAndCanada ],
          ['Chile', countAmericasAndCanada ],
          ['Guatemala', countAmericasAndCanada ],
          ['Ecuador', countAmericasAndCanada ],
          ['Bolivia', countAmericasAndCanada ],
          ['Haiti', countAmericasAndCanada ],
          ['Dominican Republic', countAmericasAndCanada ],
          ['Cuba', countAmericasAndCanada ],
          ['Honduras', countAmericasAndCanada ],
          ['Paraguay', countAmericasAndCanada ],
          ['Nicaragua', countAmericasAndCanada ],
          ['El Salvador', countAmericasAndCanada ],
          ['Costa Rica', countAmericasAndCanada ],
          ['Panama', countAmericasAndCanada ],
          ['Uruguay', countAmericasAndCanada ],
          ['Puerto Rico', countAmericasAndCanada ],
          ['Jamaica', countAmericasAndCanada ],
          ['Trinidad and Tobago', countAmericasAndCanada ],
          ['Guyana', countAmericasAndCanada ],
          ['Suriname', countAmericasAndCanada ],
          ['Belize', countAmericasAndCanada ],
          ['Bahamas', countAmericasAndCanada ],
          ['Guadeloupe ', countAmericasAndCanada ],
          ['Martinique', countAmericasAndCanada ],
          ['French Guiana', countAmericasAndCanada ],
          ['Barbados  ', countAmericasAndCanada ],
          ['Curacao', countAmericasAndCanada ],
          ['Saint Lucia', countAmericasAndCanada ],
          ['Grenada', countAmericasAndCanada ],
          ['Aruba', countAmericasAndCanada ],
          ['Saint Vincent and the Grenadines', countAmericasAndCanada ],
          ['Antigua and Barbuda', countAmericasAndCanada ],
          ['United States Virgin Islands', countAmericasAndCanada ],
          ['Cayman Islands', countAmericasAndCanada ],
          ['Dominica', countAmericasAndCanada ],
          ['Bermuda', countAmericasAndCanada ],
          ['Greenland', countAmericasAndCanada ],
          ['Saint Kitts and Nevis', countAmericasAndCanada ],
          ['Turks and Caicos Islands', countAmericasAndCanada ],
          ['Sint Maarten', countAmericasAndCanada ],
          ['British Virgin Islands  ', countAmericasAndCanada ],
          ['Saint Martin', countAmericasAndCanada ],
          ['Anguilla', countAmericasAndCanada ],
          ['Saint Barthelemy', countAmericasAndCanada ],
          ['Saint Pierre and Miquelon', countAmericasAndCanada ],
          ['Montserrat', countAmericasAndCanada ],
          ['Falkland Islands', countAmericasAndCanada ],
          ['Canada', countAmericasAndCanada ],
          ['Svalbard and Jan Mayen', countAmericasAndCanada ],

          // Middle East and Africa
          ['Albania', countEurope],
          ['Bahrain', countMiddleEastAndAfrica],
          ['Iran', countMiddleEastAndAfrica],
          ['Iraq', countMiddleEastAndAfrica],
          ['Israel and Occupied Palestinian Territories', countMiddleEastAndAfrica],
          ['Jordan', countMiddleEastAndAfrica],
          ['Kuwait', countMiddleEastAndAfrica],
          ['Lebanon', countMiddleEastAndAfrica],
          ['Oman', countMiddleEastAndAfrica],
          ['Qatar', countMiddleEastAndAfrica],
          ['Saudi Arabia', countMiddleEastAndAfrica],
          ['Syria', countMiddleEastAndAfrica],
          ['United Arab Emirates', countMiddleEastAndAfrica],
          ['Yemen', countMiddleEastAndAfrica],
          ['Algeria', countMiddleEastAndAfrica],
          ['Angola', countMiddleEastAndAfrica],
          ['Benin', countMiddleEastAndAfrica],
          ['Botswana', countMiddleEastAndAfrica],
          ['Burkina Faso', countMiddleEastAndAfrica],
          ['Burundi', countMiddleEastAndAfrica],
          ['Cabo Verde', countMiddleEastAndAfrica],
          ['Cameroon', countMiddleEastAndAfrica],
          ['Central African Republic (CAR)', countMiddleEastAndAfrica],
          ['Chad', countMiddleEastAndAfrica],
          ['Comoros', countMiddleEastAndAfrica],
          ['Congo, Democratic Republic of the', countMiddleEastAndAfrica],
          ['Congo, Republic of the', countMiddleEastAndAfrica],
          ['Cote d’Ivoire', countMiddleEastAndAfrica],
          ['Djibouti', countMiddleEastAndAfrica],
          ['Egypt', countMiddleEastAndAfrica],
          ['Equatorial Guinea', countMiddleEastAndAfrica],
          ['Eritrea', countMiddleEastAndAfrica],
          ['Eswatini', countMiddleEastAndAfrica],
          ['Ethiopia', countMiddleEastAndAfrica],
          ['Gabon', countMiddleEastAndAfrica],
          ['Gambia', countMiddleEastAndAfrica],
          ['Ghana', countMiddleEastAndAfrica],
          ['Guinea', countMiddleEastAndAfrica],
          ['Guinea-Bissau', countMiddleEastAndAfrica],
          ['Kenya', countMiddleEastAndAfrica],
          ['Lesotho', countMiddleEastAndAfrica],
          ['Liberia', countMiddleEastAndAfrica],
          ['Libya', countMiddleEastAndAfrica],
          ['Madagascar', countMiddleEastAndAfrica],
          ['Malawi', countMiddleEastAndAfrica],
          ['Mali', countMiddleEastAndAfrica],
          ['Mauritania', countMiddleEastAndAfrica],
          ['Mauritius', countMiddleEastAndAfrica],
          ['Morocco', countMiddleEastAndAfrica],
          ['Mozambique', countMiddleEastAndAfrica],
          ['Namibia', countMiddleEastAndAfrica],
          ['Niger', countMiddleEastAndAfrica],
          ['Nigeria', countMiddleEastAndAfrica],
          ['Rwanda', countMiddleEastAndAfrica],
          ['Sao Tome and Principe', countMiddleEastAndAfrica],
          ['Senegal', countMiddleEastAndAfrica],
          ['Seychelles', countMiddleEastAndAfrica],
          ['Sierra Leone', countMiddleEastAndAfrica],
          ['Somalia', countMiddleEastAndAfrica],
          ['South Africa', countMiddleEastAndAfrica],
          ['South Sudan', countMiddleEastAndAfrica],
          ['Sudan', countMiddleEastAndAfrica],
          ['Tanzania', countMiddleEastAndAfrica],
          ['Togo', countMiddleEastAndAfrica],
          ['Tunisia', countMiddleEastAndAfrica],
          ['Uganda', countMiddleEastAndAfrica],
          ['Zambia', countMiddleEastAndAfrica],
          ['Zimbabwe', countMiddleEastAndAfrica],
          ["Côte d'Ivoire", countMiddleEastAndAfrica],
          ['South Sudan', countMiddleEastAndAfrica],
          [{v: 'CI', f: 'Ivory Island'}, countMiddleEastAndAfrica],
          [{v: 'CD', f: 'Democratic Republic of Congo'}, countMiddleEastAndAfrica],
          [{v: 'SS', f: 'South Sudan'}, countMiddleEastAndAfrica],
          [{v: 'CF', f: 'Central African Republic'}, countMiddleEastAndAfrica],
          [{v: 'CG', f: 'Republic of the Congo'}, countMiddleEastAndAfrica],

          // Europe
          ['Albania', countEurope],
          ['Latvia', countEurope],
          ['Andorra', countEurope],
          ['Liechtenstein', countEurope],
          ['Armenia', countEurope],
          ['Lithuania', countEurope],
          ['Austria', countEurope],
          ['Luxembourg', countEurope],
          ['Azerbaijan', countEurope],
          ['Malta', countEurope],
          ['Belarus', countEurope],
          ['Moldova', countEurope],
          ['Belgium', countEurope],
          ['Monaco', countEurope],
          ['Bosnia and Herzegovina', countEurope],
          ['Montenegro', countEurope],
          ['Bulgaria', countEurope],
          ['Netherlands', countEurope],
          ['Croatia', countEurope],
          ['Norway', countEurope],
          ['Cyprus', countEurope],
          ['Poland', countEurope],
          ['Czech Republic', countEurope],
          ['Portugal', countEurope],
          ['Denmark', countEurope],
          ['Romania', countEurope],
          ['Estonia', countEurope],
          ['Russia', countEurope],
          ['Finland San', countEurope],
          ['Marino', countEurope],
          ['Republic of Macedonia', countEurope],
          ['Serbia', countEurope],
          ['France', countEurope],
          ['Slovakia', countEurope],
          ['Georgia', countEurope],
          ['Slovenia', countEurope],
          ['Germany', countEurope],
          ['Spain', countEurope],
          ['Greece', countEurope],
          ['Hungary', countEurope],
          ['Sweden', countEurope],
          ['Iceland', countEurope],
          ['Switzerland', countEurope],
          ['Ireland', countEurope],
          ['Turkey', countEurope],
          ['Italy', countEurope],
          ['Ukraine', countEurope],
          ['Kosovo', countEurope],
          ['United Kingdom', countEurope],
          ['Finland', countEurope],

          // Asia and Pacific
          ['Afghanistan', countAsiaAndPacific],
          ['Armenia', countAsiaAndPacific],
          ['Azerbaijan', countAsiaAndPacific],
          ['Bahrain', countAsiaAndPacific],
          ['Bangladesh', countAsiaAndPacific],
          ['Bhutan', countAsiaAndPacific],
          ['Brunei', countAsiaAndPacific],
          ['Cambodia', countAsiaAndPacific],
          ['China', countAsiaAndPacific],
          ['Cyprus', countAsiaAndPacific],
          ['Georgia', countAsiaAndPacific],
          ['India', countAsiaAndPacific],
          ['Indonesia', countAsiaAndPacific],
          ['Iran', countAsiaAndPacific],
          ['Iraq', countAsiaAndPacific],
          ['Israel', countAsiaAndPacific],
          ['Japan', countAsiaAndPacific],
          ['Jordan', countAsiaAndPacific],
          ['Kazakhstan', countAsiaAndPacific],
          ['Kuwait', countAsiaAndPacific],
          ['Kyrgyzstan', countAsiaAndPacific],
          ['Laos', countAsiaAndPacific],
          ['Lebanon', countAsiaAndPacific],
          ['Malaysia', countAsiaAndPacific],
          ['Maldives', countAsiaAndPacific],
          ['Mongolia', countAsiaAndPacific],
          ['Myanmar', countAsiaAndPacific],
          ['Nepal', countAsiaAndPacific],
          ['North Korea', countAsiaAndPacific],
          ['Oman', countAsiaAndPacific],
          ['Pakistan', countAsiaAndPacific],
          ['Palestine', countAsiaAndPacific],
          ['Philippines', countAsiaAndPacific],
          ['Qatar', countAsiaAndPacific],
          ['Russia', countAsiaAndPacific],
          ['Saudi Arabia', countAsiaAndPacific],
          ['Singapore', countAsiaAndPacific],
          ['South Korea', countAsiaAndPacific],
          ['Sri Lanka', countAsiaAndPacific],
          ['Syria', countAsiaAndPacific],
          ['Taiwan', countAsiaAndPacific],
          ['Tajikistan', countAsiaAndPacific],
          ['Thailand', countAsiaAndPacific],
          ['Timor-Leste', countAsiaAndPacific],
          ['Turkey', countAsiaAndPacific],
          ['Turkmenistan', countAsiaAndPacific],
          ['United Arab Emirates (UAE)', countAsiaAndPacific],
          ['Uzbekistan', countAsiaAndPacific],
          ['Vietnam', countAsiaAndPacific],
          ['Yemen', countAsiaAndPacific],
          ['Hawaii', countAsiaAndPacific],
          ['Fiji', countAsiaAndPacific],
          ['Vanuatu', countAsiaAndPacific],
          ['Tuvalu', countAsiaAndPacific],
          ['Papua New Guinea', countAsiaAndPacific],
          ['Solomon Islands', countAsiaAndPacific]
        ]);

        var options = {
            colorAxis: {colors: ['#badfdf', 'gray', '#00853f']},
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
    }

    function drawDonutChart() {
        var data = google.visualization.arrayToDataTable([
          ['Region', 'Cultural Activity'],
          ['Americas and Canada',     150],
          ['Middle East and Africa',      12],
          ['Europe',  111],
          ['Asia and Pacific', 68]
        ]);

        var options = {
          title: 'Cultural Acivities 2024',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }

    function drawBarChartA(year) {

        var data = google.visualization.arrayToDataTable([
          ['Data per Quarters', 'Americas & Canada', 'Europe', 'M.E. & Africa', 'Asia & Pacific'],
          ['1st Quarter', barchart1AC, barchart1Eu, barchart1MA, barchart1AP],
          ['2nd Quarter', barchart2AC, barchart2Eu, barchart2MA, barchart2AP],
          ['3rd Quarter', barchart3AC, barchart3Eu, barchart3MA, barchart3AP],
          ['4th Quarter', barchart4AC, barchart4Eu, barchart4MA, barchart4AP]
        ]);

        var options = {
            width: 550,
            height: 400,
            legend: { position: 'top', maxLines: 4 },
            bar: { groupWidth: '75%' },
            isStacked: true,
            chart: {
            title: 'Accomplishment Reports Submitted',
                subtitle: 'Based on most recent and previous reports data'
            },
            series: {
                0:{color:'green'},
                1:{color:'yellow'},
                2:{color:'blue'},
                3:{color:'orange'},
            }
        };

        var barchart = new google.charts.Bar(document.getElementById('barchartA'));
        // materialChart.draw(data, options);
        barchart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function drawBarChartB(year) {

        if (year == '22') {
            barchartAmBLow = 14;
            barchartAmBHigh = 30;
            barchartEuBLow = 25;
            barchartEuBHigh = 32;
            barchartMeBLow = 20;
            barchartMeBHigh = 35;
            barchartAsBLow = 17;
            barchartAsBHigh = 27;
        }

        if (year == '23') {
            barchartAmBLow = 24;
            barchartAmBHigh = 50;
            barchartEuBLow = 35;
            barchartEuBHigh = 42;
            barchartMeBLow = 10;
            barchartMeBHigh = 35;
            barchartAsBLow = 27;
            barchartAsBHigh = 29;
        }

        var data = google.visualization.arrayToDataTable([
          ['Regions', 'Submitted', 'Not Submitted'],
          ['Americas & Canada', barchartAmBLow, barchartAmBHigh],
          ['Europe', barchartEuBLow, barchartEuBHigh],
          ['M.E. & Africa', barchartMeBLow, barchartMeBHigh],
          ['Asia & Pacific', barchartAsBLow, barchartAsBHigh]
        ]);

        var options = {
            width: 550,
            height: 400,
            legend: { position: 'top', maxLines: 2 },
            bar: { groupWidth: '75%' },
            isStacked: true,
            chart: {
            title: 'Report Submitted on the 2nd Quarter',
                subtitle: 'Based on most recent and previous reports data'
            },
            series: {
                0:{color:'Orange'},
            }
        };

        var barchart = new google.charts.Bar(document.getElementById('barchartB'));
        // materialChart.draw(data, options);
        barchart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function drawBarChartC(year) {

        if (year == '22') {
            barchartAmCLow = 24;
            barchartAmCHigh = 40;
            barchartEuCLow = 35;
            barchartEuCHigh = 42;
            barchartMeCLow = 30;
            barchartMeCHigh = 45;
            barchartAsCLow = 27;
            barchartAsCHigh = 37;
        }

        if (year == '23') {
            barchartAmCLow = 34;
            barchartAmCHigh = 60;
            barchartEuCLow = 45;
            barchartEuCHigh = 52;
            barchartMeCLow = 20;
            barchartMeCHigh = 45;
            barchartAsCLow = 37;
            barchartAsCHigh = 39;
        }

        var data = google.visualization.arrayToDataTable([
          ['Regions', 'Submitted', 'Not Submitted'],
          ['Americas & Canada', barchartAmCLow, barchartAmCHigh],
          ['Europe', barchartEuCLow, barchartEuCHigh],
          ['M.E. & Africa', barchartMeCLow, barchartMeCHigh],
          ['Asia & Pacific', barchartAsCLow, barchartAsCHigh]
        ]);

        var options = {
            width: 550,
            height: 400,
            legend: { position: 'top', maxLines: 2 },
            bar: { groupWidth: '75%' },
            isStacked: true,
            chart: {
            title: 'Report Submitted on the 3rd Quarter',
                subtitle: 'Based on most recent and previous reports data'
            },
            series: {
                0:{color:'Blue'},
            }
        };

        var barchart = new google.charts.Bar(document.getElementById('barchartC'));
        // materialChart.draw(data, options);
        barchart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function drawBarChartD(year) {

        if (year == '22') {
            barchartAmDLow = 24;
            barchartAmDHigh = 40;
            barchartEuDLow = 35;
            barchartEuDHigh = 42;
            barchartMeDLow = 30;
            barchartMeDHigh = 45;
            barchartAsDLow = 27;
            barchartAsDHigh = 37;
        }

        if (year == '23') {
            barchartAmDLow = 34;
            barchartAmDHigh = 60;
            barchartEuDLow = 45;
            barchartEuDHigh = 52;
            barchartMeDLow = 20;
            barchartMeDHigh = 45;
            barchartAsDLow = 37;
            barchartAsDHigh = 39;
        }

        var data = google.visualization.arrayToDataTable([
          ['Regions', 'Submitted', 'Not Submitted'],
          ['Americas & Canada', barchartAmDLow, barchartAmDHigh],
          ['Europe', barchartEuDLow, barchartEuDHigh],
          ['M.E. & Africa', barchartMeDLow, barchartMeDHigh],
          ['Asia & Pacific', barchartAsDLow, barchartAsDHigh]
        ]);

        var options = {
            width: 550,
            height: 400,
            legend: { position: 'top', maxLines: 2 },
            bar: { groupWidth: '75%' },
            isStacked: true,
            chart: {
            title: 'Report Submitted on the 4th Quarter',
                subtitle: 'Based on most recent and previous reports data'
            },
            series: {
                0:{color:'Purple'},
            }
        };

        var barchart = new google.charts.Bar(document.getElementById('barchartD'));
        // materialChart.draw(data, options);
        barchart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function drawRegionsMapSubmissions() {

        let year = document.getElementById('year').value;

        switch (year) {

        case '22':
            var data = google.visualization.arrayToDataTable([
              ['Continents', '(Yes is 1, No is 0) Submitted an Accomplishment Report'],

              // Americas and Canada
              ['United States', submmitted],
              ['Brazil', notsubmmitted],
              ['Mexico', submmitted],
              ['Colombia', submmitted],
              ['Argentina', submmitted],
              ['Canada', notsubmmitted],
              ['Peru', submmitted],
              ['Venezuela', submmitted],
              ['Chile', submmitted],
              ['Guatemala', submmitted],
              ['Ecuador', submmitted],
              ['Bolivia', submmitted],
              ['Haiti', submmitted],
              ['Dominican Republic', submmitted],
              ['Cuba', submmitted],
              ['Honduras', submmitted],
              ['Paraguay', submmitted],
              ['Nicaragua', submmitted],
              ['El Salvador', submmitted],
              ['Costa Rica', submmitted],
              ['Panama', notsubmmitted],
              ['Uruguay', notsubmmitted],
              ['Puerto Rico', submmitted],
              ['Jamaica', submmitted],
              ['Trinidad and Tobago', submmitted],
              ['Guyana', submmitted],
              ['Suriname', submmitted],
              ['Belize', submmitted],
              ['Bahamas', submmitted],
              ['Guadeloupe ', submmitted],
              ['Martinique', submmitted],
              ['French Guiana', submmitted],
              ['Barbados  ', submmitted],
              ['Curacao', submmitted],
              ['Saint Lucia', submmitted],
              ['Grenada', submmitted],
              ['Aruba', submmitted],
              ['Saint Vincent and the Grenadines', submmitted],
              ['Antigua and Barbuda', submmitted],
              ['United States Virgin Islands', submmitted],
              ['Cayman Islands', submmitted],
              ['Dominica', notsubmmitted],
              ['Bermuda', notsubmmitted],
              ['Greenland', submmitted],
              ['Saint Kitts and Nevis', submmitted],
              ['Turks and Caicos Islands', submmitted],
              ['Sint Maarten', submmitted],
              ['British Virgin Islands  ', submmitted],
              ['Saint Martin', notsubmmitted],
              ['Anguilla', submmitted],
              ['Saint Barthelemy', submmitted],
              ['Saint Pierre and Miquelon', submmitted],
              ['Montserrat', submmitted],
              ['Falkland Islands', submmitted],
              ['Canada', submmitted],
              ['Svalbard and Jan Mayen', submmitted],

              // Middle East and Africa
              ['Albania', submmitted],
              ['Bahrain', submmitted],
              ['Iran', submmitted],
              ['Iraq', notsubmmitted],
              ['Israel and Occupied Palestinian Territories', notsubmmitted],
              ['Israel', notsubmmitted],
              ['Jordan', submmitted],
              ['Kuwait', notsubmmitted],
              ['Lebanon', notsubmmitted],
              ['Oman', notsubmmitted],
              ['Qatar', submmitted],
              ['Saudi Arabia', notsubmmitted],
              ['Syria', submmitted],
              ['United Arab Emirates', submmitted],
              ['Yemen', submmitted],
              ['Algeria', submmitted],
              ['Angola', submmitted],
              ['Benin', submmitted],
              ['Botswana', submmitted],
              ['Burkina Faso', submmitted],
              ['Burundi', submmitted],
              ['Cabo Verde', notsubmmitted],
              ['Cameroon', submmitted],
              ['Central African Republic (CAR)', submmitted],
              ['Chad', submmitted],
              ['Comoros', submmitted],
              ['Congo, Democratic Republic of the', submmitted],
              ['Congo, Republic of the', submmitted],
              ['Cote d’Ivoire', submmitted],
              ['Djibouti', notsubmmitted],
              ['Egypt', notsubmmitted],
              ['Equatorial Guinea', submmitted],
              ['Eritrea', submmitted],
              ['Eswatini', submmitted],
              ['Ethiopia', submmitted],
              ['Gabon', submmitted],
              ['Gambia', submmitted],
              ['Ghana', submmitted],
              ['Guinea', submmitted],
              ['Guinea-Bissau', submmitted],
              ['Kenya', notsubmmitted],
              ['Lesotho', submmitted],
              ['Liberia', submmitted],
              ['Libya', submmitted],
              ['Madagascar', submmitted],
              ['Malawi', submmitted],
              ['Mali', submmitted],
              ['Mauritania', submmitted],
              ['Mauritius', submmitted],
              ['Morocco', notsubmmitted],
              ['Mozambique', submmitted],
              ['Namibia', notsubmmitted],
              ['Niger', submmitted],
              ['Nigeria', notsubmmitted],
              ['Rwanda', submmitted],
              ['Sao Tome and Principe', submmitted],
              ['Senegal', submmitted],
              ['Seychelles', submmitted],
              ['Sierra Leone', submmitted],
              ['Somalia', notsubmmitted],
              ['South Africa', notsubmmitted],
              ['South Sudan', submmitted],
              ['Sudan', submmitted],
              ['Tanzania', submmitted],
              ['Togo', submmitted],
              ['Tunisia', submmitted],
              ['Uganda', submmitted],
              ['Zambia', submmitted],
              ['Zimbabwe', notsubmmitted],
              ["Côte d'Ivoire", submmitted],
              ['South Sudan', submmitted],
              [{v: 'CI', f: 'Ivory Island'}, submmitted],
              [{v: 'CD', f: 'Democratic Republic of Congo'}, submmitted],
              [{v: 'SS', f: 'South Sudan'}, submmitted],
              [{v: 'CF', f: 'Central African Republic'}, notsubmmitted],
              [{v: 'CG', f: 'Republic of the Congo'}, submmitted],

              // Europe
              ['Albania', submmitted],
              ['Latvia', submmitted],
              ['Andorra', notsubmmitted],
              ['Liechtenstein', submmitted],
              ['Armenia', submmitted],
              ['Lithuania', notsubmmitted],
              ['Austria', submmitted],
              ['Luxembourg', submmitted],
              ['Azerbaijan', submmitted],
              ['Malta', notsubmmitted],
              ['Belarus', submmitted],
              ['Moldova', submmitted],
              ['Belgium', notsubmmitted],
              ['Monaco', submmitted],
              ['Bosnia and Herzegovina', submmitted],
              ['Montenegro', submmitted],
              ['Bulgaria', submmitted],
              ['Netherlands', submmitted],
              ['Croatia', notsubmmitted],
              ['Norway', submmitted],
              ['Cyprus', submmitted],
              ['Poland', notsubmmitted],
              ['Czech Republic', notsubmmitted],
              ['Portugal', submmitted],
              ['Denmark', notsubmmitted],
              ['Romania', submmitted],
              ['Estonia', submmitted],
              ['Russia', submmitted],
              ['Finland San', submmitted],
              ['Marino', submmitted],
              ['Republic of Macedonia', submmitted],
              ['Serbia', notsubmmitted],
              ['France', notsubmmitted],
              ['Slovakia', submmitted],
              ['Georgia', submmitted],
              ['Slovenia', submmitted],
              ['Germany', notsubmmitted],
              ['Spain', submmitted],
              ['Greece', submmitted],
              ['Hungary', notsubmmitted],
              ['Sweden', submmitted],
              ['Iceland', submmitted],
              ['Switzerland', notsubmmitted],
              ['Ireland', submmitted],
              ['Turkey', submmitted],
              ['Italy', notsubmmitted],
              ['Ukraine', notsubmmitted],
              ['Kosovo', submmitted],
              ['United Kingdom', submmitted],
              ['Finland', submmitted],

              // Asia and Pacific
              ['Afghanistan', submmitted],
              ['Armenia', submmitted],
              ['Azerbaijan', submmitted],
              ['Bahrain', submmitted],
              ['Bangladesh', notsubmmitted],
              ['Bhutan', submmitted],
              ['Brunei', notsubmmitted],
              ['Cambodia', submmitted],
              ['China', notsubmmitted],
              ['Cyprus', submmitted],
              ['Georgia', submmitted],
              ['India', submmitted],
              ['Indonesia', notsubmmitted],
              ['Iran', submmitted],
              ['Iraq', notsubmmitted],
              ['Israel', submmitted],
              ['Japan', notsubmmitted],
              ['Jordan', submmitted],
              ['Kazakhstan', submmitted],
              ['Kuwait', submmitted],
              ['Kyrgyzstan', submmitted],
              ['Laos', notsubmmitted],
              ['Lebanon', submmitted],
              ['Malaysia', notsubmmitted],
              ['Maldives', notsubmmitted],
              ['Mongolia', notsubmmitted],
              ['Myanmar', notsubmmitted],
              ['Nepal', submmitted],
              ['North Korea', submmitted],
              ['Oman', submmitted],
              ['Pakistan', submmitted],
              ['Palestine', submmitted],
              ['Philippines', submmitted],
              ['Qatar', submmitted],
              ['Russia', submmitted],
              ['Saudi Arabia', submmitted],
              ['Singapore', notsubmmitted],
              ['South Korea', notsubmmitted],
              ['Sri Lanka', submmitted],
              ['Syria', submmitted],
              ['Taiwan', notsubmmitted],
              ['Tajikistan', submmitted],
              ['Thailand', notsubmmitted],
              ['Timor-Leste', submmitted],
              ['Turkey', submmitted],
              ['Turkmenistan', submmitted],
              ['United Arab Emirates (UAE)', submmitted],
              ['Uzbekistan', submmitted],
              ['Vietnam', submmitted],
              ['Yemen', notsubmmitted],
              ['Hawaii', notsubmmitted],
              ['Fiji', submmitted],
              ['Vanuatu', notsubmmitted],
              ['Tuvalu', submmitted],
              ['Papua New Guinea', submmitted],
              ['East Timor', notsubmmitted],
              ['Hong Kong', notsubmmitted],
              ['Macau', notsubmmitted],
              ['Australia', notsubmmitted],
              ['New Zealand', notsubmmitted],
              ['Solomon Islands', submmitted]
            ]);
            break;
        case '23':
            var data = google.visualization.arrayToDataTable([
              ['Continents', '(Yes is 1, No is 0) Submitted an Accomplishment Report'],

              // Americas and Canada
              ['United States', submmitted],
              ['Brazil', notsubmmitted],
              ['Mexico', notsubmmitted],
              ['Colombia', notsubmmitted],
              ['Argentina', notsubmmitted],
              ['Canada', notsubmmitted],
              ['Peru', submmitted],
              ['Venezuela', submmitted],
              ['Chile', submmitted],
              ['Guatemala', submmitted],
              ['Ecuador', notsubmmitted],
              ['Bolivia', notsubmmitted],
              ['Haiti', submmitted],
              ['Dominican Republic', submmitted],
              ['Cuba', submmitted],
              ['Honduras', submmitted],
              ['Paraguay', submmitted],
              ['Nicaragua', submmitted],
              ['El Salvador', submmitted],
              ['Costa Rica', submmitted],
              ['Panama', notsubmmitted],
              ['Uruguay', notsubmmitted],
              ['Puerto Rico', submmitted],
              ['Jamaica', submmitted],
              ['Trinidad and Tobago', submmitted],
              ['Guyana', submmitted],
              ['Suriname', submmitted],
              ['Belize', submmitted],
              ['Bahamas', submmitted],
              ['Guadeloupe ', submmitted],
              ['Martinique', submmitted],
              ['French Guiana', submmitted],
              ['Barbados  ', submmitted],
              ['Curacao', submmitted],
              ['Saint Lucia', submmitted],
              ['Grenada', notsubmmitted],
              ['Aruba', notsubmmitted],
              ['Saint Vincent and the Grenadines', submmitted],
              ['Antigua and Barbuda', submmitted],
              ['United States Virgin Islands', submmitted],
              ['Cayman Islands', submmitted],
              ['Dominica', notsubmmitted],
              ['Bermuda', notsubmmitted],
              ['Greenland', submmitted],
              ['Saint Kitts and Nevis', submmitted],
              ['Turks and Caicos Islands', submmitted],
              ['Sint Maarten', submmitted],
              ['British Virgin Islands  ', submmitted],
              ['Saint Martin', notsubmmitted],
              ['Anguilla', submmitted],
              ['Saint Barthelemy', submmitted],
              ['Saint Pierre and Miquelon', submmitted],
              ['Montserrat', submmitted],
              ['Falkland Islands', submmitted],
              ['Canada', notsubmmitted],
              ['Svalbard and Jan Mayen', notsubmmitted],

              // Middle East and Africa
              ['Albania', notsubmmitted],
              ['Bahrain', notsubmmitted],
              ['Iran', submmitted],
              ['Iraq', notsubmmitted],
              ['Israel and Occupied Palestinian Territories', notsubmmitted],
              ['Israel', notsubmmitted],
              ['Jordan', submmitted],
              ['Kuwait', notsubmmitted],
              ['Lebanon', notsubmmitted],
              ['Oman', notsubmmitted],
              ['Qatar', submmitted],
              ['Saudi Arabia', notsubmmitted],
              ['Syria', submmitted],
              ['United Arab Emirates', submmitted],
              ['Yemen', submmitted],
              ['Algeria', submmitted],
              ['Angola', submmitted],
              ['Benin', submmitted],
              ['Botswana', submmitted],
              ['Burkina Faso', submmitted],
              ['Burundi', submmitted],
              ['Cabo Verde', notsubmmitted],
              ['Cameroon', submmitted],
              ['Central African Republic (CAR)', submmitted],
              ['Chad', submmitted],
              ['Comoros', submmitted],
              ['Congo, Democratic Republic of the', submmitted],
              ['Congo, Republic of the', submmitted],
              ['Cote d’Ivoire', submmitted],
              ['Djibouti', notsubmmitted],
              ['Egypt', notsubmmitted],
              ['Equatorial Guinea', submmitted],
              ['Eritrea', submmitted],
              ['Eswatini', notsubmmitted],
              ['Ethiopia', notsubmmitted],
              ['Gabon', submmitted],
              ['Gambia', submmitted],
              ['Ghana', submmitted],
              ['Guinea', submmitted],
              ['Guinea-Bissau', submmitted],
              ['Kenya', notsubmmitted],
              ['Lesotho', submmitted],
              ['Liberia', submmitted],
              ['Libya', submmitted],
              ['Madagascar', submmitted],
              ['Malawi', notsubmmitted],
              ['Mali', notsubmmitted],
              ['Mauritania', submmitted],
              ['Mauritius', submmitted],
              ['Morocco', notsubmmitted],
              ['Mozambique', submmitted],
              ['Namibia', notsubmmitted],
              ['Niger', submmitted],
              ['Nigeria', notsubmmitted],
              ['Rwanda', submmitted],
              ['Sao Tome and Principe', submmitted],
              ['Senegal', submmitted],
              ['Seychelles', submmitted],
              ['Sierra Leone', submmitted],
              ['Somalia', notsubmmitted],
              ['South Africa', notsubmmitted],
              ['South Sudan', submmitted],
              ['Sudan', submmitted],
              ['Tanzania', submmitted],
              ['Togo', submmitted],
              ['Tunisia', notsubmmitted],
              ['Uganda', submmitted],
              ['Zambia', notsubmmitted],
              ['Zimbabwe', notsubmmitted],
              ["Côte d'Ivoire", submmitted],
              ['South Sudan', submmitted],
              [{v: 'CI', f: 'Ivory Island'}, submmitted],
              [{v: 'CD', f: 'Democratic Republic of Congo'}, submmitted],
              [{v: 'SS', f: 'South Sudan'}, submmitted],
              [{v: 'CF', f: 'Central African Republic'}, notsubmmitted],
              [{v: 'CG', f: 'Republic of the Congo'}, submmitted],

              // Europe
              ['Albania', notsubmmitted],
              ['Latvia', notsubmmitted],
              ['Andorra', notsubmmitted],
              ['Liechtenstein', submmitted],
              ['Armenia', notsubmmitted],
              ['Lithuania', notsubmmitted],
              ['Austria', submmitted],
              ['Luxembourg', submmitted],
              ['Azerbaijan', submmitted],
              ['Malta', notsubmmitted],
              ['Belarus', submmitted],
              ['Moldova', submmitted],
              ['Belgium', notsubmmitted],
              ['Monaco', submmitted],
              ['Bosnia and Herzegovina', submmitted],
              ['Montenegro', submmitted],
              ['Bulgaria', submmitted],
              ['Netherlands', submmitted],
              ['Croatia', notsubmmitted],
              ['Norway', submmitted],
              ['Cyprus', submmitted],
              ['Poland', notsubmmitted],
              ['Czech Republic', notsubmmitted],
              ['Portugal', submmitted],
              ['Denmark', notsubmmitted],
              ['Romania', submmitted],
              ['Estonia', submmitted],
              ['Russia', submmitted],
              ['Finland San', submmitted],
              ['Marino', submmitted],
              ['Republic of Macedonia', submmitted],
              ['Serbia', notsubmmitted],
              ['France', notsubmmitted],
              ['Slovakia', submmitted],
              ['Georgia', submmitted],
              ['Slovenia', submmitted],
              ['Germany', notsubmmitted],
              ['Spain', notsubmmitted],
              ['Greece', notsubmmitted],
              ['Hungary', notsubmmitted],
              ['Sweden', submmitted],
              ['Iceland', submmitted],
              ['Switzerland', notsubmmitted],
              ['Ireland', submmitted],
              ['Turkey', submmitted],
              ['Italy', notsubmmitted],
              ['Ukraine', notsubmmitted],
              ['Kosovo', submmitted],
              ['United Kingdom', submmitted],
              ['Finland', submmitted],

              // Asia and Pacific
              ['Afghanistan', submmitted],
              ['Armenia', submmitted],
              ['Azerbaijan', submmitted],
              ['Bahrain', submmitted],
              ['Bangladesh', notsubmmitted],
              ['Bhutan', submmitted],
              ['Brunei', notsubmmitted],
              ['Cambodia', submmitted],
              ['China', notsubmmitted],
              ['Cyprus', notsubmmitted],
              ['Georgia', notsubmmitted],
              ['India', notsubmmitted],
              ['Indonesia', notsubmmitted],
              ['Iran', submmitted],
              ['Iraq', notsubmmitted],
              ['Israel', submmitted],
              ['Japan', notsubmmitted],
              ['Jordan', submmitted],
              ['Kazakhstan', submmitted],
              ['Kuwait', submmitted],
              ['Kyrgyzstan', submmitted],
              ['Laos', notsubmmitted],
              ['Lebanon', submmitted],
              ['Malaysia', notsubmmitted],
              ['Maldives', notsubmmitted],
              ['Mongolia', notsubmmitted],
              ['Myanmar', notsubmmitted],
              ['Nepal', submmitted],
              ['North Korea', submmitted],
              ['Oman', submmitted],
              ['Pakistan', submmitted],
              ['Palestine', submmitted],
              ['Philippines', submmitted],
              ['Qatar', submmitted],
              ['Russia', submmitted],
              ['Saudi Arabia', submmitted],
              ['Singapore', notsubmmitted],
              ['South Korea', notsubmmitted],
              ['Sri Lanka', notsubmmitted],
              ['Syria', notsubmmitted],
              ['Taiwan', notsubmmitted],
              ['Tajikistan', submmitted],
              ['Thailand', notsubmmitted],
              ['Timor-Leste', submmitted],
              ['Turkey', submmitted],
              ['Turkmenistan', submmitted],
              ['United Arab Emirates (UAE)', submmitted],
              ['Uzbekistan', submmitted],
              ['Vietnam', submmitted],
              ['Yemen', notsubmmitted],
              ['Hawaii', notsubmmitted],
              ['Fiji', submmitted],
              ['Vanuatu', notsubmmitted],
              ['Tuvalu', notsubmmitted],
              ['Papua New Guinea', submmitted],
              ['East Timor', notsubmmitted],
              ['Hong Kong', notsubmmitted],
              ['Macau', notsubmmitted],
              ['Australia', notsubmmitted],
              ['New Zealand', notsubmmitted],
              ['Solomon Islands', submmitted]
            ]);
            break;
        default:
            var data = google.visualization.arrayToDataTable([
              ['Continents', '(Yes is 1, No is 0) Submitted an Accomplishment Report'],

              // Americas and Canada
              ['United States', notsubmmitted],
              ['Brazil', notsubmmitted],
              ['Mexico', submmitted],
              ['Colombia', submmitted],
              ['Argentina', submmitted],
              ['Canada', notsubmmitted],
              ['Peru', submmitted],
              ['Venezuela', submmitted],
              ['Chile', submmitted],
              ['Guatemala', submmitted],
              ['Ecuador', submmitted],
              ['Bolivia', submmitted],
              ['Haiti', submmitted],
              ['Dominican Republic', submmitted],
              ['Cuba', submmitted],
              ['Honduras', submmitted],
              ['Paraguay', submmitted],
              ['Nicaragua', submmitted],
              ['El Salvador', submmitted],
              ['Costa Rica', submmitted],
              ['Panama', submmitted],
              ['Uruguay', submmitted],
              ['Puerto Rico', submmitted],
              ['Jamaica', submmitted],
              ['Trinidad and Tobago', submmitted],
              ['Guyana', submmitted],
              ['Suriname', submmitted],
              ['Belize', submmitted],
              ['Bahamas', submmitted],
              ['Guadeloupe ', submmitted],
              ['Martinique', submmitted],
              ['French Guiana', submmitted],
              ['Barbados  ', submmitted],
              ['Curacao', submmitted],
              ['Saint Lucia', submmitted],
              ['Grenada', submmitted],
              ['Aruba', submmitted],
              ['Saint Vincent and the Grenadines', submmitted],
              ['Antigua and Barbuda', submmitted],
              ['United States Virgin Islands', submmitted],
              ['Cayman Islands', submmitted],
              ['Dominica', submmitted],
              ['Bermuda', submmitted],
              ['Greenland', submmitted],
              ['Saint Kitts and Nevis', submmitted],
              ['Turks and Caicos Islands', submmitted],
              ['Sint Maarten', submmitted],
              ['British Virgin Islands  ', submmitted],
              ['Saint Martin', submmitted],
              ['Anguilla', submmitted],
              ['Saint Barthelemy', submmitted],
              ['Saint Pierre and Miquelon', submmitted],
              ['Montserrat', submmitted],
              ['Falkland Islands', submmitted],
              ['Canada', submmitted],
              ['Svalbard and Jan Mayen', submmitted],

              // Middle East and Africa
              ['Albania', submmitted],
              ['Bahrain', submmitted],
              ['Iran', submmitted],
              ['Iraq', notsubmmitted],
              ['Israel and Occupied Palestinian Territories', notsubmmitted],
              ['Israel', notsubmmitted],
              ['Jordan', submmitted],
              ['Kuwait', notsubmmitted],
              ['Lebanon', notsubmmitted],
              ['Oman', notsubmmitted],
              ['Qatar', submmitted],
              ['Saudi Arabia', notsubmmitted],
              ['Syria', submmitted],
              ['United Arab Emirates', submmitted],
              ['Yemen', submmitted],
              ['Algeria', submmitted],
              ['Angola', submmitted],
              ['Benin', submmitted],
              ['Botswana', submmitted],
              ['Burkina Faso', submmitted],
              ['Burundi', submmitted],
              ['Cabo Verde', submmitted],
              ['Cameroon', submmitted],
              ['Central African Republic (CAR)', submmitted],
              ['Chad', submmitted],
              ['Comoros', submmitted],
              ['Congo, Democratic Republic of the', submmitted],
              ['Congo, Republic of the', submmitted],
              ['Cote d’Ivoire', submmitted],
              ['Djibouti', submmitted],
              ['Egypt', notsubmmitted],
              ['Equatorial Guinea', submmitted],
              ['Eritrea', submmitted],
              ['Eswatini', submmitted],
              ['Ethiopia', submmitted],
              ['Gabon', submmitted],
              ['Gambia', submmitted],
              ['Ghana', submmitted],
              ['Guinea', submmitted],
              ['Guinea-Bissau', submmitted],
              ['Kenya', submmitted],
              ['Lesotho', submmitted],
              ['Liberia', submmitted],
              ['Libya', submmitted],
              ['Madagascar', submmitted],
              ['Malawi', submmitted],
              ['Mali', submmitted],
              ['Mauritania', submmitted],
              ['Mauritius', submmitted],
              ['Morocco', notsubmmitted],
              ['Mozambique', submmitted],
              ['Namibia', submmitted],
              ['Niger', submmitted],
              ['Nigeria', notsubmmitted],
              ['Rwanda', submmitted],
              ['Sao Tome and Principe', submmitted],
              ['Senegal', submmitted],
              ['Seychelles', submmitted],
              ['Sierra Leone', submmitted],
              ['Somalia', submmitted],
              ['South Africa', notsubmmitted],
              ['South Sudan', submmitted],
              ['Sudan', submmitted],
              ['Tanzania', submmitted],
              ['Togo', submmitted],
              ['Tunisia', submmitted],
              ['Uganda', submmitted],
              ['Zambia', submmitted],
              ['Zimbabwe', submmitted],
              ["Côte d'Ivoire", submmitted],
              ['South Sudan', submmitted],
              [{v: 'CI', f: 'Ivory Island'}, submmitted],
              [{v: 'CD', f: 'Democratic Republic of Congo'}, submmitted],
              [{v: 'SS', f: 'South Sudan'}, submmitted],
              [{v: 'CF', f: 'Central African Republic'}, submmitted],
              [{v: 'CG', f: 'Republic of the Congo'}, submmitted],

              // Europe
              ['Albania', submmitted],
              ['Latvia', submmitted],
              ['Andorra', submmitted],
              ['Liechtenstein', submmitted],
              ['Armenia', submmitted],
              ['Lithuania', submmitted],
              ['Austria', submmitted],
              ['Luxembourg', submmitted],
              ['Azerbaijan', submmitted],
              ['Malta', submmitted],
              ['Belarus', submmitted],
              ['Moldova', submmitted],
              ['Belgium', notsubmmitted],
              ['Monaco', submmitted],
              ['Bosnia and Herzegovina', submmitted],
              ['Montenegro', submmitted],
              ['Bulgaria', submmitted],
              ['Netherlands', submmitted],
              ['Croatia', submmitted],
              ['Norway', submmitted],
              ['Cyprus', submmitted],
              ['Poland', notsubmmitted],
              ['Czech Republic', notsubmmitted],
              ['Portugal', submmitted],
              ['Denmark', notsubmmitted],
              ['Romania', submmitted],
              ['Estonia', submmitted],
              ['Russia', submmitted],
              ['Finland San', submmitted],
              ['Marino', submmitted],
              ['Republic of Macedonia', submmitted],
              ['Serbia', submmitted],
              ['France', submmitted],
              ['Slovakia', submmitted],
              ['Georgia', submmitted],
              ['Slovenia', submmitted],
              ['Germany', notsubmmitted],
              ['Spain', submmitted],
              ['Greece', submmitted],
              ['Hungary', notsubmmitted],
              ['Sweden', submmitted],
              ['Iceland', submmitted],
              ['Switzerland', notsubmmitted],
              ['Ireland', submmitted],
              ['Turkey', submmitted],
              ['Italy', notsubmmitted],
              ['Ukraine', submmitted],
              ['Kosovo', submmitted],
              ['United Kingdom', submmitted],
              ['Finland', submmitted],

              // Asia and Pacific
              ['Afghanistan', submmitted],
              ['Armenia', submmitted],
              ['Azerbaijan', submmitted],
              ['Bahrain', submmitted],
              ['Bangladesh', notsubmmitted],
              ['Bhutan', submmitted],
              ['Brunei', notsubmmitted],
              ['Cambodia', submmitted],
              ['China', notsubmmitted],
              ['Cyprus', submmitted],
              ['Georgia', submmitted],
              ['India', submmitted],
              ['Indonesia', notsubmmitted],
              ['Iran', submmitted],
              ['Iraq', submmitted],
              ['Israel', submmitted],
              ['Japan', submmitted],
              ['Jordan', submmitted],
              ['Kazakhstan', submmitted],
              ['Kuwait', submmitted],
              ['Kyrgyzstan', submmitted],
              ['Laos', notsubmmitted],
              ['Lebanon', submmitted],
              ['Malaysia', submmitted],
              ['Maldives', submmitted],
              ['Mongolia', submmitted],
              ['Myanmar', notsubmmitted],
              ['Nepal', submmitted],
              ['North Korea', submmitted],
              ['Oman', submmitted],
              ['Pakistan', submmitted],
              ['Palestine', submmitted],
              ['Philippines', submmitted],
              ['Qatar', submmitted],
              ['Russia', submmitted],
              ['Saudi Arabia', submmitted],
              ['Singapore', notsubmmitted],
              ['South Korea', notsubmmitted],
              ['Sri Lanka', submmitted],
              ['Syria', submmitted],
              ['Taiwan', submmitted],
              ['Tajikistan', submmitted],
              ['Thailand', notsubmmitted],
              ['Timor-Leste', submmitted],
              ['Turkey', submmitted],
              ['Turkmenistan', submmitted],
              ['United Arab Emirates (UAE)', submmitted],
              ['Uzbekistan', submmitted],
              ['Vietnam', submmitted],
              ['Yemen', submmitted],
              ['Hawaii', submmitted],
              ['Fiji', submmitted],
              ['Vanuatu', submmitted],
              ['Tuvalu', submmitted],
              ['Papua New Guinea', submmitted],
              ['East Timor', notsubmmitted],
              ['Hong Kong', notsubmmitted],
              ['Macau', notsubmmitted],
              ['Australia', notsubmmitted],
              ['New Zealand', notsubmmitted],
              ['Solomon Islands', submmitted]
            ]);
        }

        var options = {
            colorAxis: {colors: ['gray', 'green']},
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
    }

    document.getElementById('switch_view').onclick = function(){
        let switcher = document.querySelector('#switch_view').checked;

        if (switcher) {
            document.querySelector('.chart_mode').style.display = 'none';
            document.querySelector('.table_mode').style.display = 'block';
            document.querySelector('.table_mode_title').style.display = 'block';
        } else {
            document.querySelector('.chart_mode').style.display = 'block';
            document.querySelector('.table_mode').style.display = 'none';
            document.querySelector('.table_mode_title').style.display = 'none';
        }
    }


</script>