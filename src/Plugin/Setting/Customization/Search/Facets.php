<?php

namespace Drupal\wxt_bootstrap\Plugin\Setting\Customization\Search;

use Drupal\bootstrap\Plugin\Setting\SettingBase;

/**
 * The "wxt_facets_collapsible" theme setting.
 *
 * @ingroup plugins_setting
 *
 * @BootstrapSetting(
 *   id = "wxt_facets_collapsible",
 *   type = "checkbox",
 *   title = @Translation("Collapsible facets"),
 *   defaultValue = FALSE,
 *   description = @Translation("Check this box to enable collapsible facets."),
 *   groups = {
 *     "customization" = @Translation("Customization"),
 *     "search" = @Translation("Search"),
 *   }
 * )
 */
class Facets extends SettingBase {}
