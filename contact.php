<?php include "header.php" ?>

<!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Contact</h6>
                <h1>Contact For Any Query</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
                        <form name="sentMessage" novalidate="novalidate">
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="name" name="name" placeholder="Your Name"
                                        required="required" data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="control-group col-sm-6">
                                    <input type="number" class="form-control p-4" id="contact" name="contact" placeholder="Contact"
                                    required="required" data-validation-required-message="Please enter a Contact" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                    <input type="email" class="form-control p-4" id="email" name="email" placeholder="Your Email"
                                    required="required" data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control py-3 px-4" rows="5" id="message" name="message" placeholder="Message"
                                    required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary py-3 px-4" type="submit" name="send" id="sendMessageButton">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

<?php include "footer.php" ?>
<?php
if(isset($_REQUEST["send"])){
  $sql = "INSERT INTO `inquiry`(`name`, `contact`, `email`, `message`) VALUES ('".$_REQUEST["name"]."','".$_REQUEST["contact"]."','".$_REQUEST["email"]."','".$_REQUEST["message"]."')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>window.location='index.php';</script>";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
} 
mysqli_close($conn);
?>