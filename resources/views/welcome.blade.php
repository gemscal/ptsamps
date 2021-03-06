@include('templates.header')

    <title>Project T Solutions | Asset Management and Procurement System</title>
</head>

<body>
    <div class="landing-bg parent-cont"> 

        <!-- login Container -->
        <div class="landing-login-cont">

            <!-- Left Side Login -->
            <div class="leftlog-side fl">

                <!-- Logo and Company name -->
                <div class="login-title">
                    <div class="login-logo fl">
                        <img src="img/companylogo.png" title="Project T Solutions">
                    </div>
                    <div class="login-text fl">
                        <p class="login-comp-nm">Project T Solutions</p>
                        <p class="system-about">Asset Mgmt. and Procurement System</p>
                    </div>
                    <div class="clr"></div>
                </div>

                <!-- Form -->
                <div class="login-form">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <label class="lbl-login">Email address</label>
                        <input type="email" name="email" placeholder="your.email@sample.com" autocomplete="off" autofocus required>

                        <div class="spacer"></div>

                        <label class="lbl-login">Password</label>
                        <input type="password" name="password" placeholder="password" required>

                        <div class="spacer"></div>

                        <div>
                            <button type="submit" class="login-submit">Login</button>
                        </div>

                        <label class="lbl-btm">Asset Management and Procurement System
                            <br>Copyright &copy; <a href="https://www.projecttsolutions.com/" target="newtab" class="link-pts">Project T Solutions</a> </label>
                    </form>
                </div>
            </div>

            <!-- Right Side Login -->
            <div class="rightlog-side fl">
                <div class="pop-about">
                    <div class="pop-text-cont">
                        <p class="popup-text">Design and develop by <br> <span id="pop-name">Luzel, Melissa </span>and <span id="pop-name">James</span></p>
                    </div>
                    <img src="img/hoverarrow.png" id="hover-arrow">
                </div>
                <a href="#" id="pop-abt">
                    <img src="img/abouticon.png" class="log-about-icon">
                </a>
            </div>
        </div>
    </div>

@include('templates.footer')