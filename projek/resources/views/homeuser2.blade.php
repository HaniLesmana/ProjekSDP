@extends('user.base-layout')

    {{-- LOGIN SUCCESS --}}
    @if (session("welcomeUser"))
        <script>
            alert("{{ session('welcomeUser') }}");
        </script>
    @endif

    <!-- Navbar -->
    @section("header")
        @include('user.navbarUser')
    @endsection
    <!-- Akhir Navbar -->
@section('main')

<html style="font-size: 16px;">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="utf-8">
      <meta name="keywords" content="Services, How Can We Help You?, Need Help Right Away?, Best Quality, Our Services, Get your 'TO DO' list completed by a real professional!">
      <meta name="description" content="">
      <meta name="page_type" content="np-template-header-footer-from-plugin">

      <link rel="stylesheet" href="{{asset('nicepage.css')}}" media="screen">
    <link rel="stylesheet" href="home_user.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
      <meta name="generator" content="Nicepage 3.29.1, nicepage.com">


      <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
      <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">






      <script type="application/ld+json">{
          "@context": "http://schema.org",
          "@type": "Organization",
          "name": ""
  }</script>
      <meta name="theme-color" content="#478ac9">
      <meta property="og:title" content="home_user">
      <meta property="og:type" content="website">
    </head>
    <body class="u-body"><header class="u-clearfix u-header u-palette-1-light-3 u-sticky u-sticky-ab50 u-header" id="sec-f6ba"><div class="u-clearfix u-sheet u-sheet-1">
          <nav class="u-dropdown-icon u-menu u-menu-dropdown u-offcanvas u-menu-1">
            <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
              <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;"><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
  </symbol>
  </defs></svg>
              </a>
            </div>
            <div class="u-custom-menu u-nav-container">
              <ul class="u-nav u-spacing-30 u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-grey-90" href="Home.html" style="padding: 10px 0px;">Home</a>
  </li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-grey-90" href="Cart.html" style="padding: 10px 0px;">Cart</a>
  </li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-grey-90" style="padding: 10px 0px;">Histrory</a>
  </li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-grey-90" href="Profile.html" style="padding: 10px 0px;">Profile</a><div class="u-nav-popup"><ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link u-white">Settings</a>
  </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-white">Sign Out</a>
  </li></ul>
  </div>
  </li></ul>
            </div>
            <div class="u-custom-menu u-nav-container-collapse">
              <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                <div class="u-inner-container-layout u-sidenav-overflow">
                  <div class="u-menu-close"></div>
                  <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.html" style="padding: 10px 0px;">Home</a>
  </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Cart.html" style="padding: 10px 0px;">Cart</a>
  </li><li class="u-nav-item"><a class="u-button-style u-nav-link" style="padding: 10px 0px;">Histrory</a>
  </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Profile.html" style="padding: 10px 0px;">Profile</a><div class="u-nav-popup"><ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-4"><li class="u-nav-item"><a class="u-button-style u-nav-link">Settings</a>
  </li><li class="u-nav-item"><a class="u-button-style u-nav-link">Sign Out</a>
  </li></ul>
  </div>
  </li></ul>
                </div>
              </div>
              <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
          </nav>
          <img class="u-image u-image-default u-image-1" src="images/title.png" alt="" data-image-width="500" data-image-height="148">
        </div><style class="u-sticky-style" data-style-id="ab50">.u-sticky-fixed.u-sticky-ab50, .u-body.u-sticky-fixed .u-sticky-ab50 {
  box-shadow: -2px 2px 8px 0 rgba(128,128,128,1) !important
  }.u-sticky-fixed.u-sticky-ab50:before, .u-body.u-sticky-fixed .u-sticky-ab50:before {
  borders: top right bottom left !important
  }</style></header>
      <section id="carousel_4df3" class="u-carousel u-slide u-block-045d-1" data-u-ride="carousel" data-interval="5000">
        <ol class="u-carousel-indicators u-block-045d-5">
          <li data-u-target="#carousel_4df3" data-u-slide-to="0" class="u-active u-grey-30"></li>
          <li data-u-target="#carousel_4df3" class="u-grey-30" data-u-slide-to="1"></li>
        </ol>
        <div class="u-carousel-inner" role="listbox">
          <div class="u-active u-align-left u-carousel-item u-clearfix u-image u-section-1-1" src="" data-image-width="2000" data-image-height="1333">
            <div class="u-clearfix u-sheet u-sheet-1">
              <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                  <div class="u-layout-row">
                    <div class="u-container-style u-layout-cell u-left-cell u-size-30 u-layout-cell-1">
                      <div class="u-container-layout u-valign-middle u-container-layout-1">
                        <h1 class="u-custom-font u-font-playfair-display u-text u-title u-text-1">Who We Are</h1>
                        <p class="u-large-text u-text u-text-variant u-text-2">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
                        <a href="https://nicepage.com/k/offer-html-templates" class="u-border-2 u-border-grey-dark-1 u-btn u-btn-rectangle u-button-style u-none u-btn-1">read more</a>
                      </div>
                    </div>
                    <div class="u-container-style u-image u-layout-cell u-right-cell u-size-30 u-image-1" data-image-width="400" data-image-height="400">
                      <div class="u-container-layout u-container-layout-2"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="u-align-left u-carousel-item u-clearfix u-palette-5-base u-section-1-2" src="">
            <div class="u-clearfix u-sheet u-sheet-1">
              <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                  <div class="u-layout-row">
                    <div class="u-container-style u-layout-cell u-left-cell u-size-30 u-layout-cell-1">
                      <div class="u-container-layout u-valign-middle u-container-layout-1">
                        <h1 class="u-custom-font u-font-playfair-display u-text u-title u-text-1">What We Do</h1>
                        <p class="u-large-text u-text u-text-variant u-text-2">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
                        <a href="https://nicepage.com/k/loans-website-templates" class="u-border-2 u-border-grey-dark-1 u-btn u-btn-rectangle u-button-style u-none u-btn-1">read more</a>
                      </div>
                    </div>
                    <div class="u-container-style u-image u-layout-cell u-right-cell u-size-30 u-image-1">
                      <div class="u-container-layout u-container-layout-2"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-text-body-alt-color u-block-045d-3" href="#carousel_4df3" role="button" data-u-slide="prev">
          <span aria-hidden="true">
            <svg viewBox="0 0 477.175 477.175"><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
                      c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path></svg>
          </span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-text-body-alt-color u-block-045d-4" href="#carousel_4df3" role="button" data-u-slide="next">
          <span aria-hidden="true">
            <svg viewBox="0 0 477.175 477.175"><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                      c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"></path></svg>
          </span>
          <span class="sr-only">Next</span>
        </a>
      </section>
      <section class="u-align-center u-clearfix u-grey-5 u-section-2" id="carousel_4ff3">
        <div class="u-clearfix u-sheet u-sheet-1">
          <div class="u-border-3 u-border-palette-1-dark-1 u-hidden-xs u-line u-line-vertical u-opacity u-opacity-85 u-line-1"></div>
          <div class="u-container-style u-group u-palette-1-base u-radius-15 u-shape-round u-group-1">
            <div class="u-container-layout u-container-layout-1">
              <h2 class="u-text u-text-default u-text-1"><span class="u-icon u-icon-1"><svg class="u-svg-content" viewBox="0 0 407.534 407.534" x="0px" y="0px" style="width: 1em; height: 1em;"><path style="fill:#6F9935;" d="M344,162.945v88l55.528-21.104L322.584,36.593L8,162.945"></path><path style="fill:#658B30;" d="M360,244.865v-97.92H47.84L24,156.521v6.424h320v88L360,244.865z"></path><path style="fill:#79A73A;" d="M8,162.945h336v208H8V162.945z"></path><path style="fill:#AAC16B;" d="M40,232.625c18.102-5.416,32.264-19.578,37.68-37.68h196.64c5.415,18.103,19.577,32.265,37.68,37.68  v68.64c-18.103,5.415-32.265,19.577-37.68,37.68H80h-2.328c-5.414-18.1-19.573-32.262-37.672-37.68L40,232.625z"></path><circle style="fill:#79A73A;" cx="176" cy="266.945" r="40"></circle><path style="fill:#AAC16B;" d="M338.456,162.945l-18.968-48.8l-0.864-2.152c-18.817,1.669-37.212-6.241-48.944-21.048l-2.144,0.864  L96,162.945H338.456z"></path><path style="fill:#89B140;" d="M134.584,146.945l-38.584,16h242.456l-6.216-16H134.584z"></path><g><circle style="fill:#79A73A;" cx="88" cy="266.945" r="8"></circle><circle style="fill:#79A73A;" cx="264" cy="266.945" r="8"></circle>
  </g><path d="M8,378.945h336c4.418,0,8-3.582,8-8v-113.6l50.496-20.112c4.104-1.637,6.103-6.291,4.466-10.395  c-0.001-0.002-0.001-0.003-0.002-0.005l-76.944-193.2c-1.633-4.105-6.286-6.109-10.391-4.476c-0.003,0.001-0.006,0.002-0.009,0.004  L7.464,153.457c-1.273,0.55-2.377,1.428-3.2,2.544C1.668,157.35,0.028,160.02,0,162.945v208C0,375.363,3.582,378.945,8,378.945  L8,378.945z M336,362.945H16v-192h320V362.945z M267.432,101.609c11.955,12.566,28.52,19.708,45.864,19.776l13.36,33.6H133.48  L267.432,101.609z M389.144,225.345L352,240.161v-77.216c0-4.418-3.582-8-8-8h-0.128l-16.952-42.576  c-0.188-0.355-0.407-0.693-0.656-1.008c-0.858-3.853-4.426-6.482-8.36-6.16c-16.138,1.471-31.925-5.327-41.944-18.064  c-2.493-3.077-6.875-3.842-10.264-1.792c-0.38,0.045-0.757,0.115-1.128,0.208l-163.536,65.12c-1.979,0.776-3.562,2.315-4.392,4.272  H46.976l271.136-107.96L389.144,225.345z"></path><path d="M37.712,308.937c15.532,4.591,27.686,16.73,32.296,32.256c1.011,3.389,4.128,5.711,7.664,5.712  c0.415-0.026,0.827-0.088,1.232-0.184c0.359,0.102,0.726,0.177,1.096,0.224h192c0.33-0.043,0.656-0.11,0.976-0.2  c3.997,0.972,8.025-1.479,8.998-5.476c0.004-0.015,0.007-0.029,0.01-0.044c4.598-15.542,16.754-27.698,32.296-32.296  c3.769-1.152,6.111-4.908,5.488-8.8c0.107-0.388,0.184-0.784,0.232-1.184v-64c-0.047-0.401-0.127-0.797-0.24-1.184  c0.627-3.893-1.716-7.651-5.488-8.8c-15.542-4.597-27.695-16.758-32.28-32.304c-1.158-3.795-4.951-6.143-8.864-5.488  c-0.37-0.103-0.747-0.178-1.128-0.224H80c-0.403,0.048-0.802,0.128-1.192,0.24c-3.891-0.62-7.645,1.721-8.8,5.488  c-4.601,15.539-16.756,27.691-32.296,32.288c-3.769,1.152-6.111,4.908-5.488,8.8c-0.104,0.389-0.179,0.784-0.224,1.184v64  c0.046,0.376,0.121,0.748,0.224,1.112C31.568,303.975,33.915,307.772,37.712,308.937L37.712,308.937z M83.248,202.945h185.496  c6.455,16.064,19.19,28.796,35.256,35.248v57.504c-16.059,6.459-28.789,19.189-35.248,35.248H83.248  C76.789,314.886,64.059,302.156,48,295.697v-57.504C64.064,231.741,76.796,219.009,83.248,202.945L83.248,202.945z"></path><path d="M176,314.945c26.51,0,48-21.49,48-48s-21.49-48-48-48s-48,21.49-48,48C128.026,293.444,149.501,314.919,176,314.945z   M176,234.945c17.673,0,32,14.327,32,32s-14.327,32-32,32s-32-14.327-32-32S158.327,234.945,176,234.945z"></path><path d="M88,278.945c6.627,0,12-5.373,12-12s-5.373-12-12-12c-6.627,0-12,5.373-12,12S81.373,278.945,88,278.945z M88,262.945  c2.209,0,4,1.791,4,4s-1.791,4-4,4s-4-1.791-4-4S85.791,262.945,88,262.945z"></path><path d="M264,278.945c6.627,0,12-5.373,12-12s-5.373-12-12-12s-12,5.373-12,12S257.373,278.945,264,278.945z M264,262.945  c2.209,0,4,1.791,4,4s-1.791,4-4,4s-4-1.791-4-4S261.791,262.945,264,262.945z"></path></svg><img></span>&nbsp;Balance :&nbsp;
              </h2>
              <h2 class="u-text u-text-default u-text-2">Rp.10.000.000,00-</h2>
            </div>
          </div>
          <div class="u-container-style u-group u-palette-1-base u-radius-15 u-shape-round u-group-2">
            <div class="u-container-layout u-valign-middle u-container-layout-2">
              <h2 class="u-text u-text-3">Top Up</h2>
            </div>
          </div>
          <div class="u-container-style u-group u-palette-1-base u-radius-15 u-shape-round u-group-3">
            <div class="u-container-layout u-valign-middle-lg u-valign-middle-sm u-valign-middle-xl u-valign-middle-xs u-container-layout-3">
              <h2 class="u-align-center u-text u-text-4">Withdraw</h2>
            </div>
          </div>
          <div class="u-clearfix u-expanded-width-lg u-expanded-width-md u-expanded-width-xl u-gutter-10 u-layout-wrap u-layout-wrap-1">
            <div class="u-gutter-0 u-layout">
              <div class="u-layout-col">
                <div class="u-size-30">
                  <div class="u-layout-row">
                    <div class="u-align-left u-container-style u-layout-cell u-left-cell u-right-cell u-size-60 u-layout-cell-1">
                      <div class="u-container-layout u-container-layout-4">
                        <h5 class="u-text u-text-grey-60 u-text-5">our services</h5>
                        <div class="u-border-11 u-border-white u-expanded-width u-line u-line-horizontal u-line-2"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="u-size-30">
                  <div class="u-layout-row">
                    <div class="u-align-left u-container-style u-gradient u-hidden-sm u-hidden-xs u-layout-cell u-left-cell u-size-12 u-layout-cell-2">
                      <div class="u-container-layout u-container-layout-5"><span class="u-align-center u-border-2 u-border-palette-1-base u-icon u-icon-circle u-spacing-10 u-text-palette-1-base u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-4b72"></use></svg><svg class="u-svg-content" viewBox="0 0 512 512" id="svg-4b72"><path d="m64 416c-17.6450195 0-32 14.3554688-32 32s14.3549805 32 32 32 32-14.3554688 32-32-14.3549805-32-32-32zm0 48c-8.8222656 0-16-7.1777344-16-16s7.1777344-16 16-16 16 7.1777344 16 16-7.1777344 16-16 16z"></path><path d="m504.9667969 213.6533203-143.9995117-143.9990234c-5.8222656-5.8242188-14.0595703-8.2529297-22.0371094-6.4970703-4.1578979.9150391-7.8930054 2.8464355-10.9279785 5.5310059l-55.0354004-55.0349121c-9.3554688-9.3544922-24.578125-9.3544922-33.9335938 0l-11.720459 11.7202148-11.6350098-11.6352539c-17.4663086-17.4658203-45.8876953-17.4658203-63.355957 0l-33.519043 33.5175781c-11.6201172 11.6191406-14.9428711 29.5146484-8.269043 44.5302734l82.6113281 185.875c1.3344727 3.0029297.6699219 6.5820313-1.6533203 8.90625l-10.8043823 10.8061523-23.0305786-23.0307617c-3.1240234-3.1230469-8.1894531-3.1230469-11.3134766 0l-16 16c-1.9873047 1.9873047-2.7861328 4.8710938-2.1044922 7.5976563l6.6708984 26.6835938-109.2167969 77.09375c-16.0878904 11.3574218-25.6928709 29.8945312-25.6928709 49.586914 0 33.4677734 27.2280273 60.6953125 60.6953125 60.6953125 19.6933594 0 38.2299805-9.6044922 49.5864258-25.6933594l77.09375-109.2167969 26.684082 6.6708984c2.7280273.6845703 5.6103516-.1162109 7.597168-2.1035156l16-16c3.1245117-3.125 3.1245117-8.1894531 0-11.3144531l-23.0299072-23.0297852 18.5699463-18.5678711c11.6196289-11.6201172 14.9428711-29.515625 8.2695313-44.53125l-82.6108398-185.875c-1.3349609-3.0029297-.6704102-6.5820313 1.6533203-8.90625l17.8344727-17.8359375c1.5112305-1.5117188 3.5200195-2.34375 5.6572266-2.34375s4.1459961.8320313 5.6572266 2.34375l3.7156982 3.7158203-11.7200928 11.7197266c-4.5292971 4.5292969-7.0234377 10.5556641-7.0234377 16.9677735s2.4941406 12.4384766 7.0234375 16.9677734l138.3466797 138.3461914v36.6860352c0 17.6445313 14.3549805 32 32 32 8.5341797 0 16.5678711-3.3271484 22.6367188-9.3837891.7792969-.7822266 1.5064697-1.6108398 2.1992798-2.4663086l23.1640014 23.1640625v76.6860352c0 17.6445313 14.3549805 32 32 32 8.5341797 0 16.5678711-3.3271484 22.6328125-9.3798828 6.0405273-6.0527344 9.3671875-14.0869141 9.3671875-22.6201172v-28.2949219c4.7094727 2.7304688 10.1757813 4.2949219 16 4.2949219 8.5341797 0 16.5678711-3.3271484 22.6328125-9.3798828 6.0405273-6.0527344 9.3671875-14.0869141 9.3671875-22.6201172v-113.3701172c0-6.4121094-2.4975586-12.4404297-7.0332031-16.9765625zm-291.4208985 153.4873047-27.6054688-6.9013672c-3.2080078-.8007813-6.5717773.4501953-8.4760742 3.1474609l-80.2539062 113.6933594c-8.3627929 11.8466797-22.0131836 18.9199219-36.5151367 18.9199219-24.6450195 0-44.6953125-20.0498047-44.6953125-44.6953125 0-14.5019531 7.0727539-28.1523438 18.9199219-36.5146484l113.6933594-80.2539063c2.6982422-1.9052734 3.9487305-5.2724609 3.1479492-8.4765625l-6.9013672-27.6054688 7.1401367-7.1406249 23.0261841 23.0263672c.0016479.0014648.0029297.003418.0045776.0048828l22.625 22.625c.0016479.0014648.003418.0029297.0050659.0043945l23.0256958 23.0258789zm-12.5742187-322.8574219c-4.5332031-4.5341797-10.5605469-7.0302734-16.9716797-7.0302734-6.4106445 0-12.4375 2.4970703-16.9707031 7.0302734l-17.8349609 17.8369141c-6.9707031 6.9716797-8.9638672 17.7080078-4.9599609 26.7167969l82.6108398 185.875c4.0039063 9.0097656 2.0102539 19.7470703-4.9619141 26.71875l-18.5703125 18.5683594-11.3117676-11.3115235 10.8049316-10.8076172c6.9702148-6.9716797 8.9633789-17.7080078 4.9599609-26.7167969l-82.6113281-185.875c-4.0043945-9.0097656-2.0107422-19.7470703 4.9614258-26.7177734l33.519043-33.5175781c11.2290039-11.2285156 29.5-11.2304688 40.7290039 0l11.6345825 11.6345215-11.3116455 11.3115234zm-8.0048828 49.3701172c-3.1171875-3.1171875-3.1171875-8.1894531 0-11.3066406l17.3754272-17.375c.0006714-.0007324.0013428-.0012207.0020142-.0019531l11.3125-11.3125 28.6899414-28.6894531c3.1171875-3.1171875 8.1894531-3.1171875 11.3066406 0l58.5609741 58.5605469c-.1273803 1.0200194-.2142944 2.0507812-.2142944 3.1015624v134.0561523zm190.7246094 190.7241211c.1982421-1.4448242.3085937-2.9057617.3085937-4.3774414v-24c0-4.4111328 3.5888672-8 8-8 2.1396484 0 4.1542969.8330078 5.652832 2.3261719 1.5136719 1.5195312 2.347168 3.5341797 2.347168 5.6738281v44.6860352zm112.3085937 59.6225586c0 4.2666016-1.6669922 8.2861328-4.6811523 11.3076172-3.0327149 3.0253906-7.0522461 4.6923828-11.3188477 4.6923828-8.8222656 0-16-7.1777344-16-16 0-4.4179688-3.581543-8-8-8s-8 3.5820313-8 8v56c0 4.2666016-1.6669922 8.2861328-4.6811523 11.3076172-3.0327149 3.0253906-7.0522461 4.6923828-11.3188477 4.6923828-8.8222656 0-16-7.1777344-16-16v-144c0-6.4023438-2.4907227-12.4287109-7.0332031-16.9873047-4.5385742-4.5224609-10.5639649-7.0126953-16.9667969-7.0126953-13.2333984 0-24 10.7666016-24 24v24c0 1.5908203-.2299805 3.1503906-.6855469 4.6464844-.7568359 2.4931641-2.144043 4.8027344-3.9956055 6.6611328-3.0327148 3.0253906-7.052246 4.6923828-11.3188476 4.6923828-8.8222656 0-16-7.1777344-16-16v-193.3701172c0-1.0263672.1621094-1.9794922.4990234-2.8798828.9067383-2.4658203 3.1557617-4.3691406 5.8691406-4.9667969 1.5620117-.3417969 4.5849609-.5166016 7.2851563 2.1845703l144 144c1.5131836 1.5126954 2.3466797 3.5244141 2.3466797 5.6621094z"></path><path d="m432 448c-17.6450195 0-32 14.3554688-32 32s14.3549805 32 32 32 32-14.3554688 32-32-14.3549805-32-32-32zm0 48c-8.8222656 0-16-7.1777344-16-16s7.1777344-16 16-16 16 7.1777344 16 16-7.1777344 16-16 16z"></path></svg></span>
                        <h5 class="u-align-center u-text u-text-body-alt-color u-text-6">Painting</h5>
                      </div>
                    </div>
                    <div class="u-align-left u-container-style u-hidden-sm u-hidden-xs u-layout-cell u-palette-3-light-2 u-size-12 u-layout-cell-3">
                      <div class="u-container-layout u-container-layout-6"><span class="u-align-center u-border-2 u-border-palette-1-base u-icon u-icon-circle u-spacing-10 u-text-palette-1-base u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 446.983 446.983" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-8bc3"></use></svg><svg class="u-svg-content" viewBox="0 0 446.983 446.983" x="0px" y="0px" id="svg-8bc3" style="enable-background:new 0 0 446.983 446.983;"><g><path d="M367.984,430.266h-47.721L179.686,5.148c-1.3-3.933-5.542-6.068-9.476-4.766c-3.933,1.3-6.066,5.542-4.767,9.475   l77.802,235.281L79,245.133c-4.143,0-7.5,3.358-7.5,7.5v114.851c0,2.241,1.003,4.365,2.733,5.79c1.354,1.115,3.042,1.71,4.767,1.71   c0.479,0,0.962-0.046,1.44-0.14l4.936-0.966l7.627,66.46c0.435,3.787,3.64,6.645,7.451,6.645h123.372   c3.812,0,7.017-2.858,7.451-6.645l5.599-48.772c0.043-0.008,0.087-0.011,0.13-0.02c17.964-3.62,28.821-11.826,32.271-24.388   c4.144-15.085-3.494-35.321-22.689-60.188l4.408-38.395l53.467,161.69h-46.189c-4.143,0-7.5,3.358-7.5,7.5s3.357,7.5,7.5,7.5   h109.709c4.143,0,7.5-3.358,7.5-7.5S372.127,430.266,367.984,430.266z M86.5,358.375v-98.237h63.854v85.744L86.5,358.375z    M217.137,431.983H107.142l-7-60.994l59.151-11.573c3.52-0.688,6.06-3.773,6.06-7.36v-91.918h71.514l-3.553,30.946   c-11.565-12.898-21.469-21.886-21.997-22.364c-3.07-2.776-7.813-2.538-10.592,0.534c-2.777,3.072-2.539,7.814,0.532,10.593   c9.164,8.29,20.094,19.599,29.727,31.527L217.137,431.983z M254.813,363.189c-1.576,5.734-6.996,9.934-16.117,12.528l5.324-46.377   C252.258,342.323,257.166,354.631,254.813,363.189z"></path><path d="M111.992,239.262c10.915,0,19.796-8.88,19.796-19.795s-8.881-19.795-19.796-19.795s-19.795,8.88-19.795,19.795   S101.077,239.262,111.992,239.262z M111.992,214.671c2.645,0,4.796,2.151,4.796,4.795s-2.151,4.795-4.796,4.795   c-2.644,0-4.795-2.151-4.795-4.795S109.348,214.671,111.992,214.671z"></path><path d="M173.992,213.262c14.512,0,26.317-11.806,26.317-26.317s-11.806-26.317-26.317-26.317   c-14.511,0-26.316,11.806-26.316,26.317S159.481,213.262,173.992,213.262z M173.992,175.627c6.24,0,11.317,5.077,11.317,11.317   s-5.077,11.317-11.317,11.317s-11.316-5.077-11.316-11.317S167.752,175.627,173.992,175.627z"></path><path d="M130.134,167.372c1.218,2.88,4.151,4.78,7.293,4.621c3.131-0.159,5.89-2.318,6.806-5.313   c1.996-6.529-5.469-12.171-11.215-8.496C130.011,160.107,128.744,164.068,130.134,167.372   C130.325,167.822,129.945,166.921,130.134,167.372z"></path>
  </g></svg></span>
                        <h5 class="u-align-center u-text u-text-body-alt-color u-text-7">Cleaning</h5>
                      </div>
                    </div>
                    <div class="u-align-left u-container-style u-hidden-sm u-hidden-xs u-layout-cell u-palette-3-light-2 u-right-cell u-size-12 u-layout-cell-4">
                      <div class="u-container-layout u-container-layout-7"><span class="u-align-center u-border-2 u-border-palette-1-base u-icon u-icon-circle u-spacing-10 u-text-palette-1-base u-icon-4"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512.00038 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-a227"></use></svg><svg class="u-svg-content" viewBox="0 0 512.00038 512" id="svg-a227"><path d="m433.429688 462.703125-11.527344 11.527344c-23.65625 23.65625-62.148438 23.65625-85.804688 0l-11.527344-11.527344c-1.875-1.875-4.417968-2.929687-7.070312-2.929687s-5.195312 1.054687-7.070312 2.929687l-11.527344 11.523437c-11.457032 11.460938-26.695313 17.773438-42.902344 17.773438s-31.441406-6.3125-42.902344-17.769531l-11.527344-11.527344c-1.875-1.875-4.417968-2.929687-7.070312-2.929687s-5.195312 1.054687-7.070312 2.929687l-11.527344 11.523437c-23.652344 23.660157-62.144532 23.65625-85.804688 0l-11.523437-11.523437c-3.90625-3.90625-10.234375-3.90625-14.144531 0-3.90625 3.902344-3.90625 10.234375 0 14.140625l11.527343 11.527344c31.453125 31.453125 82.632813 31.457031 114.089844 0l4.453125-4.457032 4.457031 4.457032c15.234375 15.238281 35.492188 23.628906 57.042969 23.628906 21.546875 0 41.808594-8.390625 57.042969-23.628906l4.457031-4.453125 4.453125 4.453125c31.457031 31.457031 82.636719 31.457031 114.089844 0l11.527343-11.527344c3.90625-3.902344 3.90625-10.234375 0-14.140625s-10.234374-3.90625-14.140624 0zm0 0"></path><path d="m509.070312 390.929688c-3.90625-3.90625-10.234374-3.90625-14.140624 0l-11.527344 11.527343c-23.65625 23.652344-62.148438 23.652344-85.804688 0l-11.527344-11.527343c-1.875-1.875-4.417968-2.929688-7.070312-2.929688s-5.195312 1.054688-7.070312 2.929688l-11.527344 11.527343c-8.605469 8.601563-19.171875 14.0625-30.273438 16.40625v-230.863281h6c5.519532 0 10-4.476562 10-10v-48c0-5.523438-4.480468-10-10-10h-8.28125c4.128906-11.640625 15.242188-20 28.28125-20h105.871094c5.523438 0 10-4.476562 10-10s-4.476562-10-10-10h-105.875c-24.144531 0-44.347656 17.207031-48.992188 40h-100.546874c5.070312-55.984375 52.257812-100 109.542968-100h185.871094c5.523438 0 10-4.476562 10-10s-4.476562-10-10-10h-185.875c-68.316406 0-124.496094 52.972656-129.617188 120h-10.382812c-5.519531 0-10 4.476562-10 10v48c0 5.523438 4.480469 10 10 10h6v165.84375c0 5.523438 4.480469 10 10 10 5.523438 0 10-4.476562 10-10v-165.84375h108v231.734375c-12.992188-1.578125-25.574219-7.328125-35.527344-17.277344l-11.527344-11.527343c-1.875-1.875-4.417968-2.929688-7.070312-2.929688s-5.195312 1.054688-7.070312 2.929688l-11.527344 11.527343c-23.65625 23.652344-62.148438 23.652344-85.804688 0l-11.527344-11.527343c-1.875-1.875-4.417968-2.929688-7.070312-2.929688s-5.195312 1.054688-7.070312 2.929688l-11.527344 11.527343c-23.65625 23.652344-62.148438 23.652344-85.804688 0l-11.527344-11.527343c-3.902343-3.90625-10.234374-3.90625-14.140624 0-3.90625 3.902343-3.90625 10.234374 0 14.140624l11.523437 11.527344c31.457031 31.453125 82.636719 31.453125 114.089844 0l4.457031-4.457031 4.453125 4.457031c31.457031 31.453125 82.636719 31.457032 114.089844 0l4.457031-4.453125 4.453125 4.453125c31.457031 31.457032 82.636719 31.457032 114.089844 0l4.457031-4.453125 4.453125 4.457031c15.730469 15.726563 36.386719 23.589844 57.046875 23.589844 20.65625 0 41.316406-7.863281 57.042969-23.59375l11.527343-11.527344c3.90625-3.902343 3.90625-10.234374 0-14.140624zm-322.945312-250.929688h140v28h-140zm0 0"></path><path d="m502 80c-2.628906 0-5.210938 1.070312-7.070312 2.929688-1.859376 1.859374-2.929688 4.441406-2.929688 7.070312 0 2.640625 1.070312 5.210938 2.929688 7.070312 1.859374 1.859376 4.441406 2.929688 7.070312 2.929688s5.210938-1.070312 7.070312-2.929688c1.859376-1.859374 2.929688-4.441406 2.929688-7.070312s-1.070312-5.210938-2.929688-7.070312c-1.859374-1.859376-4.441406-2.929688-7.070312-2.929688zm0 0"></path><path d="m199.199219 401.070312c1.859375-1.859374 2.929687-4.441406 2.929687-7.070312s-1.070312-5.210938-2.929687-7.070312c-1.871094-1.859376-4.441407-2.929688-7.070313-2.929688-2.640625 0-5.210937 1.070312-7.070312 2.929688-1.867188 1.859374-2.929688 4.441406-2.929688 7.070312s1.0625 5.210938 2.929688 7.070312c1.859375 1.859376 4.433594 2.929688 7.070312 2.929688 2.628906 0 5.210938-1.070312 7.070313-2.929688zm0 0"></path><path d="m242.332031 309v-80.667969c0-5.523437-4.476562-10-10-10-5.519531 0-10 4.476563-10 10v80.667969c0 5.523438 4.480469 10 10 10 5.523438 0 10-4.476562 10-10zm0 0"></path><path d="m272.332031 287.511719c5.523438 0 10-4.476563 10-10v-49.175781c0-5.523438-4.476562-10-10-10-5.519531 0-10 4.476562-10 10v49.175781c0 5.523437 4.480469 10 10 10zm0 0"></path><path d="m262.332031 353.84375c0 5.523438 4.480469 10 10 10 5.523438 0 10-4.476562 10-10v-23.34375c0-5.523438-4.476562-10-10-10-5.519531 0-10 4.476562-10 10zm0 0"></path></svg></span>
                        <h5 class="u-align-center u-text u-text-body-alt-color u-text-8">Plumbing<br>
                        </h5>
                      </div>
                    </div>
                    <div class="u-align-left u-container-style u-hidden-sm u-hidden-xs u-layout-cell u-palette-3-light-2 u-right-cell u-size-12 u-layout-cell-5">
                      <div class="u-container-layout u-container-layout-8"><span class="u-border-2 u-border-palette-1-base u-icon u-icon-circle u-spacing-10 u-text-palette-1-base u-icon-5"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-41cb"></use></svg><svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" id="svg-41cb" style="enable-background:new 0 0 512 512;"><g><g><g><path d="M394.667,213.333h-63.99c-5.885,0-10.667,4.771-10.667,10.667l-0.003,10.667H288c-5.896,0-10.667,4.771-10.667,10.667     c0,5.896,4.771,10.667,10.667,10.667h32.003L320,266.667c0,2.823,1.125,5.542,3.125,7.542s4.708,3.125,7.542,3.125h64     c29.406,0,53.333,23.927,53.333,53.333S424.073,384,394.667,384h-384C4.771,384,0,388.771,0,394.667s4.771,10.667,10.667,10.667     h384c41.167,0,74.667-33.5,74.667-74.667S435.833,256,394.667,256h-53.333l0.01-21.333h53.323c52.938,0,96,43.063,96,96     s-43.063,96-96,96h-384C4.771,426.667,0,431.438,0,437.333C0,443.229,4.771,448,10.667,448h384     C459.365,448,512,395.365,512,330.667S459.365,213.333,394.667,213.333z"></path><path d="M501.333,106.667h-384c-41.167,0-74.667,33.5-74.667,74.667c0,41.167,33.5,74.667,74.667,74.667h53.333l0.01,21.333     h-53.344c-52.938,0-96-43.063-96-96s43.063-96,96-96h384c5.896,0,10.667-4.771,10.667-10.667C512,68.771,507.229,64,501.333,64     h-384C52.635,64,0,116.635,0,181.333s52.635,117.333,117.333,117.333h64.01c2.833,0,5.542-1.125,7.542-3.125     s3.125-4.719,3.125-7.542l-0.003-10.667H224c5.896,0,10.667-4.771,10.667-10.667c0-5.896-4.771-10.667-10.667-10.667h-31.997     L192,245.333c0-5.896-4.781-10.667-10.667-10.667h-64C87.927,234.667,64,210.74,64,181.333S87.927,128,117.333,128h384     c5.896,0,10.667-4.771,10.667-10.667C512,111.438,507.229,106.667,501.333,106.667z"></path><path d="M245.333,341.333c0,5.896,4.771,10.667,10.667,10.667s10.667-4.771,10.667-10.667V320     c0-5.896-4.771-10.667-10.667-10.667s-10.667,4.771-10.667,10.667V341.333z"></path><path d="M309.333,341.333c2.729,0,5.458-1.042,7.542-3.125c4.167-4.167,4.167-10.917,0-15.083l-21.333-21.333     c-4.167-4.167-10.917-4.167-15.083,0c-4.167,4.167-4.167,10.917,0,15.083l21.333,21.333     C303.875,340.292,306.604,341.333,309.333,341.333z"></path><path d="M210.208,338.208l21.333-21.333c4.167-4.167,4.167-10.917,0-15.083c-4.167-4.167-10.917-4.167-15.083,0l-21.333,21.333     c-4.167,4.167-4.167,10.917,0,15.083c2.083,2.083,4.813,3.125,7.542,3.125C205.396,341.333,208.125,340.292,210.208,338.208z"></path><path d="M256,213.333c5.896,0,10.667-4.771,10.667-10.667v-21.333c0-5.896-4.771-10.667-10.667-10.667     s-10.667,4.771-10.667,10.667v21.333C245.333,208.563,250.104,213.333,256,213.333z"></path><path d="M288,224c2.729,0,5.458-1.042,7.542-3.125l21.333-21.333c4.167-4.167,4.167-10.917,0-15.083     c-4.167-4.167-10.917-4.167-15.083,0l-21.333,21.333c-4.167,4.167-4.167,10.917,0,15.083C282.542,222.958,285.271,224,288,224z"></path><path d="M195.125,184.458c-4.167,4.167-4.167,10.917,0,15.083l21.333,21.333c2.083,2.083,4.813,3.125,7.542,3.125     s5.458-1.042,7.542-3.125c4.167-4.167,4.167-10.917,0-15.083l-21.333-21.333C206.042,180.292,199.292,180.292,195.125,184.458z"></path>
  </g>
  </g>
  </g></svg></span>
                        <h5 class="u-align-center u-text u-text-body-alt-color u-text-9">Electrical<br>
                        </h5>
                      </div>
                    </div>
                    <div class="u-container-style u-layout-cell u-palette-3-light-2 u-size-12 u-layout-cell-6">
                      <div class="u-container-layout u-valign-top-md u-container-layout-9"><span class="u-border-2 u-border-palette-1-base u-icon u-icon-circle u-spacing-10 u-text-palette-1-base u-icon-6"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 511.999 511.999" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-1c6f"></use></svg><svg class="u-svg-content" viewBox="0 0 511.999 511.999" x="0px" y="0px" id="svg-1c6f" style="enable-background:new 0 0 511.999 511.999;"><g><g><path d="M190.02,329.829c-0.12-0.64-0.32-1.27-0.57-1.87c-0.25-0.61-0.55-1.19-0.92-1.73c-0.36-0.55-0.78-1.06-1.24-1.52    c-0.46-0.46-0.97-0.88-1.52-1.25c-0.54-0.36-1.12-0.67-1.72-0.92c-0.61-0.25-1.24-0.44-1.87-0.57c-1.29-0.26-2.62-0.25-3.91,0    c-0.64,0.13-1.27,0.32-1.87,0.57c-0.61,0.25-1.19,0.56-1.73,0.92c-0.55,0.37-1.06,0.79-1.52,1.25c-0.46,0.46-0.88,0.97-1.24,1.52    c-0.36,0.54-0.67,1.12-0.92,1.73c-0.25,0.6-0.44,1.23-0.57,1.87c-0.13,0.64-0.2,1.3-0.2,1.95s0.07,1.31,0.2,1.95    c0.13,0.64,0.32,1.27,0.57,1.87c0.25,0.61,0.56,1.19,0.92,1.73c0.36,0.55,0.78,1.059,1.24,1.52c0.46,0.46,0.97,0.88,1.52,1.24    c0.54,0.36,1.12,0.67,1.73,0.92c0.6,0.25,1.23,0.45,1.87,0.57c0.64,0.13,1.3,0.2,1.95,0.2c0.65,0,1.31-0.07,1.96-0.2    c0.63-0.12,1.26-0.32,1.87-0.57c0.6-0.25,1.18-0.56,1.72-0.92c0.55-0.36,1.06-0.78,1.52-1.24c0.46-0.461,0.88-0.97,1.24-1.52    c0.37-0.54,0.67-1.12,0.92-1.73c0.25-0.6,0.45-1.23,0.57-1.87c0.13-0.64,0.2-1.3,0.2-1.95S190.15,330.469,190.02,329.829z"></path>
  </g>
  </g><g><g><path d="M509.071,2.929c-2.131-2.131-5.107-3.189-8.105-2.875l-64.95,6.753c-2.282,0.237-4.414,1.253-6.037,2.876L381.82,57.84    c-3.905,3.905-3.905,10.237,0,14.142l4.134,4.134l-144.22,144.221l-21.232-21.232c-3.905-3.905-10.237-3.905-14.143,0    l-37.612,37.612c-3.905,3.905-3.905,10.237,0,14.143l13.393,13.393l-8.131,8.131l-23.236-9.178    c-3.706-1.464-7.927-0.588-10.744,2.23L22.064,383.399C7.836,397.627,0,416.545,0,436.667s7.836,39.039,22.064,53.267    c14.229,14.229,33.146,22.065,53.268,22.065c20.122,0,39.04-7.836,53.268-22.065L246.564,371.97    c2.817-2.818,3.693-7.039,2.229-10.745l-9.177-23.236l8.13-8.13l13.393,13.393c1.953,1.953,4.512,2.929,7.071,2.929    c2.56,0,5.118-0.976,7.071-2.929l37.612-37.612c3.905-3.905,3.905-10.237,0-14.143l-21.232-21.232l144.221-144.22l4.134,4.134    c1.876,1.875,4.419,2.929,7.071,2.929c2.652,0,5.195-1.054,7.071-2.929l48.158-48.159c1.622-1.623,2.638-3.754,2.875-6.037    l6.754-64.95C512.258,8.037,511.202,5.059,509.071,2.929z M218.603,339.232l9.177,23.236L114.457,475.792    c-10.45,10.451-24.345,16.207-39.125,16.207c-11.389,0-22.253-3.418-31.42-9.769l115.236-115.236    c3.905-3.905,3.905-10.237,0-14.143c-3.905-3.905-10.237-3.905-14.143,0L29.776,468.08c-14.873-21.548-12.73-51.379,6.43-70.539    L149.53,284.218l23.236,9.177c3.705,1.463,7.926,0.588,10.744-2.229l12.772-12.771l37.322,37.322l-12.771,12.771    C218.016,331.306,217.14,335.527,218.603,339.232z M291.681,298.569l-23.47,23.47l-78.251-78.251l23.47-23.47L291.681,298.569z     M277.52,256.123l-21.644-21.644L400.097,90.258l21.643,21.644L277.52,256.123z M485.667,70.387l-38.579,38.579l-44.055-44.055    l38.579-38.579l49.167-5.112L485.667,70.387z"></path>
  </g>
  </g></svg></span>
                        <h5 class="u-align-center u-text u-text-body-alt-color u-text-10">Repair etc<br>
                        </h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="u-clearfix u-grey-10 u-section-3" id="sec-0f57">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
          <div class="u-list u-list-1">
            <div class="u-repeater u-repeater-1">
              <div class="u-container-style u-list-item u-repeater-item u-video-cover u-white">
                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
                  <h3 class="u-text u-text-default u-text-1">Sample Headline</h3>
                  <div class="u-border-4 u-border-palette-3-base u-expanded-width u-line u-line-horizontal u-line-1"></div>
                  <img alt="" class="u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-1" data-image-width="2000" data-image-height="1333" src="images/3.svg">
                  <p class="u-text u-text-default u-text-2">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
                  <a href="" class="u-btn u-button-style u-palette-3-base u-btn-1">learn more</a>
                </div>
              </div>
              <div class="u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-2">
                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-2">
                  <h3 class="u-text u-text-default u-text-3">Sample Headline</h3>
                  <div class="u-border-4 u-border-palette-3-base u-expanded-width u-line u-line-horizontal u-line-2"></div>
                  <img alt="" class="u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-2" data-image-width="2000" data-image-height="1333" src="images/3.svg">
                  <p class="u-text u-text-default u-text-4">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
                  <a href="" class="u-btn u-button-style u-palette-3-base u-btn-2">learn more</a>
                </div>
              </div>
              <div class="u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-3">
                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3">
                  <h3 class="u-text u-text-default u-text-5">Sample Headline</h3>
                  <div class="u-border-4 u-border-palette-3-base u-expanded-width u-line u-line-horizontal u-line-3"></div>
                  <img alt="" class="u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-3" data-image-width="2000" data-image-height="1333" src="images/3.svg">
                  <p class="u-text u-text-default u-text-6">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
                  <a href="" class="u-btn u-button-style u-palette-3-base u-btn-3">learn more</a>
                </div>
              </div>
              <div class="u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-4">
                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-4">
                  <h3 class="u-text u-text-default u-text-7">Sample Headline</h3>
                  <div class="u-border-4 u-border-palette-3-base u-expanded-width u-line u-line-horizontal u-line-4"></div>
                  <img alt="" class="u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-4" data-image-width="2000" data-image-height="1333" src="images/3.svg">
                  <p class="u-text u-text-default u-text-8">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
                  <a href="" class="u-btn u-button-style u-palette-3-base u-btn-4">learn more</a>
                </div>
              </div>
              <div class="u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-5">
                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-5">
                  <h3 class="u-text u-text-default u-text-9">Sample Headline</h3>
                  <div class="u-border-4 u-border-palette-3-base u-expanded-width u-line u-line-horizontal u-line-5"></div>
                  <img alt="" class="u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-5" data-image-width="2000" data-image-height="1333" src="images/3.svg">
                  <p class="u-text u-text-default u-text-10">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
                  <a href="" class="u-btn u-button-style u-palette-3-base u-btn-5">learn more</a>
                </div>
              </div>
              <div class="u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-6">
                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-6">
                  <h3 class="u-text u-text-default u-text-11">Sample Headline</h3>
                  <div class="u-border-4 u-border-palette-3-base u-expanded-width u-line u-line-horizontal u-line-6"></div>
                  <img alt="" class="u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-6" data-image-width="2000" data-image-height="1333" src="images/3.svg">
                  <p class="u-text u-text-default u-text-12">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
                  <a href="" class="u-btn u-button-style u-palette-3-base u-btn-6">learn more</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>




      <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-5b35"><div class="u-clearfix u-sheet u-sheet-1">
          <p class="u-small-text u-text u-text-variant u-text-1">Follow Us on Instagram&nbsp;<span class="u-icon u-icon-1"><svg class="u-svg-content" viewBox="0 0 24 24" style="width: 1em; height: 1em;"><linearGradient id="SVGID_1_" gradientTransform="matrix(0 -1.982 -1.844 0 -132.522 -51.077)" gradientUnits="userSpaceOnUse" x1="-37.106" x2="-26.555" y1="-72.705" y2="-84.047"><stop offset="0" stop-color="#fd5"></stop><stop offset=".5" stop-color="#ff543e"></stop><stop offset="1" stop-color="#c837ab"></stop>
  </linearGradient><path d="m1.5 1.633c-1.886 1.959-1.5 4.04-1.5 10.362 0 5.25-.916 10.513 3.878 11.752 1.497.385 14.761.385 16.256-.002 1.996-.515 3.62-2.134 3.842-4.957.031-.394.031-13.185-.001-13.587-.236-3.007-2.087-4.74-4.526-5.091-.559-.081-.671-.105-3.539-.11-10.173.005-12.403-.448-14.41 1.633z" fill="url(#SVGID_1_)"></path><path d="m11.998 3.139c-3.631 0-7.079-.323-8.396 3.057-.544 1.396-.465 3.209-.465 5.805 0 2.278-.073 4.419.465 5.804 1.314 3.382 4.79 3.058 8.394 3.058 3.477 0 7.062.362 8.395-3.058.545-1.41.465-3.196.465-5.804 0-3.462.191-5.697-1.488-7.375-1.7-1.7-3.999-1.487-7.374-1.487zm-.794 1.597c7.574-.012 8.538-.854 8.006 10.843-.189 4.137-3.339 3.683-7.211 3.683-7.06 0-7.263-.202-7.263-7.265 0-7.145.56-7.257 6.468-7.263zm5.524 1.471c-.587 0-1.063.476-1.063 1.063s.476 1.063 1.063 1.063 1.063-.476 1.063-1.063-.476-1.063-1.063-1.063zm-4.73 1.243c-2.513 0-4.55 2.038-4.55 4.551s2.037 4.55 4.55 4.55 4.549-2.037 4.549-4.55-2.036-4.551-4.549-4.551zm0 1.597c3.905 0 3.91 5.908 0 5.908-3.904 0-3.91-5.908 0-5.908z" fill="#fff"></path></svg><img></span> Babowe.id
          </p>
        </div></footer>
      <section class="u-backlink u-clearfix u-grey-80">
        <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
          <span>Website Templates</span>
        </a>
        <p class="u-text">
          <span>created with</span>
        </p>
        <a class="u-link" href="" target="_blank">
          <span>Website Builder Software</span>
        </a>.
      </section>
    </body>
  </html>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#button_art").click(function(){
                // $("#button_art").css("background-color","#d9a73d");
                // $("#button_tukang").css("background-color","lightgray");
                $.ajax({
                type: 'get',
                url: 'ajax/{art}',
                success: function(data) {
                    $("#daftar").empty();
                    $("#daftar").append(data);
                }
            });
            });
            $("#button_tukang").click(function(){
                // $("#button_tukang").css("background-color","#d9a73d");
                // $("#button_art").css("background-color","lightgray");
                $.ajax({
                type: 'get',
                url: 'ajax/{tukang}',
                success: function(data) {
                    $("#daftar").empty();
                    $("#daftar").append(data);
                }
            });
            });
        });
    </script>

@endsection
