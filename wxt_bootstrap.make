; WxT Bootstrap Makefile

core = 8.x
api = 2

; Modules

projects[bootstrap][version] = 3.0-rc2
projects[bootstrap][type] = theme
projects[bootstrap][subdir] = contrib
projects[bootstrap][patch][2779755] = https://www.drupal.org/files/issues/bootstrap-alt_text_image-2779755-3-from_rc2.patch
