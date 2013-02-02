<?php

/**
 * This is the model class for table "profomo".
 *
 * The followings are the available columns in table 'profomo':
 * @property integer $profomo_no
 * @property integer $order_no
 * @property string $profomo_date
 * @property string $customer
 */
class Profomo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Profomo the static model class
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
		return 'profomo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('profomo_no, order_no', 'numerical', 'integerOnly'=>true),
			array('profomo_date, customer', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('profomo_no, order_no, profomo_date, customer', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'profomo_no' => 'Profomo No',
			'order_no' => 'Order No',
			'profomo_date' => 'Profomo Date',
			'customer' => 'Customer',
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

		$criteria->compare('profomo_no',$this->profomo_no);
		$criteria->compare('order_no',$this->order_no);
		$criteria->compare('profomo_date',$this->profomo_date,true);
		$criteria->compare('customer',$this->customer,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}