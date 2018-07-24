
$(document).ready(function () {

    console.log('Test Enzo');
    // search with filters
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
        $('.input-group #search_param').val(param); 
	});

    // Dropdown for contract type, category and department
    $("#department").prop("disabled", true);
        $("#category_type").click(function() {   
            console.log($("#category_type option:selected" ).text());
            if($("#category_type option:selected" ).text() == "Human Resources"){      
                console.log('Human Resources');
                $("#department").prop("disabled", false);
            }
            else{
                // cannot select the not applicable
                changeSelection();
                $("#department").prop("disabled", true);
                console.log('Others Category');
            }
        });  
    });     
     //Delete Alert
    $("#FormDeleteTime").live("click",function(event){
        event.stopPropagation();
        if(confirm("Do you want to delete?")) {
         this.click;
            return true;
        }
        else
        {
            // alert("Cancel");
        }       
        event.preventDefault(); 
    });



    function changeSelection(){
        var eID = document.getElementById("department");
        eID.options[0].selected="true";
        }
                
                
    // Date picker for effective date            
    $("#effectdate").click(function(){
        $('#effectdate').datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $('#effectdate').datepicker('show');
    });
    
    // Date picker for expiration date
    $("#expiredate").click(function(){
        $('#expiredate').datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $('#expiredate').datepicker('show');
    });
                        
    // Upload Files          
    $(".uploadfile").click(function(){
        var inputOne = $("#vendor_name");
        var inputTwo = $(".name");
        inputTwo.val(inputOne.val());
    });

            
            

    //Initialize tooltips
//     $('.nav-tabs > li a[title]').tooltip();
    
//     //Wizard
//     $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

//         var $target = $(e.target);
    
//         if ($target.parent().hasClass('disabled')) {
//             return false;
//         }
//     });

//     $(".next-step").click(function (e) {

//         var $active = $('.wizard .nav-tabs li.active');
//         $active.next().removeClass('disabled');
//         nextTab($active);

//     });
//     $(".prev-step").click(function (e) {

//         var $active = $('.wizard .nav-tabs li.active');
//         prevTab($active);

//     });    
 

// function nextTab(elem) {
//     $(elem).next().find('a[data-toggle="tab"]').click();
// }
// function prevTab(elem) {
//     $(elem).prev().find('a[data-toggle="tab"]').click();
// }

// $(".delete").off().click(function(){
//     let id = $(this).data("id");

//     $("#id").text(id);
// });



