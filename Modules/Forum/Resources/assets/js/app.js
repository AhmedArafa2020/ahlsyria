
"use strict";
var endpoint = $("meta[name='baseurl']").attr("content");
var _token = $('meta[name="csrf-token"]').attr('content');
let page = 1;

function filterForum(){

    let search = $('#search-field').val();
    let category_filter = $('input[name="category_filter[]"]:checked').map(function() {
        return $(this).val();
    }).get();

    $.ajax({
        url: endpoint + '/forum/search-query' + '?page=' + page,
        type: 'GET',
        data: {
            query: search,
            category_filter: category_filter
        },
        success: function (response) {
            console.log(response);
            $('#questions-list').html(response.data.content);
        },
        error: function (error) {
            console.log(error);
        }
    });
}


$("#questions-list").length > 0 && filterForum();

$('#search-btn').on('click', function(e) {
    e.preventDefault();
    filterForum();
});

$(document).on("click", ".forumPagination", function (e) {
    e.preventDefault();
    page = $(this).attr("href").split("page=")[1];
    filterForum();
});


// Answer Delete Sweet Alert
$(document).on('click', '.answer_delete', function(e) {
    let answer_id = $(this).data('id');
    let added_url = endpoint + '/forum/answer/destroy/' + answer_id;

    Swal.fire({
        title: are_you_sure,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete'
    }).then((confirmed) => {
        if (confirmed.isConfirmed) {
            location.href = added_url;
        }
    });
});

// Question Delete Sweet Alert
$(document).on('click', '.question_delete', function(e) {
    let question_id = $(this).data('id');
    let added_url = endpoint + '/forum/destroy/' + question_id;

    Swal.fire({
        title: are_you_sure,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete'
    }).then((confirmed) => {
        if (confirmed.isConfirmed) {
            location.href = added_url;
        }
    });
});

// Reply Delete Sweet Alert
$(document).on('click', '.comment_delete', function(e) {
    let comment_id = $(this).data('id');
    let added_url = endpoint + '/forum/comment/destroy/' + comment_id;

    Swal.fire({
        title: are_you_sure,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete'
    }).then((confirmed) => {
        if (confirmed.isConfirmed) {
            location.href = added_url;
        }
    });
});


// Admin Page

// Change Featured Sweet Alert
$(document).on('click', '.change_featured', function(e) {
    let id = $(this).data('id');
    let added_url = '/admin/forum/manage-queries/swipe-featured/' + id;

    Swal.fire({
        title: are_you_sure,
        text: Do_you_want_to_change_this_features_status,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Change'
    }).then((confirmed) => {
        if (confirmed.isConfirmed) {
            location.href = added_url;
        }
    });
});

// Change Status Sweet Alert
$(document).on('click', '.change_status', function(e) {
    let id = $(this).data('id');
    let added_url = '/admin/forum/manage-queries/swipe-status/' + id;

    Swal.fire({
        title: are_you_sure,
        text: Do_you_want_to_change_this_status,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: Yes_Change
    }).then((confirmed) => {
        if (confirmed.isConfirmed) {
            location.href = added_url;
        }
    });
});

// Filter On Index
(function ($) {
    "use strict";
    // select instructor start
    $(".created_by_select").select2({
        placement: "bottom",
        innerWidth: "100%",
        ajax: {
          url: $('.created_by_select').data('href'),
          dataType: "json",
          data: function (params) {
            return {
              term: params.term,
              _token: _token,
            };
          },
          type: "POST",
          delay: 250,
          processResults: function (data) {
            console.log(data);
            return {
              results: $.map(data, function (item) {
                return {
                  text: item.text,
                  id: item.id,
                };
              }),
            };
          },
          error: function (error, data) {
            toaster.fire({
              icon: "error",
              title: something_went_wrong,
            });
          },
          cache: false,
        },
      })[2];
    // Select instructor end

     // select categories start
     $(".categories_select").select2({
      placement: "bottom",
      innerWidth: "100%",
      ajax: {
        url: $('.categories_select').data('href'),
        dataType: "json",
        data: function (params) {
          return {
            term: params.term,
            _token: _token,
          };
        },
        type: "POST",
        delay: 250,
        processResults: function (data) {
          return {
            results: $.map(data, function (item) {
              return {
                text: item.text,
                id: item.id
              };
            }),
          };
        },
        error: function (error, data) {
          toaster.fire({
            icon: "error",
            title: something_went_wrong,
          });
        },
        cache: false,
      },
    });
  // Select categories end

})(jQuery);

