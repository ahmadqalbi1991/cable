var submitForm = false;


function signupForm()
{

    var base_url = window.location.origin;

    var restPass = null;
    var msg =  null;
    var error = false;

    if(submitForm==false)
    {

        var length = document.getElementById("form_sample_1").elements.length;

        for (var i = 0; i < length; i++) {
            restPass = document.getElementById("form_sample_1").elements[i].value;
            document.getElementById("form_sample_1").elements[i].style.backgroundColor = '#FFFFFF';
            // console.log(i);
            // alert(i);


            if (restPass == null || restPass == "" || restPass == " ") {

                msg = "Please Enter Same Password In Both Fields";

                document.getElementById("form_sample_1").elements[i].focus();
                document.getElementById("form_sample_1").elements[i].style.backgroundColor = 'lightyellow';

                error = true;
                break;
            }


        }




        var p1 = document.getElementById("form_sample_1").elements[5].value;
        var p2 = document.getElementById("form_sample_1").elements[6].value;
        var userEmail = document.getElementById("form_sample_1").elements[4].value;

        if (p1 != p2)
        {
            msg = "Please Enter Same Password In Both Fields";
            error = true;

        }

        if (error == false) {

            if(length!=8){

                document.getElementById("formMsg").innerHTML = "<font style='color: #13ff81'>" + "Please  wait sending code..." + "</font>";

                $.ajax({
                    type: 'post',
                    // url: base_url + "/user/email/verify?ve_email=" + userEmail,
                    url: base_url + "/user/register",
                    cache: false,
                    data: $("#form_sample_1").serialize(),
                    success: function (data) {
                        if (data.status == 'true') {
                            document.getElementById("formMsg").innerHTML = "<font style='color: #13ff81'>" + "Code Sent!" + "</font>";
                            document.getElementById('verifyEmailCode').innerHTML = "<input type=\"text\" name=\"emailCode\" placeholder=\"Enter Code\" class=\"form-control\"/>";
                        }
                    },
                    error: function () {
                        console.log('fail for logs save');
                    }


                });
            }


            // console.log("submitted");

            if(length==8)
            {
                submitForm = true;
                document.getElementById("form_sample_1").submit();

            }





        } else if (error == true) {
            document.getElementById("formMsg").innerHTML = "<font style='color: red'>" + msg + "</font>";
            // console.log(" Result" + createInstituteData +" "+ msg);
        }



    }









}

