$('.svg_s').bind('click',favourite);

function favourite()

{

    ajax($(this).data('id'),$(this));

}

function ajax(id,__this,action='like')

{

    var data = new FormData();

    data.append('id',id);

    data.append('action',action)

    $.ajax({

        url: '',

        method: 'post',

        data: data,

        dataType: 'json',

        contentType: false,

        processData: false,

        cache: false,

        success: function (data) {

            if(data.action==1)

            {

                if($('.svg_s').length>0) __this.attr('src',image_link+'styles/images/fillheart.svg');

                list_favourite(1,id);

            }

            if(data.action==0)

            {

                if($('.svg_s').length>0) __this.attr('src',image_link+'styles/images/strokeheart.svg');

                list_favourite(0,id);

            }

            $('#urek_sayi').html(data.count);

        },



        error:function(w){

            console.log('error', w);

        },

    });

}

var neo=1;

function list_favourite(action,id)

{

    if(action==1)

    {

        var clone=$('.ll_item').eq(0).clone();

        clone.css("display","block");

        clone.addClass('like'+id);

        clone.find('a').attr('href',pro_obj.url);

        clone.find('img').attr('src',pro_obj.image);

        clone.find('span').eq(0).html(pro_obj.title);

        $('.likes_line').append(clone);

        $('.del_favo').last().bind('click',delete_project);

        if(neo==1)
        {
            neo++;
            fbq('track', 'AddToCart', {
                content_name: pro_obj.title,
                content_category: pro_obj.category,
                content_ids: [pro_obj.id],
                content_type: 'product',
                value: pro_obj.cash,
                currency: 'AZN'});
        }

    }

    else if(action==0)

    {

        $('.like'+id).remove();

    }

}

$('.del_favo').bind('click',delete_project);

function delete_project()
{

    id=$(this).data('id');
    ajax(id,$('.svg_s'),'delete');
    if($('.ll_item').length<=2)
    {
        $('.fav_show').css("display","none");
    }

}

$('#show_list').bind('click',showMyLike);
function showMyLike()
{
    if($('.ll_item').length<=1)
    {
        $('.fav_show').css("display","none");
        return true;
    }
    if($(".fav_show").css("display")=='none')
    {
        $(".fav_show").css({"display":"block"});
        console.log('block');
    }
    else
    {
        $(".fav_show").css({"display":"none"});
        console.log('none');

    }
}

document.onclick=(e)=>{
    // console.log(e.pageX);
    // console.log($('.fav_show').offset().left);
    if(e.pageX<($('.fav_show').offset().left))
    {
        $('.fav_show').css({"display":"none"});
    }
}

$('#send_form').bind('click',gonder_post);
function gonder_post()
{
    var data=new FormData(document.forms[0]);
    $.ajax({
        url: '',
        method: 'post',
        data: data,
        dataType: 'json',
        contentType: false,
        processData: false,
        cache: false,
        success: function (data) {
            if(data=='yox')
            {

            }
            else
            {
                $('form').css({"display":"none"});
                $('#gonder11').css({"display":"none"});
                $('#h3sorgu').css("display","block");

                setTimeout(()=>{
                    $('#h3sorgu').css("display","none");

                },3000);

                fbq('track', 'Purchase', {
                    content_name: pro_obj.title,
                    content_category: pro_obj.category,
                    content_ids: [pro_obj.id],
                    content_type: 'product',
                    value: pro_obj.cash,
                    currency: 'AZN'
                });
            }


        },

        error:function(w){
            console.log('error', w);
        },
    });
}



/*------------Script for filtr----------------- */


$('select').each(selec_fr);

function selec_fr(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;
    if($(this).parent().hasClass('select'))
    {

    }
    else
    {
        $this.addClass('select-hidden');
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');

        var $styledSelect = $this.next('div.select-styled');
        $styledSelect.text($this.children('option').eq(0).text());
        console.log($styledSelect);


        var $list = $('<ul />', {
            'class': 'select-options'
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }

        var $listItems = $list.children('li');

        $styledSelect.click(function(e) {
            e.stopPropagation();
            $('div.select-styled.active').not(this).each(function(){
                $(this).removeClass('active').next('ul.select-options').hide();
            });
            $(this).toggleClass('active').next('ul.select-options').toggle();
            console.log('relax');


        });

        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
            //console.log($this.val());
        });

        $(document).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });
        var image=new Image;
        image.className='select_image';
        image.src=img_html;
        $('.select').append(image);

    }


}


$('.siralama .select-styled').on('click',()=>{
    if($('.siralama .select-styled').hasClass('active'))
    {
        $('.siralama .select-styled').removeClass('active');
        $('.select-options').hide();
    }
    else
    {
        $('.siralama .select-styled').addClass('active');
        $('.siralama .select-options').toggle();
    }
});




$('.elave_et').bind('click',elave_block);
function elave_block()
{
    var id=$(this).data('id');

    var clone1=$('.form_item').eq(id).find('.item').eq(0).clone();
    var clone2=$('.form_item').eq(id).find('.item').eq(1).clone();
    if(id==2)
    {
        var clone3=$('.form_item').eq(id).find('.item').eq(2).clone();
        var clone4=$('.form_item').eq(id).find('.item').eq(3).clone();
    }
    var select=clone2.find('select').clone();
    clone2.find('.select').remove();
    clone2.find('.bitme_tarix').append(select);
    $(this).parent().parent().before(clone1);
    $(this).parent().parent().before(clone2);
    $(this).parent().parent().before(clone3);
    $(this).parent().parent().before(clone4);
    $('select').each(selec_fr);

}

$('input[type=file]').bind('change',uploadfile);

function uploadfile()
{
    var name=$(this)[0].files[0].name;
    $(this).next().html(name);
    console.log(name);
}


$("input[name=number]").keypress(function (e) {
    if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
        return false;
    }
});

$("input[name=firstname]").keypress(function (e) {
    console.log(e.which);
    if(e.which<90)
    {
        return false;
    }
});

$("input[name=lastname]").keypress(function (e) {
    console.log(e.which);
    if(e.which<90)
    {
        return false;
    }
});
// $("input[name=lastname]").keypress(function (e) {
//     if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
//         return false;
//     }
// });



