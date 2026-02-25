# Flowbite Integration Build Prompt - IT Support Service Website

## Project Context
Anda akan mengintegrasikan Flowbite (komponen UI berbasis Tailwind CSS) ke dalam website IT Support Service yang sudah ada. Website ini dibangun menggunakan Laravel dengan Blade templates dan Tailwind CSS. Tujuan integrasi adalah untuk meningkatkan kualitas UI/UX dengan komponen yang sudah teruji dan profesional.

## Technical Stack
- **Backend Framework**: Laravel 10+
- **Template Engine**: Laravel Blade
- **CSS Framework**: Tailwind CSS v4+
- **UI Component Library**: Flowbite v2+
- **JavaScript**: Vanilla JS dengan Flowbite JS
- **Build Tool**: Vite
- **Icons**: Heroicons atau Font Awesome

## Flowbite Setup & Installation

### 1. Installation Steps
```bash
# Install Flowbite via npm
npm install flowbite

# Install Flowbite as dev dependency (if needed)
npm install -D flowbite
```

### 2. Tailwind Configuration
Update `tailwind.config.js`:
```javascript
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          50: '#eff6ff',
          100: '#dbeafe',
          200: '#bfdbfe',
          300: '#93c5fd',
          400: '#60a5fa',
          500: '#3b82f6',
          600: '#2563eb',
          700: '#1d4ed8',
          800: '#1e40af',
          900: '#1e3a8a',
          950: '#172554',
        }
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
```

### 3. Import Flowbite JavaScript
Add to `resources/js/app.js`:
```javascript
import 'flowbite';
```

Or include via CDN in main layout (development only):
```html
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
```

## Component Implementation Guide

### 1. Navigation Component (Header)

**File**: `resources/views/components/header.blade.php`

**Requirements**:
- Responsive navbar dengan logo di kiri
- Menu items dengan dropdown support
- Mobile hamburger menu
- Sticky/fixed positioning
- Active state indicators
- Smooth transitions

**Flowbite Components to Use**:
- Navbar component dengan mega menu support
- Dropdown menu untuk submenu (jika ada)
- Mobile drawer/sidebar

**Design Specifications**:
- Background: White dengan shadow atau transparent dengan backdrop blur
- Height: 64px - 72px
- Logo: Max height 40px
- Primary CTA button di navbar (contoh: "Get Started" atau "Contact Us")
- Hover effects yang smooth

**Implementation Notes**:
```blade
<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <!-- Logo -->
    <!-- Navigation items -->
    <!-- Mobile toggle button -->
    <!-- Mobile menu -->
  </div>
</nav>
```

### 2. Hero Section (Homepage)

**File**: `resources/views/home/index.blade.php`

**Requirements**:
- Eye-catching headline dan subheadline
- Primary dan secondary CTA buttons
- Supporting image atau illustration
- Gradient background atau visual interest
- Responsive layout

**Flowbite Components to Use**:
- Hero section template
- Button groups
- Badge components (optional)

**Design Specifications**:
- Min height: 500px - 600px (mobile: 400px)
- Heading: text-4xl md:text-5xl lg:text-6xl font-bold
- CTA buttons: Primary (solid) dan Secondary (outline)
- Background: Gradient atau pattern dengan overlay

**Creative Direction**:
- Professional namun approachable
- Modern dan clean aesthetic
- Emphasis pada trust dan expertise
- Use subtle animations (fade in, slide up)

### 3. Service Cards Component

**File**: `resources/views/components/service-card.blade.php`

**Requirements**:
- Grid layout (3 columns desktop, 1 column mobile)
- Icon atau image di atas
- Service title dan description
- "Learn More" link atau button
- Hover effects

**Flowbite Components to Use**:
- Card component dengan hover effects
- Button atau link components
- Icon integration

**Design Specifications**:
- Card: White background, border atau shadow
- Padding: p-6
- Icon/Image: 48px - 64px
- Title: text-xl font-semibold
- Description: text-gray-600, 2-3 lines max
- Hover: Lift effect dengan shadow increase

**Props Required**:
```blade
@props([
    'title',
    'description',
    'icon' => null,
    'image' => null,
    'link' => '#'
])
```

### 4. Article/Blog Cards Component

**File**: `resources/views/components/article-card.blade.php`

**Requirements**:
- Featured image dengan aspect ratio 16:9
- Category badge/tag
- Title dan excerpt
- Author, date metadata
- Read more link

**Flowbite Components to Use**:
- Card component
- Badge component untuk categories
- Avatar component untuk author (optional)

**Design Specifications**:
- Image: Aspect ratio 16:9, object-cover
- Badge: Small, colored berdasarkan category
- Title: text-lg md:text-xl font-bold, 2 line clamp
- Excerpt: text-gray-600, 3 line clamp
- Metadata: text-sm text-gray-500

