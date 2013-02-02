<?php

/**
 * This is the model class for table "agent".
 *
 * The followings are the available columns in table 'agent':
 * @property string $agent_name
 * @property string $address
 * @property string $city
 * @property string $country
 * @property string $phone_primary
 * @property string $phone_alternative
 * @property string $email
 * @property string $agent_code
 * @property string $agent_id
 */
class Agent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Agent the static model class
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
		return 'agent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('agent_name, address, city, country, phone_primary, phone_alternative, email, agent_code', 'safe'),
            array('phone_primary, phone_alternative', 'numerical', 'integerOnly'=>true),
            array('email', 'email','checkMX'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('agent_name, address, city, country, phone_primary, phone_alternative, email, agent_code, agent_id', 'safe', 'on'=>'search'),
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
			'agent_name' => 'Agent Name',
			'address' => 'Address',
			'city' => 'City',
			'country' => 'Country',
			'phone_primary' => 'Phone Primary',
			'phone_alternative' => 'Phone Alternative',
			'email' => 'Email',
			'agent_code' => 'Agent Code',
			'agent_id' => 'Agent',
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

		$criteria->compare('agent_name',$this->agent_name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('phone_primary',$this->phone_primary,true);
		$criteria->compare('phone_alternative',$this->phone_alternative,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('agent_code',$this->agent_code,true);
		$criteria->compare('agent_id',$this->agent_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}