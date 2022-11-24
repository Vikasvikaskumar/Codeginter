

   <?php
//    $reverseArray = array(1, 2, 3, 4,5);
//    $arraySize = sizeof($reverseArray);
   
//    for($i=$arraySize-1; $i>=0; $i--){
//        echo $reverseArray[$i];
//    }
   
// echo"<pre>";print_r($detail['name']);die;
   ?>
   
   
  
   
<form action="register" method="post" id="msform">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <!-- <h3><strong><?php echo $Message;?></strong></h3> -->
    <label for="email"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" id="name" value="<?php echo !empty($detail['name'])? $detail['name']:''?>"required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="Email" value="<?php echo !empty($detail['email'])? $detail['email']:''?>"required>
    <label id="mesg"></label>
                              <br>          
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw"value="<?php echo !empty($detail['psw'])? $detail['psw']:''?>" required>

    <label for="number"><b>Contact No.</b></label>
    <input type="text" placeholder="Number" name="number" id="number"value="<?php echo !empty($detail['number'])? $detail['number']:''?>" required>
    <hr>

    <!-- <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->
    <?php if(!empty($_GET['id'])){ ?>
        <input type="hidden" name="id" id="id"  value="<?php echo !empty($detail['id'])? $detail['id']:''?>">
      <input type="button" class="registerbtn" name="submitbtn" id="submitbtn1" value="submit">
    <?php
    }else{
      ?>    
    <button type="submit" class="registerbtn"name="submit" value="submit">Register</button>
    <?php }?>
    </div>

  <!-- <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div> -->
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">  </script> -->

<script>
  // function test(){
  // //  var x=  document.getElementById('bumitbtn');
  //   alert('test')
  // }
  // </script>
<script>

//   $(document).ready(function() { 
//   $("#submitbtn1").click(function() {
  
//   alert("test");
//  });
// });
  
  </script>
<style>
    * {box-sizing: border-box}

/* Add padding to containers */
.container {
    width: 500px;
  padding: 16px;
  margin-left: 500px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
    </style>


<script type="text/javascript">
    // Ajax post
    $(document).ready(function()
    {
        $("#Email").change(function()
        {
            var email = $('#Email').val();

            if(email!="")
            {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php  echo ('http://localhost/assigment_task/index.php/user/isEmailExist'); ?>",

                    dataType: 'html',
                    data: {email: email},

                    success: function(data)
                    {
                        if(data == "Exist")
                        {
                            $("#mesg").css({"color":"red","width":"100%"});
                            $("#mesg").show();
                            $("#mesg").html("This user already exists !");
                        }
                        else{
                            $("#mesg").empty().hide();
                        }

                    },
                    error:function()
                    {
                        alert('some error');
                    }
                });
            }
            else
            {
                alert("pls enter your email id ");
            }

        });
    });
</script>

<script>
  $(document).ready(function () { 
 $("#submitbtn1").click(function (event) {
  // alert("test");
  //stop submit the form, we will post it manually.
     event.preventDefault();
     // Get form
     var form = $('#msform')[0];
    // Create an FormData object 
     var data = new FormData(form);
	//  console.log(data);
       $("#btnSubmit").prop("disabled", true);
    // alert(form);
     $.ajax({
         type: "POST",
         enctype: 'multipart/form-data',
         url:  "<?php echo 'http://localhost/assigment_task/index.php/user/register?id='.$_GET['id'].''; ?>",
        data: data,
         processData: false,
         contentType: false,
         cache: false,       
         success: function (data) {
			//  alert(data);
			 var newData = JSON.parse(data);
  		//  alert(data);
	    
         if(newData.value == "done")
         {
          // alert("te");
          window.location.href = "<?php echo 'http://localhost/assigment_task/index.php/user/dashboard'?>";
        
         }else{
          alert("failed");
         }
        }
        });
    
  });
 });
  </script>