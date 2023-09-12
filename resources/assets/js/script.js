
$(function () {
  $(".menu-btn").click(function () {
    $(this).next().toggleClass(fast);
    // 矢印の向きを変更
    // $(this).toggleClass("open", fast);
  });
});

// 1 "クリックしたら処理を行う"というクリックイベント
// toggleClass()・・・指定したclassを付け外し出来る
// next()・・・指定した要素の次の兄弟要素を対象にする
// slideToggle()・・・slideUp()とslideDown()を併せ持つメソッド
