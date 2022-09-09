<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'White Dashboard') }}</title>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('white') }}/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('white') }}/img/favicon.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('white') }}/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS -->
        <link href="{{ asset('white') }}/css/white-dashboard.css?v=1.0.0" rel="stylesheet" />
        <link href="{{ asset('white') }}/css/theme.css" rel="stylesheet" />

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' />
    </head>
    <body class="white-content {{ $class ?? '' }}">
    <input type="hidden" id="baseurl" name="baseurl" value="{{ config('app.url') }}" />
        @auth()
            <div class="wrapper">
                    @include('layouts.navbars.sidebar')
                <div class="main-panel">
                    @include('layouts.navbars.navbar')

                    <div class="content">
                        @yield('content')
                    </div>

                    @include('layouts.footer')
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            @include('layouts.navbars.navbar')
            <div class="wrapper wrapper-full-page">
                <div class="full-page {{ $contentClass ?? '' }}">
                    <div class="content">
                        <div class="container">
                            @yield('content')
                        </div>
                    </div>
                    @include('layouts.footer')
                </div>
            </div>
        @endauth
        <div class="fixed-plugin">
            <div class="dropdown show-dropdown">
                <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
                </a>
                <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Background</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors text-center">
                        <span class="badge filter badge-primary" data-color="primary"></span>
                        <span class="badge filter badge-info active" data-color="blue"></span>
                        <span class="badge filter badge-success" data-color="green"></span>
                    </div>
                    <div class="clearfix"></div>
                    </a>
                </li>
                <li class="button-container">
                    <a href="https://www.creative-tim.com/product/white-dashboard-laravel" target="_blank" class="btn btn-primary btn-block btn-round">Download Now</a>
                    <a href="https://white-dashboard-laravel.creative-tim.com/docs/getting-started/laravel-setup.html" target="_blank" class="btn btn-default btn-block btn-round">
                    Documentation
                    </a>
                </li>
                <li class="header-title">Thank you for 95 shares!</li>
                <li class="button-container text-center">
                    <button id="twitter" class="btn btn-round btn-info"><i class="fab fa-twitter"></i> &middot; 45</button>
                    <button id="facebook" class="btn btn-round btn-info"><i class="fab fa-facebook-f"></i> &middot; 50</button>
                    <br>
                    <br>
                    <a class="github-button" href="https://github.com/creativetimofficial/white-dashboard-laravel" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                </li>
                </ul>
            </div>
        </div>
        <script src="{{ asset('white') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('white') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('white') }}/js/core/bootstrap.min.js"></script>
        <script src="{{ asset('white') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <!-- Place this tag in your head or just before your close body tag. -->
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
        <!-- Chart JS -->
        {{-- <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script> --}}
        <!--  Notifications Plugin    -->
        <script src="{{ asset('white') }}/js/plugins/bootstrap-notify.js"></script>

        <script src="{{ asset('white') }}/js/white-dashboard.min.js?v=1.0.0"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script src="{{ asset('white') }}/js/theme.js"></script>
        <script src=" {{ asset('js/main.js') }}?version=1014"></script>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>
        @stack('js')

        <script>
            $(document).ready(function() {
                $().ready(function() {
                    $sidebar = $('.sidebar');
                    $navbar = $('.navbar');
                    $main_panel = $('.main-panel');

                    $full_page = $('.full-page');

                    $sidebar_responsive = $('body > .navbar-collapse');
                    sidebar_mini_active = true;
                    white_color = false;

                    window_width = $(window).width();

                    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                    $('.fixed-plugin a').click(function(event) {
                        if ($(this).hasClass('switch-trigger')) {
                            if (event.stopPropagation) {
                                event.stopPropagation();
                            } else if (window.event) {
                                window.event.cancelBubble = true;
                            }
                        }
                    });

                    $('.fixed-plugin .background-color span').click(function() {
                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');

                        var new_color = $(this).data('color');

                        if ($sidebar.length != 0) {
                            $sidebar.attr('data', new_color);
                        }

                        if ($main_panel.length != 0) {
                            $main_panel.attr('data', new_color);
                        }

                        if ($full_page.length != 0) {
                            $full_page.attr('filter-color', new_color);
                        }

                        if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.attr('data', new_color);
                        }
                    });

                    $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                        var $btn = $(this);

                        if (sidebar_mini_active == true) {
                            $('body').removeClass('sidebar-mini');
                            sidebar_mini_active = false;
                            whiteDashboard.showSidebarMessage('Sidebar mini deactivated...');
                        } else {
                            $('body').addClass('sidebar-mini');
                            sidebar_mini_active = true;
                            whiteDashboard.showSidebarMessage('Sidebar mini activated...');
                        }

                        // we simulate the window Resize so the charts will get updated in realtime.
                        var simulateWindowResize = setInterval(function() {
                            window.dispatchEvent(new Event('resize'));
                        }, 180);

                        // we stop the simulation of Window Resize after the animations are completed
                        setTimeout(function() {
                            clearInterval(simulateWindowResize);
                        }, 1000);
                    });

                    $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                            var $btn = $(this);

                            if (white_color == true) {
                                $('body').addClass('change-background');
                                setTimeout(function() {
                                    $('body').removeClass('change-background');
                                    $('body').removeClass('white-content');
                                }, 900);
                                white_color = false;
                            } else {
                                $('body').addClass('change-background');
                                setTimeout(function() {
                                    $('body').removeClass('change-background');
                                    $('body').addClass('white-content');
                                }, 900);

                                white_color = true;
                            }
                    });

                    $('.light-badge').click(function() {
                        $('body').addClass('white-content');
                    });

                    $('.dark-badge').click(function() {
                        $('body').removeClass('white-content');
                    });
                });


            $('.containerGroups').each(function() {
                var wrapper = $('.conjuntoGroups', this);

                $(".addGroup", $(this)).click(function(e) {
                    var hasEmpty = false
                    wrapper.find("input, select").each(function() {
                        if ($(this).val() == '' || $(this).val() == null) {
                            hasEmpty = true
                        }
                    });

                    if (hasEmpty) {
                        swal("Atenção", "Preencha todos os campos antes de adicionar novos.",
                            "warning");
                        return;
                    }

                    var num = $(".group").last().find('select').attr('name').replace(/[^\d]/g, '');

                    var newElem = $('.group:first', wrapper).clone(true);

                    var newNum = new Number(num) + 1;

                    newElem.find('.groupGroup').attr('name', 'qualifications[' + newNum + '][qualification_id]');
                    newElem.find('.enabledGroup').attr('name', 'qualifications[' + newNum +
                        '][is_enabled]');

                    newElem.find('tbody').find("tr:first-child td").each(function(index) {
                        var nameAttribute = $(this).find(':input').attr('name');
                        if (typeof nameAttribute !== 'undefined') {
                            nameAttribute = nameAttribute.replace(/[0-9]+/g, newNum);
                            $(this).find(':input').attr('name', nameAttribute);
                        }
                    });

                    newElem.find('tbody').find("tr:gt(0)").remove();

                    newElem.appendTo(wrapper).find('input,select').val('');

                    $('.delGroup').removeAttr('disabled');
                });

                $('.delGroup', wrapper).click(function() {
                    if ($('.group', wrapper).length > 1) {
                        $(this).parents('.group').remove();
                    } else if ($('.group', wrapper).length == 1) {
                        $(".group").find(':input').val('');
                        $("tbody").find("tr:gt(0)").remove();
                    }
                });
            });

            function addGang(e) {
                var linha = $(this).parents("tr");

                var hasEmpty = false
                linha.find("input, select").each(function() {
                    if ($(this).val() == '' || $(this).val() == null) {
                        hasEmpty = true
                    }
                });

                if (hasEmpty) {
                    swal("Atenção", "Preencha todos os campos antes de adicionar novos.", "warning");
                    return;
                }

                clone = $(linha).clone()
                clone.appendTo(linha.parent()).find(':input').val('');
            }

            function delGang(e) {
                if ($(this).closest('tbody').find('tr').length == 1)
                    $(this).closest('tbody').find(':input').val('');
                if ($(this).closest('tbody').find('tr').length > 1)
                    $(this).parents("tr").remove();
            }

            $('body').on('click', '.addGang', addGang);
            $('body').on('click', '.delGang', delGang);

            $('#inp-classification').on('change', function() {
                var value = $(this).val();

                $("input[required], select[required], textarea[required]")
                    .siblings("label")
                    .removeClass("required");

                $('.conjuntoGroups').find('select, input').prop('required', value == 'G');

                $("input[required], select[required], textarea[required]")
                    .siblings("label")
                    .addClass("required");
            })

            });
        </script>
        @stack('js')
    </body>
</html>
