# Coolify/Koyeb deployment configuration for Capital Insurance

## Environment Variables Required

Before deploying to Coolify/Koyeb, make sure to set these environment variables in your dashboard:

### Application Settings
- `APP_KEY` - Laravel application key (generate with: php artisan key:generate)
- `APP_URL` - Your application URL (e.g., https://your-app.coolify.app)
- `APP_ENV` - Set to `production`
- `APP_DEBUG` - Set to `false`

### Database Settings
- `DB_HOST` - Database host (use Koyeb's managed database or external)
- `DB_PORT` - Database port (usually 3306 for MySQL)
- `DB_DATABASE` - Database name
- `DB_USERNAME` - Database username
- `DB_PASSWORD` - Database password

### JWT Settings
- `JWT_SECRET` - JWT secret key for authentication

### Email Settings
- `MAIL_FROM_ADDRESS` - Email address for sending emails
- `MAIL_FROM_NAME` - Name for email sender

## Deployment Steps

### For Coolify Deployment

1. **Push to GitHub**
   ```bash
   git add .
   git commit -m "Prepare for Coolify deployment"
   git push origin main
   ```

2. **Connect to Coolify**
   - Go to your Coolify dashboard
   - Create a new application
   - Connect your GitHub repository
   - Select the main branch

3. **Configure Environment Variables**
   - Add all required environment variables in Coolify dashboard
   - Make sure to set `APP_ENV=production` and `APP_DEBUG=false`

4. **Deploy**
   - Coolify will automatically build and deploy your application
   - Monitor the build logs for any issues

### For Koyeb Deployment

1. **Push to GitHub**
   ```bash
   git add .
   git commit -m "Prepare for Koyeb deployment"
   git push origin main
   ```

2. **Connect to Koyeb**
   - Go to [Koyeb Dashboard](https://app.koyeb.com)
   - Create a new service
   - Connect your GitHub repository
   - Select the main branch

3. **Configure Environment Variables**
   - Add all required environment variables in Koyeb dashboard
   - Make sure to set `APP_ENV=production` and `APP_DEBUG=false`

4. **Deploy**
   - Koyeb will automatically build and deploy your application
   - Monitor the build logs for any issues

## Database Setup

For production, consider using:
- Koyeb's managed PostgreSQL database
- External MySQL/PostgreSQL service
- Cloud database providers (AWS RDS, Google Cloud SQL, etc.)

## File Storage

For file uploads, consider using:
- AWS S3
- Google Cloud Storage
- Koyeb's file storage options

## Monitoring

- Monitor application logs in Koyeb dashboard
- Set up health checks
- Configure auto-scaling based on traffic

## Security Considerations

- Use HTTPS (enabled by default on Koyeb)
- Set secure environment variables
- Enable CORS properly
- Use strong database passwords
- Regular security updates
