<?php

    Yii::import('application.extensions.arrayDataProvider.*');
    date_default_timezone_set('UTC');

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
 * @property string $ex_rate
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
 * @property string $currency_symbol
 * @property string $drawback_receivable
 * @property string $fps_receivable
 * @property string $mlfps_payable
 * @property string $information_fps_mlfps
 * @property string $freight_payable
 * @property string $clearance_cost_payable
 * @property string $insurance_payable
 * @property string $other_costs_payable
 *
 * The followings are the available model relations:
 * @property ProformaInvoice[] $proformaInvoices
 * @property ProformaInvoice $proformaNo
 * @property PaymentReceipt[] $paymentReceipts
 */
class SalesInvoice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SalesInvoice the static model class
	 */
    public $commission_value;
    public $invoice_date_first;
    public $invoice_date_last;
    public $shipment_board_date_first;
    public $shipment_board_date_last;
    public $invoice_no_from;
    public $invoice_no_to;
    public $shipment_no_from;
    public $shipment_no_to;
    public $production_order_no;
    public $currency_symbol;
    public $proforma_invoice_id;
    public $proforma_no;
    public $customer_id_hidden;
    public $customer_id;
    public $target;
    public $total;
    public $date;
    public $invoice4_array=array();
    public $invoice3_array=array();
    public $invoice2_array=array();
    public $invoice1_array=array();
    public $customer_array=array();
    public $merchant_id;
    public $advance_amount;
    public $payment_terms_code;
    public $date_of_receipt;
    public $customer_code;
    public $agent_commision;
    public $commission_amount;
    public $exchange_rate;
    public $paid_on;
    public $date_of_realisation;
    public $customer_name;
    public $exchangerate;
    public $total_commission;
    public $advance_amount_received;
    public $year_first;
    public $year_last;
    public $sno;
    public $actual_invoice_value;
    public $delivery_terms_code;
    public $pagesize;
    public $count_j=0;
    public $data=array();
    public $net_total_due;
    public $createpdf;
    
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
                     array('production_order_no,invoice_no,invoice_date,customer_id', 'required','message'=>'{attribute} Cannnot be Empty'),
                     array('invoice_no', 'numerical', 'integerOnly'=>true),
                     
                     array('quantity,premium_rate,weight,fc_value,ex_rate,drawback_receivable,fps_receivable,mlfps_payable,freight_payable,insurance_payable,other_costs_payable,payment_received,clearance_cost_payable', 'numerical','message'=>'Please enter integer or decimal Value')  ,
                     array('production_order_no,proforma_no, invoice_date, customer_id,customer_id_hidden, quantity, unit_id, currency_id, ex_rate, inr_value, payment_due_date, bank_ref_no, payment_date, ecgc_payment_terms, shipment_board_date, loading_port, destination_port, shipping_bill_no, additional_bill_no, house_agent, feeder_vessel, clearance_customs_house, expected_eta_date, forwarder_name, mother_vessel, additional_date, premium_rate,  drawback_receivable,shipment_no, fps_receivable, mlfps_payable, information_fps_mlfps, freight_payable, clearance_cost_payable, insurance_payable, other_costs_payable,shipping_date,proformaInvoices,invoice_no', 'safe'),
                     // Please remove those attributes that should not be searched.
                     array('production_order_no, invoice_date, customer_id,unit_id, quantity,customer_id_hidden, weight, unit, fc_value, currency_id, ex_rate, inr_value, invoice_no, payment_due_date,proforma_no, bank_ref_no, payment_date, ecgc_payment_terms, shipment_board_date,shipping_date, loading_port, destination_port, shipping_bill_no, additional_bill_no, house_agent, feeder_vessel, clearance_customs_house, expected_eta_date, forwarder_name, mother_vessel, additional_date, premium_rate, shipment_no, drawback_receivable, fps_receivable, mlfps_payable, information_fps_mlfps, freight_payable, clearance_cost_payable, insurance_payable, other_costs_payable,invoice_no_from,invoice_no_to,invoice_date_first, invoice_date_last, shipment_board_date_first,shipment_board_date_last, shipment_no_from, shipment_no_to, invoice_no_from, invoice_no_to', 'safe', 'on'=>'search'),
                     array('additional_date,payment_due_date,shipment_board_date,invoice_date_first,weight,quantity,unit_id,customer_id,currency_id,ex_rate,premium_rate,shipment_board_date,payment_date,additional_bill_no,expected_eta_date, drawback_receivable,fps_receivable, mlfps_payable,freight_payable, clearance_cost_payable, insurance_payable,shipping_date,other_costs_payable,inr_value,fc_value','default','setOnEmpty'=>true),
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
            'unit' => array(self::BELONGS_TO, 'Units', 'unit_id'),
            'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
            'currency' => array(self::BELONGS_TO, 'Currency', 'currency_id'),
            'proformasales' => array(self::HAS_MANY, 'ProformaSales', 'invoice_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'production_order_no' => 'Production Order No :',
			'invoice_date' => 'Invoice Date',
			'customer_id' => 'Customer :',
			'quantity' => 'Quantity :',
			'weight' => 'Weight :',
			'unit_id' => 'Unit :',
			'fc_value' => 'FC Value',
			'currency_id' => 'Currency :',
			'ex_rate' => 'Ex Rate',
			'inr_value' => 'INR Value :',
			'invoice_no' => 'Invoice No',
			'payment_due_date' => 'Payment Due Date :',
			'bank_ref_no' => 'Bank Ref. No. :',
			'payment_date' => 'Bank Ref Date',
			'ecgc_payment_terms' => 'Payment Terms for ECGC :',
			'shipment_board_date' => 'Shipment on Board Date :',
			'loading_port' => 'Port of Loading :',
			'destination_port' => 'Port of Destination :',
			'shipping_bill_no' => 'Shipping Bill No :',
			'additional_bill_no' => 'Bill of Loading / Air Way Bill No :',
			'house_agent' => 'Customs House Agent :',
			'feeder_vessel' => 'Feeder Vessel :',
			'clearance_customs_house' => 'Clearance Customs House :',
			'expected_eta_date' => 'Expected ETA Date :',
			'shipping_date' => 'Shipping Date',
			'forwarder_name' => 'Forwarder Name :',
			'mother_vessel' => 'Mother Vessel :',
			'additional_date' => 'Date',
			'premium_rate' => 'Premium Rate :',
			'shipment_no' => 'Shipment No :',
			'drawback_receivable' => 'Draw back Receivable :',
			'fps_receivable' => 'FPS Receivable :',
			'mlfps_payable' => 'MLFPS Payable :',
			'information_fps_mlfps' => 'Information about FPS / MLFPS :',
			'freight_payable' => 'Freight Payable :',
			'clearance_cost_payable' => 'Clearance Cost Payable :',
			'insurance_payable' => 'Insurance Payable :',
			'other_costs_payable' => 'Any Other Costs Payable :',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
    protected function beforeSave ()
    {
        
        //convert to storage format
        if($this->invoice_date!=null)
        {
        $this->invoice_date = strtotime ($this->invoice_date);
        $this->invoice_date = date ('Y-m-d', $this->invoice_date);
        }
        if($this->payment_due_date!=null)
        {
        $this->payment_due_date = strtotime ($this->payment_due_date);
        $this->payment_due_date = date ('Y-m-d', $this->payment_due_date);
        }
        if($this->payment_date!=null)
        {
        $this->payment_date = strtotime ($this->payment_date);
        $this->payment_date = date ('Y-m-d', $this->payment_date);
        }
        if($this->shipment_board_date!=null)
        {
        $this->shipment_board_date = strtotime ($this->shipment_board_date);
        $this->shipment_board_date = date ('Y-m-d', $this->shipment_board_date);
        }
        if($this->expected_eta_date!=null)
        {
        $this->expected_eta_date = strtotime ($this->expected_eta_date);
        $this->expected_eta_date = date ('Y-m-d', $this->expected_eta_date);
        }
        if($this->shipping_date!=null)
        {
        $this->shipping_date = strtotime ($this->shipping_date);
        $this->shipping_date = date ('Y-m-d', $this->shipping_date);
        }
        if($this->additional_date!=null)
        {
        $this->additional_date = strtotime ($this->additional_date);
        $this->additional_date = date ('Y-m-d', $this->additional_date);
        }
        
        return parent::beforeSave ();
    }
    protected function afterFind ()
    {
        // convert to display format
        if($this->invoice_date!=null)
        {
        $this->invoice_date = strtotime ($this->invoice_date);
        $this->invoice_date = date ('d-m-Y', $this->invoice_date);
        }
        if($this->payment_due_date!=null)
        {
        $this->payment_due_date = strtotime ($this->payment_due_date);
        $this->payment_due_date = date ('d-m-Y', $this->payment_due_date);
        }
        if($this->payment_date!=null)
        {
        $this->payment_date = strtotime ($this->payment_date);
        $this->payment_date = date ('d-m-Y', $this->payment_date);
        }
        if($this->shipment_board_date!=null)
        {
        $this->shipment_board_date = strtotime ($this->shipment_board_date);
        $this->shipment_board_date = date ('d-m-Y', $this->shipment_board_date);
        }
        if($this->expected_eta_date!=null)
        {
        $this->expected_eta_date = strtotime ($this->expected_eta_date);
        $this->expected_eta_date = date ('d-m-Y', $this->expected_eta_date);
        }
        if($this->shipping_date!=null)
        {
        $this->shipping_date = strtotime ($this->shipping_date);
        $this->shipping_date = date ('d-m-Y', $this->shipping_date);
        }
        if($this->additional_date!=null)
        {
        $this->additional_date = strtotime ($this->additional_date);
        $this->additional_date = date ('d-m-Y', $this->additional_date);
        }
        
        parent::afterFind ();
    }
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
        if (isset($_GET['pageSize']))
        {
            Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
            unset($_GET['pageSize']);
        }
        
		$criteria=new CDbCriteria;
        
        if(isset($this->invoice_date_first) && isset($this->invoice_date_last) || isset($this->invoice_no_from) && isset($this->invoice_no_to))
        {
//            echo $this->invoice_no_from."---->".$this->invoice_no_to;
            if((empty($this->invoice_date_last) && !empty($this->invoice_date_first)) || (!empty($this->invoice_date_last) && empty($this->invoice_date_first)))
            {
                $criteria->addBetweenCondition('t.invoice_date','2011-01-01','2010-01-01');
            }
            elseif(empty($this->invoice_date_last) && empty($this->invoice_date_first))
            {
                
            }
            else
            {
                if(self::isValidDate($this->invoice_date_last) && self::isValidDate($this->invoice_date_first))
                {
                    $this->invoice_date_last = strtotime($this->invoice_date_last);
                    $this->invoice_date_last = date ('Y-m-d', $this->invoice_date_last);
                    $this->invoice_date_first = strtotime($this->invoice_date_first);
                    $this->invoice_date_first = date ('Y-m-d', $this->invoice_date_first);
                    $criteria->addBetweenCondition('t.invoice_date',''. $this->invoice_date_first .'',''. $this->invoice_date_last.'');
                }
                else
                {
                    $criteria->addBetweenCondition('t.invoice_date','2011-01-01','2010-01-01');
                }
            }
            if(empty($this->invoice_no_from) && empty($this->invoice_no_to))
            {
                $criteria->addBetweenCondition('t.invoice_no',''. $this->invoice_no_from .'',''. $this->invoice_no_to .'');
            }
            elseif(empty($this->invoice_no_from) && !empty($this->invoice_no_to) || !empty($this->invoice_no_from) && empty($this->invoice_no_to))
            {
                $criteria->addBetweenCondition('t.invoice_no','20110101','20100101');
            }
            elseif(!empty($this->invoice_no_from) && !empty($this->invoice_no_to))
            {
                $criteria->addBetweenCondition('t.invoice_no',''. $this->invoice_no_from .'',''. $this->invoice_no_to .'');
            }
        }
        else
        {
            $today= date("Y-m-d");
            $newdate = strtotime ('-10 day',strtotime($today));
            $newdate = date ( 'Y-m-d',$newdate);
            $criteria->addBetweenCondition('t.invoice_date',''. $newdate .'',''. $today.'');
        }
        $criteria->compare('invoice_date',$this->invoice_date,true);
		//$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('quantity',$this->quantity,true);
		$criteria->compare('weight',$this->weight,true);
		$criteria->compare('unit',$this->unit,true);
		$criteria->compare('fc_value',$this->fc_value,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('ex_rate',$this->ex_rate,true);
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
		$criteria->compare('shipping_date',$this->shipping_date,true);
		$criteria->compare('forwarder_name',$this->forwarder_name,true);
		$criteria->compare('mother_vessel',$this->mother_vessel,true);
		$criteria->compare('additional_date',$this->additional_date,true);
		$criteria->compare('premium_rate',$this->premium_rate,true);
		$criteria->compare('shipment_no',$this->shipment_no);
		$criteria->compare('drawback_receivable',$this->drawback_receivable,true);
		$criteria->compare('fps_receivable',$this->fps_receivable,true);
		$criteria->compare('mlfps_payable',$this->mlfps_payable,true);
		$criteria->compare('information_fps_mlfps',$this->information_fps_mlfps,true);
		$criteria->compare('freight_payable',$this->freight_payable,true);
		$criteria->compare('clearance_cost_payable',$this->clearance_cost_payable,true);
		$criteria->compare('insurance_payable',$this->insurance_payable,true);
		$criteria->compare('other_costs_payable',$this->other_costs_payable,true);
        
        if(!empty($this->customer_id))
        {
            $criteria->addCondition("t.customer_id = ".$this->customer_id);
        }

        // Sales Invoice Report
        $criteria->select = "array_to_string(array_agg(p.production_order_no),' / ') as production_order_no,array_to_string(array_agg(p.proforma_no),' / ') as proforma_no,c.currency_symbol,t.invoice_date,t.invoice_id,t.invoice_no,t.customer_id,t.fc_value,t.ex_rate,t.payment_due_date,t.inr_value,array_to_string(array_agg(dt.delivery_terms_code),' / ') as delivery_terms_code,array_to_string(array_agg(pt.payment_terms_code),' / ') as payment_terms_code,t.payment_received,t.shipment_no";
        $criteria->join = "LEFT JOIN proforma_sales m ON t.invoice_id = m.invoice_id LEFT JOIN proforma p ON p.proforma_invoice_id=m.proforma_invoice_id LEFT JOIN currency c ON c.currency_id=t.currency_id LEFT JOIN payment_terms pt on pt.payment_terms_id = p.payment_terms_id LEFT JOIN delivery_terms dt on dt.delivery_terms_id = p.delivery_terms_id";
        $criteria->group = "t.invoice_id,c.currency_symbol,t.invoice_date,t.customer_id,t.invoice_no,t.fc_value,t.ex_rate,t.inr_value";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort' => array(
                            'defaultOrder' => 'invoice_no ASC',
                            ),
            'pagination'=>array(
                                'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
                                ),
		));
	}
    public function page_size()
    {
        return $this->pagesize = 10; // Change value of page size only in this function, as this information needs to be passed to multiple places
    }
    
    public function search_due_report()
	{

        $criteria=new CDbCriteria;
        
        if (isset($_GET['pageSize']))
        {
            Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
            unset($_GET['pageSize']);
        }
        
//        SalesInvoice::payment_received_update();
        
        if(isset($_GET['year_first']) && isset($_GET['year_last']) || isset($_GET['SalesInvoice']['invoice_no_from']) && isset($_GET['SalesInvoice']['invoice_no_to']))
        {
            $startdate= $_GET['year_first'];
            $enddate= $_GET['year_last'];
           
            if(!empty($_GET['SalesInvoice']['invoice_no_from']) && !empty($_GET['SalesInvoice']['invoice_no_to']))
            {
                $invoice_start = $_GET['SalesInvoice']['invoice_no_from'];
                $invoice_end = $_GET['SalesInvoice']['invoice_no_to'];
                $criteria->addBetweenCondition("t.invoice_no",$invoice_start,$invoice_end);
            }
            if(!empty($_GET['SalesInvoice']['production_order_no']))
            {
                $order = $_GET['SalesInvoice']['production_order_no'];
                $criteria->addCondition("p.proforma_invoice_id = ".$order);
            }
            if(!empty($_GET['SalesInvoice']['proforma_no']))
            {
                $proforma = $_GET['SalesInvoice']['proforma_no'];
                $criteria->addCondition("p.proforma_invoice_id = ".$proforma);
            }
        }
        else
        {
            $today = date('Y');
            $startdate = $today."-04-01";
            $enddate = ( $today + 1)."-03-31";
        }
        
        
        $criteria->select = "array_to_string(array_agg(p.production_order_no),' / ') as production_order_no,array_to_string(array_agg(p.proforma_invoice_id),' / ') as proforma_invoice_id,t.customer_id,t.invoice_date,t.invoice_no,t.fc_value,t.ex_rate,t.payment_due_date,array_to_string(array_agg(pt.payment_terms_code),' / ') as payment_terms_code,max(cr.currency_symbol) currency_symbol,t.shipment_no,t.invoice_id";
        $criteria->join = "LEFT JOIN proforma_sales m ON t.invoice_id = m.invoice_id LEFT JOIN proforma p ON p.proforma_invoice_id=m.proforma_invoice_id LEFT JOIN customer cs on cs.customer_code_id = t.customer_id LEFT JOIN payment_terms pt on pt.payment_terms_id = p.payment_terms_id LEFT JOIN currency cr on cr.currency_id = t.currency_id";
        $criteria->addCondition('payment_due_date is not null ');
        $criteria->group = "t.invoice_id";
        
//        $criteria->addCondition("t.fc_value != t.payment_received");
        $criteria->addBetweenCondition("t.invoice_date",$startdate,$enddate);
//        $criteria->order = "t.payment_due_date ASC";
        
        $invoice=SalesInvoice::model()->findAll($criteria);

        $net_total_due = 0;
        foreach($invoice as $res)
        {

            $received_amt = $this->payment_due_received($res->invoice_id);

            if($received_amt[0] == 0)
                $received_amt[0] = "0.00";
     //       echo $res->fc_value."---->".$received_amt."<br>";
            if($received_amt[0] == $res->fc_value)
            {
                
            }
            else
            {
                $due_fc = $res->fc_value - $received_amt[0];
                $due_inr = $due_fc * $res->ex_rate;
                $this->net_total_due += ($due_fc*$res->ex_rate);
//               echo "<br>";
                if($received_amt[1] == null)
                {
                    $receipt_dte = "";
                }
                elseif($received_amt[1] != null)
                {
//                    echo count($received_amt[1][0])."--->";
                    for($n=0;$n<count($received_amt[1][0]);$n++)
                    {
//                        echo $received_amt[1][0][$n];
                          $receipt_dte .= $received_amt[1][0][$n];
                            if($n != count($received_amt[1][0])-1)
                                $receipt_dte .= " / ";
                    }
                }

                $payment_due = date('Y-m-d',strtotime($res->payment_due_date));
                
                $this->data[$this->count_j] = array('production_order_no'=>$res->production_order_no,'proforma_invoice_id'=>$res->proforma_invoice_id,'invoice_no'=>$res->invoice_no,'shipment_no'=>$res->shipment_no,'invoice_date'=>$res->invoice_date,'fc_value'=>$res->fc_value,'payment_terms_code'=>$res->payment_terms_code,'payment_due_date'=>$res->payment_due_date,'payment_due'=>$payment_due,'amt_received'=>$received_amt[0],'received_on'=>$receipt_dte,'ex_rate'=>$res->ex_rate,'currency_symbol'=>$res->currency_symbol,'due_fc' => $due_fc,'due_inr' => $due_inr);
            }
            $receipt_dte = "";
            $this->count_j++;
            //            echo $inv->fc_value."<br>";
        }
        
        $dataProvider = new CArrayDataProvider($this->data, array(
                                                                  'keyField' => 'production_order_no',
                                                                  'pagination'=>array(
                                                                                      'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
                                                                                      ),
                                                                                ));
        
        $sort = new CSort();
        
        // One attribute for each column of data
        $sort->attributes = array(
                                  'invoice_no',
                                  'payment_due',
                                  );
        
//         $sort->defaultOrder = 'payment_due_date ASC';
//        $sort->route = 'SalesInvoice/payment_due_report';
        $dataProvider->sort = $sort;
        $dataProvider->sort->defaultOrder='payment_due ASC';

            return $dataProvider;
    }
    
    public $sub_count = array();
    public function search_due_report_sub_total()
	{
//        SalesInvoice::payment_received_update();
        
        if(isset($_GET['year_first']) && isset($_GET['year_last']))
        {
            $startdate= $_GET['year_first'];
            $enddate= $_GET['year_last'];
        }
        else
        {
            $today= date('Y');
            $startdate = $today."-04-01";
            $enddate = ( $today + 1)."-03-31";
        }
//        $sql="Select (sum((fc_value - payment_received) * ex_rate)) as value,to_char(payment_due_date,'yyyymm') as date ,count(to_char(payment_due_date,'yyyymm')) as count from  sales_invoice where invoice_date between  '". $startdate ."' and '". $enddate."' and fc_value != payment_received group by to_char(payment_due_date,'yyyymm') order by to_char(payment_due_date,'yyyymm')";
        
    $sql="Select fc_value,to_char(payment_due_date,'yyyymm') as date ,invoice_id,ex_rate from  sales_invoice where invoice_date between  '". $startdate ."' and '". $enddate."' group by invoice_id,to_char(payment_due_date,'yyyymm') order by to_char(payment_due_date,'yyyymm')";
//        echo $sql;

        $result = Yii::app()->db->createCommand($sql)->queryAll();
        $sub_total = array();
        
//        echo count($result);
        $count = 1;
        foreach($result  as $key)
        {
            $rcd_amt = $this->payment_due_received($key['invoice_id']);
            
            if($rcd_amt[0] == 0)
                $rcd_amt[0] = "0.00";
//            echo $key['fc_value']."--->".$rcd_amt[0]."<br>";
            $fcval[] =array();
            if($rcd_amt[0] != $key['fc_value'])
            {
//                var_dump();
//                echo $key['date']."--->".$this->sub_count[$key['date']]."----->".$sub_total[$key['date']]."<br>";
                if(array_key_exists($key['date'],$sub_total))
                {
                    $sub_total[$key['date']] = $sub_total[$key['date']] + (($key['fc_value']-$rcd_amt[0]) * $key['ex_rate']);
                    $this->sub_count[$key['date']] += 1;
                }
                else
                {
                    $sub_total[$key['date']] = ($key['fc_value']-$rcd_amt[0]) * $key['ex_rate'];
                    $this->sub_count[$key['date']] = 1;
                }
//                $fcval[] = ($key['fc_value']-$rcd_amt[0]) * $key['ex_rate'];
//                $date_val[] = $key['date'];
            }
//                  echo $key['date']."--->".$this->sub_count[$key['date']]."----->".$sub_total[$key['date']]."<br>";
        }
//        var_dump($sub_total);
////            $sub_total[$key["date"]] = $key["value"];
////            $this->sub_count[$key["date"]] = $key["count"];
//        }
        return $sub_total;
    }
    public function search_due_sub_total_count()
	{
        return $this->sub_count;
    }
    static public function due_report_total()
	{
//        SalesInvoice::payment_received_update();

        if(isset($_GET['year_first']) && isset($_GET['year_last']))
        {
            $startdate= $_GET['year_first'];
            $enddate= $_GET['year_last'];
        }
        else
        {
            $today= date('Y');
            $startdate = $today."-04-01";
            $enddate = ( $today + 1)."-03-31";
        }
        $sql="Select fc_value,payment_received,ex_rate from sales_invoice where fc_value != payment_received and invoice_date between '". $startdate ."' and '". $enddate."'";
        $result = Yii::app()->db->createCommand($sql)->queryAll();
        $sum = 0;
        foreach($result  as $key)
        {
            $sum += ($key["fc_value"] - $key["payment_received"]) * $key["ex_rate"];
        }
        return $sum;
    }
    
    static public function commission_report()
	{
        if (isset($_GET['pageSize']))
        {
            Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
            unset($_GET['pageSize']);
        }
        
        $criteria=new CDbCriteria;
        $criteria->select = "p.production_order_no,p.proforma_invoice_id,c.currency_symbol,p.agent_id,t.invoice_date,t.invoice_no,t.customer_id,t.fc_value,p.agent_commision,cp.exchange_rate as exchangerate,t.ex_rate,cp.paid_on,cr.customer_code,p.agent_id,cp.total_commission,cm.commission_value";
        $criteria->join = "LEFT JOIN proforma_sales m ON t.invoice_id = m.invoice_id LEFT JOIN proforma p ON p.proforma_invoice_id=m.proforma_invoice_id LEFT JOIN commission_mapping cm on t.invoice_id = cm.invoice_id LEFT JOIN commission_payment cp on cp.commission_payment_id = cm.commission_payment_id LEFT JOIN currency c ON c.currency_id=t.currency_id LEFT JOIN customer cr on cr.customer_code_id = t.customer_id";
        $criteria->order = "t.invoice_no ASC";

        if(isset($_GET['choice']) && !empty($_GET['choice']) && isset($_GET['year_first']) && isset($_GET['year_last']))
		{
            $choice= $_GET['choice'];
            $startdate= $_GET['year_first'];
            $enddate= $_GET['year_last'];
            
            if($choice == "paid")
            {
                $criteria->addCondition("cm.invoice_id is not null");
            }
            elseif($choice == "non_paid")
            {
                $criteria->addCondition("cm.invoice_id is null");
            }
            else
            {

            }
            if(isset($_GET['CommissionPayment']['agent_id']) && !empty($_GET['CommissionPayment']['agent_id']))
            {
                 $agent = $_GET['CommissionPayment']['agent_id'];
                 $criteria->addCondition("p.agent_id = ".$agent);
            }

            $criteria->addCondition("p.agent_id is not null");
            $criteria->addCondition("p.agent_commision is not null");
            $criteria->addBetweenCondition("t.invoice_date",$startdate,$enddate);
        }
        else
        {
            $today= date('Y');
            $startdate = $today."-04-01";
            $enddate = ( $today + 1)."-03-31";
            $criteria->addCondition("cm.invoice_id is not null");
            $criteria->addCondition("p.agent_id is not null");
            $criteria->addCondition("p.agent_commision is not null");
            $criteria->addBetweenCondition("t.invoice_date",$startdate,$enddate);
        }
        return new CActiveDataProvider('SalesInvoice', array(
                                                             'criteria'=>$criteria,
                                                             'sort' => array(
                                                                             'defaultOrder' => 'invoice_date ASC',
                                                                             ),
                                                             'pagination'=>array(
                                                                                 'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
                                                                                 ),
                                                             ));
    }
    static public function search_fob_report()
	{
        if (isset($_GET['pageSize']))
        {
            Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
            unset($_GET['pageSize']);
        }
        
        if(isset($_GET['year_first']) && isset($_GET['year_last']))
        {
            $startdate = $_GET['year_first'];
            $enddate = $_GET['year_last'];
        }
        else
        {
            $today= date('Y');
            $startdate = $today."-04-01";
            $enddate = ( $today + 1)."-03-31";
        }
        
        $criteria=new CDbCriteria;
        $criteria->select = "array_to_string(array_agg(distinct p.production_order_no),' / ') as production_order_no, max(c.currency_symbol) as currency_symbol,t.invoice_date,t.invoice_no,array_to_string(array_agg(cr.customer_code),' / ') as customer_code,t.fc_value,t.ex_rate,t.freight_payable,t.insurance_payable,t.shipping_bill_no,t.shipping_date,t.bank_ref_no,t.payment_date,t.additional_bill_no,t.additional_date,array_to_string(array_agg(pr.date_of_realisation),' / ') as date_of_realisation";
        $criteria->join = "LEFT JOIN proforma_sales m ON t.invoice_id = m.invoice_id LEFT JOIN proforma p ON p.proforma_invoice_id=m.proforma_invoice_id LEFT JOIN currency c ON c.currency_id=t.currency_id LEFT JOIN customer cr on cr.customer_code_id = t.customer_id LEFT JOIN payment_receipt_mapping prm on prm.invoice_id = t.invoice_id LEFT JOIN payment_receipt pr on pr.payment_receipt_id = prm.payment_receipt_id";
        $criteria->group = "t.invoice_id";
        $criteria->addBetweenCondition("t.invoice_date",$startdate,$enddate);

		return new CActiveDataProvider('SalesInvoice', array(
                                                    'criteria'=>$criteria,

                                                    'pagination'=>array(
                                                                        'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
                                                                        ),
                                                             'sort' => array(
                                                                             'defaultOrder' => 'invoice_no ASC',
                                                                             ),
                                                    ));
    }
    static public function search_current_sales()
	{
        if (isset($_GET['pageSize']))
        {
            Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
            unset($_GET['pageSize']);
        }
        
//        SalesInvoice::payment_received_update();
        if(isset($_GET['year_first']) && isset($_GET['year_last']))
        {
            $startdate = $_GET['year_first'];
            $enddate = $_GET['year_last'];
        }
        else
        {
            $today= date('Y');
            $startdate = $today."-04-01";
            $enddate = ( $today + 1)."-03-31";
        }
        
        $criteria=new CDbCriteria;
        
        $criteria->select = "array_to_string(array_agg(p.production_order_no),' / ') as production_order_no,array_to_string(array_agg(p.proforma_invoice_id),' / ') as proforma_invoice_id,max(c.currency_symbol) as currency_symbol,t.invoice_date,t.invoice_no,array_to_string(array_agg(cr.customer_code),' / ') as customer_code,array_to_string(array_agg(cr.customer_name),' / ') as customer_name,t.fc_value,t.ex_rate,t.payment_received,t.payment_due_date,array_to_string(array_agg(pt.payment_terms_code),' / ') as payment_terms_code,t.invoice_id,t.inr_value,t.shipment_no";
        $criteria->join = "LEFT JOIN proforma_sales m ON t.invoice_id = m.invoice_id LEFT JOIN proforma p ON p.proforma_invoice_id=m.proforma_invoice_id LEFT JOIN currency c ON c.currency_id=t.currency_id LEFT JOIN customer cr on cr.customer_code_id = t.customer_id left join payment_terms pt on pt.payment_terms_id = p.payment_terms_id";
        $criteria->group = "t.invoice_id";
        $criteria->order = "t.invoice_no ASC";
        $criteria->addBetweenCondition("t.invoice_date",$startdate,$enddate);

//        $query = "update sales_invoice set payment_received=0";
//        $command = Yii::app()->db->createCommand($query);
//        $command->execute();
        
        return new CActiveDataProvider('SalesInvoice', array(
                                                             'criteria'=>$criteria,
                                                             'sort' => array(
                                                                            'defaultOrder' => 'invoice_date ASC',
                                                                            ),
                                                             'pagination'=>array(
                                                                                 'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
                                                                                 ),
                                                             ));
    }
    static public function current_sales_total()
	{
//        SalesInvoice::payment_received_update();

        date_default_timezone_set('UTC');
        if(isset($_GET['year_first']) && isset($_GET['year_last']))
        {
            $startdate = $_GET['year_first'];
            $enddate = $_GET['year_last'];
        }
        else
        {
            $today= date('Y');
            $startdate = $today."-04-01";
            $enddate = ( $today + 1)."-03-31";
        }
        $sql="Select fc_value,ex_rate,inr_value from sales_invoice where invoice_date between '". $startdate ."' and '". $enddate."'";
        $result = Yii::app()->db->createCommand($sql)->queryAll();
        $sum = 0;
        foreach($result  as $key)
        {
            $sum += round(($key["inr_value"]));
        }
        return $sum;
    }
    static public function payment_received_update()
    {
        $sql="select sum(actual_invoice_value) as value,invoice_id from payment_receipt where invoice_id in (select invoice_id from sales_invoice) group by payment_receipt.invoice_id";
        $result = Yii::app()->db->createCommand($sql)->queryAll();
        foreach($result  as $key)
        {
            $invoice_value[] = $key["value"];
            $invoice_id[] = $key["invoice_id"];
        }
        for($i=0;$i<count($invoice_id);$i++)
        {
            $sql_map = "select proforma_invoice_id,invoice_id from proforma_sales where invoice_id =".$invoice_id[$i];
            $result = Yii::app()->db->createCommand($sql_map)->queryAll();
            $pid=0;
            if(!empty($result))
            {
                foreach($result  as $key)
                {
                    $sql1 = "select proforma_invoice_id,count(invoice_id) as count_invoice from proforma_sales where proforma_invoice_id =".$key["proforma_invoice_id"]."group by proforma_invoice_id";
                    $res1 = Yii::app()->db->createCommand($sql1)->queryAll();
                    foreach($res1  as $key1)
                    {
                        $sql2 = "select proforma_invoice_id,sum(advance_amount) as advance from payment_receipt where proforma_invoice_id =".$key["proforma_invoice_id"]."group by proforma_invoice_id";
                        $res2 = Yii::app()->db->createCommand($sql2)->queryAll();
                        if(!empty($res2))
                        {
                            foreach($res2  as $key2)
                            {
                                $pid += ($key2["advance"])/$key1["count_invoice"];
                            }
                        }
                    }
                }
                 $received_value[]= $invoice_value[$i]+$pid;
                 $received_id[]=$invoice_id[$i];
            }
            else
            {
                 $received_id[]=$invoice_id[$i];
                 $received[$invoice_id[$i]]= $invoice_value[$i];
            }
        }
        for($j=0;$j<count($received_value);$j++)
        {
            $query = "update sales_invoice set payment_received=".$received_value[$j]."where invoice_id =".$received_id[$j];
            $command = Yii::app()->db->createCommand($query);
            $success = $command->execute();
        }
    }
    static public function search_order()
	{
        $criteria=new CDbCriteria;

        if(isset($_GET['Search']))
		{
            $option = $_GET['Search']['invoice'];

            if($option == 1)
            {
                $invoice_no = $_GET['Search']['search_box'];
                $criteria->select = "p.production_order_no,t.invoice_date as date,t.invoice_no as invoice_no";
                $criteria->join = "LEFT JOIN proforma_sales m ON t.invoice_id = m.invoice_id LEFT JOIN proforma p ON p.proforma_invoice_id=m.proforma_invoice_id";
                $criteria->addCondition("t.invoice_no = ".$invoice_no);
                return new CActiveDataProvider('SalesInvoice', array(
                                                                     'criteria'=>$criteria,
                                                                     ));
            }
            elseif($option == 2)
            {
                $proforma_no = $_GET['Search']['search_box'];
                $criteria->select = "t.production_order_no,t.proforma_date as date,t.proforma_no as invoice_no";
                $criteria->addCondition("t.proforma_no = '".$proforma_no."'");
                return new CActiveDataProvider('Proforma', array(
                                                                     'criteria'=>$criteria,
                                                                     ));
            }
            else
            {
                $order_no = $_GET['Search']['search_box'];
                $criteria->select = "t.production_order_no,t.proforma_date as date,t.proforma_no as invoice_no";
                $criteria->addCondition("t.production_order_no = '".$order_no."'");
                return new CActiveDataProvider('Proforma', array(
                                                                 'criteria'=>$criteria,
                                                                 ));
            }
        }
        else
        {
            $no = "0";
            $criteria->select = "t.invoice_no";
            $criteria->addCondition("t.invoice_no = '".$no."'");
            return new CActiveDataProvider('SalesInvoice', array(
                                                             'criteria'=>$criteria,
                                                             ));
        }
    }
    static public function financial_year($input_date)
	{
        date_default_timezone_set('UTC');

        $fyStart = "4/1";
        $fyEnd = "3/31";

        $cur_date = strtotime($input_date);

        $inputyear = strftime('%Y',$cur_date);

        $a=$fyStart."/".$inputyear;

        $fystartdate = strtotime($a);

        $b=$fyEnd."/".($inputyear+1);
        $fyenddate = strtotime($b);

        if($cur_date >= $fystartdate && $cur_date <= $fyenddate)
        {
            $year = strftime('%Y',$fystartdate);
            $datefirst = $year;
            $datelast = ($year + 1);
        }
        else
        {
            $y= strftime('%Y',$fystartdate);
            $y=$y - 1;

            $datefirst = $y;
            $datelast = ($y + 1);
        }
        return $datefirst."-".$datelast;
    }
    public function sales_total()   // for Total Proforma value displayed in Proforma Invoice Report.
    {
        //customer name
        if(isset($_GET['SalesInvoice']['customer_id']))
        {
            $customer_id = $_GET['SalesInvoice']['customer_id'];
            if(!empty($customer_id))
                $customer_condition = " customer_id =".$customer_id;
            else
                $customer_condition = "";
        }
        else
        {
            $customer_condition = "";
        }
        $invoice_condition = "";
        //Invoice number
        if(isset($_GET['SalesInvoice']['invoice_no_from']) && isset($_GET['SalesInvoice']['invoice_no_to']))
        {
            $invoice_no_from=$_GET['SalesInvoice']['invoice_no_from'];
            $invoice_no_to=$_GET['SalesInvoice']['invoice_no_to'];
            if(!empty($invoice_no_from) && !empty($invoice_no_to))
            {
                if($customer_condition != "")
                    $invoice_condition = " and invoice_no between ".$invoice_no_from." and ".$invoice_no_to;
                else
                    $invoice_condition = " invoice_no between ".$invoice_no_from." and ".$invoice_no_to;
            }
            elseif(empty($invoice_no_from) && empty($invoice_no_to))
            {
                $invoice_condition = "";
            }
            elseif(empty($invoice_no_from) && !empty($invoice_no_to) || !empty($invoice_no_from) && empty($invoice_no_to))
            {
                $invoice_condition = " invoice_no between '20110101' and '20100101' ";
            }
        }
        //Date
        if(isset($_GET['invoice_date_first']) && isset($_GET['invoice_date_last']))   // if date is choosen by user
        {
            if(!empty($_GET['invoice_date_first']) && !empty($_GET['invoice_date_last']))
            {
                if(self::isValidDate($_GET['invoice_date_first']) && self::isValidDate($_GET['invoice_date_last']))
                {
                    $first = strtotime($_GET['invoice_date_first']);
                    $first = date ('Y-m-d', $first );
                    $last = strtotime($_GET['invoice_date_last']);
                    $last= date ('Y-m-d', $last);
                    if($customer_condition != "" || $invoice_condition != "")
                        $date_condition = " and invoice_date between '".$first."' and '".$last."'";
                    else
                        $date_condition = " invoice_date between '".$first."' and '".$last."'";
                    
                }
                else
                {
                    if($customer_condition != "" || $invoice_condition != "")
                        $date_condition = " and invoice_date between '2011-01-01' and '2010-01-01'";
                    else
                        $date_condition = " invoice_date between '2011-01-01' and '2010-01-01'";                }
            }
            elseif((empty($_GET['invoice_date_first']) && !empty($_GET['invoice_date_last'])) || (empty($_GET['invoice_date_last']) && !empty($_GET['invoice_date_first'])))
            {
                if($customer_condition != "" || $invoice_condition != "")
                    $date_condition = " and invoice_date between '2011-01-01' and '2010-01-01'";
                else
                    $date_condition = " invoice_date between '2011-01-01' and '2010-01-01'";
            }
        }
        else                            // if date is not choosen by user,set default dates
        {
            date_default_timezone_set('UTC');
            $today= date('Y-m-d');
            $newdate = strtotime ('-10 day',strtotime($today));
            $newdate = date ( 'Y-m-d',$newdate);
            if($customer_condition != "")
                $date_condition = " and invoice_date between '".$newdate."' and '".$today."'";
            else
                $date_condition = " invoice_date between '".$newdate."' and '".$today."'";
        }
        $sql="Select sum(inr_value) as inr_value from  sales_invoice ";
        if($date_condition != "" || $customer_condition != "" || $invoice_condition != "" )
        {
            $sql .= " where ";
        }
        $sql .= $customer_condition." ".$invoice_condition." ".$date_condition;
       //  echo "<br>".$sql;
        
        $result = Yii::app()->db->createCommand($sql)->queryAll();
        $sum = 0;
        
        foreach($result  as $key)
        {
            $sum = $key["inr_value"];
        }
        return $sum;
        
    }
    static public function isValidDate($date)
    {
        if(preg_match("/^(\d{2})-(\d{2})-(\d{4})$/", $date, $matches))
        {
            if(checkdate($matches[2], $matches[1], $matches[3]))
            {
                return true;
            }
        }
    }
    
    public function payment_due_received($data)
    {
//        echo $data."<br>";
//    $fun = split('-',$data);
//    echo $data."---->".$fun[0]."<br>";
        $received_proforma_value = 0;
        $received_invoice_value = 0;
        $received_proforma_val = 0;
        $dte_of_rlsn = array();
        $dte_of_rcpt = array();
        $sql="select proforma_invoice_id from proforma_sales where invoice_id=".$data;
        //echo $sql;
        $result = Yii::app()->db->createCommand($sql)->queryAll();
        foreach($result  as $key)
        {
           // $proforma_invoice_id[] = $key["proforma_invoice_id"];
            $sql="select proforma_invoice_id,count(invoice_id) as count_invoice from proforma_sales where proforma_invoice_id = ".$key['proforma_invoice_id']." group by proforma_invoice_id";
         //   echo $sql;
            $res1 = Yii::app()->db->createCommand($sql)->queryAll();
            foreach($res1 as $key1)
            {
             //   echo $key1['proforma_invoice_id']."<br>";
                $sql="select sum(advance_amount) as advance_amt,to_char(date_of_receipt,'dd-mm-yyyy') as date_of_receipt from payment_receipt_mapping as prm join payment_receipt as pr on pr.payment_receipt_id=prm.payment_receipt_id where proforma_invoice_id=".$key1['proforma_invoice_id']." group by proforma_invoice_id,date_of_receipt";
//                echo $sql;
                $result = Yii::app()->db->createCommand($sql)->queryAll();
                        if(!empty($result))
                        {
                            foreach($result  as $row)
                            {
                                $received_proforma_val += $row["advance_amt"];
                                $dte_of_rcpt[] = $row["date_of_receipt"]." (A)";
//                                echo "<br>";
                            }
                            $received_proforma_value = ($received_proforma_val)/$key1["count_invoice"];
//                            echo var_dump($dte_of_rcpt)."---->".$key1['proforma_invoice_id']."--->".$received_proforma_value."<br>";
                        }
            }
        }
        $sql="select sum(actual_invoice_value) as actual_invoice,to_char(date_of_realisation,'dd-mm-yyyy') as date_of_realisation from payment_receipt_mapping as prm join payment_receipt as pr on pr.payment_receipt_id=prm.payment_receipt_id where invoice_id=".$data." group by invoice_id,date_of_realisation";
        //                echo $sql;
        $res2 = Yii::app()->db->createCommand($sql)->queryAll();
        if(!empty($res2))
        {
            foreach($res2  as $row2)
            {
                 $received_invoice_value += $row2["actual_invoice"];
                $dte_of_rlsn[] = $row2["date_of_realisation"];
//                echo "<br>";
            }
//            echo "inv".$received_invoice_value;
//            echo "<br>";
        }
        
              $dte[] = array_merge((array)$dte_of_rlsn,(array)$dte_of_rcpt);

            return array($received_proforma_value + $received_invoice_value , $dte) ;
    }
    public function payment_due_received_date($data)
    {
        $in = $data."-function";
        $this->payment_due_received($in);
        
    }
    

}
?>