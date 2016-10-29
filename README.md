WxT Bootstrap
=============

A modern, SMACSS enabled theme powered by [WxT][wet_boew] and the
[Bootstrap][bootstrap] base theme.

The main goal of this theme is to work with the native Drupal 8 workflow
leveraging block layouts and twig page templates by default. This theme will
also be extended over time to support contributed modules like Panels. However
the priority and preference in the architectural design will always favor the
native Drupal workflow.

## Installation

This theme assumes that you have:

- Drupal Bootstrap Theme (8.x-3.0-beta3+)
- NodeJS (v4.2.x+) + NPM (v3.x+)
- Grunt or Gulp install globally with the -g option

There are two installation methods `standalone` + `distro`  to leverage the
[WxT Bootstrap][wxt_bootstrap] theme in Drupal 8. The `standalone` install is
provided as an additional method for those who do not wish to have the full
weight of a distribution and its required dependencies. It is up to you to
choose which method is suitable for your organization.

### StandAlone Requirements

* `Standalone` Install: [WxT Bootstrap][wxt_bootstrap] requires the
[WxT Library][wxt_library] module at a minimum to function correctly.
Additionally with respect to [WxT Bootstrap][wxt_bootstrap] please remember to
run `composer install` to download the [Bootstrap][bootstrap] base theme.

### Distribution Requirements

* `Distro` Install: [WxT Library][wxt_library] is directly included as part of
the [Drupal WxT][drupal_wxt] distribution and comes completely configured with
all of the required dependencies.

## SETUP

1. Enable either the WxT theme or derived sub-theme and set it to be the
default theme in Drupal

2. Inside the theme directory run the following to install the required nodejs
dependencies:

`npm install`

## SASS COMPILATION

### Pre-requisites

Download and extract the **latest** 3.x.x version of
[Bootstrap Framework Source Files][bootstrap_sass] into the root of your new
sub-theme. After it has been extracted, the directory should be renamed
(if needed) so it reads `./wxt_bootstrap/bootstrap`. Even though WxT ships with
the compiled bootstrap files as libraries we still need the source files to
compile the bootstrap overrides.

### Option 1: With Grunt (Deprecated)

Run the following commands inside the theme directory to compile SASS to CSS:

- `grunt init` (Creates the initial css file)
- `grunt watch` (Watches the sass folder for changes)

### Option 2: With Gulp (Preferred + Tested)

Run the following commands inside the theme directory to compile SASS to CSS:

- `gulp sass` (Creates the initial css file)
- `gulp sass:watch` (Watches the sass folder for changes)

## BROWSERSYNC

Adding Browsersync to workflow

1. Install the Drupal browsersync module from
https://www.drupal.org/project/browsersync

2. In "Themes" -> "Appearance" -> "Settings" scroll down and enable browsersync
for the Bootstrap Sass Starterkit Theme.

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
