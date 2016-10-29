<?php

namespace Drupal\wxt_bootstrap\Plugin\Setting\Accessibility\SkipNav;

use Drupal\bootstrap\Plugin\Setting\SettingBase;

/**
 * The "wxt_skip_link_primary" theme setting.
 *
 * @ingroup plugins_setting
 *
 * @BootstrapSetting(
 *   id = "wxt_skip_link_primary",
 *   type = "textfield",
 *   title = @Translation("Anchor ID for the primary ""skip link"""),
 *   defaultValue = "wb-cont",
 *   description = @Translation("Specify the HTML ID of the element that the accessible-but-hidden ""skip link"" should link to. (<a href="":link"">Read more about skip links</a>.)", arguments = { ":link"  = "http://drupal.org/node/467976" }),
 *   groups = {
 *     "accessibility" = @Translation("Accessibility"),
 *     "skip_nav" = @Translation("Skip Navigation"),
 *   }
 * )
 */
class SkipLinkPrimary extends SettingBase {}
