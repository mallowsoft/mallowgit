<?php

/**
 * This is the model class for table "payment_terms".
 *
 * The followings are the available columns in table 'payment_terms':
 * @property string $information
 * @property string $payment_terms
 * @property string $payment_terms_code
 * @property string $payment_terms_id
 */
class PaymentTerms extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PaymentTerms the static model class
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
		return 'payment_terms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('payment_terms, payment_terms_code', 'required','message'=>'{attribute} Cannnot be Empty'),
			array('information, payment_terms, payment_terms_code', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('information, payment_terms, payment_terms_code, payment_terms_id', 'safe', 'on'=>'search'),
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
			'information' => 'Information :',
			'payment_terms' => 'Payment Terms :',
			'payment_terms_code' => 'Payment Terms Code :',
			'payment_terms_id' => 'Payment Terms :',
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

		$criteria->compare('information',$this->information,true);
		$criteria->compare('payment_terms',$this->payment_terms,true);
		$criteria->compare('payment_terms_code',$this->payment_terms_code,true);
		$criteria->compare('payment_terms_id',$this->payment_terms_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort' => array(
                            'defaultOrder' => 'payment_terms_code ASC',  // this is it.
                            ),
            'pagination' => array(
                                  'pageSize' => 10,
                                  ),
		));
	}
}