const first = $('.product_column4.first');

$('.product_tab_button').on('click','.item',  function () {
    const $item = $(this)
    const filter = $item.data( 'owl-filter' )
    const tag = $item.data('tag');
    $item.siblings().removeClass('active');
    $item.addClass('active');
console.log(filter)
    if (tag === 'first'){
        first.find('.itemProduct').addClass('hidden')
        first.find(filter).removeClass('hidden')
    }
})


function getProduct(id) {
    console.log(id)
    $.ajax({
        type: 'GET',
        url:'http://127.0.0.1:8000/api/getOneProduct/'+ id,
        success: function (res) {
            console.log(res.data)
        }
    })
}
