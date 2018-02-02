<?php

namespace common\models\query;

use common\models\Launch;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\common\models\PostCategory]].
 *
 * @see \common\models\PostCategory
 */
class LaunchQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function active()
    {
        $this->andWhere(['status' => Launch::STATUS_ACTIVE]);

        return $this;
    }

    /**
     * @return $this
     */
    public function noParents()
    {
        $this->andWhere('{{%launch}}.parent_id IS NULL');

        return $this;
    }

    public function Parents()
    {
        $this->andWhere('{{%launch}}.parent_id IS NOT NULL');

        return $this;
    }
}
