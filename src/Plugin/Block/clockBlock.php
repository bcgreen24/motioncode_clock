<?php

namespace Drupal\clock\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Show a clock
 *
 * @Block(
 * id = "clock_block",
 * admin_label = @Translation("Clock Block")
 * )
 */
class ClockBlock extends BlockBase{

    public function build(){
        $ip = $_SERVER['REMOTE_ADDR'];
        $factory = \Drupal::service('tempstore.private');
        $store = $factory->get('clock.collection');
        $store->set('ip_address', $ip);

        \Drupal::state()->set('clock_name', 'default clock');
        return [
            '#type' => 'markup',
            '#markup' => '<div class="clock"></div>',
            '#attached' => [
                'library' => [
                    'clock/clock-library'
                ],
                'drupalSettings' => [
                    'clock' => [
                        'name' => \Drupal::state()->get('clock_name'),
                        'ip' => $store->get('ip_address')
                        ],
                    ],
                ],
        ];
    }
}