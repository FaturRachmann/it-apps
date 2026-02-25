# Backend Implementation Guide - IT Support Service Website

## Overview
This document outlines the backend architecture and implementation for the IT Support Service website using Laravel framework.

## Tech Stack
- **Framework**: Laravel 12.x
- **Language**: PHP 8.2+
- **Database**: MySQL
- **ORM**: Eloquent
- **Authentication**: Laravel Sanctum (for admin panel)
- **API**: RESTful API endpoints

## Backend Architecture

### 1. Models
The application uses the following models:

#### Profile Model
- Represents the IT support professional profile
- Fields: name, title, bio, photo_url, email, phone, whatsapp, linkedin_url, github_url
- Used for displaying about page information

#### Service Model
- Represents IT services offered
- Fields: title, slug, short_description, full_description, estimated_price, price_note, scope (JSON), icon_url, image_url, is_active, display_order
- Used for services page and detail pages

#### Article Model
- Represents blog articles and knowledge base
- Fields: title, slug, excerpt, content, featured_image, category, tags (JSON), is_published, published_at, views_count
- Used for articles page and detail pages

#### ContactMessage Model
- Stores contact form submissions
- Fields: name, email, subject, message, phone, is_read, is_replied, replied_at, ip_address, user_agent
- Used for admin contact management

### 2. Controllers
- **PageController**: Handles frontend page requests (home, about, services, articles, contact)
- **ContactController**: Handles contact form submissions
- **AdminController**: Handles admin panel functionality (optional)
- **ApiServiceController**: Handles API requests for services
- **ApiArticleController**: Handles API requests for articles

### 3. Routes
#### Public Routes
- `/` → Home page
- `/about` → About page
- `/services` → Services listing
- `/services/{slug}` → Service detail
- `/articles` → Articles listing
- `/articles/{slug}` → Article detail
- `/contact` → Contact page (GET) and form submission (POST)

#### Admin Routes (Optional)
- `/admin/login` → Admin login
- `/admin/dashboard` → Admin dashboard
- `/admin/services` → Manage services
- `/admin/articles` → Manage articles
- `/admin/messages` → View contact messages

### 4. Middleware
- **Auth Middleware**: For admin panel protection
- **Rate Limiting**: Prevent spam on contact form
- **Validation Middleware**: Validate incoming requests

### 5. Database Relationships
- Profile: One-to-many with other entities (if extended)
- Service: No direct relationships in basic version
- Article: No direct relationships in basic version
- ContactMessage: No direct relationships in basic version

### 6. Security Features
- CSRF protection for forms
- Input validation and sanitization
- Rate limiting for contact form
- Secure password hashing
- SQL injection prevention via Eloquent

### 7. Error Handling
- Custom error pages (404, 500)
- Form validation errors
- Exception logging
- User-friendly error messages

### 8. Performance Optimization
- Database indexing on key fields (slug, active status)
- Pagination for articles
- Caching for static content (optional)
- Optimized queries with eager loading

### 9. API Endpoints (Optional)
- GET /api/services - List active services
- GET /api/services/{slug} - Single service
- GET /api/articles - List published articles
- GET /api/articles/{slug} - Single article
- POST /api/contact - Submit contact form

### 10. Deployment Considerations
- Environment configuration
- Database migration scripts
- Asset compilation
- Security headers
- HTTPS enforcement