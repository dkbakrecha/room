<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>

<div class="hr-line"></div>

<div class="container" id="roomContent">
    <div class="row">
        <div class="col-lg-3">
            <?php echo $this->element('sidebar_user'); ?>
        </div>
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Listing
                    <a class='btn btn-primary btn-top-panel pull-right' href='<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'mylisting')); ?>'>Back</a>
                </div>
                <div class="panel-body">
                    <?php
                    echo $this->Form->create('Room', array('class' => 'form-horizontal room-form'));
                    echo $this->Form->hidden('id');
                    ?>    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">List For</label>
                        <div class="col-sm-7">
                            <?php
                            echo $this->Form->input('list_for', array(
                                'class' => 'form-control tip-attached',
                                'label' => false,
                                'options' => array('0' => 'Rent', '1' => 'Sale'),
                                'title' => 'Not update and show in edit mode'
                            ));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">    
                        <label class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-7">
                            <?php
                            echo $this->Form->input('cate', array(
                                'class' => 'form-control tip-attached',
                                'label' => false,
                                'options' => $cateList,
                                'placeholder' => 'Select Category',
                                'title' => 'Not update and show in edit mode'
                            ));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-7">
                            <?php
                            echo $this->Form->input('title', array(
                                'class' => 'form-control',
                                'label' => false,
                                'placeholder' => 'Listing Title'
                            ));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-7">
                            <?php
                            echo $this->Form->input('address', array(
                                'type' => 'text',
                                'required' => true,
                                'class' => 'form-control',
                                'label' => false,
                                'placeholder' => 'Location Address'
                            ));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                                            <label class="col-sm-2 control-label">Price</label>
                        <div class="col-sm-7">
                            <?php
                            echo $this->Form->input('price', array(
                                'class' => 'form-control',
                                'label' => false,
                                'placeholder' => 'Price'
                            ));
                            ?>
                        </div>
</div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('description', array(
                                'required' => true,
                                'class' => 'form-control',
                                'label' => false,
                                'placeholder' => 'Listing description ...'
                            ));
                            ?>
                        </div>
                    </div>

                    <hr class="dotted">                        
                    <button type="submit" class="goyal btn btn-primary btn-lg turquoise col-lg-offset-2 col-lg-4">Save This Listing</button>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Warper Ends Here (working area) -->    

<script type="text/javascript">
  $('#RoomAddForm').validate({
  messages: {
    'data[Room][title]': {
      required: "Please enter listing title for quick understand about it.",
    },
    'data[Room][address]':{
      required: "Please update correct address to find it easyly in search result",
    },
    'data[Room][description]':{
      required: "Please give detail description about listing, It help listing show on social media.",
    }
  }
});
</script>