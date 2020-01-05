$(".like").on('click',function () {
    var like_s = $(this).attr('data-like');
     var   article_id = $(this).attr('data-article');
    article_id = article_id.slice(0,1);
    //alert(article_id);


    $.ajax({
        type:'POST',
        url:url,
        data :{like_s: like_s ,article_id: article_id , _token:token},
        success: function(data) {

        if(data.is_like == 1){
            $('*[data-article="' + article_id + '_l"]').removeClass('btn-secondary').addClass('btn-success');
        }
            if(data.is_like == 0){
                $('*[data-article="' + article_id + '_l"]').removeClass('btn-secondary').addClass('btn-danger');
            }

        }
    });
});

$(".delete").click(function(){
    if (!confirm("Do you want to delete")){
        return false;
    }
});