<!DOCTYPE html>
<html>
<head>
	<title>requset form</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center><h1>My form</h1></center>
<form action="get-req.php" method="post" enctype="multipart/form-data" name="form" id="form">
        <div class="form-wrapper"><br>
              <input type="text" class="form-control" name="name" placeholder="Enter your name" />
            </div>
            <div class="form-wrapper"><br>
             
              <input type="text" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="Email Id" required/>
            </div>
            <div class="form-wrapper"><br>
              <input type="text" class="form-control" name="mob" minlength="10" maxlength="10" pattern="[789][0-9]{9}" placeholder="mobile No" required/>
              <span id="messages"></span>
            </div>
            <div class="form-wrapper"><br>
              <div class="textarea-own">
              <textarea rows="5" name="message" placeholder="leave your sms" required/></textarea>
              </div>
            </div>
            <br>
              <div class="button">
               <button>Submit</button>
               </div>
                            </div>
            </div>
         

        </form>
	
</form>
</body>
</html>