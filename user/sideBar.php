<div class="sidebar">
        <a href="#" class="navbar-brand text-center sticky">
             <img src="http://localhost/erp/assets/logo/logo.jpg" alt="" class="img-responsive rounded-circle" style="width:60px;height:50px;">
        </a>

        <?php
          $currentUri=$_SERVER['REQUEST_URI'];
          $host ="http://localhost";
          $dashboardUri ="/erp/user/"; 
          $debtorUrl = "/erp/user/students/students.php";
          $profileUri = "/erp/user/profile/index.php";
          // its give active-link class if current Uri is same the link uri
          function isActiveUri($linkUri,$currentUri){               
               if($linkUri === $currentUri){
                 echo "active-link";
               }else{
                 echo "";
               }
          }

          function isActiveReportsUri($condition){               
            if($condition){
              echo "active-link";
            }else{
              echo "";
            }
       }
        ?>
       <a accesskey="h" href="<?php echo $host.$dashboardUri;?>" class="<?php isActiveUri($dashboardUri,$currentUri);?>"> <span class="fa fa-dashboard"></span>  Dashboard</a>
       <a Accesskey="O" href="<?php echo $host.$debtorUrl;?>" class="<?php isActiveUri($debtorUrl,$currentUri);?>"> <span class="fa fa-users"></span> Students</a>
       <a accesskey="m" class="<?php isActiveUri($profileUri,$currentUri);?>" href="<?php echo $host.$profileUri;?>"><span class="fa fa-user-circle"></span> Profile</a>
       <a accesskey="a" href="javascript:void(0)" onclick="openInfoModal()"><span class="fa fa-info-circle"></span> About</a>
       <a accesskey="l" href="javascript:void(0)" class="text-danger" onclick="openLogoutModal()"><span class="fa fa-sign-out"></span> Logout</a>
       </div>  



<!--logout Modal -->
<div class="modal fade" id="logoutModal"  role="dialog" aria-labelledby="logoutModal" aria-hidden="true" style="z-index:99999">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title gray-text" id="logoutModal ">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="text-center"> <span class="fa fa-warning text-danger" style="font-size:6rem"></span></div>
            <div class="p-4 gray-text text-center">Do you really want to logout? </div>           
      </div>  
      <div class="modal-footer">
           <button type="button" class="btn light-white gray-text" data-dismiss="modal" aria-label="Close">Cancel</button>          
           <form>
              <a href="http://localhost/erp/user/logout.php"  class="btn blue text-white" onclick="openLogout()" >
                 <i class="fa fa-sign-out"></i> Logout
              </a>
           </form>
      </div>     
    </div>
  </div>
</div>



<!--Info Modal -->
<div class="modal fade" id="infoModal"  role="dialog" aria-labelledby="infoModal" aria-hidden="true" style="z-index:99999">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title gray-text" id="logoutModal ">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="text-center"> <span class="fa fa-info-circle blue-text" style="font-size:6rem"></span></div>
            <div class="mb-1 text-center gray-text">
               Designed and developed by Karan Soni               
            </div>           
            <div class="mb-1 gray-text text-center">Oct 2022 V1.0.0</div>           
            <div class="gray-text">
            <p><i class="fa fa-envelope"></i> skaran921@gmail.com</p>
               <p><i class="fa fa-github"></i> BISHNOIA03</p>
               <p><i class="fa fa-twitter"></i> A-KAY BISHNOI</p>
            </div>
      </div>  
      <div class="modal-footer">
           <button type="button" class="btn light-white text-white blue" data-dismiss="modal" aria-label="Close">Close</button>       
      </div>     
    </div>
  </div>
</div>
