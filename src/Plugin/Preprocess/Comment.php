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
    $variables['author'] = \Drupal::service('renderer')->render($elements);
    $owner = $variables['comment']->getOwner();
    if (empty($variables['author']) && $owner->id() === 0) {
      $variables['author'] = $this->t('Anonymous');
    }
    if (empty($variables['author']) && $owner->isAuthenticated()) {
      if ($owner->hasField('field_first_name') && $owner->hasField('field_last_name')) {
        $first_name = $owner->get('field_first_name')->getString();
        $last_name = $owner->get('field_last_name')->getString();
        if (!empty($first_name) && !empty($last_name)) {
          $variables['author'] = $first_name . ' ' . $last_name;
        }
      }
    }
    if (empty($variables['author'])) {
      $variables['author'] = $variables['comment']->getAuthorName();
    }

    // Getting the node creation time stamp from the comment object.
    $date = $variables['comment']->getCreatedTime();

    // Adjust submitted display.
    $variables['created'] = \Drupal::service('date.formatter')->format($date, 'wxt_standard');
    $variables['submitted'] = $this->t('@username - <span class="comments-ago">@datetime </span>', [
      '@username' => $variables['author'],
      '@datetime' => $variables['created'],
    ]);
  }

}
