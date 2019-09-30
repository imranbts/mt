
//jQuery(document).ready(function($){
    jQuery(function($){

        if( $('body').hasClass('single-post') ){
    
       
    
        // validate Comment form on keyup and submit
        jQuery("#contact").validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                message: "required",
            },
            messages: {
                name: "Please type your first name",
                email: "Please type a valid email address",
                message: "Please type message"
            }
        });
        
    
        // jQuery('#comment_form_submit_btn').click(function(){
        //     //event.preventDefault();
        //     //console.log('Validation Result = '+$("#comment_form").valid());
        //     if(jQuery("#comment_form").valid() != false){
        //         jQuery("#comment_form").submit(function(e){
        //             e.preventDefault();
                    
        //             var user_ip = '';
        //             $.getJSON("https://api.ipify.org/?format=json", function(e) {
        //                 console.log(e.ip);
        //                 user_ip = e.ip;
    
        //                 Comment_Form_Submission(user_ip);
                        
        //             });
    
                    
        //         });
        //         //return;
        //     }
        // });
    
        if($("#contact").valid() != false){
            $("#contact").submit(function(e){
            e.preventDefault();
            
        
    
    
            var ContactFormRequestData = new FormData();
                ContactFormRequestData.append('action'    , 'contact_us_request_handler');
                ContactFormRequestData.append('NAME'	 , $('#name').val());
                ContactFormRequestData.append('EMAIL'	, $('#email').val());
                ContactFormRequestData.append('WEBSITE'	, $('#message').val());
                
    
            $.ajax({
                method:"POST",
                dataType: "json",
                url: contact_us_ajax_obj.ajaxurl,
                data:ContactFormRequestData,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false		
                success: function (response) {
                    console.log('ContactFormResult  =   '+response);
                    
                    console.log(response);
                   
                    
                    if(response.code == 1){
                        // jQuery("#notifications_modal").modal({backdrop: "static"});
                        // jQuery('#notifications_modal #modal-title').text(response.header);
                        // jQuery('#notifications_modal #dialog_p').text(response.message);
                        // jQuery('#close_btn_notifications_modal').click(function(){
                        //     jQuery("#notifications_modal").modal('hide');
                        //     window.location.reload(true);                        
                        //});
                        console.log(response.message);
                    }
                    
                        
                }
            
            });
    
        });
    }    
        
    
    
        }    
    
    });