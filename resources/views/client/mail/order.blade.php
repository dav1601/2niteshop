<head>
    @php $cart = unserialize($order->cart); @endphp
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css" data-premailer="ignore">
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            width: 100% !important;
            height: 100% !important;
        }

        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .ExternalClass {
            width: 100%;
        }

        div[style*="Margin: 16px 0"] {
            margin: 0 !important;
        }

        table,
        th {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        /* What it does: Fixes Outlook.com line height. */
        .ExternalClass,
        .ExternalClass * {
            line-height: 100% !important;
        }

        /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            border: none;
            margin: 0 auto;
        }

        div[style*="Margin: 16px 0"] {
            margin: 0 !important;
        }

        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode: bicubic;
        }

        /* What it does: Overrides styles added when Yahoo's auto-senses a link. */
        .yshortcuts a {
            border-bottom: none !important;
        }

        *[x-apple-data-detectors],
        /* iOS */
        .x-gmail-data-detectors,
        /* Gmail */
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: none !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }

        img.g-img+div {
            display: none !important;
        }

        a,
        a:link,
        a:visited {
            color: #ecba78;
            text-decoration: none !important;
        }

        .header a {
            color: #c3c3c3;
            text-decoration: none;
            text-underline: none;
        }

        .main a {
            color: #ecba78;
            text-decoration: none;
            text-underline: none;
            word-wrap: break-word;
        }

        .main .section.customer_and_shipping_address a,
        .main .section.shipping_address_and_fulfillment_details a {
            color: #666363;
            text-decoration: none;
            text-underline: none;
            word-wrap: break-word;
        }

        .footer a {
            color: #ecba78;
            text-decoration: none;
            text-underline: none;
        }

        /* What it does: Overrides styles added images. */
        img {
            border: none !important;
            outline: none !important;
            text-decoration: none !important;
        }

        /* What it does: Fixes fonts for Google WebFonts; */
        [style*="Karla"] {
            font-family: "Karla", -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif !important;
        }

        [style*="Karla"] {
            font-family: "Karla", -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif !important;
        }

        [style*="Karla"] {
            font-family: "Karla", -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif !important;
        }

        [style*="Playfair Display"] {
            font-family: "Playfair Display", Georgia, serif !important;
        }

        td.menu_bar_1 a:hover,
        td.menu_bar_6 a:hover {
            color: #ecba78 !important;
        }

        th.related_product_wrapper.first {
            border-right: 13px solid #ffffff;
            padding-right: 6px;
        }

        th.related_product_wrapper.last {
            border-left: 13px solid #ffffff;
            padding-left: 6px;
        }
    </style>
    <link
        href="https://fonts.googleapis.com/css?family=Karla:400,700%7CPlayfair+Display:700,400%7CKarla:700,400%7CKarla:700,700"
        rel="stylesheet" type="text/css" data-premailer="ignore" />
    <!--<![endif]-->
    <style type="text/css" data-premailer="ignore">
        /* Media Queries */
        /* What it does: Removes right gutter in Gmail iOS app */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {

            /* iPhone 6 and 6+ */
            .container {
                min-width: 375px !important;
            }
        }

        /* Main media query for responsive styles */
        @media only screen and (max-width: 480px) {

            /* What it does: Overrides email-container's desktop width and forces it into a 100% fluid width. */
            .email-container {
                width: 100% !important;
                min-width: 100% !important;
            }

            .section>th {
                padding: 13px 26px 13px 26px !important;
            }

            .section.divider>th {
                padding: 26px 26px !important;
            }

            .main .section:first-child>th,
            .main .section:first-child>td {
                padding-top: 26px !important;
            }

            .main .section:nth-last-child(2)>th,
            .main .section:nth-last-child(2)>td {
                padding-bottom: 52px !important;
            }

            .section.recommended_products>th,
            .section.discount>th {
                padding: 26px 26px !important;
            }

            /* What it does: Forces images to resize to the width of their container. */
            img.fluid,
            img.fluid-centered {
                width: 100% !important;
                min-width: 100% !important;
                max-width: 100% !important;
                height: auto !important;
                margin: auto !important;
                box-sizing: border-box;
            }

            /* and center justify these ones. */
            img.fluid-centered {
                margin: auto !important;
            }

            /* What it does: Forces table cells into full-width rows. */
            th.stack-column,
            th.stack-column-left,
            th.stack-column-center,
            th.related_product_wrapper,
            .column_1_of_2,
            .column_2_of_2 {
                display: block !important;
                width: 100% !important;
                min-width: 100% !important;
                direction: ltr !important;
                box-sizing: border-box;
            }

            /* and left justify these ones. */
            th.stack-column-left {
                text-align: left !important;
            }

            /* and center justify these ones. */
            th.stack-column-center,
            th.related_product_wrapper {
                text-align: center !important;
                border-right: none !important;
                border-left: none !important;
            }

            .column_button,
            .column_button>table,
            .column_button>table th {
                width: 100% !important;
                text-align: center !important;
                margin: 0 !important;
            }

            .column_1_of_2 {
                padding-bottom: 26px !important;
            }

            .column_1_of_2 th {
                padding-right: 0 !important;
            }

            .column_2_of_2 th {
                padding-left: 0 !important;
            }

            .column_text_after_button {
                padding: 0 13px !important;
            }

            /* Adjust product images */
            th.table-stack {
                padding: 0 !important;
            }

            th.product-image-wrapper {
                padding: 26px 0 13px 0 !important;
            }

            img.product-image {
                width: 240px !important;
                max-width: 240px !important;
            }

            tr.row-border-bottom th.product-image-wrapper {
                border-bottom: none !important;
            }

            th.related_product_wrapper.first,
            th.related_product_wrapper.last {
                padding-right: 0 !important;
                padding-left: 0 !important;
            }

            .text_banner th.banner_container {
                padding: 13px !important;
            }

            .mobile_app_download .column_1_of_2 .image_container {
                padding-bottom: 0 !important;
            }

            .mobile_app_download .column_2_of_2 .image_container {
                padding-top: 0 !important;
            }
        }
    </style>
    <style type="text/css" data-premailer="ignore">
        /* Custom Media Queries */
        @media only screen and (max-width: 480px) {
            .column_logo {
                display: block !important;
                width: 100% !important;
                min-width: 100% !important;
                direction: ltr !important;
                text-align: center !important;
            }

            p,
            .column_1_of_2 th p,
            .column_2_of_2 th p,
            .order_notes *,
            .invoice_link * {
                text-align: center !important;
            }

            .line-item-description p {
                text-align: left !important;
            }

            .line-item-price p,
            .line-item-qty p,
            .line-item-line-price p {
                text-align: right !important;
            }

            h1,
            h2,
            h3,
            .column_1_of_2 th,
            .column_2_of_2 th {
                text-align: center !important;
            }

            td.order-table-title {
                text-align: center !important;
            }

            .footer .column_1_of_2 {
                border-right: 0 !important;
                border-bottom: 0 !important;
            }

            .footer .section_wrapper_th {
                padding: 0 17px;
            }
        }
    </style>
