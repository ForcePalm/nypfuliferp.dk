<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $steam_id
 * @property string $name
 * @property string $avatar
 * @property string $avatar_medium
 * @property string $avatar_full
 * @property int $group_id
 *
 * @property \App\Model\Entity\Group $group
 */
class User extends Entity
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
        'steam_id' => true,
        'name' => true,
        'avatar' => true,
        'avatar_medium' => true,
        'avatar_full' => true,
        'group_id' => true,
        'group' => true,
    ];
}
