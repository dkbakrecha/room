<aside tabindex="5000" style="overflow: hidden;" class="left-panel">

    <div class="user text-center">
        <?php echo $this->Html->image('user.png', array('class' => 'img-circle')); ?>
        <h4 class="user-name">Hello Admin</h4>
        <?php /*
          <div class="dropdown user-login">
          <button class="btn btn-xs dropdown-toggle btn-rounded" type="button" data-toggle="dropdown" aria-expanded="true">
          <i class="fa fa-circle status-icon available"></i> Available <i class="fa fa-angle-down"></i>
          </button>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
          <li role="presentation"><a role="menuitem" href="#"><i class="fa fa-circle status-icon busy"></i> Busy</a></li>
          <li role="presentation"><a role="menuitem" href="#"><i class="fa fa-circle status-icon invisibled"></i> Invisible</a></li>
          <li role="presentation"><a role="menuitem" href="#"><i class="fa fa-circle status-icon signout"></i> Sign out</a></li>
          </ul>
          </div>
         */ ?> 
    </div>

    <?php
    $mnuDash = $mnuCate = $mnuFact = $mnuRoom = $mnuEnqr = $mnuUser = "";
    $cont = $this->request->params['controller'];
    $act = $this->request->params['controller'];

    if ($cont == 'categories') {
        $mnuCate = 'active';
    } elseif ($cont == 'facilities') {
        $mnuFact = 'active';
    } elseif ($cont == 'rooms') {
        $mnuRoom = 'active';
    } elseif ($cont == 'enquiries') {
        $mnuEnqr = 'active';
    } elseif ($cont == 'users') {
        $mnuUser = 'active';
    } else {
        $mnuDash = 'active';
    }
    ?>

    <nav class="navigation">
        <ul class="list-unstyled">
            <li class="<?php echo $mnuDash; ?>"><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'dashboard', 'admin' => true)) ?>"><i class="fa fa-dashboard"></i><span class="nav-label">Dashboard</span></a></li>
            <li class="<?php echo $mnuUser; ?>"><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index', 'admin' => true)) ?>"><i class="fa fa-users"></i><span class="nav-label">Users</span></a></li>
            <li class="<?php echo $mnuRoom; ?>"><a href="<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'index', 'admin' => true)) ?>"><i class="fa fa-home"></i><span class="nav-label">Rooms</span></a></li>
            <li class="<?php echo $mnuEnqr; ?>"><a href="<?php echo $this->Html->url(array('controller' => 'enquiries', 'action' => 'index', 'admin' => true)) ?>"><i class="fa fa-send-o"></i><span class="nav-label">Enquiries</span></a></li>
            <li class=""><a href="<?php echo $this->Html->url(array('controller' => 'facilities', 'action' => 'nearlocations', 'admin' => true)) ?>"><i class="fa fa-map-marker"></i><span class="nav-label">Locations</span></a></li>

            <li class="has-submenu "><a href="#"><i class="fa fa-list-alt"></i> <span class="nav-label">Meta Information</span></a>
                <ul class="list-unstyled">
                    <li class=""><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'searchterms', 'admin' => true)) ?>"><span class="nav-label">Search Terms</span></a></li>
                    <li class="<?php echo $mnuCate; ?>"><a href="<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'index', 'admin' => true)) ?>"><i class="fa fa-file-image-o"></i><span class="nav-label">Category</span></a></li>
                    <li class="<?php echo $mnuFact; ?>"><a href="<?php echo $this->Html->url(array('controller' => 'facilities', 'action' => 'index', 'admin' => true)) ?>"><i class="fa fa-file-image-o"></i><span class="nav-label">Facility</span></a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'payments', 'action' => 'index', 'admin' => true)) ?>"><i class="fa fa-file-image-o"></i><span class="nav-label">Payments</span></a></li>
<li class=""><a href="<?php echo $this->Html->url(array('controller' => 'email_contents', 'action' => 'index', 'admin' => true)) ?>"><span class="nav-label">Email Templates</span></a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'index', 'admin' => true)); ?>">Posts</a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'faqs', 'action' => 'index', 'admin' => true)); ?>">FAQ'S</a></li>
                    <!--<li><a href="http://freakpixels.com/portfolio/brio/timeline.html">Timeline</a></li>-->
                    <!--<li><a href="http://freakpixels.com/portfolio/brio/calendar.html">Email</a></li>-->
                </ul>
            </li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout', 'admin' => true)) ?>"><i class="fa fa-sign-out"></i><span class="nav-label">Logout</span></a></li>

            <?php /*
              <li class="has-submenu"><a href="#"><i class="fa fa-flag-o"></i> <span class="nav-label">UI Elements</span></a>
              <ul class="list-unstyled">
              <li><a href="http://freakpixels.com/portfolio/brio/uielements-general.html">General Elements</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/buttons.html">Buttons</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/icons.html">Icons</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/typography.html">Typography</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/grid.html">Grid</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/panels.html">Panels</a></li>
              </ul>
              </li><?php /*
              <li class="has-submenu"><a href="#"><i class="fa fa-file-text-o"></i> <span class="nav-label">Forms</span></a>
              <ul class="list-unstyled">
              <li><a href="http://freakpixels.com/portfolio/brio/forms-element.html">General Elements</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/forms-validation.html">Form Validation</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/wysihtml.html">Wysihtml</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/file-upload.html">File Upload</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/image-crop.html">Image Crop</a></li>
              </ul>
              </li>
              <li class="has-submenu"><a href="#"><i class="fa fa-heart-o"></i> <span class="nav-label">Table &amp; Grid</span></a>
              <ul class="list-unstyled">
              <li><a href="http://freakpixels.com/portfolio/brio/basic-tables.html">Basic Tables</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/data-tables.html">Data Table</a></li>
              </ul>
              </li>
              <li class="has-submenu"><a href="#"><i class="fa fa-code"></i> <span class="nav-label">Charts</span></a>
              <ul class="list-unstyled">
              <li><a href="http://freakpixels.com/portfolio/brio/chart-variants.html">Chart Variants</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/gauges.html">Gauges</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/vector-maps.html">Vector Maps</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/range-selector.html">Range Selector</a></li>
              </ul>
              </li>
              <li class="has-submenu"><a href="#"><i class="fa fa-star-o"></i> <span class="nav-label">Plugins &amp; More</span></a>
              <ul class="list-unstyled">
              <li><a href="http://freakpixels.com/portfolio/brio/404.html">404 Page</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/invoice.html">Invoice</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/elfinder.html">File Manager</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/google-maps.html">Google Maps</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/signin.html">Signin</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/signup.html">Signup</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/search.html">Search</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/full-screen.html">Full Screen</a></li>
              <li><a href="http://freakpixels.com/portfolio/brio/blank.html">Blank Page</a></li>

              </ul>
              </li>
             */ ?>

        </ul>
    </nav>

</aside>