</head>

<body class="body" id="body" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#ecba78"
    style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;">
    <!--[if !mso 9]><!-->
    <div
        style="display: none; overflow: hidden; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; mso-hide: all;">
        {{ $text }},{{ $subject }}
    </div>
    <!--<![endif]-->
    <!-- BEGIN: CONTAINER -->
    <table class="container_full container" cellpadding="0" cellspacing="0" border="0" width="100%"
        style="border-collapse: collapse; min-width: 100%;" role="presentation" bgcolor="#ecba78">
        <tbody>
            <tr>
                <th valign="top" style="mso-line-height-rule: exactly;">
                    <center style="width: 100%;">
                        <table border="0" width="600" cellpadding="0" cellspacing="0" align="center"
                            style="width: 600px; min-width: 600px; max-width: 600px; margin: auto;"
                            class="email-container" role="presentation">
                            <tbody>
                                <tr>
                                    <th valign="top" style="mso-line-height-rule: exactly;">
                                        <!-- BEGIN : SECTION : HEADER -->
                                        <table class="section_wrapper header" data-id="header" id="section-header"
                                            border="0" width="100%" cellpadding="0" cellspacing="0" align="center"
                                            style="min-width: 100%;" role="presentation" bgcolor="#ffffff">
                                            <tbody>
                                                <tr>
                                                    <td class="section_wrapper_th"
                                                        style="mso-line-height-rule: exactly; padding-top: 52px;"
                                                        bgcolor="#ffffff">
                                                        <table border="0" width="100%" cellpadding="0"
                                                            cellspacing="0" align="center" style="min-width: 100%;"
                                                            role="presentation">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="column_logo"
                                                                        style="mso-line-height-rule: exactly; padding-top: 13px; padding-bottom: 13px;"
                                                                        align="center" bgcolor="#ffffff">
                                                                        <!-- Logo : BEGIN -->
                                                                        <a href="{{ url('') }}" target="_blank"
                                                                            style="color: #c3c3c3; text-decoration: none !important; text-underline: none;">
                                                                            <img src="{{ $file->ver_img_local('client/images/email-logo.png') }} "
                                                                                class="logo" width="200"
                                                                                border="0"
                                                                                style="width: 200px; height: auto !important; display: block; text-align: center; margin: auto;" />
                                                                        </a>
                                                                        <!-- Logo : END -->
                                                                    </th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- END : SECTION : HEADER -->
                                        <!-- BEGIN : SECTION : MAIN -->
                                        <table class="section_wrapper main" data-id="main" id="section-main"
                                            border="0" width="100%" cellpadding="0" cellspacing="0" align="center"
                                            style="min-width: 100%;" role="presentation" bgcolor="#ffffff">
                                            <tbody>
                                                <tr>
                                                    <td class="section_wrapper_th"
                                                        style="mso-line-height-rule: exactly;" bgcolor="#ffffff">
                                                        <table border="0" width="100%" cellpadding="0"
                                                            cellspacing="0" align="center" style="min-width: 100%;"
                                                            id="mixContainer" role="presentation">
                                                            <!-- BEGIN SECTION: Heading -->
                                                            <tbody>
                                                                <tr id="section-1468266" class="section heading">
                                                                    <th style="mso-line-height-rule: exactly; color: #4b4b4b; padding: 26px 52px 13px;"
                                                                        bgcolor="#ffffff">
                                                                        <table cellspacing="0" cellpadding="0"
                                                                            border="0" width="100%"
                                                                            role="presentation"
                                                                            style="color: #4b4b4b;" bgcolor="#ffffff">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esdev-adapt-off es-m-p10"
                                                                                        align="left"
                                                                                        background="https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/66551620375036465.png"
                                                                                        style="padding: 20px; margin: 0; background-image: url(https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/66551620375036465.png); background-repeat: no-repeat; background-position: center center;">
                                                                                        <table cellpadding="0"
                                                                                            cellspacing="0"
                                                                                            class="esdev-mso-table"
                                                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; width: 560px;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td class="esdev-mso-td"
                                                                                                        valign="top"
                                                                                                        style="padding: 0; margin: 0;">
                                                                                                        <table
                                                                                                            cellpadding="0"
                                                                                                            cellspacing="0"
                                                                                                            class="es-left"
                                                                                                            align="left"
                                                                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; float: left;">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td align="left"
                                                                                                                        style="padding: 0; margin: 0; width: 177px;">
                                                                                                                        <table
                                                                                                                            cellpadding="0"
                                                                                                                            cellspacing="0"
                                                                                                                            width="100%"
                                                                                                                            bgcolor="@if ($order->status == 1) #f6e6cb @else #efefef @endif"
                                                                                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: @if ($order->status == 1) #f6e6cb @else #efefef @endif;"
                                                                                                                            role="presentation">
                                                                                                                            <tbody
                                                                                                                                style="height: 117px;">
                                                                                                                                <tr>
                                                                                                                                    @if ($order->status >= 1)
                                                                                                                                        <td align="center"
                                                                                                                                            style="padding: 0; margin: 0; padding-top: 10px; padding-left: 15px; padding-right: 15px; font-size: 0px;">
                                                                                                                                            <a target="_blank"
                                                                                                                                                href="#"
                                                                                                                                                style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; text-decoration: underline; color: #926b4a; font-size: 14px;">
                                                                                                                                                <img src="https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/60121620374838489.png"
                                                                                                                                                    alt=""
                                                                                                                                                    style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;"
                                                                                                                                                    width="30" />
                                                                                                                                            </a>
                                                                                                                                        </td>
                                                                                                                                    @else
                                                                                                                                        <td align="center"
                                                                                                                                            style="padding: 0; margin: 0; padding-top: 10px; padding-left: 15px; padding-right: 15px; font-size: 0px;">
                                                                                                                                            <a target="_blank"
                                                                                                                                                href="#"
                                                                                                                                                style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; text-decoration: underline; color: #926b4a; font-size: 14px;">
                                                                                                                                                <img src="https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/85851620374838300.png"
                                                                                                                                                    alt=""
                                                                                                                                                    style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;"
                                                                                                                                                    width="30" />
                                                                                                                                            </a>
                                                                                                                                        </td>
                                                                                                                                    @endif
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td align="center"
                                                                                                                                        style="margin: 0; padding-left: 10px; padding-right: 10px; padding-top: 15px; padding-bottom: 20px;">
                                                                                                                                        <p
                                                                                                                                            style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: arial, 'helvetica neue', helvetica, sans-serif; line-height: 21px; color: #666666; font-size: 14px;">
                                                                                                                                            Đã
                                                                                                                                            đặt
                                                                                                                                            hàng<br />
                                                                                                                                            {{ $order->created_at }}
                                                                                                                                        </p>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        style="padding: 0; margin: 0; width: 15px;">
                                                                                                    </td>
                                                                                                    <td class="esdev-mso-td"
                                                                                                        valign="top"
                                                                                                        style="padding: 0; margin: 0;">
                                                                                                        <table
                                                                                                            cellpadding="0"
                                                                                                            cellspacing="0"
                                                                                                            class="es-left"
                                                                                                            align="left"
                                                                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; float: left;">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td align="left"
                                                                                                                        style="padding: 0; margin: 0; width: 177px;">
                                                                                                                        <table
                                                                                                                            cellpadding="0"
                                                                                                                            cellspacing="0"
                                                                                                                            width="100%"
                                                                                                                            bgcolor="@if ($order->status == 2) #f6e6cb @else #efefef @endif"
                                                                                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: @if ($order->status == 2) #f6e6cb @else #efefef @endif;"
                                                                                                                            role="presentation">
                                                                                                                            <tbody
                                                                                                                                style="height: 117px;">
                                                                                                                                <tr>
                                                                                                                                    @if ($order->status >= 2)
                                                                                                                                        <td align="center"
                                                                                                                                            style="padding: 0; margin: 0; padding-top: 10px; padding-left: 15px; padding-right: 15px; font-size: 0px;">
                                                                                                                                            <a target="_blank"
                                                                                                                                                href="#"
                                                                                                                                                style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; text-decoration: underline; color: #926b4a; font-size: 14px;">
                                                                                                                                                <img src="https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/60121620374838489.png"
                                                                                                                                                    alt=""
                                                                                                                                                    style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;"
                                                                                                                                                    width="30" />
                                                                                                                                            </a>
                                                                                                                                        </td>
                                                                                                                                    @else
                                                                                                                                        <td align="center"
                                                                                                                                            style="padding: 0; margin: 0; padding-top: 10px; padding-left: 15px; padding-right: 15px; font-size: 0px;">
                                                                                                                                            <a target="_blank"
                                                                                                                                                href="#"
                                                                                                                                                style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; text-decoration: underline; color: #926b4a; font-size: 14px;">
                                                                                                                                                <img src="https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/85851620374838300.png"
                                                                                                                                                    alt=""
                                                                                                                                                    style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;"
                                                                                                                                                    width="30" />
                                                                                                                                            </a>
                                                                                                                                        </td>
                                                                                                                                    @endif
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td align="center"
                                                                                                                                        style="margin: 0; padding-left: 10px; padding-right: 10px; padding-top: 15px; padding-bottom: 20px;">
                                                                                                                                        <p
                                                                                                                                            style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: arial, 'helvetica neue', helvetica, sans-serif; line-height: 21px; color: #666666; font-size: 14px;">
                                                                                                                                            Đã
                                                                                                                                            Vận
                                                                                                                                            Chuyển
                                                                                                                                            @if ($order->status >= 2)
                                                                                                                                                <br />
                                                                                                                                                {{ $order->date_ship }}
                                                                                                                                            @endif
                                                                                                                                        </p>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        style="padding: 0; margin: 0; width: 15px;">
                                                                                                    </td>
                                                                                                    <td class="esdev-mso-td"
                                                                                                        valign="top"
                                                                                                        style="padding: 0; margin: 0;">
                                                                                                        <table
                                                                                                            cellpadding="0"
                                                                                                            cellspacing="0"
                                                                                                            class="es-right"
                                                                                                            align="right"
                                                                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; float: right;">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td align="left"
                                                                                                                        style="padding: 0; margin: 0; width: 176px;">
                                                                                                                        <table
                                                                                                                            cellpadding="0"
                                                                                                                            cellspacing="0"
                                                                                                                            width="100%"
                                                                                                                            bgcolor="@if ($order->status == 3) #f6e6cb @else #efefef @endif"
                                                                                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: @if ($order->status == 3) #f6e6cb @else #efefef @endif;"
                                                                                                                            role="presentation">
                                                                                                                            <tbody
                                                                                                                                style="height: 117px;">
                                                                                                                                <tr>
                                                                                                                                    @if ($order->status == 3)
                                                                                                                                        <td align="center"
                                                                                                                                            style="padding: 0; margin: 0; padding-top: 10px; padding-left: 15px; padding-right: 15px; font-size: 0px;">
                                                                                                                                            <a target="_blank"
                                                                                                                                                href=""
                                                                                                                                                style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; text-decoration: underline; color: #926b4a; font-size: 14px;">
                                                                                                                                                <img src="https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/60121620374838489.png"
                                                                                                                                                    alt=""
                                                                                                                                                    style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;"
                                                                                                                                                    width="30" />
                                                                                                                                            </a>
                                                                                                                                        </td>
                                                                                                                                    @else
                                                                                                                                        <td align="center"
                                                                                                                                            style="padding: 0; margin: 0; padding-top: 10px; padding-left: 15px; padding-right: 15px; font-size: 0px;">
                                                                                                                                            <a target="_blank"
                                                                                                                                                href="https://viewstripo.email"
                                                                                                                                                style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; text-decoration: underline; color: #926b4a; font-size: 14px;">
                                                                                                                                                <img src="https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/85851620374838300.png"
                                                                                                                                                    alt=""style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;"
                                                                                                                                                    width="30" />
                                                                                                                                            </a>
                                                                                                                                        </td>
                                                                                                                                    @endif
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td align="center"
                                                                                                                                        style="margin: 0; padding-left: 10px; padding-right: 10px; padding-top: 15px; padding-bottom: 20px;">
                                                                                                                                        <p
                                                                                                                                            style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: arial, 'helvetica neue', helvetica, sans-serif; line-height: 21px; color: #666666; font-size: 14px;">
                                                                                                                                            Giao
                                                                                                                                            Hàng
                                                                                                                                            Thành
                                                                                                                                            Công
                                                                                                                                            @if ($order->status == 3)
                                                                                                                                                <br />
                                                                                                                                                {{ $order->date_s }}
                                                                                                                                            @endif
                                                                                                                                        </p>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </th>
                                                                </tr>
                                                                <!-- END SECTION: Heading -->
                                                                <!-- BEGIN SECTION: Introduction -->
                                                                <tr id="section-1468267" class="section introduction">
                                                                    <th style="mso-line-height-rule: exactly; padding: 13px 52px;"
                                                                        bgcolor="#ffffff">
                                                                        <p style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0 0 13px;"
                                                                            align="center">
                                                                            <span data-key="1468267_greeting_text"
                                                                                style="text-align: center; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363;">
                                                                                Hey
                                                                            </span>
                                                                            {{ $order->name }},
                                                                        </p>
                                                                        <p data-key="1468267_introduction_text"
                                                                            class="text"
                                                                            style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 13px 0;"
                                                                            align="center"></p>
                                                                        <p style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 13px 0;"
                                                                            align="center">
                                                                            @if ($type != 4)
                                                                                {{ $subject }}, Chuẩn bị chiến thôi
                                                                                giáo sư!
                                                                            @else
                                                                                Thật đáng tiếc khi đơn hàng của quý
                                                                                khách đã bị huỷ :(( , Mong quý khách vẫn
                                                                                ủng hộ 2NITE SHOP
                                                                            @endif
                                                                        </p>
                                                                        <p style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 13px 0;"
                                                                            align="center">{{ $text }}</p>
                                                                    </th>
                                                                </tr>
                                                                <tr id="section-1468270"
                                                                    class="section order_number_and_date">
                                                                    <th style="mso-line-height-rule: exactly; padding: 13px 52px;"
                                                                        bgcolor="#ffffff">
                                                                        <h2 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; color: #4b4b4b; font-size: 20px; line-height: 26px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0;"
                                                                            align="center">
                                                                            <span data-key="1468270_order_number">ID
                                                                                đơn hàng: </span>{{ $order->id }}
                                                                        </h2>
                                                                        <p class="muted"
                                                                            style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 14px; line-height: 26px; font-weight: normal; color: #bdbdbd; margin: 0;"
                                                                            align="center">
                                                                            {{ $time }}
                                                                        </p>
                                                                    </th>
                                                                </tr>
                                                                <tr id="section-1468271"
                                                                    class="section products_with_pricing">
                                                                    <th style="mso-line-height-rule: exactly; padding: 13px 52px;"
                                                                        bgcolor="#ffffff">
                                                                        <table class="table-inner" cellspacing="0"
                                                                            cellpadding="0" border="0"
                                                                            width="100%" style="min-width: 100%;"
                                                                            role="presentation">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th class="product-table"
                                                                                        style="mso-line-height-rule: exactly;"
                                                                                        bgcolor="#ffffff"
                                                                                        valign="top">
                                                                                        <table cellspacing="0"
                                                                                            cellpadding="0"
                                                                                            border="0"
                                                                                            width="100%"
                                                                                            style="min-width: 100%;"
                                                                                            role="presentation">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <th colspan="2"
                                                                                                        class="product-table-h3-wrapper"
                                                                                                        style="mso-line-height-rule: exactly;"
                                                                                                        bgcolor="#ffffff"
                                                                                                        valign="top">
                                                                                                        <h3 data-key="1468271_item"
                                                                                                            style="
                                                                                  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla';
                                                                                  color: #bdbdbd;
                                                                                  font-size: 16px;
                                                                                  line-height: 52px;
                                                                                  font-weight: 700;
                                                                                  text-transform: uppercase;
                                                                                  border-bottom-width: 2px;
                                                                                  border-bottom-color: #dadada;
                                                                                  border-bottom-style: solid;
                                                                                  letter-spacing: 1px;
                                                                                  margin: 0;
                                                                                  "
                                                                                                            align="left">
                                                                                                            Sản Phẩm Đã
                                                                                                            Đặt
                                                                                                        </h3>
                                                                                                    </th>
                                                                                                </tr>
                                                                                                {{-- item --}}
                                                                                                @foreach ($cart as $item)
                                                                                                    @php $prd = App\Models\Products::where('id', '=' , $item->id)->first(); @endphp
                                                                                                    <tr
                                                                                                        class="row-border-bottom">
                                                                                                        <th class="table-stack product-image-wrapper stack-column-center"
                                                                                                            width="1"
                                                                                                            style="mso-line-height-rule: exactly; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid; padding: 13px 13px 13px 0;"
                                                                                                            bgcolor="#ffffff"
                                                                                                            valign="middle">
                                                                                                            <img width="140"
                                                                                                                class="product-image"
                                                                                                                src="{{ $file->ver_img($item->options->image) }}"
                                                                                                                alt="Product Image"
                                                                                                                style="vertical-align: middle; text-align: center; width: 140px; max-width: 140px; height: auto !important; border-radius: 1px; padding: 0px;" />
                                                                                                        </th>
                                                                                                        <th class="product-details-wrapper table-stack stack-column"
                                                                                                            style="mso-line-height-rule: exactly; padding-top: 13px; padding-bottom: 13px; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid;"
                                                                                                            bgcolor="#ffffff"
                                                                                                            valign="middle">
                                                                                                            <table
                                                                                                                cellspacing="0"
                                                                                                                cellpadding="0"
                                                                                                                border="0"
                                                                                                                width="100%"
                                                                                                                style="min-width: 100%;"
                                                                                                                role="presentation">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <th class="line-item-description"
                                                                                                                            style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; padding: 13px 6px 13px 0;"
                                                                                                                            align="left"
                                                                                                                            bgcolor="#ffffff"
                                                                                                                            valign="top">
                                                                                                                            <p style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;"
                                                                                                                                align="left">
                                                                                                                                <a href="{{ route('detail_product', ['slug' => $prd->slug]) }}"
                                                                                                                                    target="_blank"
                                                                                                                                    style="color: #666363; text-decoration: none !important; text-underline: none; word-wrap: break-word; text-align: left !important; font-weight: bold;">
                                                                                                                                    {{ $prd->name }}
                                                                                                                                </a>
                                                                                                                                <br />
                                                                                                                                @if ($item->options->ins)
                                                                                                                                    @php
                                                                                                                                        $arrOps = explode(',', $item->options->ins);
                                                                                                                                    @endphp
                                                                                                                                    @foreach ($arrOps as $op)
                                                                                                                                        @php
                                                                                                                                            $ins = App\Models\bun::where('id', '=', $op)->first();
                                                                                                                                        @endphp
                                                                                                                                        @if ($ins)
                                                                                                                                            <span
                                                                                                                                                class="muted"
                                                                                                                                                style="text-align: center; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 14px; line-height: 26px; font-weight: normal; color: #bdbdbd; word-break: break-all;">
                                                                                                                                                {{ App\Models\bundled_product::where('id', '=', $ins->group)->first()->name }}:
                                                                                                                                                {{ $ins->name }}(+{{ crf($ins->price) }})
                                                                                                                                            </span>
                                                                                                                                        @endif
                                                                                                                                    @endforeach
                                                                                                                                @endif
                                                                                                                            </p>
                                                                                                                        </th>
                                                                                                                        <th style="mso-line-height-rule: exactly;"
                                                                                                                            bgcolor="#ffffff"
                                                                                                                            valign="top">
                                                                                                                        </th>
                                                                                                                        <th class="right line-item-qty"
                                                                                                                            width="1"
                                                                                                                            style="mso-line-height-rule: exactly; white-space: nowrap; padding: 13px 0 13px 13px;"
                                                                                                                            align="right"
                                                                                                                            bgcolor="#ffffff"
                                                                                                                            valign="top">
                                                                                                                            <p style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;"
                                                                                                                                align="right">
                                                                                                                                ×&nbsp;{{ $item->qty }}
                                                                                                                            </p>
                                                                                                                        </th>
                                                                                                                        <th class="right line-item-line-price"
                                                                                                                            width="1"
                                                                                                                            style="mso-line-height-rule: exactly; white-space: nowrap; padding: 13px 0 13px 26px;"
                                                                                                                            align="right"
                                                                                                                            bgcolor="#ffffff"
                                                                                                                            valign="top">
                                                                                                                            <p style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;"
                                                                                                                                align="right">
                                                                                                                                {{ crf($item->options->sub_total) }}
                                                                                                                            </p>
                                                                                                                        </th>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                @endforeach
                                                                                                {{-- end item --}}
                                                                                                <tr>
                                                                                                    <th colspan="2"
                                                                                                        class="product-empty-row"
                                                                                                        style="mso-line-height-rule: exactly;"
                                                                                                        bgcolor="#ffffff"
                                                                                                        valign="top">
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th class="pricing-table"
                                                                                        style="mso-line-height-rule: exactly; padding: 13px 0;"
                                                                                        bgcolor="#ffffff"
                                                                                        valign="top">
                                                                                        <table cellspacing="0"
                                                                                            cellpadding="0"
                                                                                            border="0"
                                                                                            width="100%"
                                                                                            style="min-width: 100%;"
                                                                                            role="presentation">
                                                                                            <tbody>
                                                                                                <tr
                                                                                                    class="pricing-table-total-row">
                                                                                                    <th class="table-title"
                                                                                                        data-key="1468271_total"
                                                                                                        style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;"
                                                                                                        align="left"
                                                                                                        bgcolor="#ffffff"
                                                                                                        valign="top">
                                                                                                        Tổng
                                                                                                    </th>
                                                                                                    <th class="table-text"
                                                                                                        style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 6px 0;"
                                                                                                        align="right"
                                                                                                        bgcolor="#ffffff"
                                                                                                        valign="middle">
                                                                                                        {{ crf($order->total) }}
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </th>
                                                                </tr>
                                                                <!-- END SECTION: Products With Pricing -->
                                                                <!-- BEGIN SECTION: Payment Info -->
                                                                <tr id="section-1468272" class="section payment_info">
                                                                    <th style="mso-line-height-rule: exactly; padding: 13px 52px;"
                                                                        bgcolor="#ffffff">
                                                                        <table class="table-inner" cellspacing="0"
                                                                            cellpadding="0" border="0"
                                                                            width="100%" style="min-width: 100%;"
                                                                            role="presentation">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th colspan="2"
                                                                                        style="mso-line-height-rule: exactly;"
                                                                                        bgcolor="#ffffff"
                                                                                        valign="top">
                                                                                        <h3 data-key="1468272_payment_info"
                                                                                            style="
                                                                      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla';
                                                                      color: #bdbdbd;
                                                                      font-size: 16px;
                                                                      line-height: 52px;
                                                                      font-weight: 700;
                                                                      text-transform: uppercase;
                                                                      border-bottom-width: 0;
                                                                      border-bottom-color: #dadada;
                                                                      border-bottom-style: solid;
                                                                      letter-spacing: 1px;
                                                                      margin: 0;
                                                                      "
                                                                                            align="left">
                                                                                            Hình thức thanh toán
                                                                                        </h3>
                                                                                    </th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th class="table-title"
                                                                                        style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;"
                                                                                        align="left"
                                                                                        bgcolor="#ffffff"
                                                                                        valign="top">
                                                                                        <table cellspacing="0"
                                                                                            cellpadding="0"
                                                                                            border="0"
                                                                                            width="100%"
                                                                                            style="min-width: 100%; font-weight: bold;"
                                                                                            role="presentation">
                                                                                            <tbody>
                                                                                                @if ($order->payment == 'cod')
                                                                                                    <tr
                                                                                                        style="font-weight: bold;">
                                                                                                        <th width="40"
                                                                                                            style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; padding: 8px 10px 8px 0;"
                                                                                                            align="left"
                                                                                                            bgcolor="#ffffff"
                                                                                                            valign="middle">
                                                                                                            <img width="40"
                                                                                                                style="width: 40px; vertical-align: middle; height: auto !important; font-weight: bold;"
                                                                                                                alt="Mastercard Icon"
                                                                                                                src="{{ $file->ver_img_local('client/images/cod.png') }}" />
                                                                                                        </th>
                                                                                                        <th style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; padding: 8px 0;"
                                                                                                            align="left"
                                                                                                            bgcolor="#ffffff"
                                                                                                            valign="middle">
                                                                                                            Thu tiền khi
                                                                                                            giao hàng
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                @else
                                                                                                    <tr
                                                                                                        style="font-weight: bold;">
                                                                                                        <th width="40"
                                                                                                            style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; padding: 8px 10px 8px 0;"
                                                                                                            align="left"
                                                                                                            bgcolor="#ffffff"
                                                                                                            valign="middle">
                                                                                                            <img width="40"
                                                                                                                style="width: 40px; vertical-align: middle; height: auto !important; font-weight: bold;"
                                                                                                                alt="Mastercard Icon"
                                                                                                                src="{{ $file->ver_img_local('client/images/transfer.png') }}" />
                                                                                                        </th>
                                                                                                        <th style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; padding: 8px 0;"
                                                                                                            align="left"
                                                                                                            bgcolor="#ffffff"
                                                                                                            valign="middle">
                                                                                                            Chuyển khoản
                                                                                                            ngân hàng
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                @endif
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </th>
                                                                                    <th class="table-text"
                                                                                        style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 13px 0;"
                                                                                        align="right"
                                                                                        bgcolor="#ffffff"
                                                                                        valign="middle">
                                                                                        {{ crf($order->total) }}
                                                                                    </th>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </th>
                                                                </tr>
                                                                <!-- END SECTION: Payment Info -->
                                                                <!-- BEGIN SECTION: Customer And Shipping Address -->
                                                                <tr id="section-1468273"
                                                                    class="section customer_and_shipping_address">
                                                                    <!-- BEGIN : 2 COLUMNS : BILL_TO -->
                                                                    <th style="mso-line-height-rule: exactly; padding: 13px 52px;"
                                                                        bgcolor="#ffffff">
                                                                        <table border="0" width="100%"
                                                                            cellpadding="0" cellspacing="0"
                                                                            align="center" style="min-width: 100%;"
                                                                            role="presentation">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <!-- BEGIN : Column 1 of 2 : BILL_TO -->
                                                                                    <th width="50%"
                                                                                        class="column_1_of_2 column_bill_to"
                                                                                        style="mso-line-height-rule: exactly;"
                                                                                        align="left"
                                                                                        bgcolor="#ffffff"
                                                                                        valign="top">
                                                                                        <table align="center"
                                                                                            border="0"
                                                                                            width="100%"
                                                                                            cellpadding="0"
                                                                                            cellspacing="0"
                                                                                            style="min-width: 100%;"
                                                                                            role="presentation">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <th style="mso-line-height-rule: exactly; padding-right: 5%;"
                                                                                                        align="left"
                                                                                                        bgcolor="#ffffff"
                                                                                                        valign="top">
                                                                                                        <h3 data-key="1468273_bill_to"
                                                                                                            style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0;"
                                                                                                            align="left">
                                                                                                            Thông tin
                                                                                                            khách hàng
                                                                                                        </h3>
                                                                                                    </th>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th class="billing_address"
                                                                                                        style="mso-line-height-rule: exactly; padding-right: 5%;"
                                                                                                        align="left"
                                                                                                        bgcolor="#ffffff"
                                                                                                        valign="top">
                                                                                                        <p style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;"
                                                                                                            align="left">
                                                                                                            {{ $order->name }}<br />
                                                                                                            {{ $order->phone }}
                                                                                                            <br />
                                                                                                            @if ($order->note != null)
                                                                                                                {{ $order->note }}
                                                                                                                <br />
                                                                                                            @endif
                                                                                                            <a href="mailto:"
                                                                                                                style="color: #ecba78; text-decoration: none !important; text-underline: none; word-wrap: break-word;"
                                                                                                                target="_blank">{{ $order->email }}</a>
                                                                                                        </p>
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </th>
                                                                                    <!-- END : Column 1 of 2 : BILL_TO -->
                                                                                    <!-- BEGIN : Column 2 of 2 : SHIP_TO -->
                                                                                    <th width="50%"
                                                                                        class="column_2_of_2 column_ship_to"
                                                                                        style="mso-line-height-rule: exactly;"
                                                                                        align="right"
                                                                                        bgcolor="#ffffff"
                                                                                        valign="top">
                                                                                        <table align="center"
                                                                                            border="0"
                                                                                            width="100%"
                                                                                            cellpadding="0"
                                                                                            cellspacing="0"
                                                                                            style="min-width: 100%;"
                                                                                            role="presentation">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <th style="mso-line-height-rule: exactly; padding-left: 5%;"
                                                                                                        align="right"
                                                                                                        bgcolor="#ffffff"
                                                                                                        valign="top">
                                                                                                        <h3 data-key="1468273_ship_to"
                                                                                                            style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0;"
                                                                                                            align="right">
                                                                                                            Địa Chỉ Giao
                                                                                                            Hàng
                                                                                                        </h3>
                                                                                                    </th>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th class="shipping_address"
                                                                                                        style="mso-line-height-rule: exactly; padding-left: 5%;"
                                                                                                        align="right"
                                                                                                        bgcolor="#ffffff"
                                                                                                        valign="top">
                                                                                                        <p style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;"
                                                                                                            align="right">
                                                                                                            {{ $order->prov }}<br />
                                                                                                            {{ $order->dist }}<br />
                                                                                                            {{ $order->ward }}<br />
                                                                                                            {{ $order->address }}<br />
                                                                                                        </p>
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </th>
                                                                                    <!-- END : Column 2 of 2 : SHIP_TO -->
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </th>
                                                                    <!-- END : 2 COLUMNS : SHIP_TO -->
                                                                </tr>
                                                                <!-- END SECTION: Customer And Shipping Address -->
                                                                <!-- BEGIN SECTION: Divider -->
                                                                <tr id="section-1468275" class="section divider">
                                                                    <th style="mso-line-height-rule: exactly; padding: 26px 52px;"
                                                                        bgcolor="#ffffff">
                                                                        <table cellspacing="0" cellpadding="0"
                                                                            border="0" width="100%"
                                                                            role="presentation">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th style="mso-line-height-rule: exactly; border-top-width: 2px; border-top-color: #dadada; border-top-style: solid;"
                                                                                        bgcolor="#ffffff"
                                                                                        valign="top"></th>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </th>
                                                                </tr>
                                                                <!-- END SECTION: Divider -->
                                                                <!-- BEGIN SECTION: Closing Text -->
                                                                <tr id="section-1468276" class="section closing_text">
                                                                    <th data-key="1468276_closing_text" class="text"
                                                                        style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; padding: 13px 52px 52px;"
                                                                        align="center" bgcolor="#ffffff">
                                                                        <p style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;"
                                                                            align="center">
                                                                            Nếu khách hàng cần sự giúp đỡ hãy liên hệ
                                                                            với email: vaone6v2@gmail.com hoặc GỌI:
                                                                            {{ getVal('hotline')->value }} :)
                                                                        </p>
                                                                    </th>
                                                                </tr>
                                                                <!-- END SECTION: Closing Text -->
                                                                <tr data-id="link-list">
                                                                    <td class="menu_bar menu_bar_6"
                                                                        style="mso-line-height-rule: exactly; padding: 26px 0;"
                                                                        bgcolor="#ffffff">
                                                                        <table class="table_menu_bar" border="0"
                                                                            width="100%" cellpadding="0"
                                                                            cellspacing="0" role="presentation">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th class="menu_bar_item first"
                                                                                        style="
                                                                   width: 33%;
                                                                   mso-line-height-rule: exactly;
                                                                   font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla';
                                                                   font-size: 16px;
                                                                   font-weight: 400;
                                                                   line-height: 26px;
                                                                   text-transform: uppercase;
                                                                   color: #bdbdbd;
                                                                   border-right-color: #dadada;
                                                                   border-right-style: solid;
                                                                   border-left-color: #dadada;
                                                                   border-left-style: none;
                                                                   letter-spacing: 1px;
                                                                   border: 0;
                                                                   "
                                                                                        align="center"
                                                                                        bgcolor="#ffffff">
                                                                                        <a href="https://vachill.com"
                                                                                            target="_blank"
                                                                                            style="
                                                                      color: #bdbdbd;
                                                                      text-decoration: none !important;
                                                                      text-underline: none;
                                                                      word-wrap: break-word;
                                                                      text-align: center !important;
                                                                      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla';
                                                                      font-size: 16px;
                                                                      font-weight: 400;
                                                                      line-height: 26px;
                                                                      text-transform: uppercase;
                                                                      letter-spacing: 1px;
                                                                      ">
                                                                                            Shop
                                                                                        </a>
                                                                                    </th>
                                                                                    <th class="menu_bar_item"
                                                                                        style="
                                                                   width: 33%;
                                                                   mso-line-height-rule: exactly;
                                                                   font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla';
                                                                   font-size: 16px;
                                                                   font-weight: 400;
                                                                   line-height: 26px;
                                                                   text-transform: uppercase;
                                                                   color: #bdbdbd;
                                                                   border-right-color: #dadada;
                                                                   border-right-style: solid;
                                                                   border-left-color: #dadada;
                                                                   border-left-style: solid;
                                                                   letter-spacing: 1px;
                                                                   border: 0;
                                                                   "
                                                                                        align="center"
                                                                                        bgcolor="#ffffff">
                                                                                        <a href="https://vachill.com/pages/quy-dinh-chung"
                                                                                            target="_blank"
                                                                                            style="
                                                                      color: #bdbdbd;
                                                                      text-decoration: none !important;
                                                                      text-underline: none;
                                                                      word-wrap: break-word;
                                                                      text-align: center !important;
                                                                      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla';
                                                                      font-size: 16px;
                                                                      font-weight: 400;
                                                                      line-height: 26px;
                                                                      text-transform: uppercase;
                                                                      letter-spacing: 1px;
                                                                      ">
                                                                                            Quy Định Chung
                                                                                        </a>
                                                                                    </th>
                                                                                    <th class="menu_bar_item last"
                                                                                        style="
                                                                   width: 33%;
                                                                   mso-line-height-rule: exactly;
                                                                   font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla';
                                                                   font-size: 16px;
                                                                   font-weight: 400;
                                                                   line-height: 26px;
                                                                   text-transform: uppercase;
                                                                   color: #bdbdbd;
                                                                   border-right-color: #dadada;
                                                                   border-right-style: none;
                                                                   border-left-color: #dadada;
                                                                   border-left-style: solid;
                                                                   letter-spacing: 1px;
                                                                   border: 0;
                                                                   "
                                                                                        align="center"
                                                                                        bgcolor="#ffffff">
                                                                                        <a href="https://vachill.com/contact"
                                                                                            target="_blank"
                                                                                            style="
                                                                      color: #bdbdbd;
                                                                      text-decoration: none !important;
                                                                      text-underline: none;
                                                                      word-wrap: break-word;
                                                                      text-align: center !important;
                                                                      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla';
                                                                      font-size: 16px;
                                                                      font-weight: 400;
                                                                      line-height: 26px;
                                                                      text-transform: uppercase;
                                                                      letter-spacing: 1px;
                                                                      ">
                                                                                            Liên Hệ
                                                                                        </a>
                                                                                    </th>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- END : SECTION : MAIN -->
                                        <!-- BEGIN : SECTION : FOOTER -->
                                        <table class="section_wrapper footer" data-id="footer" id="section-footer"
                                            border="0" width="100%" cellpadding="0" cellspacing="0"
                                            align="center" style="min-width: 100%;" role="presentation"
                                            bgcolor="#ffffff">
                                            <tbody>
                                                <tr>
                                                    <td class="section_wrapper_th"
                                                        style="mso-line-height-rule: exactly; padding: 0 52px;"
                                                        bgcolor="#ffffff">
                                                        <table border="0" width="100%" cellpadding="0"
                                                            cellspacing="0" align="center" style="min-width: 100%;"
                                                            role="presentation">
                                                            <!-- BEGIN : 2 COLUMNS : SOCIAL_BLOCK -->
                                                            <tbody>
                                                                <tr>
                                                                    <th style="mso-line-height-rule: exactly;"
                                                                        bgcolor="#ffffff">
                                                                        <table border="0" width="100%"
                                                                            cellpadding="0" cellspacing="0"
                                                                            align="center" style="min-width: 100%;"
                                                                            role="presentation">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <!-- BEGIN : Column 1 of 2 : SOCIAL_BLOCK -->
                                                                                    <th width="50%"
                                                                                        class="column_1_of_2 column_social_block"
                                                                                        style="
                                                                   mso-line-height-rule: exactly;
                                                                   padding-top: 26px;
                                                                   padding-bottom: 26px;
                                                                   border-top-width: 2px;
                                                                   border-top-color: #dadada;
                                                                   border-top-style: solid;
                                                                   border-bottom-width: 2px;
                                                                   border-bottom-color: #dadada;
                                                                   border-bottom-style: solid;
                                                                   border-right-width: 2px;
                                                                   border-right-color: #dadada;
                                                                   border-right-style: solid;
                                                                   "
                                                                                        align="center"
                                                                                        bgcolor="#ffffff"
                                                                                        valign="top">
                                                                                        <table align="center"
                                                                                            border="0"
                                                                                            width="100%"
                                                                                            cellpadding="0"
                                                                                            cellspacing="0"
                                                                                            style="min-width: 100%; text-align: center;"
                                                                                            role="presentation">
                                                                                            <!-- Social heading : BEGIN -->
                                                                                            <tbody>
                                                                                                <tr style=""
                                                                                                    align="center">
                                                                                                    <th class="column_footer_title"
                                                                                                        width="100%"
                                                                                                        style="mso-line-height-rule: exactly; padding-right: 5%; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none;"
                                                                                                        align="center"
                                                                                                        bgcolor="#ffffff"
                                                                                                        valign="top">
                                                                                                        <p data-key="section_footer_title"
                                                                                                            style="mso-line-height-rule: exactly; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none; margin: 0 0 13px;"
                                                                                                            align="center">
                                                                                                            THEO DÕI
                                                                                                            TẠI:
                                                                                                        </p>
                                                                                                    </th>
                                                                                                </tr>
                                                                                                <!-- Social heading : END -->
                                                                                                <!-- Store Address : BEGIN -->
                                                                                                <tr style=""
                                                                                                    align="center">
                                                                                                    <th class="column_shop_social_icons"
                                                                                                        width="100%"
                                                                                                        style="mso-line-height-rule: exactly; padding-right: 5%;"
                                                                                                        align="center"
                                                                                                        bgcolor="#ffffff"
                                                                                                        valign="top">
                                                                                                        <a class="social-link"
                                                                                                            href="https://www.facebook.com/awang1601/"
                                                                                                            target="_blank"
                                                                                                            title="Facebook"
                                                                                                            style="color: #ecba78; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                                                                                            <img width="32"
                                                                                                                class="social-icons"
                                                                                                                alt="Facebook"
                                                                                                                src="https://orderlyemails.com/facebook_3.png"
                                                                                                                style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 6px 0 0px;" />
                                                                                                        </a>
                                                                                                        <a class="social-link"
                                                                                                            href="https://twitter.com/diepvuonganh2"
                                                                                                            target="_blank"
                                                                                                            title="Twitter"
                                                                                                            style="color: #ecba78; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                                                                                            <img width="32"
                                                                                                                class="social-icons"
                                                                                                                alt="Twitter"
                                                                                                                src="https://orderlyemails.com/twitter_3.png"
                                                                                                                style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 6px 0;" />
                                                                                                        </a>
                                                                                                        <a class="social-link"
                                                                                                            href="https://www.instagram.com/diepvuonganh9/"
                                                                                                            target="_blank"
                                                                                                            title="Instagram"
                                                                                                            style="color: #ecba78; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                                                                                            <img width="32"
                                                                                                                class="social-icons"
                                                                                                                alt="Instagram"
                                                                                                                src="https://orderlyemails.com/instagram_3.png"
                                                                                                                style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 6px 0;" />
                                                                                                        </a>
                                                                                                        <a class="social-link"
                                                                                                            href="https://www.youtube.com/channel/UCftso1X6pEwNsiPBl7p1Tpw"
                                                                                                            target="_blank"
                                                                                                            title="YouTube"
                                                                                                            style="color: #ecba78; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                                                                                            <img width="32"
                                                                                                                class="social-icons"
                                                                                                                alt="YouTube"
                                                                                                                src="https://orderlyemails.com/youtube_3.png"
                                                                                                                style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 0px 0 6px;" />
                                                                                                        </a>
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </th>
                                                                                    <!-- END : Column 1 of 2 : SOCIAL_BLOCK -->
                                                                                    <!-- BEGIN : Column 2 of 2 : SHOP_BLOCK -->
                                                                                    <th width="50%"
                                                                                        class="column_2_of_2 column_shop_block"
                                                                                        style="mso-line-height-rule: exactly; padding-top: 26px; padding-bottom: 26px; border-top-width: 2px; border-top-color: #dadada; border-top-style: solid; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid;"
                                                                                        align="center"
                                                                                        bgcolor="#ffffff"
                                                                                        valign="top">
                                                                                        <table align="center"
                                                                                            border="0"
                                                                                            width="100%"
                                                                                            cellpadding="0"
                                                                                            cellspacing="0"
                                                                                            style="min-width: 100%; text-align: center;"
                                                                                            role="presentation">
                                                                                            <!-- Store Address : BEGIN -->
                                                                                            <tbody>
                                                                                                <tr style=""
                                                                                                    align="center">
                                                                                                    <th class="column_shop_block2"
                                                                                                        data-key="section_shop_block2"
                                                                                                        width="100%"
                                                                                                        style="mso-line-height-rule: exactly; padding-left: 5%; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla'; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none;"
                                                                                                        align="center"
                                                                                                        bgcolor="#ffffff"
                                                                                                        valign="top">
                                                                                                        dAv1<br
                                                                                                            style="text-align: center;" />
                                                                                                        151/60 Trần
                                                                                                        Hoàng Na<br
                                                                                                            style="text-align: center;" />
                                                                                                        Cần Thơ<br
                                                                                                            style="text-align: center;" />
                                                                                                        <br
                                                                                                            style="text-align: center;" />
                                                                                                        Copyright © 2021
                                                                                                    </th>
                                                                                                </tr>
                                                                                                <!-- Store Address : END -->
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </th>
                                                                                    <!-- END : Column 2 of 2 : SHOP_BLOCK -->
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </th>
                                                                    <!-- END : 2 COLUMNS : SHOP_BLOCK -->
                                                                </tr>
                                                                <tr>
                                                                    <th data-id="store-info"
                                                                        style="mso-line-height-rule: exactly;"
                                                                        bgcolor="#ffffff">
                                                                        <table border="0" width="100%"
                                                                            cellpadding="0" cellspacing="0"
                                                                            role="presentation">
                                                                            <!-- Store Website : BEGIN -->
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th class="column_shop_block1"
                                                                                        width="100%"
                                                                                        style="
                                                                   mso-line-height-rule: exactly;
                                                                   font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, 'Karla';
                                                                   font-size: 14px;
                                                                   line-height: 24px;
                                                                   font-weight: 400;
                                                                   color: #a3a1a1;
                                                                   text-transform: none;
                                                                   padding-bottom: 13px;
                                                                   padding-top: 26px;
                                                                   "
                                                                                        align="center"
                                                                                        bgcolor="#ffffff">
                                                                                        <a href="https://vachill.com"
                                                                                            target="_blank"
                                                                                            data-key="section_shop_block1"
                                                                                            style="color: #ecba78; text-decoration: none !important; text-underline: none; font-size: 14px; font-weight: 400; text-transform: none;">vachill.com</a>
                                                                                    </th>
                                                                                </tr>
                                                                                <!-- Store Website : END -->
                                                                            </tbody>
                                                                        </table>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th height="1" border="0"
                                                                        style="height: 1px; line-height: 1px; font-size: 1px; mso-line-height-rule: exactly; padding: 0;"
                                                                        bgcolor="#ffffff">
                                                                        <img id="open-image"
                                                                            src="https://us.tens.co/tools/emails/open/order-confirmation/1"
                                                                            alt="" width="1"
                                                                            height="1" border="0" />
                                                                    </th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- END : SECTION : FOOTER -->
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </th>
            </tr>
        </tbody>
    </table>
    <!-- END : CONTAINER -->
</body>
