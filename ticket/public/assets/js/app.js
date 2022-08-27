'use strict';
(function ($) {
    var windows = $(window),
        body = $('body');
    $.createOverlay = function () {
        if ($('.overlay').length < 1) {
            body.addClass('no-scroll').append('<div class="overlay"></div>');
            $('.overlay').addClass('show');
        }
    };
    $.removeOverlay = function () {
        body.removeClass('no-scroll');
        $('.overlay').remove();
    };
    $('[data-backround-image]').each(function (_0x1c0eed) {
        $(this).css('background', 'url(' + $(this).data('backround-image') + ')');
    });
    windows.on('load', function () {
        $('.page-loader').fadeOut(700, function () {
            setTimeout(function () {
                var _0x53570b = {};
                _0x53570b.timeOut = 3000;
                _0x53570b.progressBar = true;
                _0x53570b.showMethod = 'slideDown';
                _0x53570b.hideMethod = 'slideUp';
                _0x53570b.showDuration = 200;
                _0x53570b.hideDuration = 200;
                toastr.options = _0x53570b;
            }, 1000);
        });
    });

    windows.on('load', function () {
        setTimeout(function () {
            $('.navigation .navigation-menu-body ul li a').each(function () {
                var _0x1eb690 = $(this);
                if (_0x1eb690.next('ul').length) {
                    _0x1eb690.append('<i class="sub-menu-arrow ti-plus"></i>');
                }
            });
            $('.navigation .navigation-menu-body ul li.open>a>.sub-menu-arrow').removeClass('ti-plus').addClass('ti-minus').addClass('rotate-in');
        }, 200);
    });
    $(document).on('click', '.navigation .navigation-icon-menu ul li a', function (_0x1c63ca) {
        if (!$(this).hasClass('go-to-page')) {
            _0x1c63ca.preventDefault();
            $(this).parent().tooltip('hide');
            var _0x1f94b1 = $(this).attr('href');
            $(this).closest('ul').find('li').removeClass('active');
            $(this).parent('li').addClass('active');
            $('.navigation .navigation-menu-body ul.navigation-active').removeClass('navigation-active');
            $('.navigation .navigation-menu-body ul' + _0x1f94b1).addClass('navigation-active');
            return false;
        }
    });
    $.fn.modal.Constructor.prototype.enforceFocus = function () {
        modal_this = this;
        $(document).on('focusin.modal', function (_0x28a9b2) {
            if (modal_this.$element[0] !== _0x28a9b2.target && !modal_this.$element.has(_0x28a9b2.target).length && !$(_0x28a9b2.target.parentNode).hasClass('cke_dialog_ui_input_select') && !$(_0x28a9b2.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
                modal_this.$element.focus();
            }
        });
    };
    $(document).on('click', '.navbar-toggler', function () {
        $('.header .header-body ul.navbar-nav').toggleClass('open');
        return false;
    });
    $(document).on('click', '.navigation-toggler', function () {
        $('.navigation').toggleClass('open');
        $.createOverlay();
        return false;
    });
    $(document).on('click', '*', function (_0x422f96) {
        if (!$(_0x422f96.target).is('.header .header-body ul.navbar-nav, .header .header-body ul.navbar-nav *, .navbar-toggler, .navbar-toggler *')) {
            $('.header .header-body ul.navbar-nav').removeClass('open');
        }
    });
    $(document).on('click', '[data-sidebar-open]', function () {
        $('[data-toggle="dropdown"]').dropdown('hide');
        $(this).tooltip('hide');
        var _0x513e66 = $(this).data('sidebar-open');
        $('.sidebar').removeClass('show');
        $(_0x513e66).addClass('show');
        $.createOverlay();
        return false;
    });
    $(document).on('click', '.overlay', function () {
        $('.sidebar').removeClass('show');
        $('.navigation').removeClass('open');
        $.removeOverlay();
    });
    $(document).on('click', '.side-menu-open', function () {
        $('[data-toggle="dropdown"]').dropdown('hide');
        $('.navigation').addClass('show');
        $.createOverlay();
        return false;
    });
    window.addEventListener('load', function () {
        var _0x5e2de5 = document.getElementsByClassName('needs-validation');
        Array.prototype.filter.call(_0x5e2de5, function (_0x503190) {
            _0x503190.addEventListener('submit', function (_0x1877aa) {
                if (_0x503190.checkValidity() === false) {
                    _0x1877aa.preventDefault();
                    _0x1877aa.stopPropagation();
                }
                _0x503190.classList.add('was-validated');
            }, false);
        });
    }, false);
    var _0x3622b1 = $('.table-responsive-stack');
    _0x3622b1.find('th').each(function (_0x1858b8) {
        $('.table-responsive-stack td:nth-child(' + (_0x1858b8 + 1) + ')').prepend('<span class="table-responsive-stack-thead">' + $(this).text() + ':</span> ');
        $('.table-responsive-stack-thead').hide();
    });
    _0x3622b1.each(function () {
        var _0x5349da = $(this).find('th').length,
            _0x1fe1ae = 100 / _0x5349da + '%';
        $(this).find('th, td').css('flex-basis', _0x1fe1ae);
    });
    function _0x3873d0() {
        if (windows.width() < 768) {
            $('.table-responsive-stack').each(function (_0x6e6592) {
                $(this).find('.table-responsive-stack-thead').show();
                $(this).find('thead').hide();
            });
        } else {
            $('.table-responsive-stack').each(function (_0x3ea4d5) {
                $(this).find('.table-responsive-stack-thead').hide();
                $(this).find('thead').show();
            });
        }
    }
    _0x3873d0();
    _0x1e9514();
    window.onresize = function (_0x447625) {
        _0x3873d0();
        _0x1e9514('resize');
    };
    $(document).on('click', '.accordion.custom-accordion .accordion-row a.accordion-header', function () {
        var _0x52cff6 = $(this);
        _0x52cff6.closest('.accordion.custom-accordion').find('.accordion-row').not(_0x52cff6.parent()).removeClass('open');
        _0x52cff6.parent('.accordion-row').toggleClass('open');
        return false;
    });
    var _0x6e9f58, _0x5ec9fb = $('.table-responsive');
    _0x5ec9fb.on('show.bs.dropdown', function (_0x3e8132) {
        _0x6e9f58 = $(_0x3e8132.target).find('.dropdown-menu');
        body.append(_0x6e9f58.detach());
        var _0x4aeb19 = $(_0x3e8132.target).offset();
        var _0x1926c8 = {};
        _0x1926c8.display = 'block';
        _0x1926c8.top = _0x4aeb19.top + $(_0x3e8132.target).outerHeight();
        _0x1926c8.left = _0x4aeb19.left;
        _0x1926c8.width = '184px';
        _0x1926c8['font-size'] = '14px';
        _0x6e9f58.css(_0x1926c8);
        _0x6e9f58.addClass('mobPosDropdown');
    });
    _0x5ec9fb.on('hide.bs.dropdown', function (_0x37b9a0) {
        $(_0x37b9a0.target).append(_0x6e9f58.detach());
        _0x6e9f58.hide();
    });
    $(document).on('click', '.chat-app-wrapper .btn-chat-sidebar-open', function () {
        $('.chat-app-wrapper .chat-sidebar').addClass('chat-sidebar-opened');
        return false;
    });
    $(document).on('click', '*', function (_0x558bde) {
        if (!$(_0x558bde.target).is('.chat-app-wrapper .chat-sidebar, .chat-app-wrapper .chat-sidebar *, .chat-app-wrapper .btn-chat-sidebar-open, .chat-app-wrapper .btn-chat-sidebar-open *')) {
            $('.chat-app-wrapper .chat-sidebar').removeClass('chat-sidebar-opened');
        }
    });
    $(document).on('click', '.navigation ul li a', function () {
        var _0x35bf80 = $(this);
        if (_0x35bf80.next('ul').length) {
            var _0x3d7200 = _0x35bf80.find('.sub-menu-arrow');
            _0x3d7200.toggleClass('rotate-in');
            _0x35bf80.next('ul').toggle(200);
            _0x35bf80.parent('li').siblings().find('ul').not(_0x35bf80.parent('li').find('ul')).slideUp(200);
            _0x35bf80.next('ul').find('li ul').slideUp(200);
            _0x35bf80.next('ul').find('li>a').find('.sub-menu-arrow').removeClass('ti-minus').addClass('ti-plus');
            _0x35bf80.next('ul').find('li>a').find('.sub-menu-arrow').removeClass('rotate-in');
            _0x35bf80.parent('li').siblings().not(_0x35bf80.parent('li').find('ul')).find('>a').find('.sub-menu-arrow').removeClass('ti-minus').addClass('ti-plus');
            _0x35bf80.parent('li').siblings().not(_0x35bf80.parent('li').find('ul')).find('>a').find('.sub-menu-arrow').removeClass('rotate-in');
            if (_0x3d7200.hasClass('rotate-in')) {
                setTimeout(function () {
                    _0x3d7200.removeClass('ti-plus').addClass('ti-minus');
                }, 200);
            } else {
                _0x3d7200.removeClass('ti-minus').addClass('ti-plus');
            }
            if (windows.width() >= 768) {
                setTimeout(function (_0x180484) {
                    $('.navigation>.navigation-menu-body>ul').getNiceScroll().resize();
                }, 300);
            }
            return false;
        }
    });
    $(document).on('click', '.dropdown-menu', function (_0xd0d376) {
        _0xd0d376.stopPropagation();
    });
    $('#exampleModal').on('show.bs.modal', function (_0xe11a44) {
        var _0xc8deb0 = $(_0xe11a44.relatedTarget),
            _0x588158 = _0xc8deb0.data('whatever'),
            _0x3f9a92 = $(this);
        _0x3f9a92.find('.modal-title').text('پیام جدید به ' + _0x588158);
        _0x3f9a92.find('.modal-body input').val(_0x588158);
    });
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();
    $('.carousel').carousel();
    function _0x1e9514(_0x2f99ac) {
        _0x2f99ac = _0x2f99ac ? _0x2f99ac : '';
        if (_0x2f99ac == 'resize') {
            if (windows.width() >= 768) {
                $('.card-scroll').getNiceScroll().resize();
            }
            if (windows.width() >= 992) {
                $('.navigation>.navigation-menu-body>ul').getNiceScroll().resize();
            }
            $('.card').each(function () {
                if (windows.width() >= 768) {
                    var _0x2bbe67 = $(this),
                        _0x1a0ceb = _0x2bbe67.find('.card-scroll');
                    if (_0x1a0ceb.length) {
                        _0x1a0ceb.getNiceScroll().resize();
                    }
                }
            });
            $('.sidebar').each(function () {
                if (windows.width() >= 768) {
                    var _0x3e0d55 = $(this);
                    _0x3e0d55.getNiceScroll().resize();
                }
            });
            $('.dropdown-menu').each(function () {
                if (typeof $('.dropdown-menu-body', this)[0] != 'undefined' && windows.width() >= 768) {
                    $('.dropdown-menu-body', this).getNiceScroll().resize();
                }
            });
            if (windows.width() >= 768) {
                $('.chat-app .chat-sidebar .chat-sidebar-messages')[0] ? $('.chat-app .chat-sidebar .chat-sidebar-messages').getNiceScroll().resize() : '';
                $('.chat-app .chat-body .chat-body-messages')[0] ? $('.chat-app .chat-body .chat-body-messages').getNiceScroll().resize() : '';
            }
        } else {
            if (windows.width() >= 768) {
                var _0x25e172 = {};
                _0x25e172.railalign = 'left';
                $('.card-scroll').niceScroll(_0x25e172);
                var _0x25983c = {};
                _0x25983c.railalign = 'left';
                $('.table-responsive').niceScroll(_0x25983c);
            }
            if (windows.width() >= 992) {
                windows.on('load', function () {
                    var _0x4fde47 = {};
                    _0x4fde47.railalign = 'left';
                    $('.navigation>.navigation-menu-body>ul').niceScroll(_0x4fde47);
                });
            }
            $('.card').each(function () {
                if (windows.width() >= 768) {
                    var _0x194c29 = $(this),
                        _0x263469 = _0x194c29.find('.card-scroll');
                    if (_0x263469.length) {
                        var _0x46df6c = {};
                        _0x46df6c.railalign = 'left';
                        _0x263469.niceScroll(_0x46df6c);
                    }
                }
            });
            $('.sidebar').each(function () {
                if (windows.width() >= 768) {
                    var _0x4cf6e0 = $(this);
                    var _0xb7c0cd = {};
                    _0xb7c0cd.railalign = 'left';
                    _0x4cf6e0.niceScroll(_0xb7c0cd);
                }
            });
            $('.dropdown-menu').each(function () {
                if (typeof $('.dropdown-menu-body', this)[0] != 'undefined' && windows.width() >= 768) {
                    var _0x34b11b = {};
                    _0x34b11b.railalign = 'left';
                    $('.dropdown-menu-body', this).niceScroll(_0x34b11b);
                }
            });
            if (windows.width() >= 768) {
                var _0x57612c = {};
                _0x57612c.railalign = 'left';
                $('.chat-app .chat-sidebar .chat-sidebar-messages')[0] ? $('.chat-app .chat-sidebar .chat-sidebar-messages').scrollTop($('.chat-app .chat-sidebar .chat-sidebar-messages').get(0).scrollHeight, -1).niceScroll(_0x57612c) : '';
                var _0x59ad6e = {};
                _0x59ad6e.railalign = 'left';
                $('.chat-app .chat-body .chat-body-messages')[0] ? $('.chat-app .chat-body .chat-body-messages').scrollTop($('.chat-app .chat-body .chat-body-messages').get(0).scrollHeight, -1).niceScroll(_0x59ad6e) : '';
            }
        }
    }
    if (typeof CKEDITOR == 'object' && $('body').hasClass('dark')) {
        var _0xf9cf04 = $('.card').css('background-color'),
            _0x1ed373 = $('body').css('color');
        CKEDITOR.on('instanceReady', function (_0x127a52) {
            var _0x20e467 = $('iframe.cke_wysiwyg_frame');
            _0x20e467.each(function (_0x4f77b5) {
                var _0x9071aa = $(this)[0];
                var _0x5f577f = _0x9071aa.contentDocument || _0x9071aa.contentWindow.document;
                _0x5f577f.body.style.backgroundColor = _0xf9cf04;
                _0x5f577f.body.style.color = _0x1ed373;
            });
        });
    }
    $('.table-email-list .custom-checkbox').click(function (_0x179ff3) {
        _0x179ff3.stopPropagation();
    });
}(jQuery));
