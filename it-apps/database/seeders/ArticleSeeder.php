<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::updateOrCreate(
            ['slug' => 'top-5-cybersecurity-practices-small-businesses'],
            [
                'title' => 'Top 5 Cybersecurity Practices for Small Businesses',
                'excerpt' => 'Essential cybersecurity measures every small business should implement to protect against digital threats.',
                'content' => 'Small businesses are increasingly targeted by cybercriminals due to often having weaker security measures than larger corporations. Here are five essential cybersecurity practices that can significantly enhance your business\'s security posture:\n\n1. **Multi-Factor Authentication (MFA)**: Implement MFA on all accounts that support it, especially email and financial systems.\n\n2. **Regular Software Updates**: Keep all software, including operating systems and applications, up to date with the latest security patches.\n\n3. **Employee Training**: Educate staff about phishing attacks and social engineering tactics used by cybercriminals.\n\n4. **Data Backup**: Maintain regular, encrypted backups of critical data stored in multiple locations.\n\n5. **Access Control**: Limit access to sensitive information to only those employees who need it for their roles.',
                'featured_image' => '/images/articles/cybersecurity.jpg',
                'category' => 'Security',
                'tags' => json_encode(['cybersecurity', 'small business', 'protection', 'IT security']),
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'views_count' => 125,
            ]
        );

        Article::updateOrCreate(
            ['slug' => 'importance-cloud-backup-solutions'],
            [
                'title' => 'The Importance of Cloud Backup Solutions',
                'excerpt' => 'Why cloud backup solutions are essential for business continuity and data protection.',
                'content' => 'Data loss can be catastrophic for any business, regardless of size. Natural disasters, hardware failures, human error, and cyberattacks can all result in the loss of critical business data. Cloud backup solutions offer a reliable and cost-effective way to protect your business from these risks.\n\n**Benefits of Cloud Backup:**\n\n- **Accessibility**: Access your backed-up data from anywhere with an internet connection\n- **Scalability**: Easily increase storage capacity as your business grows\n- **Cost-effectiveness**: Pay only for the storage you use without investing in physical hardware\n- **Automatic backups**: Schedule regular backups without manual intervention\n- **Security**: Leading providers offer encryption and compliance certifications\n\nWhen choosing a cloud backup solution, consider factors such as recovery time objectives (RTO), recovery point objectives (RPO), security features, and compliance requirements specific to your industry.',
                'featured_image' => '/images/articles/cloud-backup.jpg',
                'category' => 'Cloud Computing',
                'tags' => json_encode(['cloud', 'backup', 'data protection', 'business continuity']),
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'views_count' => 89,
            ]
        );

        Article::updateOrCreate(
            ['slug' => 'understanding-network-segmentation-enhanced-security'],
            [
                'title' => 'Understanding Network Segmentation for Enhanced Security',
                'excerpt' => 'How network segmentation can improve your organization\'s security posture and performance.',
                'content' => 'Network segmentation is the practice of dividing a computer network into multiple segments (subnets) to improve security and performance. Each segment acts as its own subnetwork with specific access controls and security policies.\n\n**Types of Network Segmentation:**\n\n1. **Physical Segmentation**: Using separate physical networks for different purposes\n2. **Virtual Local Area Networks (VLANs)**: Creating logical divisions within a physical network\n3. **Software-Defined Perimeter (SDP)**: Using software to create secure, encrypted connections\n\n**Security Benefits:**\n\n- **Containment**: Limits the spread of malware or unauthorized access\n- **Access Control**: Allows granular control over who can access different network areas\n- **Compliance**: Helps meet regulatory requirements for data separation\n- **Monitoring**: Enables more focused security monitoring and threat detection\n\nImplementing network segmentation requires careful planning and consideration of your organization\'s specific needs, but the security benefits far outweigh the initial complexity.',
                'featured_image' => '/images/articles/network-segmentation.jpg',
                'category' => 'Networking',
                'tags' => json_encode(['networking', 'security', 'segmentation', 'infrastructure']),
                'is_published' => true,
                'published_at' => now()->subDays(15),
                'views_count' => 67,
            ]
        );
    }
}
