<?php

namespace Drupal\wxt_bootstrap\Plugin\Setting\Accessibility\SkipNav;

use Drupal\bootstrap\Plugin\Setting\SettingBase;

/**
 * The "wxt_skip_link_secondary" theme setting.
 *
 * @ingroup plugins_setting
 *
 * @BootstrapSetting(
 *   id = "wxt_skip_link_secondary",
 *   type = "textfield",
 *   title = @Translation("Anchor ID for the secondary ""skip link"""),
 *   defaultValue = "wb-info",
 *   description = @Translation("Specify the HTML ID of the element that the accessible-but-hidden ""skip link"" should link to. (<a href="":link"">Read more about skip links</a>.)", arguments = { ":link"  = "http://drupal.org/node/467976" }),
 *   groups = {
 *     "accessibility" = @Translation("Accessibility"),
 *     "skip_nav" = @Translation("Skip Navigation"),
 *   }
 * )
 */
class SkipLinkSecondary extends SettingBase {}
