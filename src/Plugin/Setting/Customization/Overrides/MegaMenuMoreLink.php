<?php

namespace Drupal\wxt_bootstrap\Plugin\Setting\Customization\Overrides;

use Drupal\bootstrap\Plugin\Setting\SettingBase;

/**
 * The "wxt_megamenu_more_link" theme setting.
 *
 * @ingroup plugins_setting
 *
 * @BootstrapSetting(
 *   id = "wxt_megamenu_more_link",
 *   type = "checkbox",
 *   title = @Translation("Disable rendering of the more link inside the mega menu"),
 *   defaultValue = 0,
 *   description = @Translation("Specify whether or not the mega menu should include the more link."),
 *   groups = {
 *     "customization" = @Translation("Customization"),
 *     "overrides" = @Translation("Overrides"),
 *   }
 * )
 */
class MegaMenuMoreLink extends SettingBase {}
