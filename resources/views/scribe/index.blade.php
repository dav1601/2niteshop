<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>2NITE SHOP API</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.print.css") }}" media="print">
    <link rel="shortcut icon" href="http://localhost/nava/public/client/images/email-logo.png?ver=1649112854" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var baseUrl = "http://localhost/nava/public";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("vendor/scribe/js/tryitout-3.24.1.js") }}"></script>

    <script src="{{ asset("vendor/scribe/js/theme-default-3.24.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
            <img src="public/client/images/email-logo.png" alt="logo" class="logo" style="padding-top: 10px;" width="230px"/>
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                                                                            <ul id="tocify-header-0" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="introduction">
                        <a href="#introduction">Introduction</a>
                    </li>
                                            
                                                                    </ul>
                                                <ul id="tocify-header-1" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="authenticating-requests">
                        <a href="#authenticating-requests">Authenticating requests</a>
                    </li>
                                            
                                                </ul>
                    
                    <ul id="tocify-header-2" class="tocify-header">
                <li class="tocify-item level-1" data-unique="auth-api">
                    <a href="#auth-api">Auth Api</a>
                </li>
                                    <ul id="tocify-subheader-auth-api" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="auth-api-POSTapi-auth-logout">
                        <a href="#auth-api-POSTapi-auth-logout">Logout.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="auth-api-GETapi-auth-me--id-">
                        <a href="#auth-api-GETapi-auth-me--id-">GET USER LOGGED.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="auth-api-POSTapi-auth-update--id-">
                        <a href="#auth-api-POSTapi-auth-update--id-">POST UPDATE INFO USER.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="auth-api-GETapi-auth-me-orders--id-">
                        <a href="#auth-api-GETapi-auth-me-orders--id-">GET ORDERS USER LOGGED.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-3" class="tocify-header">
                <li class="tocify-item level-1" data-unique="blog-api">
                    <a href="#blog-api">Blog Api</a>
                </li>
                                    <ul id="tocify-subheader-blog-api" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="blog-api-GETapi-blogs-blog_properties">
                        <a href="#blog-api-GETapi-blogs-blog_properties">Blog properties.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="blog-api-GETapi-blogs-blog--id-">
                        <a href="#blog-api-GETapi-blogs-blog--id-">Retrieve a blog.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="blog-api-GETapi-blogs-search_blog">
                        <a href="#blog-api-GETapi-blogs-search_blog">Search Blogs.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="blog-api-GETapi-blogs-list">
                        <a href="#blog-api-GETapi-blogs-list">List all blog.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-4" class="tocify-header">
                <li class="tocify-item level-1" data-unique="blog-categories">
                    <a href="#blog-categories">Blog Categories</a>
                </li>
                                    <ul id="tocify-subheader-blog-categories" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="blog-categories-GETapi-blogs-categories-properties">
                        <a href="#blog-categories-GETapi-blogs-categories-properties">Blog category properties.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="blog-categories-GETapi-blogs-categories-list_all">
                        <a href="#blog-categories-GETapi-blogs-categories-list_all">List all blog categories.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-5" class="tocify-header">
                <li class="tocify-item level-1" data-unique="products-api">
                    <a href="#products-api">PRODUCTS API</a>
                </li>
                                    <ul id="tocify-subheader-products-api" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="products-api-GETapi-products-product--id-">
                        <a href="#products-api-GETapi-products-product--id-">Retrieve a product.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="products-api-GETapi-products-search_product">
                        <a href="#products-api-GETapi-products-search_product">Search Products.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="products-api-GETapi-products-list">
                        <a href="#products-api-GETapi-products-list">List all products.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-6" class="tocify-header">
                <li class="tocify-item level-1" data-unique="product-categories">
                    <a href="#product-categories">Product Categories</a>
                </li>
                                    <ul id="tocify-subheader-product-categories" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="product-categories-GETapi-products-categories-properties">
                        <a href="#product-categories-GETapi-products-categories-properties">Product category properties.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-categories-GETapi-products-categories-list_all">
                        <a href="#product-categories-GETapi-products-categories-list_all">List all product categories.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-categories-GETapi-products-categories-game">
                        <a href="#product-categories-GETapi-products-categories-game">List all Game Genre.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-categories-GETapi-products-categories-producer">
                        <a href="#product-categories-GETapi-products-categories-producer">List all Producer.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-7" class="tocify-header">
                <li class="tocify-item level-1" data-unique="product-properties">
                    <a href="#product-properties">Product Properties</a>
                </li>
                                    <ul id="tocify-subheader-product-properties" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="product-properties-GETapi-products-product_properties">
                        <a href="#product-properties-GETapi-products-product_properties">Product properties.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-8" class="tocify-header">
                <li class="tocify-item level-1" data-unique="reset-password-api">
                    <a href="#reset-password-api">Reset Password Api</a>
                </li>
                                    <ul id="tocify-subheader-reset-password-api" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="reset-password-api-POSTapi-auth-reset-passowrd-forgot">
                        <a href="#reset-password-api-POSTapi-auth-reset-passowrd-forgot">Forgot Password.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="reset-password-api-POSTapi-auth-reset-passowrd-verification">
                        <a href="#reset-password-api-POSTapi-auth-reset-passowrd-verification">Api Verification OTP.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="reset-password-api-POSTapi-auth-reset-passowrd-new_password">
                        <a href="#reset-password-api-POSTapi-auth-reset-passowrd-new_password">Api New Password.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-9" class="tocify-header">
                <li class="tocify-item level-1" data-unique="users-api">
                    <a href="#users-api">Users Api</a>
                </li>
                                    <ul id="tocify-subheader-users-api" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="users-api-GETapi-users">
                        <a href="#users-api-GETapi-users">GET USERS.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="users-api-POSTapi-auth-signup">
                        <a href="#users-api-POSTapi-auth-signup">Singup.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="users-api-POSTapi-auth-login">
                        <a href="#users-api-POSTapi-auth-login">Login.</a>
                    </li>
                                                    </ul>
                            </ul>
        
                        
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: April 5 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>Tài liệu này nhằm mục đích cung cấp tất cả thông tin bạn cần để làm việc với API của 2NITE SHOP.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost/nava/public</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>Authenticate requests to this API's endpoints by sending an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="auth-api">Auth Api</h1>

    

            <h2 id="auth-api-POSTapi-auth-logout">Logout.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Api cho phép bạn logout và xoá token user trong hệ thống.</p>

<span id="example-requests-POSTapi-auth-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/nava/public/api/auth/logout" \
    --header "Authorization: Bearer {token}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/auth/logout"
);

const headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-logout">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
is_logout =&gt; true
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-logout"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-logout"></code></pre>
</span>
<form id="form-POSTapi-auth-logout" data-method="POST"
      data-path="api/auth/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {token}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-logout"
                    onclick="tryItOut('POSTapi-auth-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-logout"
                    onclick="cancelTryOut('POSTapi-auth-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-logout" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/logout</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-auth-logout" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-auth-logout"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="auth-api-GETapi-auth-me--id-">GET USER LOGGED.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Api này cho phép lấy user đã đăng nhập.</p>

<span id="example-requests-GETapi-auth-me--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/nava/public/api/auth/me/quia" \
    --header "Authorization: Bearer {token}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/auth/me/quia"
);

const headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-auth-me--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;user&quot;: {
        &quot;id&quot;: 337,
        &quot;role_id&quot;: 5,
        &quot;name&quot;: &quot;Garrison Farrell&quot;,
        &quot;email&quot;: &quot;tkub@example.org&quot;,
        &quot;phone&quot;: &quot;0944373354&quot;,
        &quot;email_verified_at&quot;: null,
        &quot;avatar&quot;: null,
        &quot;provider_id&quot;: null,
        &quot;provider&quot;: null,
        &quot;ban&quot;: 0,
        &quot;created_at&quot;: &quot;2022-02-19T08:40:34.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-02-19T08:40:34.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-auth-me--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-auth-me--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth-me--id-"></code></pre>
</span>
<span id="execution-error-GETapi-auth-me--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth-me--id-"></code></pre>
</span>
<form id="form-GETapi-auth-me--id-" data-method="GET"
      data-path="api/auth/me/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {token}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-auth-me--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-auth-me--id-"
                    onclick="tryItOut('GETapi-auth-me--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-auth-me--id-"
                    onclick="cancelTryOut('GETapi-auth-me--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-auth-me--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/auth/me/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-auth-me--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-auth-me--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="GETapi-auth-me--id-"
               value="quia"
               data-component="url" hidden>
    <br>
<p>The ID of the me.</p>
            </p>
                    </form>

            <h2 id="auth-api-POSTapi-auth-update--id-">POST UPDATE INFO USER.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Api này cho phép cập nhật thông tin của user.</p>

<span id="example-requests-POSTapi-auth-update--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/nava/public/api/auth/update/quia" \
    --header "Authorization: Bearer {token}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=VUong Anh" \
    --form "phone=0987687678" \
    --form "avatar=@C:\Users\Admin\AppData\Local\Temp\php9C2F.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/auth/update/quia"
);

const headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'VUong Anh');
body.append('phone', '0987687678');
body.append('avatar', document.querySelector('input[name="avatar"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-update--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: 1,
    &quot;updated_fail&quot;: false,
    &quot;user&quot;: {
        &quot;id&quot;: 1,
        &quot;role_id&quot;: 1,
        &quot;name&quot;: &quot;2NITEAPI&quot;,
        &quot;email&quot;: &quot;2nitetestapi@gmail.com&quot;,
        &quot;phone&quot;: &quot;0811122260&quot;,
        &quot;email_verified_at&quot;: null,
        &quot;avatar&quot;: &quot;admin/images/avatar/245119900_260411806011768_6267318235776841110_n.jpg&quot;,
        &quot;provider_id&quot;: null,
        &quot;provider&quot;: null,
        &quot;ban&quot;: 0,
        &quot;created_at&quot;: &quot;2022-02-19T08:06:28.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-03-22T11:39:20.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-update--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-update--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-update--id-"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-update--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-update--id-"></code></pre>
</span>
<form id="form-POSTapi-auth-update--id-" data-method="POST"
      data-path="api/auth/update/{id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {token}","Content-Type":"multipart\/form-data","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-update--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-update--id-"
                    onclick="tryItOut('POSTapi-auth-update--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-update--id-"
                    onclick="cancelTryOut('POSTapi-auth-update--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-update--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/update/{id}</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-auth-update--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-auth-update--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="POSTapi-auth-update--id-"
               value="quia"
               data-component="url" hidden>
    <br>
<p>The ID of the update.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-auth-update--id-"
               value="VUong Anh"
               data-component="body" hidden>
    <br>
<p>max 255</p>
        </p>
                <p>
            <b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="phone"
               data-endpoint="POSTapi-auth-update--id-"
               value="0987687678"
               data-component="body" hidden>
    <br>
<p>min:6</p>
        </p>
                <p>
            <b><code>avatar</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="avatar"
               data-endpoint="POSTapi-auth-update--id-"
               value=""
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="auth-api-GETapi-auth-me-orders--id-">GET ORDERS USER LOGGED.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Api này cho phép lấy danh sách đơn hàng user đã đăng nhập.</p>

<span id="example-requests-GETapi-auth-me-orders--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/nava/public/api/auth/me/orders/sed" \
    --header "Authorization: Bearer {token}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/auth/me/orders/sed"
);

const headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-auth-me-orders--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
    </span>
<span id="execution-results-GETapi-auth-me-orders--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-auth-me-orders--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth-me-orders--id-"></code></pre>
</span>
<span id="execution-error-GETapi-auth-me-orders--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth-me-orders--id-"></code></pre>
</span>
<form id="form-GETapi-auth-me-orders--id-" data-method="GET"
      data-path="api/auth/me/orders/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {token}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-auth-me-orders--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-auth-me-orders--id-"
                    onclick="tryItOut('GETapi-auth-me-orders--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-auth-me-orders--id-"
                    onclick="cancelTryOut('GETapi-auth-me-orders--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-auth-me-orders--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/auth/me/orders/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-auth-me-orders--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-auth-me-orders--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="GETapi-auth-me-orders--id-"
               value="sed"
               data-component="url" hidden>
    <br>
<p>The ID of the order.</p>
            </p>
                    </form>

        <h1 id="blog-api">Blog Api</h1>

    

            <h2 id="blog-api-GETapi-blogs-blog_properties">Blog properties.</h2>

<p>
</p>

<p>Danh sách các thuộc tính của bài viết.</p>

<span id="example-requests-GETapi-blogs-blog_properties">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/nava/public/api/blogs/blog_properties" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"voluptatibus\",
    \"slug\": \"qui\",
    \"desc\": \"voluptas\",
    \"img\": \"aliquid\",
    \"cat_id\": \"voluptas\",
    \"cat_sub_id\": \"nihil\",
    \"users_id\": \"ullam\",
    \"views\": \"aliquid\",
    \"author\": \"quo\",
    \"active\": 5
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/blogs/blog_properties"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "voluptatibus",
    "slug": "qui",
    "desc": "voluptas",
    "img": "aliquid",
    "cat_id": "voluptas",
    "cat_sub_id": "nihil",
    "users_id": "ullam",
    "views": "aliquid",
    "author": "quo",
    "active": 5
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-blogs-blog_properties">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{&quot;Danh s&aacute;ch thuộc t&iacute;nh của bảng Blog&quot;}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-blogs-blog_properties" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-blogs-blog_properties"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-blogs-blog_properties"></code></pre>
</span>
<span id="execution-error-GETapi-blogs-blog_properties" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-blogs-blog_properties"></code></pre>
</span>
<form id="form-GETapi-blogs-blog_properties" data-method="GET"
      data-path="api/blogs/blog_properties"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-blogs-blog_properties', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-blogs-blog_properties"
                    onclick="tryItOut('GETapi-blogs-blog_properties');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-blogs-blog_properties"
                    onclick="cancelTryOut('GETapi-blogs-blog_properties');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-blogs-blog_properties" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/blogs/blog_properties</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>title</code></b>&nbsp;&nbsp;<small>varchar(255)</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="title"
               data-endpoint="GETapi-blogs-blog_properties"
               value="voluptatibus"
               data-component="body" hidden>
    <br>
<p>Tiêu đề bài viết</p>
        </p>
                <p>
            <b><code>slug</code></b>&nbsp;&nbsp;<small>longtext</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="slug"
               data-endpoint="GETapi-blogs-blog_properties"
               value="qui"
               data-component="body" hidden>
    <br>
<p>Slug bài viết</p>
        </p>
                <p>
            <b><code>desc</code></b>&nbsp;&nbsp;<small>longtext</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="desc"
               data-endpoint="GETapi-blogs-blog_properties"
               value="voluptas"
               data-component="body" hidden>
    <br>
<p>Mô tả ngắn bài viết</p>
        </p>
                <p>
            <b><code>img</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="img"
               data-endpoint="GETapi-blogs-blog_properties"
               value="aliquid"
               data-component="body" hidden>
    <br>
<p>Path hình ảnh bài viết</p>
        </p>
                <p>
            <b><code>cat_id</code></b>&nbsp;&nbsp;<small>bigint</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="cat_id"
               data-endpoint="GETapi-blogs-blog_properties"
               value="voluptas"
               data-component="body" hidden>
    <br>
<p>Danh mục chính bài viết</p>
        </p>
                <p>
            <b><code>cat_sub_id</code></b>&nbsp;&nbsp;<small>bigint</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="cat_sub_id"
               data-endpoint="GETapi-blogs-blog_properties"
               value="nihil"
               data-component="body" hidden>
    <br>
<p>Danh mục phụ bài viết</p>
        </p>
                <p>
            <b><code>users_id</code></b>&nbsp;&nbsp;<small>bigint</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="users_id"
               data-endpoint="GETapi-blogs-blog_properties"
               value="ullam"
               data-component="body" hidden>
    <br>
<p>Id tác giả</p>
        </p>
                <p>
            <b><code>views</code></b>&nbsp;&nbsp;<small>bigint</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="views"
               data-endpoint="GETapi-blogs-blog_properties"
               value="aliquid"
               data-component="body" hidden>
    <br>
<p>Lượt xem bài viết</p>
        </p>
                <p>
            <b><code>author</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="author"
               data-endpoint="GETapi-blogs-blog_properties"
               value="quo"
               data-component="body" hidden>
    <br>
<p>Tên tác giả</p>
        </p>
                <p>
            <b><code>active</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="active"
               data-endpoint="GETapi-blogs-blog_properties"
               value="5"
               data-component="body" hidden>
    <br>
<p>Trạng thái bài viết (1: được đăng , 2: đã gỡ)</p>
        </p>
        </form>

            <h2 id="blog-api-GETapi-blogs-blog--id-">Retrieve a blog.</h2>

<p>
</p>

<p>API này cho phép bạn truy xuất và xem một bài viết cụ thể bằng ID</p>

<span id="example-requests-GETapi-blogs-blog--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/nava/public/api/blogs/blog/corporis?token_api=19aIotXOerK" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/blogs/blog/corporis"
);

const params = {
    "token_api": "19aIotXOerK",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-blogs-blog--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;blog&quot;: {
        &quot;id&quot;: 1,
        &quot;title&quot;: &quot;Sony c&ocirc;ng bố PlayStation VR 2 4K HDR v&agrave; game Horizon Call of the Mountain mới&quot;,
        &quot;slug&quot;: &quot;sony-cong-bo-playstation-vr-2-4k-hdr-va-game-horizon-call-of-the-mountain-moi&quot;,
        &quot;content&quot;: &quot;&lt;p&gt;&lt;img style=\&quot;box-sizing: border-box; border: 0px; vertical-align: middle; max-width: 100%; height: auto; align-self: flex-start; cursor: pointer; display: block; color: #333333; font-family: 'Nunito Sans'; font-size: 15px; background-color: #ffffff; margin: 15px auto !important;\&quot; src=\&quot;https://game.haloshop.vn/image/catalog/blogs/psvr-2/psvr-2-cung-cac-cong-nghe-moi-1.jpg\&quot; alt=\&quot;Sony c&amp;ocirc;ng bố PlayStation VR 2 v&amp;agrave; game Horizon Call of the Mountain mới\&quot; /&gt;&lt;/p&gt;\r\n&lt;h4 style=\&quot;box-sizing: border-box; font-family: Montserrat; line-height: 1.1; color: #146678; margin: 10px 0px; font-size: 18px; text-transform: uppercase; background-color: #ffffff;\&quot;&gt;C&amp;Ocirc;NG NGHỆ MỚI NHẤT&lt;/h4&gt;\r\n&lt;p style=\&quot;box-sizing: border-box; margin: 10px 0px; text-align: justify; padding: 0px 15px; color: #333333; font-family: 'Nunito Sans'; font-size: 15px; background-color: #ffffff; line-height: 25px !important;\&quot;&gt;Sony cũng giới thiệu về những c&amp;ocirc;ng nghệ mới nhất được trang bị tr&amp;ecirc;n cặp k&amp;iacute;nh PS VR 2 mới nhất n&amp;agrave;y.&lt;/p&gt;\r\n&lt;p style=\&quot;box-sizing: border-box; margin: 10px 0px; text-align: justify; padding: 0px 15px; color: #333333; font-family: 'Nunito Sans'; font-size: 15px; background-color: #ffffff; line-height: 25px !important;\&quot;&gt;&lt;span style=\&quot;box-sizing: border-box; font-weight: bold;\&quot;&gt;H&amp;igrave;nh ảnh ch&amp;acirc;n thực:&lt;/span&gt;&amp;nbsp;Để c&amp;oacute; trải nghiệm tốt nhất PSVR 2 cung cấp 4K HDR, phạm vi quan s&amp;aacute;t (Field of View) khoảng 110 độ.&quot;,
        &quot;img&quot;: &quot;admin/images/blogs/tin-moi/main/psvr-2-cung-cac-cong-nghe-moi-0-356x200w.jpg&quot;,
        &quot;cat_id&quot;: 2,
        &quot;cat_sub_id&quot;: 6,
        &quot;users_id&quot;: 1,
        &quot;views&quot;: 0,
        &quot;author&quot;: &quot;2NITE&quot;,
        &quot;active&quot;: 1,
        &quot;created_at&quot;: &quot;2022-01-05T07:25:03.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-03-22T18:27:56.000000Z&quot;
    },
    &quot;involve&quot;: [
        {
            &quot;id&quot;: 2,
            &quot;title&quot;: &quot;Top game miễn ph&iacute; tr&ecirc;n PlayStation trong th&aacute;ng 1/2022&quot;,
            &quot;slug&quot;: &quot;top-game-mien-phi-tren-playstation-trong-thang-12022&quot;,
            &quot;content&quot;: &quot;&lt;h3 style=\&quot;box-sizing: border-box; font-family: Montserrat; line-height: 1.5; color: #333333; margin: 15px 0px; font-size: 28px; text-align: center; text-transform: uppercase; background-color: #ffffff;\&quot;&gt;GAME MIỄN PH&amp;Iacute; PLAYSTATION PLUS TH&amp;Aacute;NG 1/2022&lt;/h3&gt;\r\n&lt;p&gt;&lt;img style=\&quot;box-sizing: border-box; border: 0px; vertical-align: middle; max-width: 100%; height: auto; align-self: flex-start; cursor: pointer; display: block; color: #333333; font-family: 'Nunito Sans'; font-size: 15px; background-color: #ffffff; margin: 15px auto !important;\&quot; src=\&quot;https://game.haloshop.vn/image/catalog/blogs/game-mien-phi-thang-nay/2022/game-playstation-mien-phi-thang-1-2022-1.jpg\&quot; alt=\&quot;Game Miễn Ph&amp;iacute; Th&amp;aacute;ng 11\&quot; /&gt;&lt;/p&gt;\r\n&lt;div class=\&quot;image-caption\&quot; style=\&quot;box-sizing: border-box; text-align: center; padding: 5px 10px; width: 686px; background-color: #f5f5f5; color: #333333; font-family: 'Nunito Sans'; font-size: 15px; margin: 0px auto 20px !important;\&quot;&gt;&lt;a style=\&quot;box-sizing: border-box; background-color: transparent; color: #146678; text-decoration-line: none; touch-action: manipulation; display: inline-block;\&quot; .&quot;,
            &quot;img&quot;: &quot;admin/images/blogs/tin-moi/main/game-playstation-mien-phi-thang-1-2022-0-356x200w.jpg&quot;,
            &quot;cat_id&quot;: 2,
            &quot;cat_sub_id&quot;: null,
            &quot;users_id&quot;: 1,
            &quot;views&quot;: 0,
            &quot;author&quot;: &quot;2NITE&quot;,
            &quot;active&quot;: 1,
            &quot;created_at&quot;: &quot;2022-01-05T07:30:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-22T18:27:56.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;title&quot;: &quot;Những tựa game đ&aacute;ng mong đợi th&aacute;ng 1/2022 - Th&aacute;ng n&agrave;y chơi g&igrave;&quot;,
            &quot;slug&quot;: &quot;nhung-tua-game-dang-mong-doi-thang-12022-thang-nay-choi-gi&quot;,
            &quot;content&quot;: &quot;&lt;p style=\&quot;box-sizing: border-box; margin: 10px 0px; text-align: justify; padding: 0px 15px; color: #333333; font-family: 'Nunito Sans'; font-size: 15px; background-color: #ffffff; line-height: 25px !important;\&quot;&gt;Happy New Year! Bước sang năm mới nhưng m&amp;ugrave;a sale cho kỳ nghỉ lễ vẫn c&amp;ograve;n đang tiếp diễn. V&amp;agrave; đặc biệt trong th&amp;aacute;ng 1 năm 2022 n&amp;agrave;y sẽ c&amp;oacute; rất nhiều tựa game mới v&amp;ocirc; c&amp;ugrave;ng hấp dẫn tr&amp;igrave;nh l&amp;agrave;ng, rất đ&amp;aacute;ng để bạn chốt đơn đấy. Đến hẹn lại l&amp;ecirc;n, chuy&amp;ecirc;n mục giới thiệu những tựa game đ&amp;aacute;ng mua trong th&amp;aacute;ng đầu ti&amp;ecirc;n năm mới của&amp;nbsp;&lt;a style=\&quot;box-sizing: border-box; background-color: transparent; color: #146678; text-decoration-line: none; touch-action: manipulation; display: inline-block; font-weight: 600;\&quot; href=\&quot;https://www.youtube.com/c/saygame?sub_confirmation=1\&quot;&quot;,
            &quot;desc&quot;: &quot;Happy New Year! Bước sang năm mới nhưng m&ugrave;a sale cho kỳ nghỉ lễ vẫn c&ograve;n đang tiếp diễn. V&agrave; đặc biệt trong th&aacute;ng 1 năm 2022 n&agrave;y sẽ c&oacute; rất nhiều tựa game mới v&ocirc; c&ugrave;ng hấp dẫn tr&igrave;nh l&agrave;ng, rất đ&aacute;ng để bạn chốt đơn đấy. Đến hẹn lại l&ecirc;n, chuy&ecirc;n mục giới thi..&quot;,
            &quot;img&quot;: &quot;admin/images/blogs/tin-moi/main/nhung-tua-game-dang-choi-thang-1-2022-0-356x200w.jpg&quot;,
            &quot;cat_id&quot;: 2,
            &quot;cat_sub_id&quot;: null,
            &quot;users_id&quot;: 1,
            &quot;views&quot;: 0,
            &quot;author&quot;: &quot;2NITE&quot;,
            &quot;active&quot;: 1,
            &quot;created_at&quot;: &quot;2022-01-05T07:34:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-22T18:27:56.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-blogs-blog--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-blogs-blog--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-blogs-blog--id-"></code></pre>
</span>
<span id="execution-error-GETapi-blogs-blog--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-blogs-blog--id-"></code></pre>
</span>
<form id="form-GETapi-blogs-blog--id-" data-method="GET"
      data-path="api/blogs/blog/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-blogs-blog--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-blogs-blog--id-"
                    onclick="tryItOut('GETapi-blogs-blog--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-blogs-blog--id-"
                    onclick="cancelTryOut('GETapi-blogs-blog--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-blogs-blog--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/blogs/blog/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="GETapi-blogs-blog--id-"
               value="corporis"
               data-component="url" hidden>
    <br>
<p>The ID of the blog.</p>
            </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>token_api</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token_api"
               data-endpoint="GETapi-blogs-blog--id-"
               value="19aIotXOerK"
               data-component="query" hidden>
    <br>

            </p>
                </form>

            <h2 id="blog-api-GETapi-blogs-search_blog">Search Blogs.</h2>

<p>
</p>

<p>API này cho phép bạn tìm kiếm bài viết theo từ khoá.</p>

<span id="example-requests-GETapi-blogs-search_blog">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/nava/public/api/blogs/search_blog?token_api=19aIotXOerK&amp;kw=Sony+c%C3%B4ng+b%E1%BB%91+PlayStation+VR+2+4K+HDR+v%C3%A0+game+Horizon+Call+of+the+Mountain+m%E1%BB%9Bi&amp;per_page=10&amp;page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"kw\": \"velit\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/blogs/search_blog"
);

const params = {
    "token_api": "19aIotXOerK",
    "kw": "Sony công bố PlayStation VR 2 4K HDR và game Horizon Call of the Mountain mới",
    "per_page": "10",
    "page": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "kw": "velit"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-blogs-search_blog">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;blogs&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;Sony c&ocirc;ng bố PlayStation VR 2 4K HDR v&agrave; game Horizon Call of the Mountain mới&quot;,
            &quot;slug&quot;: &quot;sony-cong-bo-playstation-vr-2-4k-hdr-va-game-horizon-call-of-the-mountain-moi&quot;,
            &quot;content&quot;: &quot;&lt;p&gt;&lt;img style=\&quot;box-sizing: border-box; border: 0px; vertical-align: middle; max-width: 100%; height: auto; align-self: flex-start; cursor: pointer; display: block; color: #333333; font-family: 'Nunito Sans'; font-size: 15px; background-color: #ffffff; margin: 15px auto !important;\&quot; src=\&quot;https://game.haloshop.vn/image/catalog/blogs/psvr-2/psvr-2-cung-cac-cong-nghe-moi-1.jpg\&quot; alt=\&quot;Sony c&amp;ocirc;ng bố PlayStation VR 2 v&amp;agrave; game Horizon Call of the Mountain mới\&quot; /&gt;&lt;/p&gt;\r\n&lt;h4 style=\&quot;box-sizing: border-box; font-family: Montserrat; line-height: 1.1; color: #146678; margin: 10px 0px; font-size: 18px; text-transform: uppercase; background-color: #ffffff;\&quot;&gt;C&amp;Ocirc;NG NGHỆ MỚI NHẤT&lt;/h4&gt;\r\n&lt;p style=\&quot;box-sizing: border-box; margin: 10px 0px; text-align: justify; padding: 0px 15px; color: #333333; font-family: 'Nunito Sans'; font-size: 15px; background-color: #ffffff; line-height: 25px !important;\&quot;&gt;Sony cũng giới thiệu về những c&amp;ocirc;ng nghệ mới nhất được trang bị tr&amp;ecirc;n cặp k&amp;iacute;nh PS VR 2 mới nhất n&amp;agrave;y.&lt;/p&gt;\r\n&lt;p style=\&quot;box-sizing: border-box; margin: 10px 0px; text-align: justify; padding: 0px 15px; color: #333333; font-family: 'Nunito Sans'; font-size: 15px; background-color: #ffffff; line-height: 25px !important;\&quot;&gt;&lt;span style=\&quot;box-sizing: border-box; font-weight: bold;\&quot;&gt;H&amp;igrave;nh ảnh ch&amp;acirc;n thực:&lt;/span&gt;&amp;nbsp;Để c&amp;oacute; trải nghiệm tốt nhất PSVR 2 cung cấp 4K HDR, phạm vi quan s&amp;aacute;t (Field of View) khoảng 110 độ. Với m&amp;agrave;n h&amp;igrave;nh OLED từ Samsung độ ph&amp;acirc;n giải 2000 x 2040 pixels cho mỗi bảng mắt v&amp;agrave; tần số qu&amp;eacute;t 90 / 120Hz.&lt;/p&gt;\r\n&lt;p style=\&quot;box-sizing: border-box;&quot;,
            &quot;img&quot;: &quot;admin/images/blogs/tin-moi/main/psvr-2-cung-cac-cong-nghe-moi-0-356x200w.jpg&quot;,
            &quot;cat_id&quot;: 2,
            &quot;cat_sub_id&quot;: 6,
            &quot;users_id&quot;: 1,
            &quot;views&quot;: 0,
            &quot;author&quot;: &quot;2NITE&quot;,
            &quot;active&quot;: 1,
            &quot;created_at&quot;: &quot;2022-01-05T07:25:03.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-22T18:27:56.000000Z&quot;
        }
    ],
    &quot;number_page&quot;: 1,
    &quot;count&quot;: 1,
    &quot;per_page&quot;: &quot;10&quot;,
    &quot;page&quot;: &quot;1&quot;,
    &quot;keyword&quot;: &quot;Sony c&ocirc;ng bố PlayStation VR 2 4K HDR v&agrave; game Horizon Call of the Mountain mới&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-blogs-search_blog" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-blogs-search_blog"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-blogs-search_blog"></code></pre>
</span>
<span id="execution-error-GETapi-blogs-search_blog" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-blogs-search_blog"></code></pre>
</span>
<form id="form-GETapi-blogs-search_blog" data-method="GET"
      data-path="api/blogs/search_blog"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-blogs-search_blog', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-blogs-search_blog"
                    onclick="tryItOut('GETapi-blogs-search_blog');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-blogs-search_blog"
                    onclick="cancelTryOut('GETapi-blogs-search_blog');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-blogs-search_blog" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/blogs/search_blog</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>token_api</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token_api"
               data-endpoint="GETapi-blogs-search_blog"
               value="19aIotXOerK"
               data-component="query" hidden>
    <br>

            </p>
                    <p>
                <b><code>kw</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="kw"
               data-endpoint="GETapi-blogs-search_blog"
               value="Sony công bố PlayStation VR 2 4K HDR và game Horizon Call of the Mountain mới"
               data-component="query" hidden>
    <br>

            </p>
                    <p>
                <b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="per_page"
               data-endpoint="GETapi-blogs-search_blog"
               value="10"
               data-component="query" hidden>
    <br>
<p>Default: 10</p>
            </p>
                    <p>
                <b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="page"
               data-endpoint="GETapi-blogs-search_blog"
               value="1"
               data-component="query" hidden>
    <br>
<p>Default: all</p>
            </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>kw</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="kw"
               data-endpoint="GETapi-blogs-search_blog"
               value="velit"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="blog-api-GETapi-blogs-list">List all blog.</h2>

<p>
</p>

<p>Lấy danh sách bài viết.</p>

<span id="example-requests-GETapi-blogs-list">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/nava/public/api/blogs/list?token_api=19aIotXOerK&amp;category=tin-moi&amp;sort=DESC&amp;key_sort=id&amp;per_page=10&amp;page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/blogs/list"
);

const params = {
    "token_api": "19aIotXOerK",
    "category": "tin-moi",
    "sort": "DESC",
    "key_sort": "id",
    "per_page": "10",
    "page": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-blogs-list">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;category&quot;: &quot;tin-moi&quot;,
    &quot;number_page&quot;: 3,
    &quot;count&quot;: 21,
    &quot;sort&quot;: &quot;DESC&quot;,
    &quot;key_sort&quot;: &quot;id&quot;,
    &quot;per_page&quot;: &quot;10&quot;,
    &quot;page&quot;: &quot;1&quot;,
    &quot;blogs&quot;: [
        {
            &quot;id&quot;: 23,
            &quot;title&quot;: &quot;Những tựa game đ&aacute;ng mong đợi th&aacute;ng 2/2022 - Th&aacute;ng n&agrave;y chơi g&igrave;&quot;,
            &quot;slug&quot;: &quot;nhung-tua-game-dang-mong-doi-thang-22022-thang-nay-choi-gi&quot;,
            &quot;content&quot;: &quot;&lt;p style=\&quot;box-sizing: border-box; margin: 10px 0px; text-align: justify; padding: 0px 15px; color: #333333; font-family: 'Nunito Sans'; font-size: 15px; background-color: #ffffff; line-height: 25px !important;\&quot;&gt;&lt;span style=\&quot;box-sizing: border-box; font-weight: bold;\&quot;&gt;&lt;em style=\&quot;box-sizing: border-box;\&quot;&gt;K&amp;iacute;nh ch&amp;agrave;o năm mới! HaLo v&amp;agrave; Say Game xin gửi những lời ch&amp;uacute;c b&amp;igrave;nh an đến với mọi kh&amp;aacute;n giả đ&amp;atilde; đồng h&amp;agrave;nh c&amp;ugrave;ng HaLo suốt thời gian qua v&amp;agrave; sẽ c&amp;ograve;n ủng hộ trong tương lai về sau.&lt;/em&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=\&quot;box-sizing: border-box; margin: 10px 0px; text-align: justify; padding: 0px 15px; color: #333333; font-family: 'Nunito Sans'; font-size: 15px; background-color: #ffffff; line-height: 25px !important;\&quot;&gt;Những ng&amp;agrave;y nghỉ Tết tuy ngắn nhưng lại l&amp;agrave; cơ hội tốt cho một số bạn c&amp;oacute; thể tăng thu nhập đột biến nhưng cũng sẽ khiến c&amp;aacute;c anh em kh&amp;aacute;c hao hụt kha kh&amp;aacute; số dư. D&amp;ugrave; vậy c&amp;aacute;c bạn cũng đừng qu&amp;ecirc;n c&amp;aacute;c tựa game cực phẩm sẽ l&amp;ecirc;n kệ trong th&amp;aacute;ng 2 n&amp;agrave;y v&amp;agrave; nhanh ch&amp;oacute;ng bổ sung v&amp;agrave;o bộ sưu tập của m&amp;igrave;nh nh&amp;eacute;. V&amp;agrave; đ&amp;acirc;y l&amp;agrave; video Những tựa game Hay th&amp;aacute;ng 2/2022 của&amp;nbsp;&lt;a style=\&quot;box-sizing: border-box; background-color: transparent; color: #146678; text-decoration-line: none; touch-action: manipulation; display: inline-block; font-weight: 600;\&quot;&quot;,
            &quot;desc&quot;: &quot;K&iacute;nh ch&agrave;o năm mới! HaLo v&agrave; Say Game xin gửi những lời ch&uacute;c b&igrave;nh an đến với mọi kh&aacute;n giả đ&atilde; đồng h&agrave;nh c&ugrave;ng HaLo suốt thời gian qua v&agrave; sẽ c&ograve;n ủng hộ trong tương lai về sau. Những ng&agrave;y nghỉ Tết tuy ngắn nhưng lại l&agrave; cơ hội tốt cho một số bạn c&oacute; thể tăng..&quot;,
            &quot;img&quot;: &quot;admin/images/blogs/tin-moi/main/nhung-tua-game-dang-choi-thang-2-2022-0-356x200w.jpeg&quot;,
            &quot;cat_id&quot;: 2,
            &quot;cat_sub_id&quot;: null,
            &quot;users_id&quot;: 1,
            &quot;views&quot;: 0,
            &quot;author&quot;: &quot;2NITE&quot;,
            &quot;active&quot;: 1,
            &quot;created_at&quot;: &quot;2022-02-09T17:27:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-22T18:27:56.000000Z&quot;
        },
        {
            &quot;id&quot;: 20,
            &quot;title&quot;: &quot;C&aacute;c tựa game độc quyền PlayStation đ&aacute;ng chơi nhất tr&ecirc;n PS5/PS4 trong năm 2022&quot;,
            &quot;slug&quot;: &quot;cac-tua-game-doc-quyen-playstation-dang-choi-nhat-tren-ps5ps4-trong-nam-2022&quot;,
            &quot;content&quot;: &quot;&lt;p&gt;&lt;em style=\&quot;box-sizing: border-box; color: #333333; font-family: 'Nunito Sans'; font-size: 15px; background-color: #ffffff;\&quot;&gt;&lt;span style=\&quot;box-sizing: border-box; font-weight: bold;\&quot;&gt;Cuối c&amp;ugrave;ng th&amp;igrave; ch&amp;uacute;ng ta cũng đ&amp;atilde; bước sang năm 2022, ng&amp;agrave;y ra mắt của những tựa game m&amp;agrave; ai ai cũng đang mong chờ lại gần hơn bao giờ hết, đặc biệt l&amp;agrave; đối với những bạn n&amp;agrave;o đang sở hữu chiếc m&amp;aacute;y game PS4/ PS5. Như ti&amp;ecirc;u đề ng&amp;agrave;y h&amp;ocirc;m nay, ch&amp;uacute;ng m&amp;igrave;nh sẽ tổng hợp lại danh s&amp;aacute;ch c&amp;aacute;c tựa game độc quyền PlayStation sẽ ra mắt trong năm 2022 n&amp;agrave;y nh&amp;eacute;.&lt;/span&gt;&lt;/em&gt;&lt;/p&gt;\r\n&lt;div class=\&quot;related-post\&quot; style=\&quot;box-sizing: border-box; padding-left: 20px; color: #333333; font-family: 'Nunito Sans'; font-size: 15px; background-color: #ffffff;\&quot;&gt;\r\n&lt;ul style=\&quot;box-sizing: border-box; margin: 5px; padding-left: 30px;\&quot;&gt;\r\n&lt;li style=\&quot;box-sizing: border-box; margin: 10px 0px 0px; padding: 0px; text-indent: 15px; line-height: 25px !important; text-align: justify;\&quot;&gt;&lt;a style=\&quot;box-sizing: border-box; background-color: transparent; color: #146678; text-decoration-line: none; touch-action: manipulation; display: inline-block;\&quot; href=\&quot;https://game.haloshop.vn/psn-va-rui-ro-khi-mua-tai-khoan-lau\&quot;&quot;,
            &quot;desc&quot;: &quot;Cuối c&ugrave;ng th&igrave; ch&uacute;ng ta cũng đ&atilde; bước sang năm 2022, ng&agrave;y ra mắt của những tựa game m&agrave; ai ai cũng đang mong chờ lại gần hơn bao giờ hết, đặc biệt l&agrave; đối với những bạn n&agrave;o đang sở hữu chiếc m&aacute;y game PS4/ PS5. Như ti&ecirc;u đề ng&agrave;y h&ocirc;m nay, ch&uacute;ng m&igrave;nh sẽ tổng..&quot;,
            &quot;img&quot;: &quot;admin/images/blogs/tin-moi/main/cac-tua-game-doc-quyen-playstation-dang-choi-nhat-tren-ps5-ps4-trong-nam-2022-0-356x200w.jpg&quot;,
            &quot;cat_id&quot;: 2,
            &quot;cat_sub_id&quot;: 6,
            &quot;users_id&quot;: 1,
            &quot;views&quot;: 0,
            &quot;author&quot;: &quot;2NITE&quot;,
            &quot;active&quot;: 1,
            &quot;created_at&quot;: &quot;2022-01-11T16:01:13.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-22T18:27:56.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-blogs-list" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-blogs-list"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-blogs-list"></code></pre>
</span>
<span id="execution-error-GETapi-blogs-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-blogs-list"></code></pre>
</span>
<form id="form-GETapi-blogs-list" data-method="GET"
      data-path="api/blogs/list"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-blogs-list', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-blogs-list"
                    onclick="tryItOut('GETapi-blogs-list');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-blogs-list"
                    onclick="cancelTryOut('GETapi-blogs-list');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-blogs-list" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/blogs/list</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>token_api</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token_api"
               data-endpoint="GETapi-blogs-list"
               value="19aIotXOerK"
               data-component="query" hidden>
    <br>

            </p>
                    <p>
                <b><code>category</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="category"
               data-endpoint="GETapi-blogs-list"
               value="tin-moi"
               data-component="query" hidden>
    <br>
<p>Slug Danh Mục</p>
            </p>
                    <p>
                <b><code>sort</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="sort"
               data-endpoint="GETapi-blogs-list"
               value="DESC"
               data-component="query" hidden>
    <br>
<p>ASC/DESC Default: DESC</p>
            </p>
                    <p>
                <b><code>key_sort</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="key_sort"
               data-endpoint="GETapi-blogs-list"
               value="id"
               data-component="query" hidden>
    <br>
<p>Default: id</p>
            </p>
                    <p>
                <b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="per_page"
               data-endpoint="GETapi-blogs-list"
               value="10"
               data-component="query" hidden>
    <br>
<p>Default: 10</p>
            </p>
                    <p>
                <b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="page"
               data-endpoint="GETapi-blogs-list"
               value="1"
               data-component="query" hidden>
    <br>
<p>Default: all</p>
            </p>
                </form>

        <h1 id="blog-categories">Blog Categories</h1>

    

            <h2 id="blog-categories-GETapi-blogs-categories-properties">Blog category properties.</h2>

<p>
</p>

<p>Các thuộc tính của danh mục bài viết.</p>

<span id="example-requests-GETapi-blogs-categories-properties">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/nava/public/api/blogs/categories/properties" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"aliquid\",
    \"slug\": \"ipsa\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/blogs/categories/properties"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "aliquid",
    "slug": "ipsa"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-blogs-categories-properties">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{&quot;Danh s&aacute;ch thuộc t&iacute;nh của bảng danh mục b&agrave;i viết&quot;}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-blogs-categories-properties" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-blogs-categories-properties"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-blogs-categories-properties"></code></pre>
</span>
<span id="execution-error-GETapi-blogs-categories-properties" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-blogs-categories-properties"></code></pre>
</span>
<form id="form-GETapi-blogs-categories-properties" data-method="GET"
      data-path="api/blogs/categories/properties"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-blogs-categories-properties', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-blogs-categories-properties"
                    onclick="tryItOut('GETapi-blogs-categories-properties');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-blogs-categories-properties"
                    onclick="cancelTryOut('GETapi-blogs-categories-properties');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-blogs-categories-properties" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/blogs/categories/properties</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="name"
               data-endpoint="GETapi-blogs-categories-properties"
               value="aliquid"
               data-component="body" hidden>
    <br>
<p>Tiêu đề danh mục</p>
        </p>
                <p>
            <b><code>slug</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="slug"
               data-endpoint="GETapi-blogs-categories-properties"
               value="ipsa"
               data-component="body" hidden>
    <br>
<p>Slug danh mục</p>
        </p>
        </form>

            <h2 id="blog-categories-GETapi-blogs-categories-list_all">List all blog categories.</h2>

<p>
</p>

<p>Danh mục bài viết.</p>

<span id="example-requests-GETapi-blogs-categories-list_all">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/nava/public/api/blogs/categories/list_all?token_api=19aIotXmkjH" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/blogs/categories/list_all"
);

const params = {
    "token_api": "19aIotXmkjH",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-blogs-categories-list_all">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;categories&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Sửa chữa&quot;,
            &quot;slug&quot;: &quot;sua-chua&quot;,
            &quot;created_at&quot;: &quot;2022-01-05T06:05:29.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-01-05T06:05:29.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Tin mới&quot;,
            &quot;slug&quot;: &quot;tin-moi&quot;,
            &quot;created_at&quot;: &quot;2022-01-05T06:06:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-01-05T06:06:33.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Đập Hộp - Review&quot;,
            &quot;slug&quot;: &quot;dap-hop-review&quot;,
            &quot;created_at&quot;: &quot;2022-01-05T06:06:43.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-01-05T06:06:43.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Hướng Dẫn - Thủ Thuật&quot;,
            &quot;slug&quot;: &quot;huong-dan-thu-thuat&quot;,
            &quot;created_at&quot;: &quot;2022-01-05T06:06:49.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-01-05T06:06:49.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-blogs-categories-list_all" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-blogs-categories-list_all"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-blogs-categories-list_all"></code></pre>
</span>
<span id="execution-error-GETapi-blogs-categories-list_all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-blogs-categories-list_all"></code></pre>
</span>
<form id="form-GETapi-blogs-categories-list_all" data-method="GET"
      data-path="api/blogs/categories/list_all"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-blogs-categories-list_all', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-blogs-categories-list_all"
                    onclick="tryItOut('GETapi-blogs-categories-list_all');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-blogs-categories-list_all"
                    onclick="cancelTryOut('GETapi-blogs-categories-list_all');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-blogs-categories-list_all" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/blogs/categories/list_all</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>token_api</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token_api"
               data-endpoint="GETapi-blogs-categories-list_all"
               value="19aIotXmkjH"
               data-component="query" hidden>
    <br>

            </p>
                </form>

        <h1 id="products-api">PRODUCTS API</h1>

    

            <h2 id="products-api-GETapi-products-product--id-">Retrieve a product.</h2>

<p>
</p>

<p>API này cho phép bạn truy xuất và xem một sản phẩm cụ thể bằng ID</p>

<span id="example-requests-GETapi-products-product--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/nava/public/api/products/product/et?token_api=19aIotXOerK" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/products/product/et"
);

const params = {
    "token_api": "19aIotXOerK",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products-product--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;product&quot;: {
        &quot;id&quot;: 40,
        &quot;name&quot;: &quot;PlayStation 5 / PS5 Standard Edition - VN [ CFI-1118A 01 ]&quot;,
        &quot;slug&quot;: &quot;playstation-5-ps5-standard-edition-vn-cfi-1118a-01&quot;,
        &quot;des&quot;: &quot;Về thiết kế PS5 sở hữu thiết kế rất mềm mại với những đường cong ấn tượng, kh&ocirc;ng vu&ocirc;ng vức \&quot;đậm chất Sony\&quot; như PS4, hay Sony Xperia...bắt mắt với t&ocirc;ng m&agrave;u trắng chủ đạo kết hợp m&agrave;u đen b&ecirc;n trong th&acirc;n m&aacute;y c&ugrave;ng đ&egrave;n LED xanh dương mang lại cảm gi&aacute;c đ&acirc;y ch&iacute;nh l&agrave; thiết kế của tương lai. Vỏ ngo&agrave;i PS5 ..&quot;,
        &quot;keywords&quot;: &quot;sony, sony playstation, playstation 5, ps5, may choi game ps5&quot;,
        &quot;price&quot;: 20800000,
        &quot;historical_cost&quot;: 17500000,
        &quot;content&quot;: &quot;&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&lt;iframe style=\&quot;box-sizing: border-box; max-width: 100%; border-width: initial; border-style: none; display: block; color: #333333; font-family: 'Nunito Sans'; font-size: 15px; background-color: #ffffff; margin: 15px auto !important;\&quot; src=\&quot;https://www.youtube.com/embed/xUJplfTW8XQ\&quot; width=\&quot;700\&quot; height=\&quot;394\&quot; frameborder=\&quot;0\&quot; allowfullscreen=\&quot;allowfullscreen\&quot;&gt;&lt;/iframe&gt;&lt;/p&gt;\r\n&lt;h4 style=\&quot;box-sizing: border-box; font-family: Montserrat; line-height: 1.1; color: #146678; margin: 10px 0px; font-size: 18px; text-transform: uppercase; background-color: #ffffff;\&quot;&gt;VỀ THIẾT KẾ&lt;/h4&gt;\r\n&lt;p style=\&quot;box-sizing: border-box; margin: 10px 0px 15px; text-align: justify; padding: 0px 15px; line-height: 14px; color: #333333; font-family: 'Nunito Sans'; font-size: 15px; background-color: #ffffff;\&quot;&gt;&lt;a style=\&quot;box-sizing: border-box; background-color: transparent; color: #146678; text-decoration-line: none; touch-action: manipulation; display: inline-block;\&quot; href=\&quot;https://game.haloshop.vn/index.php?route=product/search&amp;amp;search=playstation%205&amp;amp;category_id=668\&quot;&gt;PS5&lt;/a&gt;&amp;nbsp;sở hữu thiết kế rất mềm mại với những đường cong ấn tượng, kh&amp;ocirc;ng vu&amp;ocirc;ng vức \&quot;đậm chất Sony\&quot; như PS4, hay Sony Xperia...bắt mắt với t&amp;ocirc;ng m&amp;agrave;u trắng chủ đạo kết hợp m&amp;agrave;u đen b&amp;ecirc;n trong th&amp;acirc;n m&amp;aacute;y c&amp;ugrave;ng đ&amp;egrave;n LED xanh dương mang lại cảm gi&amp;aacute;c đ&amp;acirc;y ch&amp;iacute;nh l&amp;agrave; thiết kế của tương lai.&quot;,
        &quot;insurance&quot;: &quot;7,8&quot;,
        &quot;policy&quot;: &quot;9,18,21&quot;,
        &quot;model&quot;: &quot;14720&quot;,
        &quot;video&quot;: &quot;&lt;iframe width=\&quot;310\&quot; height=\&quot;200\&quot; src=\&quot;https://www.youtube.com/embed/z7xQitZX0uw\&quot; title=\&quot;YouTube video player\&quot; frameborder=\&quot;0\&quot; allow=\&quot;accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\&quot; allowfullscreen&gt;&lt;/iframe&gt;&quot;,
        &quot;banner&quot;: &quot;admin/images/products/playstation-5/banner/len-doi-ps5-new-product-banner-630x239(4).jpg&quot;,
        &quot;banner_link&quot;: &quot;thong-tin/len-doi-ps5-tiet-kiem-den-6-trieu&quot;,
        &quot;main_img&quot;: &quot;admin/images/products/playstation-5/main/ps5-standard-vn-00-305x305.jpg&quot;,
        &quot;sub_img&quot;: &quot;admin/images/products/playstation-5/sub/ps5-40-305x305.jpg&quot;,
        &quot;bg&quot;: null,
        &quot;type&quot;: &quot;machine&quot;,
        &quot;sub_type&quot;: null,
        &quot;cat_id&quot;: 77,
        &quot;cat_name&quot;: &quot;PlayStation 5&quot;,
        &quot;cat_2_id&quot;: 0,
        &quot;cat_2_sub&quot;: 0,
        &quot;sub_1_cat_id&quot;: 79,
        &quot;sub_1_cat_name&quot;: &quot;M&aacute;y PS5&quot;,
        &quot;sub_2_cat_id&quot;: null,
        &quot;sub_2_cat_name&quot;: null,
        &quot;op_sub_1_id&quot;: null,
        &quot;op_sub_1_name&quot;: null,
        &quot;op_sub_2_id&quot;: null,
        &quot;op_sub_2_name&quot;: null,
        &quot;producer_id&quot;: 3,
        &quot;producer_slug&quot;: &quot;sony-playstation-world&quot;,
        &quot;cat_game_id&quot;: null,
        &quot;option_color&quot;: null,
        &quot;option&quot;: null,
        &quot;stock&quot;: 1,
        &quot;new&quot;: 2,
        &quot;usage_stt&quot;: 1,
        &quot;num_orders&quot;: 0,
        &quot;highlight&quot;: 1,
        &quot;author&quot;: &quot;2NITE&quot;,
        &quot;author_id&quot;: 1,
        &quot;created_at&quot;: &quot;2021-11-24T10:37:49.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-03-22T18:27:56.000000Z&quot;
    },
    &quot;policies&quot;: {
        &quot;0&quot;: {
            &quot;id&quot;: 9,
            &quot;title&quot;: &quot;THANH TO&Aacute;N &amp; TRẢ G&Oacute;P&quot;,
            &quot;content&quot;: &quot;&lt;p&gt;Miễn ph&amp;iacute; thanh to&amp;aacute;n thẻ ATM.&lt;br /&gt;Thanh to&amp;aacute;n thẻ Visa, Master +2%.&lt;br /&gt;Trả G&amp;oacute;p: Trả trước 10% + CMND + Hộ khẩu / Bằng l&amp;aacute;i (&lt;a href=\&quot;https://game.haloshop.vn/dich-vu-tra-gop-tai-haloshop\&quot; target=\&quot;_blank\&quot; rel=\&quot;noopener\&quot;&gt;Xem chi tiết&lt;/a&gt;)&lt;br /&gt;Trả G&amp;oacute;p: D&amp;ugrave;ng thẻ t&amp;iacute;n dụng l&amp;atilde;i suất 0% (&lt;a href=\&quot;https://game.haloshop.vn/dich-vu-tra-gop-tai-haloshop#2\&quot; target=\&quot;_blank\&quot; rel=\&quot;noopener\&quot;&gt;Xem chi tiết&lt;/a&gt;)&lt;/p&gt;&quot;,
            &quot;icon&quot;: &quot;&lt;i class=\&quot;fas fa-shield-alt\&quot;&gt;&lt;/i&gt;&quot;,
            &quot;position&quot;: 3,
            &quot;fullset&quot;: 0,
            &quot;created_at&quot;: &quot;2021-10-23T12:44:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2021-10-23T12:44:18.000000Z&quot;
        },
        &quot;1&quot;: {
            &quot;id&quot;: 18,
            &quot;title&quot;: &quot;BẢO H&Agrave;NH&quot;,
            &quot;content&quot;: &quot;&lt;p&gt;Bảo h&amp;agrave;nh ch&amp;iacute;nh h&amp;atilde;ng 12 th&amp;aacute;ng&lt;/p&gt;&quot;,
            &quot;icon&quot;: &quot;&lt;i class=\&quot;fas fa-shield-alt\&quot;&gt;&lt;/i&gt;&quot;,
            &quot;position&quot;: 0,
            &quot;fullset&quot;: 0,
            &quot;created_at&quot;: &quot;2021-10-28T10:22:28.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2021-10-28T10:22:28.000000Z&quot;
        },
        &quot;2&quot;: {
            &quot;id&quot;: 21,
            &quot;title&quot;: &quot;G&Oacute;I BẢO H&Agrave;NH 7 NG&Agrave;Y&quot;,
            &quot;content&quot;: &quot;&lt;p&gt;&amp;Aacute;p dụng b&amp;aacute;n tại cửa h&amp;agrave;ng hoặc giao h&amp;agrave;ng t&amp;iacute;nh ph&amp;iacute;&lt;/p&gt;&quot;,
            &quot;icon&quot;: &quot;&lt;i class=\&quot;fas fa-exclamation-circle\&quot;&gt;&lt;/i&gt;&quot;,
            &quot;position&quot;: 0,
            &quot;fullset&quot;: 0,
            &quot;created_at&quot;: &quot;2021-10-29T14:36:40.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2021-10-29T14:36:40.000000Z&quot;
        }
    },
    &quot;fullset&quot;: 0,
    &quot;related_blog&quot;: [],
    &quot;banner&quot;: {
        &quot;id&quot;: 238,
        &quot;link&quot;: &quot;admin/images/products/playstation-5/images_700x700/ps5-0-standard-vn-00-700x700.jpg&quot;,
        &quot;products_id&quot;: 40,
        &quot;size&quot;: 700,
        &quot;index&quot;: 1,
        &quot;created_at&quot;: &quot;2021-11-24T10:37:49.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-11-24T10:37:49.000000Z&quot;
    },
    &quot;group&quot;: 1,
    &quot;related_product&quot;: [],
    &quot;related_cat_blog&quot;: [
        {
            &quot;id&quot;: 14,
            &quot;posts&quot;: &quot;4&quot;,
            &quot;product_id&quot;: null,
            &quot;cat_id&quot;: 79,
            &quot;for&quot;: &quot;category&quot;,
            &quot;created_at&quot;: &quot;2022-03-15T07:17:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-15T07:17:10.000000Z&quot;
        },
        {
            &quot;id&quot;: 12,
            &quot;posts&quot;: &quot;22&quot;,
            &quot;product_id&quot;: null,
            &quot;cat_id&quot;: 79,
            &quot;for&quot;: &quot;category&quot;,
            &quot;created_at&quot;: &quot;2022-03-15T07:17:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-15T07:17:10.000000Z&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;posts&quot;: &quot;21&quot;,
            &quot;product_id&quot;: null,
            &quot;cat_id&quot;: 79,
            &quot;for&quot;: &quot;category&quot;,
            &quot;created_at&quot;: &quot;2022-03-15T07:17:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-15T07:17:10.000000Z&quot;
        },
        {
            &quot;id&quot;: 13,
            &quot;posts&quot;: &quot;20&quot;,
            &quot;product_id&quot;: null,
            &quot;cat_id&quot;: 79,
            &quot;for&quot;: &quot;category&quot;,
            &quot;created_at&quot;: &quot;2022-03-15T07:17:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-15T07:17:10.000000Z&quot;
        }
    ],
    &quot;bundled_skin&quot;: {
        &quot;id&quot;: 2,
        &quot;skin_cat_id&quot;: 86,
        &quot;cat_id&quot;: 79,
        &quot;created_at&quot;: &quot;2022-03-15T06:49:28.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-03-15T07:17:10.000000Z&quot;
    },
    &quot;bundled_accessory&quot;: [
        {
            &quot;id&quot;: 4,
            &quot;products_id&quot;: 30,
            &quot;cat_id&quot;: 79,
            &quot;created_at&quot;: &quot;2022-03-15T06:32:29.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-15T06:32:29.000000Z&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;products_id&quot;: 31,
            &quot;cat_id&quot;: 79,
            &quot;created_at&quot;: &quot;2022-03-15T06:32:29.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-15T06:32:29.000000Z&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;products_id&quot;: 32,
            &quot;cat_id&quot;: 79,
            &quot;created_at&quot;: &quot;2022-03-15T06:32:29.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-15T06:32:29.000000Z&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;products_id&quot;: 33,
            &quot;cat_id&quot;: 79,
            &quot;created_at&quot;: &quot;2022-03-15T06:32:29.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-15T06:32:29.000000Z&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;products_id&quot;: 34,
            &quot;cat_id&quot;: 79,
            &quot;created_at&quot;: &quot;2022-03-15T06:32:29.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-15T06:32:29.000000Z&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;products_id&quot;: 35,
            &quot;cat_id&quot;: 79,
            &quot;created_at&quot;: &quot;2022-03-15T06:32:29.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-15T06:32:29.000000Z&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;products_id&quot;: 45,
            &quot;cat_id&quot;: 79,
            &quot;created_at&quot;: &quot;2022-03-15T06:32:29.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-15T06:32:29.000000Z&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;products_id&quot;: 46,
            &quot;cat_id&quot;: 79,
            &quot;created_at&quot;: &quot;2022-03-15T06:32:29.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-15T06:32:29.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products-product--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products-product--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-product--id-"></code></pre>
</span>
<span id="execution-error-GETapi-products-product--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-product--id-"></code></pre>
</span>
<form id="form-GETapi-products-product--id-" data-method="GET"
      data-path="api/products/product/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products-product--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products-product--id-"
                    onclick="tryItOut('GETapi-products-product--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products-product--id-"
                    onclick="cancelTryOut('GETapi-products-product--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products-product--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/product/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="GETapi-products-product--id-"
               value="et"
               data-component="url" hidden>
    <br>
<p>The ID of the product.</p>
            </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>token_api</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token_api"
               data-endpoint="GETapi-products-product--id-"
               value="19aIotXOerK"
               data-component="query" hidden>
    <br>

            </p>
                </form>

            <h2 id="products-api-GETapi-products-search_product">Search Products.</h2>

<p>
</p>

<p>API này cho phép bạn tìm kiếm sản phẩm theo từ khoá.</p>

<span id="example-requests-GETapi-products-search_product">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/nava/public/api/products/search_product?token_api=19aIotXOerK&amp;kw=DualSense+-+PS5+Wireless+Game+Controller+Ch%C3%ADnh+H%C3%A3ng&amp;per_page=10&amp;page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"kw\": \"minima\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/products/search_product"
);

const params = {
    "token_api": "19aIotXOerK",
    "kw": "DualSense - PS5 Wireless Game Controller Chính Hãng",
    "per_page": "10",
    "page": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "kw": "minima"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products-search_product">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;products&quot;: [
        {
            &quot;id&quot;: 30,
            &quot;name&quot;: &quot;DualSense - PS5 Wireless Game Controller Ch&iacute;nh H&atilde;ng&quot;,
            &quot;slug&quot;: &quot;dualsense-ps5-wireless-game-controller-chinh-hang&quot;,
            &quot;des&quot;: &quot;Kh&aacute;c với mọi năm, thay v&igrave; lấy t&ecirc;n DualShock như 4 đời console trước đ&oacute;, Sony đ&atilde; chọn c&aacute;i t&ecirc;n DualSense để b&agrave;y tỏ về những c&ocirc;ng nghệ mới đặc biệt được t&iacute;ch hợp tr&ecirc;n tay cầm PlayStation 5 - cỗ m&aacute;y next-gen năm nay. Hướng dẫn kết nối tay cầm DualSense với thiết bị kh&aacute;c Hướng dẫn vệ sinh tay cầm D..&quot;,
            &quot;keywords&quot;: &quot;sony, sony playstation, playstation 5, ps5, tay cam ps5, dualshock 5, dualsense, tay cam playstation 5, dualsense chinh hang&quot;,
            &quot;price&quot;: 1980000,
            &quot;historical_cost&quot;: 1100000,
            &quot;content&quot;: &quot;&lt;p style=\&quot;box-sizing: border-box; margin: 10px 0px 15px; text-align: justify; padding: 0px 15px; line-height: 14px; font-family: 'Nunito Sans'; font-size: 15px; background-color: #ffffff; color: red;\&quot;&gt;&lt;span style=\&quot;box-sizing: border-box; font-weight: bold;\&quot;&gt;Sản phẩm được ph&amp;acirc;n phối ch&amp;iacute;nh h&amp;atilde;ng Sony PlayStation VN, bảo h&amp;agrave;nh ch&amp;iacute;nh h&amp;atilde;ng 12 th&amp;aacute;ng.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=\&quot;box-sizing: border-box; margin: 10px 0px 15px; text-align: justify; padding: 0px 15px; line-height: 14px; color: #333333; font-family: 'Nunito Sans'; font-size: 15px; background-color: #ffffff;\&quot;&gt;Kh&amp;aacute;c với mọi năm, thay v&amp;igrave; lấy t&amp;ecirc;n DualShock như 4 đời console trước đ&amp;oacute;, Sony đ&amp;atilde; chọn c&amp;aacute;i t&amp;ecirc;n&amp;nbsp;&lt;a style=\&quot;box-sizing: border-box; background-color: transparent; color: #146678; text-decoration-line: none; touch-action: manipulation; display: inline-block;\&quot; href=\&quot;https://game.haloshop.vn/dualsense-wireless-controller\&quot;&gt;DualSense&lt;/a&gt;&amp;nbsp;để b&amp;agrave;y tỏ về những c&amp;ocirc;ng nghệ mới đặc biệt được t&amp;iacute;ch hợp tr&amp;ecirc;n tay cầm&amp;nbsp;&lt;a style=\&quot;box-sizing: border-box; background-color: transparent; color: #146678; text-decoration-line: none; touch-action: manipulation; display: inline-block;\&quot; href=\&quot;https://game.haloshop.vn/may-ps5\&quot;&gt;PlayStation 5&lt;/a&gt;&amp;nbsp;- cỗ m&amp;aacute;y next-gen năm nay.&quot;,
            &quot;info&quot;: null,
            &quot;insurance&quot;: null,
            &quot;policy&quot;: &quot;8,9,18&quot;,
            &quot;model&quot;: &quot;15118&quot;,
            &quot;video&quot;: &quot;&lt;iframe width=\&quot;630\&quot; height=\&quot;354\&quot; src=\&quot;https://www.youtube.com/embed/I11b1xpjDdI\&quot; title=\&quot;YouTube video player\&quot; frameborder=\&quot;0\&quot; allow=\&quot;accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\&quot; allowfullscreen&gt;&lt;/iframe&gt;&quot;,
            &quot;banner&quot;: null,
            &quot;banner_link&quot;: null,
            &quot;main_img&quot;: &quot;admin/images/products/playstation-5/main/dualsense-ps5-00-305x305.jpg&quot;,
            &quot;sub_img&quot;: &quot;admin/images/products/playstation-5/sub/dualsense-ps5-41-305x305w.jpg&quot;,
            &quot;bg&quot;: null,
            &quot;type&quot;: &quot;access&quot;,
            &quot;sub_type&quot;: &quot;controller&quot;,
            &quot;cat_id&quot;: 77,
            &quot;cat_name&quot;: &quot;PlayStation 5&quot;,
            &quot;cat_2_id&quot;: 0,
            &quot;cat_2_sub&quot;: 0,
            &quot;sub_1_cat_id&quot;: 82,
            &quot;sub_1_cat_name&quot;: &quot;Phụ kiện PS5&quot;,
            &quot;sub_2_cat_id&quot;: null,
            &quot;sub_2_cat_name&quot;: null,
            &quot;op_sub_1_id&quot;: null,
            &quot;op_sub_1_name&quot;: null,
            &quot;op_sub_2_id&quot;: null,
            &quot;op_sub_2_name&quot;: null,
            &quot;producer_id&quot;: 3,
            &quot;producer_slug&quot;: &quot;sony-playstation-world&quot;,
            &quot;cat_game_id&quot;: null,
            &quot;option_color&quot;: null,
            &quot;option&quot;: null,
            &quot;stock&quot;: 3,
            &quot;new&quot;: 1,
            &quot;usage_stt&quot;: 1,
            &quot;num_orders&quot;: 0,
            &quot;highlight&quot;: 1,
            &quot;author&quot;: &quot;2NITE&quot;,
            &quot;author_id&quot;: 1,
            &quot;created_at&quot;: &quot;2021-11-24T09:23:01.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-22T18:27:56.000000Z&quot;
        }
    ],
    &quot;number_page&quot;: 1,
    &quot;count&quot;: 1,
    &quot;per_page&quot;: 10,
    &quot;page&quot;: 1
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products-search_product" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products-search_product"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-search_product"></code></pre>
</span>
<span id="execution-error-GETapi-products-search_product" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-search_product"></code></pre>
</span>
<form id="form-GETapi-products-search_product" data-method="GET"
      data-path="api/products/search_product"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products-search_product', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products-search_product"
                    onclick="tryItOut('GETapi-products-search_product');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products-search_product"
                    onclick="cancelTryOut('GETapi-products-search_product');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products-search_product" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/search_product</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>token_api</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token_api"
               data-endpoint="GETapi-products-search_product"
               value="19aIotXOerK"
               data-component="query" hidden>
    <br>

            </p>
                    <p>
                <b><code>kw</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="kw"
               data-endpoint="GETapi-products-search_product"
               value="DualSense - PS5 Wireless Game Controller Chính Hãng"
               data-component="query" hidden>
    <br>

            </p>
                    <p>
                <b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="per_page"
               data-endpoint="GETapi-products-search_product"
               value="10"
               data-component="query" hidden>
    <br>
<p>Default: 10</p>
            </p>
                    <p>
                <b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="page"
               data-endpoint="GETapi-products-search_product"
               value="1"
               data-component="query" hidden>
    <br>
<p>Default: all</p>
            </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>kw</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="kw"
               data-endpoint="GETapi-products-search_product"
               value="minima"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="products-api-GETapi-products-list">List all products.</h2>

<p>
</p>

<p>Lấy danh sách sản phẩm.</p>

<span id="example-requests-GETapi-products-list">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/nava/public/api/products/list?token_api=19aIotXOerK&amp;category=1&amp;genre=Action%2CAdventure&amp;sort=DESC&amp;key_sort=id&amp;per_page=10&amp;page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/products/list"
);

const params = {
    "token_api": "19aIotXOerK",
    "category": "1",
    "genre": "Action,Adventure",
    "sort": "DESC",
    "key_sort": "id",
    "per_page": "10",
    "page": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products-list">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;category&quot;: &quot;81&quot;,
    &quot;genres&quot;: [
        &quot;Action Adventure&quot;,
        &quot;Action&quot;
    ],
    &quot;number_page&quot;: 1,
    &quot;count&quot;: 6,
    &quot;sort&quot;: &quot;DESC&quot;,
    &quot;key_sort&quot;: &quot;id&quot;,
    &quot;per_page&quot;: &quot;10&quot;,
    &quot;page&quot;: &quot;1&quot;,
    &quot;products&quot;: [
        {
            &quot;id&quot;: 103,
            &quot;name&quot;: &quot;Dying Light 2 Stay Human - US&quot;,
            &quot;slug&quot;: &quot;dying-light-2-stay-human-us&quot;,
            &quot;des&quot;: &quot;Th&ocirc;ng tin game Thể loạiAction Adventure Hệ m&aacute;yPS4, Xbox One/Series, PS5 ESRBMature 17+Violence, blood and gore, sexual content and/or strong language. Ng&agrave;y ph&aacute;t h&agrave;nh4/02/2022 Nh&agrave; sản xuất &amp; ph&aacute;t h&agrave;nhTechland..&quot;,
            &quot;keywords&quot;: null,
            &quot;price&quot;: 1630000,
            &quot;historical_cost&quot;: 1150000,
            &quot;content&quot;: &quot;&lt;table class=\&quot;table table-bordered attribute\&quot; style=\&quot;border-spacing: 0px; border-collapse: inherit; background-color: #ffffff; margin: 20px auto; border-width: 0px 0px 2px; border-style: solid; border-color: transparent transparent #b30000; width: 1098px; max-width: 100%; padding: 10px; color: #333333; font-family: 'Nunito Sans'; font-size: 15px;\&quot;&gt;\r\n&lt;thead style=\&quot;box-sizing: border-box;\&quot;&gt;\r\n&lt;tr style=\&quot;box-sizing: border-box;\&quot;&gt;\r\n&lt;td style=\&quot;box-sizing: border-box; padding: 8px 14px; font-size: 13px; font-weight: bold; text-transform: uppercase; background: #ffe000; border-top: 0px; border-right: 0px solid transparent; border-left: 0px solid transparent; border-bottom-style: solid; border-bottom-color: transparent; line-height: 1.42857; vertical-align: middle;\&quot; colspan=\&quot;2\&quot;&gt;&lt;span style=\&quot;box-sizing: border-box;\&quot;&gt;TH&amp;Ocirc;NG TIN GAME&lt;/span&gt;&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/thead&gt;\r\n&lt;tbody style=\&quot;box-sizing: border-box;\&quot;&gt;\r\n&lt;tr style=\&quot;box-sizing: border-box;\&quot;&gt;\r\n&lt;td style=\&quot;box-sizing: border-box; padding: 8px 14px; border-top: 0px solid transparent; border-right: 0px solid transparent; border-left: 0px solid transparent; border-bottom-style: solid; border-bottom-color: transparent; line-height: 1.42857; vertical-align: middle;\&quot;&gt;Thể loại&lt;/td&gt;\r\n&lt;td style=\&quot;box-sizing: border-box; padding: 8px 14px; border-top: 0px solid transparent; border-right: 0px solid transparent; border-bottom-style: solid; border-left-style: solid; border-bottom-color: transparent; border-left-color:&quot;,
            &quot;insurance&quot;: null,
            &quot;policy&quot;: &quot;4,5,8,9&quot;,
            &quot;model&quot;: &quot;P5G106&quot;,
            &quot;video&quot;: null,
            &quot;banner&quot;: null,
            &quot;banner_link&quot;: null,
            &quot;main_img&quot;: &quot;admin/images/products/playstation-5/main/dying-light-2-stay-human-ps5-305x305h.jpg&quot;,
            &quot;sub_img&quot;: &quot;admin/images/products/playstation-5/sub/dying-light-2-stay-human-41-305x305.jpg&quot;,
            &quot;bg&quot;: null,
            &quot;type&quot;: &quot;game&quot;,
            &quot;sub_type&quot;: null,
            &quot;cat_id&quot;: 77,
            &quot;cat_name&quot;: &quot;PlayStation 5&quot;,
            &quot;cat_2_id&quot;: 0,
            &quot;cat_2_sub&quot;: 0,
            &quot;sub_1_cat_id&quot;: 81,
            &quot;sub_1_cat_name&quot;: &quot;Game PS5&quot;,
            &quot;sub_2_cat_id&quot;: null,
            &quot;sub_2_cat_name&quot;: null,
            &quot;op_sub_1_id&quot;: null,
            &quot;op_sub_1_name&quot;: null,
            &quot;op_sub_2_id&quot;: null,
            &quot;op_sub_2_name&quot;: null,
            &quot;producer_id&quot;: 36,
            &quot;producer_slug&quot;: &quot;techland&quot;,
            &quot;cat_game_id&quot;: &quot;Action Adventure&quot;,
            &quot;option_color&quot;: null,
            &quot;option&quot;: null,
            &quot;stock&quot;: 1,
            &quot;new&quot;: 1,
            &quot;usage_stt&quot;: 1,
            &quot;num_orders&quot;: 0,
            &quot;highlight&quot;: 2,
            &quot;author&quot;: &quot;2NITEE&quot;,
            &quot;author_id&quot;: 1,
            &quot;created_at&quot;: &quot;2022-02-22T18:57:25.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-22T11:12:10.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products-list" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products-list"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-list"></code></pre>
</span>
<span id="execution-error-GETapi-products-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-list"></code></pre>
</span>
<form id="form-GETapi-products-list" data-method="GET"
      data-path="api/products/list"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products-list', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products-list"
                    onclick="tryItOut('GETapi-products-list');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products-list"
                    onclick="cancelTryOut('GETapi-products-list');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products-list" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/list</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>token_api</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token_api"
               data-endpoint="GETapi-products-list"
               value="19aIotXOerK"
               data-component="query" hidden>
    <br>

            </p>
                    <p>
                <b><code>category</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="category"
               data-endpoint="GETapi-products-list"
               value="1"
               data-component="query" hidden>
    <br>
<p>Default: null For All Cate</p>
            </p>
                    <p>
                <b><code>genre</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="genre"
               data-endpoint="GETapi-products-list"
               value="Action,Adventure"
               data-component="query" hidden>
    <br>
<p>Default: null For All Genre Game</p>
            </p>
                    <p>
                <b><code>sort</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="sort"
               data-endpoint="GETapi-products-list"
               value="DESC"
               data-component="query" hidden>
    <br>
<p>ASC/DESC Default: DESC</p>
            </p>
                    <p>
                <b><code>key_sort</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="key_sort"
               data-endpoint="GETapi-products-list"
               value="id"
               data-component="query" hidden>
    <br>
<p>Default: id</p>
            </p>
                    <p>
                <b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="per_page"
               data-endpoint="GETapi-products-list"
               value="10"
               data-component="query" hidden>
    <br>
<p>Default: 10</p>
            </p>
                    <p>
                <b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="page"
               data-endpoint="GETapi-products-list"
               value="1"
               data-component="query" hidden>
    <br>
<p>Default: all</p>
            </p>
                </form>

        <h1 id="product-categories">Product Categories</h1>

    

            <h2 id="product-categories-GETapi-products-categories-properties">Product category properties.</h2>

<p>
</p>

<p>Các thuộc tính của danh mục sản phẩm.</p>

<span id="example-requests-GETapi-products-categories-properties">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/nava/public/api/products/categories/properties" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=suscipit" \
    --form "title=sit" \
    --form "desc=omnis" \
    --form "keywords=similique" \
    --form "parent_id=2" \
    --form "slug=adipisci" \
    --form "icon=dolore" \
    --form "level=3" \
    --form "is_game=11" \
    --form "img=@C:\Users\Admin\AppData\Local\Temp\php9B14.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/products/categories/properties"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'suscipit');
body.append('title', 'sit');
body.append('desc', 'omnis');
body.append('keywords', 'similique');
body.append('parent_id', '2');
body.append('slug', 'adipisci');
body.append('icon', 'dolore');
body.append('level', '3');
body.append('is_game', '11');
body.append('img', document.querySelector('input[name="img"]').files[0]);

fetch(url, {
    method: "GET",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products-categories-properties">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{&quot;Đ&acirc;y l&agrave; tất cả thuộc t&iacute;nh của bảng danh mục sản phẩm&quot;}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products-categories-properties" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products-categories-properties"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-categories-properties"></code></pre>
</span>
<span id="execution-error-GETapi-products-categories-properties" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-categories-properties"></code></pre>
</span>
<form id="form-GETapi-products-categories-properties" data-method="GET"
      data-path="api/products/categories/properties"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products-categories-properties', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products-categories-properties"
                    onclick="tryItOut('GETapi-products-categories-properties');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products-categories-properties"
                    onclick="cancelTryOut('GETapi-products-categories-properties');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products-categories-properties" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/categories/properties</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>varchar(255)</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="name"
               data-endpoint="GETapi-products-categories-properties"
               value="suscipit"
               data-component="body" hidden>
    <br>
<p>Tên danh mục</p>
        </p>
                <p>
            <b><code>title</code></b>&nbsp;&nbsp;<small>mediumtext</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="title"
               data-endpoint="GETapi-products-categories-properties"
               value="sit"
               data-component="body" hidden>
    <br>
<p>Tiêu đề danh mục</p>
        </p>
                <p>
            <b><code>desc</code></b>&nbsp;&nbsp;<small>longtext</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="desc"
               data-endpoint="GETapi-products-categories-properties"
               value="omnis"
               data-component="body" hidden>
    <br>
<p>Mô tả ngắn danh mục</p>
        </p>
                <p>
            <b><code>keywords</code></b>&nbsp;&nbsp;<small>longtext</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="keywords"
               data-endpoint="GETapi-products-categories-properties"
               value="similique"
               data-component="body" hidden>
    <br>
<p>Keywords SEO or Tag danh mục</p>
        </p>
                <p>
            <b><code>parent_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="parent_id"
               data-endpoint="GETapi-products-categories-properties"
               value="2"
               data-component="body" hidden>
    <br>
<p>id danh mục cha (0: là danh mục gốc)</p>
        </p>
                <p>
            <b><code>slug</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="slug"
               data-endpoint="GETapi-products-categories-properties"
               value="adipisci"
               data-component="body" hidden>
    <br>
<p>Slug danh mục</p>
        </p>
                <p>
            <b><code>img</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="img"
               data-endpoint="GETapi-products-categories-properties"
               value=""
               data-component="body" hidden>
    <br>
<p>Hình ảnh danh mục</p>
        </p>
                <p>
            <b><code>icon</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="icon"
               data-endpoint="GETapi-products-categories-properties"
               value="dolore"
               data-component="body" hidden>
    <br>
<p>Icon danh mục</p>
        </p>
                <p>
            <b><code>level</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="level"
               data-endpoint="GETapi-products-categories-properties"
               value="3"
               data-component="body" hidden>
    <br>
<p>Level danh mục (danh mục gốc level = 0)</p>
        </p>
                <p>
            <b><code>is_game</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="is_game"
               data-endpoint="GETapi-products-categories-properties"
               value="11"
               data-component="body" hidden>
    <br>
<p>(2: không là danh mục game , 1: là danh mục game)</p>
        </p>
        </form>

            <h2 id="product-categories-GETapi-products-categories-list_all">List all product categories.</h2>

<p>
</p>

<p>Cây Danh Mục sản phẩm.</p>

<span id="example-requests-GETapi-products-categories-list_all">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/nava/public/api/products/categories/list_all?token_api=19aIotXmkjH" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/products/categories/list_all"
);

const params = {
    "token_api": "19aIotXmkjH",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products-categories-list_all">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;categories&quot;: {
        &quot;0&quot;: {
            &quot;id&quot;: 77,
            &quot;name&quot;: &quot;PlayStation 5&quot;,
            &quot;title&quot;: &quot;PS5 | Kho m&aacute;y, game, phụ kiện PS5 tại 2NITE SHOP&quot;,
            &quot;desc&quot;: &quot;M&aacute;y Chơi Game Playstation 5, PS5 ch&iacute;nh h&atilde;ng, bảo h&agrave;nh 12 th&aacute;ng, tặng qu&agrave; độc quyền, hỗ trợ trả g&oacute;p 0% chỉ c&oacute; tại 2NITE SHOP.&quot;,
            &quot;keywords&quot;: &quot;playstation 5,playstation,sony,sony playstation,ps5&quot;,
            &quot;parent_id&quot;: 0,
            &quot;slug&quot;: &quot;ps5&quot;,
            &quot;img&quot;: &quot;admin/images/category/banner/ps5-tang-binh-nuoc-xiaomi-categories-1280x280.jpg&quot;,
            &quot;icon&quot;: &quot;admin/images/category/icon/ps5-tang-binh-nuoc-xiaomi-categories-1280x280.jpg&quot;,
            &quot;level&quot;: 0,
            &quot;is_game&quot;: 0,
            &quot;created_at&quot;: &quot;2021-11-18T13:31:11.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-15T06:26:32.000000Z&quot;,
            &quot;children&quot;: [
                {
                    &quot;id&quot;: 79,
                    &quot;name&quot;: &quot;M&aacute;y PS5&quot;,
                    &quot;title&quot;: &quot;M&aacute;y PS5 | M&aacute;y Playstation 5 Ch&iacute;nh H&atilde;ng Gi&aacute; Rẻ tại 2NITE SHOP&quot;,
                    &quot;desc&quot;: &quot;M&aacute;y Chơi Game Playstation 5, PS5 ch&iacute;nh h&atilde;ng, bảo h&agrave;nh 12 th&aacute;ng, tặng qu&agrave; độc quyền, hỗ trợ trả g&oacute;p 0% chỉ c&oacute; tại 2NITE SHOP.&quot;,
                    &quot;keywords&quot;: &quot;sony,ps5,playstation 5,may ps5,may playstation 5&quot;,
                    &quot;parent_id&quot;: 77,
                    &quot;slug&quot;: &quot;may-ps5&quot;,
                    &quot;img&quot;: &quot;admin/images/category/banner/ps5-tang-binh-nuoc-xiaomi-categories-1280x280.jpg&quot;,
                    &quot;icon&quot;: null,
                    &quot;level&quot;: 1,
                    &quot;is_game&quot;: 0,
                    &quot;created_at&quot;: &quot;2021-11-18T13:36:43.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-03-15T07:17:10.000000Z&quot;,
                    &quot;children&quot;: []
                },
                {
                    &quot;id&quot;: 80,
                    &quot;name&quot;: &quot;M&aacute;y PS5 USED&quot;,
                    &quot;title&quot;: &quot;M&aacute;y PS5 Cũ | M&aacute;y Playstation 5 Ch&iacute;nh H&atilde;ng Gi&aacute; Rẻ tại 2NITE SHOP&quot;,
                    &quot;desc&quot;: &quot;M&aacute;y Chơi Game PS5, PlayStation đ&atilde; qua sử dụng | Chuy&ecirc;n M&aacute;y Playstation 5 Ch&iacute;nh H&atilde;ng đ&atilde; qua sử dụng tại 2NITE SHOP, Bảo h&agrave;nh to&agrave;n diện, Dịch vụ đẳng cấp.&quot;,
                    &quot;keywords&quot;: &quot;sony,ps5,playstation 5,may ps5,may playstation 5,ps5 cũ,ps5 đ&atilde; qua sử dụng,playstation 5 cũ,ps5 second hand&quot;,
                    &quot;parent_id&quot;: 77,
                    &quot;slug&quot;: &quot;may-ps5-cu&quot;,
                    &quot;img&quot;: null,
                    &quot;icon&quot;: null,
                    &quot;level&quot;: 1,
                    &quot;is_game&quot;: 0,
                    &quot;created_at&quot;: &quot;2021-11-18T13:37:36.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-02-25T16:10:00.000000Z&quot;,
                    &quot;children&quot;: []
                },
                {
                    &quot;id&quot;: 81,
                    &quot;name&quot;: &quot;Game PS5&quot;,
                    &quot;title&quot;: &quot;Đĩa game PS5 | Kho game Playstation 5 | Kho game PS5 gi&aacute; rẻ tại 2NITE SHOP&quot;,
                    &quot;desc&quot;: &quot;Kho game gốc PS5 gi&aacute; rẻ, cập nhật game mới li&ecirc;n tục tại 2NITE SHOP.&quot;,
                    &quot;keywords&quot;: &quot;game ps5, game playstation 5, game ps5 gia re, game playstation 5 gia re, game ps5 gi&aacute; rẻ, game playstation 5 gi&aacute; rẻ&quot;,
                    &quot;parent_id&quot;: 77,
                    &quot;slug&quot;: &quot;game-ps5&quot;,
                    &quot;img&quot;: &quot;admin/images/category/banner/game-ps5-t3-22-categories.jpg&quot;,
                    &quot;icon&quot;: null,
                    &quot;level&quot;: 1,
                    &quot;is_game&quot;: 1,
                    &quot;created_at&quot;: &quot;2021-11-18T13:38:11.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-03-03T16:58:02.000000Z&quot;,
                    &quot;children&quot;: []
                },
                {
                    &quot;id&quot;: 82,
                    &quot;name&quot;: &quot;Phụ kiện PS5&quot;,
                    &quot;title&quot;: &quot;Kho phụ kiện PS5 | Kho phụ kiện Playstation 5 Ch&iacute;nh H&atilde;ng Gi&aacute; Rẻ tại 2NITE SHOP&quot;,
                    &quot;desc&quot;: &quot;Kho phụ kiện Playstation 5 Ch&iacute;nh H&atilde;ng Gi&aacute; Rẻ tại Haloshop&quot;,
                    &quot;keywords&quot;: &quot;phu kien ps5, phu kien playstation 5, phụ kiện ps5, phụ kiện playstation 5&quot;,
                    &quot;parent_id&quot;: 77,
                    &quot;slug&quot;: &quot;phu-kien-ps5&quot;,
                    &quot;img&quot;: null,
                    &quot;icon&quot;: null,
                    &quot;level&quot;: 1,
                    &quot;is_game&quot;: 0,
                    &quot;created_at&quot;: &quot;2021-11-18T13:38:41.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-02-25T16:10:43.000000Z&quot;,
                    &quot;children&quot;: []
                },
                {
                    &quot;id&quot;: 83,
                    &quot;name&quot;: &quot;Ổ cứng gắn trong&quot;,
                    &quot;title&quot;: &quot;Ổ cứng gắn trong | Ổ cứng mở rộng bộ nhớ cho PS5&quot;,
                    &quot;desc&quot;: &quot;Danh mục c&aacute;c sản phẩm ổ cứng mở rộng bộ nhớ chuy&ecirc;n d&ugrave;ng cho PS5, h&agrave;ng ch&iacute;nh h&atilde;ng Samsung, WD,..&quot;,
                    &quot;keywords&quot;: &quot;ssd, ổ cứng ssd, ssd gắn trong, ssd ps5, ssd cho ps5, ssd samsung 980 pro, ssd 1tb cho ps5, ssd 2tb cho ps5&quot;,
                    &quot;parent_id&quot;: 77,
                    &quot;slug&quot;: &quot;o-cung-gan-trong-cho-ps5&quot;,
                    &quot;img&quot;: null,
                    &quot;icon&quot;: null,
                    &quot;level&quot;: 1,
                    &quot;is_game&quot;: 0,
                    &quot;created_at&quot;: &quot;2021-11-18T13:39:11.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-02-25T16:10:57.000000Z&quot;,
                    &quot;children&quot;: []
                },
                {
                    &quot;id&quot;: 84,
                    &quot;name&quot;: &quot;Skin PS5&quot;,
                    &quot;title&quot;: &quot;Skin PS5 | Thay &aacute;o mới tuyệt đẹp cho Console của bạn&quot;,
                    &quot;desc&quot;: &quot;Danh mục c&aacute;c sản phẩm skin PS5, thay &aacute;o mới c&aacute; t&iacute;nh, độc đ&aacute;o cho Console của bạn, 2NITE c&oacute; sẵn c&aacute;c loại skin cho PS5, PS4, Xbox Series, Nintendo Switch...&quot;,
                    &quot;keywords&quot;: &quot;skin ps5, dan skin cho ps5, skin dep cho ps5&quot;,
                    &quot;parent_id&quot;: 77,
                    &quot;slug&quot;: &quot;skin-ps5&quot;,
                    &quot;img&quot;: null,
                    &quot;icon&quot;: null,
                    &quot;level&quot;: 1,
                    &quot;is_game&quot;: 0,
                    &quot;created_at&quot;: &quot;2021-11-18T13:39:36.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-02-25T16:12:03.000000Z&quot;,
                    &quot;children&quot;: [
                        {
                            &quot;id&quot;: 85,
                            &quot;name&quot;: &quot;Skin PS5 Digital&quot;,
                            &quot;title&quot;: &quot;Skin PS5 Digital | Thay &aacute;o mới tuyệt đẹp cho Console của bạn&quot;,
                            &quot;desc&quot;: &quot;Danh mục c&aacute;c sản phẩm skin PS5 Digital, thay &aacute;o mới c&aacute; t&iacute;nh, độc đ&aacute;o cho Console của bạn, 2NITE c&oacute; sẵn c&aacute;c loại skin cho PS5, PS4, Xbox Series, Nintendo Switch...&quot;,
                            &quot;keywords&quot;: &quot;skin ps5 digital, dan skin cho ps5 digital, skin dep cho ps5 digital&quot;,
                            &quot;parent_id&quot;: 84,
                            &quot;slug&quot;: &quot;skin-ps5-digital-dep&quot;,
                            &quot;img&quot;: null,
                            &quot;icon&quot;: null,
                            &quot;level&quot;: 2,
                            &quot;is_game&quot;: 0,
                            &quot;created_at&quot;: &quot;2021-11-18T13:40:05.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2022-02-25T16:12:00.000000Z&quot;,
                            &quot;children&quot;: []
                        },
                        {
                            &quot;id&quot;: 86,
                            &quot;name&quot;: &quot;Skin PS5 Standard&quot;,
                            &quot;title&quot;: &quot;Skin PS5 Standard | Thay &aacute;o mới tuyệt đẹp cho Console của bạn&quot;,
                            &quot;desc&quot;: &quot;Danh mục c&aacute;c sản phẩm skin PS5 Standard, thay &aacute;o mới c&aacute; t&iacute;nh, độc đ&aacute;o cho Console của bạn, 2NITE c&oacute; sẵn c&aacute;c loại skin cho PS5, PS4, Xbox Series, Nintendo Switch...&quot;,
                            &quot;keywords&quot;: &quot;skin ps5 standard, dan skin cho ps5 standard, skin dep cho ps5 standard&quot;,
                            &quot;parent_id&quot;: 84,
                            &quot;slug&quot;: &quot;skin-ps5-standard-dep&quot;,
                            &quot;img&quot;: null,
                            &quot;icon&quot;: null,
                            &quot;level&quot;: 2,
                            &quot;is_game&quot;: 0,
                            &quot;created_at&quot;: &quot;2021-11-18T13:41:12.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2022-02-25T16:11:57.000000Z&quot;,
                            &quot;children&quot;: []
                        }
                    ]
                }
            ]
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products-categories-list_all" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products-categories-list_all"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-categories-list_all"></code></pre>
</span>
<span id="execution-error-GETapi-products-categories-list_all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-categories-list_all"></code></pre>
</span>
<form id="form-GETapi-products-categories-list_all" data-method="GET"
      data-path="api/products/categories/list_all"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products-categories-list_all', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products-categories-list_all"
                    onclick="tryItOut('GETapi-products-categories-list_all');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products-categories-list_all"
                    onclick="cancelTryOut('GETapi-products-categories-list_all');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products-categories-list_all" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/categories/list_all</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>token_api</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token_api"
               data-endpoint="GETapi-products-categories-list_all"
               value="19aIotXmkjH"
               data-component="query" hidden>
    <br>

            </p>
                </form>

            <h2 id="product-categories-GETapi-products-categories-game">List all Game Genre.</h2>

<p>
</p>

<p>Lấy danh sách danh mục game của sản phẩm.</p>

<span id="example-requests-GETapi-products-categories-game">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/nava/public/api/products/categories/game?token_api=19aIotXOerK" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/products/categories/game"
);

const params = {
    "token_api": "19aIotXOerK",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products-categories-game">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;categories_game&quot;: [
        {
            &quot;id&quot;: 16,
            &quot;name&quot;: &quot;Action&quot;,
            &quot;created_at&quot;: &quot;2021-10-22T04:56:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2021-10-22T04:56:10.000000Z&quot;
        },
        {
            &quot;id&quot;: 17,
            &quot;name&quot;: &quot;Action Adventure&quot;,
            &quot;created_at&quot;: &quot;2021-10-22T04:56:29.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2021-10-22T04:56:29.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products-categories-game" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products-categories-game"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-categories-game"></code></pre>
</span>
<span id="execution-error-GETapi-products-categories-game" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-categories-game"></code></pre>
</span>
<form id="form-GETapi-products-categories-game" data-method="GET"
      data-path="api/products/categories/game"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products-categories-game', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products-categories-game"
                    onclick="tryItOut('GETapi-products-categories-game');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products-categories-game"
                    onclick="cancelTryOut('GETapi-products-categories-game');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products-categories-game" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/categories/game</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>token_api</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token_api"
               data-endpoint="GETapi-products-categories-game"
               value="19aIotXOerK"
               data-component="query" hidden>
    <br>

            </p>
                </form>

            <h2 id="product-categories-GETapi-products-categories-producer">List all Producer.</h2>

<p>
</p>

<p>Lấy danh sách nhà sản xuất.</p>

<span id="example-requests-GETapi-products-categories-producer">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/nava/public/api/products/categories/producer?token_api=19aIotXOerK" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/products/categories/producer"
);

const params = {
    "token_api": "19aIotXOerK",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products-categories-producer">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;categories_producer&quot;: [
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Electronic Arts&quot;,
            &quot;slug&quot;: &quot;electronic-arts&quot;,
            &quot;created_at&quot;: &quot;2021-10-22T05:33:35.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2021-10-22T05:33:35.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Sony PlayStation&quot;,
            &quot;slug&quot;: &quot;sony-playstation-world&quot;,
            &quot;created_at&quot;: &quot;2021-10-22T05:34:39.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2021-10-22T05:34:39.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products-categories-producer" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products-categories-producer"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-categories-producer"></code></pre>
</span>
<span id="execution-error-GETapi-products-categories-producer" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-categories-producer"></code></pre>
</span>
<form id="form-GETapi-products-categories-producer" data-method="GET"
      data-path="api/products/categories/producer"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products-categories-producer', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products-categories-producer"
                    onclick="tryItOut('GETapi-products-categories-producer');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products-categories-producer"
                    onclick="cancelTryOut('GETapi-products-categories-producer');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products-categories-producer" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/categories/producer</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>token_api</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token_api"
               data-endpoint="GETapi-products-categories-producer"
               value="19aIotXOerK"
               data-component="query" hidden>
    <br>

            </p>
                </form>

        <h1 id="product-properties">Product Properties</h1>

    

            <h2 id="product-properties-GETapi-products-product_properties">Product properties.</h2>

<p>
</p>

<p>Các thuộc tính của sản phẩm.</p>

<span id="example-requests-GETapi-products-product_properties">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/nava/public/api/products/product_properties" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"velit\",
    \"slug\": \"eveniet\",
    \"des\": \"unde\",
    \"keywords\": \"sed\",
    \"price\": \"quos\",
    \"historical_cost\": \"amet\",
    \"content\": \"molestias\",
    \"info\": \"quis\",
    \"insurance\": \"dolorum\",
    \"policy\": \"in\",
    \"model\": \"cupiditate\",
    \"video\": \"ea\",
    \"banner\": \"aut\",
    \"banner_link\": \"harum\",
    \"main_img\": \"eum\",
    \"sub_img\": \"dolores\",
    \"bg\": \"sit\",
    \"type\": \"vitae\",
    \"sub_type\": \"ipsa\",
    \"cat_id\": \"qui\",
    \"cat_name\": \"soluta\",
    \"sub_1_cat_id\": \"ea\",
    \"sub_1_cat_name\": \"optio\",
    \"sub_2_cat_id\": \"veniam\",
    \"sub_2_cat_name\": \"enim\",
    \"cat_id_2\": \"dolore\",
    \"op_sub_1_id\": \"itaque\",
    \"op_sub_1_name\": \"iste\",
    \"op_sub_2_id\": \"quis\",
    \"op_sub_2_name\": \"fuga\",
    \"cat_2_sub\": \"rerum\",
    \"producer_id\": \"excepturi\",
    \"producer_slug\": \"sed\",
    \"cat_game_id\": \"qui\",
    \"stock\": 5,
    \"new\": 9,
    \"usage_stt\": 17,
    \"num_orders\": \"aliquid\",
    \"highlight\": 20,
    \"author_id\": \"consequatur\",
    \"author_name\": \"sit\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/products/product_properties"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "velit",
    "slug": "eveniet",
    "des": "unde",
    "keywords": "sed",
    "price": "quos",
    "historical_cost": "amet",
    "content": "molestias",
    "info": "quis",
    "insurance": "dolorum",
    "policy": "in",
    "model": "cupiditate",
    "video": "ea",
    "banner": "aut",
    "banner_link": "harum",
    "main_img": "eum",
    "sub_img": "dolores",
    "bg": "sit",
    "type": "vitae",
    "sub_type": "ipsa",
    "cat_id": "qui",
    "cat_name": "soluta",
    "sub_1_cat_id": "ea",
    "sub_1_cat_name": "optio",
    "sub_2_cat_id": "veniam",
    "sub_2_cat_name": "enim",
    "cat_id_2": "dolore",
    "op_sub_1_id": "itaque",
    "op_sub_1_name": "iste",
    "op_sub_2_id": "quis",
    "op_sub_2_name": "fuga",
    "cat_2_sub": "rerum",
    "producer_id": "excepturi",
    "producer_slug": "sed",
    "cat_game_id": "qui",
    "stock": 5,
    "new": 9,
    "usage_stt": 17,
    "num_orders": "aliquid",
    "highlight": 20,
    "author_id": "consequatur",
    "author_name": "sit"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products-product_properties">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{&quot;Đ&acirc;y l&agrave; tất cả thuộc t&iacute;nh của bảng sản phẩm&quot;}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products-product_properties" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products-product_properties"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-product_properties"></code></pre>
</span>
<span id="execution-error-GETapi-products-product_properties" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-product_properties"></code></pre>
</span>
<form id="form-GETapi-products-product_properties" data-method="GET"
      data-path="api/products/product_properties"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products-product_properties', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products-product_properties"
                    onclick="tryItOut('GETapi-products-product_properties');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products-product_properties"
                    onclick="cancelTryOut('GETapi-products-product_properties');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products-product_properties" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/product_properties</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>varchar(255)</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="name"
               data-endpoint="GETapi-products-product_properties"
               value="velit"
               data-component="body" hidden>
    <br>
<p>Tên sản phẩm</p>
        </p>
                <p>
            <b><code>slug</code></b>&nbsp;&nbsp;<small>longtext</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="slug"
               data-endpoint="GETapi-products-product_properties"
               value="eveniet"
               data-component="body" hidden>
    <br>
<p>Slug sản phẩm</p>
        </p>
                <p>
            <b><code>des</code></b>&nbsp;&nbsp;<small>longtext</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="des"
               data-endpoint="GETapi-products-product_properties"
               value="unde"
               data-component="body" hidden>
    <br>
<p>Mô tả ngắn sản phẩm</p>
        </p>
                <p>
            <b><code>keywords</code></b>&nbsp;&nbsp;<small>longtext</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="keywords"
               data-endpoint="GETapi-products-product_properties"
               value="sed"
               data-component="body" hidden>
    <br>
<p>Keywords SEO or Tag sản phẩm</p>
        </p>
                <p>
            <b><code>price</code></b>&nbsp;&nbsp;<small>bigint</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="price"
               data-endpoint="GETapi-products-product_properties"
               value="quos"
               data-component="body" hidden>
    <br>
<p>Giá bán của sản phẩm</p>
        </p>
                <p>
            <b><code>historical_cost</code></b>&nbsp;&nbsp;<small>bigint</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="historical_cost"
               data-endpoint="GETapi-products-product_properties"
               value="amet"
               data-component="body" hidden>
    <br>
<p>Giá gốc của sản phẩm</p>
        </p>
                <p>
            <b><code>content</code></b>&nbsp;&nbsp;<small>longtext</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="content"
               data-endpoint="GETapi-products-product_properties"
               value="molestias"
               data-component="body" hidden>
    <br>
<p>Nội dung của sản phẩm</p>
        </p>
                <p>
            <b><code>info</code></b>&nbsp;&nbsp;<small>longtext</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="info"
               data-endpoint="GETapi-products-product_properties"
               value="quis"
               data-component="body" hidden>
    <br>
<p>Thông tin của sản phẩm</p>
        </p>
                <p>
            <b><code>insurance</code></b>&nbsp;&nbsp;<small>longtext</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="insurance"
               data-endpoint="GETapi-products-product_properties"
               value="dolorum"
               data-component="body" hidden>
    <br>
<p>Chính sách bảo hành,options đi kèm với của sản phẩm</p>
        </p>
                <p>
            <b><code>policy</code></b>&nbsp;&nbsp;<small>longtext</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="policy"
               data-endpoint="GETapi-products-product_properties"
               value="in"
               data-component="body" hidden>
    <br>
<p>Chính sách của cửa hàng</p>
        </p>
                <p>
            <b><code>model</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="model"
               data-endpoint="GETapi-products-product_properties"
               value="cupiditate"
               data-component="body" hidden>
    <br>
<p>Model của sản phẩm</p>
        </p>
                <p>
            <b><code>video</code></b>&nbsp;&nbsp;<small>longtext</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="video"
               data-endpoint="GETapi-products-product_properties"
               value="ea"
               data-component="body" hidden>
    <br>
<p>Mã nhúng utube của sản phẩm</p>
        </p>
                <p>
            <b><code>banner</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="banner"
               data-endpoint="GETapi-products-product_properties"
               value="aut"
               data-component="body" hidden>
    <br>
<p>Banner đi kèm với sản phẩm</p>
        </p>
                <p>
            <b><code>banner_link</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="banner_link"
               data-endpoint="GETapi-products-product_properties"
               value="harum"
               data-component="body" hidden>
    <br>
<p>Link banner của sản phẩm</p>
        </p>
                <p>
            <b><code>main_img</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="main_img"
               data-endpoint="GETapi-products-product_properties"
               value="eum"
               data-component="body" hidden>
    <br>
<p>Hình ảnh chính của sản phẩm</p>
        </p>
                <p>
            <b><code>sub_img</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="sub_img"
               data-endpoint="GETapi-products-product_properties"
               value="dolores"
               data-component="body" hidden>
    <br>
<p>Hình ảnh phụ của sản phẩm</p>
        </p>
                <p>
            <b><code>bg</code></b>&nbsp;&nbsp;<small>longtext</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="bg"
               data-endpoint="GETapi-products-product_properties"
               value="sit"
               data-component="body" hidden>
    <br>
<p>Hình ảnh background của sản phẩm</p>
        </p>
                <p>
            <b><code>type</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="type"
               data-endpoint="GETapi-products-product_properties"
               value="vitae"
               data-component="body" hidden>
    <br>
<p>Kiểu sản phẩm</p>
        </p>
                <p>
            <b><code>sub_type</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="sub_type"
               data-endpoint="GETapi-products-product_properties"
               value="ipsa"
               data-component="body" hidden>
    <br>
<p>Kiểu phụ sản phẩm</p>
        </p>
                <p>
            <b><code>cat_id</code></b>&nbsp;&nbsp;<small>bigint</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="cat_id"
               data-endpoint="GETapi-products-product_properties"
               value="qui"
               data-component="body" hidden>
    <br>
<p>ID Danh mục chính sản phẩm</p>
        </p>
                <p>
            <b><code>cat_name</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="cat_name"
               data-endpoint="GETapi-products-product_properties"
               value="soluta"
               data-component="body" hidden>
    <br>
<p>Tên danh mục chính</p>
        </p>
                <p>
            <b><code>sub_1_cat_id</code></b>&nbsp;&nbsp;<small>bigint</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="sub_1_cat_id"
               data-endpoint="GETapi-products-product_properties"
               value="ea"
               data-component="body" hidden>
    <br>
<p>ID danh mục phụ 1 của danh mục chính</p>
        </p>
                <p>
            <b><code>sub_1_cat_name</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="sub_1_cat_name"
               data-endpoint="GETapi-products-product_properties"
               value="optio"
               data-component="body" hidden>
    <br>
<p>Tên danh mục phụ 1 của danh mục chính</p>
        </p>
                <p>
            <b><code>sub_2_cat_id</code></b>&nbsp;&nbsp;<small>bigint</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="sub_2_cat_id"
               data-endpoint="GETapi-products-product_properties"
               value="veniam"
               data-component="body" hidden>
    <br>
<p>ID danh mục phụ 2 của danh mục chính</p>
        </p>
                <p>
            <b><code>sub_2_cat_name</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="sub_2_cat_name"
               data-endpoint="GETapi-products-product_properties"
               value="enim"
               data-component="body" hidden>
    <br>
<p>Tên danh mục phụ 2 của danh mục chính</p>
        </p>
                <p>
            <b><code>cat_id_2</code></b>&nbsp;&nbsp;<small>bigint</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="cat_id_2"
               data-endpoint="GETapi-products-product_properties"
               value="dolore"
               data-component="body" hidden>
    <br>
<p>ID Danh mục chính 2 của sản phẩm</p>
        </p>
                <p>
            <b><code>op_sub_1_id</code></b>&nbsp;&nbsp;<small>bigint</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="op_sub_1_id"
               data-endpoint="GETapi-products-product_properties"
               value="itaque"
               data-component="body" hidden>
    <br>
<p>ID option 1 của dạnh mục phụ 1 của danh mục chính</p>
        </p>
                <p>
            <b><code>op_sub_1_name</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="op_sub_1_name"
               data-endpoint="GETapi-products-product_properties"
               value="iste"
               data-component="body" hidden>
    <br>
<p>Tên option 1 của dạnh mục phụ 1 của danh mục chính</p>
        </p>
                <p>
            <b><code>op_sub_2_id</code></b>&nbsp;&nbsp;<small>bigint</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="op_sub_2_id"
               data-endpoint="GETapi-products-product_properties"
               value="quis"
               data-component="body" hidden>
    <br>
<p>ID option 2 của dạnh mục phụ 1 của danh mục chính</p>
        </p>
                <p>
            <b><code>op_sub_2_name</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="op_sub_2_name"
               data-endpoint="GETapi-products-product_properties"
               value="fuga"
               data-component="body" hidden>
    <br>
<p>Tên option 2 của dạnh mục phụ 1 của danh mục chính</p>
        </p>
                <p>
            <b><code>cat_2_sub</code></b>&nbsp;&nbsp;<small>bigint</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="cat_2_sub"
               data-endpoint="GETapi-products-product_properties"
               value="rerum"
               data-component="body" hidden>
    <br>
<p>ID Danh mục phụ 1 của danh mục chính 2 sản phẩm</p>
        </p>
                <p>
            <b><code>producer_id</code></b>&nbsp;&nbsp;<small>bigint</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="producer_id"
               data-endpoint="GETapi-products-product_properties"
               value="excepturi"
               data-component="body" hidden>
    <br>
<p>ID nhà sản xuất sản phẩm</p>
        </p>
                <p>
            <b><code>producer_slug</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="producer_slug"
               data-endpoint="GETapi-products-product_properties"
               value="sed"
               data-component="body" hidden>
    <br>
<p>Slug nhà sản xuất sản phẩm</p>
        </p>
                <p>
            <b><code>cat_game_id</code></b>&nbsp;&nbsp;<small>ID</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="cat_game_id"
               data-endpoint="GETapi-products-product_properties"
               value="qui"
               data-component="body" hidden>
    <br>
<p>thể loại game của sản phẩm</p>
        </p>
                <p>
            <b><code>stock</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="stock"
               data-endpoint="GETapi-products-product_properties"
               value="5"
               data-component="body" hidden>
    <br>
<p>Tình trạng kho của sản phẩm (1: còn hàng , 2: hàng sắp về , 3:hết hàng)</p>
        </p>
                <p>
            <b><code>new</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="new"
               data-endpoint="GETapi-products-product_properties"
               value="9"
               data-component="body" hidden>
    <br>
<p>Trạng thái mới của sản phẩm (1: mới đăng , 2: bình thường)</p>
        </p>
                <p>
            <b><code>usage_stt</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="usage_stt"
               data-endpoint="GETapi-products-product_properties"
               value="17"
               data-component="body" hidden>
    <br>
<p>Trạng thái sử dụng sản phẩm (1: sản phẩm chưa qua sử dụng , 2: sản phẩm đã qua sử dụng)</p>
        </p>
                <p>
            <b><code>num_orders</code></b>&nbsp;&nbsp;<small>bigint</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="num_orders"
               data-endpoint="GETapi-products-product_properties"
               value="aliquid"
               data-component="body" hidden>
    <br>
<p>Số lượt mua sản phẩm</p>
        </p>
                <p>
            <b><code>highlight</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="highlight"
               data-endpoint="GETapi-products-product_properties"
               value="20"
               data-component="body" hidden>
    <br>
<p>Sản Phẩm nổi bật (1: sp bình thương , 2: sp hot)</p>
        </p>
                <p>
            <b><code>author_id</code></b>&nbsp;&nbsp;<small>bigint</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="author_id"
               data-endpoint="GETapi-products-product_properties"
               value="consequatur"
               data-component="body" hidden>
    <br>
<p>Id người đăng sản phẩm</p>
        </p>
                <p>
            <b><code>author_name</code></b>&nbsp;&nbsp;<small>varchar</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="author_name"
               data-endpoint="GETapi-products-product_properties"
               value="sit"
               data-component="body" hidden>
    <br>
<p>Tên người đăng sản phẩm</p>
        </p>
        </form>

        <h1 id="reset-password-api">Reset Password Api</h1>

    

            <h2 id="reset-password-api-POSTapi-auth-reset-passowrd-forgot">Forgot Password.</h2>

<p>
</p>

<p>Api dùng để xác nhận số điện thoại và gửi OTP để khôi phục mật khẩu.</p>

<span id="example-requests-POSTapi-auth-reset-passowrd-forgot">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/nava/public/api/auth/reset/passowrd/forgot" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"phone\": \"0986868568\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/auth/reset/passowrd/forgot"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "phone": "0986868568"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-reset-passowrd-forgot">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;check&quot;: true,
    &quot;send_code&quot;: true,
    &quot;code&quot;: 160101,
    &quot;phone&quot;: &quot;0858467890&quot;,
    &quot;message&quot;: &quot;Gửi m&atilde; OTP th&agrave;nh c&ocirc;ng&quot;,
    &quot;phone_format&quot;: &quot;+84858467890&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-reset-passowrd-forgot" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-reset-passowrd-forgot"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-reset-passowrd-forgot"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-reset-passowrd-forgot" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-reset-passowrd-forgot"></code></pre>
</span>
<form id="form-POSTapi-auth-reset-passowrd-forgot" data-method="POST"
      data-path="api/auth/reset/passowrd/forgot"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-reset-passowrd-forgot', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-reset-passowrd-forgot"
                    onclick="tryItOut('POSTapi-auth-reset-passowrd-forgot');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-reset-passowrd-forgot"
                    onclick="cancelTryOut('POSTapi-auth-reset-passowrd-forgot');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-reset-passowrd-forgot" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/reset/passowrd/forgot</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="phone"
               data-endpoint="POSTapi-auth-reset-passowrd-forgot"
               value="0986868568"
               data-component="body" hidden>
    <br>
<p>max:15</p>
        </p>
        </form>

            <h2 id="reset-password-api-POSTapi-auth-reset-passowrd-verification">Api Verification OTP.</h2>

<p>
</p>

<p>Api dùng đẻ xác nhận mã OTP có trong hệ thống.</p>

<span id="example-requests-POSTapi-auth-reset-passowrd-verification">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/nava/public/api/auth/reset/passowrd/verification" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"code\": 160101
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/auth/reset/passowrd/verification"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": 160101
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-reset-passowrd-verification">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;info&quot;: {
        &quot;phone&quot;: &quot;0858458469&quot;,
        &quot;code&quot;: 600728,
        &quot;created_at&quot;: &quot;2022-03-22 18:46:15&quot;
    },
    &quot;code&quot;: &quot;600728&quot;,
    &quot;verification&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-reset-passowrd-verification" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-reset-passowrd-verification"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-reset-passowrd-verification"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-reset-passowrd-verification" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-reset-passowrd-verification"></code></pre>
</span>
<form id="form-POSTapi-auth-reset-passowrd-verification" data-method="POST"
      data-path="api/auth/reset/passowrd/verification"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-reset-passowrd-verification', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-reset-passowrd-verification"
                    onclick="tryItOut('POSTapi-auth-reset-passowrd-verification');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-reset-passowrd-verification"
                    onclick="cancelTryOut('POSTapi-auth-reset-passowrd-verification');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-reset-passowrd-verification" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/reset/passowrd/verification</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>code</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="code"
               data-endpoint="POSTapi-auth-reset-passowrd-verification"
               value="160101"
               data-component="body" hidden>
    <br>
<p>max:6</p>
        </p>
        </form>

            <h2 id="reset-password-api-POSTapi-auth-reset-passowrd-new_password">Api New Password.</h2>

<p>
</p>

<p>Api dùng để thay đổi mật khẩu mới.</p>

<span id="example-requests-POSTapi-auth-reset-passowrd-new_password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/nava/public/api/auth/reset/passowrd/new_password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"code\": 160101,
    \"phone\": \"0801160169\",
    \"password\": \"TestApi1612001\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/auth/reset/passowrd/new_password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": 160101,
    "phone": "0801160169",
    "password": "TestApi1612001"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-reset-passowrd-new_password">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;changed_password&quot;: true,
    &quot;message&quot;: &quot;Đ&atilde; thay đổi mật khẩu th&agrave;nh c&ocirc;ng&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-reset-passowrd-new_password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-reset-passowrd-new_password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-reset-passowrd-new_password"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-reset-passowrd-new_password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-reset-passowrd-new_password"></code></pre>
</span>
<form id="form-POSTapi-auth-reset-passowrd-new_password" data-method="POST"
      data-path="api/auth/reset/passowrd/new_password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-reset-passowrd-new_password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-reset-passowrd-new_password"
                    onclick="tryItOut('POSTapi-auth-reset-passowrd-new_password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-reset-passowrd-new_password"
                    onclick="cancelTryOut('POSTapi-auth-reset-passowrd-new_password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-reset-passowrd-new_password" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/reset/passowrd/new_password</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>code</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="code"
               data-endpoint="POSTapi-auth-reset-passowrd-new_password"
               value="160101"
               data-component="body" hidden>
    <br>
<p>max:6</p>
        </p>
                <p>
            <b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="phone"
               data-endpoint="POSTapi-auth-reset-passowrd-new_password"
               value="0801160169"
               data-component="body" hidden>
    <br>
<p>max:15</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-reset-passowrd-new_password"
               value="TestApi1612001"
               data-component="body" hidden>
    <br>

        </p>
        </form>

        <h1 id="users-api">Users Api</h1>

    

            <h2 id="users-api-GETapi-users">GET USERS.</h2>

<p>
</p>

<p>Api này cho phép bạn lấy danh sách user.</p>

<span id="example-requests-GETapi-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/nava/public/api/users?token_api=19aIotXOerK&amp;sort=DESC&amp;key_sort=id&amp;item_page=10&amp;page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/users"
);

const params = {
    "token_api": "19aIotXOerK",
    "sort": "DESC",
    "key_sort": "id",
    "item_page": "10",
    "page": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-users">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;page&quot;: &quot;1&quot;,
    &quot;number_page&quot;: 52,
    &quot;count&quot;: 104,
    &quot;users&quot;: [
        {
            &quot;id&quot;: 340,
            &quot;role_id&quot;: 5,
            &quot;name&quot;: &quot;vuong anh 2&quot;,
            &quot;email&quot;: &quot;laracast16@gmail.com&quot;,
            &quot;phone&quot;: &quot;0858458464&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;avatar&quot;: null,
            &quot;created_at&quot;: &quot;2022-03-12T07:43:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-12T07:43:33.000000Z&quot;,
            &quot;provider_id&quot;: null,
            &quot;provider&quot;: null,
            &quot;ban&quot;: 0
        },
        {
            &quot;id&quot;: 339,
            &quot;role_id&quot;: 5,
            &quot;name&quot;: &quot;vuonganh&quot;,
            &quot;email&quot;: &quot;laracast@gmail.com&quot;,
            &quot;phone&quot;: &quot;0868578690&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;avatar&quot;: null,
            &quot;created_at&quot;: &quot;2022-03-12T07:41:43.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-12T07:41:43.000000Z&quot;,
            &quot;provider_id&quot;: null,
            &quot;provider&quot;: null,
            &quot;ban&quot;: 0
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"></code></pre>
</span>
<span id="execution-error-GETapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users"></code></pre>
</span>
<form id="form-GETapi-users" data-method="GET"
      data-path="api/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users"
                    onclick="tryItOut('GETapi-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users"
                    onclick="cancelTryOut('GETapi-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>token_api</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token_api"
               data-endpoint="GETapi-users"
               value="19aIotXOerK"
               data-component="query" hidden>
    <br>

            </p>
                    <p>
                <b><code>sort</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="sort"
               data-endpoint="GETapi-users"
               value="DESC"
               data-component="query" hidden>
    <br>
<p>ASC/DESC Default: DESC</p>
            </p>
                    <p>
                <b><code>key_sort</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="key_sort"
               data-endpoint="GETapi-users"
               value="id"
               data-component="query" hidden>
    <br>
<p>Default: id</p>
            </p>
                    <p>
                <b><code>item_page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="item_page"
               data-endpoint="GETapi-users"
               value="10"
               data-component="query" hidden>
    <br>
<p>Default: 10</p>
            </p>
                    <p>
                <b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="page"
               data-endpoint="GETapi-users"
               value="1"
               data-component="query" hidden>
    <br>
<p>Default: all</p>
            </p>
                </form>

            <h2 id="users-api-POSTapi-auth-signup">Singup.</h2>

<p>
</p>

<p>Api này cho phép bạn đăng ký tài khoản user trong hệ thống.</p>

<span id="example-requests-POSTapi-auth-signup">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/nava/public/api/auth/signup" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Vuong Anh\",
    \"email\": \"2niteshop@gmail.com\",
    \"password\": \"Anh$1234\",
    \"phone\": \"0987687679\",
    \"password_confirmation\": \"Anh$1234\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/auth/signup"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Vuong Anh",
    "email": "2niteshop@gmail.com",
    "password": "Anh$1234",
    "phone": "0987687679",
    "password_confirmation": "Anh$1234"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-signup">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Đăng k&yacute; th&agrave;nh c&ocirc;ng&quot;,
    &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-signup" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-signup"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-signup"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-signup" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-signup"></code></pre>
</span>
<form id="form-POSTapi-auth-signup" data-method="POST"
      data-path="api/auth/signup"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-signup', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-signup"
                    onclick="tryItOut('POSTapi-auth-signup');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-signup"
                    onclick="cancelTryOut('POSTapi-auth-signup');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-signup" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/signup</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-auth-signup"
               value="Vuong Anh"
               data-component="body" hidden>
    <br>
<p>max 255</p>
        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-signup"
               value="2niteshop@gmail.com"
               data-component="body" hidden>
    <br>
<p>max 255</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-signup"
               value="Anh$1234"
               data-component="body" hidden>
    <br>
<p>min:6</p>
        </p>
                <p>
            <b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="phone"
               data-endpoint="POSTapi-auth-signup"
               value="0987687679"
               data-component="body" hidden>
    <br>
<p>min:6</p>
        </p>
                <p>
            <b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password_confirmation"
               data-endpoint="POSTapi-auth-signup"
               value="Anh$1234"
               data-component="body" hidden>
    <br>
<p>min:6</p>
        </p>
        </form>

            <h2 id="users-api-POSTapi-auth-login">Login.</h2>

<p>
</p>

<p>Api cho phép bạn đăng nhập vào hệ thống.</p>

<span id="example-requests-POSTapi-auth-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/nava/public/api/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"2niteshop@gmail.com\",
    \"password\": \"Anh$1234\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/nava/public/api/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "2niteshop@gmail.com",
    "password": "Anh$1234"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;is_login&quot;: true,
    &quot;status&quot;: &quot;success&quot;,
    &quot;access_token&quot;: &quot;eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.*eyJhdWQiOiI1IiwianRpIjoiNzEzY2YzMjI4YzgyNWNhMjM1MGQzYTVkOThhZDI0ZmExODVlNjFjYWQzOGM5YmI0NjU0ZTcyYTQzNmNiNzYxZGUyZjYzMDU4NmY2YTdhMzUiLCJpYXQiOjE2NDczNDA3ODYuMzE0NzM1LC*JuYmYiOjE2NDczNDA3ODYuMzE0NzM5LCJleHAiOjE5NjI5NTk5ODYuMjYzNjA5LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.*FlqtOsjiMBBn_UzoLT_HN-FiYsd9QyoCRNsaTZ4y4BvT4hCq2R9Qx4HmKzXtuaDFBdisQ36gEVElyV7l3WDjgm4H-1wtl0PwuMp_j7uWQzJGMQwebV3YlnUJM-BqAYPaaWymnixVp26WUnabDZEx4B4dong3AWUMboIXRg*xNZCvOc7GyjIGAvepDFVrpa8qBWEuX5fR1U6A8NkYf-PUAWQbY5H3D57WIWHUTlScNO2aaKXL1xYyQVcd2V2D1dS0RQtsZ-Oc4OuDvbCoPkBNeU_15tK7oagB_q2i5p44O97d1vmUjjiJOyacjIsIVBJAUhcOgbLARqXJK*QndEV6wWmbojNzmKKk-rtLWu5_pK3ODOqjhNIfWezVXy3MO4an6GEpoLpedq4jzu--pLWWJ3fb_MYc4MP6bKQtHDVuLZtyB1KnHyjQ181UZYTMwJKVX7DM5aKi-TbC4xCut2c8JhjymWat3H2g3soHUKffGTiyn7_eKhAs*f7oSvDUKDxPPinAydWWWX6w7fa_slLMLRUjzl1tYGHI-BsJ_p1Tk9QbQnWX89kQ0oBDYApITWxmP9fVGIqVQksom7oP18JO-rP3JMPygxvoQfYoI7mCBe-T9q-SMyzXq4a7QmfsOMi3g6rK3kZnyxURQ6FLG-XN8GCAc8&quot;,
    &quot;token_type&quot;: &quot;Bearer&quot;,
    &quot;expires_at&quot;: &quot;2032-03-15 17:39:46&quot;,
    &quot;cart&quot;: {
        &quot;751a67de0e70aba0bc788781dc89923e&quot;: {
            &quot;rowId&quot;: &quot;751a67de0e70aba0bc788781dc89923e&quot;,
            &quot;id&quot;: 54,
            &quot;name&quot;: &quot;Nintendo Switch OLED model with Neon Red Blue Joy‑Con&quot;,
            &quot;qty&quot;: &quot;1&quot;,
            &quot;price&quot;: 9400000,
            &quot;options&quot;: {
                &quot;ins&quot;: &quot;7&quot;,
                &quot;color&quot;: 0,
                &quot;model&quot;: &quot;15923&quot;,
                &quot;image&quot;: &quot;admin/images/products/nintendo-switch/main/nintendo-switch-oled-red-blue-joy-con-00-305x305.jpg&quot;,
                &quot;sub_total&quot;: &quot;10400000&quot;,
                &quot;cost&quot;: 8100000
            },
            &quot;tax&quot;: &quot;0.00&quot;,
            &quot;isSaved&quot;: false,
            &quot;subtotal&quot;: &quot;9400000.00&quot;
        },
        &quot;802275dbe2134cdf804a737b253425b3&quot;: {
            &quot;rowId&quot;: &quot;802275dbe2134cdf804a737b253425b3&quot;,
            &quot;id&quot;: 67,
            &quot;name&quot;: &quot;Nintendo Switch Lite - Blue&quot;,
            &quot;qty&quot;: &quot;1&quot;,
            &quot;price&quot;: 4980000,
            &quot;options&quot;: {
                &quot;ins&quot;: &quot;8&quot;,
                &quot;color&quot;: 0,
                &quot;model&quot;: &quot;15432&quot;,
                &quot;image&quot;: &quot;admin/images/products/nintendo-switch-lite/main/nintendo-switch-lite-blue-00-305x305.jpg&quot;,
                &quot;sub_total&quot;: &quot;4980000&quot;,
                &quot;cost&quot;: 4000000
            },
            &quot;tax&quot;: &quot;0.00&quot;,
            &quot;isSaved&quot;: false,
            &quot;subtotal&quot;: &quot;4980000.00&quot;
        }
    },
    &quot;user&quot;: {
        &quot;id&quot;: 1,
        &quot;role_id&quot;: 1,
        &quot;name&quot;: &quot;2NITEE API&quot;,
        &quot;email&quot;: &quot;api2nite@gmail.com&quot;,
        &quot;phone&quot;: &quot;0967898460&quot;,
        &quot;email_verified_at&quot;: null,
        &quot;avatar&quot;: &quot;admin/images/avatar/273897681_461480892292312_8005546585052258809_n(1).jpg&quot;,
        &quot;created_at&quot;: &quot;2022-02-19T08:06:28.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-03-15T09:31:49.000000Z&quot;,
        &quot;provider_id&quot;: null,
        &quot;provider&quot;: null,
        &quot;ban&quot;: 0
    },
    &quot;remember&quot;: false
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login"></code></pre>
</span>
<form id="form-POSTapi-auth-login" data-method="POST"
      data-path="api/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-login"
                    onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-login"
                    onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-login" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/login</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-login"
               value="2niteshop@gmail.com"
               data-component="body" hidden>
    <br>
<p>max 255</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-login"
               value="Anh$1234"
               data-component="body" hidden>
    <br>
<p>min:6</p>
        </p>
        </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
