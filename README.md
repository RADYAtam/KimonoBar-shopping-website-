# KimonoBar E-Commerce Platform

A comprehensive e-commerce platform for selling kimonos and traditional fashion items, built with PHP, MySQL, and modern web technologies.

## Features

### 🛍️ User-Facing Features

#### Product Browsing
- **Product Catalog**: Browse products by categories (Naka, Taka, Setsu)
- **Product Search**: Search products by name, description, or price
- **Product Details**: Detailed product pages with images, descriptions, pricing, and specifications
- **Hot Products Carousel**: Featured products displayed prominently on the homepage
- **New Arrivals**: Latest products showcased in dedicated sections
- **Most Viewed Products**: Popular products highlighted in the banner carousel

#### Shopping Experience
- **Shopping Cart**: Add/remove products, update quantities
- **Checkout Process**: Secure checkout with payment options
- **Order History**: View past orders and invoices
- **User Accounts**: Registration and login functionality
- **Responsive Design**: Mobile-friendly interface

### 👨‍💼 Admin Panel Features

#### Product Management
- **Add New Products**: Upload images, set prices, descriptions, sizes, and categories
- **Update Products**: Modify existing product information
- **Delete Products**: Remove products from inventory
- **Bulk Product Updates**: Update quantities for existing products
- **Product Categories**: Manage catalog hierarchies

#### User Management
- **Admin User Management**: Create and manage admin accounts
- **Client Management**: View and manage customer accounts
- **Supplier Management**: Track and update supplier information

#### Order & Invoice Management
- **Invoice Generation**: Automatic invoice creation for orders
- **Order Tracking**: Monitor order status (Pending, Processing, Completed, Cancelled)
- **Invoice Printing**: Generate printable invoices for admin and users
- **Payment Processing**: Handle various payment methods

#### Analytics & Reporting
- **Sales Statistics**: Monthly revenue, invoice counts, and product sales data
- **Dashboard**: Comprehensive admin dashboard with key metrics
- **Data Visualization**: Charts and graphs for sales trends

#### System Administration
- **Database Management**: Direct database operations
- **File Upload Management**: Handle product image uploads
- **Security Features**: Secure login systems for admin and users

## Technology Stack

### Backend
- **PHP 8.1+**: Server-side scripting
- **MySQL 5.7+**: Database management
- **PDO**: Secure database connections

### Frontend
- **HTML5**: Semantic markup
- **CSS3**: Custom styling
- **JavaScript**: Interactive features
- **Fomantic UI**: CSS framework for modern UI components
- **jQuery**: DOM manipulation and AJAX

### Libraries & Tools
- **Chart.js**: Data visualization for statistics
- **DataTables**: Interactive tables for admin listings
- **PDFMake**: PDF generation for invoices
- **JSZip**: File compression utilities

## Installation

### Prerequisites
- XAMPP/WAMP or similar PHP development environment
- PHP 8.1 or higher
- MySQL 5.7 or higher
- Web browser (Chrome, Firefox, Safari, Edge)

### Setup Steps

1. **Clone the Repository**
   ```bash
   git clone https://github.com/yourusername/kimonobar.git
   cd kimonobar
   ```

2. **Database Setup**
   - Start XAMPP and ensure Apache and MySQL are running
   - Import `database/fashion.sql` into your MySQL database
   - Update database credentials in `model/connectdb.php` if needed

3. **File Permissions**
   - Ensure `uploads/` directory is writable for image uploads
   - Set appropriate permissions for PHP file execution

4. **Access the Application**
   - Admin Panel: `http://localhost/kimonobar/admin/login.php`
   - User Store: `http://localhost/kimonobar/web_user/fashionApp.php`

### Default Admin Credentials
- Username: `adminthuong`
- Password: `123123`

## Project Structure

```
kimonobar/
├── admin/                 # Admin panel files
│   ├── login.php         # Admin login
│   ├── admin.php         # Main admin dashboard
│   ├── product.php       # Product management
│   ├── client.php        # Client management
│   ├── invoice.php       # Invoice management
│   └── css/js/           # Admin styling and scripts
├── web_user/             # User-facing store
│   ├── fashionApp.php    # Main store page
│   ├── detail_product.php # Product details
│   ├── cart.php          # Shopping cart
│   ├── checkout.php      # Checkout process
│   └── login_user.php    # User login
├── model/                # Database models
│   ├── connectdb.php     # Database connection
│   ├── productdb.php     # Product operations
│   ├── userdb.php        # User management
│   └── statisticdb.php   # Analytics queries
├── assets/               # Static assets
│   ├── css/              # Stylesheets
│   ├── js/               # JavaScript files
│   └── images/           # Static images
├── uploads/              # User-uploaded images
├── database/             # Database files
│   └── fashion.sql       # Database schema and data
└── README.md             # This file
```

## Key Features Explained

### Product Display System
- **Multi-level Categorization**: Products organized by style types (Naka, Taka, Setsu)
- **Dynamic Filtering**: Filter products by category, price, and attributes
- **Image Gallery**: High-quality product images with zoom functionality
- **Size and Gender Options**: Support for different sizes and gender-specific items

### Shopping Cart & Checkout
- **Persistent Cart**: Cart contents saved across sessions
- **Quantity Management**: Update item quantities directly in cart
- **Order Summary**: Detailed order breakdown with totals
- **Multiple Payment Options**: Support for various payment methods

### Admin Dashboard
- **Real-time Statistics**: Live updates on sales, orders, and inventory
- **Bulk Operations**: Efficient management of multiple items
- **Export Functionality**: Generate reports and export data
- **User Role Management**: Different access levels for admin users

### Security Features
- **SQL Injection Protection**: Prepared statements and input sanitization
- **Session Management**: Secure user sessions with proper validation
- **File Upload Security**: Safe image upload with type validation
- **Password Hashing**: Secure password storage (recommended upgrade)

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Future Enhancements

- [ ] User reviews and ratings system
- [ ] Wishlist functionality
- [ ] Advanced search with filters
- [ ] Multi-language support
- [ ] API integration for mobile apps
- [ ] Email notifications for orders
- [ ] Inventory management alerts
- [ ] Advanced analytics dashboard

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Support

For support, email support@kimonobar.com or create an issue in this repository.

## Acknowledgments

- Fomantic UI for the beautiful interface components
- Chart.js for data visualization
- DataTables for enhanced table functionality
- All contributors and the open-source community