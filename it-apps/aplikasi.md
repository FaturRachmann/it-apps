# IT Support Service Website - Technical Documentation

## Daftar Isi
1. [Pendahuluan](#pendahuluan)
2. [Struktur Folder](#struktur-folder)
3. [Struktur Database](#struktur-database)
4. [Arsitektur Aplikasi](#arsitektur-aplikasi)
5. [Flow Proses](#flow-proses)
6. [Tech Stack](#tech-stack)
7. [API Endpoints](#api-endpoints)
8. [Deployment Guide](#deployment-guide)

---

## Pendahuluan

Dokumen ini adalah panduan teknis lengkap untuk membangun website layanan IT Support profesional. Website ini dirancang untuk:
- Mempromosikan jasa IT Support
- Memudahkan komunikasi dengan klien
- Memberikan informasi layanan yang jelas
- Membangun kredibilitas melalui artikel edukatif

**Catatan Penting**: Website ini **BUKAN** e-commerce atau marketplace. Tidak ada sistem pembayaran otomatis atau transaksi online.

---

## Struktur Folder

### Frontend (React/Next.js)

```
it-support-website/
│
├── public/
│   ├── images/
│   │   ├── logo/
│   │   ├── services/
│   │   ├── articles/
│   │   └── icons/
│   ├── favicon.ico
│   └── robots.txt
│
├── src/
│   ├── components/
│   │   ├── common/
│   │   │   ├── Header.jsx
│   │   │   ├── Footer.jsx
│   │   │   ├── Navigation.jsx
│   │   │   ├── Button.jsx
│   │   │   └── Card.jsx
│   │   │
│   │   ├── home/
│   │   │   ├── Hero.jsx
│   │   │   ├── ServicesPreview.jsx
│   │   │   ├── LatestArticles.jsx
│   │   │   └── CTASection.jsx
│   │   │
│   │   ├── about/
│   │   │   ├── ProfileSection.jsx
│   │   │   ├── SkillsSection.jsx
│   │   │   └── ExperienceTimeline.jsx
│   │   │
│   │   ├── services/
│   │   │   ├── ServiceCard.jsx
│   │   │   ├── ServiceGrid.jsx
│   │   │   └── ServiceDetail.jsx
│   │   │
│   │   ├── articles/
│   │   │   ├── ArticleCard.jsx
│   │   │   ├── ArticleList.jsx
│   │   │   └── ArticleDetail.jsx
│   │   │
│   │   └── contact/
│   │       ├── ContactForm.jsx
│   │       ├── ContactInfo.jsx
│   │       └── WhatsAppButton.jsx
│   │
│   ├── pages/
│   │   ├── index.jsx                 # Landing Page
│   │   ├── about.jsx                 # About Page
│   │   ├── services/
│   │   │   ├── index.jsx             # Services List
│   │   │   └── [slug].jsx            # Service Detail
│   │   ├── articles/
│   │   │   ├── index.jsx             # Articles List
│   │   │   └── [slug].jsx            # Article Detail
│   │   └── contact.jsx               # Contact Page
│   │
│   ├── styles/
│   │   ├── globals.css
│   │   ├── variables.css
│   │   └── components/
│   │       └── *.module.css
│   │
│   ├── utils/
│   │   ├── api.js                    # API call functions
│   │   ├── helpers.js                # Helper functions
│   │   └── validation.js             # Form validation
│   │
│   ├── hooks/
│   │   ├── useServices.js
│   │   ├── useArticles.js
│   │   └── useContact.js
│   │
│   └── config/
│       ├── constants.js
│       └── config.js
│
├── .env.local
├── .gitignore
├── package.json
├── next.config.js
└── README.md
```

### Backend (Node.js/Express)

```
backend/
│
├── src/
│   ├── config/
│   │   ├── database.js
│   │   ├── email.js
│   │   └── whatsapp.js
│   │
│   ├── models/
│   │   ├── Service.js
│   │   ├── Article.js
│   │   ├── Contact.js
│   │   └── Profile.js
│   │
│   ├── controllers/
│   │   ├── serviceController.js
│   │   ├── articleController.js
│   │   ├── contactController.js
│   │   └── profileController.js
│   │
│   ├── routes/
│   │   ├── services.js
│   │   ├── articles.js
│   │   ├── contact.js
│   │   └── profile.js
│   │
│   ├── middleware/
│   │   ├── auth.js                   # Admin authentication
│   │   ├── validation.js
│   │   ├── errorHandler.js
│   │   └── rateLimiter.js
│   │
│   ├── utils/
│   │   ├── emailService.js
│   │   ├── slugify.js
│   │   └── imageUpload.js
│   │
│   └── app.js
│
├── uploads/                           # Uploaded images
│   ├── services/
│   └── articles/
│
├── .env
├── .gitignore
├── package.json
└── server.js
```

### Admin Panel (Opsional - untuk manage konten)

```
admin/
│
├── src/
│   ├── components/
│   │   ├── Dashboard.jsx
│   │   ├── ServiceManager.jsx
│   │   ├── ArticleEditor.jsx
│   │   └── ContactInbox.jsx
│   │
│   ├── pages/
│   │   ├── login.jsx
│   │   ├── dashboard.jsx
│   │   ├── services.jsx
│   │   ├── articles.jsx
│   │   └── contacts.jsx
│   │
│   └── utils/
│       └── authUtils.js
│
└── package.json
```

---

## Struktur Database

### Database: PostgreSQL / MySQL / MongoDB

#### Opsi 1: SQL (PostgreSQL/MySQL)

```sql
-- Table: profiles
CREATE TABLE profiles (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    title VARCHAR(255),
    bio TEXT,
    photo_url VARCHAR(500),
    email VARCHAR(255),
    phone VARCHAR(50),
    whatsapp VARCHAR(50),
    linkedin_url VARCHAR(500),
    github_url VARCHAR(500),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: services
CREATE TABLE services (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    short_description TEXT,
    full_description TEXT,
    estimated_price VARCHAR(100),
    price_note TEXT,
    scope TEXT,
    icon_url VARCHAR(500),
    image_url VARCHAR(500),
    is_active BOOLEAN DEFAULT true,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: articles
CREATE TABLE articles (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    excerpt TEXT,
    content TEXT NOT NULL,
    featured_image VARCHAR(500),
    category VARCHAR(100),
    tags TEXT[],
    is_published BOOLEAN DEFAULT false,
    published_at TIMESTAMP,
    views_count INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: contact_messages
CREATE TABLE contact_messages (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255),
    message TEXT NOT NULL,
    phone VARCHAR(50),
    is_read BOOLEAN DEFAULT false,
    is_replied BOOLEAN DEFAULT false,
    replied_at TIMESTAMP,
    ip_address VARCHAR(50),
    user_agent TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: service_features (optional)
CREATE TABLE service_features (
    id SERIAL PRIMARY KEY,
    service_id INT REFERENCES services(id) ON DELETE CASCADE,
    feature_text VARCHAR(255) NOT NULL,
    display_order INT DEFAULT 0
);

-- Indexes for performance
CREATE INDEX idx_services_slug ON services(slug);
CREATE INDEX idx_services_active ON services(is_active);
CREATE INDEX idx_articles_slug ON articles(slug);
CREATE INDEX idx_articles_published ON articles(is_published, published_at);
CREATE INDEX idx_contact_created ON contact_messages(created_at);
```

#### Opsi 2: NoSQL (MongoDB)

```javascript
// Collection: profiles
{
  _id: ObjectId,
  name: String,
  title: String,
  bio: String,
  photoUrl: String,
  email: String,
  phone: String,
  whatsapp: String,
  socialLinks: {
    linkedin: String,
    github: String
  },
  skills: [String],
  experience: [{
    role: String,
    company: String,
    period: String,
    description: String
  }],
  createdAt: Date,
  updatedAt: Date
}

// Collection: services
{
  _id: ObjectId,
  title: String,
  slug: String, // unique index
  shortDescription: String,
  fullDescription: String,
  estimatedPrice: String,
  priceNote: String,
  scope: [String],
  features: [String],
  iconUrl: String,
  imageUrl: String,
  isActive: Boolean,
  displayOrder: Number,
  createdAt: Date,
  updatedAt: Date
}

// Collection: articles
{
  _id: ObjectId,
  title: String,
  slug: String, // unique index
  excerpt: String,
  content: String,
  featuredImage: String,
  category: String,
  tags: [String],
  isPublished: Boolean,
  publishedAt: Date,
  viewsCount: Number,
  readTime: Number, // estimated read time in minutes
  createdAt: Date,
  updatedAt: Date
}

// Collection: contactMessages
{
  _id: ObjectId,
  name: String,
  email: String,
  subject: String,
  message: String,
  phone: String,
  isRead: Boolean,
  isReplied: Boolean,
  repliedAt: Date,
  metadata: {
    ipAddress: String,
    userAgent: String
  },
  createdAt: Date
}
```

---

## Arsitektur Aplikasi

### Layer Architecture

```
┌─────────────────────────────────────────┐
│         FRONTEND (Client Side)          │
│   React/Next.js + Tailwind CSS          │
└─────────────────────────────────────────┘
                    │
                    │ HTTP/REST API
                    │
┌─────────────────────────────────────────┐
│          API LAYER (Backend)            │
│      Node.js + Express.js               │
│                                         │
│  ┌─────────────────────────────────┐   │
│  │  Routes → Controllers           │   │
│  │  Middleware → Validation        │   │
│  └─────────────────────────────────┘   │
└─────────────────────────────────────────┘
                    │
                    │ ORM/ODM
                    │
┌─────────────────────────────────────────┐
│       DATABASE LAYER                    │
│   PostgreSQL / MySQL / MongoDB          │
└─────────────────────────────────────────┘
                    │
┌─────────────────────────────────────────┐
│       EXTERNAL SERVICES                 │
│   - Email Service (SMTP/SendGrid)       │
│   - WhatsApp API (optional)             │
│   - Image Storage (S3/Cloudinary)       │
└─────────────────────────────────────────┘
```

### Component Communication Flow

```
User Interface (Pages)
        ↓
   Components
        ↓
   Custom Hooks
        ↓
   API Utils (fetch/axios)
        ↓
   Backend API
        ↓
   Controllers
        ↓
   Models/Database
```

---

## Flow Proses

### 1. User Flow - Melihat Layanan

```
┌──────────────┐
│  User akses  │
│ Landing Page │
└──────┬───────┘
       │
       ↓
┌──────────────────────┐
│ Lihat ringkasan      │
│ layanan di homepage  │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Klik "Lihat Layanan" │
│ atau menu Services   │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Tampil halaman       │
│ Services (grid)      │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Klik salah satu      │
│ service card         │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Tampil detail        │
│ layanan lengkap      │
│ - Deskripsi          │
│ - Scope              │
│ - Estimasi harga     │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ User klik CTA        │
│ "Hubungi Kami"       │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Redirect ke Contact  │
│ atau WhatsApp        │
└──────────────────────┘
```

### 2. Technical Flow - Get Services

```
Frontend Request
       │
       ↓
GET /api/services
       │
       ↓
┌──────────────────────┐
│ Backend Router       │
│ routes/services.js   │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Controller           │
│ serviceController.js │
│ - Validation         │
│ - Business logic     │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Model/Database       │
│ Service.find()       │
│ WHERE is_active=true │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Return JSON          │
│ [{service1},         │
│  {service2}, ...]    │
└──────┬───────────────┘
       │
       ↓
Frontend renders data
```

### 3. User Flow - Kirim Pesan Kontak

```
┌──────────────────────┐
│ User isi form kontak │
│ - Nama               │
│ - Email              │
│ - Subjek             │
│ - Pesan              │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Validasi frontend    │
│ (required fields)    │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Submit form          │
│ POST /api/contact    │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Backend validasi     │
│ - Email format       │
│ - Required fields    │
│ - Rate limiting      │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Simpan ke database   │
│ table: contact_msg   │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Kirim email notif    │
│ ke penyedia jasa     │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Return success       │
│ response to user     │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Tampilkan pesan      │
│ "Pesan terkirim!"    │
└──────────────────────┘
```

### 4. Technical Flow - Submit Contact Form

```javascript
// Frontend
const submitContact = async (formData) => {
  // 1. Validate
  if (!validateEmail(formData.email)) {
    return { error: 'Email tidak valid' }
  }
  
  // 2. Send to API
  const response = await fetch('/api/contact', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(formData)
  })
  
  // 3. Handle response
  return response.json()
}

// Backend - routes/contact.js
router.post('/', rateLimiter, validateContactForm, async (req, res) => {
  try {
    // 1. Extract data
    const { name, email, subject, message } = req.body
    
    // 2. Save to database
    const contact = await Contact.create({
      name,
      email,
      subject,
      message,
      ipAddress: req.ip,
      userAgent: req.headers['user-agent']
    })
    
    // 3. Send email notification
    await emailService.sendContactNotification({
      name,
      email,
      subject,
      message
    })
    
    // 4. Return success
    res.json({
      success: true,
      message: 'Pesan Anda telah terkirim'
    })
    
  } catch (error) {
    res.status(500).json({
      success: false,
      message: 'Terjadi kesalahan'
    })
  }
})
```

### 5. Admin Flow - Manage Content (Optional)

```
┌──────────────────────┐
│ Admin login          │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Verify credentials   │
│ Generate JWT token   │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Access dashboard     │
│ - Services list      │
│ - Articles list      │
│ - Contact messages   │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Pilih action:        │
│ - Create new         │
│ - Edit existing      │
│ - Delete             │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Submit changes       │
│ PUT/POST/DELETE API  │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Validate & Save      │
│ to database          │
└──────┬───────────────┘
       │
       ↓
┌──────────────────────┐
│ Update reflected     │
│ on public website    │
└──────────────────────┘
```

---

## Tech Stack

### Frontend
- **Framework**: Next.js 14+ (React 18+)
- **Styling**: Tailwind CSS
- **State Management**: React Context / Zustand (jika diperlukan)
- **Forms**: React Hook Form + Zod validation
- **HTTP Client**: Axios / Fetch API
- **Icons**: React Icons / Lucide Icons

### Backend
- **Runtime**: Node.js 18+
- **Framework**: Express.js
- **Database**: 
  - SQL: PostgreSQL dengan Prisma ORM
  - NoSQL: MongoDB dengan Mongoose
- **Authentication**: JWT (untuk admin)
- **Validation**: Joi / Express Validator
- **File Upload**: Multer + Cloudinary/S3
- **Email**: Nodemailer / SendGrid

### DevOps & Deployment
- **Version Control**: Git + GitHub
- **Hosting**: 
  - Frontend: Vercel / Netlify
  - Backend: Railway / Render / DigitalOcean
  - Database: Supabase / MongoDB Atlas / Railway
- **CI/CD**: GitHub Actions
- **Monitoring**: Sentry (error tracking)

---

## API Endpoints

### Public Endpoints (No Auth Required)

#### Services
```
GET    /api/services              # Get all active services
GET    /api/services/:slug        # Get single service detail
```

#### Articles
```
GET    /api/articles              # Get published articles (paginated)
GET    /api/articles/:slug        # Get single article
GET    /api/articles/latest       # Get latest 3 articles
POST   /api/articles/:slug/view   # Increment view count
```

#### Contact
```
POST   /api/contact               # Submit contact form
```

#### Profile
```
GET    /api/profile               # Get profile information
```

### Admin Endpoints (Auth Required)

#### Auth
```
POST   /api/admin/login           # Admin login
POST   /api/admin/logout          # Admin logout
GET    /api/admin/verify          # Verify JWT token
```

#### Services Management
```
GET    /api/admin/services        # Get all services (including inactive)
POST   /api/admin/services        # Create new service
PUT    /api/admin/services/:id    # Update service
DELETE /api/admin/services/:id    # Delete service
PATCH  /api/admin/services/:id/toggle  # Toggle active status
```

#### Articles Management
```
GET    /api/admin/articles        # Get all articles
POST   /api/admin/articles        # Create new article
PUT    /api/admin/articles/:id    # Update article
DELETE /api/admin/articles/:id    # Delete article
PATCH  /api/admin/articles/:id/publish  # Publish/unpublish
```

#### Contact Messages
```
GET    /api/admin/contacts        # Get all contact messages
GET    /api/admin/contacts/:id    # Get single message
PATCH  /api/admin/contacts/:id/read  # Mark as read
DELETE /api/admin/contacts/:id    # Delete message
```

### API Response Format

#### Success Response
```json
{
  "success": true,
  "data": { ... },
  "message": "Operation successful"
}
```

#### Error Response
```json
{
  "success": false,
  "error": {
    "code": "VALIDATION_ERROR",
    "message": "Invalid email format",
    "details": { ... }
  }
}
```

#### Paginated Response
```json
{
  "success": true,
  "data": [ ... ],
  "pagination": {
    "page": 1,
    "limit": 10,
    "total": 45,
    "totalPages": 5
  }
}
```

---

## Deployment Guide

### Environment Variables

#### Frontend (.env.local)
```bash
NEXT_PUBLIC_API_URL=https://api.yourdomain.com
NEXT_PUBLIC_WHATSAPP_NUMBER=628123456789
NEXT_PUBLIC_SITE_URL=https://yourdomain.com
```

#### Backend (.env)
```bash
# Server
PORT=5000
NODE_ENV=production
CLIENT_URL=https://yourdomain.com

# Database
DATABASE_URL=postgresql://user:password@host:5432/dbname
# or
MONGODB_URI=mongodb+srv://user:password@cluster.mongodb.net/dbname

# JWT
JWT_SECRET=your-super-secret-key-here
JWT_EXPIRE=7d

# Email
SMTP_HOST=smtp.gmail.com
SMTP_PORT=587
SMTP_USER=your-email@gmail.com
SMTP_PASS=your-app-password

# File Upload (Cloudinary)
CLOUDINARY_CLOUD_NAME=your-cloud-name
CLOUDINARY_API_KEY=your-api-key
CLOUDINARY_API_SECRET=your-api-secret

# Rate Limiting
RATE_LIMIT_WINDOW=15
RATE_LIMIT_MAX_REQUESTS=100
```

### Deployment Steps

#### 1. Frontend (Vercel)
```bash
# 1. Push ke GitHub
git add .
git commit -m "Ready for deployment"
git push origin main

# 2. Connect to Vercel
# - Import GitHub repository
# - Set environment variables
# - Deploy

# 3. Configure custom domain (optional)
```

#### 2. Backend (Railway/Render)
```bash
# 1. Prepare for deployment
# - Add Procfile (if needed)
# - Configure package.json scripts

# 2. Deploy to Railway/Render
# - Connect GitHub repository
# - Set environment variables
# - Deploy

# 3. Database
# - Setup PostgreSQL/MongoDB instance
# - Run migrations
# - Seed initial data (optional)
```

#### 3. Database Migration
```bash
# PostgreSQL with Prisma
npx prisma migrate deploy

# MongoDB (no migrations needed)
# Just ensure indexes are created
```

---

## Security Considerations

### 1. Rate Limiting
```javascript
// Prevent spam on contact form
const rateLimit = require('express-rate-limit')

const contactLimiter = rateLimit({
  windowMs: 15 * 60 * 1000, // 15 minutes
  max: 3, // 3 requests per window
  message: 'Terlalu banyak permintaan, coba lagi nanti'
})

router.post('/contact', contactLimiter, contactController.submit)
```

### 2. Input Validation
```javascript
// Validate all user inputs
const { body, validationResult } = require('express-validator')

const validateContact = [
  body('email').isEmail().normalizeEmail(),
  body('name').trim().isLength({ min: 2, max: 100 }),
  body('message').trim().isLength({ min: 10, max: 1000 }),
  (req, res, next) => {
    const errors = validationResult(req)
    if (!errors.isEmpty()) {
      return res.status(400).json({ errors: errors.array() })
    }
    next()
  }
]
```

### 3. CORS Configuration
```javascript
const cors = require('cors')

app.use(cors({
  origin: process.env.CLIENT_URL,
  credentials: true
}))
```

### 4. SQL Injection Prevention
- Use parameterized queries (ORM/Prepared statements)
- Never concatenate user input into SQL

### 5. XSS Prevention
- Sanitize HTML content in articles
- Use CSP headers
- Escape user-generated content

---

## Performance Optimization

### 1. Frontend
- Image optimization (Next.js Image component)
- Code splitting & lazy loading
- Static generation for pages that don't change often
- Caching strategies

### 2. Backend
- Database indexing on frequently queried fields
- Response compression (gzip)
- API response caching (Redis - optional)
- Query optimization

### 3. Database
```sql
-- Create indexes for better performance
CREATE INDEX idx_services_slug ON services(slug);
CREATE INDEX idx_articles_published ON articles(is_published, published_at DESC);
CREATE INDEX idx_contact_created ON contact_messages(created_at DESC);
```

---

## Monitoring & Maintenance

### 1. Error Tracking
- Setup Sentry for error monitoring
- Log important events
- Monitor API response times

### 2. Analytics (Optional)
- Google Analytics / Plausible
- Track page views
- Monitor user behavior

### 3. Backup Strategy
- Daily database backups
- Version control for code
- Image backup (if using local storage)

### 4. Updates
- Regular dependency updates
- Security patches
- Feature enhancements based on user feedback

---

## Testing Strategy

### 1. Frontend Testing
```javascript
// Component testing with Jest + React Testing Library
import { render, screen } from '@testing-library/react'
import ServiceCard from '@/components/services/ServiceCard'

test('renders service card with correct data', () => {
  const service = {
    title: 'Network Setup',
    description: 'Setup jaringan profesional',
    price: 'Rp 1.500.000'
  }
  
  render(<ServiceCard service={service} />)
  expect(screen.getByText('Network Setup')).toBeInTheDocument()
})
```

### 2. Backend Testing
```javascript
// API testing with Jest + Supertest
const request = require('supertest')
const app = require('../src/app')

describe('GET /api/services', () => {
  test('should return list of services', async () => {
    const response = await request(app)
      .get('/api/services')
      .expect(200)
    
    expect(response.body.success).toBe(true)
    expect(Array.isArray(response.body.data)).toBe(true)
  })
})
```

### 3. E2E Testing (Optional)
- Cypress or Playwright for end-to-end testing
- Test critical user flows

---

## Kesimpulan

Dokumen teknis ini memberikan panduan lengkap untuk membangun website IT Support Service yang:

✅ **Terstruktur dengan baik** - Folder dan arsitektur yang jelas  
✅ **Scalable** - Mudah dikembangkan di masa depan  
✅ **Secure** - Implementasi keamanan yang proper  
✅ **Performant** - Optimasi untuk kecepatan  
✅ **Maintainable** - Mudah di-maintain dan di-update  

**Prinsip utama:**
- Keep it simple
- Focus on user experience
- Build for real-world usage
- Professional and trustworthy

---

## Appendix: Sample Data

### Sample Service Data
```json
{
  "title": "Network Setup & Configuration",
  "slug": "network-setup-configuration",
  "shortDescription": "Setup dan konfigurasi jaringan komputer untuk kantor dan bisnis",
  "fullDescription": "Layanan lengkap setup jaringan komputer meliputi...",
  "estimatedPrice": "Rp 1.500.000 - Rp 5.000.000",
  "priceNote": "Harga tergantung skala dan kompleksitas jaringan",
  "scope": [
    "Survey lokasi dan kebutuhan",
    "Instalasi kabel jaringan",
    "Konfigurasi router dan switch",
    "Setup WiFi access point",
    "Testing dan dokumentasi"
  ],
  "features": [
    "Garansi 3 bulan",
    "Free konsultasi",
    "Dokumentasi lengkap"
  ],
  "isActive": true
}
```

### Sample Article Data
```json
{
  "title": "5 Tips Menjaga Keamanan Jaringan Kantor",
  "slug": "tips-keamanan-jaringan-kantor",
  "excerpt": "Panduan praktis untuk meningkatkan keamanan jaringan komputer di kantor Anda",
  "content": "# 5 Tips Menjaga Keamanan Jaringan Kantor\n\n## 1. Gunakan Password yang Kuat...",
  "category": "Keamanan IT",
  "tags": ["network security", "tips", "cybersecurity"],
  "isPublished": true,
  "publishedAt": "2026-01-30T10:00:00Z"
}
```

---

**Last Updated**: January 30, 2026  
**Version**: 1.0  
**Author**: IT Support Service Documentation Team