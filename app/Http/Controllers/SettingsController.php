<?php

namespace App\Http\Controllers;

use App\Models\Accomplishment;
use App\Models\Country;
use App\Models\CulturalEventsAndTargetAudiences;
use App\Models\Translation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    //settings controller configurations

    public function accomplishments() {
        return view('settings.accomplishments');
    }

    public function editAccomplishments($id) {
        $accomplishment = Accomplishment::find($id);
        return view('settings.accomplishments-edit', compact('accomplishment'));
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
            $month_converted = $this->monthConvertion($request['month']);
            
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
        return redirect('settings-accomplishments')->with('success', 'Data uploaded successfully');
    }

    public function events() {
        return view('settings.events');
    }

    public function editevents($id) {
        $event = CulturalEventsAndTargetAudiences::find($id);
        return view('settings.events-edit', compact('event'));
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
        return redirect('settings-events')->with('success', 'Data uploaded successfully');
    }

    public function translations() {
        return view('settings.translations');
    }

    public function editTranslations($id) {
        $translation = Translation::find($id);
        return view('settings.translations-edit', compact('translation'));
    }

    public function uploadTranslations(Request $request) {
        
        // validations
        $request->validate([
            'file_translations' => 'required|max:2048'
        ]);

        // need validation if filename already exist soon..

        // store the file -- manipulate the data
        $file = $request->file('file_translations');
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
            $translations = new Translation;

            // values
            $translations['book_title'] = $report['book_title'];
            $translations['author'] = $report['author'];
            $translations['translator'] = $report['translator'];
            $translations['language'] = $report['language'];
            $translations['title_of_book_and_link'] = $report['title_of_book_and_link'];
            $translations['year_of_translation'] = $report['year_of_translation'];
            $translations['publisher'] = $report['publisher'];
            $translations->save();
        }

        // return a response
        return redirect('settings-translations')->with('success', 'Data uploaded successfully');
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

    public function storeAccomplishments(Request $request) {

        // evaluate month
        $monthSelected = $request['input_month'];
        if ($monthSelected < 4) {
            $monthSelected = '1';
        } elseif ($monthSelected > 3 && $monthSelected < 7) {
            $monthSelected = '2';
        } elseif ($monthSelected > 6 && $monthSelected < 10) {
            $monthSelected = '3';
        } else {
            $monthSelected = '4';
        }

        $month_converted = $this->monthConvertion($request['input_month']);

        // validations
        $request->validate([
            'input_country' => 'required|numeric',
            'input_title' => 'required|string',
            'input_month' => 'required|string',
            'input_year' => 'required|numeric',
            'input_project_type' => 'string',
            'input_project_classification' => 'string',
            'input_foreign_policy_pillar' => 'string',
            'input_target_audience' => 'string',
            'input_strategic_plan' => 'string',
            'input_diplomacy' => 'string',
            'input_cultural_domains' => 'string',
            'input_file_accomplishments' => 'max:5048'
        ]);

        // store the file -- manipulate the data
        $file = $request->file('input_file_accomplishments');
        $name = $file->getClientOriginalName();
        $name = str_replace(',','_', $name);
        $name = str_replace(' ','_', $name);
        $name = explode('.', $name);
        $time = date('hidmy');
        $nameStack = $name[0].$time;
        $name = implode('.', [$nameStack,$name[1]]);
        $path = Storage::disk('public')->putFileAs('uploads', $file, $name);

        $accomplishment = new Accomplishment;
        $accomplishment->country_id = $request['input_country'];
        $accomplishment->title = $request['input_title'];
        $accomplishment->year = $request['input_year'];
        $accomplishment->month = $month_converted;
        $accomplishment->quarter = $monthSelected;
        $accomplishment->project_type = $request['input_project_type'];
        $accomplishment->project_classification = $request['input_project_classification'];
        $accomplishment->foreign_policy_pillar = $request['input_foreign_policy_pillar'];
        $accomplishment->target_audience = $request['input_target_audience'];
        $accomplishment->strategic_plan = $request['input_strategic_plan'];
        $accomplishment->diplomacy = $request['input_diplomacy'];
        $accomplishment->cultural_domains = $request['input_cultural_domains'];
        $accomplishment->attached_file = $name;
        $accomplishment->save();

        return redirect('settings-accomplishments')->with('success', 'Data successfully saved.'); 
    }

    public function storeEvents(Request $request) {

        // validations
        $request->validate([
            'input_host_communities' => 'required|string',
            'input_date_from' => 'required|date',
            'input_date_to' => 'required|date',
            'input_file_events' => 'max:5048'
        ]);

        // store the file -- manipulate the data
        $file = $request->file('input_file_events');
        $name = $file->getClientOriginalName();
        $name = str_replace(',','_', $name);
        $name = str_replace(' ','_', $name);
        $name = explode('.', $name);
        $time = date('hidmy');
        $nameStack = $name[0].$time;
        $name = implode('.', [$nameStack,$name[1]]);
        $path = Storage::disk('public')->putFileAs('uploads', $file, $name);

        $events = new CulturalEventsAndTargetAudiences;
        // values
        $events['host_communities'] = $request['input_host_communities'];
        $events['filipino_communities'] = $request['input_filipino_communities'];
        $events['other_stakeholders'] = $request['input_other_stakeholders'];
        $events['title_of_the_event'] = $request['input_event_title'];
        $events['short_description'] = $request['input_short_description'];
        $events['file_events'] = $name;
        $events['date_from'] = $request['input_date_from'];
        $events['date_to'] = $request['input_date_to'];
        $events->save();

        return redirect('settings-events')->with('success', 'Data successfully saved.'); 
    }

    public function storeTranslations(Request $request) {

        // validations
        $request->validate([
            'input_book_title' => 'required|string',
            'input_author' => 'required|string',
            'input_file_translations' => 'max:5048'
        ]);

        // store the file -- manipulate the data
        $file = $request->file('input_file_translations');
        $name = $file->getClientOriginalName();
        $name = str_replace(',','_', $name);
        $name = str_replace(' ','_', $name);
        $name = explode('.', $name);
        $time = date('hidmy');
        $nameStack = $name[0].$time;
        $name = implode('.', [$nameStack,$name[1]]);
        $path = Storage::disk('public')->putFileAs('uploads', $file, $name);

        $translations = new Translation;
        // values
        $translations['book_title'] = $request['input_book_title'];
        $translations['author'] = $request['input_author'];
        $translations['translator'] = $request['input_translator'];
        $translations['language'] = $request['input_language'];
        $translations['title_of_book_and_link'] = $request['input_title_of_book_and_link'];
        $translations['year_of_translation'] = $request['input_year_of_translation'];
        $translations['publisher'] = $request['input_publisher'];
        $translations['file_translations'] = $name;
        $translations->save();

        // return a response
        return redirect('settings-translations')->with('success', 'Data uploaded successfully'); 
    }

    // Updates functions
    public function updateAccomplishment(Request $request, $id) {

        // evaluate month
        $monthSelected = $request['input_month'];
        if ($monthSelected < 4) {
            $monthSelected = '1';
        } elseif ($monthSelected > 3 && $monthSelected < 7) {
            $monthSelected = '2';
        } elseif ($monthSelected > 6 && $monthSelected < 10) {
            $monthSelected = '3';
        } else {
            $monthSelected = '4';
        }

        $month_converted = $this->monthConvertion($request['input_month']);
        $accomplishment = Accomplishment::find($id);

        // store the file -- manipulate the data
        $file = $request->file('input_file_accomplishments');

        if ($file) {
            // code...
            $name = $file->getClientOriginalName();
            $name = str_replace(',','_', $name);
            $name = str_replace(' ','_', $name);
            $name = explode('.', $name);
            $time = date('hidmy');
            $nameStack = $name[0].$time;
            $name = implode('.', [$nameStack,$name[1]]);
            $path = Storage::disk('public')->putFileAs('uploads', $file, $name);
        } else {
            $name = $accomplishment->attached_file;
        }

        $accomplishment->country_id = $request['input_country'];
        $accomplishment->title = $request['input_title'];
        $accomplishment->year = $request['input_year'];
        $accomplishment->month = $month_converted;
        $accomplishment->quarter = $monthSelected;
        $accomplishment->project_type = $request['input_project_type'];
        $accomplishment->project_classification = $request['input_project_classification'];
        $accomplishment->foreign_policy_pillar = $request['input_foreign_policy_pillar'];
        $accomplishment->target_audience = $request['input_target_audience'];
        $accomplishment->strategic_plan = $request['input_strategic_plan'];
        $accomplishment->diplomacy = $request['input_diplomacy'];
        $accomplishment->cultural_domains = $request['input_cultural_domains'];
        $accomplishment->attached_file = $name;
        $accomplishment->save();

        return redirect('settings-accomplishments')->with('success', 'Data updated successfully.'); 
    }

    public function updateEvents(Request $request, $id) {

        // validations
        $request->validate([
            'input_host_communities' => 'required|string',
            'input_date_from' => 'required|date',
            'input_date_to' => 'required|date',
            'input_file_events' => 'max:5048'
        ]);

        // store the file -- manipulate the data
        $event = CulturalEventsAndTargetAudiences::find($id);
        $file = $request->file('input_file_events');

        if ($file) {
            // code...
            $name = $file->getClientOriginalName();
            $name = str_replace(',','_', $name);
            $name = str_replace(' ','_', $name);
            $name = explode('.', $name);
            $time = date('hidmy');
            $nameStack = $name[0].$time;
            $name = implode('.', [$nameStack,$name[1]]);
            $path = Storage::disk('public')->putFileAs('uploads', $file, $name);
        } else {
            $name = $event->file_events;
        }

        // values
        $events['host_communities'] = $request['input_host_communities'];
        $events['filipino_communities'] = $request['input_filipino_communities'];
        $events['other_stakeholders'] = $request['input_other_stakeholders'];
        $events['title_of_the_event'] = $request['input_event_title'];
        $events['short_description'] = $request['input_short_description'];
        $events['file_events'] = $name;
        $events['date_from'] = $request['input_date_from'];
        $events['date_to'] = $request['input_date_to'];
        $events->save();

        return redirect('settings-events')->with('success', 'Data successfully saved.'); 
    }

    public function updateTranslations(Request $request, $id) {

        // validations
        $request->validate([
            'input_book_title' => 'required|string',
            'input_author' => 'required|string',
            'input_file_translations' => 'max:5048'
        ]);

        // store the file -- manipulate the data
        $translations = Translation::find($id);
        $file = $request->file('input_file_translations');

        if ($file) {
            // code...
            $name = $file->getClientOriginalName();
            $name = str_replace(',','_', $name);
            $name = str_replace(' ','_', $name);
            $name = explode('.', $name);
            $time = date('hidmy');
            $nameStack = $name[0].$time;
            $name = implode('.', [$nameStack,$name[1]]);
            $path = Storage::disk('public')->putFileAs('uploads', $file, $name);
        } else {
            $name = $translations->file_translations;
        }

        // values
        $translations['book_title'] = $request['input_book_title'];
        $translations['author'] = $request['input_author'];
        $translations['translator'] = $request['input_translator'];
        $translations['language'] = $request['input_language'];
        $translations['title_of_book_and_link'] = $request['input_title_of_book_and_link'];
        $translations['year_of_translation'] = $request['input_year_of_translation'];
        $translations['publisher'] = $request['input_publisher'];
        $translations['file_translations'] = $name;
        $translations->save();

        // return a response
        return redirect('settings-translations')->with('success', 'Data uploaded successfully'); 
    }

    // Delete Data Functions
    public function deleteAccomplishment($id) {

        $data = Accomplishment::findOrFail($id);
        $data->delete();

        return response()->json([
            'data' => $data
        ], 200);
    }

    public function deleteEvent($id) {

        $data = CulturalEventsAndTargetAudiences::findOrFail($id);
        $data->delete();

        return response()->json([
            'data' => $data
        ], 200);
    }

    public function deleteTranslation($id) {

        $data = Translation::findOrFail($id);
        $data->delete();

        return response()->json([
            'data' => $data
        ], 200);
    }
}
