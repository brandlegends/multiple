
# Laravel Multiple Domain API

This is a simple Laravel application named **"multiple"** that allows you to manage sites, posts, and pages for multiple domains. It uses a central database to store content, and the application serves different content based on the domain accessed.

## Features

- **Multiple Sites**: Each domain (site) can have its own set of posts and pages.
- **Posts and Pages**: Manage blog posts and pages for each site.
- **No Separate Authors or Categories**: Author and category information is stored directly in the posts and pages tables.
- **Hierarchical Pages**: Pages can be nested with parent-child relationships.

## Requirements

- PHP 7.4 or higher
- Composer
- MySQL or any other compatible database
- Node.js & npm (optional, for front-end assets)

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/your-repo/multiple.git
   cd multiple
   ```

2. **Install dependencies**:
   Run the following command to install Laravel dependencies:
   ```bash
   composer install
   ```

3. **Create the `.env` file**:
   Duplicate the `.env.example` file and rename it to `.env`:
   ```bash
   cp .env.example .env
   ```

4. **Generate the application key**:
   Generate a unique application key for your app by running:
   ```bash
   php artisan key:generate
   ```

5. **Set up your database**:
   In the `.env` file, configure your database connection. Replace the following values with your own database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

6. **Run the database migrations**:
   Once the `.env` file is configured, run the following command to migrate the database tables:
   ```bash
   php artisan migrate
   ```

7. **Serve the application**:
   Run the built-in Laravel server:
   ```bash
   php artisan serve
   ```
   Your app will be running at `http://127.0.0.1:8000`.

## How It Works

### Routes and API

The application is designed to manage multiple sites and their related content via an API. You can use tools like [Postman](https://www.postman.com/) to interact with the API.

- **Site Management**: You can add a new site by sending a POST request to the `/api/site` endpoint.
- **Posts Management**: Add blog posts related to a specific site via `/api/post`.
- **Pages Management**: Pages are hierarchical, meaning you can have nested pages (e.g., `/cars/mazda`). Use `/api/page` to add new pages.

### Example API Endpoints

1. **Create Site**:
   ```http
   POST /api/site
   Content-Type: application/json
   {
      "domain": "example.com"
   }
   ```

2. **Create Post**:
   ```http
   POST /api/post
   Content-Type: application/json
   {
      "site_id": 1,
      "title": "Test Post",
      "content": "<p>This is a test post content</p>",
      "meta_title": "Test Post Meta Title",
      "meta_description": "Test Post Meta Description",
      "Author_name": "John Doe",
      "Author_email": "john@example.com",
      "Author_image": "http://example.com/john.jpg",
      "category_name": "Tech"
   }
   ```

3. **Create Page**:
   ```http
   POST /api/page
   Content-Type: application/json
   {
      "site_id": 1,
      "title": "Test Page",
      "content": "<p>This is a test page content</p>",
      "meta_title": "Test Page Meta Title",
      "meta_description": "Test Page Meta Description",
      "slug": "test-page",
      "Author_name": "Jane Doe",
      "Author_email": "jane@example.com",
      "Author_image": "http://example.com/jane.jpg",
      "category_name": "Business"
   }
   ```

### .env Configuration

The `.env` file contains the environment variables necessary for your Laravel application to run. The most important ones to configure are:

- **APP_NAME**: The name of your application (e.g., `multiple`).
- **APP_URL**: The base URL of your application.
- **DB_CONNECTION**: Database connection type (e.g., `mysql`).
- **DB_HOST**: Database host (e.g., `127.0.0.1` for localhost).
- **DB_DATABASE**: The name of your database.
- **DB_USERNAME**: The database username.
- **DB_PASSWORD**: The database password.

### Example `.env` File

```env
APP_NAME=multiple
APP_ENV=local
APP_KEY=base64:some-generated-key-here
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

## Additional Commands

- **Clear Cache**:
  If you need to clear the application's cache, use the following command:
  ```bash
  php artisan cache:clear
  ```

- **Run Unit Tests**:
  To run the Laravel unit tests, you can use:
  ```bash
  php artisan test
  ```

## Conclusion

You now have a simple Laravel app set up to manage content across multiple domains, with an API for managing sites, posts, and pages. You can use Postman to test the API or extend the app further to meet your needs.