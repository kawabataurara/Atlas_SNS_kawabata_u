'use strict';

{

    const open = document.getElementById('open');
    const search = document.getElementById('search');
    const overlay = document.querySelector('.overlay');
    const close = document.getElementById('close');


    open.addEventListener('click', () => {
        overlay.classList.add('show');
        open.classList.add('hide');
    });

    search.addEventListener('click', function (event) {
        event.stopPropagation();
    });

    // document.getElementById('close').addEventListener('click', (e) => {
    //     e.stopPropagation();
    // });

    close.addEventListener('click', () => {
        overlay.classList.remove('show');
        open.classList.remove('hide');
    });


    // let open = document.getElementById('open');
    // let close = document.getElementById('close');
    // const overlay = document.querySelector('.overlay');
    // const edit = document.querySelector('.edit');


    // open.addEventListener('click', () => {
    //     overlay.classList.add('show');
    //     open.classList.add('hide');
    // });
    // close.addEventListener('click', () => {
    //     overlay.classList.remove('show');
    //     open.classList.remove('hide');
    // });


    // open.addEventListener('click', () => {
    //     edit.classList.add('show');
    //     open.classList.add('hide');
    // });
    // close.addEventListener('click', () => {
    //     edit.classList.remove('show');
    //     open.classList.remove('hide');
    // });



}



$(function () {

    // $('#open').on('click', function () {//.btn_triggerをクリックすると
    //     $('#open').toggleClass('cross');//.btn_triggerにcrossクラスを付与(ボタンのアニメーション)
    //     $('.overlay').toggleClass('fade');//.overlayに
    //     $('body').toggleClass('noscroll');//bodyにnoscrollクラスを付与(スクロールを固定)
    // });


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

    });
