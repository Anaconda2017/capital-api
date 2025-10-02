<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabaseStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Users table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('national_id')->nullable();
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        // Categories table
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Building Insurance
        Schema::create('building_insurances', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('description_ar');
            $table->text('description_en');
            $table->decimal('price', 10, 2);
            $table->string('coverage_type');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Motor Insurance
        Schema::create('motor_insurances', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('description_ar');
            $table->text('description_en');
            $table->decimal('price', 10, 2);
            $table->string('coverage_type');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Medical Insurance
        Schema::create('medical_insurances', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('description_ar');
            $table->text('description_en');
            $table->decimal('price', 10, 2);
            $table->string('coverage_type');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Job Insurance
        Schema::create('jop_insurances', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('description_ar');
            $table->text('description_en');
            $table->decimal('price', 10, 2);
            $table->string('coverage_type');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Building Requests
        Schema::create('building_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('building_insurance_id')->constrained()->onDelete('cascade');
            $table->string('building_address');
            $table->string('building_type');
            $table->decimal('building_value', 15, 2);
            $table->string('status')->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // Motor Requests
        Schema::create('motor_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('motor_insurance_id')->constrained()->onDelete('cascade');
            $table->string('vehicle_type');
            $table->string('vehicle_model');
            $table->string('vehicle_year');
            $table->string('license_plate');
            $table->decimal('vehicle_value', 15, 2);
            $table->string('status')->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // Medical Requests
        Schema::create('medical_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('medical_insurance_id')->constrained()->onDelete('cascade');
            $table->string('coverage_type');
            $table->decimal('coverage_amount', 15, 2);
            $table->string('status')->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // Job Requests
        Schema::create('jop_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('jop_insurance_id')->constrained()->onDelete('cascade');
            $table->string('job_title');
            $table->string('company_name');
            $table->decimal('salary', 15, 2);
            $table->string('status')->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // Claims tables
        Schema::create('building_claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('building_request_id')->constrained()->onDelete('cascade');
            $table->string('claim_type');
            $table->text('description');
            $table->decimal('claim_amount', 15, 2);
            $table->string('status')->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });

        Schema::create('motor_claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('motor_request_id')->constrained()->onDelete('cascade');
            $table->string('claim_type');
            $table->text('description');
            $table->decimal('claim_amount', 15, 2);
            $table->string('status')->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });

        Schema::create('medical_claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('medical_request_id')->constrained()->onDelete('cascade');
            $table->string('claim_type');
            $table->text('description');
            $table->decimal('claim_amount', 15, 2);
            $table->string('status')->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });

        Schema::create('jop_claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('jop_request_id')->constrained()->onDelete('cascade');
            $table->string('claim_type');
            $table->text('description');
            $table->decimal('claim_amount', 15, 2);
            $table->string('status')->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });

        // Contact Information
        Schema::create('contact_information', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('email');
            $table->text('address_ar');
            $table->text('address_en');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();
        });

        // About Us
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->text('content_ar');
            $table->text('content_en');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // Features
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('title_en');
            $table->text('description_ar');
            $table->text('description_en');
            $table->string('icon')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Testimonials
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content_ar');
            $table->text('content_en');
            $table->string('image')->nullable();
            $table->integer('rating')->default(5);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Sliders
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('title_en');
            $table->text('description_ar');
            $table->text('description_en');
            $table->string('image');
            $table->string('link')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // FAQ
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question_ar');
            $table->string('question_en');
            $table->text('answer_ar');
            $table->text('answer_en');
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Partners
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo');
            $table->string('website')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Privacy Policy
        Schema::create('privacy_policies', function (Blueprint $table) {
            $table->id();
            $table->text('content_ar');
            $table->text('content_en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privacy_policies');
        Schema::dropIfExists('partners');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('sliders');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('features');
        Schema::dropIfExists('about_us');
        Schema::dropIfExists('contact_information');
        Schema::dropIfExists('jop_claims');
        Schema::dropIfExists('medical_claims');
        Schema::dropIfExists('motor_claims');
        Schema::dropIfExists('building_claims');
        Schema::dropIfExists('jop_requests');
        Schema::dropIfExists('medical_requests');
        Schema::dropIfExists('motor_requests');
        Schema::dropIfExists('building_requests');
        Schema::dropIfExists('jop_insurances');
        Schema::dropIfExists('medical_insurances');
        Schema::dropIfExists('motor_insurances');
        Schema::dropIfExists('building_insurances');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('users');
    }
}
