$(document).ready(function(){
   
    // new DataTable('#example', {
    //     buttons: [
    //         'excel'
    //     ]
    // });

    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );

    // Adding member
    $('#save').click(function(e){
        e.preventDefault();
      
        const name = $('#name').val()
        const school = $('#school').val()
        const email = $('#email').val()
        
        if(!name || !email || !school){
            $('#errMsg').addClass('alert alert-danger')
            $('#errMsg').html("You have not fill all the required fields");
           
            return false;
        }
        else{

            $.ajax({
                method: 'POST',
                url: './controller/member.controller.php',
                data: {
                    action:'addMember',
                    name,
                    email,
                    school
                },
                
                success: function(data){
                    
                        $('#msg').addClass('alert alert-success');
                        $('#msg').html(data);
                        $('#example').load(location.href + " #example");
                        console.log(data);
                    
                }

            });
        }
    });


    //View Member on Load
    $('.editMembersBtn').click(function(){
        
        let $member_id = $(this).val();          
        $.ajax({
            type: "GET",
            //url: "./controller/member.controller.php?member_id=" + $member_id,
            url: "./controller/member.controller.php",
                data: {
                    action:'getMember',
                    $member_id
                },
            success: function (data) {
                    //alert($member_id)      
                    $('#member_id').val(data.id);
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    //$('#school').val(data.school);                    
                    $('#memberEditModal').modal('show');
                
            }
        });

    });



     // Adding school
     $('#addSchool').click(function(e){
        e.preventDefault();
      
        const name = $('#name').val()
        const country = $('#country').val()
       console.log(name, country);
        
        if(!name || !country){
            $('#errMsg').addClass('alert alert-danger')
            $('#errMsg').html("You have not fill all the required fields");
           
            return false;
        }
        else{

            $.ajax({
                method: 'POST',
                url: './controller/school.controller.php',
                data: {
                    action:'addSchool',
                    name,
                    country
                },
                
                success: function(data){
                    //setTimeout(() => {
                        $('#msg').addClass('alert alert-success');
                        $('#msg').html(data);
                        $('#schoolTable').load(location.href + " #schoolTable");
                        console.log(data);
                    //}, 1500);
                }

            });
        }
    });

    // Getting all members

    $.ajax({
        method: 'GET',
        url: './controller/member.controller.php',
        dataType: 'json',
        action: 'loadAll',
        data: { action:'loadAll'},
        success: function (resp) {

            console.log(resp);
            // if (data) {
            //     console.log(data);
            // } else {
            //     console.error('Empty or invalid data received');
            // }
        },
        fail: function () {
            console.error('Error fetching data');
        }
    });




})