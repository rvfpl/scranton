<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $jobs = [
            [
                'title'        => 'Senior PHP / Laravel Engineer',
                'company'      => 'Dunder Mifflin Paper Co.',
                'location'     => 'Scranton, PA (Hybrid)',
                'salary_min'   => 130000,
                'salary_max'   => 160000,
                'description'  => 'Looking for a practical engineer to maintain internal supply-chain systems. No enterprise fluff. Must know Eloquent, queues, and tolerate eccentric regional managers.',
                'tags'         => ['PHP', 'Laravel', 'Backend', 'Hybrid', 'Senior'],
                'is_featured'  => true,
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'title'        => 'Frontend Developer (React)',
                'company'      => 'Vance Refrigeration',
                'location'     => 'Remote (US)',
                'salary_min'   => 110000,
                'salary_max'   => 140000,
                'description'  => 'Help us build premium interactive IoT control dashboards for high-end industrial cooling units. Complete greenfield project using React and Tailwind.',
                'tags'         => ['React', 'Frontend', 'Remote'],
                'is_featured'  => false,
                'published_at' => Carbon::now()->subWeek(),
            ],
            [
                'title'        => 'Full Stack Engineer & SysAdmin',
                'company'      => 'Michael Scott Paper Company',
                'location'     => 'Scranton, PA',
                'salary_min'   => 90000,
                'salary_max'   => 90000,
                'description'  => 'Fast-paced, high-risk startup atmosphere. You will wear every hat: deploying servers via Forge, hacking on reactive view layers, and occasional delivery runs.',
                'tags'         => ['PHP', 'Laravel', 'React', 'DevOps', 'Backend'],
                'is_featured'  => false,
                'published_at' => Carbon::now(),
            ],
        ];

        foreach ($jobs as $job) {
            Job::updateOrCreate(
                ['title' => $job['title'], 'company' => $job['company']],
                array_merge($job, ['is_active' => true])
            );
        }

        $this->command->info('✅ Seeded ' . count($jobs) . ' demo jobs.');
    }
}