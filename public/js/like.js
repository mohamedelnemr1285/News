$(".like").on('click',function () {
    var like_s = $(this).attr('data-like');
     var   article_id = $(this).attr('data-article');
    var url = "{{route('like')}}";
    var   token = "{{Session::token()}}";

    $.ajax({
        type:'POST',
        url:url,
        data :{like_s: like_s ,article_id: article_id , _token:token},
        success: function(data) {

            alert('HAY');

        }
    });
});

$(".delete").click(function(){
    if (!confirm("Do you want to delete")){
        return false;
    }
});