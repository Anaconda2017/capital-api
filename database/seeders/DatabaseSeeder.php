<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Category;
use App\BuildingInsurance;
use App\MotorInsurance;
use App\MedicalInsurance;
use App\JopInsurance;
use App\Feature;
use App\Testimonial;
use App\Slider;
use App\Faq;
use App\Partner;
use App\ContactInformation;
use App\AboutUs;
use App\PrivacyPolicy;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@capital-insurance.com',
            'password' => Hash::make('password'),
            'phone' => '+966501234567',
            'national_id' => '1234567890',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create sample user
        User::create([
            'name' => 'Ahmed Ali',
            'email' => 'ahmed@example.com',
            'password' => Hash::make('password'),
            'phone' => '+966501234568',
            'national_id' => '1234567891',
            'role' => 'user',
            'email_verified_at' => now(),
        ]);

        // Create categories
        Category::create([
            'name_ar' => 'تأمين المباني',
            'name_en' => 'Building Insurance',
            'description_ar' => 'تأمين شامل للمباني والمنشآت',
            'description_en' => 'Comprehensive insurance for buildings and facilities',
            'is_active' => true,
        ]);

        Category::create([
            'name_ar' => 'تأمين المركبات',
            'name_en' => 'Motor Insurance',
            'description_ar' => 'تأمين شامل للمركبات والسيارات',
            'description_en' => 'Comprehensive insurance for vehicles and cars',
            'is_active' => true,
        ]);

        Category::create([
            'name_ar' => 'التأمين الطبي',
            'name_en' => 'Medical Insurance',
            'description_ar' => 'تأمين صحي شامل',
            'description_en' => 'Comprehensive health insurance',
            'is_active' => true,
        ]);

        Category::create([
            'name_ar' => 'تأمين الوظائف',
            'name_en' => 'Job Insurance',
            'description_ar' => 'تأمين مهني شامل',
            'description_en' => 'Comprehensive professional insurance',
            'is_active' => true,
        ]);

        // Create building insurances
        BuildingInsurance::create([
            'name_ar' => 'تأمين المباني الأساسي',
            'name_en' => 'Basic Building Insurance',
            'description_ar' => 'تأمين أساسي للمباني السكنية',
            'description_en' => 'Basic insurance for residential buildings',
            'price' => 500.00,
            'coverage_type' => 'basic',
            'is_active' => true,
        ]);

        BuildingInsurance::create([
            'name_ar' => 'تأمين المباني المتقدم',
            'name_en' => 'Advanced Building Insurance',
            'description_ar' => 'تأمين متقدم للمباني التجارية',
            'description_en' => 'Advanced insurance for commercial buildings',
            'price' => 1200.00,
            'coverage_type' => 'advanced',
            'is_active' => true,
        ]);

        // Create motor insurances
        MotorInsurance::create([
            'name_ar' => 'تأمين المركبات الأساسي',
            'name_en' => 'Basic Motor Insurance',
            'description_ar' => 'تأمين أساسي للمركبات',
            'description_en' => 'Basic insurance for vehicles',
            'price' => 800.00,
            'coverage_type' => 'basic',
            'is_active' => true,
        ]);

        MotorInsurance::create([
            'name_ar' => 'تأمين المركبات الشامل',
            'name_en' => 'Comprehensive Motor Insurance',
            'description_ar' => 'تأمين شامل للمركبات',
            'description_en' => 'Comprehensive insurance for vehicles',
            'price' => 1500.00,
            'coverage_type' => 'comprehensive',
            'is_active' => true,
        ]);

        // Create medical insurances
        MedicalInsurance::create([
            'name_ar' => 'التأمين الطبي الأساسي',
            'name_en' => 'Basic Medical Insurance',
            'description_ar' => 'تأمين صحي أساسي',
            'description_en' => 'Basic health insurance',
            'price' => 300.00,
            'coverage_type' => 'basic',
            'is_active' => true,
        ]);

        MedicalInsurance::create([
            'name_ar' => 'التأمين الطبي المتقدم',
            'name_en' => 'Advanced Medical Insurance',
            'description_ar' => 'تأمين صحي متقدم',
            'description_en' => 'Advanced health insurance',
            'price' => 600.00,
            'coverage_type' => 'advanced',
            'is_active' => true,
        ]);

        // Create job insurances
        JopInsurance::create([
            'name_ar' => 'تأمين الوظائف الأساسي',
            'name_en' => 'Basic Job Insurance',
            'description_ar' => 'تأمين مهني أساسي',
            'description_en' => 'Basic professional insurance',
            'price' => 200.00,
            'coverage_type' => 'basic',
            'is_active' => true,
        ]);

        JopInsurance::create([
            'name_ar' => 'تأمين الوظائف المتقدم',
            'name_en' => 'Advanced Job Insurance',
            'description_ar' => 'تأمين مهني متقدم',
            'description_en' => 'Advanced professional insurance',
            'price' => 400.00,
            'coverage_type' => 'advanced',
            'is_active' => true,
        ]);

        // Create features
        Feature::create([
            'title_ar' => 'خدمة عملاء متميزة',
            'title_en' => 'Excellent Customer Service',
            'description_ar' => 'نوفر خدمة عملاء على مدار الساعة',
            'description_en' => 'We provide 24/7 customer service',
            'icon' => 'fas fa-headset',
            'is_active' => true,
        ]);

        Feature::create([
            'title_ar' => 'أسعار تنافسية',
            'title_en' => 'Competitive Prices',
            'description_ar' => 'أفضل الأسعار في السوق',
            'description_en' => 'Best prices in the market',
            'icon' => 'fas fa-dollar-sign',
            'is_active' => true,
        ]);

        Feature::create([
            'title_ar' => 'تغطية شاملة',
            'title_en' => 'Comprehensive Coverage',
            'description_ar' => 'تغطية شاملة لجميع احتياجاتك',
            'description_en' => 'Comprehensive coverage for all your needs',
            'icon' => 'fas fa-shield-alt',
            'is_active' => true,
        ]);

        // Create testimonials
        Testimonial::create([
            'name' => 'محمد أحمد',
            'content_ar' => 'خدمة ممتازة وسرعة في المعالجة',
            'content_en' => 'Excellent service and fast processing',
            'rating' => 5,
            'is_active' => true,
        ]);

        Testimonial::create([
            'name' => 'فاطمة السعيد',
            'content_ar' => 'أسعار مناسبة وتغطية شاملة',
            'content_en' => 'Reasonable prices and comprehensive coverage',
            'rating' => 5,
            'is_active' => true,
        ]);

        // Create sliders
        Slider::create([
            'title_ar' => 'أفضل خدمات التأمين',
            'title_en' => 'Best Insurance Services',
            'description_ar' => 'نوفر أفضل خدمات التأمين في المملكة',
            'description_en' => 'We provide the best insurance services in the Kingdom',
            'image' => 'slider1.jpg',
            'is_active' => true,
            'order' => 1,
        ]);

        Slider::create([
            'title_ar' => 'تأمين شامل ومتكامل',
            'title_en' => 'Comprehensive Insurance',
            'description_ar' => 'تأمين شامل لجميع احتياجاتك',
            'description_en' => 'Comprehensive insurance for all your needs',
            'image' => 'slider2.jpg',
            'is_active' => true,
            'order' => 2,
        ]);

        // Create FAQs
        Faq::create([
            'question_ar' => 'كيف يمكنني تقديم طلب تأمين؟',
            'question_en' => 'How can I submit an insurance request?',
            'answer_ar' => 'يمكنك تقديم طلب التأمين من خلال الموقع أو التطبيق',
            'answer_en' => 'You can submit an insurance request through the website or app',
            'is_active' => true,
            'order' => 1,
        ]);

        Faq::create([
            'question_ar' => 'ما هي أنواع التأمين المتاحة؟',
            'question_en' => 'What types of insurance are available?',
            'answer_ar' => 'نوفر تأمين المباني والمركبات والطبي والمهني',
            'answer_en' => 'We provide building, motor, medical and professional insurance',
            'is_active' => true,
            'order' => 2,
        ]);

        // Create partners
        Partner::create([
            'name' => 'شركة التأمين الأولى',
            'logo' => 'partner1.png',
            'website' => 'https://example.com',
            'is_active' => true,
        ]);

        Partner::create([
            'name' => 'شركة التأمين الثانية',
            'logo' => 'partner2.png',
            'website' => 'https://example2.com',
            'is_active' => true,
        ]);

        // Create contact information
        ContactInformation::create([
            'phone' => '+966501234567',
            'email' => 'info@capital-insurance.com',
            'address_ar' => 'الرياض، المملكة العربية السعودية',
            'address_en' => 'Riyadh, Saudi Arabia',
            'facebook' => 'https://facebook.com/capital-insurance',
            'twitter' => 'https://twitter.com/capital-insurance',
            'instagram' => 'https://instagram.com/capital-insurance',
            'linkedin' => 'https://linkedin.com/company/capital-insurance',
        ]);

        // Create about us
        AboutUs::create([
            'content_ar' => 'نحن شركة رائدة في مجال التأمين في المملكة العربية السعودية',
            'content_en' => 'We are a leading insurance company in Saudi Arabia',
            'image' => 'about-us.jpg',
        ]);

        // Create privacy policy
        PrivacyPolicy::create([
            'content_ar' => 'سياسة الخصوصية الخاصة بنا',
            'content_en' => 'Our privacy policy',
        ]);
    }
}