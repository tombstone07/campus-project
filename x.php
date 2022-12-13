<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register | Voting System</title>
 	

<?php include('./header.php'); ?>

<style>
    #login-right{
		/* position: absolute;
		right:0; */
		/* width:40%; */
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		height: calc(100%);
	/* background: rgb(255,255,255);
background: linear-gradient(90deg, rgba(255,255,255,1) 23%, rgba(65,163,42,1) 79%);
 */
		display: flex;
		align-items: center;
	}
	#login-right .card{
		margin: auto
	}
	.logo {
    margin: auto;
    font-size: 8rem;
    background: white;
    padding: .5em 0.8em;
    border-radius: 50% 50%;
    color: #000000b3;
}
</style>

<?php 
include('db_connect.php');
if(isset($_GET['id'])){
$user = $conn->query("SELECT * FROM users where id =".$_GET['id']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<div class="m-4">
<div class="container">
    <div class="row">
    <div class="col-6">
    <div id="login-left">
  			<div class="logo">
                  <h1>
                  VOTER REGISTRATION PAGE
                  </h1>
                  
        <img src="assets/img/IEBC_LOGO.png" alt="logo" />
        </div>
  		</div>
        </div>

        <div class="col-6">
        <form action="" id="manage-user">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
        <div class="row">
            <div class="col-6">
            <div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
		</div>
            </div>
            <div class="col-6">
            <div class="form-group">
			<label for="name">Surname</label>
			<input type="text" name="surname" id="surname" class="form-control" value="<?php echo isset($meta['surname']) ? $meta['surname']: '' ?>" required>
		</div>
</div>

        <div class="col-6">
        <div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required>
		</div>
        </div>

        <div class="col-6">
        <div class="form-group">
			<label for="type">User Type</label>
			<select name="type" id="type" class="custom-select">
				<option value="1" <?php echo isset($meta['type']) && $meta['type'] == 1 ? 'selected': '' ?>>Admin</option>
				<option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? 'selected': '' ?>>Voter</option>
			</select>
		</div>
            </div>


            <div class="col-6">
            
        <div class="form-group">
			<label for="name">Date Of Birth</label>
			<input type="date" name="dob" id="dob" class="form-control" value="<?php echo isset($meta['dob']) ? $meta['dob']: '' ?>" required>
		</div>
            </div>


            <div class="col-6">
            
            <div class="form-group">
                <label for="name">National ID</label>
                <input type="number" name="national_id" id="national_id" class="form-control" value="<?php echo isset($meta['national_id']) ? $meta['national_id']: '' ?>" required>
            </div>
                </div>

            <div class="col-6">
            <div class="form-group">
			<label for="county">County</label>
            <select id="mand" onchange="func(event)" class="form-control" name="county_selection" id="">
                <option value="mombasa">Mombasa</option>
                <option value="malindi">Malindi</option>

            </select>
			<!-- <input type="text" name="county" id="county" class="form-control" value="<?php echo isset($meta['county']) ? $meta['county']: '' ?>" required> -->
		</div>

            </div>


            <div class="col-6">
            <div class="form-group">
			<label for="constituency">Constituency</label>
            <select disabled id="constituency_select" onchange="func()" class="form-control" name="county_selection" id="">

            </select>
			<!-- <input type="text" name="constituency" id="constituency" class="form-control" value="<?php echo isset($meta['constituency']) ? $meta['constituency']: '' ?>" required> -->
		</div>

       
            </div>


            <div class="col-6">
            <div class="form-group">
			<label for="ward">Ward</label>
            <select disabled id="mand" onchange="func()" class="form-control" name="county_selection" id="">
		</div>
            </div>

            <div class="col-6">
            <div class="form-group">
			<label for="username">Polling Station</label>
            <select disabled id="mand" onchange="func()" class="form-control" name="county_selection" id="">
		</div>

            </div>

            <div class="col-6">
            <div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control" value="<?php echo isset($meta['password']) ? $meta['id']: '' ?>" required>
		</div>
            </div>

            <div class="col-6">
            <button type="submit" class="btn btn-block btn-primary" id='submit' >Save</button>

            </div>
            <div class="col-6">
            <a href="login.php" class="btn btn-block btn-wav btn-warning">Login</a>

            </div>

            </div>
        </div>
		

     

	
	
	

		

     


     
   

    
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
        

    </form>
        </div>
     
    </div>
	

</div>
</div>

<script>
    var malindi_constituencies = ['Kiharu',"starehe","mathioya"];
    function func(event) {
        // console.log("I am victor")
        console.log("this is element is ",event.target.value)
       
        if(event.target.value == "malindi"){
            var p = document.getElementById('constituency_select')
            p.disabled = false;
            
            var option_element = document.createElement('option'),
//   myClass = document.getElementsByClassName('myClass');

// myClass[0].parentElement.appendChild(wrapper);
// wrapper.id = 'wrapper';

for (var i = 0; i < malindi_constituencies.length; i++) {
  p.appendChild(option_element);
}

        }
    
        

    }
    // var x = document.getElementById('mand');
    // x.addEventListener('onChange',(e)=>{
    //     console.log("i am bumi")
    // })
</script>

<script>
	$('#manage-user').submit(function(e){
		e.preventDefault();
		// start_load()
		$.ajax({
			url:'ajax.php?action=save_user',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					// alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	})
</script>
