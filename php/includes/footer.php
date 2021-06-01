       <!-- *** FOOTER ***
 _________________________________________________________ -->
        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>Pages</h4>

                        <ul>
                            <li><a href="about-designer.html">About designer</a>
                            </li>
                            <li><a href="privacy-policy.html">Terms and conditions</a>
                            </li>
                            <li><a href="faq.html">FAQ</a>
                            </li>
                            <li><a href="contact.html">Contact us</a>
                            </li>
                        </ul>

                        <hr>

                        <h4>User section</h4>

                        <ul>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                            </li>
                            <li><a href="register.html">Regiter</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Top categories</h4>

                        <h5>Ladies</h5>
                        <ul>
                            <li><a href="category.html">Top</a>
                            </li>
                            <li><a href="category.html">Dress</a>
                            </li>
                            <li><a href="category.html">Pants</a>
                            </li>
                            <li><a href="category.html">Shorts</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Where to find us</h4>

                        <p><strong>Allan Lee Ltd.</strong>
                            <br>16 Belvoir Street  
                            <br>Surry Hills
                            <br>NSW 2010
                            <br>
                            <strong>Australia</strong>
                        </p>

                        <a href="contact.html">Go to contact page</a>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-3 col-sm-6">

                        <h4>Get the news</h4>

                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                        <div id="subscribe"></div>
                        <form action="/" id="subscriptionForm">

                            <div class="input-group">

                                <input type="text" class="form-control" name="<?= allanlee\controller\security\Register::FORM_EMAIL ?>"pattern=".+@.+\..+" required="required" >

                                <span class="input-group-btn">

                                    <input type="submit" class="btn btn-default" value="Subscribe"> 
                                </span>

                            </div>
                            <!-- /input-group -->
                        </form>

                        <hr>
                       

                        <h4>Stay in touch</h4>

                        <p class="social">
                            <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                        </p>


                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2015 Your name goes here.</p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right">Template by <a href="http://www.bootstrapious.com">Responsive Templates</a> with support from <a href="http://kakusei.cz">Designové předměty</a> 
                        <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :) -->
                    </p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->

<!-- *** SCRIPTS TO INCLUDE ***
_________________________________________________________ -->

<script src="<?= JS_URL ?>bootstrap.min.js"></script>
<script src="<?= JS_URL ?>jquery.cookie.js"></script>
<script src="<?= JS_URL ?>waypoints.min.js"></script>
<script src="<?= JS_URL ?>modernizr.js"></script>
<script src="<?= JS_URL ?>bootstrap-hover-dropdown.js"></script>
<script src="<?= JS_URL ?>owl.carousel.min.js"></script>
<script src="<?= JS_URL ?>front.js"></script>

<script>
    // attach a submit event handler to the form
    $("#subscriptionForm").submit(function(event){  
                       
                                
        // prevent the default operation
        event.preventDefault();
        // serialize the form data
        var formData = $("#subscriptionForm").serialize();
                       
       console.log(formData);                  
                        
        // post the data to  register-response                        
        var posting = $.post("<?= PROJECT_URL ?>subscription-response",formData);
        // read the response from PHP code
                        
        posting.done(function(data){
              
            var response = JSON.parse(data);

            var message = response.message;

            if(response.success == 'yes')
            {
                                  
                $("#subscribe").css('background-color',"#4fbfa8"); 
                              
            }
            else
            {
                $("#subscribe").css('color',"brown");   
            }
                                
            $("#subscribe").empty().append(message);
                            
        });
                        
    });
</script>


</body>S

</html>
