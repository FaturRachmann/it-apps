<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::updateOrCreate([
            'slug' => 'network-infrastructure-setup',
        ], [
            'title' => 'Network Infrastructure Setup',
            'short_description' => 'Complete network setup and configuration for businesses of all sizes.',
            'full_description' => 'Our network infrastructure services include designing, implementing, and configuring complete network solutions for your business. We ensure secure, scalable, and reliable connectivity across all your systems.',
            'estimated_price' => '$1,500 - $5,000',
            'price_note' => 'Price varies based on network complexity and size',
            'scope' => json_encode([
                'Network design and planning',
                'Router and switch configuration',
                'Firewall setup and security',
                'Wireless access point installation',
                'Network monitoring setup',
                'Documentation and training'
            ]),
            'icon_url' => '/images/services/network-icon.png',
            'image_url' => '/images/services/network-setup.jpg',
            'is_active' => true,
            'display_order' => 1,
        ]);

        Service::updateOrCreate([
            'slug' => 'system-administration',
        ], [
            'title' => 'System Administration',
            'short_description' => 'Server management and maintenance for optimal performance.',
            'full_description' => 'Professional server administration services to keep your systems running smoothly. We handle updates, security patches, monitoring, and troubleshooting to ensure maximum uptime.',
            'estimated_price' => '$100 - $200/hour',
            'price_note' => 'Or monthly retainer packages available',
            'scope' => json_encode([
                'Server monitoring and maintenance',
                'Security updates and patching',
                'Backup and recovery management',
                'Performance optimization',
                'Troubleshooting and support',
                'Documentation and reporting'
            ]),
            'icon_url' => '/images/services/server-icon.png',
            'image_url' => '/images/services/server-admin.jpg',
            'is_active' => true,
            'display_order' => 2,
        ]);

        Service::updateOrCreate([
            'slug' => 'cybersecurity-solutions',
        ], [
            'title' => 'Cybersecurity Solutions',
            'short_description' => 'Protect your business from digital threats and vulnerabilities.',
            'full_description' => 'Comprehensive cybersecurity services to protect your business from evolving digital threats. We implement security measures, conduct audits, and provide ongoing protection.',
            'estimated_price' => '$2,000 - $10,000',
            'price_note' => 'Based on security assessment and requirements',
            'scope' => json_encode([
                'Security audit and risk assessment',
                'Firewall and intrusion prevention',
                'Endpoint protection',
                'Employee security training',
                'Incident response planning',
                'Compliance consulting'
            ]),
            'icon_url' => '/images/services/security-icon.png',
            'image_url' => '/images/services/cybersecurity.jpg',
            'is_active' => true,
            'display_order' => 3,
        ]);
    }
}
