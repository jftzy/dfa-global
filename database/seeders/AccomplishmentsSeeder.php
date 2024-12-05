<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccomplishmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($x=1;$x<=1000;$x++){
            $rand =mt_rand(1577836800,1735603200);
            $dyt = date('Y-m-d',$rand);

            \App\Models\Accomplishment::insert([
                'country_id' => fake()->numberBetween($min = 1, $max = 196),
                'title' => fake()->sentence($nbWords = 6, $variableNbWords = true),
                'month' => date('F',strtotime($dyt)),
                'year' => date('Y',strtotime($dyt)),
                'quarter' => ceil((date('m',strtotime($dyt)))/3),
                'project_type' => fake()->randomElement($array = array ('One Time','Recurring','Flagship','Others')),
                'project_classification' => fake()->randomElement($array = array ('Filipino Identity','Cultural Heritage','Pop Culture','Bilateral and Multilateral Relations','Others')),
                'foreign_policy_pillar' => fake()->randomElement($array = array ('National Security','Economic Diplomacy','Promotion and Protection of the rights of Overseas Filipinos','Cultural Promotion', 'Others')),
                'target_audience' => fake()->randomElement($array = array ('Foreign Governments/International Community','Business Community','Foreign/International Civil Society','Filipino Diaspora','Others')),
                'strategic_plan' => 'Waterfall',
                'diplomacy' => 'Diplomatic',
                'cultural_domains' => 'Filipino',
                'created_at' => now()
            ]);
        }
        /*
        \App\Models\Accomplishment::insert([
            [
                'country_id' => 1,
                'title' => 'Establishing linkages with Cultural and other Agencies for Potential Collaboration in Promoting PH Culture',
                'month' => 'January',
                'year' => '2024',
                'quarter' => 1,
                'project_type' => 'Recurring',
                'project_classification' => 'Filipino Identity',
                'foreign_policy_pillar' => 'Economic Diplomacy',
                'target_audience' => 'Business Community',
                'strategic_plan' => 'Waterfall',
                'diplomacy' => 'Diplomatic',
                'cultural_domains' => 'Filipino',
                'created_at' => now()
            ],
            [
                'country_id' => 3,
                'title' => 'Visit and tour of the Memorial Ankara Hospital organized by the ASEAN Ladies Circle',
                'month' => 'November',
                'year' => '2024',
                'quarter' => 4,
                'project_type' => 'Flagship',
                'project_classification' => 'Pop Culture',
                'foreign_policy_pillar' => 'Cultural Promotion',
                'target_audience' => 'Filipino Diaspora',
                'strategic_plan' => 'Waterfall',
                'diplomacy' => 'Diplomatic',
                'cultural_domains' => 'Filipino',
                'created_at' => now()
            ],
            [
                'country_id' => 2,
                'title' => 'Post’s promotion through posting on its social media accounts NCCA’s materials on the commemoration of the National Arts’ Month',
                'month' => 'July',
                'year' => '2024',
                'quarter' => 3,
                'project_type' => 'Recurring',
                'project_classification' => 'Filipino Identity',
                'foreign_policy_pillar' => 'Cultural Promotion',
                'target_audience' => 'International community and Filipino Diaspora',
                'strategic_plan' => 'Waterfall',
                'diplomacy' => 'Diplomatic',
                'cultural_domains' => 'Filipino',
                'created_at' => now()
            ],
            [
                'country_id' => 3,
                'title' => 'Philippines’ Participation in the ASEAN Ladies Circle (ALC) Gathering',
                'month' => 'February',
                'year' => '2024',
                'quarter' => 1,
                'project_type' => 'One Time',
                'project_classification' => 'Cultural Heritage',
                'foreign_policy_pillar' => 'Cultural Promotion',
                'target_audience' => 'Foreign Governments/International Community',
                'strategic_plan' => 'Waterfall',
                'diplomacy' => 'Diplomatic',
                'cultural_domains' => 'Filipino',
                'created_at' => now()
            ],
            [
                'country_id' => 1,
                'title' => 'Launching of the Call for Submission of Logo designs for the 75th anniversary of the establishment of PH-TR diplomatic relations',
                'month' => 'March',
                'year' => '2024',
                'quarter' => 1,
                'project_type' => 'Flagship',
                'project_classification' => 'Filipino Identity',
                'foreign_policy_pillar' => 'National Security',
                'target_audience' => 'Filipino Diaspora',
                'strategic_plan' => 'Waterfall',
                'diplomacy' => 'Diplomatic',
                'cultural_domains' => 'Filipino',
                'created_at' => now()
            ],
            [
                'country_id' => 4,
                'title' => 'Sending of flags, tourism brochures requesting Turkish nationals and distribution of brochures, PH maps, DFA calendars, Philippine snacks during events',
                'month' => 'April',
                'year' => '2024',
                'quarter' => 2,
                'project_type' => 'Recurring',
                'project_classification' => 'Pop Culture',
                'foreign_policy_pillar' => 'Cultural Promotion',
                'target_audience' => 'Business Community',
                'strategic_plan' => 'Waterfall',
                'diplomacy' => 'Diplomatic',
                'cultural_domains' => 'Filipino',
                'created_at' => now()
            ]
        ]);
        */

    }
}
