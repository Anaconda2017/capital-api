# Capital Insurance - Laravel Application

## Overview
This is a Laravel-based insurance management system with multi-language support (Arabic/English) and comprehensive insurance services including motor, medical, building, and job insurance.

## Features
- Multi-language support (Arabic/English)
- Motor Insurance Management
- Medical Insurance Management
- Building Insurance Management
- Job Insurance Management
- Claims Management
- User Authentication with JWT
- File Upload System
- Email Notifications
- Admin Dashboard

## Technology Stack
- **Backend**: Laravel 8.x
- **Database**: MySQL
- **Authentication**: JWT (tymon/jwt-auth)
- **Image Processing**: Intervention Image
- **Localization**: mcamara/laravel-localization
- **Frontend**: Blade Templates with Bootstrap

## Requirements
- PHP 8.0 or higher
- MySQL 5.7 or higher
- Composer
- Node.js & NPM (for frontend assets)

## Installation

### Local Development

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/capital-insurance.git
   cd capital-insurance
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Storage setup**
   ```bash
   php artisan storage:link
   ```

7. **Start development server**
   ```bash
   php artisan serve
   ```

### Production Deployment

#### Using Docker
```bash
docker-compose up -d
```

#### Using Coolify/Koyeb
See [DEPLOYMENT.md](DEPLOYMENT.md) for detailed instructions.

## Environment Variables

### Required Variables
- `APP_KEY` - Laravel application key
- `APP_URL` - Application URL
- `DB_HOST` - Database host
- `DB_DATABASE` - Database name
- `DB_USERNAME` - Database username
- `DB_PASSWORD` - Database password
- `JWT_SECRET` - JWT secret key

### Optional Variables
- `MAIL_HOST` - SMTP host
- `MAIL_USERNAME` - SMTP username
- `MAIL_PASSWORD` - SMTP password
- `AWS_ACCESS_KEY_ID` - AWS access key
- `AWS_SECRET_ACCESS_KEY` - AWS secret key
- `AWS_BUCKET` - AWS S3 bucket name

## API Endpoints

### Authentication
- `POST /api/auth/login` - User login
- `POST /api/auth/register` - User registration
- `POST /api/auth/logout` - User logout
- `POST /api/auth/refresh` - Refresh token

### Insurance Services
- `GET /api/motor-insurance` - Get motor insurance
- `POST /api/motor-insurance` - Create motor insurance
- `GET /api/medical-insurance` - Get medical insurance
- `POST /api/medical-insurance` - Create medical insurance
- `GET /api/building-insurance` - Get building insurance
- `POST /api/building-insurance` - Create building insurance
- `GET /api/job-insurance` - Get job insurance
- `POST /api/job-insurance` - Create job insurance

### Claims
- `GET /api/claims` - Get all claims
- `POST /api/claims` - Create new claim
- `GET /api/claims/{id}` - Get specific claim
- `PUT /api/claims/{id}` - Update claim
- `DELETE /api/claims/{id}` - Delete claim

## File Structure
```
app/
├── Http/Controllers/     # API Controllers
├── Models/              # Eloquent Models
├── Providers/           # Service Providers
└── ...

config/
├── app.php              # Application configuration
├── database.php         # Database configuration
├── jwt.php             # JWT configuration
└── ...

database/
├── migrations/         # Database migrations
└── seeders/           # Database seeders

public/
├── uploads/           # Uploaded files
└── ...

resources/
├── views/             # Blade templates
├── lang/              # Language files
└── ...
```

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## License
This project is licensed under the MIT License.

## Support
For support, email support@capital-insurance.com or create an issue in the repository.