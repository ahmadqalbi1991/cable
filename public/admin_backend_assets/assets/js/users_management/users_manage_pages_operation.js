function  showUser(user_id)
{



}


function editUser(user_id) {


}

function removeUser(user_id) {


    var host = window.location.origin;
    var deleteUrl = "/admin/user/delete?deleteUserId="+user_id;




        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                Swal.fire(
                    "Deleted!",
                    "Your file has been deleted.",
                    "success"
                )
                var url = host + deleteUrl;

                location.replace(url);

                // result.dismiss can be "cancel", "overlay",
                // "close", and "timer"
            } else if (result.dismiss === "cancel") {
                Swal.fire(
                    "Cancelled",
                    "Your imaginary Profile is safe :)",
                    "error"
                )
            }
        });


}
