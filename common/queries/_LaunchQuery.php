<?php

namespace common\queries;

/**
 * This is the ActiveQuery class for [[\common\models\Launch]].
 *
 * @see \common\models\Launch
 */
class LaunchQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere('[[status]]=1');
    }

    /**
     * @inheritdoc
     * @return \common\models\Launch[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Launch|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
