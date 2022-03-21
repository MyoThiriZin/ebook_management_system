$("#create-btn").on("click", function (e) {
  e.preventDefault();

  var data = {
    'name': $("#name").val(),
    'description': $("#description").val(),
    'created_by': $("#created_by").val(),
    'updated_by': $("#updated_by").val()
  };

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  $.ajax({
    url: "/authors",
    type: "POST",
    data: data,
    beforeSend: function () {
      $(document).find('small.error-text').text('');
    },
    success: function (response) {
      if (response.status == 400) {
        $.each(response.error, function (prefix, val) {
          $('small.'+prefix+'_err').text(val[0]);
        })
      } else {
        window.location.href = "http://127.0.0.1:8000/authors";
      }
      
   },
    dataType: "json"
  });
});

$("#update-btn").on("click", function (e) {
  e.preventDefault();

  var authorID = $("#id").val();
  var data = {
    'name': $("#name").val(),
    'description': $("#description").val(),
    'created_by': $("#created_by").val(),
    'updated_by': $("#updated_by").val()
  };

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: "/authors/"+authorID,
    type: "PUT",
    data: data,
    beforeSend: function () {
      $(document).find('small.error-text').text('');
    },
    success: function (response) {
      if (response.status == 400) {
        $.each(response.error, function (prefix, val) {
          $('small.'+prefix+'_err').text(val[0]);
        })
      } else {
        window.location.href = "http://127.0.0.1:8000/authors";
      }    
   },
    dataType: "json"
  });
});

function deleteAuthor(id) {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
      type: "DELETE",
      url: "/authors/" + id,
      success: location.reload(),
      dataType: "json"
  });
};
