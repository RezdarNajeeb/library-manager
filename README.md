# Library Manager

A modern library management system built with Symfony 7.3 and API Platform. This application allows you to manage books and categories with both web interface and REST API endpoints.

## Features

### Web Interface
- 📚 **Book Management**: Add, view, and browse books
- 🏷️ **Category System**: Organize books by categories
- 📊 **Statistics**: View book counts per category
- 🎨 **Modern UI**: Clean, responsive design with Tailwind CSS
- ⚡ **Interactive Features**: Visual indicators for older books (10+ years)

### REST API
- 🔌 **API Platform Integration**: Auto-generated REST API endpoints
- 📄 **Pagination**: Built-in pagination for large datasets
- 🔍 **Search & Filtering**: Search books by author or filter by category
- 📋 **Documentation**: Auto-generated API documentation
- ✅ **Validation**: Comprehensive data validation

## Technology Stack

- **Backend**: Symfony 7.3
- **Database**: MySQL 8.4.3 (configurable for PostgreSQL/SQLite)
- **API**: API Platform 4.1
- **Frontend**: Twig templates with Tailwind CSS
- **ORM**: Doctrine ORM
- **Validation**: Symfony Validator Component

## Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- MySQL 8.4+ (or PostgreSQL/SQLite)
- Node.js (for frontend assets, optional)

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/RezdarNajeeb/library-manager
   cd library-manager
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Configure environment**
   ```bash
   # Copy environment file
   cp .env .env.local
   
   # Update database configuration in .env.local
   DATABASE_URL="mysql://root@127.0.0.1:3306/library_manager?serverVersion=8.4.3&charset=utf8mb4"
   ```

4. **Set up the database**
   ```bash
   # Create database
   php bin/console doctrine:database:create
   
   # Run migrations
   php bin/console doctrine:migrations:migrate
   
   # Load sample data (optional)
   php bin/console doctrine:fixtures:load
   ```

5. **Start the development server**
   ```bash
   symfony serve
   # or
   php -S localhost:8000 -t public
   ```

## Usage

### Web Interface

Visit `http://localhost:8000` to access the web interface:

- **Browse Books**: View all books with sorting by publication date
- **Add New Book**: Create new book entries with validation
- **View Categories**: See all categories with book counts
- **Book Details**: View detailed information for each book

### REST API

The API is available at `http://localhost:8000/api`:

#### Endpoints

- `GET /api/books` - List all books (paginated)
- `GET /api/books/{id}` - Get specific book details
- `POST /api/books/new` - Create a new book
- `GET /api/categories` - List all categories
- `GET /api/categories/{id}` - Get specific category with books

#### API Features

**Pagination**: Results are automatically paginated
- Books: 5 items per page
- Categories: 5 items per page

**Search & Filtering**:
```bash
# Search books by author (partial match)
GET /api/books?author=tolkien

# Filter books by category name (partial match)
GET /api/books?category.name=Fantasy
```

**API Documentation**: Visit `/api/docs` or `/api` for interactive API documentation

## Database Schema

### Books Table
- `id`: Primary key
- `title`: Book title (required, 2-255 chars)
- `author`: Book author (required, min 3 chars)
- `isbn`: ISBN-13 number (required, validated format)
- `published_at`: Publication date (required, not future)
- `category_id`: Foreign key to categories

### Categories Table
- `id`: Primary key
- `name`: Category name (required, unique, min 3 chars)

## Data Validation

### Book Validation
- **Title**: 2-255 characters, required
- **Author**: Minimum 3 characters, required
- **ISBN**: Valid ISBN-13 format, required
- **Publication Date**: Cannot be in the future, required
- **Category**: Must exist, required

### Category Validation
- **Name**: Minimum 3 characters, unique, required

## Sample Data

The application includes fixtures with sample data:

### Categories
- Science Fiction
- Fantasy
- Mystery

### Sample Books
- **Dune** by Frank Herbert (Science Fiction, 1965)
- **The Hobbit** by J.R.R. Tolkien (Fantasy, 1937)
- **The Hound of the Baskervilles** by Arthur Conan Doyle (Mystery, 1902)
- **Neuromancer** by William Gibson (Science Fiction, 1984)

Load sample data with:
```bash
php bin/console doctrine:fixtures:load
```

## Development

### Key Commands

```bash
# Create new migration
php bin/console make:migration

# Run migrations
php bin/console doctrine:migrations:migrate

# Create new entity
php bin/console make:entity

# Create new controller
php bin/console make:controller

# Load fixtures
php bin/console doctrine:fixtures:load

# Clear cache
php bin/console cache:clear
```

### Project Structure

```
src/
├── Controller/          # Web controllers
├── Entity/             # Doctrine entities
├── Repository/         # Custom repository classes
├── Form/               # Symfony forms
└── DataFixtures/       # Sample data

templates/
├── base.html.twig      # Base template
├── books/              # Book-related templates
└── categories/         # Category-related templates

config/
├── packages/           # Bundle configurations
└── routes/             # Route definitions
```

## Configuration

### CORS Configuration
CORS is pre-configured for local development. Update `config/packages/nelmio_cors.yaml` for production.

### Database Configuration
Supports multiple database systems. Update the `DATABASE_URL` in your `.env.local`:

```bash
# MySQL
DATABASE_URL="mysql://user:password@127.0.0.1:3306/library_manager?serverVersion=8.4.3&charset=utf8mb4"

# PostgreSQL  
DATABASE_URL="postgresql://user:password@127.0.0.1:5432/library_manager?serverVersion=16&charset=utf8"

# SQLite
DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
```

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Support

For questions or issues, please create an issue in the GitHub repository.
