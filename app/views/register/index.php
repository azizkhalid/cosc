<?php require_once '../app/views/templates/header.php' ?>


<?php
$con = mysqli_connect("localhost","root","","cosc");

			
$status=$_GET['status'];

if($status=="delete")
{
	 $useranme = $_GET['username'];
	$ddfd=mysqli_query($con,"DELETE FROM `users` WHERE username='$useranme'");
	if($ddfd)
	{
		echo "<script>location.href='http://localhost/users'</script>";
	}
	
}	


?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <br>
            <div class="col-lg-12">
                <h3>User Reports For Register</h3>
                <p class="lead"> List of all User </p>
                <ul>
                    <?php if (isset($_GET['message'])) { ?>
                        <li><?php echo $_GET['message']; ?></li>
                    <?php } ?>
                    <?php if (isset($message)) { ?>
                        <li><?php echo $message; ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

	
	
	
	    <div class="row">
        <div class="col-md-8">
            <div class="table">
                <form action="" method="post">
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">Start Date</label>
                    <input type="date" class="form-control" id="recipient-name" value="<?php echo $_POST['start']; ?>" name="start" data-subject>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">End Date</label>
                   <input type="date" class="form-control" id="recipient-name" name="end"  value="<?php echo $_POST['end']; ?>" data-subject>
                  </div>
                  <input type="submit" name="submit" class="btn btn-info">
                  <input type="reset" value="Reset" class="btn btn-warning">            
                </form>
            </div>
        </div>
    </div>

	
	
    <div class="row">
        <div class="col-lg-12">
            <p> <?php //$data['message']?> </p>
            <div class="table">
                <table class="tblReminders">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Date</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php


	$con = mysqli_connect("localhost","root","","cosc");
if(isset($_POST['submit']))
{
	$start=$_POST['start'];
		$end=$_POST['end'];					
	 $sql="SELECT  *  FROM `users` WHERE `date` BETWEEN '$start' AND '$end'";

}		
else{
	$sql="select * from users";

}	
					$query=mysqli_query($con,$sql);
							
$row12=mysqli_num_rows($query);
							if($row12 == 0) { ?>
                            <tr><td colspan="3">No User to In List</td></tr>
                        <?php  } else {

						
						while($row=mysqli_fetch_array($query))
						{

						?>
                         
                                <tr class="data-row">
                                    <td ><?php echo $row['username']; ?></td>
                                    <td ><?php echo $row['date']; ?> </td>
                                  
                                </tr>
					
							
						<?php } }  ?>   
                   
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Delete User ?</h4>
              </div>
              <div class="modal-body">
                <p>Are you share to delete this User? &hellip;</p>
              </div>
              <div class="modal-footer">
                <a href="" class="btn btn-default delete-btn">Delete</a>
                <button type="button" class="btn btn-primary" data-modal-close>Close</button>
              </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php
	
	if(isset($_POST['password123']))
	{
			 $useranme = $_POST['username'];
		$password=md5($_POST['password']);
		
		mysqli_query($con,"UPDATE `users` SET `password`='$password' WHERE username='$useranme'");
	}	
	
	
	?>
    

   
    <?php require_once '../app/views/templates/privatefooter.php' ?>
    <script type="text/javascript">
        // Delete modal
        $('#delete-modal').on('shown.bs.modal', function (event) {
            var btn = $(event.relatedTarget);
            var parent = $(btn).parents('tr.data-row');
            // console.log(parent)
            var curr_id = parent.find('td[data-id]').data('id');
            var modal = $(this);
            modal.find('a.delete-btn').attr('href', '<?php echo base_url('reminders/delete'); ?>/'+ curr_id);
        })

        //Edit modal
        $('#edit-modal').on('shown.bs.modal', function (event) {
            var btn = $(event.relatedTarget);
            var parent = $(btn).parents('tr.data-row');
            // console.log(parent)
            var curr_id = parent.find('td[data-id]').data('id');
            var modal = $(this);
            modal.find('form').find('input[data-subject]').val(parent.find('td.data-subject').html());
            modal.find('form').find('textarea[data-description]').html(parent.find('td.data-description').html());
            modal.find('input[type=hidden]').val(curr_id);
            // console.log(parent.find('td.data-subject').html());
        })

        //View modal
        $('#view-modal').on('shown.bs.modal', function (event) {
            var btn = $(event.relatedTarget);
            var parent = $(btn).parents('tr.data-row');
            // console.log(parent)
            var curr_id = parent.find('td[data-id]').data('id');
            var modal = $(this);
            modal.find('p[data-subject]').html(parent.find('td.data-subject').html());
            modal.find('blockquote').html(parent.find('td.data-description').html());
            modal.find('small').html(parent.find('td[data-date]').data('date'));
            // console.log(parent.find('td.data-subject').html());
        })

        //Close modals
        $("button[data-modal-close]").on('click', function(){
            console.log('heyaa');
            $(this).parents('.modal').modal('hide');
        })
    </script>