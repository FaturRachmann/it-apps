# Database Schema - IT Support Service Website

## Overview
This document defines the database schema for the IT Support Service website, including tables, relationships, and indexes.

## Database Configuration
- **Database Type**: MySQL 8.0+
- **Collation**: utf8mb4_unicode_ci
- **Engine**: InnoDB
- **Connection**: Configurable via .env file

## Tables

### 1. profiles Table
Stores information about the IT support professional/profile.

```sql
CREATE TABLE profiles (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    title VARCHAR(255) NULL,
    bio TEXT NULL,
    photo_url VARCHAR(500) NULL,
    email VARCHAR(255) NULL,
    phone VARCHAR(50) NULL,
    whatsapp VARCHAR(50) NULL,
    linkedin_url VARCHAR(500) NULL,
    github_url VARCHAR(500) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

**Indexes:**
- PRIMARY KEY: `id`

**Constraints:**
- `name` is required
- `email` format validation at application level

### 2. services Table
Stores information about the IT services offered.

```sql
CREATE TABLE services (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    short_description TEXT NULL,
    full_description TEXT NULL,
    estimated_price VARCHAR(100) NULL,
    price_note TEXT NULL,
    scope JSON NULL, -- Array of service scope items
    icon_url VARCHAR(500) NULL,
    image_url VARCHAR(500) NULL,
    is_active BOOLEAN DEFAULT TRUE,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

**Indexes:**
- PRIMARY KEY: `id`
- UNIQUE: `slug`
- INDEX: `is_active`
- INDEX: `display_order`

**Constraints:**
- `title` is required
- `slug` must be unique
- `is_active` defaults to true
- `display_order` defaults to 0

### 3. articles Table
Stores blog articles and knowledge base content.

```sql
CREATE TABLE articles (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    excerpt TEXT NULL,
    content LONGTEXT NOT NULL,
    featured_image VARCHAR(500) NULL,
    category VARCHAR(100) NULL,
    tags JSON NULL, -- Array of tags
    is_published BOOLEAN DEFAULT FALSE,
    published_at TIMESTAMP NULL,
    views_count INT DEFAULT 0,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

**Indexes:**
- PRIMARY KEY: `id`
- UNIQUE: `slug`
- INDEX: `is_published`
- INDEX: `published_at`
- INDEX: `created_at`

**Constraints:**
- `title` is required
- `content` is required
- `slug` must be unique
- `is_published` defaults to false
- `views_count` defaults to 0

### 4. contact_messages Table
Stores contact form submissions from visitors.

```sql
CREATE TABLE contact_messages (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NULL,
    message TEXT NOT NULL,
    phone VARCHAR(50) NULL,
    is_read BOOLEAN DEFAULT FALSE,
    is_replied BOOLEAN DEFAULT FALSE,
    replied_at TIMESTAMP NULL,
    ip_address VARCHAR(50) NULL,
    user_agent TEXT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

**Indexes:**
- PRIMARY KEY: `id`
- INDEX: `is_read`
- INDEX: `created_at`

**Constraints:**
- `name` is required
- `email` is required
- `message` is required
- `is_read` defaults to false
- `is_replied` defaults to false

## Relationships
The current schema uses a flat structure without foreign key relationships for simplicity, as per the requirements that this is not an e-commerce or complex system.

## Indexing Strategy
- Primary keys are indexed by default
- Slugs are indexed for fast lookups
- Status flags (is_active, is_published, is_read) are indexed for filtering
- Timestamps are indexed for sorting and filtering

## Data Types Rationale
- **BIGINT UNSIGNED**: For auto-incrementing IDs to handle large datasets
- **VARCHAR(255)**: Standard length for titles and short text fields
- **TEXT/LONGTEXT**: For longer content like descriptions and articles
- **JSON**: For flexible arrays (scope, tags) while maintaining relational benefits
- **BOOLEAN**: For status flags
- **TIMESTAMP**: For automatic created/updated timestamps

## Migration Files
The schema is implemented through Laravel migration files:
- `create_profiles_table.php`
- `create_services_table.php`
- `create_articles_table.php`
- `create_contact_messages_table.php`

## Seeders (Optional)
Sample data can be added through Laravel seeders:
- `ProfileSeeder`: Adds sample profile data
- `ServiceSeeder`: Adds sample services
- `ArticleSeeder`: Adds sample articles
- `ContactMessageSeeder`: Adds sample contact messages

## Security Considerations
- Input validation occurs at application level
- Sanitization of user inputs
- Protection against SQL injection through Eloquent ORM
- Proper escaping of output in views

## Performance Considerations
- Proper indexing for common queries
- JSON fields for flexible data without joins
- Efficient data types for storage optimization
- Consideration for future partitioning if needed

## Backup Strategy
- Regular automated backups
- Separate backups for media files
- Version control for schema changes through migrations