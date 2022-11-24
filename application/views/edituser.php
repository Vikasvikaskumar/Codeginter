

   <?php
//    $reverseArray = array(1, 2, 3, 4,5);
//    $arraySize = sizeof($reverseArray);
   
//    for($i=$arraySize-1; $i>=0; $i--){
//        echo $reverseArray[$i];
//    }
   ?>
<form action="edituser" id="msform" method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <!-- <h3><strong><?php echo $Message;?></strong></h3> -->
    <label for="email"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" id="name" value="<?php echo !empty($detail['name'])? $detail['name']:''?>" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="Email"  value="<?php echo !empty($detail['email'])? $detail['email']:''?>"required>
    <label id="mesg"></label>
                              <!-- <br>           -->
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw"value="<?php
     echo !empty($detail['psw'])? $detail['psw']:''?>" required>

    <label for="number"><b>Contact No.</b></label>
    <input type="text" placeholder="Number" name="number" id="number" value="<?php echo !empty($detail['number'])? $detail['number']:''?>"required>
    <hr>

    <!-- <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->
    <button type="button" class="registerbtn"name="submit"id="submit" value="submit">Submit</button>
  </div>

  <!-- <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div> -->
</form>

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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () { 
 $("#submit").click(function (event) {
  //stop submit the form, we will post it manually.
     event.preventDefault();
     // Get form
     var form = $('#msform')[0];
    // Create an FormData object 
     var data = new FormData(form);
	//  console.log(data);
       $("#btnSubmit").prop("disabled", true);
    
     $.ajax({
         type: "POST",
         enctype: 'multipart/form-data',
         url: "<?php echo ('http://localhost/assigment_task/index.php/user/edituser'); ?>",

         data: data,
         processData: false,
         contentType: false,
         cache: false,       
         success: function (data) {
			 // alert(data);
			 var newData = JSON.parse(data);
       
        },
         error: function (e) {
            alert("error");
            //  $("#output").text(e.responseText);
            //  console.log("ERROR : ", e);
            //  $("#btnSubmit").prop("disabled", false);

         }
     });
    
 });
});
</script>