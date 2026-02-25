<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Service;
use App\Models\Article;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a sample profile
        Profile::create([
            'name' => 'John Doe',
            'title' => 'Senior IT Support Specialist',
            'bio' => 'Certified IT professional with over 10 years of experience in network infrastructure, cybersecurity, and technical support.',
            'photo_url' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
            'email' => 'john.doe@itsupportservice.com',
            'phone' => '(555) 123-4567',
            'whatsapp' => '+15551234567',
            'linkedin_url' => 'https://linkedin.com/in/johndoe',
            'github_url' => 'https://github.com/johndoe',
        ]);

        // Create sample services
        Service::create([
            'title' => 'Network Setup & Maintenance',
            'slug' => 'network-setup-maintenance',
            'short_description' => 'Complete network infrastructure setup, configuration, and ongoing maintenance for businesses of all sizes.',
            'full_description' => 'Our network setup and maintenance service includes comprehensive planning, installation, and ongoing support for your business network infrastructure. We ensure reliable connectivity, optimal performance, and robust security for your network systems. Our certified technicians will assess your current setup, recommend improvements, and implement solutions that scale with your business growth.',
            'estimated_price' => 150.00,
            'price_note' => 'Starting price',
            'scope' => json_encode([
                'Network assessment and planning',
                'Hardware installation and configuration',
                'Security implementation',
                'Ongoing monitoring and maintenance',
                '24/7 technical support'
            ]),
            'icon_url' => null,
            'image_url' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
            'is_active' => true,
            'display_order' => 1,
        ]);

        Service::create([
            'title' => 'Cybersecurity Solutions',
            'slug' => 'cybersecurity-solutions',
            'short_description' => 'Protect your business from cyber threats with our comprehensive security solutions.',
            'full_description' => 'Our cybersecurity solutions provide comprehensive protection against digital threats that could compromise your business operations. We implement multi-layered security strategies including firewalls, intrusion detection systems, endpoint protection, and employee training programs. Our security experts stay updated with the latest threat intelligence to ensure your systems remain protected.',
            'estimated_price' => 200.00,
            'price_note' => 'Per month',
            'scope' => json_encode([
                'Security audit and risk assessment',
                'Firewall configuration and management',
                'Endpoint protection',
                'Employee security awareness training',
                'Incident response planning'
            ]),
            'icon_url' => null,
            'image_url' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
            'is_active' => true,
            'display_order' => 2,
        ]);

        Service::create([
            'title' => 'Cloud Migration & Management',
            'slug' => 'cloud-migration-management',
            'short_description' => 'Seamlessly migrate your infrastructure to the cloud with expert guidance and ongoing management.',
            'full_description' => 'Our cloud migration and management services help businesses transition to cloud platforms efficiently and securely. We assess your current infrastructure, develop a migration strategy, execute the transition with minimal downtime, and provide ongoing management to optimize costs and performance. Our team supports major cloud providers including AWS, Azure, and Google Cloud Platform.',
            'estimated_price' => 300.00,
            'price_note' => 'Setup fee',
            'scope' => json_encode([
                'Cloud readiness assessment',
                'Migration planning and strategy',
                'Secure data transfer',
                'Post-migration optimization',
                'Ongoing cloud management'
            ]),
            'icon_url' => null,
            'image_url' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
            'is_active' => true,
            'display_order' => 3,
        ]);

        // Create sample articles
        Article::create([
            'title' => 'Top 5 Cybersecurity Practices for Small Businesses',
            'slug' => 'top-5-cybersecurity-practices-small-businesses',
            'excerpt' => 'Essential cybersecurity measures every small business should implement to protect against digital threats.',
            'content' => '<p>In today\'s digital landscape, small businesses are increasingly targeted by cybercriminals. Here are five essential cybersecurity practices that can significantly reduce your risk:</p><ol><li><strong>Implement Multi-Factor Authentication (MFA)</strong>: MFA adds an extra layer of security beyond passwords, requiring users to provide two or more verification factors to gain access to accounts.</li><li><strong>Regular Software Updates</strong>: Keep all software, including operating systems and applications, up to date with the latest security patches.</li><li><strong>Employee Training</strong>: Educate employees about phishing, social engineering, and other common attack vectors.</li><li><strong>Data Backup Strategy</strong>: Maintain regular backups of critical data and test restoration procedures periodically.</li><li><strong>Network Security</strong>: Use firewalls, VPNs, and secure Wi-Fi configurations to protect your network infrastructure.</li></ol>',
            'featured_image' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
            'category' => 'Security',
            'tags' => json_encode(['cybersecurity', 'small business', 'protection']),
            'is_published' => true,
            'published_at' => now()->subDays(5),
            'views_count' => 0,
        ]);

        Article::create([
            'title' => 'Benefits of Cloud Computing for Modern Businesses',
            'slug' => 'benefits-cloud-computing-modern-businesses',
            'excerpt' => 'How cloud computing transforms business operations and provides competitive advantages.',
            'content' => '<p>Cloud computing has revolutionized the way businesses operate, offering unprecedented flexibility, scalability, and cost-effectiveness. Here are the key benefits of adopting cloud solutions:</p><ul><li><strong>Cost Efficiency</strong>: Reduce capital expenditure on hardware and infrastructure while paying only for the resources you actually use.</li><li><strong>Scalability</strong>: Easily scale resources up or down based on business demands without significant upfront investments.</li><li><strong>Accessibility</strong>: Access your data and applications from anywhere with an internet connection, supporting remote work and collaboration.</li><li><strong>Disaster Recovery</strong>: Benefit from built-in redundancy and backup solutions that ensure business continuity.</li><li><strong>Automatic Updates</strong>: Receive the latest features and security updates without manual intervention.</li></ul>',
            'featured_image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
            'category' => 'Technology',
            'tags' => json_encode(['cloud computing', 'business efficiency', 'scalability']),
            'is_published' => true,
            'published_at' => now()->subDays(2),
            'views_count' => 0,
        ]);

        Article::create([
            'title' => 'Network Troubleshooting: Common Issues and Solutions',
            'slug' => 'network-troubleshooting-common-issues-solutions',
            'excerpt' => 'A guide to identifying and resolving common network problems that affect business productivity.',
            'content' => '<p>Network issues can significantly impact business productivity. Understanding common problems and their solutions can help minimize downtime:</p><h3>Slow Network Speeds</h3><p>This is often caused by bandwidth congestion, outdated hardware, or network misconfiguration. Solutions include upgrading hardware, optimizing network traffic, and implementing Quality of Service (QoS) policies.</p><h3>Intermittent Connectivity</h3><p>Check physical connections, update network drivers, and inspect for interference from other electronic devices. Consider replacing aging cables or network equipment.</p><h3>DNS Resolution Problems</h3><p>Configure reliable DNS servers, flush DNS cache regularly, and ensure proper DNS settings on network devices.</p><h3>Security Issues</h3><p>Implement proper firewall rules, update firmware regularly, and monitor network traffic for suspicious activity.</p>',
            'featured_image' => 'https://images.unsplash.com/photo-1587614382346-4ec70e388b28?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
            'category' => 'Networking',
            'tags' => json_encode(['network troubleshooting', 'connectivity', 'performance']),
            'is_published' => true,
            'published_at' => now()->subDay(),
            'views_count' => 0,
        ]);
    }
}
