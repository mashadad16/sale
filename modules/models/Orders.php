<?php

namespace app\modules\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $create_at
 * @property string $name
 * @property int $status_id
 *
 * @property Statuses $status
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at', 'name', 'status_id'], 'required'],
            [['create_at'], 'safe'],
            [['status_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Statuses::class, 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'create_at' => 'Дата создания',
            'name' => 'Название',
            'status_id' => 'Статус',
        ];
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Statuses::class, ['id' => 'status_id']);
    }

    public function search($params){
        $query = static::find();
        $this->scenario = 'filter'; // использование сценариев определяет какие поля выводить в фильтре
        if(isset($params["some-parameter"])){
            $query->where(['some-field' => $params["some-parameter"]]);
}
        $dataProvider = new ActiveDataProvider([
            'query' => $query,    ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        return $dataProvider;
    }

    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios['filter'] = [
            'some-field'
        ];
        return $scenarios; }
}
