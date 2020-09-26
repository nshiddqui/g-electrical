<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <?= $this->Html->image('user.png', ['class' => 'img-circle', 'alt' => 'User Image']) ?>
        </div>
        <div class="pull-left info">
            <p><?= $authUser['client_name'] ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
            <?= $this->Html->link('<i class="fa fa-dashboard"></i> <span>Dashboard</span>', ['controller' => 'dashboard', 'action' => 'index'], ['escape' => false]) ?>
        </li>
        <?php if (in_array($authUser['role'], [1, 2])) { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file"></i>
                    <span>Reports Managements</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> Add Report', ['controller' => 'reports', 'action' => 'add'], ['escape' => false]) ?></li>
                    <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> List Reports', ['controller' => 'reports', 'action' => 'index'], ['escape' => false]) ?></li>
                </ul>
            </li>
        <?php } ?>
        <?php if ($authUser['role'] === 1) { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Payment Managements</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> New Payment', ['controller' => 'payments', 'action' => 'add'], ['escape' => false]) ?></li>
                    <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> List Payments', ['controller' => 'payments', 'action' => 'index'], ['escape' => false]) ?></li>
                </ul>
            </li>
        <?php } ?>
        <?php if ($authUser['role'] === 1) { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tasks"></i>
                    <span>Jobs Managements</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> New Job', ['controller' => 'jobs', 'action' => 'add'], ['escape' => false]) ?></li>
                    <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> List Jobs', ['controller' => 'jobs', 'action' => 'index'], ['escape' => false]) ?></li>
                </ul>
            </li>
        <?php } ?>
        <?php if ($authUser['role'] === 1) { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-location-arrow"></i>
                    <span>Location Managements</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> New Location', ['controller' => 'riders', 'action' => 'add'], ['escape' => false]) ?></li>
                    <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> List Locations', ['controller' => 'riders', 'action' => 'index'], ['escape' => false]) ?></li>
                </ul>
            </li>
        <?php } ?>
        <?php if ($authUser['role'] === 1) { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Worker Managements</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> New Worker', ['controller' => 'workers', 'action' => 'add'], ['escape' => false]) ?></li>
                    <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> List Workers', ['controller' => 'workers', 'action' => 'index'], ['escape' => false]) ?></li>
                </ul>
            </li>
        <?php } ?>
        <?php if ($authUser['role'] === 1) { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>User Managements</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> New User', ['controller' => 'users', 'action' => 'add'], ['escape' => false]) ?></li>
                    <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> List Users', ['controller' => 'users', 'action' => 'index'], ['escape' => false]) ?></li>
                </ul>
            </li>
        <?php } ?>
    </ul>
</section>