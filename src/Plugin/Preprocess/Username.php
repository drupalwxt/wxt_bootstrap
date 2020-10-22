<?php

namespace Drupal\wxt_bootstrap\Plugin\Preprocess;

use Drupal\Component\Utility\Unicode;
use Drupal\Core\Session\AnonymousUserSession;
use Drupal\bootstrap\Plugin\Preprocess\PreprocessBase;
use Drupal\bootstrap\Utility\Variables;

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @ingroup plugins_form
 *
 * @BootstrapPreprocess("username")
 */
class Username extends PreprocessBase {

  /**
   * {@inheritdoc}
   */
  public function preprocessVariables(Variables $variables) {
    $account = $variables['account'] ?: new AnonymousUserSession();

    // Set the name to a formatted name that is safe for printing and
    // that won't break tables by being too long. Keep an unshortened,
    // unsanitized version, in case other preprocess functions want to implement
    // their own shortening logic or add markup. If they do so, they must ensure
    // that $variables['name'] is safe for printing.
    $name = $account->getDisplayName();
    $variables['name_raw'] = $account->getUsername();
    if (mb_strlen($name) > 45) {
      $name = Unicode::truncate($name, 40, FALSE, TRUE);
      $variables['truncated'] = TRUE;
    }
    else {
      $variables['truncated'] = FALSE;
    }
    $variables['name'] = $name;
  }

}
