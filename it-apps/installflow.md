Tailwind CSS Laravel - Flowbite
Learn how to install Tailwind CSS with Flowbite in a Laravel PHP project and start building modern websites with the most popular PHP framework in the world

Laravel is the most popular free and open-source PHP web framework that helps you build modern web applications and API’s based on a model-view-controller (MVC) programming architecture. It’s an iteration of the Symfony framework and it’s being used by millions of developers and companies around the world.

Check out this guide to learn how to set up a new Laravel project together with Tailwind CSS and the UI components from Flowbite to enhance your front-end development workflow.

Create a Laravel app #
Make sure that you have Composer and Node.js installed locally on your computer.

Follow the next steps to install Tailwind CSS and Flowbite with Laravel Mix.

Require the Laravel Installer globally using Composer:
Terminal

Copy
composer global require laravel/installer
Make sure to place the vendor bin directory in your PATH. Here’s how you can do it based on each OS:

macOS: export PATH="$PATH:$HOME/.composer/vendor/bin"
Windows: set PATH=%PATH%;%USERPROFILE%\AppData\Roaming\Composer\vendor\bin
Linux: export PATH="~/.config/composer/vendor/bin:$PATH"
Create a new project using Laravel’s CLI:
Terminal

Copy
laravel new flowbite-app
cd flowbite-app
Start the development server using the following command:

Terminal

Copy
composer run dev
You can now access the Laravel application on http://localhost:8000.

This command will initialize a blank Laravel project that you can get started with.

Install Tailwind CSS #
Since Laravel 12, the latest version of Tailwind v4 will be installed by default, so if you have that version or later then you can skip this step and proceed with installing Flowbite.

Install Tailwind CSS using NPM:
Terminal

Copy
npm install tailwindcss @tailwindcss/vite --save-dev
Configure the vite.config.ts file by importing the Tailwind plugin:
vite.config.ts

Copy
import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'
export default defineConfig({
  plugins: [
    tailwindcss(),
    // …
  ],
})
Import the main Tailwind directive inside your app.css CSS file:
app.css

Copy
@import "tailwindcss";
Run the build process for Vite using npm run dev. Use npm run build for production builds.
Install Flowbite #
Flowbite is a popular and open-source UI component library built on top of the Tailwind CSS framework that allows you to choose from a wide range of UI components such as modals, drawers, buttons, dropdowns, datepickers, and more to make your development workflow faster and more efficient.

Follow the next steps to install Flowbite using NPM.

Install Flowbite as a dependency using NPM by running the following command:
Terminal

Copy
npm install flowbite --save
Import the default theme variables from Flowbite inside your main app.css CSS file:
app.css

Copy
@import "flowbite/src/themes/default";
Import the Flowbite plugin file in your CSS:
app.css

Copy
@plugin "flowbite/plugin";
Configure the source files of Flowbite in your CSS:
app.css

Copy
@source "../../node_modules/flowbite";
Add the Flowbite JS script inside your main app.blade.php layout file:
app.blade.php

Copy
<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>
This will have the JavaScript loaded in all the files that extend this main layout.

UI components #
Now that you have successfully installed the project you can start using the UI components from Flowbite and Tailwind CSS to develop modern websites and web applications.

We recommend exploring the components using the search bar navigation (cmd or ctrl + k) or by browsing the components section of the sidebar on the left side of this page.

Laravel starter project #
Download or clone the Flowbite Laravel Github boilerplate repository to get access to a project that already has Laravel, Tailwind CSS, and Flowbite set up for development.

For even more resources and UI components you can check out Flowbite Pro.Tailwind CSS Laravel - Flowbite
Learn how to install Tailwind CSS with Flowbite in a Laravel PHP project and start building modern websites with the most popular PHP framework in the world

Laravel is the most popular free and open-source PHP web framework that helps you build modern web applications and API’s based on a model-view-controller (MVC) programming architecture. It’s an iteration of the Symfony framework and it’s being used by millions of developers and companies around the world.

Check out this guide to learn how to set up a new Laravel project together with Tailwind CSS and the UI components from Flowbite to enhance your front-end development workflow.

Create a Laravel app #
Make sure that you have Composer and Node.js installed locally on your computer.

Follow the next steps to install Tailwind CSS and Flowbite with Laravel Mix.

Require the Laravel Installer globally using Composer:
Terminal

Copy
composer global require laravel/installer
Make sure to place the vendor bin directory in your PATH. Here’s how you can do it based on each OS:

macOS: export PATH="$PATH:$HOME/.composer/vendor/bin"
Windows: set PATH=%PATH%;%USERPROFILE%\AppData\Roaming\Composer\vendor\bin
Linux: export PATH="~/.config/composer/vendor/bin:$PATH"
Create a new project using Laravel’s CLI:
Terminal

Copy
laravel new flowbite-app
cd flowbite-app
Start the development server using the following command:

Terminal

Copy
composer run dev
You can now access the Laravel application on http://localhost:8000.

This command will initialize a blank Laravel project that you can get started with.

Install Tailwind CSS #
Since Laravel 12, the latest version of Tailwind v4 will be installed by default, so if you have that version or later then you can skip this step and proceed with installing Flowbite.

Install Tailwind CSS using NPM:
Terminal

Copy
npm install tailwindcss @tailwindcss/vite --save-dev
Configure the vite.config.ts file by importing the Tailwind plugin:
vite.config.ts

Copy
import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'
export default defineConfig({
  plugins: [
    tailwindcss(),
    // …
  ],
})
Import the main Tailwind directive inside your app.css CSS file:
app.css

Copy
@import "tailwindcss";
Run the build process for Vite using npm run dev. Use npm run build for production builds.
Install Flowbite #
Flowbite is a popular and open-source UI component library built on top of the Tailwind CSS framework that allows you to choose from a wide range of UI components such as modals, drawers, buttons, dropdowns, datepickers, and more to make your development workflow faster and more efficient.

Follow the next steps to install Flowbite using NPM.

Install Flowbite as a dependency using NPM by running the following command:
Terminal

Copy
npm install flowbite --save
Import the default theme variables from Flowbite inside your main app.css CSS file:
app.css

Copy
@import "flowbite/src/themes/default";
Import the Flowbite plugin file in your CSS:
app.css

Copy
@plugin "flowbite/plugin";
Configure the source files of Flowbite in your CSS:
app.css

Copy
@source "../../node_modules/flowbite";
Add the Flowbite JS script inside your main app.blade.php layout file:
app.blade.php

Copy
<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>
This will have the JavaScript loaded in all the files that extend this main layout.

UI components #
Now that you have successfully installed the project you can start using the UI components from Flowbite and Tailwind CSS to develop modern websites and web applications.

We recommend exploring the components using the search bar navigation (cmd or ctrl + k) or by browsing the components section of the sidebar on the left side of this page.

Laravel starter project #
Download or clone the Flowbite Laravel Github boilerplate repository to get access to a project that already has Laravel, Tailwind CSS, and Flowbite set up for development.

For even more resources and UI components you can check out Flowbite Pro.
