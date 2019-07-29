<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class=" main-menu collapse navbar-collapse">
            <ul  class="nav navbar-nav">
                <li class="" >
                    <a href="<?php echo site_url('admin');?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>

                <li class="menu-title">SEAT MANAGEMENTS</li><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Aset
                      <i class="menu-icon fa fa-save"></i>

                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href=<?php echo site_url('Purchase_Order');?>>Purchase Order</a></li>
                        <li><i class="fa fa-users"></i><a href=<?php echo site_url('aset');?>>Aset Keseluruhan</a></li>
                        <li><i class="fa fa-id-badge"></i><a href=<?php echo site_url('Aset_tersedia');?>>Aset Tersedia</a></li>
                        
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="menu-icon fa fa-archive"></i>
                      History
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-archive"></i><a href=<?php echo site_url('history');?>>History</a></li>
                        <li><i class="fa fa-users"></i><a href=<?php echo site_url('historyPegawai');?>>Pegawai</a></li>
                        <li><i class="fa fa-tasks"></i><a href=<?php echo site_url('historyAset');?>>Aset</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tags"></i>Peminjaman</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-clock-o"></i><a href=<?php echo site_url('pinjam_tenggat');?>>Tenggat</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-upload"></i>Vendor</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-upload"></i><a href=<?php echo site_url('vendor_list');?>>Vendor</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-folder-open"></i>Log Aset</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-cogs"></i><a href=<?php echo site_url('log/service');?>>Servis</a></li>
                        <li><i class="menu-icon fa fa-refresh"></i><a href=<?php echo site_url('log/mutasi');?>>Mutasi</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</aside>
<style type="text/css">
                    li .subtitle{
                        display: none;
                    }
                </style>
