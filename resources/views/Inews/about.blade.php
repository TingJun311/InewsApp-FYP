
<x-layout>
    <livewire:navbar />
    <header id="banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 text-center">
                    <img src="{{ asset('images/cover.png') }}" alt="" class="img-fiuld">
                </div>
                <div class="col-12 col-md-6 align-self-center mt-4 mt-md-0">
                    <h1>
                        <strong>
                            Explore
                        </strong>
                    </h1>
                    <p>
                        Inews is an operational business division of the world Broadcasting Corporation responsible 
                        for the gathering and broadcasting of news and current affairs in around the world.
                    </p>
                    <button class="btnP">
                        <a href="/">Explore</a>
                    </button>

                    <a class="btnB" href="/signIn">Sign In</a>
                </div>
            </div>
        </div>
    </header>
    <div class="container p-5 shadow-lg mt-5 text-center">
        <div class="row">
            <div class="d-inline-flex flex-column flex-md-row justify-content-center">
                <div class="d-flex flex-column p-3 mt-2">
                    <h3>
                        <strong>
                            Headlines
                        </strong>
                    </h3>
                    <p>
                        A headline is the title of a newspaper story, printed in large letters at the top of the story, especially on the front page. 
                    </p>
                    <form action="/category" method="get">
                        <input type="hidden" name="query" value="headlines">
                        <input type="hidden" name="page" value="1">
                        <input type="hidden" name="lang" value="en">
                        <button class="btnP" type="submit" >Read top Headlines</button>
                    </form>
                </div>
                <div class="d-flex flex-column p-3 mt-2">
                    <h3>
                        <strong>    
                            Climate
                        </strong>
                    </h3>
                    <p>
                        Climate change and climate prediction. Read science articles on regional climates and global climate shifts
                    </p>
                    <form action="/category" method="get">
                        <input type="hidden" name="query" value="climate">
                        <input type="hidden" name="page" value="1">
                        <input type="hidden" name="lang" value="en">
                        <button class="btnP" type="submit" >Read climate news</button>
                    </form>
                </div>
                <div class="d-flex flex-column p-3 mt-2">
                    <h3>
                        <strong>
                            Business
                        </strong>
                    </h3>
                    <p>
                        Breaking news and analysis on business and the economy, including the latest news in technology, stock markets, media and finance.
                    </p>
                    <form action="/category" method="get">
                        <input type="hidden" name="query" value="business">
                        <input type="hidden" name="page" value="1">
                        <input type="hidden" name="lang" value="en">
                        <button class="btnP" type="submit" >Read news</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container p-5 my-5">
        <div class="row">
            <div class="col-12 col-md-6 align-self-center">
                <h2>
                    <strong>
                        Daily Blogs
                    </strong>
                </h2>
                <p>
                    Get to know more about our company and dedicated Inews team.
                </p>

                <a class="btnB" href="/blogs">View Blogs</a>
            </div>
            <div class="col-12 col-md-6 ">
                <img src="{{ asset('images/registerLogo.png') }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2><strong>Top trending news</strong></h2>
                <p>Get to read all the top topics article around the world. </p>
            </div>
        </div>
        <div class="row">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-5 col-lg-4 p-5 shadow m-5">
                        <h3>
                            <strong>
                                War In Ukraine
                            </strong>
                        </h3>
                        <p>
                            Relations between the two countries became hostile after the 2014 Ukrainian revolution, which was followed by Russia's annexation of Crimea from Ukraine.
                        </p>
                        <form action="/category" method="get">
                            <input type="hidden" name="query" value="war in ukraine">
                            <input type="hidden" name="page" value="1">
                            <input type="hidden" name="lang" value="en">
                            <button class="btnP" type="submit" >Read articles</button>
                        </form>
                    </div>
                    <div class="col-12 col-md-5 col-lg-4 p-5 shadow m-5">
                        <h3>
                            <strong>
                                Coronavirus
                            </strong>
                        </h3>
                        <p>
                            Coronaviruses are a group of viruses belonging to the family of Coronaviridae, which infect both animals and humans.
                        </p>
                        <form action="/category" method="get" class="text-center">
                            <input type="hidden" name="query" value="coronavirus">
                            <input type="hidden" name="page" value="1">
                            <input type="hidden" name="lang" value="en">
                            <button class="btnP" type="submit" >Read news</button>
                        </form>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 p-5 shadow mt-5">
                        <h3>
                            <strong>
                                Technology
                            </strong>
                        </h3>
                        <p>
                            Technology is the application of scientific knowledge to the practical aims of human life or, as it is sometimes phrased, to the change and manipulation of the human environment.
                        </p>
                        <form action="/category" method="get" class="text-end">
                            <input type="hidden" name="query" value="technology">
                            <input type="hidden" name="page" value="1">
                            <input type="hidden" name="lang" value="en">
                            <button class="btnP" type="submit" >Latest tech</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>  

    <div class="container my-5 p-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 align-self-center text-center">
                <div class="p-5 rounded">
                    <div class="rounded p-5">
                        <img src="{{ asset('images/favicon_io/android-chrome-192x192.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 align-self-center">
                <div class="bg-dark rounded p-5 text-light">
                    <h3 class="mb-4">
                        <strong>
                            Who we are
                        </strong>
                    </h3>
                    <div class="d-flex flex-column justify-content-between">
                        <div class="mb-4">
                            <strong>
                                Inews Board
                            </strong>
                            <p>
                                The Board ensures that the Inews delivers its mission and public purposes
                            </p>
                        </div>
                        <div>
                            <strong>
                                Executive committee
                            </strong>
                            <p>
                                The Executive Committee is responsible for the day-to-day management of the Inews
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="container-fluid p-5" id="colorBg">
        <div class="row">
            <div class="col-12 p-5 text-left">
                <h3>
                    <strong>
                        Others popular trending
                    </strong>
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 px-5">
                <strong>
                    Entertainment
                </strong>
                <p>
                    Entertainment journalism is any form of journalism that focuses on popular culture and the entertainment business and its products.
                </p>
                <form action="/category" method="get" class="text-end mt-3 mb-5">
                    <input type="hidden" name="query" value="entertainment">
                    <input type="hidden" name="page" value="1">
                    <input type="hidden" name="lang" value="en">
                    <button class="btnW" type="submit" class="p-2" >Read more</button>
                </form>
            </div>
            <div class="col-12 col-md-6 col-lg-4 px-5">
                <strong>
                    Health
                </strong>
                <p>
                    Healthline News reports on emerging research, new treatments, diet, exercise, and trending topics in health and wellness.
                </p>
                <form action="/category" method="get" class="text-end mt-3 mb-5">
                    <input type="hidden" name="query" value="health">
                    <input type="hidden" name="page" value="1">
                    <input type="hidden" name="lang" value="en">
                    <button class="btnW" type="submit" class="p-2" >Read more</button>
                </form>
            </div>
            <div class="col-12 col-lg-4 px-5">
                <strong>
                    Sciences
                </strong>
                <p>
                    Science News is published by the Society for Science, a nonprofit 501(c)(3) organization dedicated to expanding scientific literacy.
                </p>
                <form action="/category" method="get" class="text-end mt-3 mb-5">
                    <input type="hidden" name="query" value="sciences">
                    <input type="hidden" name="page" value="1">
                    <input type="hidden" name="lang" value="en">
                    <button class="btnW" type="submit" class="p-2" >Explore sciences</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container m-5 p-5">
        <div class="row">
            <div class="col-12 col-sm-8">
                <h3>
                    <strong>
                        For latest news and bookmark?
                    </strong>
                </h3>
            </div>
            <div class="col-12 col-sm-4 text-center">
                <button class="btnP">
                    <a href="/signIn">Sign Up</a>
                </button>
            </div>
        </div>
    </div>
    <livewire:footer />
    <style>
        #banner {
            padding: 5em;
            width: 100%;
            background: #fff;
        }
        #banner img {
            width: 100%;
            /* height: ; */
        }

        #colorBg {
            width: 100%;
            /* height: 300px; */
            background: #5138ee;
            color: #fff;
        }

        .btnP {
            border: none;
            padding: 1rem;
            color: #fff;
            background: #5138ee;
            border-radius: 50px;
            transition: linear 0.2s;
        }
        .btnP a{
            text-decoration: none;
            color: #fff;
        }
        .btnP:hover {
            background: #1f0098;
        }

        .btnB {
            border: 1px solid #5138ee;
            border-radius: 50px;
            padding: 1rem;
            transition: linear 0.2s;
            color: #5138ee;
            text-decoration: none;
        }
        .btnB:hover  {
            background: #5138ee;
            color: #fff;
        }

        .btnW {
            border: 1px solid #fff;
            background: transparent;
            color: #fff;
            padding: 1rem;
            border-radius: 50px;
            transition: linear 0.2s;
        }
        .btnW:hover {
            background: #fff;
            color: #5138ee;
        }
    </style>
</x-layout>