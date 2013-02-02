
/* @var $this StudentController */
/* @var $dataProvider CActiveDataProvider */
    <div id="entriesheader">
    <div id="entriesrow">
    <div class="selectbox"></div>
    <div class="serial"><a href="#">S.No</a></div>
    <div class="date"><a href="#">Date</a></div>
    <div class="projecticons"></div>
    <div class="projectname"><a href="#">Projects</a></div>
    <div class="workinghours"><a href="#">Working Hours</a></div>
    <div class="comments"><a href="#">Comments</a></div>
    </div>
    </div>
    
    <div id="entriesbox">
    
        <div id="entries">
        <div id="entriesrow">
        <div class="selectbox"><input name="selectentry" type="radio"></div>
        <div class="serial">2</div>
        <div class="date">22 Sep 2012</div>
        <div class="projecticons"><img src="images/user3.png"></div>
        <div class="projectname">Bahianinha 1.2</div>
        <div class="workinghours">2.00</div>
        <div class="comments">Watermark Placement in Image</div>
        </div>
        </div>

    </div>
    
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
