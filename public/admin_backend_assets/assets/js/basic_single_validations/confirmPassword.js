var submitForm = false;


function resetPasswordForm() {

    var restPass = null;
    var msg =  null;
    var error = false;

    if(submitForm==false)
    {

        var length = document.getElementById("form_sample_2").elements.length;

        for (var i = 0; i < length; i++) {
            restPass = document.getElementById("form_sample_2").elements[i].value;
            document.getElementById("form_sample_2").elements[i].style.backgroundColor = '#FFFFFF';
            // console.log(i);
            // alert(i);


            if (restPass == null || restPass == "" || restPass == " ") {

                msg = "Please Enter Same Password In Both Fields";

                document.getElementById("form_sample_2").elements[i].focus();
                document.getElementById("form_sample_2").elements[i].style.backgroundColor = 'lightyellow';

                error = true;
                break;
            }


        }

        var p1 = document.getElementById("form_sample_2").elements[1].value;
        var p2 = document.getElementById("form_sample_2").elements[2].value;

        if (p1 != p2)
        {
            msg = "Please Enter Same Password In Both Fields";
            error = true;

        }

        if (error == false) {




                document.getElementById("formMsg").innerHTML = "";
                document.getElementById("formMsg").innerHTML = "<font style='color: #13ff81'>" + "Applying changes to password.." + "</font>";
                // console.log("submitted");
                submitForm = true;
                document.getElementById("form_sample_2").submit();





        } else if (error == true) {
            document.getElementById("formMsg").innerHTML = "<font style='color: red'>" + msg + "</font>";
            // console.log(" Result" + createInstituteData +" "+ msg);
        }



    }}
