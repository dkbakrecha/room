<?php echo $this->Form->Create('Search', array('id' => 'searchForm', 'role' => 'form')); ?>
<?php /* 
  <div class="row">
  <div class="col-lg-12">
  <h4><?php echo __("Price"); ?></h4>
  <div class=''>
  <p>
  <label for="amount">Range from :</label>
  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
  </p>
  <div id="slider-range"></div>
  <?php echo $this->Form->input('amountmin', array('label' => false)); ?>-
  <?php echo $this->Form->input('amountmax', array('label' => false)); ?>
  <input type='button' value="GO" onclick="searchRooms()">
  </div>
  </div>
  </div>
<?php /* * 
 */ ?>

<div class="row">
    <div id="accordion" class="panel-group box-inner">
        <?php //pr(@$search); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class=""><span class="glyphicon glyphicon-folder-close">
                        </span>List For</a>
                </h4>
            </div>
            <div class="panel-collapse in" id="collapseTwo" style="height: auto;">
                <div class="panel-body">

                    <?php
                    $options = array('' => 'all', '0' => 'For Rent', '1' => 'For Sale');
                    $attributes = array('legend' => false,'onClick' => 'searchRooms()','class' => 'filter_listfor');
                    echo $this->Form->radio('list_for', $options, $attributes);
                    ?>
                </div>
            </div>
        </div>

    </div>
    
    <div id="accordion" class="panel-group box-inner">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class=""><span class="glyphicon glyphicon-th">
                        </span>Listing Type</a>
                </h4>
            </div>
            <div class="panel-collapse in" id="collapseOne" style="height: auto;">
                <div class="panel-body">

                    <?php
                    if (!empty($category)) {
                        //pr($category);
                        $optionCategory = array();
                        foreach ($category as $value => $label) {
                            //pr($label);
                            $optionCategory[] = array(
                                'name' => $label,
                                'value' => $value,
                                'onClick' => 'searchRooms()',
                                'div' => ''
                            );
                        }
                        //pr($optionCategory);
                        echo $this->Form->input('category_id', array(
                            'label' => false,
                            'type' => 'select',
                            'multiple' => 'checkbox',
                            'options' => $optionCategory,
                            //'selected' => @$search['Search']['category_id'],
                                )
                        );
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>


</div>

<?php /*
  <div class="row">
  <div class="col-lg-12">
  <h4>Brand</h4>
  <?php
  if (!empty($brand))
  {
  //pr($statics);
  $optionBrand = array();
  foreach ($brand as $value => $label) {
  $optionBrand[] = array(
  'name' => $label,
  'value' => $value,
  'onClick' => 'searchProducts()',
  );
  }


  echo $this->Form->input('brand_id', array(
  'label' => false,
  'type' => 'select',
  'multiple' => 'checkbox',
  'options' => $optionBrand,
  'selected' => @$search['Search']['brand_id'],
  )
  );
  }
  ?>
  </div>
  </div>
 * 
 */ ?>

<?php echo $this->Form->end(); ?>


<!--<div class="row">
    <div class="banner-wrap">
        <a class="main_link" href="#">
            <figure><i class="fa fa-truck fa-4x"></i></figure>
            <h5><span>Free Shipping</span><br> on orders over <i class="fa fa-inr"></i> 500.</h5>
            <p>This offer is valid on all our store items.</p>
        </a>
    </div>
    
    <div class="banner-wrap">
        <a class="main_link" href="#">
            <figure><i class="fa fa-shield fa-4x"></i></figure>
            <h5><span>100% RISK FREE</span><br> CLIENT Setification</h5>
            <p>This offer is valid on all our store items.</p>
        </a>
    </div>
    
    <div class="banner-wrap">
        <a class="main_link" href="#">
            <figure><i class="fa fa-phone fa-4x"></i></figure>
            <h5><span>247 Supports</span><br> on orders over <i class="fa fa-inr"></i> 500.</h5>
            <p>This offer is valid on all our store items.</p>
        </a>
    </div>
</div>-->
<?php /*
  <script type="text/javascript">
  $(function () {
  var min = 0;
  var max = 500;

  <?php if(isset($search['Search']['amountmin']) && !empty($search['Search']['amountmin'])){ ?>
  min = '<?php echo $search['Search']['amountmin']; ?>';
  <?php } ?>

  <?php if(isset($search['Search']['amountmax']) && !empty($search['Search']['amountmax'])){ ?>
  max = '<?php echo $search['Search']['amountmax']; ?>';
  <?php } ?>

  $("#slider-range").slider({
  range: true,
  min: 0,
  max: 500,
  values: [min, max],
  slide: function (event, ui) {
  $("#amount").val(ui.values[ 0 ] + " - " + ui.values[ 1 ]);
  $("#SearchAmountmin").val(ui.values[ 0 ]);
  $("#SearchAmountmax").val(ui.values[ 1 ]);
  }
  });

  $("#amount").val( $("#slider-range").slider("values", 0) +
  " - " + $("#slider-range").slider("values", 1));

  $("#SearchAmountmin").val($("#slider-range").slider("values", 0));
  $("#SearchAmountmax").val($("#slider-range").slider("values", 1));
  });
  </script>
 * 
 */ ?>