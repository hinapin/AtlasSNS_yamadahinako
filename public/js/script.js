

$(function () {
  $(".js-accordion-title").on("click", function () {
    $(this).next().slideToggle(200);
    $(this).toggleClass("open", 200);
  });
});




// 1 "クリックしたら処理を行う"というクリックイベント
// toggleClass()・・・指定したclassを付け外し出来る
// next()・・・指定した要素の次の兄弟要素を対象にする
// slideToggle()・・・slideUp()とslideDown()を併せ持つメソッド

// つぶやき編集
// $(function () {
//   $(".edit-btn").click(function () {
//     $(this).next().toggleClass();
//     // 矢印の向きを変更
//     // $(this).toggleClass("open", fast);
//   });
// });


$(function () {

  var open = $('.edit-btn'),
    close = $('.edit-close'),
    container = $('.edit-container');

  // 開くボタンをクリックしたらモーダルを表示する
  open.on('click', function () {
    container.addClass('active');
    return false;
  });

  close.on('click', function () {
    container.removeClass('active');
  });
});



$(function () {

  // 編集ボタンを押したら中身が現れる
  $('.edit-btn').on('click', function () {
    $('.modal__content').fadeIn();

    // 押されたボタンから投稿内容を取得し変数へ格納
    var post = $(this).attr('post');
    var post_id = $(this).attr('post_id');

    // 取得した投稿内容,idをモーダルの中身へ渡す
    $('.modal_post').text(post);
    $('.modal_id').val(post_id);

    return false;
  });

  // $('.edit-close').on('click', function () {
  //   $('.edit-form').fadeOut();

  //   return false;
  // });
});
