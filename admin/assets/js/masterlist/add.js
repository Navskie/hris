$(document).ready(function() {
  $("#addMaster").click(function(e) {
    e.preventDefault();

    var formData = $("#masterlistForm").serialize();

    $(this).text('Data Gathering...');

    $.ajax({
      type: "POST",
      url: "controller/master/add",
      data: formData,
      dataType: "json",
      success: function (response) {
        console.log(response.sample)
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.table(jqXHR)
      }
    });
  });
});