<?php
declare(strict_types=1);

namespace AdminTheme\Model\Entity;

use Cake\ORM\Entity;

/**
 * Setting Entity
 *
 * @property int $id
 * @property string $site_name
 * @property string $site_description
 * @property string $site_logo
 * @property string $theme_primary_color
 * @property string $theme_secondary_color
 */
class Setting extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'site_name' => true,
        'site_description' => true,
        'site_logo' => true,
        'theme_primary_color' => true,
        'theme_secondary_color' => true,
    ];
}
