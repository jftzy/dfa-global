<?php

namespace App\Http\Controllers;

use App\Models\Accomplishment;
use App\Models\Country;
use App\Models\CulturalEventsAndTargetAudiences;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    //settings controller configurations

    public function accomplishments() {
        return view('settings.accomplishments');
    }

    public function uploadAccomplishments(Request $request) {

        // validations
        $request->validate([
            'year' => 'required|Numeric',
            'month' => 'required|String',
            'file' => 'required|max:2048'
        ]);

        // need validation if filename already exist soon..

        // store the file -- manipulate the data
        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        $name = str_replace(',','_', $name);
        $name = explode('.', $name);
        $time = date('hidmy');
        $nameStack = $name[0].$time;
        $name = implode('.', [$nameStack,$name[1]]);
        $path = Storage::disk('public')->putFileAs('uploads', $file, $name);

        // process data to database

        $dateTime = date('Y-m-d H:i:s');
        $reports = $this->csvToArray($file);

        // evaluate month
        $monthSelected = $request['month'];
        if ($monthSelected < 4) {
            $monthSelected = '1';
        } elseif ($monthSelected > 3 && $monthSelected < 7) {
            $monthSelected = '2';
        } elseif ($monthSelected > 6 && $monthSelected < 10) {
            $monthSelected = '3';
        } else {
            $monthSelected = '4';
        }

        foreach($reports as $report) {
            // call model instances every loop instances -- refactor if have any better solution.
            $accomplishment = new Accomplishment;
            $country = new Country;

            // call convert method of month
            $month_converted = $this.monthConvertion($request['month']);
            
            // check country id
            $countryId = Country::where('name', 'like', $report['country'])->first();

            // values
            $accomplishment['country_id'] = $countryId['id'];
            $accomplishment['title'] = $report['title'];
            $accomplishment['month'] = $month_converted;
            $accomplishment['year'] = $request['year'];
            $accomplishment['quarter'] = $monthSelected;
            $accomplishment['project_type'] = $report['project_type'];
            $accomplishment['project_classification'] = $report['project_classification'];
            $accomplishment['foreign_policy_pillar'] = $report['foreign_policy_pillar'];
            $accomplishment['target_audience'] = $report['target_audience'];
            $accomplishment['strategic_plan'] = $report['strategic_plan'];
            $accomplishment['diplomacy'] = $report['diplomacy'];
            $accomplishment['cultural_domains'] = $report['cultural_domains'];
            $accomplishment['created_at'] = $dateTime;
            $accomplishment->save();
        }

        // return a response
        return redirect('settings')->with('success', 'Data uploaded successfully');
    }

    public function events() {
        return view('settings.events');
    }

    public function uploadEvents(Request $request) {

        // validations
        $request->validate([
            'date_from' => 'required|Date',
            'date_to' => 'required|Date',
            'file_event' => 'required|max:2048'
        ]);

        // need validation if filename already exist soon..

        // store the file -- manipulate the data
        $file = $request->file('file_event');
        $name = $file->getClientOriginalName();
        $name = str_replace(',','_', $name);
        $name = explode('.', $name);
        $time = date('hidmy');
        $nameStack = $name[0].$time;
        $name = implode('.', [$nameStack,$name[1]]);
        $path = Storage::disk('public')->putFileAs('uploads', $file, $name);

        // process data to database

        $dateTime = date('Y-m-d H:i:s');
        $reports = $this->csvToArray($file);

        foreach($reports as $report) {
            // call model instances every loop instances -- refactor if have any better solution.
            $events = new CulturalEventsAndTargetAudiences;

            // values
            $events['host_communities'] = $report['host_communities'];
            $events['filipino_communities'] = $report['filipino_communities'];
            $events['other_stakeholders'] = $report['other_stakeholders'];
            $events['title_of_the_event'] = $report['title_of_the_event'];
            $events['short_description'] = $report['short_description'];
            $events['date_from'] = $request['date_from'];
            $events['date_to'] = $request['date_to'];
            $events->save();
        }

        // return a response
        return redirect('settings')->with('success', 'Data uploaded successfully');
    }

    public function translations() {
        return view('settings.translations');
    }

    public function uploadTanslations() {
        // 
    }

    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();

        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

    public function monthConvertion($month) 
    {
        switch ($month) {
            case 1:
                return "January";
                break;
            case 2:
                return "February";
                break;
            case 3:
                return "March";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "May";
                break;
            case 6:
                return "June";
                break;
            case 7:
                return "July";
                break;
            case 8:
                return "August";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "October";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "December";
                break;
            default:
                return $month;
                break;
        }
                
    }
}
