# Laravel Auth

## Introduction

Laravel Auth is a project management system built using Laravel and MySQL. It allows users to register and access the platform where they can create, update, or delete their projects. Administrators can only manage their own projects through the admin views, while guests can view all projects of all administrators. Additionally, this project defines API endpoints that are used by another project, 'vite-boolfolio', which can be found [here](https://github.com/davidequattrocchi10/vite-boolfolio).

## Features

- **User Registration and Authentication**: Users can register and log in to the platform using Laravel's built-in authentication features.
- **Project Management**: Authenticated users can create, update, and delete their own projects.
- **Admin Views**: Administrators can manage only their projects.
- **Guest Views**: Guests can view all projects created by administrators.
- **API Endpoints**:  The project defines API endpoints that can be consumed by other applications. These endpoints are currently used by the 'vite-boolfolio' project to fetch project data.

## Database Schema

The database schema includes the following tables:

1. **Users**: Stores user information.
2. **Projects**: Stores project information.
3. **Types**: Stores project type information.
4. **Technologies**: Stores technology information.

## Getting Started

### Prerequisites

- PHP
- MySQL
- Laravel

### Installation

1. **Clone the repository**:
   ```sh
   git clone https://github.com/davidequattrocchi10/laravel-auth.git

