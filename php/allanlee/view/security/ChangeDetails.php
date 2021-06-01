<?php

namespace allanlee\view\security;

class ChangeDetails extends \allanlee\view\View {

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
        <!--                   <form action="<?= PROJECT_URL ?>register" method="post"> -->
                        <div class="form-group">
                            <label><span style="color:gray">first name</span>
                            <input type="text" class="form-control"  name="<?= $ctrl::FORM_FIRST_NAME ?>" pattern="[^0-9]+" required="required" value="<?= $model->getFirstName() ?>">
                            </label>
                            </div>
                        <div class="form-group">
                            <label><span style="color:gray">last name</span>
                            <input type="text" class="form-control"  name="<?= $ctrl::FORM_LAST_NAME ?>"  pattern="[^0-9]+" required="required"  value="<?= $model->getLastName() ?>">
                            </label>
                            </div>
                        <div class="form-group">
                            <label><span style="color:gray">email</span>
                            <input id="email" type="text" class="form-control"  name="<?= $ctrl::FORM_EMAIL ?>" pattern=".+@.+\..+" required="required" value="<?= $model->getEmail() ?>">
                            </label>
                            </div>
                        <div class="form-group">
                            <label><span style="color:gray">newsletter</span><input type="checkbox" class="form-control"  name="<?= $ctrl::FORM_NEWSLETTER ?>" <?= ($model->isNewsletter())?'checked': '' ?> ></label>
        
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
            
                          
                var form = document.getElementById("registrationForm");   
               
               var validInput = true;
               
                for(var i = 0; i < 3; i++)
                {   
                    var input = form[i];
                            
                    input.style.backgroundColor = '#FFFFFF';
                            
                    var mismatch = input.validity.patternMismatch;
                            
                    mismatch = mismatch | (input.required && input.validity.valueMissing);
                                         
                    if(mismatch)
                    {
                        input.style.backgroundColor = '#FFC0C0';
                        $("#response").empty().html("please correct invalid fields");
                        validInput = false;
                    }
                }
                             
                                       
           if(validInput)
               {
                // serialize the form data
                var formData = $("#registrationForm").serialize();
            
           
                // post the data to  register-response                        
                var posting = $.post("<?= PROJECT_URL ?>change-details-response",formData);
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
                       
            });
                          
        </script>
        <?php
    }

}
?>
