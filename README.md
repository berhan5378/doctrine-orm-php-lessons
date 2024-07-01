# Doctrine ORM PHP Lessons

A repository documenting my learning journey with Doctrine ORM in PHP, including setup, configuration, and practical examples.

## Table of Contents

- [Introduction](#introduction)
- [Setup](#setup)
- [Day 1: Introduction and Installation](#day-1-introduction-and-installation)
- [Day 2: Basic Configuration](#day-2-basic-configuration)
- [Day 3: Mapping Classes](#day-3-mapping-classes)
- [Day 4: Creating and Persisting Entities](#day-4-creating-and-persisting-entities)
- [Contributing](#contributing)


## Introduction

This repository contains a series of lessons aimed at learning Doctrine ORM in PHP. The lessons cover everything from initial setup to advanced usage.

## Setup

### Requirements

- PHP >= 7.4
- Composer
- SQLite (for testing purposes)
- A web server (e.g., WAMP, XAMPP)

### Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/your-username/doctrine-orm-php-lessons.git
    cd doctrine-orm-php-lessons
    ```

2. Install dependencies:
    ```sh
    composer install
    ```

3. Create the database schema:
    ```sh
    php create_schema.php
    ```

## Day 1: Introduction and Installation

- Overview of Doctrine ORM.
- Installation steps using Composer.
- Basic project setup.

## Day 2: Basic Configuration

- Configuring Doctrine in a PHP project.
- Using `bootstrap.php` for setting up the EntityManager.

## Day 3: Mapping Classes

- Introduction to mapping classes with Doctrine.
- Using annotations, XML, and YAML for mapping.
- Creating an entity class (`User`).

## Day 4: Creating and Persisting Entities

- Creating entity instances.
- Persisting entities to the database.
- Example script to create and persist a `User` entity.

## Contributing

If you would like to contribute to this project, please fork the repository and submit a pull request. For major changes, please open an issue to discuss what you would like to change.

 