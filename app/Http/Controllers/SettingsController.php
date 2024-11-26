<?php

namespace App\Http\Controllers;

use App\Models\Accomplishment;
use App\Models\Country;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    //setting controller configurations

    public function index() {
        return view('settings.index');
    }

    public function upload(Request $request) {

        // validations
        $request->validate([
            'year' => 'required|Numeric',
            'month' => 'required|String',
            'file' => 'required|mimes:csv,text|max:2048'
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
            
            // check country id
            $countryId = Country::where('name', 'like', $report['country'])->first();

            // values
            $accomplishment['country_id'] = $countryId['id'];
            $accomplishment['title'] = $report['title'];
            $accomplishment['month'] = $request['month'];
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
}
