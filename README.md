# WP Blade(One) Starter Theme

Wordpress blank theme that uses Laravel Blade syntax with the help of [WP Blade(One)](https://github.com/dievardump/wp-bladeone-plugin) plugin

This theme is made for developers who create custom themes for their websites, and wish to have the flexibility and simplicity of the Blade syntax.

## 1 - Installation

This theme depends on [WP Blade(One)](https://github.com/dievardump/wp-bladeone-plugin). See the github page to know how to install it properly.

Then you just download this theme and put it in your wordpress themes directory, activate [WP Blade(One)](https://github.com/dievardump/wp-bladeone-plugin) and set WP Blade(One) Starter Theme as your theme.

You might want to change the directory name and the theme's name in style.css before activating it, if you are creating a custom theme.

Then you should be good to go and develop like you always do, with Blade's syntax on top of it.

## 2 - Configuration

Some constants used to configure how the theme behaves are defined in `/includes/constants.php`

You can override them by defining theme earlier in your Wordpress, using dotenv or wp-config.php, or you can edit theme directly in the file.

The comments and names of the constants should be enough, if you're here you probably already know most of those usecases.