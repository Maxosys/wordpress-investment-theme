<?php 
	/**
    * Template Name: __Change password Page
    */
get_header();
?>
<?php 

$msg = "";


if(isset($_POST['submit_update'])){
  //$wp_hasher = new PasswordHash(8, TRUE);
$current_password = $_POST['current_password'];
//echo $current_password;
$new_password= md5($_POST['new_password']);
$confirm_password= md5($_POST['confirm_password']);
$current_user = wp_get_current_user();
$userid = $current_user->ID;
$user_information = $wpdb->get_results("SELECT user_pass FROM `wpor_users` where ID = $userid");
//print_r($user_information);
$old_pwd= $user_information[0]->user_pass;

if((wp_check_password($current_password, $old_pwd)) == 1){
    //echo "Current Pwd Match";
 if($new_password == $confirm_password){
    //echo "Confirm pwd match";
      $updatetwdth = $wpdb->query("UPDATE wpor_users SET user_pass = '$new_password' WHERE ID = $userid" );
     
      $msg = '<div class="alert alert-success" role="alert">Your password is updated! Please Login. </div>';
   
 }else{
      $msg = '<div class="alert alert-danger" role="alert"> Confirm Password is not macth!. </div>';
 }
  }else{
      $msg = '<div class="alert alert-danger" role="alert"> Current Password is not match!. </div>';
}

}
?>

<div class="account-settings seeting chnge">
  <div class="container">
    <div class="chnage-pwd">
      <div class="main-heading">
        <h3>Change Password</h3>
        <?php if(isset($msg)){
        echo "<div style='text-align:center' width:50%;>" . $msg . "</div>"; }
          ?>
      </div>

      <div class="form-padding">
        <form action="" method="post">
          <div class="form-group">
            <input type="password" id="id_accountName" placeholder="Current Password" class="account-name" name="current_password" required="">
          </div>
          <div class="form-group">
            <input type="password" id="id_bsb" placeholder="New Password" class="account-bsb" name="new_password" required="">
          </div>
          <div class="form-group">
            <input type="password" id="id_accountNumber" placeholder="Re-type New Password" class="account-number" name="confirm_password" required="">
          </div>
          <input type="submit" name="submit_update" value="Save" class="submit-account-details">
        </form>
      </div>
    </div>
  </div>
</div>
  <?php get_footer(); ?>