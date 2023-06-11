 <?php require('header.php'); ?>
 <?php require('dbconnection.php'); ?>
 <?php
  // Check if the registration form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $sex = $_POST["sex"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $postalCode = $_POST["postalCode"];

    try {
      // Create a PDO connection
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // Prepare and execute the SQL INSERT query with placeholders
      $sql = "INSERT INTO users (pseudo, password, firstName, lastName, email, sex, address, city, postalCode) VALUES (:pseudo, :password, :firstName, :lastName, :email, :sex, :address, :city, :postalCode)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':pseudo', $pseudo);
      $stmt->bindParam(':password', $password);
      $stmt->bindParam(':firstName', $firstName);
      $stmt->bindParam(':lastName', $lastName);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':sex', $sex);
      $stmt->bindParam(':address', $address);
      $stmt->bindParam(':city', $city);
      $stmt->bindParam(':postalCode', $postalCode);
      $stmt->execute();

      // Registration successful, redirect to the success page or any other appropriate page
      header("Location: signin.php");
      exit();
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

    // Close the database connection
    $conn = null;
  }
  ?>


 <main class="bg-white p-5 " style="min-height: 70vh">
   <div class="row col-md-10 mx-auto justify-content-center  m-2 p-3 border border-2 rounded-2">

     <div class="col-md-12">
       <form method="post" class="row">
         <div class="mb-3  form-group col-md-6">
           <label for="pseudo" class="form-label">Pseudo</label>
           <input type="text" class="form-control" name='pseudo' id="psd" aria-describedby="psd" placeholder="Enter pseudo">
         </div>

         <div class="mb-3 form-group col-md-6">
           <label for="Password" class="form-label">Password</label>
           <input type="password" class="form-control" name='password' id="exampleInputPassword1" placeholder="Enter password">
         </div>

         <div class="mb-3 form-group col-md-3">
           <label for="lName" class="form-label">Last Name</label>
           <input type="text" class="form-control" id="lname" name="lastName" placeholder="Enter last name">
         </div>

         <div class="mb-3 form-group col-md-3">
           <label for="fName" class="form-label">First Name</label>
           <input type="text" class="form-control" id="fname" name="firstName" placeholder="Enter first name">
         </div>


         <div class=" form-group col-md-3">
           <label for="email" class="form-label">Email</label>
           <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
         </div>

         <div class="form-group col-md-3">
           <label for="sexe" class="form-label">Sexe:</label>
           <div class="form-check">
             <input class="form-check-input" type="radio" name="sex" id="flexRadioDefault1">
             <label class="form-check-label" for="M">
               Male
             </label>
           </div>
           <div class="form-check">
             <input class="form-check-input" type="radio" name="sex" id="flexRadioDefault2">
             <label class="form-check-label" for="F">
               Female
             </label>
           </div>
         </div>

         <div class=" form-group col-md-12">
           <label for="adrs" class="form-label">Adresse</label>
           <input type="text" class="form-control" name="address" id="addsr" placeholder="ST1222">
         </div>

         <div class="mb-3  form-group col-md-6">
           <label for="city" class="form-label">City</label>
           <input type="text" class="form-control" name="city" id="city" aria-describedby="city">
         </div>

         <div class="mb-3 form-group col-md-6">
           <label for="postal" class="form-label">Postal code</label>
           <input type="number" class="form-control" name="postalCode" id="post" placeholder="Enter postal code">
         </div>

         <div class="form-group col-md-3 ">
           <button type="submit" class="btn btn-primary">Submit</button>
         </div>
       </form>
     </div>
   </div>
 </main>
 <!-- footer -->
 <?php require('footer.php'); ?>