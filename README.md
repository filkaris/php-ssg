# php-ssg

A simple Static Site Generator using PHP

## Disclaimer

> This is not a well-supported Static Site Generator. It is a weekend project to experiment with an interesting approach to build static websites using PHP. Feel free to fork and experiment as well.

# Installation

You need to have `composer` installed. Follow these [instructions](https://getcomposer.org/download/) to install it.

```
git clone https://github.com/filkaris/php-ssg
cd php-ssg
composer install
```

# Configuration

Edit these values in `config.yaml`

```
config:
  title: "My Awesome Blog"
  subtitle: "Filippos Karailanidis"
```

# Usage

To write a new post, create a markdown file inside `posts/`
```
vim posts/my-new-post.md
```

Fill in important metadata on top of the file 
```
---
title: My First Post
date: Fri 12 Jul 2019 06:21:09 PM EEST
summary: "(The summary of said first post)"
---
```

Run the local server
```
composer server
```

Visit [http://localhost:8080](http://localhost:8080)

# Build

To build everything into a static website in the `dist/` folder:

```
composer build
```

Deploy the `dist/` folder anywhere online 
