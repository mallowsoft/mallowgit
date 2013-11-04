<?php

/**
 * This is the model class for table "units".
 *
 * The followings are the available columns in table 'units':
 * @property string $unit_name
 * @property string $unit_code
 * @property string $unit_id
 */
class Units extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Units the static model class
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
		return 'units';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                     array('unit_code,unit_name', 'required','message'=>'{attribute} Cannnot be Empty'),
			array('unit_name, unit_code', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('unit_name, unit_code, unit_id', 'safe', 'on'=>'search'),
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
			'unit_name' => 'Unit Name :',
			'unit_code' => 'Unit Code :',
			'unit_id' => 'Unit',
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

		$criteria->compare('unit_name',$this->unit_name,true);
		$criteria->compare('unit_code',$this->unit_code,true);
		$criteria->compare('unit_id',$this->unit_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort' => array(
                            'defaultOrder' => 'unit_name ASC',  // this is it.
                            ),
            'pagination' => array(
                                  'pageSize' => 10,
                                  ),
		));
	}
}