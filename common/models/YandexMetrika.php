<?php

//namespace dsx90\metrika\models;
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%yandex_metrica}}".
 *
 * @property integer $id
 * @property string $ids
 * @property string $oauth_token
 * @property string $direct_client_logins
 * @property string $metrics
 * @property string $accuracy
 * @property string $callback
 * @property string $date1
 * @property string $date2
 * @property string $dimensions
 * @property string $group
 * @property string $filters
 * @property integer $include_undefined
 * @property string $lang
 * @property integer $limit
 * @property integer $offset
 * @property string $preset
 * @property integer $pretty
 * @property integer $proposed_accuracy
 * @property string $sort
 * @property string $timezone
 */
class YandexMetrika extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yandex_metrika}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['include_undefined', 'limit', 'offset', 'pretty', 'proposed_accuracy'], 'integer'],
            [['ids', 'oauth_token', 'direct_client_logins', 'metrics', 'accuracy', 'callback', 'date1', 'date2', 'dimensions', 'group', 'filters', 'lang', 'preset', 'sort', 'timezone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                    => 'ID',
            'ids'                   => 'ID метрики',
            'oauth_token'           => 'Токен',
            'direct_client_logins'  => 'Логин Яндекс',
            'metrics'               => 'Metrics',
            'accuracy'              => 'Accuracy',
            'callback'              => 'Callback',
            'date1'                 => 'Date1',
            'date2'                 => 'Date2',
            'dimensions'            => 'Dimensions',
            'group'                 => 'Group',
            'filters'               => 'Filters',
            'include_undefined'     => 'Include Undefined',
            'lang'                  => 'Lang',
            'limit'                 => 'Limit',
            'offset'                => 'Offset',
            'preset'                => 'Preset',
            'pretty'                => 'Pretty',
            'proposed_accuracy'     => 'Proposed Accuracy',
            'sort'                  => 'Sort',
            'timezone'              => 'Timezone',
        ];
    }
}