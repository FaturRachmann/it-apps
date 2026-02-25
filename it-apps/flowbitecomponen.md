# Flowbite Components - Complete Implementation Guide
## IT Support Service Website - Laravel Blade

---

## 📋 Table of Contents
1. [Setup & Installation](#setup--installation)
2. [Main Layout](#main-layout)
3. [Header/Navigation Component](#headernavigation-component)
4. [Hero Section](#hero-section)
5. [Service Cards Component](#service-cards-component)
6. [Article Cards Component](#article-cards-component)
7. [Contact Form Component](#contact-form-component)
8. [Footer Component](#footer-component)
9. [FAQ Accordion Component](#faq-accordion-component)
10. [Statistics Section](#statistics-section)
11. [Testimonials Section](#testimonials-section)
12. [Modal Component](#modal-component)
13. [Alert/Toast Component](#alerttoast-component)

---

## Setup & Installation

### Step 1: Install Flowbite
```bash
npm install flowbite
```

### Step 2: Update `tailwind.config.js`
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
      },
      fontFamily: {
        'sans': ['Figtree', 'ui-sans-serif', 'system-ui'],
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
```

### Step 3: Update `resources/js/app.js`
```javascript
import './bootstrap';
import 'flowbite';

// Initialize Flowbite components on page load
document.addEventListener('DOMContentLoaded', function() {
    // Flowbite will auto-initialize
});
```

### Step 4: Update `resources/css/app.css`
```css
@tailwind base;
@tailwind components;
@tailwind utilities;

/* Custom styles */
@layer components {
    .btn-primary {
        @apply text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none transition-colors duration-200;
    }
    
    .btn-secondary {
        @apply text-primary-600 bg-white border border-primary-600 hover:bg-primary-50 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none transition-colors duration-200;
    }
}
```

### Step 5: Build Assets
```bash
npm run dev
# atau untuk production
npm run build
```

---

## Main Layout

**File**: `resources/views/layouts/app.blade.php`

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'IT Support Service') - Professional IT Solutions</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'Professional IT Support Services for businesses of all sizes. 24/7 support, cloud solutions, and network security.')">
    <meta name="keywords" content="@yield('keywords', 'IT support, technical support, network security, cloud solutions')">
    
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og_title', 'IT Support Service')">
    <meta property="og:description" content="@yield('og_description', 'Professional IT Support Services')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">
    <meta property="og:type" content="website">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body class="antialiased bg-gray-50">
    <!-- Header -->
    <x-header />
    
    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>
    
    <!-- Footer -->
    <x-footer />
    
    <!-- Back to Top Button -->
    <button id="back-to-top" class="hidden fixed bottom-8 right-8 z-50 p-3 bg-primary-600 text-white rounded-full shadow-lg hover:bg-primary-700 transition-all duration-300">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>
    
    <!-- Scripts -->
    @stack('scripts')
    
    <script>
        // Back to top button functionality
        const backToTopButton = document.getElementById('back-to-top');
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('hidden');
            } else {
                backToTopButton.classList.add('hidden');
            }
        });
        
        backToTopButton.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>
```

---

## Header/Navigation Component

**File**: `resources/views/components/header.blade.php`

```blade
<nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/logo.png') }}" class="h-8" alt="IT Support Logo" />
            <span class="self-center text-2xl font-bold whitespace-nowrap text-gray-900">IT Support</span>
        </a>
        
        <!-- Right side buttons -->
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <a href="{{ route('contact') }}" class="hidden md:block text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-colors duration-200">
                Get Started
            </a>
            
            <!-- Mobile menu button -->
            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        
        <!-- Navigation Links -->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="{{ route('home') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary-600 md:p-0 {{ request()->routeIs('home') ? 'text-primary-600' : '' }}" aria-current="page">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary-600 md:p-0 {{ request()->routeIs('about') ? 'text-primary-600' : '' }}">
                        About
                    </a>
                </li>
                <li>
                    <a href="{{ route('services.index') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary-600 md:p-0 {{ request()->routeIs('services.*') ? 'text-primary-600' : '' }}">
                        Services
                    </a>
                </li>
                <li>
                    <a href="{{ route('articles.index') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary-600 md:p-0 {{ request()->routeIs('articles.*') ? 'text-primary-600' : '' }}">
                        Articles
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary-600 md:p-0 {{ request()->routeIs('contact') ? 'text-primary-600' : '' }}">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
```

---

## Hero Section

**File**: `resources/views/home/partials/hero.blade.php`

```blade
<section class="bg-gradient-to-br from-primary-50 to-indigo-50">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
        <!-- Badge -->
        <span class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-primary-700 bg-primary-100 rounded-full hover:bg-primary-200 transition-colors duration-200">
            <span class="text-xs bg-primary-600 rounded-full text-white px-4 py-1.5 mr-3">New</span>
            <span class="text-sm font-medium">24/7 Support Service Now Available</span> 
            <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
        </span>
        
        <!-- Main Heading -->
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">
            Reliable IT Support Services
        </h1>
        
        <!-- Subheading -->
        <p class="mb-8 text-lg font-normal text-gray-600 lg:text-xl sm:px-16 xl:px-48">
            We provide comprehensive IT solutions to keep your business running smoothly. Our expert team offers 24/7 support, system maintenance, and cutting-edge technology solutions.
        </p>
        
        <!-- CTA Buttons -->
        <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
            <a href="{{ route('contact') }}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-300 transition-all duration-200">
                Get Started
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
            <a href="{{ route('services.index') }}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 transition-all duration-200">
                <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                </svg>
                View Services
            </a>
        </div>
        
        <!-- Trust Indicators -->
        <div class="px-4 mx-auto text-center md:max-w-screen-md lg:max-w-screen-lg lg:px-36">
            <span class="font-semibold text-gray-500 uppercase">TRUSTED BY LEADING COMPANIES</span>
            <div class="flex flex-wrap justify-center items-center mt-8 text-gray-500 sm:justify-between">
                <div class="mr-5 mb-5 lg:mb-0 hover:text-gray-800">
                    <span class="text-2xl font-bold">250+</span>
                    <p class="text-sm">Happy Clients</p>
                </div>
                <div class="mr-5 mb-5 lg:mb-0 hover:text-gray-800">
                    <span class="text-2xl font-bold">10+</span>
                    <p class="text-sm">Years Experience</p>
                </div>
                <div class="mr-5 mb-5 lg:mb-0 hover:text-gray-800">
                    <span class="text-2xl font-bold">500+</span>
                    <p class="text-sm">Projects Done</p>
                </div>
                <div class="mb-5 lg:mb-0 hover:text-gray-800">
                    <span class="text-2xl font-bold">24/7</span>
                    <p class="text-sm">Support</p>
                </div>
            </div>
        </div>
    </div>
</section>
```

---

## Service Cards Component

**File**: `resources/views/components/service-card.blade.php`

```blade
@props([
    'title' => 'Service Title',
    'description' => 'Service description goes here',
    'icon' => 'shield',
    'link' => '#'
])

<div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
    <!-- Icon -->
    <div class="flex justify-center items-center mb-4 w-14 h-14 rounded-lg bg-primary-100">
        @if($icon === 'shield')
            <svg class="w-8 h-8 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"></path>
            </svg>
        @elseif($icon === 'cloud')
            <svg class="w-8 h-8 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                <path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z"></path>
            </svg>
        @elseif($icon === 'support')
            <svg class="w-8 h-8 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path>
            </svg>
        @else
            <svg class="w-8 h-8 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path>
            </svg>
        @endif
    </div>
    
    <!-- Title -->
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
        {{ $title }}
    </h5>
    
    <!-- Description -->
    <p class="mb-3 font-normal text-gray-700 line-clamp-3">
        {{ $description }}
    </p>
    
    <!-- Learn More Link -->
    <a href="{{ $link }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary-600 rounded-lg hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 transition-colors duration-200">
        Learn more
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ml-2" aria-hidden="true" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
    </a>
</div>
```

**Usage Example**:
```blade
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <x-service-card 
        title="Network Security"
        description="Protect your business from cyber threats with our comprehensive security solutions."
        icon="shield"
        link="{{ route('services.show', 'network-security') }}"
    />
    
    <x-service-card 
        title="Cloud Solutions"
        description="Migrate to the cloud with our secure and scalable cloud infrastructure services."
        icon="cloud"
        link="{{ route('services.show', 'cloud-solutions') }}"
    />
    
    <x-service-card 
        title="24/7 Support"
        description="24/7 technical support for all your IT infrastructure needs."
        icon="support"
        link="{{ route('services.show', 'technical-support') }}"
    />
</div>
```

---

## Article Cards Component

**File**: `resources/views/components/article-card.blade.php`

```blade
@props([
    'title' => 'Article Title',
    'excerpt' => 'Article excerpt goes here...',
    'image' => null,
    'category' => 'Uncategorized',
    'author' => 'Admin',
    'date' => now()->format('M d, Y'),
    'readTime' => '5 min read',
    'link' => '#'
])

<article class="bg-white border border-gray-200 rounded-lg shadow hover:shadow-xl transition-all duration-300 overflow-hidden group">
    <!-- Image -->
    <a href="{{ $link }}">
        <img class="rounded-t-lg w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" 
             src="{{ $image ?? 'https://via.placeholder.com/400x300' }}" 
             alt="{{ $title }}" />
    </a>
    
    <div class="p-5">
        <!-- Category Badge -->
        <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mb-2">
            <svg class="w-2.5 h-2.5 mr-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
            </svg>
            {{ $category }}
        </span>
        
        <!-- Title -->
        <a href="{{ $link }}">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 line-clamp-2 group-hover:text-primary-600 transition-colors duration-200">
                {{ $title }}
            </h5>
        </a>
        
        <!-- Excerpt -->
        <p class="mb-3 font-normal text-gray-700 line-clamp-3">
            {{ $excerpt }}
        </p>
        
        <!-- Meta Info -->
        <div class="flex items-center justify-between pt-3 border-t border-gray-200">
            <div class="flex items-center space-x-4">
                <div class="flex items-center">
                    <svg class="w-4 h-4 text-gray-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-sm text-gray-500">{{ $author }}</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-4 h-4 text-gray-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-sm text-gray-500">{{ $date }}</span>
                </div>
            </div>
            <span class="text-xs text-gray-500">{{ $readTime }}</span>
        </div>
        
        <!-- Read More Link -->
        <a href="{{ $link }}" class="inline-flex items-center mt-3 text-sm font-medium text-primary-600 hover:text-primary-700 group-hover:underline">
            Read article
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ml-1 group-hover:translate-x-1 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>
</article>
```

**Usage Example**:
```blade
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($articles as $article)
        <x-article-card 
            title="{{ $article->title }}"
            excerpt="{{ $article->excerpt }}"
            image="{{ $article->image }}"
            category="{{ $article->category->name }}"
            author="{{ $article->author->name }}"
            date="{{ $article->published_at->format('M d, Y') }}"
            readTime="{{ $article->read_time }} min read"
            link="{{ route('articles.show', $article->slug) }}"
        />
    @endforeach
</div>
```

---

## Contact Form Component

**File**: `resources/views/components/contact-form.blade.php`

```blade
<div class="bg-white border border-gray-200 rounded-lg shadow-lg p-6 md:p-8">
    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900">
        Contact Us
    </h2>
    <p class="mb-8 font-light text-gray-600 sm:text-lg">
        Got a technical issue? Want to send feedback? Need details about our services? Let us know.
    </p>
    
    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Name Field -->
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                Your Name <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   id="name" 
                   name="name" 
                   value="{{ old('name') }}"
                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 @error('name') border-red-500 @enderror" 
                   placeholder="John Doe" 
                   required>
            @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Email Field -->
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                Your Email <span class="text-red-500">*</span>
            </label>
            <input type="email" 
                   id="email" 
                   name="email" 
                   value="{{ old('email') }}"
                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 @error('email') border-red-500 @enderror" 
                   placeholder="name@company.com" 
                   required>
            @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Phone Field -->
        <div>
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">
                Phone Number
            </label>
            <input type="tel" 
                   id="phone" 
                   name="phone" 
                   value="{{ old('phone') }}"
                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 @error('phone') border-red-500 @enderror" 
                   placeholder="+62 812-3456-7890">
            @error('phone')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Subject Field -->
        <div>
            <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">
                Subject <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   id="subject" 
                   name="subject" 
                   value="{{ old('subject') }}"
                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 @error('subject') border-red-500 @enderror" 
                   placeholder="Let us know how we can help you" 
                   required>
            @error('subject')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Message Field -->
        <div class="sm:col-span-2">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900">
                Your Message <span class="text-red-500">*</span>
            </label>
            <textarea id="message" 
                      name="message" 
                      rows="6" 
                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 @error('message') border-red-500 @enderror" 
                      placeholder="Leave a comment..." 
                      required>{{ old('message') }}</textarea>
            @error('message')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
            <p class="mt-2 text-xs text-gray-500">
                Please provide as much detail as possible so we can help you better.
            </p>
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="w-full sm:w-auto py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 transition-colors duration-200">
            Send message
        </button>
    </form>
</div>
```

---

## Footer Component

**File**: `resources/views/components/footer.blade.php`

```blade
<footer class="bg-gray-800">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
            <!-- Company Info -->
            <div class="mb-6 md:mb-0">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('images/logo-white.png') }}" class="h-8 mr-3" alt="IT Support Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">IT Support</span>
                </a>
                <p class="mt-4 text-gray-400 max-w-sm">
                    Providing reliable IT support services to businesses and individuals since 2020. 
                    Your technology partner for growth and success.
                </p>
            </div>
            
            <!-- Links Grid -->
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                <!-- Company Links -->
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-white uppercase">Company</h2>
                    <ul class="text-gray-400 font-medium space-y-4">
                        <li>
                            <a href="{{ route('about') }}" class="hover:text-white transition-colors duration-200">About Us</a>
                        </li>
                        <li>
                            <a href="{{ route('services.index') }}" class="hover:text-white transition-colors duration-200">Services</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="hover:text-white transition-colors duration-200">Contact</a>
                        </li>
                    </ul>
                </div>
                
                <!-- Resources Links -->
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-white uppercase">Resources</h2>
                    <ul class="text-gray-400 font-medium space-y-4">
                        <li>
                            <a href="{{ route('articles.index') }}" class="hover:text-white transition-colors duration-200">Articles</a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-white transition-colors duration-200">Knowledge Base</a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-white transition-colors duration-200">FAQs</a>
                        </li>
                    </ul>
                </div>
                
                <!-- Legal Links -->
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-white uppercase">Legal</h2>
                    <ul class="text-gray-400 font-medium space-y-4">
                        <li>
                            <a href="#" class="hover:text-white transition-colors duration-200">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-white transition-colors duration-200">Terms &amp; Conditions</a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-white transition-colors duration-200">Cookie Policy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <hr class="my-6 border-gray-700 sm:mx-auto lg:my-8" />
        
        <div class="sm:flex sm:items-center sm:justify-between">
            <!-- Copyright -->
            <span class="text-sm text-gray-400 sm:text-center">
                © {{ date('Y') }} <a href="{{ route('home') }}" class="hover:underline">IT Support Service™</a>. All Rights Reserved.
            </span>
            
            <!-- Social Links -->
            <div class="flex mt-4 space-x-5 sm:justify-center sm:mt-0">
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Facebook page</span>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                    </svg>
                    <span class="sr-only">Twitter page</span>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">GitHub account</span>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Dribbble account</span>
                </a>
            </div>
        </div>
    </div>
</footer>
```

---

## FAQ Accordion Component

**File**: `resources/views/components/faq-accordion.blade.php`

```blade
@props([
    'faqs' => []
])

<div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white text-gray-900" data-inactive-classes="text-gray-500">
    @foreach($faqs as $index => $faq)
        <h2 id="accordion-flush-heading-{{ $index }}">
            <button type="button" 
                    class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 gap-3 {{ $index === 0 ? 'text-gray-900' : '' }}" 
                    data-accordion-target="#accordion-flush-body-{{ $index }}" 
                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" 
                    aria-controls="accordion-flush-body-{{ $index }}">
                <span>{{ $faq['question'] }}</span>
                <svg data-accordion-icon class="w-3 h-3 {{ $index === 0 ? '' : 'rotate-180' }} shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-flush-body-{{ $index }}" 
             class="{{ $index === 0 ? '' : 'hidden' }}" 
             aria-labelledby="accordion-flush-heading-{{ $index }}">
            <div class="py-5 border-b border-gray-200">
                <p class="mb-2 text-gray-500">{{ $faq['answer'] }}</p>
            </div>
        </div>
    @endforeach
</div>
```

**Usage Example**:
```blade
@php
$faqs = [
    [
        'question' => 'What services do you offer?',
        'answer' => 'We offer comprehensive IT support including network security, cloud solutions, system maintenance, and 24/7 technical support for businesses of all sizes.'
    ],
    [
        'question' => 'Do you provide 24/7 support?',
        'answer' => 'Yes, we provide round-the-clock support to ensure your business operations run smoothly at all times. Our expert team is always available to assist you.'
    ],
    [
        'question' => 'How quickly can you respond to issues?',
        'answer' => 'We typically respond to critical issues within 15 minutes. For non-critical issues, our response time is within 2 hours during business hours.'
    ],
    [
        'question' => 'What are your pricing plans?',
        'answer' => 'We offer flexible pricing plans tailored to your business needs. Contact us for a customized quote based on your specific requirements.'
    ]
];
@endphp

<x-faq-accordion :faqs="$faqs" />
```

---

## Statistics Section

**File**: `resources/views/home/partials/stats.blade.php`

```blade
<section class="bg-white py-12 md:py-16 lg:py-20">
    <div class="max-w-screen-xl px-4 mx-auto text-center">
        <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 md:text-4xl">
            Why Choose Us?
        </h2>
        <p class="mb-8 font-light text-gray-600 sm:text-xl md:px-20 lg:px-38 xl:px-48">
            With over 10 years of experience in the IT industry, we provide reliable and efficient solutions for businesses of all sizes.
        </p>
        
        <div class="grid grid-cols-2 gap-6 sm:gap-8 md:grid-cols-4 lg:gap-12">
            <!-- Stat 1 -->
            <div class="flex flex-col items-center justify-center p-4">
                <dt class="mb-2 text-4xl md:text-5xl font-extrabold text-primary-600">10+</dt>
                <dd class="font-medium text-gray-600">Years Experience</dd>
            </div>
            
            <!-- Stat 2 -->
            <div class="flex flex-col items-center justify-center p-4">
                <dt class="mb-2 text-4xl md:text-5xl font-extrabold text-primary-600">250+</dt>
                <dd class="font-medium text-gray-600">Happy Clients</dd>
            </div>
            
            <!-- Stat 3 -->
            <div class="flex flex-col items-center justify-center p-4">
                <dt class="mb-2 text-4xl md:text-5xl font-extrabold text-primary-600">500+</dt>
                <dd class="font-medium text-gray-600">Projects Done</dd>
            </div>
            
            <!-- Stat 4 -->
            <div class="flex flex-col items-center justify-center p-4">
                <dt class="mb-2 text-4xl md:text-5xl font-extrabold text-primary-600">24/7</dt>
                <dd class="font-medium text-gray-600">Support</dd>
            </div>
        </div>
    </div>
</section>
```

---

## Testimonials Section

**File**: `resources/views/home/partials/testimonials.blade.php`

```blade
<section class="bg-gray-50 py-12 md:py-16 lg:py-20">
    <div class="max-w-screen-xl px-4 mx-auto text-center">
        <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 md:text-4xl">
            What Our Clients Say
        </h2>
        <p class="mb-12 font-light text-gray-600 sm:text-xl">
            Don't just take our word for it, hear from our satisfied clients
        </p>
        
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Testimonial 1 -->
            <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border border-gray-200 rounded-lg shadow hover:shadow-xl transition-shadow duration-300">
                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-600 lg:mb-8">
                    <p class="my-4">"Their team provided exceptional IT support during our digital transformation. Highly recommended!"</p>
                </blockquote>
                <figcaption class="flex items-center justify-center space-x-3">
                    <img class="rounded-full w-12 h-12" src="https://via.placeholder.com/100" alt="profile picture">
                    <div class="space-y-0.5 font-medium text-left rtl:text-right">
                        <div class="text-gray-900">John Doe</div>
                        <div class="text-sm text-gray-600">CEO, TechCo</div>
                    </div>
                </figcaption>
            </figure>
            
            <!-- Testimonial 2 -->
            <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border border-gray-200 rounded-lg shadow hover:shadow-xl transition-shadow duration-300">
                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-600 lg:mb-8">
                    <p class="my-4">"Reliable, professional, and quick to respond. They saved our systems during a critical outage."</p>
                </blockquote>
                <figcaption class="flex items-center justify-center space-x-3">
                    <img class="rounded-full w-12 h-12" src="https://via.placeholder.com/100" alt="profile picture">
                    <div class="space-y-0.5 font-medium text-left rtl:text-right">
                        <div class="text-gray-900">Jane Smith</div>
                        <div class="text-sm text-gray-600">CTO, Innovate Inc</div>
                    </div>
                </figcaption>
            </figure>
            
            <!-- Testimonial 3 -->
            <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border border-gray-200 rounded-lg shadow hover:shadow-xl transition-shadow duration-300">
                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-600 lg:mb-8">
                    <p class="my-4">"Outstanding service and technical expertise. Our productivity increased significantly after their intervention."</p>
                </blockquote>
                <figcaption class="flex items-center justify-center space-x-3">
                    <img class="rounded-full w-12 h-12" src="https://via.placeholder.com/100" alt="profile picture">
                    <div class="space-y-0.5 font-medium text-left rtl:text-right">
                        <div class="text-gray-900">Robert Johnson</div>
                        <div class="text-sm text-gray-600">Director, Global Solutions</div>
                    </div>
                </figcaption>
            </figure>
        </div>
    </div>
</section>
```

---

## Modal Component

**File**: `resources/views/components/modal.blade.php`

```blade
@props([
    'id' => 'default-modal',
    'title' => 'Modal Title',
    'size' => 'default' // default, small, large, extralarge
])

@php
$sizeClasses = [
    'small' => 'max-w-md',
    'default' => 'max-w-2xl',
    'large' => 'max-w-4xl',
    'extralarge' => 'max-w-7xl',
];
$maxWidth = $sizeClasses[$size] ?? $sizeClasses['default'];
@endphp

<!-- Main modal -->
<div id="{{ $id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full {{ $maxWidth }} max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    {{ $title }}
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="{{ $id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                {{ $slot }}
            </div>
            <!-- Modal footer -->
            @if(isset($footer))
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>
```

**Usage Example**:
```blade
<!-- Button to trigger modal -->
<button data-modal-target="example-modal" data-modal-toggle="example-modal" class="btn-primary" type="button">
    Open Modal
</button>

<!-- Modal -->
<x-modal id="example-modal" title="Contact Information" size="default">
    <p class="text-base leading-relaxed text-gray-600">
        Please fill out the form below and we will get back to you as soon as possible.
    </p>
    
    <x-slot:footer>
        <button data-modal-hide="example-modal" type="button" class="btn-primary">
            I accept
        </button>
        <button data-modal-hide="example-modal" type="button" class="btn-secondary ms-3">
            Decline
        </button>
    </x-slot:footer>
</x-modal>
```

---

## Alert/Toast Component

**File**: `resources/views/components/alert.blade.php`

```blade
@props([
    'type' => 'info', // info, success, warning, danger
    'dismissible' => true,
    'icon' => true
])

@php
$classes = [
    'info' => 'text-blue-800 bg-blue-50 border-blue-300',
    'success' => 'text-green-800 bg-green-50 border-green-300',
    'warning' => 'text-yellow-800 bg-yellow-50 border-yellow-300',
    'danger' => 'text-red-800 bg-red-50 border-red-300',
];
$alertClass = $classes[$type] ?? $classes['info'];

$icons = [
    'info' => '<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>',
    'success' => '<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>',
    'warning' => '<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>',
    'danger' => '<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>',
];
$iconPath = $icons[$type] ?? $icons['info'];
@endphp

<div class="flex items-center p-4 mb-4 border rounded-lg {{ $alertClass }}" role="alert">
    @if($icon)
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            {!! $iconPath !!}
        </svg>
        <span class="sr-only">{{ ucfirst($type) }}</span>
    @endif
    
    <div class="ms-3 text-sm font-medium">
        {{ $slot }}
    </div>
    
    @if($dismissible)
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 inline-flex items-center justify-center h-8 w-8 {{ $alertClass }}" data-dismiss-target="#alert" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    @endif
</div>
```

**Usage Example**:
```blade
<!-- Success Alert -->
<x-alert type="success">
    <span class="font-medium">Success!</span> Your message has been sent successfully.
</x-alert>

<!-- Error Alert -->
<x-alert type="danger">
    <span class="font-medium">Error!</span> Something went wrong. Please try again.
</x-alert>

<!-- Info Alert -->
<x-alert type="info">
    <span class="font-medium">Info!</span> Please check your email for verification.
</x-alert>

<!-- Warning Alert -->
<x-alert type="warning">
    <span class="font-medium">Warning!</span> Your session will expire in 5 minutes.
</x-alert>
```

---

## Complete Homepage Example

**File**: `resources/views/home/index.blade.php`

```blade
@extends('layouts.app')

@section('title', 'Home')
@section('description', 'Professional IT Support Services for businesses. 24/7 support, cloud solutions, and network security.')

@section('content')
    <!-- Hero Section -->
    @include('home.partials.hero')
    
    <!-- Services Section -->
    <section class="py-12 md:py-16 lg:py-20 bg-white">
        <div class="max-w-screen-xl px-4 mx-auto">
            <div class="text-center mb-12">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 md:text-4xl">
                    Our Services
                </h2>
                <p class="font-light text-gray-600 sm:text-xl">
                    We offer a wide range of IT services to meet your business needs
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                <x-service-card 
                    title="Network Security"
                    description="Protect your business from cyber threats with our comprehensive security solutions."
                    icon="shield"
                    link="{{ route('services.show', 'network-security') }}"
                />
                
                <x-service-card 
                    title="Cloud Solutions"
                    description="Migrate to the cloud with our secure and scalable cloud infrastructure services."
                    icon="cloud"
                    link="{{ route('services.show', 'cloud-solutions') }}"
                />
                
                <x-service-card 
                    title="24/7 Support"
                    description="Round-the-clock technical support for all your IT infrastructure needs."
                    icon="support"
                    link="{{ route('services.show', 'technical-support') }}"
                />
            </div>
            
            <div class="text-center mt-10">
                <a href="{{ route('services.index') }}" class="btn-primary">
                    View All Services
                </a>
            </div>
        </div>
    </section>
    
    <!-- Stats Section -->
    @include('home.partials.stats')
    
    <!-- Latest Articles Section -->
    <section class="py-12 md:py-16 lg:py-20 bg-gray-50">
        <div class="max-w-screen-xl px-4 mx-auto">
            <div class="text-center mb-12">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 md:text-4xl">
                    Latest Articles
                </h2>
                <p class="font-light text-gray-600 sm:text-xl">
                    Stay updated with the latest technology trends and tips
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                <!-- Sample Articles - Replace with dynamic data -->
                <x-article-card 
                    title="Best Practices for Network Security in 2024"
                    excerpt="Learn about the latest security measures to protect your business network from modern threats."
                    category="Security"
                    author="Admin"
                    date="Feb 1, 2024"
                    readTime="5 min read"
                    link="#"
                />
                
                <x-article-card 
                    title="Cloud Migration: A Complete Guide"
                    excerpt="Everything you need to know about migrating your business to the cloud successfully."
                    category="Cloud"
                    author="Admin"
                    date="Jan 28, 2024"
                    readTime="8 min read"
                    link="#"
                />
                
                <x-article-card 
                    title="How to Choose the Right IT Support Provider"
                    excerpt="Key factors to consider when selecting an IT support partner for your business."
                    category="Business"
                    author="Admin"
                    date="Jan 25, 2024"
                    readTime="6 min read"
                    link="#"
                />
            </div>
            
            <div class="text-center mt-10">
                <a href="{{ route('articles.index') }}" class="btn-secondary">
                    View All Articles
                </a>
            </div>
        </div>
    </section>
    
    <!-- Testimonials Section -->
    @include('home.partials.testimonials')
    
    <!-- CTA Section -->
    <section class="bg-gradient-to-r from-primary-600 to-indigo-600">
        <div class="py-12 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center">
                <h2 class="mb-4 text-3xl font-extrabold leading-tight text-white md:text-4xl">
                    Ready to Get Started?
                </h2>
                <p class="mb-6 font-light text-gray-100 md:text-lg">
                    Contact us today for a free consultation and discover how we can help your business thrive.
                </p>
                <a href="{{ route('contact') }}" class="text-primary-600 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none transition-colors duration-200">
                    Get Started
                </a>
            </div>
        </div>
    </section>
@endsection
```

---

## Quick Implementation Checklist

### ✅ Phase 1: Setup (30 minutes)
- [ ] Run `npm install flowbite`
- [ ] Update `tailwind.config.js`
- [ ] Update `resources/js/app.js`
- [ ] Update `resources/css/app.css`
- [ ] Run `npm run dev`
- [ ] Test basic Flowbite component (button)

### ✅ Phase 2: Layout & Navigation (1 hour)
- [ ] Create `layouts/app.blade.php`
- [ ] Create `components/header.blade.php`
- [ ] Create `components/footer.blade.php`
- [ ] Test navigation on all screen sizes

### ✅ Phase 3: Reusable Components (2 hours)
- [ ] Create `components/service-card.blade.php`
- [ ] Create `components/article-card.blade.php`
- [ ] Create `components/contact-form.blade.php`
- [ ] Create `components/modal.blade.php`
- [ ] Create `components/alert.blade.php`
- [ ] Create `components/faq-accordion.blade.php`

### ✅ Phase 4: Homepage (2 hours)
- [ ] Create `home/partials/hero.blade.php`
- [ ] Create `home/partials/stats.blade.php`
- [ ] Create `home/partials/testimonials.blade.php`
- [ ] Update `home/index.blade.php`
- [ ] Test all sections

### ✅ Phase 5: Other Pages (3-4 hours)
- [ ] Update `about/index.blade.php`
- [ ] Update `services/index.blade.php`
- [ ] Update `services/show.blade.php`
- [ ] Update `articles/index.blade.php`
- [ ] Update `articles/show.blade.php`
- [ ] Update `contact/index.blade.php`

### ✅ Phase 6: Testing & Polish (1-2 hours)
- [ ] Test all responsive breakpoints
- [ ] Test all interactive elements
- [ ] Check accessibility (keyboard navigation)
- [ ] Optimize images
- [ ] Test form submissions
- [ ] Cross-browser testing

---

## Common Issues & Solutions

### Issue 1: Flowbite JavaScript Not Working
**Solution**: Make sure you've imported Flowbite in `app.js` and run `npm run dev`:
```javascript
import 'flowbite';
```

### Issue 2: Tailwind Classes Not Applying
**Solution**: Ensure Flowbite path is in `tailwind.config.js`:
```javascript
content: [
    "./node_modules/flowbite/**/*.js"
]
```

### Issue 3: Modal Not Opening
**Solution**: Check that:
- `data-modal-target` matches modal `id`
- Flowbite JS is loaded
- No JavaScript errors in console

### Issue 4: Mobile Menu Not Toggling
**Solution**: Verify:
- `data-collapse-toggle` attribute is correct
- Flowbite JS is initialized
- Button has correct aria attributes

### Issue 5: Components Look Different
**Solution**: Clear cache and rebuild:
```bash
php artisan cache:clear
php artisan view:clear
npm run build
```

---

## Resources

- **Flowbite Documentation**: https://flowbite.com/docs/getting-started/introduction/
- **Tailwind CSS**: https://tailwindcss.com/docs
- **Laravel Blade**: https://laravel.com/docs/blade
- **Flowbite Components**: https://flowbite.com/docs/components/alerts/
- **Flowbite Blocks**: https://flowbite.com/blocks/

---

**Last Updated**: February 2024
**Version**: 1.0