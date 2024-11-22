# B00k5t0re

A modern digital bookstore built with Laravel, featuring book management, subscriptions, and PDF delivery capabilities.
## 🚀 Features

### Book Management
- CRUD operations for books
- Detailed book information including:
  - Title, author, description
  - ISBN tracking
  - Publication dates
  - Page counts
  - Cover image management
  - Category classification

### Subscription System
- Publisher subscription management
- Secure subscription codes
- Email notifications for new subscriptions
- PDF download capabilities for subscribers

### User Interface
- Responsive design using Tailwind CSS
- Clean, modern layout
- Book catalog browsing
- Detailed book views

## 🛠 Technical Stack

- **Backend**: Laravel PHP Framework
- **Database**: Supports PostgreSQL and MySQL
- **Frontend**: 
  - Tailwind CSS
  - Blade templating
  - JavaScript/jQuery
- **Email**: Configured for SMTP (Mailtrap in development)
- **File Storage**: Local storage with configurable options
- **Authentication**: Laravel's built-in authentication

## 📁 Project Structure

Key components:
├── app │ ├── Http/Controllers │ │ ├── BookController.php # Book CRUD operations │ │ └── SubscriptionController.php # Subscription management │ └── Models │ ├── Book.php # Book model with relationships │ └── User.php # User model ├── resources │ ├── views │ │ ├── books/ # Book-related views │ │ └── mail/ # Email templates │ ├── css │ └── js └── database └── migrations # Database structure


## 🔧 Setup

1. Clone the repository
2. Copy `.env.example` to `.env` and configure:
   - Database credentials
   - Mail settings
   - Application URL
3. Install dependencies:
   ```bash
   composer install
   npm install

   php artisan migrate

💡 Notable Features
Smart Image Handling

Automatic cover image processing
Default fallbacks for missing images
Subscription System

Secure code generation
Publisher-subscriber relationship
PDF access control
Database Design

Robust relationships between books, publishers, and users
Comprehensive book metadata storage
🔒 Security Features
CSRF protection
Secure subscription code generation
File access control
Input validation
Secure password hashing
🤝 Contributing
Contributions are welcome! Please read our contributing guidelines before submitting pull requests.

📝 License
[Add your license information here]

---
## SOLID

This codebase shows a well-structured Laravel application with clear separation of concerns. Some notable aspects:

1. The controllers follow SOLID principles and handle specific responsibilities:
   - `BookController.php` manages book CRUD operations
   - `SubscriptionController.php` handles subscription logic

2. The models (`Book.php` and `User.php`) include proper relationships and attribute casting.

3. The views use a combination of Blade templates and Tailwind CSS for styling.

4. There's good configuration management through the `.env` files with proper separation of development and production settings.

5. The database structure is well-defined through migrations, showing a clear evolution of the schema.

The application seems to be actively developed, with features like subscription management and file handling already implemented. The use of factories and seeders suggests good development practices for testing and development environments.

Let me know if you'd like me to expand on any particular aspect of the codebase!
