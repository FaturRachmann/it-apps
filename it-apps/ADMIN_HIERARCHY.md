# TechFix Admin Panel - Hierarki & Struktur Lengkap

## 📊 Struktur Admin Panel

```
Admin Panel (http://localhost:8000/admin)
│
├── 📊 Dashboard (/admin)
│   ├── Statistik Overview
│   │   ├── Total Services
│   │   ├── Active Services
│   │   ├── Published Articles
│   │   ├── Total Messages
│   │   └── Unread Messages
│   │
│   └── Quick Actions
│       ├── Manage Services
│       ├── Manage Articles
│       └── View Messages
│
├── 🛠️ Services Management (/admin/services)
│   ├── Index - List semua layanan
│   │   ├── Tabel services dengan:
│   │   │   ├── Icon
│   │   │   ├── Name
│   │   │   ├── Price
│   │   │   ├── Status (Active/Inactive)
│   │   │   └── Actions (Edit/Delete)
│   │   │
│   │   └── Button "Add New Service"
│   │
│   ├── Create (/admin/services/create)
│   │   ├── Form Fields:
│   │   │   ├── Name (required)
│   │   │   ├── Slug (auto-generated)
│   │   │   ├── Description (required)
│   │   │   ├── Price
│   │   │   ├── Icon SVG (optional)
│   │   │   ├── Display Order
│   │   │   └── Is Active (checkbox)
│   │   │
│   │   └── Submit Button
│   │
│   └── Edit (/admin/services/{id}/edit)
│       ├── Form sama seperti Create
│       └── Pre-filled dengan data existing
│
├── 📰 Articles Management (/admin/articles)
│   ├── Index - List semua artikel
│   │   ├── Tabel articles dengan:
│   │   │   ├── Title
│   │   │   ├── Category
│   │   │   ├── Published Date
│   │   │   ├── Status (Published/Draft)
│   │   │   └── Actions (Edit/Delete)
│   │   │
│   │   └── Button "Add New Article"
│   │
│   ├── Create (/admin/articles/create)
│   │   ├── Form Fields:
│   │   │   ├── Title (required)
│   │   │   ├── Slug (auto-generated)
│   │   │   ├── Excerpt (required)
│   │   │   ├── Content (required)
│   │   │   ├── Category
│   │   │   ├── Read Time
│   │   │   ├── Published At
│   │   │   └── Is Published (checkbox)
│   │   │
│   │   └── Submit Button
│   │
│   └── Edit (/admin/articles/{id}/edit)
│       ├── Form sama seperti Create
│       └── Pre-filled dengan data existing
│
└── 📩 Messages (/admin/messages)
    └── Index - List semua pesan
        ├── Tabel messages dengan:
        │   ├── Name
        │   ├── Email
        │   ├── Subject/Service
        │   ├── Date
        │   ├── Status (Read/Unread)
        │   └── Actions (Reply/Mark Read/Delete)
        │
        └── Highlight untuk unread messages (background biru)
```

## 🗄️ Database Models

### 1. Service Model
```php
Attributes:
- id
- title (string)
- slug (string, unique)
- short_description (text)
- full_description (text)
- estimated_price (string)
- price_note (text)
- scope (json)
- icon_url (string)
- icon_svg (text) - untuk custom SVG
- image_url (string)
- is_active (boolean)
- display_order (integer)
- timestamps
```

### 2. Article Model
```php
Attributes:
- id
- title (string)
- slug (string, unique)
- excerpt (text)
- content (text)
- featured_image (string)
- category (string)
- tags (json)
- is_published (boolean)
- published_at (datetime)
- views_count (integer)
- timestamps
```

### 3. ContactMessage Model
```php
Attributes:
- id
- name (string)
- email (string)
- phone (string)
- service (string)
- message (text)
- is_read (boolean)
- timestamps
```

### 4. User Model
```php
Attributes:
- id
- name (string)
- email (string, unique)
- email_verified_at (datetime)
- password (hashed)
- remember_token
- timestamps
```

## 🔐 Authentication

### Login Page: `/login`
- Email input
- Password input
- Remember me checkbox
- Forgot password link

### Default Credentials (Setelah Seed):
```
Admin:
Email: admin@techfix.com
Password: TechFix2024!

Demo User:
Email: user@techfix.com
Password: user123
```

## 🎨 Design System

