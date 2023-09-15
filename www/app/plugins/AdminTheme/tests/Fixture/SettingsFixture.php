<?php
declare(strict_types=1);

namespace AdminTheme\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SettingsFixture
 */
class SettingsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'site_name' => 'Lorem ipsum dolor sit amet',
                'site_description' => 'Lorem ipsum dolor sit amet',
                'site_logo' => 'Lorem ipsum dolor sit amet',
                'theme_primary_color' => 'Lorem ipsum dolor sit amet',
                'theme_secondary_color' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
