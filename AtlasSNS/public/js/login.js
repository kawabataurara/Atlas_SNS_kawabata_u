'use strict';

{

    const open = document.getElementById('open');
    const search = document.getElementById('search');
    const overlay = document.querySelector('.overlay');
    // const menu = document.querySelectorAll('.menu-open');
    const close = document.getElementById('close');


    // menu.forEach(div => {
    //     dt.addEventListener('click', () => {
    //         dt.parentNode.classList.toggle('appear');

    // $(".openbtn1").click(function () {
    //     $(this).toggleClass('after');
    //     overlay.classList.add('show');
    //     open.classList.add('hide');
    // });



    // open.addEventListener('click', () => {
    //     overlay.classList.add('show');
    //     open.classList.add('hide');
    //     open.getElementById.add('close');
    //     // close.classList.remove('menu-close');
    // });

    search.addEventListener('click', function (event) {
        event.stopPropagation();
    });


    // close.addEventListener('click', () => {
    //     overlay.classList.remove('show');
    //     open.classList.remove('hide');
    //     // open.classList.add('closing');
    // });


}



$(function () {

    $('.menu-open').click(function () {
        $(this).toggleClass('selected');
        $(this).next().slideToggle();
    });



        // 編集ボタン(class="js-modal-open")が押されたら発火
        $('.js-modal-open').on('click', function () {
            // モーダルの中身(class="js-modal")の表示
            $('.js-modal').fadeIn();
            // 押されたボタンから投稿内容を取得し変数へ格納
            var post = $(this).attr('post');
            // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
            var post_id = $(this).attr('post_id');

            // 取得した投稿内容をモーダルの中身へ渡す
            $('.modal_post').text(post);
            // 取得した投稿のidをモーダルの中身へ渡す
            $('.modal_id').val(post_id);
            return false;
        });

        // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
        $('.js-modal-close').on('click', function () {
            // モーダルの中身(class="js-modal")を非表示
            $('.js-modal').fadeOut();
            return false;
        });


    // テキストエリアを内容に合わせて高さを調節する
    $('#textarea').on('input', function () {
        if ($(this).outerHeight() > this.scrollHeight) {
            $(this).height(1)
        }
        while ($(this).outerHeight() < this.scrollHeight) {
            $(this).height($(this).height() + 1)
        }
    });

});
