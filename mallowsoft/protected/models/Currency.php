<?php

/**
 * This is the model class for table "currency".
 *
 * The followings are the available columns in table 'currency':
 * @property string $currency_name
 * @property string $currency_symbol
 * @property string $currency_code
 * @property string $currency_id
 */
class Currency extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Currency the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'currency';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('currency_name, currency_symbol, currency_code', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('currency_name, currency_symbol, currency_code, currency_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
     //   'customer' => array(self::HAS_MANY, 'Customer', 'currency_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'currency_name' => 'Currency Name',
			'currency_symbol' => 'Currency Symbol',
			'currency_code' => 'Currency Code',
			'currency_id' => 'Currency',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('currency_name',$this->currency_name,true);
		$criteria->compare('currency_symbol',$this->currency_symbol,true);
		$criteria->compare('currency_code',$this->currency_code,true);
		$criteria->compare('currency_id',$this->currency_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}