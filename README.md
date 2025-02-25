[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

A personal portfolio website showcasing web development projects, 3D creations, and application development experiments. Built with Laravel, Tailwind CSS, and a touch of creative madness.

## Table of Contents

*   [About the Project](#about-the-project)
*   [Features](#features)
*   [Getting Started](#getting-started)
    *   [Prerequisites](#prerequisites)
    *   [Installation](#installation)
*   [Usage](#usage)
*   [Contributing](#contributing)
*   [License](#license)

## About The Project

This is a portfolio website designed to showcase a range of projects, including web applications, 3D models, and other creative coding experiments. The site is built using the Laravel framework for the backend, Tailwind CSS for styling, and Alpine.js for some interactive elements. It features a clean, modern design with a focus on highlighting the projects and skills of the developer.

## Features

*   **Project Showcase:** Displays a variety of projects with descriptions, images, and links to live demos or source code.
*   **Categorized Projects:** Projects are organized into categories such as "Web," "Apps," and "3D" for easy browsing.
*   **Admin Dashboard:** (Protected by login) Allows for easy management of projects and content.
*   **Dark Mode:** Includes a dark mode toggle for a comfortable viewing experience in different lighting conditions.
*   **Responsive Design:** Fully responsive layout that adapts to different screen sizes.
*   **Interactive Elements:** Uses JavaScript (AOS, custom scripts) for animations and interactive features.

## Getting Started

To get a local copy of the project up and running, follow these steps:

### Prerequisites

*   PHP >= 8.1
*   Composer
*   Node.js
*   npm or Yarn
*   Git

### Installation

1.  Clone the repository:

    ```bash
    git clone https://github.com/holmbergfan/holmberg.pro.git
    ```

2.  Navigate to the project directory:

    ```bash
    cd holmberg.pro
    ```

3.  Install Composer dependencies:

    ```bash
    composer install
    ```

4.  Copy the [.env.example](http://_vscodecontentref_/1) file to [.env](http://_vscodecontentref_/2) and configure your environment variables:

    ```bash
    cp .env.example .env
    # Edit .env with your database credentials, API keys, etc.
    ```

5.  Generate an application key:

    ```bash
    php artisan key:generate
    ```

6.  Run database migrations:

    ```bash
    php artisan migrate
    ```

7.  Install Node.js dependencies:

    ```bash
    npm install # or yarn install
    ```

8.  Compile assets:

    ```bash
    npm run build # or yarn run build
    ```

## Usage

1.  Start the Laravel development server:

    ```bash
    php artisan serve
    ```

2.  Open your web browser and navigate to `http://localhost:8000`.

3.  Explore the different sections of the website to view the showcased projects.

4.  To access the admin dashboard, navigate to `/admin/dashboard` and log in with your credentials.

## Contributing

Contributions are welcome! If you find a bug or have a feature request, please open an issue. If you'd like to contribute code, please follow these steps:

1.  Fork the project.
2.  Create a new branch for your feature or bug fix.
3.  Make your changes.
4.  Commit your changes with a descriptive message.
5.  Push your branch to your forked repository.
6.  Submit a pull request.

## License

This project is licensed under the MIT License - see the LICENSE file for details.
