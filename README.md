WxT Bootstrap
=============

A modern, component based and accessible theme powered by the
[Bootstrap][bootstrap] base theme and integrated extensively with the
[WxT][wet_boew] jQuery Framework.

This theme will strive to always work with the native Drupal 8 workflow which
consists of leveraging block layouts and twig templates by default. Over time
full support for various contributed modules such as Display Suite and Panels
will be added for more complex layout functionality.

## Installation

There are two possible installation methods to leverage the
[WxT Bootstrap][wxt_bootstrap] theme in Drupal 8:

- *distribution (recommended)*
- *standalone*

The standalone install is provided as an additional installation method for
those who do not wish to have the full weight of a distribution and its
required dependencies.

### Distribution

All dependencies are included as part of the [Drupal WxT][drupal_wxt]
distribution and come completely configured alongside with additional
integrations and workflow improvements.

- [WxT][wxt] (8.x-1.x)

### StandAlone

WxT Library at a minimum requires the following dependencies:

- [Bootstrap][bootstrap] (8.x-3.5+)
- [WxT Library][wxt_library] (8.x-1.0+)
- [WxT jQuery Framework assets][wet_boew]

You can easily retrieve these dependencies via composer:

```sh
composer require drupal/wxt_bootstrap
```

## Setup

Enable either The [WxT Bootstrap][wxt_bootstrap] theme or derived sub-theme and
set it to be the default active theme in Drupal.

## Sass Compilation

You will need to have the following required dependencies for the following
commands to execute successfully:

- NodeJS (v11.0.0) + NPM (v6.4.1) + Yarn (v1.17.3)
- Grunt or Gulp install globally with the -g option

Inside the theme directory run the following to install the required NodeJS
dependencies:

`yarn install`

### Pre-requisites

Download and extract the **latest** 3.x.x version of
[Bootstrap Framework][bootstrap_sass] Source Files into the root of your new
sub-theme. After it has been extracted, the directory should be renamed
(if needed) so it reads `./wxt_bootstrap/libraries/bootstrap`. Even though WxT
ships with the compiled bootstrap files as libraries we still need the source
files to compile the bootstrap overrides.

### Option 1: With Gulp (Preferred + Tested)

Run the following commands inside the theme directory to compile SASS to CSS:

- `gulp sass` (Creates the initial css file)
- `gulp sass:watch` (Watches the sass folder for changes)

### Option 2: With Grunt (Needs Work)

Run the following commands inside the theme directory to compile SASS to CSS:

- `grunt init` (Creates the initial css file)
- `grunt watch` (Watches the sass folder for changes)

## BROWSERSYNC

Adding Browsersync to workflow

1. Install the Drupal browsersync module from:
https://www.drupal.org/project/browsersync

2. In "Themes" -> "Appearance" -> "Settings" scroll down and enable browsersync
for the appropriate theme.

3. Edit the proxy address in the gruntfile.js / gulpfile.js file to match the
IP or hostname of your Drupal website.

4. Run `grunt browsersync` or `gulp browsersync`  (Watches the sass folder, and
sets up a browsersync session.)

<!-- Links Referenced -->

[bootstrap]:      https://drupal.org/project/bootstrap
[bootstrap_sass]: https://github.com/twbs/bootstrap-sass
[drupal_wxt]:     https://drupal.org/project/wxt
[wet_boew]:       https://wet-boew.github.io
[wxt]:            https://drupal.org/project/wxt
[wxt_library]:    https://drupal.org/project/wxt_library
[wxt_bootstrap]:  https://drupal.org/project/wxt_bootstrap
