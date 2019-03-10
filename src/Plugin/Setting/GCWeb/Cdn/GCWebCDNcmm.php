<?php

namespace Drupal\wxt_bootstrap\Plugin\Setting\GCWeb\Cdn;

use Drupal\bootstrap\Plugin\Setting\SettingBase;

/**
 * The "wxt_gcweb_cdn_cmm" theme setting.
 *
 * @ingroup plugins_setting
 *
 * @BootstrapSetting(
 *   id = "wxt_gcweb_cdn_cmm",
 *   type = "textfield",
 *   title = @Translation("CDN for MegaMenu"),
 *   defaultValue = "https://www.canada.ca/content/dam/canada/sitemenu/sitemenu-v2-",
 *   description = @Translation("The CDN to use for the MegaMenu. Will be appended with the language and .html (i.e.: en.html or fr.html)" ),
 *   groups = {
 *     "gcweb" = @Translation("GCWeb"),
 *     "cdn" = @Translation("CDN"),
 *   }
 * )
 */
class GCWebCDNcmm extends SettingBase {}
