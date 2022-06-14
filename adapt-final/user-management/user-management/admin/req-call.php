<?php
    session_start();
    include '../config.php';


// SESSION CHECK SET OR NOT
if (!isset($_SESSION['admin'])) {
    header('location:index.php');
}

    // SELECT CURRENT LOGGED IN ADMIN DETAILS MATCH FROM THE DATABASE
    $statement = $db->prepare('SELECT * FROM `admin` where username=?');
    $statement->execute(array($_SESSION['username']));
    $userData = $statement->fetch(PDO::FETCH_ASSOC);

    $servername = "localhost"; $username = "root"; $password = ""; $dbname = "user-login";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

   
    if(isset($_POST['editsubmit'])){
       $conn->query("UPDATE `req-call` SET name = '".$_POST['name']."',email= '".$_POST['email']."',mob= '".$_POST['mob']."',message= '".$_POST['message']."' WHERE id = '".$_POST['id']."' ");

    }

    if(isset($_GET["apptoken"])){
        // echo $_GET["apptoken"];die();
        $conn->query("DELETE FROM `req-call` WHERE id = ".$_GET["apptoken"]." ");
        header('Location:https://jiohomejob.in/join/admin/req-call.php');exit();
    }
     $pp = "SELECT * FROM `req-call` order by id desc";
    $result = $conn->query($pp);
?>

<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>

    <?php include '../include/css/mandatory.php' ?>
    <link href="../assets/plugins/froiden-helper/helper.css" rel="stylesheet" type="text/css" />
    <?php include '../include/css/global.php' ?>
</head>

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
<?php include '../include/header.php'; ?>
<div class="page-container">
    <?php include '../include/sidebar.php'; ?>
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green">
                        <i class="fa fa-phone font-green"></i>
                        <span class="caption-subject bold uppercase">Request call</span>
                    </div>
                </div>
                <!--content start-->
                <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dt-responsive" id="userTable">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th class="min-tablet">Name</th>
                                    <th class="min-phone-l">Email</th>
                                    <th>Ph no</th>
                                    <th>Message</th>
                                    <th class="min-tablet">Status</th>
                                    <th class="min-tablet">Date time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(mysqli_num_rows($result)) { $i= 1;
                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <th><?php echo $i; ?></th>
                                        <th><?php echo $row['name']; ?></th>
                                        <th><?php echo $row['email']; ?></th>
                                        <th><?php echo $row['mob']; ?></th>
                                        <th><?php echo $row['message']; ?></th>
                                        <th>
                                            <textarea id="status_<?php echo $row['id']; ?>" ><?php echo $row['status_text']; ?></textarea>
                                            <!-- <input type="text"  value="<?php //echo $row['status_text']; ?>" style="height: 35px;"> -->
                                            <a href="javascript:;" class="btn btn-primary" onclick="update_status(<?php echo $row['id']; ?>)">Update</a>
                                        </th>
                                        <th><?php echo $row['added_date']; ?></th>
                                        <th>
                                            <input type="hidden" id="pro_data" value='<?php echo  json_encode($row); ?>'>
                                            <a href="javascript:;" class="btn btn-success" id="edit" data-toggle="modal" data-target="#edit_form">Edit</a>
                                            <a href="req-call.php?apptoken=<?php echo urlencode(utf8_encode($row['id'])); ?>" class="btn btn-primary">Delete</a>
                                        </th>
                                    </tr>
                                <?php $i++;  }
                                } ?>
                                <tr></tr>
                            </tbody>
                        </table>
                            <!-- /.table-responsive -->
                    </div>
                    <!-- /.portlet -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#content-container -->
    </div>
    <!--content end -->
    <div id="edit_form" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Call Info</h4>
          </div>
          <div class="modal-body">
            <form method="post">
                <div class="col-md-12">
                    <input type="hidden" name="id" id="id">
                    <input type="text" name="name" id="name" placeholder="Name">
                    <input type="text" name="email" id="email" placeholder="Email Adress">
                    <input type="text" name="mob" id="mob" placeholder="Mobile Number">
                    <input type="text" name="message" id="message" placeholder="Msg">
                    <input type="submit" name="editsubmit" id="submit" placeholder="submit">
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
<?php include '../include/footer.php' ?>
<?php include '../include/footerjs.php' ?>
<script src="../assets/plugins/froiden-helper/helper.js" type="text/javascript"></script>
<script>

    function editPassword(){
// Send ajax Request to ajax/change_password_admin.php to change password
$.easyAjax({
    url: "ajax/change_password_admin.php",
    type: "POST",
    data: $("#passwordEdit").serialize(),
    container: "#passwordEdit"
});
}

function editProfile(){
// Send ajax Request to ajax/login.php  to verify the credentials
$.easyAjax({
    url: "ajax/admin_profile.php",
    type: "POST",
    data: $("#editProfile").serialize(),
    container: "#editProfile"
});
}
$("#edit").click(function() {
    var data = $("#pro_data").val();
    var obj = JSON.parse(data);
    $("#id").val(obj.id);
    $("#name").val(obj.name);
    $("#email").val(obj.email);
    $("#mob").val(obj.mob);
    $("#message").val(obj.message);
});


function update_status(id){
    var up_test =  $("#status_"+id).val();
     $.ajax({
                url: "ajax/update_status.php",
                type: "POST",
                data: {"up_test":up_test,"id":id},
                success:function(res){alert("Status Update successfully");}
        });
    // $.easyAjax({
    //     url: "ajax/update_status.php",
    //     type: "POST",
    //     data: {"up_test":up_test,"id":id},
    //     //container: "#editProfile"
    // });
    
}
 
</script>
</body>
</html>