### 5. Contact Form Component

**File**: `resources/views/components/contact-form.blade.php`

**Requirements**:
- Fields: Name, Email, Phone, Subject, Message
- Validation states (error, success)
- Submit button dengan loading state
- Accessible form labels
- Help text untuk guidance

**Flowbite Components to Use**:
- Form input components
- Textarea component
- Button component
- Alert components untuk feedback
- Helper text components

**Design Specifications**:
- Input height: 44px minimum (touch-friendly)
- Spacing: mb-5 between fields
- Labels: font-medium mb-2
- Error states: Red border dan error message
- Success feedback: Green alert box

**Validation States**:
```blade
<input 
  type="email" 
  class="@error('email') border-red-500 @enderror"
>
@error('email')
  <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
@enderror
```

### 6. Footer Component

**File**: `resources/views/components/footer.blade.php`

**Requirements**:
- Multi-column layout (4 columns desktop, stacked mobile)
- Logo dan company description
- Quick links sections
- Contact information
- Social media icons
- Copyright notice

**Flowbite Components to Use**:
- Footer component
- Footer link groups
- Social media icon buttons

**Design Specifications**:
- Background: Dark (gray-800 atau gray-900)
- Text: Light colors (gray-300, gray-400)
- Links: Hover state dengan color change
- Sections: Company Info, Quick Links, Services, Contact
- Spacing: py-8 md:py-12

### 7. Services Grid Layout

**File**: `resources/views/services/index.blade.php`

**Requirements**:
- Grid of service cards
- Filter/category options (optional)
- Search functionality (optional)
- Consistent spacing

**Flowbite Components to Use**:
- Grid system dengan cards
- Search input (optional)
- Tabs atau pills untuk filtering (optional)

**Design Specifications**:
- Grid: grid-cols-1 md:grid-cols-2 lg:grid-cols-3
- Gap: gap-6 md:gap-8
- Container: max-w-7xl mx-auto px-4 sm:px-6 lg:px-8

### 8. Service Detail Page

**File**: `resources/views/services/show.blade.php`

**Requirements**:
- Breadcrumb navigation
- Service header dengan title dan description
- Feature list atau benefits
- Pricing information (optional)
- CTA section
- Related services (optional)

**Flowbite Components to Use**:
- Breadcrumb component
- List group untuk features
- Pricing card (optional)
- Alert box untuk special notices

**Design Specifications**:
- Max width: max-w-4xl untuk content
- Section spacing: space-y-8 md:space-y-12
- Features: Checkmark icons dengan green color
- Pricing: Clear highlight untuk recommended plan

### 9. Articles Grid & Pagination

**File**: `resources/views/articles/index.blade.php`

**Requirements**:
- Grid of article cards
- Category filter
- Search bar
- Pagination controls
- Sort options (optional)

**Flowbite Components to Use**:
- Card grid
- Search input
- Pagination component
- Dropdown untuk sorting

**Design Specifications**:
- Grid: grid-cols-1 md:grid-cols-2 lg:grid-cols-3
- Pagination: Centered, dengan prev/next
- Search: Full width pada mobile, fixed width pada desktop

### 10. Article Detail Page

**File**: `resources/views/articles/show.blade.php`

**Requirements**:
- Featured image
- Article metadata (author, date, category, reading time)
- Rich content formatting
- Table of contents (optional)
- Share buttons (optional)
- Related articles section
- Comments section (optional)

**Flowbite Components to Use**:
- Breadcrumb
- Badge untuk categories
- Timeline untuk metadata
- Button group untuk sharing
- Card untuk related articles

**Design Specifications**:
- Content width: max-w-3xl
- Typography: Readable font sizes (text-base md:text-lg)
- Line height: leading-relaxed
- Images: Full width dengan captions
- Code blocks: With syntax highlighting (if applicable)

### 11. Modal Components

**Common Use Cases**:
- Image lightbox
- Video player
- Form popups
- Confirmation dialogs
- Success messages

**Flowbite Components to Use**:
- Modal component
- Modal header, body, footer

**Implementation**:
```blade
<!-- Modal toggle button -->
<button data-modal-target="default-modal" data-modal-toggle="default-modal">
  Open Modal
</button>

<!-- Modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden ...">
  <!-- Modal content -->
</div>
```

### 12. Accordion Component (FAQ Section)

**File**: `resources/views/components/faq-accordion.blade.php`

**Requirements**:
- Question and answer format
- Smooth expand/collapse animation
- Single or multiple open items
- Icons untuk open/close state

**Flowbite Components to Use**:
- Accordion component

**Design Specifications**:
- Border between items
- Padding: p-5
- Icon: Chevron atau plus/minus
- Background change on hover

