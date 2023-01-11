<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Flip/1.1.2/jquery.flip.min.js"
        integrity="sha512-fFCuqqfp+PTJ7OYFJVOsADHPgRz7VLaPc9uex6jEt6GbIanpRvoujyb+uwCTTk+FGBJkvvlsDLqccZABYha3IQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>

<body>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Audiowide&display=swap");

        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #11141c;
            height: 100vh;
            overflow: hidden;
        }

        h1 {
            font-family: "Audiowide", cursive;
            color: #f5e4c1;
            font-size: 5rem;
            text-shadow: 6px 6px #cf5729;
            text-align: center;
            margin-bottom: 100px;
        }

        .year {
            display: flex;
            justify-content: center;
        }

        .number {
            margin: 0 10px;
        }

        .shape {
            height: 100px;
            width: 100px;
        }

        .two>.top,
        .two>.bottom,
        .zero {
            display: flex;
        }

        .two>.top>div:nth-of-type(1)>.shape {
            border-radius: 50rem 0 0;
            background-color: #efd84e;
        }

        .two>.top>div:nth-of-type(1)>.shape:nth-of-type(2) {
            background-color: #f4e5bf;
            margin-top: 5px;
        }

        .two>.top>.shape {
            height: 205px;
            border-radius: 0 50rem 50rem 0;
            background-color: #7db890;
            margin-left: 5px;
        }

        .two>.bottom {
            margin-top: 5px;
        }

        .two>.bottom>.shape:nth-of-type(1) {
            border-radius: 0 50% 0 50%;
            background-color: #7385b3;
            margin-right: 5px;
        }

        .two>.bottom>.shape:nth-of-type(2) {
            border-radius: 0 50rem 0 0;
            background-color: #cf5729;
        }

        .zero .shape {
            width: 130px;
        }

        .zero>div>.shape {
            height: 152px;
            border-radius: 50rem 0 0 0;
            background-color: #efd84e;
        }

        .zero>div>.shape:nth-of-type(2) {
            border-radius: 0 0 0 50rem;
            background-color: #cf5729;
            margin-top: 5px;
        }

        .zero>.shape {
            height: 310px;
            background-color: #f4e5bf;
            border-radius: 0 50rem 50rem 0;
            margin-left: 5px;
        }

        .inactive.shape {
            opacity: 0;
        }
    </style>
    <script>
        // It's only been a month but I am absolutely loving every bit of GSAP. Have only discovered a bit but look to continue learning and creating cool stuff with GSAP

        gsap.registerPlugin(Flip);

        const state = Flip.getState(document.querySelectorAll(".shape"));

        function animate() {
            Array.from(document.querySelectorAll(".shape")).map((el) =>
                el.classList.remove("inactive")
            );

            Flip.from(state, {
                stagger: 0.05,
                duration: 1,
                ease: "power2.in",
                spin: true,
                repeat: -1,
            });
        }
        animate();
    </script>
    <h1>
        Happy<br />
        New Year
    </h1>
    <div class="year">
        <div class="two number">
            <div class="top">
                <div>
                    <div class="shape inactive"></div>
                    <div class="shape inactive"></div>
                </div>
                <div class="shape inactive"></div>
            </div>
            <div class="bottom">
                <div class="shape inactive"></div>
                <div class="shape inactive"></div>
            </div>
        </div>
        <div class="zero number">
            <div>
                <div class="shape inactive"></div>
                <div class="shape inactive"></div>
            </div>
            <div class="shape inactive"></div>
        </div>
        <div class="two number">
            <div class="top">
                <div>
                    <div class="shape inactive"></div>
                    <div class="shape inactive"></div>
                </div>
                <div class="shape inactive"></div>
            </div>
            <div class="bottom">
                <div class="shape inactive"></div>
                <div class="shape inactive"></div>
            </div>
        </div>
        <div class="two number">
            <div class="top">
                <div>
                    <div class="shape inactive"></div>
                    <div class="shape inactive"></div>
                </div>
                <div class="shape inactive"></div>
            </div>
            <div class="bottom">
                <div class="shape inactive"></div>
                <div class="shape inactive"></div>
            </div>
        </div>
    </div>

</body>

</html>
