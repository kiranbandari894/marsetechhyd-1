$(document).ready(function(){
    
    $('.carousel-item').attr('data-bs-interval','2000');
   $('#concept_image,#subject_concept_name,#concept_image').attr('disabled','disabled');
     
   var height_header =  $('header').height();
   var width_body =  $('body').innerWidth();
    
   if(width_body < 650){
       $('#sub_topics').addClass('order-2');
       $('#sub_topics_content').addClass('order-1');
        

   }
   $('.main_container').css('position','relative');
   $('.main_container').css('top',height_header+10+'px');
    
   $('#add_concept,#add_subject,#add_mcqs,#my_menu,#youtube_container').css('position','relative');
   $('#add_concept,#add_subject,#add_mcqs,#my_menu,#youtube_container').css('top',height_header+10+'px');
//    Nav bar toggle in mobile mode
   $(document).on('click','.bars',function(){
        $('nav.navbar').toggle('slow');
     });
   //    Nav bar toggle in mobile mode ends

    // adding subject or subject with concept start

    $(document).on('change','#typeof_sub',function(){
        var selected_option = $(this).val();
        //    alert(selected_option);
        if(!!selected_option && selected_option == "with_concept"){
            $('.add_inputs').html('<div class="form-group"> \
                                   <select name="subject"  id="subject"> \
                                   <option style="color:black;" value="">--select--</option>        \
                                                \
                                   </select> \
                                 </div> \
                                 <div class="form-group"> \
                                     <input type="text" name="concept" placeholder="Enter Concept" /> \
                                  </div>');
            $.ajax({
                url : "../scripts/php_scripts/add_concept_subject.php?get_subjects",
                method : "GET",
                success : function(res){
                   var output ;
                   $.each(JSON.parse(res),function(key,value){
                       output += "<option value='"+value['subject']+"'>"+value['subject']+"</option>";
                   });
                   $('#subject').html("<option value=''>--select--</option>"+output);
                }
            });
          
        }
        else if(!!selected_option && selected_option == "onlysubject"){
            $('.add_inputs').html('<div class="form-group"><input type="text" name="subject" placeholder="Enter subject" /></div>');
        }
    });

    $(document).on('submit','#add_subject',function(e){
        e.preventDefault();
        var data = new FormData(this);
        var selected_option_box = $('#typeof_sub').val();
        if(!!selected_option_box ){
             $.ajax({
                url : "../scripts/php_scripts/insert_sub_concept.php",
                method : "post",
                data : data,
                processData :false,
                contentType :false,
                success : function(res){
                if(res == "success"){
                        $('.adding_result').css('padding','10px');
                        $('.adding_result').css('color','white');
                        $('.adding_result').css('font-size','16px');
                        $('.adding_result').css('background','#86ff1c');
                        $('.adding_result').html("<b> Successfully inserted .....</b>");
                }
                else{
                    $('.adding_result').css('padding','10px');
                    $('.adding_result').css('color','white');
                    $('.adding_result').css('font-size','16px');
                    $('.adding_result').css('background','red');
                    $('.adding_result').html("<b>"+res+"</b>");
                }
                }
            });
      4}else{
          alert('Please select any one option...');
      } 

    });

   // adding subject or subject with concept start

//    adding Concept to the subject
   $(document).on('change','#subject_name,#subject_mcq',function(){
       var subject = $(this).val();
       if(!!subject){
        $.ajax({
            url : '../scripts/php_scripts/add_concept_subject.php?get_concepts',
            method : "GET",
            data : {subject:subject},
            success : function(res){
              
                $('#subject_concept_name').removeAttr('disabled','disabled');

                 var output ;
                 $.each(JSON.parse(res),function(key,value){
                    output += "<option value='"+value['concept']+"'>"+value['concept']+"</option>";
                 });

                 $('#subject_concept_name').html("<option value=''>--select--</option>"+output);

            }
        });
        
       }
   });

   $(document).on('change','#image_options',function(){
       var selected = $(this).val();
       if(!!selected && selected == "with_image" ){
           $('#concept_image').removeAttr('disabled','disabled');
       }else if(!!selected && selected == "no_image"){
        $('#concept_image').attr('disabled','disabled');
       }

   });


  $(document).on('submit','#add_concept',function(e){
      e.preventDefault();
      var data = new FormData(this);
      $.ajax({
          url : "../scripts/php_scripts/add_concept_subject.php?add_concept",
          method : "POST",
          data : data,
          processData : false,
          contentType : false,
          success : function(res){
            //   console.log(res);

            if(res == "success"){
                $('.adding_result').css('padding','10px');
                $('.adding_result').css('color','white');
                $('.adding_result').css('font-size','16px');
                $('.adding_result').css('background','#86ff1c');
                $('.adding_result').html("<b> Successfully inserted .....</b>");
                $('.main_container').find('form')[0].reset();
               
            }
            else{
                $('.adding_result').css('padding','10px');
                $('.adding_result').css('color','white');
                $('.adding_result').css('font-size','16px');
                $('.adding_result').css('background','red');
                $('.adding_result').html("<b>"+res+"</b>");
                $('.main_container').find('form')[0].reset();
            }
          }
      });
  });

//    adding Concept to the subject Ends
//  adding MCQ'S start
 $(document).on('submit','#add_mcqs',function(e){
    e.preventDefault();
    var data = new FormData(this);
    $.ajax({
        url : "../scripts/php_scripts/add_concept_subject.php?add_mcq",
        method : "POST",
        data : data,
        processData : false,
        contentType : false,
        success : function(res){
           if(res == "success"){
                $('.adding_result').css('padding','10px');
                $('.adding_result').css('color','white');
                $('.adding_result').css('font-size','16px');
                $('.adding_result').css('background','#86ff1c');
                $('.adding_result').html("<b> Successfully inserted .....</b>");
                $('.main_container').find('form')[0].reset();
               
            }
            else{
                $('.adding_result').css('padding','10px');
                $('.adding_result').css('color','white');
                $('.adding_result').css('font-size','16px');
                $('.adding_result').css('background','red');
                $('.adding_result').html("<b>"+res+"</b>");
                $('.main_container').find('form')[0].reset();
            }
        }
    });

 });
// adding MCQ'S ends

// adding Images to concept
$(document).on('submit','#add_images',function(e){
    e.preventDefault();
    var data = new FormData(this);
    $.ajax({
        url : '../scripts/php_scripts/add_concept_subject.php?add_images',
        method : 'POST',
        data : data,
        processData : false,
        contentType : false,
        success : function(res){
    
                $('.adding_result').css('padding','10px');
                $('.adding_result').css('color','white');
                $('.adding_result').css('font-size','16px');
                $('.adding_result').css('background','#86ff1c');
                $('.adding_result').html("<b> Successfully inserted .....</b>");
                $('.main_container').find('form')[0].reset();
            
        }
    });
});
// adding Images to concept ends
var total_answered = parseInt($('#answered').attr('value'));
var answered_correct=0 ;
var answered_wrong=0;
// submiting objecting form on change option
$(document).on('change',"#objective_container input",function(){
  var disapper = $(this);
  var  total_questions_topic = parseInt($('#answered').attr('data-total-questions'));
  var total_answered_questions=0;
 
  var seleced = $(this).val();
  var id = $(this).attr('id');
  $.ajax({
    url : "scripts/php_scripts/add_concept_subject.php?check_answer",
    method : "GET",
    data : {selected_answer:seleced,id:id},
    success : function(res){
    //   if(total_answered_questions == total_questions_topic){
      
    //   }else{
        if(res=="true"){
            total_answered_questions++;
           
            answered_correct++;
             if(total_answered == 0){
                 
                 total_answered++ ;
             }else{
                total_answered++; 
               
             }
             console.log(answered_correct);
             if(total_answered == total_questions_topic){
                if(answered_correct == total_answered){
                    $('.result_card').html(' <p class="alert alert-success"> Congrates You have answered all the Questions .....<i class="fa-solid fa-bell-on"></i> </p> <img src="images/completed_answers.gif" class="img-fluid" >');
                    $('#exampleModal').modal('show');
                }else{
                    $('.result_card').html(' <p class="alert alert-success"> Congrates You have answered total '+answered_correct+' correct answers.....<i class="fa-solid fa-bell-on"></i> </p> \
                    <p class="alert alert-success"> You have  Answered  '+ answered_wrong +' Wrong Answres.....<i class="fa-solid fa-bell-on"></i> </p> \
                    <p class="alert alert-success"> You have secured totalal percentage of  '+(answered_correct/total_answered)*100+' %.....<i class="fa-solid fa-bell-on"></i> </p> \
                    <img src="images/thankyou.png" class="img-fluid" >');
                    $('#exampleModal').modal('show');
                } 
               
             }else{
                
                $('.result_card').html(' <p class="alert alert-success"> Correct .. </p> <img src="images/answer_correct.png" class="img-fluid" >');
                $('#exampleModal').modal('show');
             }
            
    
            //  for disabling the options once answered
             $("."+disapper.attr('class')).attr('disabled','disabled');
    //    For updating the score card
            $('#answered').html(total_answered);
    
           }else{
            console.log(answered_correct);
            if(answered_wrong == 0){
                answered_wrong++;
            }else{
                answered_wrong++;
            }
            console.log(answered_wrong);
            total_answered_questions++;
            total_answered++;
            
            if(total_answered == total_questions_topic){
                 
                if(answered_correct == total_answered){
                    $('.result_card').html(' <p class="alert alert-success"> Congrates You have answered all the Answres.....<i class="fa-solid fa-bell-on"></i> </p> <img src="images/completed_answers.gif" class="img-fluid" >');
                    $('#exampleModal').modal('show');
                }else{
                    $('.result_card').html(' <p class="alert alert-success"> Congrates You have answered total '+answered_correct+' correct answers.....<i class="fa-solid fa-bell-on"></i> </p> \
                    <p class="alert alert-success"> You have  Answered  '+ answered_wrong +' Wrong Answres.....<i class="fa-solid fa-bell-on"></i> </p> \
                    <p class="alert alert-success"> You have secured totalal percentage of  '+(answered_correct/total_answered)*100+' %.....<i class="fa-solid fa-bell-on"></i> </p> \
                    <img src="images/thankyou.png" class="img-fluid" >');
                    $('#exampleModal').modal('show');
                }
             }else{
                $("."+disapper.attr('class')).attr('disabled','disabled');
                $('.result_card').html(' <p class="alert alert-danger"> Sorry..Wrong answer... </p> <img src="images/wrong.gif" class="img-fluid" >');
                $('#exampleModal').modal('show');

             }
           
           }

    //   }  
       
       
    }
    
  });
});

// submiting objecting form on change option
$(document).on('submit','#add_youtube',function(e){
     e.preventDefault();
     var data = new FormData(this);
     $.ajax({
         url : "../scripts/php_scripts/add_concept_subject.php?add_youtube",
         method : "POST",
         data : data,
         processData : false,
         contentType : false,
         success : function(res){
             console.log(res);
         }
     });
});

// Run you tube on modal
$(document).on('click','#yotubevideo',function(e){
    e.preventDefault();
    var ytId  = $(this).attr('data-youtube-id');
    var iframeYt = '<iframe width="100%" height="350px" src="https://www.youtube.com/embed/'+ytId+'?modestbranding=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' 
    $('.result_card').html(iframeYt);
    $('#exampleModal').modal('show');
});

$(document).on('hidden.bs.modal','#exampleModal',function(){
   $('#exampleModal iframe').attr('src',$('#exampleModal iframe').attr('src'));
});
// login modal
$(document).on('click','#login_form',function(e){
  e.preventDefault();
  $('#login_form_modal').modal('show');
});


});