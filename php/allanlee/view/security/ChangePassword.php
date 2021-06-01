<?php

namespace allanlee\view\security;

class ChangePassword extends \allanlee\view\View {

    protected function section($model) {

        $ctrl = "allanlee\controller\security\Register";
        ?>
        <h2 class="container text-center page-header"><?= $this->title ?></h2>       
        <div class="container">
            <!-- Example row of columns -->
            <div class="row">   
                <div class ="col-md-4 col-sm-3 col-xs-0"></div>
                <div class="col-md-4 col-sm-6 col-xs-12 text-center">  
                    <div id="response" style="color:brown" ></div>
                    <form action="/" id="registrationForm" novalidate="novalidate">
     
                        <div class="form-group">
                            <input type="password" id="password1" class="form-control" placeholder="password" name="<?= $ctrl::FORM_PASSWORD ?>" pattern=".{8,20}" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" id="password2" class="form-control" placeholder="password confirmation" name="<?= $ctrl::FORM_PASSWORD_CONFIRMATION ?>" pattern=".{8,20}" required="required">
                       
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" >
                        </div>
                    </form>   
                </div>
            </div>
        </div>

        <script>

      

            // attach a submit event handler to the form
            $("#registrationForm").submit(function(event){
                              
                // prevent the default operation
                event.preventDefault();
           
                var password1 = $('#password1').val();
                var password2 = $('#password2').val();
                        
                console.log(password1 + "  " + password2);
                        
                if(password1 && password2)
                {
                    if(password1 != password2)
                    {
                        $('#password1').css('background-color','#FFC0C0').val(''); 
                        $('#password2').css('background-color','#FFC0C0').val(''); 
                        $('#password1').focus();
                    }                       
               else
                   {

                // serialize the form data
                var formData = $("#registrationForm").serialize();
            
           
                // post the data to  register-response                        
                var posting = $.post("<?= PROJECT_URL ?>change-password-response",formData);
                // read the response from PHP code
                                
                posting.done(function(data){
                                                             
                    var response = JSON.parse(data);

                    var message = response.message;

                    if(response.success == 'yes')
                    {
                        $("#registrationForm").fadeOut(500);                                   
                    }
                    else
                    {
                        $("#response").css('color',"brown");   
                    }
                                        
                    $("#response").empty().append(message);
                      
                });
                }       
            }
            
            });
                          
        </script>
        <?php
    }

}
?>
