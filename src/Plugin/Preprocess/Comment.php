<?php

namespace Drupal\wxt_bootstrap\Plugin\Preprocess;

use Drupal\bootstrap\Plugin\Preprocess\PreprocessBase;
use Drupal\bootstrap\Utility\Variables;

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @ingroup plugins_form
 *
 * @BootstrapPreprocess("comment")
 */
class Comment extends PreprocessBase {

  /**
   * {@inheritdoc}
   */
  public function preprocessVariables(Variables $variables) {
    $account = $variables['comment']->getOwner();
    $username = [
      '#theme' => 'username',
      '#account' => $account,
    ];
    $variables['author'] = \Drupal::service('renderer')->render($elements);($username);

    // Getting the node creation time stamp from the comment object.
    $date = $variables['comment']->getCreatedTime();

    // Adjust submitted display.
    $variables['created'] = \Drupal::service('date.formatter')->format($date, 'wxt_standard');
    $variables['submitted'] = $this->t('@username - <span class="comments-ago">@datetime </span>', ['@username' => $variables['author'], '@datetime' => $variables['created']]);
  }

}
