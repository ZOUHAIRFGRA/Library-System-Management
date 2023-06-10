 <?php require('header.php'); ?>
 <?php require('dbconnection.php'); ?>
 <?php
 // Check if the sign-in form is submitted
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
 // Retrieve form data
 $pseudo = $_POST["pseudo"];
 $password = $_POST["password"];

 try {
 // Create a PDO connection
 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 // Prepare and execute the SQL SELECT query with placeholders
 $sql = "SELECT * FROM users WHERE pseudo = :pseudo AND password = :password";
 $stmt = $conn->prepare($sql);
 $stmt->bindParam(':pseudo', $pseudo);
 $stmt->bindParam(':password', $password);
 $stmt->execute();

 if ($stmt->rowCount() > 0) {
 // User is authenticated, redirect to the user's profile page or any other appropriate page
 header("Location: profile.html");
 exit();
 } else {
 echo "Invalid credentials. Please try again.";
 }
 } catch (PDOException $e) {
 echo "Connection failed: " . $e->getMessage();
 }

 // Close the database connection
 $conn = null;
 }
 ?>
 <main class="bg-white p-5  " style="min-height: 70vh">
   <div class="row col-md-10 mx-auto justify-content-center ">
     <div class="col-md-12">
       <h3 class="text-center mb-5">Get Connected to your profile</h3>
     </div>
     <div class="col-md-5">
       <form action="index.html">
         <div class="mb-3  form-group">
           <label for="pseudo" class="form-label">Pseudo</label>
           <input type="text" class="form-control" name="pseudo" id="exampleInputEmail1" placeholder="example@ofppt-edu.ma" aria-describedby="emailHelp">
         </div>
         <div class="mb-3 form-group">
           <label for="Password" class="form-label">Password</label>
           <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Enter password">
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
       </form>
     </div>
   </div>
 </main>


 <?php require('footer.php'); ?>