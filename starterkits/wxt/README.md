# WxT Starterkit

A WxT starterkit that helps you implement and extend [wxt_bootstrap][wxt_bootstrap] leveraging a sub-theme.

## Important

Please remember to enable your theme for WxT Library under Themes Visibility at the `/admin/config/wxt/wxt_library` page.

![WxT Library](images/wxt_library.png?raw=true "Library")

[wxt_bootstrap]: https://www.drupal.org/project/wxt_bootstrap

## Configuration of Theme

1. The following provides an example of how you can configure the theme to be installed as the default on module / profile install.

```php
/**
 * Implements hook_modules_installed().
 */
function MODULENAME_modules_installed($modules) {
    if (in_array('wxt', $modules)) {
      \Drupal::configFactory()
        ->getEditable('system.theme')
        ->set('default', 'THEMENAME')
        ->set('admin', 'claro')
        ->save(TRUE);
    }
  }
}
```

2. Additionally for your new subtheme you will need to configure the `wxt_library` module settings to support it. This can be done programmatically b creating the `config/install/wxt_library.settings.yml` file with the following contents:

```yaml
url:
  visibility: 0
  pages:
    - 'admin*'
    - 'imagebrowser*'
    - 'img_assist*'
    - 'imce*'
    - 'node/add/*'
    - 'node/*/edit'
    - 'print/*'
    - 'printpdf/*'
    - system/ajax
    - 'system/ajax/*'
    - 'admin*'
    - 'imagebrowser*'
    - 'img_assist*'
    - 'imce*'
    - 'node/add/*'
    - 'node/*/edit'
    - 'print/*'
    - 'printpdf/*'
    - system/ajax
    - 'system/ajax/*'
theme:
  visibility: 1
  themes:
    subtheme: THEMENAME
    wxt_bootstrap: wxt_bootstrap
minimized:
  options: 1
files:
  types:
    css: css
    js: js
wxt:
  theme: theme-gcweb
```

3. Finally if the theme you are extending has custom block templates these won't be immediately inherited because a sub-theme creates copies of all the blocks in the parent theme and renames them with the sub-theme's name as a prefix. Twig block templates are derived from the block's name, so this breaks the link between these templates and their block. Fixing this problem currently requires a hook in the sub-theme. The THEMENAME.theme has the following contents:

```php
<?php

/**
 * Implements hook_theme_suggestions_HOOK_alter for blocks.
 */
function THEMENAME_theme_suggestions_block_alter(&$suggestions, $variables) {

  // Load theme suggestions for blocks from parent theme.
  foreach ($suggestions as &$suggestion) {
    $suggestion = str_replace('THEMENAME_', 'wxt_bootstrap_', $suggestion);
  }
}

```
