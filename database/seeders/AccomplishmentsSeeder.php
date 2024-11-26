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
        \App\Models\Accomplishment::insert([
            [
                'country_id' => 1,
                'title' => 'Establishing linkages with Cultural and other Agencies for Potential Collaboration in Promoting PH Culture',
                'month' => 'January',
                'year' => '2024',
                'quarter' => 1,
                'project_type' => 'Recurring',
                'project_classification' => 'Filipino Heritage and Identity',
                'foreign_policy_pillar' => 'Public and cultural Diplomacy',
                'target_audience' => 'ASEAN Community',
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
                'project_type' => null,
                'project_classification' => null,
                'foreign_policy_pillar' => 'Economic Diplomacy and Public Diplomacy',
                'target_audience' => 'International community',
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
                'project_classification' => 'Filipino Heritage and Identity',
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
                'project_type' => 'Participation in Cultural activities in host country',
                'project_classification' => 'Filipino Heritage and Identity',
                'foreign_policy_pillar' => 'Cultural Promotion',
                'target_audience' => 'ASEAN Community',
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
                'project_classification' => 'Filipino Heritage and Identity',
                'foreign_policy_pillar' => 'Public and cultural Diplomacy',
                'target_audience' => 'Filipino diaspora, Turkish people',
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
                'project_classification' => 'Filipino Heritage and Identity',
                'foreign_policy_pillar' => 'Filipino Heritage and Identity',
                'target_audience' => 'International Community',
                'strategic_plan' => 'Waterfall',
                'diplomacy' => 'Diplomatic',
                'cultural_domains' => 'Filipino',
                'created_at' => now()
            ]
        ]);

    }
}
