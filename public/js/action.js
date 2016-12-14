$(document).ready(function () {
    loadData();

    function loadData() {
        $.ajax({
            url: '/posts',
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                document.getElementById('test2').innerHTML = "";
                document.getElementById('test').innerHTML = "";
                for (var i = 0; i < data.length; i++) {
                    if (i === (data.length - 1)) {
                        $('.carousel-indicators').prepend('<li data-target="#carousel-example-generic" class="active"></li>');
                        $('.carousel-inner').prepend("<div class='item active'><img src='/files/post_" + data[i]['id'] + ".jpg' class='bg' ><div class='carousel-caption'><h1 id='title" + data[i]['id'] + "'></h1><h3 id='content" + data[i]['id'] + "'></h3></div></div>");
                    }
                    else {
                        $('.carousel-indicators').prepend('<li data-target="#carousel-example-generic"></li>');
                        $('.carousel-inner').prepend("<div class='item'><img src='/files/post_" + data[i]['id'] + ".jpg' class='bg' ><div class='carousel-caption'><h1 id='title" + data[i]['id'] + "'></h1><h3 id='content" + data[i]['id'] + "'></h3></div></div>");
                    }
                    document.getElementById('title' + data[i]['id']).innerHTML = data[i]['title'];
                    document.getElementById("content" + data[i]['id']).innerHTML = data[i]['content'];
                }
                if(typeof Interval !== 'undefined'){
                    clearInterval(Interval);
                }
                Interval = setInterval(loadData, (data.length * 10266));
            }
        });
    }
});
