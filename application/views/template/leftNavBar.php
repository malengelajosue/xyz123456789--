 <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGATION</li>
         <li class="active">
          <a href="<?php echo base_url()?>home">
            <i class="fa fa-comments-o"></i> <span>Tableau de bord</span>
            <span class="pull-right-container">
             
            </span>
          </a>
        </li>
        
         <li class="treeview">
          <a href="#">
            <i class="fa fa-tags"></i> <span>Demandes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>demandes"><i class="fa fa-list"></i> Les demandes</a></li>
            <li><a href="<?php echo base_url()?>demandes/create"><i class="fa fa-plus"></i> Creer une demande</a></li>
          </ul>
        </li>
   
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-building-o"></i> <span>Departement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>departements"><i class="fa fa-list"></i> Departements</a></li>
            <li><a href="<?php echo base_url()?>departements/create"><i class="fa fa-plus"></i> Creer un Department</a></li>
            
          </ul>
        </li>
       
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Cash</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>cash"><i class="fa fa-list"></i> Cashs</a></li>
            <li><a href="<?php echo base_url()?>line_currencies"><i class="fa fa-list"></i> Transactions</a></li>
            <li><a href="<?php echo base_url()?>line_currencies/create"><i class="fa fa-plus"></i> Add cash</a></li>
           
          </ul>
        </li>
                   
         <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Utilisateurs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>user"><i class="fa fa-list"></i> Les utilisateurs</a></li>
            <li><a href="<?php echo base_url()?>user/create"><i class="fa fa-plus"></i> Creer un utilisateur</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-anchor"></i> <span>Type de compte</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>type_of_user"><i class="fa fa-list"></i> Les types de comptes</a></li>
            <li><a href="<?php echo base_url()?>type_of_user/create"><i class="fa fa-plus"></i> Creer un type</a></li>
          </ul>
        </li>
   
      </ul>


