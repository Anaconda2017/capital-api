# Capital Insurance - دليل النشر على GitHub و Koyeb

## الخطوات المطلوبة لنشر المشروع

### 1. إعداد Git Repository

```bash
# تهيئة Git repository
git init

# إضافة جميع الملفات
git add .

# إنشاء commit أولي
git commit -m "Initial commit: Capital Insurance Laravel project"

# إضافة remote repository (استبدل بالرابط الصحيح)
git remote add origin https://github.com/your-username/capital-insurance.git

# رفع المشروع على GitHub
git push -u origin main
```

### 2. إعداد متغيرات البيئة

قبل النشر على Koyeb، تأكد من إعداد المتغيرات التالية:

#### متغيرات مطلوبة:
- `APP_KEY` - مفتاح التطبيق (يتم إنشاؤه تلقائياً)
- `DB_HOST` - عنوان قاعدة البيانات
- `DB_DATABASE` - اسم قاعدة البيانات
- `DB_USERNAME` - اسم المستخدم
- `DB_PASSWORD` - كلمة المرور
- `JWT_SECRET` - مفتاح JWT للمصادقة

#### متغيرات اختيارية:
- `APP_URL` - رابط التطبيق
- `MAIL_FROM_ADDRESS` - عنوان البريد الإلكتروني
- `MAIL_FROM_NAME` - اسم المرسل

### 3. النشر على Koyeb

#### أ) إنشاء حساب على Koyeb
1. اذهب إلى [Koyeb](https://koyeb.com)
2. أنشئ حساب جديد
3. اربط حساب GitHub

#### ب) إنشاء خدمة جديدة
1. اضغط على "Create Service"
2. اختر "GitHub" كمصدر
3. اختر repository الخاص بك
4. اختر الفرع `main`

#### ج) إعداد البيئة
1. في قسم Environment Variables، أضف المتغيرات المطلوبة
2. تأكد من تعيين `APP_ENV=production`
3. تأكد من تعيين `APP_DEBUG=false`

#### د) إعداد قاعدة البيانات
يمكنك استخدام:
- قاعدة بيانات Koyeb المُدارة
- قاعدة بيانات خارجية (AWS RDS, Google Cloud SQL, إلخ)

### 4. إعداد قاعدة البيانات

#### أ) إنشاء قاعدة بيانات جديدة
```sql
CREATE DATABASE capital_insurance;
CREATE USER 'capital_user'@'%' IDENTIFIED BY 'secure_password';
GRANT ALL PRIVILEGES ON capital_insurance.* TO 'capital_user'@'%';
FLUSH PRIVILEGES;
```

#### ب) تشغيل Migrations
```bash
php artisan migrate
php artisan db:seed
```

### 5. اختبار النشر

بعد النشر، تأكد من:
- [ ] الموقع يعمل بشكل صحيح
- [ ] يمكن تسجيل الدخول
- [ ] قاعدة البيانات متصلة
- [ ] الملفات المرفوعة تعمل
- [ ] الإشعارات تعمل

### 6. إعدادات إضافية

#### أ) SSL Certificate
- Koyeb يوفر SSL تلقائياً
- تأكد من أن `APP_URL` يستخدم `https://`

#### ب) File Storage
للملفات المرفوعة، استخدم:
- AWS S3
- Google Cloud Storage
- أو أي خدمة تخزين سحابية أخرى

#### ج) Monitoring
- راقب logs في Koyeb dashboard
- أضف health checks
- أضف alerts للخطأ

### 7. استكشاف الأخطاء

#### مشاكل شائعة:
1. **خطأ في قاعدة البيانات**: تأكد من صحة بيانات الاتصال
2. **خطأ في الملفات**: تأكد من صلاحيات المجلدات
3. **خطأ في الذاكرة**: زد حجم الذاكرة في Koyeb
4. **خطأ في الوقت**: تأكد من إعدادات timezone

#### حلول:
```bash
# إعادة تشغيل الخدمة
koyeb service restart

# عرض logs
koyeb service logs

# تحديث متغيرات البيئة
koyeb service update --env APP_DEBUG=false
```

### 8. النسخ الاحتياطي

#### أ) قاعدة البيانات
```bash
# تصدير قاعدة البيانات
mysqldump -u username -p database_name > backup.sql

# استيراد قاعدة البيانات
mysql -u username -p database_name < backup.sql
```

#### ب) الملفات
```bash
# نسخ احتياطي للملفات
tar -czf files_backup.tar.gz storage/app/public/
```

### 9. التحديثات المستقبلية

#### أ) تحديث الكود
```bash
# سحب التحديثات
git pull origin main

# تحديث dependencies
composer install --no-dev --optimize-autoloader

# تشغيل migrations الجديدة
php artisan migrate

# مسح cache
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

#### ب) تحديث Koyeb
- Koyeb يحدث تلقائياً عند push جديد
- أو يمكنك إعادة تشغيل الخدمة يدوياً

### 10. الأمان

#### أ) متغيرات البيئة
- لا تشارك ملف `.env`
- استخدم كلمات مرور قوية
- حدث المتغيرات بانتظام

#### ب) قاعدة البيانات
- استخدم SSL للاتصال
- قيد الوصول بـ IP
- راقب محاولات الدخول

#### ج) التطبيق
- فعل HTTPS
- استخدم CORS بشكل صحيح
- حدث Laravel بانتظام

---

## ملاحظات مهمة

1. **تأكد من اختبار كل شيء محلياً قبل النشر**
2. **احتفظ بنسخ احتياطية منتظمة**
3. **راقب الأداء والاستخدام**
4. **حدث النظام بانتظام**
5. **راقب الأمان والثغرات**

---

## الدعم

إذا واجهت أي مشاكل:
1. راجع logs في Koyeb dashboard
2. تأكد من صحة متغيرات البيئة
3. تأكد من اتصال قاعدة البيانات
4. راجع documentation الخاص بـ Laravel و Koyeb
