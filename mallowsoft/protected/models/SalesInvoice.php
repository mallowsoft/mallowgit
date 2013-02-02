<?php

/**
 * This is the model class for table "sales_invoice".
 *
 * The followings are the available columns in table 'sales_invoice':
 * @property string $production_order_no
 * @property string $invoice_date
 * @property string $customer
 * @property string $quantity
 * @property string $weight
 * @property string $unit
 * @property string $fc_value
 * @property string $currency
 * @property string $Ex_rate
 * @property string $inr_value
 * @property integer $invoice_no
 * @property string $payment_due_date
 * @property string $bank_ref_no
 * @property string $payment_date
 * @property string $ecgc_payment_terms
 * @property string $shipment_board_date
 * @property string $loading_port
 * @property string $destination_port
 * @property string $shipping_bill_no
 * @property string $additional_bill_no
 * @property string $house_agent
 * @property string $feeder_vessel
 * @property string $clearance_customs_house
 * @property string $expected_eta_date
 * @property string $date
 * @property string $forwarder_name
 * @property string $mother_vessel
 * @property string $additional_date
 * @property string $premium_rate
 * @property integer $shipment_no
 */
class SalesInvoice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SalesInvoice the static model class
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
		return 'sales_invoice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('invoice_no, invoice_date', 'required'),
			array('invoice_no, shipment_no, shipping_bill_no, additional_bill_no, bank_ref_no', 'numerical', 'integerOnly'=>true),
			array('weight, fc_value', 'length', 'max'=>12),
			array('inr_value', 'length', 'max'=>15),
			array('production_order_no, invoice_date, customer, quantity, unit, currency, Ex_rate, payment_due_date, bank_ref_no, payment_date, ecgc_payment_terms, shipment_board_date, loading_port, destination_port, shipping_bill_no, additional_bill_no, house_agent, feeder_vessel, clearance_customs_house, expected_eta_date, date, forwarder_name, mother_vessel, additional_date, premium_rate', 'safe'),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('production_order_no, invoice_date, customer, quantity, weight, unit, fc_value, currency, Ex_rate, inr_value, invoice_no, payment_due_date, bank_ref_no, payment_date, ecgc_payment_terms, shipment_board_date, loading_port, destination_port, shipping_bill_no, additional_bill_no, house_agent, feeder_vessel, clearance_customs_house, expected_eta_date, date, forwarder_name, mother_vessel, additional_date, premium_rate, shipment_no', 'safe', 'on'=>'search'),
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
//        'ProformaInvoice'=>array(self::HAS_MANY, 'ProformaInvoice', 'proforma_invoice_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'production_order_no' => 'Production Order No :',
			'invoice_date' => 'Invoice Date :',
			'customer' => 'Customer :',
			'quantity' => 'Quantity :',
			'weight' => 'Weight (in kgs) :',
			'unit' => 'Unit :',
			'fc_value' => 'Value in FC :',
			'currency' => 'Currency :',
			'Ex_rate' => 'Exchange Rate :',
			'inr_value' => 'INR Value :',
			'invoice_no' => 'Invoice No :',
			'payment_due_date' => 'Payment Due Date :',
			'bank_ref_no' => 'Bank Ref No :',
			'payment_date' => 'Payment Date :',
			'ecgc_payment_terms' => 'Payment Terms for ECGC :',
			'shipment_board_date' => 'Shipped on Board Date :',
			'loading_port' => 'Port of Loading :',
			'destination_port' => 'Port of Destination :',
			'shipping_bill_no' => 'Shipping Bill No :',
			'additional_bill_no' => 'Bill of Loading/Air Way Bill No :',
			'house_agent' => 'Customs House Agent :',
			'feeder_vessel' => 'Feeder Vessel :',
			'clearance_customs_house' => 'Clearance Customs House :',
			'expected_eta_date' => 'Expected ETA Date :',
			'date' => 'Date :',
			'forwarder_name' => 'Forwarder Name :',
			'mother_vessel' => 'Mother Vessel :',
			'additional_date' => 'Date :',
			'premium_rate' => 'Premium Rate :',
			'shipment_no' => 'Shipment No :',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
    protected function afterFind ()
    {
        date_default_timezone_set('UTC');
        // convert to display format
        $this->invoice_date = strtotime ($this->invoice_date);
        $this->invoice_date = date ('d-m-Y', $this->invoice_date);
        
        $this->payment_due_date = strtotime ($this->payment_due_date);
        $this->payment_due_date = date ('d-m-Y', $this->payment_due_date);
        
        $this->payment_date = strtotime ($this->payment_date);
        $this->payment_date = date ('d-m-Y', $this->payment_date);
        
        $this->shipment_board_date = strtotime ($this->shipment_board_date);
        $this->shipment_board_date = date ('d-m-Y', $this->shipment_board_date);
        
        $this->expected_eta_date = strtotime ($this->expected_eta_date);
        $this->expected_eta_date = date ('d-m-Y', $this->expected_eta_date);
        
        $this->date = strtotime ($this->date);
        $this->date = date ('d-m-Y', $this->date);
        
        $this->additional_date = strtotime ($this->additional_date);
        $this->additional_date = date ('d-m-Y', $this->additional_date);
        
        parent::afterFind ();
    }
    
    protected function beforeValidate ()
    {
        date_default_timezone_set('UTC');
        
        //convert to storage format
        $this->invoice_date = strtotime ($this->invoice_date);
        $this->invoice_date = date ('Y-m-d', $this->invoice_date);
        
        $this->payment_due_date = strtotime ($this->payment_due_date);
        $this->payment_due_date = date ('Y-m-d', $this->payment_due_date);
        
        $this->payment_date = strtotime ($this->payment_date);
        $this->payment_date = date ('Y-m-d', $this->payment_date);
        
        $this->shipment_board_date = strtotime ($this->shipment_board_date);
        $this->shipment_board_date = date ('Y-m-d', $this->shipment_board_date);
        
        $this->expected_eta_date = strtotime ($this->expected_eta_date);
        $this->expected_eta_date = date ('Y-m-d', $this->expected_eta_date);
        
        $this->date = strtotime ($this->date);
        $this->date = date ('Y-m-d', $this->date);
        
        $this->additional_date = strtotime ($this->additional_date);
        $this->additional_date = date ('Y-m-d', $this->additional_date);

        return parent::beforeValidate ();
    }

	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('production_order_no',$this->production_order_no,true);
		$criteria->compare('invoice_date',$this->invoice_date,true);
		$criteria->compare('customer',$this->customer,true);
		$criteria->compare('quantity',$this->quantity,true);
		$criteria->compare('weight',$this->weight,true);
		$criteria->compare('unit',$this->unit,true);
		$criteria->compare('fc_value',$this->fc_value,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('Ex_rate',$this->Ex_rate,true);
		$criteria->compare('inr_value',$this->inr_value,true);
		$criteria->compare('invoice_no',$this->invoice_no);
		$criteria->compare('payment_due_date',$this->payment_due_date,true);
		$criteria->compare('bank_ref_no',$this->bank_ref_no,true);
		$criteria->compare('payment_date',$this->payment_date,true);
		$criteria->compare('ecgc_payment_terms',$this->ecgc_payment_terms,true);
		$criteria->compare('shipment_board_date',$this->shipment_board_date,true);
		$criteria->compare('loading_port',$this->loading_port,true);
		$criteria->compare('destination_port',$this->destination_port,true);
		$criteria->compare('shipping_bill_no',$this->shipping_bill_no,true);
		$criteria->compare('additional_bill_no',$this->additional_bill_no,true);
		$criteria->compare('house_agent',$this->house_agent,true);
		$criteria->compare('feeder_vessel',$this->feeder_vessel,true);
		$criteria->compare('clearance_customs_house',$this->clearance_customs_house,true);
		$criteria->compare('expected_eta_date',$this->expected_eta_date,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('forwarder_name',$this->forwarder_name,true);
		$criteria->compare('mother_vessel',$this->mother_vessel,true);
		$criteria->compare('additional_date',$this->additional_date,true);
		$criteria->compare('premium_rate',$this->premium_rate,true);
		$criteria->compare('shipment_no',$this->shipment_no);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
?>