### 13. Alert/Toast Components

**Use Cases**:
- Form submission feedback
- System notifications
- Important announcements
- Error messages

**Flowbite Components to Use**:
- Alert component (inline)
- Toast component (floating)

**Design Specifications**:
- Types: Success, Error, Warning, Info
- Icons: Appropriate untuk tiap type
- Dismissible: Close button
- Position: Toast di top-right atau bottom-right

### 14. Loading States

**Requirements**:
- Skeleton loaders untuk cards
- Spinner untuk buttons
- Progress bars (optional)
- Shimmer effects

**Flowbite Components to Use**:
- Spinner component
- Skeleton component
- Progress bar component

**Implementation**:
- Show during data fetching
- Form submission states
- Page transitions

### 15. Dropdown Menus

**Use Cases**:
- User profile menu
- Language selector
- Filter options
- Action menus

**Flowbite Components to Use**:
- Dropdown component
- Dropdown header, divider, item

**Design Specifications**:
- Shadow: shadow-lg
- Border radius: rounded-lg
- Min width: min-w-44
- Max height dengan scroll jika banyak items

## Design System Integration

### Color Palette dengan Flowbite
```javascript
// Use Flowbite color system
primary: colors.blue,
secondary: colors.indigo,
success: colors.green,
danger: colors.red,
warning: colors.yellow,
info: colors.cyan,
```

### Typography Scale
- **Display**: text-4xl - text-6xl (Headings utama)
- **Heading**: text-2xl - text-3xl (Section headers)
- **Subheading**: text-xl (Card titles)
- **Body**: text-base (Content)
- **Small**: text-sm (Metadata, captions)
- **Tiny**: text-xs (Helper text)

### Spacing System
Gunakan Tailwind spacing scale dengan konsistensi:
- **Section spacing**: py-12 md:py-16 lg:py-20
- **Container padding**: px-4 sm:px-6 lg:px-8
- **Card padding**: p-6
- **Element gaps**: gap-4, gap-6, gap-8

### Responsive Breakpoints
- **Mobile**: < 640px (sm)
- **Tablet**: 640px - 1024px (md, lg)
- **Desktop**: > 1024px (xl, 2xl)

## Animation & Interaction Guidelines

### Micro-interactions
- Button hover: transform, shadow, color transitions
- Card hover: lift effect (translateY -2px, shadow increase)
- Link hover: color change dengan underline animation
- Input focus: border color, ring effect

### Page Transitions
- Fade in: opacity 0 to 1
- Slide up: translateY(20px) to 0
- Stagger animations untuk card grids
- Duration: 300ms - 500ms

### Flowbite JavaScript Interactions
- Modal open/close
- Dropdown toggle
- Accordion expand/collapse
- Tab switching
- Carousel navigation
- Toast notifications

## Accessibility Requirements

### ARIA Labels
- Proper button labels
- Form field associations
- Navigation landmarks
- Screen reader announcements

### Keyboard Navigation
- Tab order yang logical
- Focus visible indicators
- Keyboard shortcuts untuk modal (ESC to close)
- Skip to content link

### Color Contrast
- Minimum 4.5:1 untuk body text
- Minimum 3:1 untuk large text
- Avoid color-only indicators

### Semantic HTML
- Proper heading hierarchy (h1 -> h6)
- Lists untuk navigation
- Form elements dengan labels
- Button vs link usage

## Performance Optimization

### Asset Loading
- Lazy load images
- Defer non-critical JavaScript
- Minimize Flowbite bundle (tree-shaking)
- Use Vite build optimization

### CSS Optimization
- PurgeCSS untuk unused styles
- Critical CSS inline (optional)
- Minimize custom CSS

### JavaScript Optimization
- Import only needed Flowbite components
- Async/defer script loading
- Event delegation

## Browser Compatibility
- Modern browsers (Chrome, Firefox, Safari, Edge)
- Mobile browsers (iOS Safari, Chrome Mobile)
- Graceful degradation untuk older browsers
- Flowbite sudah handle vendor prefixes

## Testing Checklist

### Functional Testing
- [ ] All forms submit correctly
- [ ] Validation works properly
- [ ] Modals open/close smoothly
- [ ] Dropdowns toggle correctly
- [ ] Navigation works on all pages
- [ ] Links go to correct destinations
- [ ] Responsive menu functions on mobile

### Visual Testing
- [ ] Components render correctly on all screen sizes
- [ ] Images load and display properly
- [ ] Typography hierarchy is clear
- [ ] Colors are consistent
- [ ] Spacing is uniform
- [ ] Animations are smooth
- [ ] No layout shifts (CLS)

### Accessibility Testing
- [ ] Keyboard navigation works
- [ ] Screen reader compatibility
- [ ] Color contrast passes WCAG AA
- [ ] Focus indicators visible
- [ ] ARIA labels present
- [ ] Form errors announced

