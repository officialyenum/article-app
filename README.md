# Article-app
This is a Full Stack CMS Application with role-access for article creation, reading and commenting underneath each article, it was. built with laravel and livewire 

## Table of Contents

-   [Technologies](#technologies)
-   [Getting Started](#getting-started)
    -   [Installation](#installation)
    -   [Usage](#usage)
    -   [Testing](#testing)
    -   [Documentation](#documentation)
    -   [Deployment](#deployment)
    -   [Limitations](#limitations)

## Technologies
-   [Laravel](https://laravel.com/) - Laravel is a web application framework with expressive, elegant syntax.
-   [Livewire](https://laravel-livewire.com/) - Livewire is a full-stack framework for Laravel that makes building dynamic interfaces simple, without leaving the comfort of Laravel.
-   [Node](https://nodejs.org/en/) - Node.js® is an open-source, cross-platform JavaScript runtime environment.
-   [Docker](https://www.docker.com/) - Docker is a platform designed to help developers build, share, and run modern applications. We handle the tedious setup, so you can focus on the code.
-   [Cloudinary](https://cloudinary.com/) - MEDIA EXPERIENCE CLOUD The Most Powerful Media API and Products. Trusted by 1.3 million developers and 10,000 enterprise and hyper-growth companies as a critical part of their tech stack.

## Getting Started
- Ensure you have a cloudinary account 
- in .env paste `CLOUDINARY_URL=cloudinary://xxxxx:@xxxx`, this caan be gotten from your cloudinary dashboard

### Installation

-   git clone
    [Article App](https://github.com/officialyenum/article-app)
-   Run `composer install` to install packages.
-   Docker installation is optional.
-   There is `docker-compose.yml` file for starting Docker, run `docker-compose up` to start the container.
-   Copy .env.example file, create a .env file if not created and edit database credentials there.  
-   Run `alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'` to configure a shell alias that allows you to execute Sail's commands more easily
-   (Docker) Run `sail up` to start up app in docker.
-   (No-Docker) Run `php artisan serve` to start up app locally.
-   (Docker) Run `sail php artisan migrate:fresh --seed` to migrate database and seed the Pre-defined Factory data into it.
-   (No-Docker) Run `php artisan migrate:fresh --seed` to migrate database and seed the Pre-defined Factory data into it.
-   (Docker)Run `sail npm run dev` to bootstrap vite for frontend html, css and js.
-   (No-Docker)Run `sail npm run dev` to bootstrap vite for frontend html, css and js.


### Usage

This is the basic flow of the application.
#### USER Section
#### Article
- View Articles.
- can create an Article.
- can update their Article.
- can delete their Article.
- View their Profile.
- Read their Notifications.

#### Comment
- Can Create a Comment under a post
- Can update their Comment in Profile or Post
- Can delete their Comment in Profile or Post

#### ADMIN Section
#### Article
- View all Articles.
- Uploads Media to Post
- Filter Articles.
- can create an Article.
- can update an Article.
- can delete an Article.

#### User
- View all Users.
- Search Users.
- can create a User.
- can update a User Info.
- can delete a User.
#### Category
- View all Categories.
- Search Categories.
- can create a Category.
- can update a Category Info.
- can delete a Category.
#### Tag
- View all Tags.
- Search Tags.
- can create a Tag.
- can update a Tag Info.
- can delete a Tag.
#### Media
- View all Media. (in development)
- Search Media. (in development)
- can delete a Media. (in development)

### Testing
-   Not Implemented


### Documentation
-   No Api Documentation yet

### Deployment

This project is hosted on [heroku](https://heroku.com)

-   Please click [here](https://article-app.herokuapp.com) to access the hosted application
### Limitations
- Caching is not implemented
- Testing is not implemented
- Api for Documentation is not implemented for third-party usage
