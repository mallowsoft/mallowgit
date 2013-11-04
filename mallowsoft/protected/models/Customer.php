<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property string $customer_code
 * @property string $customer_name
 * @property string $invoicing_address
 * @property string $city
 * @property string $country
 * @property string $phone_primary
 * @property string $phone_alternative
 * @property string $email
 * @property string $destination_port
 * @property string $delivery_address
 * @property string $delivery_city
 * @property string $delivery_country
 * @property string $delivery_phone
 * @property string $delivery_email
 * @property string $customer_code_id
 * @property integer $currency_id
 * @property integer $agent_id
 * @property integer $payment_terms_id
 * @property integer $delivery_terms_id
 */
class Customer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Customer the static model class
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
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('customer_code, customer_name', 'required','message'=>'{attribute} Cannnot be Empty'),
                     array('email,delivery_email', 'email'),
            array('phone_primary,delivery_phone,pincode,delivery_pincode,phone_alternative,delivery_terms_id,payment_terms_id,currency_id,agent_id,email,delivery_email','default','setOnEmpty'=>true),
			array('customer_code, customer_name, invoicing_address, pincode ,sameadd , delivery_pincode, city, country, email, destination_port, delivery_address, delivery_city, delivery_country, delivery_phone,sameadd', 'safe'),
            
          //  array('delivery_email', 'email'),
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
//        'currency'=>array(self::BELONGS_TO, 'Currency', 'currency_id'),
                    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'customer_code' => 'Customer Code :',
			'customer_name' => 'Customer Name :',
			'invoicing_address' => 'Invoicing Address :',
			'city' => 'City :',
			'country' => 'Country :',
			'phone_primary' => 'Phone (Primary) :',
			'phone_alternative' => 'Phone (Alternative) :',
			'email' => 'Email :',
			'destination_port' => 'Destination Port :',
			'delivery_address' => 'Delivery Address :',
			'delivery_city' => 'City :',
			'delivery_country' => 'Country :',
			'delivery_phone' => 'Phone :',
			'delivery_email' => 'Email :',
			'customer_code_id' => 'Customer Code :',
			'currency_id' => 'Currency :',
			'agent_id' => 'Agent :',
			'payment_terms_id' => 'Payment Terms :',
			'delivery_terms_id' => 'Delivery Terms :',
            'pincode' => 'Pincode :',
            'delivery_pincode' => 'Pincode :',
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

		$criteria->compare('customer_code',$this->customer_code,true);
		$criteria->compare('customer_name',$this->customer_name,true);
		$criteria->compare('invoicing_address',$this->invoicing_address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('country',$this->country,true);
        $criteria->compare('pincode',$this->country,true);
		$criteria->compare('phone_primary',$this->phone_primary,true);
		$criteria->compare('phone_alternative',$this->phone_alternative,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('destination_port',$this->destination_port,true);
		$criteria->compare('delivery_address',$this->delivery_address,true);
		$criteria->compare('delivery_city',$this->delivery_city,true);
		$criteria->compare('delivery_country',$this->delivery_country,true);
        $criteria->compare('delivery_pincode',$this->delivery_country,true);
		$criteria->compare('delivery_phone',$this->delivery_phone,true);
		$criteria->compare('delivery_email',$this->delivery_email,true);
		$criteria->compare('customer_code_id',$this->customer_code_id,true);
		$criteria->compare('currency_id',$this->currency_id);
		$criteria->compare('agent_id',$this->agent_id);
		$criteria->compare('payment_terms_id',$this->payment_terms_id);
		$criteria->compare('delivery_terms_id',$this->delivery_terms_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort' => array(
                            'defaultOrder' => 'customer_name ASC',  // this is it.
                            ),
            'pagination' => array(
                                  'pageSize' => 10,
                                  ),
		));
	}
}