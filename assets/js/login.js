$(document).ready(function() {
  $("#access").click(function() {
    const idNumber = $("#myID").val();
    const passWord = $("#passWord").val();

    $("#access").html("Please wait...").prop('disabled', true);

    function notif(title, message) {
        $(".notification").addClass("active");
        $(".title").text(title);
      $(".message").text(message);
    }

    $.ajax({
        type: "POST",
        url: "controller/login/login",
        data: { idNumber : idNumber, passWord : passWord },
        dataType: "json",
        success: function(response) {
          console.log(response.message)
          if (response.status === 'success') {
            notif(response.title, response.message);
            setTimeout(() => {
              $(".notification").removeClass("active");
              window.location.reload();
            }, 3000);
          } else {
            notif(response.title, response.message);
            setTimeout(() => {
              $(".notification").removeClass("active");
              window.location.reload();
            }, 3000);
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.table(jqXHR);
          $("#access").html("Access").prop('disabled', false);
        }
    });
  });
});
