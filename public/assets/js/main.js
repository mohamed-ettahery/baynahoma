$( document ).ready(function() {


    // Get Count Messages

    // setInterval(() =>{
    //     $.ajax({
    //         type: 'GET',
    //         url: '<?= site_url("Messages/getCountNotRead")?>',
    //             success: function(data){
    //                 // alert(typeof(data));
    //                 if(data>0)
    //                 {
    //                     $(".unread-messages").html(data);
    //                     $(".unread-messages").removeClass("d-none");
    //                 }
    //                 else
    //                 {
    //                     if(!$(".unread-messages").hasClass("d-none"))
    //                     {
    //                         $(".unread-messages").addClass("d-none");
    //                     }
    //                 }
    //             }
    //         });

    // }, 500);

    //Register

    //Enter Days in The Days' select

    remplirSelectDays();
    remplirSelectMonths();
    remplirSelectYears();
    function remplirSelectDays()
    {
        for(let i=1;i<=31;i++)
        {
            if(i<10)
            {
               $("#select-days").append("<option>0"+i+"</option>");
            }
            else
            {
                $("#select-days").append("<option>"+i+"</option>");
            }
        } 
    }
    function remplirSelectMonths()
    {
        for(let i=1;i<=12;i++)
        {
            if(i<10)
            {
               $("#select-months").append("<option>0"+i+"</option>");
            }
            else
            {
                $("#select-months").append("<option>"+i+"</option>");
            }
        } 
    }
    function remplirSelectYears()
    {
        for(let i=1960;i<=2004;i++)
        {
           $("#select-years").append("<option>"+i+"</option>");
        } 
    }

    //Edit Profile info
    $(".change-image").click(function(){
        "use strict";
        $("#image-input-file").click();
        $("#image-input-file2").click();
    });

    $("#delete-account").click(function(e){
        "use strict";
        e.preventDefault();
        Swal.fire({
            title: 'هل انت متاكد?',
            text: 'هل انت متاكد انك تريد حذف حسابك!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'إلغاء',
            confirmButtonText: 'نعم , احذف!'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                ' تم الحذف!',
                ' لقد تم حذف حسابك.',
                'success'
              ).then((result)=>{
                 window.open($(this).attr('href'),'_self');
              })
            }
          })
    });

    $(".cover-box .img-profile,.cover-box .change-image").mouseenter(function(){
        "use strict";
        $(".cover-box .change-image").removeClass("d-none");
    })
    $(".cover-box .img-profile").mouseleave(function(){
        "use strict";
        $(".cover-box .change-image").addClass("d-none");
    })

    const input = document.getElementById('image-input-file');
    if(input!=null)
    {
        input.addEventListener('change', function (e) {
            // alert('yeppp');
            const reader = new FileReader()
            reader.onload = function () {
            var src = reader.result
            $('.img-edit-profile').attr("src",src);
            }
            reader.readAsDataURL (input.files [0]) ;
            
        }, false);
    }


        const input2 = document.getElementById('image-input-file2');
        if(input2!=null)
        {
            input2.addEventListener('change', function (e) {
                // alert('yeppp');
                const reader = new FileReader()
                reader.onload = function () {
                var src = reader.result
                $('.img-profile').attr("src",src);
                }
                reader.readAsDataURL (input2.files [0]) ;

                Swal.fire({
                    title: ' هل تريد تاكيد  التعديلات ?',
                    showCancelButton: true,
                    confirmButtonText: 'تاكيد',
                    cancelButtonText: `الغاء `,
                  }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $("#form-update-profile-img").submit();
                    //   Swal.fire('Saved!', '', 'success')
                    }
                    else if (result.dismiss === Swal.DismissReason.cancel)
                    {
                        $('.img-profile').attr("src",$("#old-img-value").val());
                        $("#image-input-file2").val('');
                    }

                  })

            }, false);
        }


     //Serach Page

        $(".clipart").click(function(){
            "use strict";
            $(".clipart").removeClass("border-info");
            $(this).addClass("border-info");
            $(this).siblings(".form-check-input").click();
            // if($("#sexeRadio1").css("color")=="rgb(0, 128, 0)")
            // {
            //     alert('yes');
            // }
            // alert($("#sexeRadio1").css("color"));
        });
        // test();
        // function test()
        // {
        //     if($("#sexeRadio1").css("color")=="rgb(0, 128, 0)")
        //     {
        //         alert("yes");
        //         $('.clipart-man').addClass("border-info");
        //     }
        //     else
        //     {
        //         alert("no");
        //     }
        //     // if($("#sexeRadio2").css("color")=="rgb(0, 128, 0)")
        //     // {
        //     //     $('.clipart-woman').addClass("border-info");
        //     // }
        // }

        //remplir Age's Selects
        AgeSelects();
        function AgeSelects()
        {
            for(let i=18;i<=60;i++)
            {
                $(".select-age").append("<option>"+i+"</option>");
            }
        }


        //ADMIN ACTIONS
        $(".delete-user").click(function(e){
            "use strict";
            e.preventDefault();
            Swal.fire({
                title: 'هل انت متاكد?',
                text: 'هل انت متاكد انك تريد حذف  هذا الشخص!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'إلغاء',
                confirmButtonText: 'نعم , احذف!'
              }).then((result) => {
                if (result.isConfirmed) {
                    window.open($(this).attr('href'),'_self');
                }
              })
        });
        $(".suspend-user").click(function(e){
            "use strict";
            e.preventDefault();
            Swal.fire({
                title: 'هل انت متاكد?',
                text: 'هل انت متاكد انك تريد توقيف  هذا الشخص!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'إلغاء',
                confirmButtonText: 'نعم , توقيف!'
              }).then((result) => {
                if (result.isConfirmed) {
                    window.open($(this).attr('href'),'_self');
                }
              })
        });
        $(".active-user").click(function(e){
            "use strict";
            e.preventDefault();
            Swal.fire({
                title: 'هل انت متاكد?',
                text: 'هل انت متاكد انك تريد   تنشيط  هذا الشخص!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0DF2A7',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'إلغاء',
                confirmButtonText: 'نعم ,   تنشيط!'
              }).then((result) => {
                if (result.isConfirmed) {
                    window.open($(this).attr('href'),'_self');
                }
              })
        });



        // Chat

        scrollToBottom();
        function scrollToBottom()
        {
            $(".content-box").scrollTop($(".content-box").prop("scrollHeight"));
        }

});