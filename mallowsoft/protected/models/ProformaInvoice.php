<?php

/**
 * This is the model class for table "proforma_invoice".
 *
 * The followings are the available columns in table 'proforma_invoice':
 * @property string $proforma_no
 * @property string $production_order_no
 * @property string $proforma_date
 * @property string $customer_code
 * @property string $currency_value
 * @property string $shipment_date
 * @property string $FC_value
 * @property string $exchange_rate
 * @property string $INR_value
 * @property string $FPC_booking_period
 * @property string $eta
 * @property string $destination_port
 * @property string $delivery_terms
 * @property string $payment_terms
 * @property string $total_cbm
 * @property string $no_type_containers
 * @property string $agent
 * @property string $agent_commision
 * @property string $proforma_invoice_id
 * @property string $currency_code
 * @property string $booked_exchange_rate
 * @property boolean $fpc_booking_on
 * @property boolean $fpc_booking_off
 */
class ProformaInvoice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProformaInvoice the static model class
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
		return 'proforma_invoice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//            array('fpc_booking_on', 'required', 'message'=>'unselected'),
//            array('fpc_booking_off', 'required', 'message'=>'unselected'),
//            array('fpc_booking_on', 'in', 'range'=>array(1,0)),
//            array('fpc_booking_off', 'in', 'range'=>array(1,0)),
			array('proforma_no, production_order_no, proforma_date, customer_code, currency_value, shipment_date, FC_value, exchange_rate, INR_value, FPC_booking_period, eta, destination_port, delivery_terms, payment_terms, total_cbm, no_type_containers, agent, agent_commision, currency_code, booked_exchange_rate, fpc_booking_on, fpc_booking_off', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('proforma_no, production_order_no, proforma_date, customer_code, currency_value, shipment_date, FC_value, exchange_rate, INR_value, FPC_booking_period, eta, destination_port, delivery_terms, payment_terms, total_cbm, no_type_containers, agent, agent_commision, proforma_invoice_id, currency_code, booked_exchange_rate, fpc_booking_on, fpc_booking_off', 'safe', 'on'=>'search'),
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
        'salesinvoice'=>array(self::HAS_MANY, 'SalesInvoice', 'proforma_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'proforma_no' => 'Proforma No',
			'production_order_no' => 'Production Order No',
			'proforma_date' => 'Proforma Date',
			'customer_code' => 'Customer Code',
			'currency_value' => 'Currency Value',
			'shipment_date' => 'Shipment Date',
			'FC_value' => 'Fc Value',
			'exchange_rate' => 'Exchange Rate',
			'INR_value' => 'Inr Value',
			'FPC_booking_period' => 'Fpc Booking Period',
			'eta' => 'ETA :',
			'destination_port' => 'Destination Port',
			'delivery_terms' => 'Delivery Terms',
			'payment_terms' => 'Payment Terms',
			'total_cbm' => 'Total Cbm',
			'no_type_containers' => 'No & Type of Containers',
			'agent' => 'Agent',
			'agent_commision' => 'Agent Commision',
			'proforma_invoice_id' => 'Proforma Invoice',
			'currency_code' => 'Currency Code',
			'booked_exchange_rate' => 'Booked Exchange Rate',
			'fpc_booking_on' => 'Fpc Booking On',
			'fpc_booking_off' => 'Fpc Booking Off',
		);
	}
//    public function getfpcOptions()
//	{
//		return array('1');
//	}
//    public function getfpcOptions1()
//	{
//		return array('0');
//	}
    protected function afterFind ()
    {
        date_default_timezone_set('UTC');
        // convert to display format
        $this->shipment_date = strtotime ($this->shipment_date);
        $this->shipment_date = date ('d-m-Y', $this->shipment_date);
        
        $this->eta = strtotime ($this->eta);
        $this->eta = date ('d-m-Y', $this->eta);
        
        $this->proforma_date = strtotime ($this->proforma_date);
        $this->proforma_date = date ('d-m-Y', $this->proforma_date);
        
        parent::afterFind ();
    }
    
    protected function beforeValidate ()
    {
        date_default_timezone_set('UTC');

        //convert to storage format
        $this->shipment_date = strtotime ($this->shipment_date);
        $this->shipment_date = date ('Y-m-d', $this->shipment_date);
        
        $this->eta = strtotime ($this->eta);
        $this->eta = date ('Y-m-d', $this->eta);
        
        $this->proforma_date = strtotime ($this->proforma_date);
        $this->proforma_date = date ('Y-m-d', $this->proforma_date);
        
        return parent::beforeValidate ();
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

		$criteria->compare('proforma_no',$this->proforma_no,true);
		$criteria->compare('production_order_no',$this->production_order_no,true);
		$criteria->compare('proforma_date',$this->proforma_date,true);
		$criteria->compare('customer_code',$this->customer_code,true);
		$criteria->compare('currency_value',$this->currency_value,true);
		$criteria->compare('shipment_date',$this->shipment_date,true);
		$criteria->compare('FC_value',$this->FC_value,true);
		$criteria->compare('exchange_rate',$this->exchange_rate,true);
		$criteria->compare('INR_value',$this->INR_value,true);
		$criteria->compare('FPC_booking_period',$this->FPC_booking_period,true);
		$criteria->compare('eta',$this->eta,true);
		$criteria->compare('destination_port',$this->destination_port,true);
		$criteria->compare('delivery_terms',$this->delivery_terms,true);
		$criteria->compare('payment_terms',$this->payment_terms,true);
		$criteria->compare('total_cbm',$this->total_cbm,true);
		$criteria->compare('no_type_containers',$this->no_type_containers,true);
		$criteria->compare('agent',$this->agent,true);
		$criteria->compare('agent_commision',$this->agent_commision,true);
		$criteria->compare('proforma_invoice_id',$this->proforma_invoice_id,true);
		$criteria->compare('currency_code',$this->currency_code,true);
		$criteria->compare('booked_exchange_rate',$this->booked_exchange_rate,true);
		$criteria->compare('fpc_booking_on',$this->fpc_booking_on);
		$criteria->compare('fpc_booking_off',$this->fpc_booking_off);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
?>