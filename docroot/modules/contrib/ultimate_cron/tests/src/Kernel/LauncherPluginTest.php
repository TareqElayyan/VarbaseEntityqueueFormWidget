<?php
/**
 * @file
 * Contains \Drupal\Tests\ultimate_cron\Kernel\LauncherPluginTest.php
 */

namespace Drupal\Tests\ultimate_cron\Kernel;

use Drupal\KernelTests\KernelTestBase;
use Drupal\ultimate_cron\Plugin\ultimate_cron\Launcher\SerialLauncher;

/**
 * Tests the default scheduler plugins.
 *
 * @group ultimate_cron
 */
class LauncherPluginTest extends KernelTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = array('ultimate_cron');

  /**
   * Tests that scheduler plugins are discovered correctly.
   */
  function testDiscovery() {
    /* @var \Drupal\Core\Plugin\DefaultPluginManager $manager */
    $manager = \Drupal::service('plugin.manager.ultimate_cron.launcher');

    $plugins = $manager->getDefinitions();
    $this->assertEqual(count($plugins), 1);

    $serial = $manager->createInstance('serial');
    $this->assertTrue($serial instanceof SerialLauncher);
    $this->assertEqual($serial->getPluginId(), 'serial');
  }
}