### Colors
- Primary: Navy (#0a111a, #0f1a27, #162438)
- Accent: Blue (#2563eb, #3b82f6)
- Neutral: Gray (#f8fafc, #f1f5f9, #e2e8f0, #cbd5e1)

### Typography
- Font: Plus Jakarta Sans
- Weights: 400, 500, 600, 700, 800

### Layout
- Sidebar: Fixed 280px, Navy background
- Top Bar: Sticky, White background
- Content: Responsive grid system

## 📁 File Structure

```
resources/views/
├── components/
│   ├── admin-layout.blade.php    # Layout utama admin
│   ├── auth-session-status.blade.php
│   ├── guest-layout.blade.php    # Layout untuk login
│   ├── input-label.blade.php
│   ├── input-error.blade.php
│   ├── text-input.blade.php
│   ├── primary-button.blade.php
│   ├── service-card.blade.php
│   ├── article-card.blade.php
│   ├── header.blade.php          # Public header
│   └── footer.blade.php          # Public footer
│
├── admin/
│   ├── dashboard.blade.php
│   ├── services/
│   │   ├── index.blade.php
│   │   ├── create.blade.php
│   │   └── edit.blade.php
│   ├── articles/
│   │   ├── index.blade.php
│   │   ├── create.blade.php
│   │   └── edit.blade.php
│   └── messages/
│       └── index.blade.php
│
└── auth/
    └── login.blade.php
```

## 🛠️ Controllers

### Admin Controllers
```
app/Http/Controllers/Admin/
├── ServiceController.php    # CRUD Services
├── ArticleController.php    # CRUD Articles
└── MessageController.php    # View Messages
```

### Public Controllers
```
app/Http/Controllers/
├── PageController.php       # Public pages
├── ContactController.php    # Contact form
└── AdminController.php      # Admin dashboard
```

## 📋 Features Checklist

### ✅ Dashboard
- [x] Statistics overview
- [x] Quick action buttons
- [x] Responsive design

### ✅ Services Management
- [x] List all services
- [x] Create new service
- [x] Edit existing service
- [x] Delete service
- [x] Toggle active/inactive
- [x] Custom icon support
- [x] Display order

### ✅ Articles Management
- [x] List all articles
- [x] Create new article
- [x] Edit existing article
- [x] Delete article
- [x] Publish/draft toggle
- [x] Schedule publishing

### ✅ Messages
- [x] View all messages
- [x] Mark as read
- [x] Reply via email
- [x] Unread highlight

### 🔲 Future Enhancements (Optional)
- [ ] Export messages to CSV
- [ ] Bulk actions (delete multiple)
- [ ] Search & filter
- [ ] Pagination
- [ ] Rich text editor for articles
- [ ] Image upload for articles
- [ ] User roles & permissions
- [ ] Activity logs
- [ ] Settings page

## 🚀 Routes Summary

```php
// Public Routes
GET  /                    → Home Page
GET  /about              → About Page
GET  /services           → Services List
GET  /services/{slug}    → Service Detail
GET  /articles           → Articles List
GET  /articles/{slug}    → Article Detail
GET  /contact            → Contact Page
POST /contact            → Submit Contact Form

// Admin Routes (Protected)
GET  /admin              → Dashboard
GET  /admin/services     → Services List
GET  /admin/services/create  → Create Service Form
POST /admin/services     → Store Service
GET  /admin/services/{id}/edit → Edit Service Form
PUT  /admin/services/{id}      → Update Service
DELETE /admin/services/{id}    → Delete Service

GET  /admin/articles     → Articles List
GET  /admin/articles/create → Create Article Form
POST /admin/articles     → Store Article
GET  /admin/articles/{id}/edit → Edit Article Form
PUT  /admin/articles/{id}      → Update Article
DELETE /admin/articles/{id}    → Delete Article

GET  /admin/messages     → Messages List
POST /admin/messages/{id}/read → Mark as Read

// Auth Routes
GET  /login              → Login Page
POST /login              → Authenticate
POST /logout             → Logout
```

## 📊 Data Flow

```
User Input (Form)
    ↓
Controller Validation
    ↓
Model Operation (Create/Update/Delete)
    ↓
Database
    ↓
Return to View with Success Message
```

## 🔒 Security Features

- ✅ CSRF Protection
- ✅ Authentication Required for Admin Routes
- ✅ Password Hashing (bcrypt)
- ✅ Input Validation
- ✅ SQL Injection Prevention (Eloquent ORM)
- ✅ XSS Protection (Blade escaping)

## 📱 Responsive Design

- Desktop: Full sidebar + content layout
- Tablet: Collapsible sidebar
- Mobile: Hamburger menu (future enhancement)

## 🎯 Admin Capabilities

Admin dapat mengelola **100% konten website**:
1. ✅ Services - Tambah, Edit, Hapus layanan
2. ✅ Articles - Tambah, Edit, Hapus artikel
3. ✅ Messages - Lihat dan balas pesan dari contact form
4. ✅ Dashboard - Monitor statistik

**Tidak perlu coding** untuk update konten website!
