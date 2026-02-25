<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@techfix.com'],
            [
                'name' => 'Admin TechFix',
                'password' => bcrypt('TechFix2024!'),
                'email_verified_at' => now(),
            ]
        );
        
        // Create demo user (non-admin)
        User::firstOrCreate(
            ['email' => 'user@techfix.com'],
            [
                'name' => 'Demo User',
                'password' => bcrypt('user123'),
                'email_verified_at' => now(),
            ]
        );
        
        $this->command->info('✅ Admin user created successfully!');
        $this->command->info('');
        $this->command->info('📧 Login Credentials:');
        $this->command->info('   Admin Email: admin@techfix.com');
        $this->command->info('   Admin Password: TechFix2024!');
        $this->command->info('');
        $this->command->info('   Demo Email: user@techfix.com');
        $this->command->info('   Demo Password: user123');
    }
}
