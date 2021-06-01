<?php
namespace allanlee\view\security;

class Register extends\allanlee\view\View{
  
    
    protected function section($model) {
    $ctrl = "allanlee\controller\security\Register";
?>
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>New account / Sign in</li>
                    </ul>

                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>New account</h1>

                        <p class="lead">Not our registered customer yet?</p>
                        <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>
                        <div id="response"></div>
                        <form action="/"id="registrationForm">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="<?= $ctrl::FORM_NAME ?>"  pattern="[^0-9]+" required="required">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="<?= $ctrl::FORM_EMAIL ?>"pattern=".+@.+\..+" required="required" >
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="<?= $ctrl::FORM_PASSWORD ?>" required="required">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>Login</h1>

                        <p class="lead">Already our customer?</p>
                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies
                            mi vitae est. Mauris placerat eleifend leo.</p>

                        <hr>

                       <div id="signinResponse"></div>
                        <form  id="signinForm" action="/" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email"name=" <?= $ctrl::FORM_EMAIL ?>" required="required">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="<?= $ctrl::FORM_PASSWORD ?>" required="required">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>

<script>
    /*
     $(document).ready(function(){       
        $("#email").on('blur',function(){
           if(this.validity.patternMismatch)
               {
                   $(this).css('backgroundColor','#FFC0C0');
               }
        });    
    });
    */
     // attach a submit event handler to the form
                    $("#registrationForm").submit(function(event){  
                              
                        // prevent the default operation
                        event.preventDefault();
                        // serialize the form data
                        var formData = $("#registrationForm").serialize();
                        
                        console.log(formData); 
                   
                         
                       // post the data to  register-response                        
                        var posting = $.post("<?= PROJECT_URL?>register-response",formData);
                        // read the response from PHP code
                        
                        posting.done(function(data){
              
                           var response = JSON.parse(data);

                            var message = response.message;

                            if(response.success == 'yes')
                                {
                                  $("#registrationForm").fadeOut(500);
                                  $("#response").css('background-color',"#4fbfa8"); 
                              
                                }
                                else
                                {
                                  $("#response").css('color',"brown");   
                                }
                                
                            $("#response").empty().append(message);
                            
                        });
                        
                    });
                    
                 $("#signinForm").submit(function(event){ 
                     
                     
                      event.preventDefault();
                        // serialize the form data
                        var formData = $("#signinForm").serialize();
                        
                        console.log(formData); 
                 
                     
                   // post the data to  register-response                        
                        var posting = $.post("<?= PROJECT_URL ?>signin-response",formData);
                        // read the response from PHP code
                        
                        posting.done(function(data){
                            try{                         
                            var response = JSON.parse(data);

                            var message = response.message;

                            if(response.success == 'yes')
                                {
                                  open("<?= PROJECT_URL ?>customer-orders","_self");                                   
                                }
                                else
                                {
                                  $("#signinResponse").css('color',"brown");   
                                }
                                
                            $("#signinResponse").empty().append(message);
                            
                            }catch(e){
                              $("#signinResponse").empty().append(data); 
                            }
              
               });
               
           });
                  
</script>
    <?php
    }
}
?>