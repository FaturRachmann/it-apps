<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'name' => 'John Doe',
            'title' => 'Senior IT Support Specialist',
            'bio' => 'Over 10 years of experience in IT support and infrastructure management. Specialized in network security, system administration, and cloud solutions.',
            'photo_url' => '/images/profile.jpg',
            'email' => 'john.doe@itsupport.com',
            'phone' => '+1 (555) 123-4567',
            'whatsapp' => '+1 (555) 123-4567',
            'linkedin_url' => 'https://linkedin.com/in/johndoe',
            'github_url' => 'https://github.com/johndoe',
        ]);
    }
}
