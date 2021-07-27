function show_alert(mess) {
    $('.alrt').find('p').text(mess);
    setTimeout(function () {
        $('.alrt').fadeIn();
    }, 300);
    setTimeout(function () {
        $('.alrt').fadeOut();
    }, 3500);
}
function copytext(text) {
    var temp = $("<input>");
    $("body").append(temp);
    temp.val(text).select();
    document.execCommand("copy");
    temp.remove();
}
$(function () {
    $('#all_check').click(function () {
        $('.comp').find('.checkbox').prop('checked', true);
        $(this).siblings('span').text($('.comp').find('.checkbox:checked').length);
    });
    $('.comp').find('.checkbox').change(function () {
        $('#all_check').siblings('span').text($('.comp').find('.checkbox:checked').length);
    });
    $('.upload').on('dragenter dragover', function (event) {
        event.stopPropagation();
        event.preventDefault();
        event.originalEvent.dataTransfer.dropEffect = 'copy';
        $(this).addClass('up_light');
    });

    $('#upload_image').on('dragleave drop', function (event) {
        event.stopPropagation();
        event.preventDefault();
        const files = event.originalEvent.dataTransfer.files;
        $(this).removeClass('up_light');
        if (files[0]) {
            var fr = new FileReader(),
                type = files[0].type.split('/');
            if (type[0] === 'image') {
                fr.addEventListener('load', function () {
                    $('#upload_image').css('background-image', 'url(' + fr.result + ')');
                    $('#upload_image').children('input[name=image]').remove();
                    $('#upload_image').append(`<input type="hidden" name="image" value="${fr.result}">`)
                }, false);
                fr.readAsDataURL(files[0]);
            }
        }
    });
    $('#image').change(function () {
        let th = $(this);
        if (this.files[0]) {
            var fr = new FileReader(),
                type = this.files[0].type.split('/');
            if (type[0] === 'image') {
                fr.addEventListener('load', function () {
                    $('#upload_image').css('background-image', 'url(' + fr.result + ')');
                    $('#upload_image').children('input[name=image]').remove();
                    $('#upload_image').append(`<input type="hidden" name="image" value="${fr.result}">`)
                }, false);
                fr.readAsDataURL(this.files[0]);
            }
        }
    });

    $('#upload_pdf').on('dragleave drop', function (event) {
        event.stopPropagation();
        event.preventDefault();
        const files = event.originalEvent.dataTransfer.files;
        $(this).removeClass('up_light');
        if (files[0]) {
            var fr = new FileReader(),
                type = files[0].type,
                name = files[0].name;
            if (type === 'application/pdf') {
                fr.addEventListener('load', function () {
                    $('#pdf_file').css('display', 'block').empty().append(`<img src="../img/pdf.svg">${name}<a class="delete"></a>
                                                                            <input type="hidden" name="pdf" value="${fr.result}">`);
                }, false);
                fr.readAsDataURL(files[0]);
            }
        }
    });
    $('#pdf').change(function () {
        if (this.files[0]) {
            var fr = new FileReader(),
                type = this.files[0].type,
                name = this.files[0].name;
            if (type === 'application/pdf') {
                fr.addEventListener('load', function () {
                    $('#pdf_file').css('display', 'block').empty().append(`<img src="../img/pdf.svg">${name}<a class="delete"></a>
                                                                            <input type="hidden" name="pdf" value="${fr.result}">`);
                }, false);
                fr.readAsDataURL(this.files[0]);
            }
        }
    });
    $('#pdf_file').on('click', '.delete', function (e) {
        $('#pdf_file').css('display', 'none').empty();
        $('#pdf_file').append(`<input type="hidden" name="pdf_empty" value="empty">`);
    });

    function rew_load(file) {
        var fr = new FileReader(),
            type = file.type,
            name = file.name;
        if (type === 'application/pdf') {
            fr.addEventListener('load', function () {
                $('#reviews_files').append(`<div class="item">
                            <img src="../img/pdf.svg"><span>${name}</span><a class="delete delete_inp"></a>
                            <input name="reviews[]" value="${fr.result}" hidden>
                        </div>`);
            }, false);
            fr.readAsDataURL(file);
        }
    }

    $('#upload_reviews').on('dragleave drop', function (event) {
        event.stopPropagation();
        event.preventDefault();
        const files = event.originalEvent.dataTransfer.files;
        $(this).removeClass('up_light');
        for (var i = 0; i < files.length; i++) {
            rew_load(files[i]);
        }
    });
    $('#reviews').change(function () {
        for (var i = 0; i < this.files.length; i++) {
            rew_load(this.files[i]);
        }
    });
    $('#reviews_files').on('click', '.delete_inp', function (e) {
        $(this).parent('div').remove();
    });
    $('#reviews_files').on('click', '.review_del', function (e) {
        $(this).siblings('input').prop('name', 'reviews_del[]');
        $(this).parent('div').css('display', 'none');
    });

    function gal_load(file) {
        var fr = new FileReader(),
            type = file.type.split('/'),
            name = file.name;
        if (type[0] === 'image') {
            fr.addEventListener('load', function () {
                $('#gallery_files').append(`<div class="item"><img src="${fr.result}">
                                <a class="image_del"><strong>Удалить</strong></a>
                                <input name="gallery[]" value="${fr.result}" hidden>
                                <input type="text" name="titles[]" value="${name}" placeholder="Название">
                            </div>`);
            }, false);
            fr.readAsDataURL(file);
        }
    }

    $('#upload_gallery').on('dragleave drop', function (event) {
        event.stopPropagation();
        event.preventDefault();
        const files = event.originalEvent.dataTransfer.files;
        $(this).removeClass('up_light');
        for (var i = 0; i < files.length; i++) {
            gal_load(files[i]);
        }
    });
    $('#gallery').change(function (e) {
        for (var i = 0; i < this.files.length; i++) {
            gal_load(this.files[i]);
        }
    });
    $('#gallery_files').on('click', '.delete_inp', function (e) {
        $(this).parent('div').remove();
    });
    $('#gallery_files').on('click', '.image_del', function (e) {
        $(this).siblings('input').prop('name', 'image_del[]');
        $(this).parent('div').css('display', 'none');
    });
    // --->
    $('.login-page .content .pass .show-pass').hover(
        function () {
            $(this).next('input').attr('type', 'text');
        },
        function () {
            $(this).next('input').attr('type', 'password');
        }
    );
    $('.projects-top-menu ul li a.a1').click(function () {
        $('.projects-top-menu ul li a').removeClass('active');
        $('.projects-top-menu ul li a.a1').addClass('active');
        $('.projects-page').removeClass('active');
        $('.projects-page.p1').addClass('active');
    });
    $('.projects-top-menu ul li a.a2').click(function () {
        $('.projects-top-menu ul li a').removeClass('active');
        $('.projects-top-menu ul li a.a2').addClass('active');
        $('.projects-page').removeClass('active');
        $('.projects-page.p2').addClass('active');
    });
    $('.projects-top-menu ul li a.a3').click(function () {
        $('.projects-top-menu ul li a').removeClass('active');
        $('.projects-top-menu ul li a.a3').addClass('active');
        $('.projects-page').removeClass('active');
        $('.projects-page.p3').addClass('active');
    });
    $('.project-page .menu ul li a.a1').click(function () {
        $('.project-page .menu ul li a').removeClass('active');
        $('.project-page .menu ul li a.a1').addClass('active');
        $('.project-page .list').removeClass('active');
        $('.project-page .list.l1').addClass('active');
    });
    $('.project-page .menu ul li a.a2').click(function () {
        $('.project-page .menu ul li a').removeClass('active');
        $('.project-page .menu ul li a.a2').addClass('active');
        $('.project-page .list').removeClass('active');
        $('.project-page .list.l2').addClass('active');
    });
    $('.project-page .menu ul li a.a3').click(function () {
        $('.project-page .menu ul li a').removeClass('active');
        $('.project-page .menu ul li a.a3').addClass('active');
        $('.project-page .list').removeClass('active');
        $('.project-page .list.l3').addClass('active');
    });
    $('.profile-page .content .list .search .hide').click(function () {
        $('.profile-page .content .list .search').slideToggle();
    });
    $('.profile-page .content .filter .name.main').click(function () {
        $(this).toggleClass('active');
        $('.profile-page .content .filter .block').toggleClass('opened');
    });
    $('.company-page .name').on('click', function () {
        $('.company-page .gallery').slick('refresh');
    });
    $('.company-page .name').click(function () {
        $(this).toggleClass('active');
        $(this).next('.block').toggleClass('opened');
    });
    $('.profile-page .content.c3 .fields .button .next').click(function () {
        $('.profile-page .steps ul li a').removeClass('active');
        $('.profile-page .steps ul li a.s2').addClass('active');
        $(document).scrollTop(0);
    });
    $('.profile-page .content.c2 .fields .button .next').click(function () {
        $('.profile-page .steps ul li a').removeClass('active');
        $('.profile-page .steps ul li a.s1').addClass('active');
        $(document).scrollTop(0);
    });
    $('.profile-page .content.c1 .fields .button button.n').click(function () {
        $('.profile-page .steps ul li a').removeClass('active');
        $('.profile-page .steps ul li a.s2').addClass('active');
        $(document).scrollTop(0);
    });
    $('.profile-page .content.c2 .fields .button button.n').click(function () {
        $('.profile-page .steps ul li a').removeClass('active');
        $('.profile-page .steps ul li a.s3').addClass('active');
        $(document).scrollTop(0);
    });
    $('.profile-page .content .fields .button .next').click(function () {
        $(this).parent().parent().parent().parent().removeClass('active');
        $(this).parent().parent().parent().parent().prev('.content').addClass('active');
    });
    $('.profile-page .content .fields .button button.n').click(function () {
        $(this).parent().parent().parent().parent().removeClass('active');
        $(this).parent().parent().parent().parent().next('.content').addClass('active');
    });
    $('.profile-page .steps ul li a.s1').click(function () {
        $('.profile-page .steps ul li a').removeClass('active');
        $('.profile-page .steps ul li a.s1').addClass('active');
        $('.profile-page .content').removeClass('active');
        $('.profile-page .content.c1').addClass('active');
    });
    $('.profile-page .steps ul li a.s2').click(function () {
        $('.profile-page .steps ul li a').removeClass('active');
        $('.profile-page .steps ul li a.s2').addClass('active');
        $('.profile-page .content').removeClass('active');
        $('.profile-page .content.c2').addClass('active');
    });
    $('.profile-page .steps ul li a.s3').click(function () {
        $('.profile-page .steps ul li a').removeClass('active');
        $('.profile-page .steps ul li a.s3').addClass('active');
        $('.profile-page .content').removeClass('active');
        $('.profile-page .content.c3').addClass('active');
    });
    $('.profile-page .content .fields .regions .item .link').click(function () {
        $(this).toggleClass('active')
        $(this).parent().find('.list').slideToggle();
    });
    $('.header .menu-button').click(function () {
        $(this).toggleClass('active');
        $('.header .mobile-menu').toggleClass('opened');
    });
    $('.header .mob-header-catalog ul li a').click(function () {
        $(this).toggleClass('active');
        $(this).next('ul').slideToggle();
    });
    $('.popup .window .close').click(function () {
        $('.popup').fadeOut();
    });
    $('.header .catalog-link').click(function () {
        $(this).toggleClass('active');
        $('.header .header-catalog').toggleClass('opened');
        $('.mob-header-catalog').toggleClass('opened')
    });
    $(document).click(function (e) {
        $('.alrt').fadeOut();
        if ($(e.target).closest('.header .catalog-link').length) {
            return;
        } else {
            $('.header .catalog-link').removeClass('active');
            $('.header .header-catalog').removeClass('opened');
            $('.mob-header-catalog').removeClass('opened');
        }
    });
    $('.profile-page .mob-steps').slick({
        arrows: false,
        dots: true,
        speed: 300,
        slidesToShow: 1,
        variableWidth: true
    });
    $('.company-page .gallery').slick({
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 576,
                settings: {
                    variableWidth: true,
                    arrows: false,
                    autoplay: true
                }
            }
        ]
    });
});
