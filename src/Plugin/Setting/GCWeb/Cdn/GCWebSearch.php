<?php

namespace Drupal\wxt_bootstrap\Plugin\Setting\GCWeb\Cdn;

use Drupal\bootstrap\Plugin\Setting\SettingBase;

/**
 * The "wxt_gcweb_search" theme setting.
 *
 * @ingroup plugins_setting
 *
 * @BootstrapSetting(
 *   id = "wxt_gcweb_search",
 *   type = "checkbox",
 *   title = @Translation("Toggle Canada.ca Search"),
 *   defaultValue = 0,
 *   description = @Translation("If checked the GCWeb theme will use the Canada.ca search."),
 *   groups = {
 *     "gcweb" = @Translation("GCWeb"),
 *     "cdn" = @Translation("CDN"),
 *   }
 * )
 */
class GCWebSearch extends SettingBase {}
