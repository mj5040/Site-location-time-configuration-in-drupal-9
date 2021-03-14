<?php

namespace Drupal\custom_module\Services;

use Drupal\Core\Datetime\DateFormatterInterface;
use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Class TimezoneService
 */
class TimezoneService  implements TimezoneInterface {
  /**
   * The date formatter.
   *
   * @var \Drupal\Core\Datetime\DateFormatterInterface
   */
  protected $dateFormatter;

  /**
   * Configuration Factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Constructs Timezone
   * 
   * @param \Drupal\Core\Datetime\DateFormatterInterface $date_formatter
   *   The date formatter.
   */
  public function __construct(DateFormatterInterface $date_formatter,ConfigFactoryInterface $configFactory) {
    $this->dateFormatter = $date_formatter;
    $this->configFactory = $configFactory;
  }

  /**
   * {@inheritdoc}
   */  
  public function getTimeByTimezone() {
    $timeZone = $this->configFactory->get('custom.adminsettings')->get('timezone');
    $formatted = $this->dateFormatter->format(time(), 'custom', 'jS M Y - h:i A', $timeZone);    
    return $formatted;
  }
}
