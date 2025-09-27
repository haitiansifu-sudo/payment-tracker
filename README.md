# Payment Tracker

A comprehensive web-based payment tracking application built with PHP, HTML, CSS, and JavaScript. This application allows users to track payments, manage companies, and view payment analytics with a beautiful calendar interface.

##  Features

- **User Authentication**: Secure login/registration system with admin approval
- **Payment Tracking**: Add, edit, and delete payment records
- **Company Management**: Organize payments by companies
- **Calendar Interface**: Visual calendar view of payments
- **Admin Panel**: Complete user management and system administration
- **Responsive Design**: Works on desktop and mobile devices
- **Data Export**: Export payment data in various formats
- **Security**: Input sanitization and secure password handling

##  Requirements

- PHP 7.4 or higher
- Web server (Apache/Nginx)
- Modern web browser

##  Installation

### Local Development

1. **Clone or download** this repository to your web server directory
2. **Start a local server**:
   `ash
   php -S localhost:8000
   `
3. **Open your browser** and navigate to http://localhost:8000

### Web Server Deployment

1. **Upload files** to your web server's public directory
2. **Ensure PHP is enabled** on your hosting provider
3. **Set proper permissions** for the web server to read files
4. **Access the application** through your domain

##  Usage

### First Time Setup

1. **Access the application** at your domain or localhost
2. **Register a new account** or use default admin credentials:
   - **Email**: admin@system.com
   - **Password**: admin123
   -  **Important**: Change these credentials after first login!

### User Features

- **Dashboard**: View payment summary and recent activities
- **Add Payments**: Record new payments with company and amount details
- **Calendar View**: Visual representation of payments by date
- **Company Management**: Add and organize companies
- **Settings**: Customize theme, currency, and personal preferences

### Admin Features

- **User Management**: Approve/reject user registrations
- **System Monitoring**: View system statistics and logs
- **Data Export**: Export user and payment data
- **Registration Keys**: Generate keys for controlled registration

##  Project Structure

`
payment-tracker/
 index.php              # Main application entry point
 login.html             # User login page
 calendar-app.html      # Main application interface
 admin.html             # Admin panel
 composer.json          # PHP dependencies
 .htaccess             # Apache configuration
 favicon.svg           # Application icon
 logo.svg              # Application logo
 README.md             # This file
`

##  Configuration

The application uses browser localStorage for data persistence. No database setup is required for basic functionality.

### Customization

- **Logo**: Replace logo.svg with your own logo
- **Favicon**: Replace avicon.svg with your custom icon
- **Styling**: Modify CSS in the HTML files for custom themes

##  Security Features

- Password hashing and validation
- Input sanitization and XSS protection
- Admin-only access controls
- Secure session management
- CSRF protection for forms

##  Browser Compatibility

- Chrome (recommended)
- Firefox
- Safari
- Edge
- Mobile browsers

##  Data Management

- **Local Storage**: All data is stored in browser localStorage
- **Export Options**: CSV and Excel export functionality
- **Backup/Restore**: Built-in backup and restore features
- **Data Persistence**: Data persists across browser sessions

##  Deployment Options

### Traditional Web Hosting
- Upload files via FTP/cPanel
- Ensure PHP support is enabled
- Set appropriate file permissions

### Cloud Platforms
- **DigitalOcean App Platform**: Use the companion deployment package
- **Heroku**: Compatible with PHP buildpack
- **Netlify/Vercel**: Requires serverless PHP setup

##  Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

##  License

This project is open source and available under the MIT License.

##  Support

For issues and questions:
1. Check the admin panel's system information
2. Review browser console for errors
3. Ensure PHP requirements are met
4. Verify file permissions on server

##  Updates

The application includes a built-in update system accessible through the admin panel. Always backup your data before applying updates.

---

**Made with  for efficient payment tracking**
