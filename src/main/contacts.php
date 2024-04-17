<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<!-- HEAD TAGS -->
<?php include("../head-tags.php")?>

<body>

    <!-- SIDEBAR -->
    <?php include("../sidebar.php")?>

    <!-- MAIN CONTENT -->
    <main>
        
      <!-- CONTACT FORM  -->
      <section class="contacts">
        <div class="container">
          <h2><b>CONTACT US!</b></h2> <br>
          <div class="row">
            <div class="col-md-7">
              <!-- FORM -->
              <form>
                <div class="row">
                  <div class="form-group col">
                    <input type="text" class="form-control" placeholder="First name" required>
                  </div>
                  <div class="form-group col">
                    <input type="text" class="form-control" placeholder="Last name" required>
                  </div>
                </div>
  
                <div class="row mt-4">
                  <div class="form-group col">
                      <input type="email" class="form-control" placeholder="Email address" required>
                  </div>
                </div>
  
                <div class="row mt-4">
                  <div class="col">
                    <div class="form-group">
                      <textarea class="form-control" rows="6" maxlength="2000" placeholder="Type your message here" required></textarea>
                    </div>
                  </div>
                </div>
                
                <div class="mt-4 d-flex justify-content-center">
                    <a href="#" class="btn-black">SEND ></a>
                </div>
              </form>
  
            </div>
            <div class="col text-center">
  
              <!-- INFO -->
              <div class="contactinfo">
                <div class="row">
                  <div class="col text-center">
                    <h2>DRAPECLOTHING11@GMAIL.COM</h2>
                    <h4>EMAIL</h4>
                  </div>
                </div>
  
                <div class="row mt-4">
                  <div class="col text-center">
                    <h2>+63 905 517 6786</h2>
                    <h4>PHONE NUMBER</h4>
                  </div>
                </div>
  
                <div class="row mt-4">
                  <div class="col">
                    <div class="row d-flex justify-content-center mb-3">
                      <a class="btn-black" href="https://www.facebook.com/DrapeClothing11" target="_blank"> 
                        FACEBOOK ></a> 
                      <a class="btn-black ms-3" href="https://www.instagram.com/drape.clothing/" target="_blank">
                        INSTAGRAM ></a> 
                    </div>
                    <h4>SOCIALS</h4>
                  </div>
                </div>
  
                <div class="row mt-4">
                  <div class="col">
                    <div class="row d-flex justify-content-center mb-3">
                      <a class="btn-black" href="https://shopee.ph/drapeclothing" target="_blank"> 
                        SHOPEE ></a> 
                    </div>
                    <h4>CHECK US OUT!</h4>
                  </div>
                </div>
              </div>      
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- FOOTER -->
    <?php include("footer.php")?>
    
</body>

</html>
