<header id="header" id="home">
		    <div class="container">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="<?php echo base_url() ?>"><h3><b>Terminal Subang</b></h3></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li class="menu"><a href="<?php echo base_url() ?>">Home</a></li>
			          <li><a href="<?php echo base_url() ?>tiket_41518110070">Cari & Pesan Tiket</a></li>
			          <li class="menu"><a href="<?php echo base_url() ?>tiket_41518110070/cektiket">Cek Tiket</a></li>
			          <?php if ($this->session->userdata('username')) { ?>
				      	<li class="menu-has-children"><a href="">Hai, <?php echo $this->session->userdata('nama_lengkap'); ?></a>
						<ul>
							<li><a href="<?php echo base_url() ?>profile_41518110070/profilesaya/<?php echo $this->session->userdata('kd_pelanggan') ?>"><i class="fa fa-id-card"></i> Profile Saya</a></li>
							<li><a href="<?php echo base_url() ?>profile_41518110070/tiketsaya/<?php echo $this->session->userdata('kd_pelanggan') ?>"><i class="fa fa-ticket"></i> Tiket Saya</a></li>
							<li><a href="<?php echo base_url() ?>login_41518110070/logout"><i class="fa fa-sign-out"></i> Keluar</a></li>
						</ul>
						</li>
				      <?php }else{ ?>  
				  	  <li class="menu wobble animated"><a href="<?php echo base_url() ?>login_41518110070/Daftar">Daftar</a></li>
 					  <li><a href="<?php echo base_url() ?>login_41518110070">Login</a></li>
				  	  <?php } ?>
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->	