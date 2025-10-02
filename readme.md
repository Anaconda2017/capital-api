# Capital Insurance - نظام التأمين الرقمي

نظام إدارة التأمين الشامل الذي يوفر خدمات التأمين المختلفة مع واجهة ويب حديثة و API متكامل.

## المميزات الرئيسية

- 🏠 **تأمين المباني** - حماية شاملة للمباني والمنشآت
- 🚗 **تأمين المركبات** - تأمين شامل للمركبات والسيارات
- 🏥 **التأمين الطبي** - خدمات التأمين الصحي
- 💼 **تأمين الوظائف** - حماية مهنية شاملة
- 📱 **واجهة متعددة اللغات** - دعم العربية والإنجليزية
- 🔐 **نظام مصادقة آمن** - JWT Authentication
- 📊 **لوحة تحكم إدارية** - إدارة شاملة للنظام
- 📧 **نظام إشعارات** - تنبيهات فورية للعملاء

## التقنيات المستخدمة

- **Backend**: Laravel 8.x
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap
- **Database**: MySQL
- **Authentication**: JWT (tymon/jwt-auth)
- **Image Processing**: Intervention Image
- **Localization**: Laravel Localization
- **API**: RESTful API

## متطلبات النظام

- PHP >= 7.3 أو PHP 8.0+
- Composer
- MySQL 5.7+ أو MariaDB 10.2+
- Node.js & NPM (للتطوير)
- Web Server (Apache/Nginx)

## التثبيت والتشغيل

### 1. استنساخ المشروع
```bash
git clone https://github.com/your-username/capital-insurance.git
cd capital-insurance
```

### 2. تثبيت التبعيات
```bash
composer install
npm install
```

### 3. إعداد متغيرات البيئة
```bash
cp .env.example .env
php artisan key:generate
```

### 4. إعداد قاعدة البيانات
```bash
php artisan migrate
php artisan db:seed
```

### 5. تشغيل المشروع
```bash
php artisan serve
```

## إعداد متغيرات البيئة

قم بتعديل ملف `.env` مع الإعدادات التالية:

```env
APP_NAME="Capital Insurance"
APP_ENV=production
APP_KEY=base64:your-generated-key
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_PORT=3306
DB_DATABASE=your-database-name
DB_USERNAME=your-username
DB_PASSWORD=your-password

JWT_SECRET=your-jwt-secret
```

## النشر على Koyeb

### 1. إعداد ملف koyeb.yaml
تم إنشاء ملف `koyeb.yaml` في جذر المشروع مع الإعدادات المطلوبة.

### 2. متغيرات البيئة المطلوبة في Koyeb
- `APP_KEY`
- `DB_HOST`
- `DB_DATABASE`
- `DB_USERNAME`
- `DB_PASSWORD`
- `JWT_SECRET`

### 3. نشر المشروع
```bash
# رفع المشروع على GitHub أولاً
git add .
git commit -m "Initial commit"
git push origin main

# ثم ربط المشروع مع Koyeb من خلال لوحة التحكم
```

## هيكل المشروع

```
├── app/
│   ├── Http/Controllers/     # Controllers
│   ├── Models/              # Eloquent Models
│   └── Providers/           # Service Providers
├── config/                  # Configuration files
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/            # Database seeders
├── public/                 # Public assets
├── resources/
│   ├── views/              # Blade templates
│   └── lang/               # Language files
└── routes/                 # Route definitions
```

## API Documentation

### Authentication Endpoints
- `POST /api/auth/login` - تسجيل الدخول
- `POST /api/auth/register` - إنشاء حساب جديد
- `POST /api/auth/logout` - تسجيل الخروج
- `POST /api/auth/refresh` - تجديد التوكن

### Insurance Endpoints
- `GET /api/insurance/building` - قائمة تأمين المباني
- `POST /api/insurance/building/request` - طلب تأمين مبنى
- `GET /api/insurance/motor` - قائمة تأمين المركبات
- `POST /api/insurance/motor/request` - طلب تأمين مركبة

## المساهمة

1. Fork المشروع
2. إنشاء فرع للميزة الجديدة (`git checkout -b feature/AmazingFeature`)
3. Commit التغييرات (`git commit -m 'Add some AmazingFeature'`)
4. Push للفرع (`git push origin feature/AmazingFeature`)
5. فتح Pull Request

## الترخيص

هذا المشروع مرخص تحت رخصة MIT - راجع ملف [LICENSE](LICENSE) للتفاصيل.

## الدعم

للحصول على الدعم، يرجى التواصل عبر:
- البريد الإلكتروني: support@capital-insurance.com
- GitHub Issues: [فتح issue جديد](https://github.com/your-username/capital-insurance/issues)

## التحديثات المستقبلية

- [ ] تطبيق موبايل
- [ ] نظام دفع إلكتروني
- [ ] تقارير متقدمة
- [ ] تكامل مع شركات التأمين الخارجية
- [ ] نظام إشعارات push