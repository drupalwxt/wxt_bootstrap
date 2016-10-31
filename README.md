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

There are two possible installation methods `standalone` + `distro`  to leverage
the [WxT Bootstrap][wxt_bootstrap] theme in Drupal 8. The `standalone` install
is provided as an additional method for those who do not wish to have the full
weight of a distribution and its required dependencies.

### StandAlone Requirements

`Standalone` Install: [WxT Bootstrap][wxt_bootstrap] only requires the
[Bootstrap][bootstrap] base theme and the [WxT Library][wxt_library] module
at a minimum to function correctly.

You can easily retrieve these dependencies by running `composer install` which
will simply retrieve the following:

- [Bootstrap][bootstrap] (8.x-3.0+)
- [WxT Library][wxt_library] (8.x-1.x)

### Distribution Requirements

`Distro` Install: All dependencies are included as part of the
[Drupal WxT][drupal_wxt] distribution and come completely configured alongside
with additional integrations.

## Setup

Enable either The [WxT Bootstrap][wxt_bootstrap] theme or derived sub-theme and
set it to be the default active theme in Drupal.

## Sass Compilation

You will need to have the following required dependencies for the following
commands to execute successfully:

- NodeJS (v4.2.x+) + NPM (v3.x+)
- Grunt or Gulp install globally with the -g option

Inside the theme directory run the following to install the required NodeJS
dependencies:

`npm install`

### Pre-requisites

Download and extract the **latest** 3.x.x version of
[Bootstrap Framework][bootstrap_sass] Source Files into the root of your new
sub-theme. After it has been extracted, the directory should be renamed
(if needed) so it reads `./wxt_bootstrap/libraries/bootstrap`. Even though WxT
ships with the compiled bootstrap files as libraries we still need the source
files to compile the bootstrap overrides. For your convenience you can simply
run `bower install` to retrieve the library.

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

[bootstrap]:      http://drupal.org/project/bootstrap
[bootstrap_sass]: https://github.com/twbs/bootstrap-sass
[drupal_wxt]:     http://drupal.org/project/wxt
[wet_boew]:       http://wet-boew.github.io
[wxt_library]:    http://drupal.org/project/wxt_library
[wxt_bootstrap]:  http://drupal.org/project/wxt_bootstrap
