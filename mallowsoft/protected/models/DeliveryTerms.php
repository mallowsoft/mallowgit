<?php

/**
 * This is the model class for table "delivery_terms".
 *
 * The followings are the available columns in table 'delivery_terms':
 * @property string $information
 * @property string $delivery_terms
 * @property string $delivery_terms_code
 * @property string $delivery_terms_id
 */
class DeliveryTerms extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DeliveryTerms the static model class
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
		return 'delivery_terms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('delivery_terms, delivery_terms_code','required','message'=>'{attribute} Cannnot be Empty'),
			array('information, delivery_terms, delivery_terms_code', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('information, delivery_terms, delivery_terms_code, delivery_terms_id', 'safe', 'on'=>'search'),
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
			'delivery_terms' => 'Delivery Terms :',
			'delivery_terms_code' => 'Terms Code :',
			'delivery_terms_id' => 'Delivery Terms :',
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
		$criteria->compare('delivery_terms',$this->delivery_terms,true);
		$criteria->compare('delivery_terms_code',$this->delivery_terms_code,true);
		$criteria->compare('delivery_terms_id',$this->delivery_terms_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort' => array(
                            'defaultOrder' => 'delivery_terms_code ASC',  // this is it.
                            ),
            'pagination' => array(
                                  'pageSize' => 10,
                                  ),
		));
	}
}