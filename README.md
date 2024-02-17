WxT Bootstrap
=============

A modern, component based and accessible theme powered by the
[Bootstrap][bootstrap] base theme and integrated extensively with the
[WxT][wet_boew] jQuery Framework.

This theme will strive to always work with the native Drupal 10 workflow which
consists of leveraging block layouts and twig templates by default. Over time
full support for various contributed modules such as Display Suite and Panels
will be added for more complex layout functionality.

> Note: For up-to-date documentation please always consult our [README.md][readme] file.

## Installation

There are two possible installation methods to leverage the
[WxT Bootstrap][wxt_bootstrap] theme in Drupal 10:

- *distribution (recommended)*
- *standalone*

The standalone install is provided as an additional installation method for
those who do not wish to have the full weight of a distribution and its
required dependencies.

### Distribution

All dependencies are included as part of the [Drupal WxT][drupal_wxt]
distribution and come completely configured alongside with additional
integrations and workflow improvements.

- [WxT][wxt]

> Note: We heavily recommend that you use the distribution method.
> Limited support is provided for standalone.
>
> * Extra configuration of WxT components and additional custom plugins
> * Drupal application lifecycle and timely updates of core
> * Workflow improvements and configuration of key contributed modules

### StandAlone

WxT Bootstrap at a minimum requires the following dependencies:

- [Bootstrap][bootstrap]
- [WxT Library][wxt_library]
- [WxT jQuery Framework assets][wet_boew]

> Note: The wet-boew assets need to be under the `/libraries` folder with the proper naming scheme.

You can easily retrieve these dependencies via composer:

```sh
composer require drupal/wxt_bootstrap
composer require drupal/wxt_library
```

> Note: Please take a look at the composer.json file located in WxT Library which pulls in all of
the theme assets using a custom [composer repository][composer_extdeps].

## Setup

Enable either The [WxT Bootstrap][wxt_bootstrap] theme or derived sub-theme and
set it to be the default active theme in Drupal.

## Sub-Theming

We provide a starterkit under the `starterkits` folder that contains the
template for inheriting from `wxt_bootstrap`.

- Step 1) copy the starterkit/wxt folder into `projectroot/html/themes/custom/mythemename`
- Step 2) rename the following files:

`cd projectroot/html/themes/custom/mythemename`

`mv THEMENAME.libraries.yml mythemename.libraries.yml`

`mv THEMENAME.starterkit.yml mythemename.info.yml`

`mv THEMENAME.theme mythemename.theme`

`cd projectroot/html/themes/custom/mythemename/config/install`

`mv THEMENAME.settings.yml mythemename.settings.yml`

`cd projectroot/html/themes/custom/mythemename/config/schema`

`mv THEMENAME.schema.yml wxtthemename.schema.yml`

- Step 3) search and replace THEMENAME with mythemename throughout the projectroot/html/themes/custom/mythemename folder.

`cd projectroot/html/themes/custom/mythemename`

`find . -type f -exec sed -i 's/THEMENAME/mythemename/g' {} +`

Rebuild the cache and then the theme will show up in /admin/appearance/settings.


> Note: In order for your new sub-theme to inherit styles (and maybe other things)
> from the wxt_bootstrap base theme you need to select your new sub-theme under the
> Theme Visibility settings (`/admin/config/wxt/wxt_library`).

## SCSS Compilation

You will need to have the following required dependencies for the following
commands to execute successfully:

- NodeJS (v18.10.0) + NPM (v9.6.6) + Yarn (v1.22.19)
- Gulp install globally with the -g option

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

### With Gulp

Run the following commands inside the theme directory to compile SCSS to CSS:

- `gulp scss` (Creates the initial css file)

<!-- Links Referenced -->

[bootstrap]:        https://drupal.org/project/bootstrap
[bootstrap_sass]:   https://github.com/twbs/bootstrap-sass
[drupal_wxt]:       https://drupal.org/project/wxt
[wet_boew]:         https://github.com/wet-boew/wet-boew
[composer_extdeps]: https://github.com/drupalwxt/composer-extdeps
[wxt]:              https://drupal.org/project/wxt
[wxt_library]:      https://drupal.org/project/wxt_library
[wxt_bootstrap]:    https://drupal.org/project/wxt_bootstrap
[readme]:           https://github.com/drupalwxt/wxt_bootstrap/blob/8.x-7.x/README.md
