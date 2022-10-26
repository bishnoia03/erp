<?php 
 include "../checkUserAuthentication.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student's Entry</title>
    <?php 
     include "../../externalCss.php";
     include "../../api/db.php";
     include "../../api/User.php";
     $userId = $_SESSION["user_auth_id"];
     $user = new User($conn);
     $userNameArr =$user->getUserNameArray($userId);
    ?>
      <!-- toast -->
    <link rel="stylesheet" href="../../css/toastr.min.css">
</head>
<body>
        <!-- sidebar -->
        <?php include("../sideBar.php"); ?>  
    <!-- Page content -->
    <div class="sidebarContent">
          <!-- navbar -->
             <?php include("../navBar.php"); ?>  
          <!-- navbar end-->
            
            <!-- main content-->
            <div class="main p-5">
                  <h1 class="gray-text"> <i class="fa fa-plus-square"></i> Create Entry</h1>
                  <hr/>
                  <form action="" method="post">
                     <div class="row">
                         <div class="col-md-12 col-lg-6 col-sm-12">
                            <input type="text" name="debtorName" id="debtorName" class="mb-2 capitallize" placeholder="Student's Full Name" required min="1" autofocus>
                            <input type="text" name="fatherName" id="fatherName" class="mb-2 capitallize" placeholder="Student's Father Name" required min="1">
                            <input type="text" name="motherName" id="motherName" class="mb-2 capitallize" placeholder="Student's Mother Name" required min="1">
                            <select name="gender" id="" class="mb-2 capitallize" required>
                              <option value="">Select Gender</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Other">Other</option>
                            </select>
                            <input type="date" name="dob" id="dob" class="mb-2">
                            <input type="tel" name="debtorMobileNo" id="debtorMobileNo" class="mb-2" pattern="[6789][0-9]{9}" placeholder="Student's 10 Digit Mobile No." min="10" max="10" required>
                            <input type="email" name="debtorEmail" id="debtorEmail" class="mb-2" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Student's Email">
                            <input type="text" name="aadhar" id="aadhar" class="mb-2" placeholder="Student's Aadhar No">
                            <input type="text" name="familyid" id="familyid" class="mb-2" placeholder="Student's Family Id">
                            <select name="caste" id="" class="mb-2 capitallize" required>
                              <option value="">Select Category</option>
                              <option value="General">General</option>
                              <option value="BC-A">BC-A</option>
                              <option value="BC-B">BC-B</option>
                              <option value="SC">SC</option>
                            </select>
                            <select name="Marital_Status" id="Marital Status" class="mb-2 capitallize" required>
                              <option value="">Select Marital Status</option>
                              <option value="Married">Married</option>
                              <option value="Unmarried">Unmarried</option>
                            </select>
                            <textarea name="debtorAddress" id="debtorAddress" class="mb-2" placeholder="Student's Address"></textarea>
                            <button type="submit" class="btn-block" name="addDebtor">Create New Entry</button>
                         </div>
                     </div>
                  </form>
            </div> <!---main -------->
    </div><!-- Page content end-->
<?php 
     include "../../externalJs.php";
?>
<script src="../../js/toastr.min.js"></script>
<script>
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>

<?php 
   if(
       isset($_POST["debtorName"]) &&
       isset($_POST["debtorMobileNo"]) &&
       isset($_POST["addDebtor"]) 
     ){
         $debtorName = $_POST["debtorName"];
         $debtorMobileNo = $_POST["debtorMobileNo"];
         $debtorEmail = $_POST["debtorEmail"];
         $debtorAddress = $_POST["debtorAddress"];
         $fathername = $_POST["fatherName"];
         $mothername = $_POST["motherName"];
         $gender = $_POST["gender"];
         $dob = $_POST["dob"];
         $aadhar = $_POST["aadhar"];
         $familyid = $_POST["familyid"];
         $caste = $_POST["caste"];
         $maritalstatus = $_POST["Marital_Status"];
         include "../../api/helper/ValidationHelper.php";
        //  check name validation
        if(!ValidationHelper::validateName($debtorName)){
                // invalid name 
                ?>
                   <script>
                         toastr.error('Name is not valid',"Oops!");
                   </script>
                <?php
        }elseif(!ValidationHelper::validateMobile($debtorMobileNo)){
            //invalid mobile
                ?>
                   <script>
                         toastr.error('Mobile no. is not valid',"Oops!");
                   </script>
                <?php
        }else{
            // insert data
         include "../../api/Debtors.php";
         include "../../api/db.php";
         $debtor  = new Debtors($conn);
         $result = $debtor->insertDebtor($debtorName,$debtorMobileNo,$debtorEmail,$debtorAddress,$fathername,$mothername,$gender,$dob,$aadhar,$familyid,$caste,$maritalstatus);
         if($result === -1){
             //   debtor already exist
            ?>
            <script>
                  toastr.error('Debtor A/c already exist',"Oops!");
            </script>
         <?php
         }elseif($result){
            //   insert data successfully
            ?>
            <script>
                  toastr.success('New Debtor Created');
            </script>
           <?php
         }else{
            //   error on inserting data
            ?>
            <script>
                  toastr.error('Something went wrong',"Oops!");
            </script>
         <?php
         }
        }

        ?>
        <script>
          //clear history state
          history.pushState({}, "", "")
        </script>
        <?php 
     }
?>
</body>
</html>