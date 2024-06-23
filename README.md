# Piksera: Drag-and-Drop CMS

![Piksera Logo](https://piksera.com/cdn/images/piksera-logo.png)

**Current version: 2.0 running on Laravel 10!**

[Download Piksera](https://piksera.com/download.php) | [What is Piksera?](#what-is-piksera) | [Core Features](#core-features) | [System Requirements](#system-requirements) | [Installation](#installation) | [Getting Started](#getting-started) | [Contribute](#contribute)

---

## What is Piksera?

![Admin Panel](https://piksera.org/userfiles/media/piksera.org/dashboard-1_17.jpg)

Piksera is a Drag-and-Drop website builder and a robust next-generation Content Management System (CMS) based on the PHP Laravel Framework. 
It empowers you to create various types of websites, online stores, and blogs without requiring any technical expertise.

At its core, Piksera is designed to support your journey toward online success. 
It offers an array of modules, customizations, and features tailored to e-commerce enthusiasts and bloggers. 
The CMS leverages the latest Drag & Drop technology and real-time text editing for an enhanced user experience, streamlined content management, visual appeal, and flexibility.

## Core Features of Piksera

### Drag & Drop

Piksera utilizes intuitive Drag & Drop technology, enabling users to manage content effortlessly by simply clicking and dragging elements across the screen. This functionality extends to various content types, including images, text fields, videos, and a variety of modules and customization options. The default template, "Dream," boasts over 75+ pre-designed layouts available for instant use via drag and drop.

![Drag And Drop](https://piksera.com/cdn/2019_version/Drag_Drop_CMS_Piksera.gif)

### Real-Time Text Editing

Live Edit view is the embodiment of Piksera CMS's Real-Time Text Writing & Editing feature, allowing you to make changes to your website's interface in real time.

![E-commerce Solution](https://sitestatic.piksera.com/cdn/gh_readme/homepage-2018-third-section.gif)

### Powerful Admin Panel

Piksera equips you with the capability to add dynamic pages, posts, and products, which can be organized into custom categories for enhanced navigation and content presentation. New pages can be created using different layouts, and each page, post, or product comes with a variety of preset layouts and modules to jumpstart your content creation. You can also add your custom modules to tailor your content precisely to your needs.

![Powerful Admin Panel](https://piksera.com/cdn/2019_version/2.jpg)

### E-commerce Solution

Piksera CMS primarily focuses on e-commerce, making it an ideal choice for aspiring online entrepreneurs. The software includes built-in features that support online shop founders, helping their businesses grow and excel.

![E-commerce Solution](https://piksera.com/cdn/2019_version/3.jpg)

[Give a star to Piksera](https://piksera.com/cdn/2019_version/Star-Piksera.gif)

## See it in action

- [Create website](https://piksera.com) with Piksera
- [Piksera Live Demo](https://demo.piksera.org/?template=dream)
- [Piksera Videos](https://www.youtube.com/c/pikserawebsitebuildercms)
- [Deploy Piksera on DigitalOcean](https://marketplace.digitalocean.com/apps/piksera?action=deploy&refcode=83e0646738fe)
- [Deploy Piksera Azure](https://azuremarketplace.microsoft.com/en-us/marketplace/apps/pikseracms.piksera-cms?tab=Overview)
- [Deploy Piksera on Linode](https://www.linode.com/marketplace/apps/piksera/piksera-cms/)
- [Deploy Piksera on Vultr](https://www.vultr.com/marketplace/apps/piksera)
- [Use Piksera Plesk plugin](https://piksera.org/go/plesk_plugin/)

## System Requirements

To run Piksera, you need the following components:

- HTTP server
- Database server
- PHP >= 8.2
    - `lib-xml` with DOM support
    - `GD` PHP extension
    - `intl` PHP extension
    - `curl` PHP extension
    - `json` PHP extension
    - `openssl` PHP extension
    - `sodium` PHP extension
    - `mbstring` PHP extension
    - `bcmath` PHP extension
    - `zip` PHP extension
    - `openssl` PHP extension
    - `bcmath` PHP extension
    - `fileinfo` PHP extension
    - `pdo_sqlite` PHP extension
    - `pdo_mysql` PHP extension

### PHP installation command

```bash
sudo apt install php8.2-{bcmath,bz2,curl,curl,dom,fileinfo,gd,intl,mbstring,mysql,opcache,sqlite3,xmlrpc,zip}
```


### HTTP Server

#### Apache

Ensure that the `mod_rewrite` module is enabled in your Apache configuration. Piksera automatically creates necessary `.htaccess` files during installation, including one with a `Deny All` directive in each folder to prevent unauthorized access to entry points other than `index.php`.

#### Nginx

For Nginx, add the following `location` directive to your server configuration block. The `root` directive should point to the base folder of your Piksera website (usually where this readme is located).

```nginx
server {
  location / {
    try_files $uri $uri/ /index.php$is_args$args;
  }
  location ~ /(vendor|src|config|storage|.git|.env) {
    deny all;
    return 404;
  }
}
```

### IIS

You can import the `.htaccess` rewrite rules for IIS. Ensure that the URL Rewrite module is enabled for your website.

### Database

Piksera supports multiple database engines, including MySQL, SQLite, Microsoft SQL Server, and PostgreSQL. For small websites, SQLite is highly recommended. During installation, you can select from the databases enabled in your PHP configuration. If your preferred database server isn't listed, make sure to enable the corresponding PDO extension for your server in your PHP configuration.

## Installation

### The Fast Way: Download and Unzip

The quickest way to get started is to [download Piksera](https://piksera.com/download.php) and unzip the files.

### Via Composer

#### Installing Dependencies

Ensure you have [Composer installed](https://getcomposer.org/doc/00-intro.md) to download Piksera's dependencies. 

Install Piksera with `composer` command:

```bash
composer create-project piksera/piksera my_site dev-master  
```

Install NPM dependencies:

```bash
npm install
```
Build NPM dependencies:

```bash
npm run build
```

This command will install Piksera in a folder named `my_site`. Alternatively, you can clone the repository and then run `composer install` in the base directory.

#### File Permissions

Make sure that the following folders, and everything inside them, are writable by the user running the PHP scripts:

- config/
- storage/
- userfiles/

## Getting Started

For detailed guidance on getting started with Piksera, refer to our [online guides](http://piksera.com/docs/guides/README.md).

## Contribute

We welcome contributions from individuals who want to help us improve Piksera. If you're a developer, submitting

fixes is straightforward. Fork the Piksera repository, make your changes, submit a pull request, and ensure that all tests pass.


## Join our Discord server

Join our Discord server [here](https://piksera.org/go/discord).

[![](https://dcbadge.vercel.app/api/server/Bsue9ey)](https://discord.gg/Bsue9ey)


## Build Status

### Master branch
![PHP Unit Tests](https://github.com/piksera/piksera/actions/workflows/ci.yml/badge.svg)
[![codecov](https://codecov.io/gh/piksera/piksera/branch/dev/graph/badge.svg?token=aLAgaSMcbZ)](https://codecov.io/gh/piksera/piksera)

### Dev branch
![PHP Unit Tests](https://github.com/piksera/piksera/actions/workflows/ci.yml/badge.svg?branch=dev)
![Browser Tests](https://github.com/piksera/piksera/actions/workflows/dusk.yml/badge.svg?branch=dev)

All development is done on the `dev` branch. The `master` branch is used for stable releases.

Please note that the `dev` branch is not guaranteed to be stable at all times, and may contain bugs or other issues. Use it at your own risk.

Please submit all pull requests to the `dev` branch.


## Contributors

### Code Contributors

This project thrives thanks to all the contributors. [Learn how to contribute](CONTRIBUTING.md).
[![Code Contributors](https://opencollective.com/piksera/contributors.svg?width=890&button=false)](https://github.com/piksera/piksera/graphs/contributors)

### Financial Contributors

Become a financial contributor and help sustain our community. [Contribute here](https://opencollective.com/piksera/contribute).

#### Individuals

[![Individual Contributors](https://opencollective.com/piksera/individuals.svg?width=890)](https://opencollective.com/piksera)

#### Organizations

Support this project with your organization, and your logo will be featured here with a link to your website.
[Contribute here](https://opencollective.com/piksera/contribute).

 
