# WxT Starterkit

A WxT starterkit that helps you implement and extend [wxt_bootstrap][wxt_bootstrap] leveraging a sub-theme.

## Important

Please remember to enable your theme for WxT Library under Themes Visibility at the `/admin/config/wxt/wxt_library` page.

![WxT Library](images/wxt_library.png?raw=true "Library")

[wxt_bootstrap]: https://www.drupal.org/project/wxt_bootstrap

## Configuration of Theme

The following provides an example of how you can configure the theme on module install.

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

Afterwards you can configure the `wxt_library` module to support your subtheme.

Create the `config/rewrite/wxt_library.settings.yml` file in your module with the following contents:

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