### Performance Testing
- [ ] Page load time < 3 seconds
- [ ] First Contentful Paint < 1.5s
- [ ] Time to Interactive < 3.5s
- [ ] No console errors
- [ ] Images optimized

### Cross-browser Testing
- [ ] Chrome (latest)
- [ ] Firefox (latest)
- [ ] Safari (latest)
- [ ] Edge (latest)
- [ ] Mobile Safari (iOS)
- [ ] Chrome Mobile (Android)

## File Structure

```
resources/
├── views/
│   ├── layouts/
│   │   └── app.blade.php (Main layout dengan Flowbite)
│   ├── components/
│   │   ├── header.blade.php
│   │   ├── footer.blade.php
│   │   ├── service-card.blade.php
│   │   ├── article-card.blade.php
│   │   ├── contact-form.blade.php
│   │   ├── faq-accordion.blade.php
│   │   └── ...
│   ├── home/
│   │   └── index.blade.php
│   ├── about/
│   │   └── index.blade.php
│   ├── services/
│   │   ├── index.blade.php
│   │   └── show.blade.php
│   ├── articles/
│   │   ├── index.blade.php
│   │   └── show.blade.php
│   └── contact/
│       └── index.blade.php
├── css/
│   └── app.css (Tailwind imports)
└── js/
    └── app.js (Flowbite import)
```

## Main Layout Template

**File**: `resources/views/layouts/app.blade.php`

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'IT Support Service') }} - @yield('title')</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'Professional IT Support Services')">
    <meta name="keywords" content="@yield('keywords', 'IT support, technical support, computer repair')">
    
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og_title', config('app.name'))">
    <meta property="og:description" content="@yield('og_description', 'Professional IT Support Services')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body class="antialiased bg-gray-50">
    <!-- Header -->
    <x-header />
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    <x-footer />
    
    <!-- Scripts -->
    @stack('scripts')
</body>
</html>
```

## Implementation Steps

### Phase 1: Setup & Configuration (Day 1)
1. Install Flowbite dependencies
2. Configure Tailwind with Flowbite plugin
3. Setup Vite build configuration
4. Test installation dengan simple component

### Phase 2: Core Components (Day 2-3)
1. Create main layout with Flowbite navbar
2. Implement header component
3. Implement footer component
4. Create reusable card components

### Phase 3: Page Implementation (Day 4-6)
1. Build homepage dengan hero section
2. Implement services pages
3. Implement articles pages
4. Create contact page dengan form

### Phase 4: Interactive Components (Day 7)
1. Add modals
2. Implement dropdowns
3. Add accordions (FAQ)
4. Setup toast notifications

### Phase 5: Testing & Refinement (Day 8-9)
1. Cross-browser testing
2. Responsive testing
3. Accessibility testing
4. Performance optimization

### Phase 6: Documentation & Handoff (Day 10)
1. Document component usage
2. Create style guide
3. Write deployment notes
4. Final review

## Common Pitfalls to Avoid

1. **Over-customization**: Jangan override terlalu banyak Flowbite styles, gunakan theme configuration
2. **JavaScript conflicts**: Pastikan tidak ada conflict antara Flowbite JS dengan script lain
3. **Accessibility**: Jangan lupa aria labels dan keyboard navigation
4. **Mobile-first**: Test di mobile device sejak awal, bukan di akhir
5. **Performance**: Monitor bundle size, gunakan tree-shaking
6. **Consistency**: Gunakan component yang sama untuk pattern yang sama
7. **Dark mode**: Jika implement dark mode, test semua components
8. **Form validation**: Ensure client-side dan server-side validation match

## Resources & Documentation

- **Flowbite Official**: https://flowbite.com/
- **Flowbite Components**: https://flowbite.com/docs/components/
- **Tailwind CSS**: https://tailwindcss.com/docs
- **Laravel Blade**: https://laravel.com/docs/blade
- **Accessibility**: https://www.w3.org/WAI/WCAG21/quickref/

## Success Criteria

Website dianggap berhasil jika:
- ✅ Semua halaman responsive pada semua device sizes
- ✅ Loading time < 3 detik pada koneksi 3G
- ✅ WCAG 2.1 Level AA compliance
- ✅ No console errors atau warnings
- ✅ Smooth animations tanpa janky motion
- ✅ Forms berfungsi dengan proper validation
- ✅ Cross-browser compatibility terpenuhi
- ✅ Professional, modern aesthetic yang konsisten

---

**Note**: Dokumen ini adalah panduan implementasi. Sesuaikan dengan kebutuhan spesifik project dan feedback dari stakeholder. Prioritaskan user experience dan accessibility di atas visual complexity.