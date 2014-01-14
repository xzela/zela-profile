<?php
if(isset($_POST['j']) && $_POST['j']) {

    $ip = $_SERVER['REMOTE_ADDR'];
    $host = gethostbyaddr($ip);
    $browser = $_SERVER['HTTP_USER_AGENT'];

    $sql = 'INSERT INTO hover (ip_address, host_name, client_browser) VALUES ("' . $ip . '","' . $host . '","' . $browser . '")';

    $dbhost = 'localhost';
    $dbuser = 'phpuser';
    $dbpass = 'wsbhexz';

    $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

    $dbname = 'zeph_lafassett';
    mysql_select_db($dbname);

    mysql_query($sql) or die('holy bananas batman! i just died because: ' . mysql_error());
    die();
}
?>
<!DOCTYPE html >
<html>
<!--
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    Hey! You're lookin' at the source! That probably means you're intersted in
    checking out my code. Well, before you do, try playing around with the
    site a bit. I have a few "easter eggs" floating about.

    But... if you're strapped for time just look at the code.

    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
-->
    <head>
        <title>Zeph LaFassett is AWESOME!1!!</title>
        <script type='text/javascript' src='scripts/jquery.min.js'></script>
        <script type='text/javascript' src='scripts/jquery.url.js'></script>
        <script type='text/javascript' src='scripts/fx.js'></script>

        <script type='text/javascript' src='scripts/init.js'></script>


        <link rel='stylesheet' type='text/css' href='css/style.css' />
        <noscript>
            <style type='text/css'>
                #content {
                    height: 100%;
                }
                #content div.product {
                    display: block;
                }
                .no_js {
                    display: inline;
                }
            </style>
        </noscript>

    </head>
    <body>
        <div class="message"></div>
         <div class="counter">
            <ul></ul>
        </div>
        <div id='container'>
            <div id='menu'>
                <h2>P<span class='hint r'>r</span>ojects:</h2>
                <ul>
                    <li><a href='#welcome'>Welcome</a></li>
                    <li><a href="#langantiques">Lang Antiques</a></li>
                    <li><a href="#projectmango">Project Mango</a></li>
                    <li><a href="#cardr">Cardr</a></li>
                    <li><a href="#yonoid">Yo!Noid</a></li>
                    <li><a href="#deitweet">Deitweet</a></li>
                    <li><a href="#winadollar">Win A Dollar!</a></li>
                    <li class="nsfw">[<span>nsfw</span>] <a href="#kinkydollars">Kinky Dollars</a></li>
                    <li><a href="#aboutzeph">About Zeph</a></li>

                </ul>
                <div class="extra">
                    <h4>Extra:</h4>
                    <ul>
                        <li><strong>Github</strong>: <a class="external_link" href="https://github.com/xzela">github.com/xzela</a></li>
                        <li><strong>Resume</strong>: <a href="/files/Zeph_LaFassett_Resume.pdf" />download</a> [PDF]</li>
                        <li><strong>Email</strong>: <a href="mailto:zeph@lafassett.com" >zeph@lafassett.com</a></li>
                    </ul>
                </div>
                <div class='chris'>
                    <div class='says'><a href='http://en.wikipedia.org/wiki/Chris_Hansen' class='external_link'><strong>Chris Hansen</strong></a> says</div>
                    <div class='quote'></div>
                    <div class='bye'></div>
                </div>
            </div>
            <div id='content'>
                <div id='welcome' class='product active' style='display: block;'>
                    <h2>Welcome {</h2>
                    <div class='screenshot'>
                        <img src='images/screenshots/welcome.png' alt='recursion is neat!' />
                    </div>
                    <p class='description'>
                        <a class='local' href='#aboutzeph'>Zeph LaFassett</a> is a web developer in San Francisco, California.
                        He has experience making awesome <a class='local' href='#cardr'>web sites</a>, interesting web <a class="local" href="#winadollar"> experiments</a>, and rock solid <a class='local' href='#projectmango'>applications</a>.
                    </p>

                    <p class='description'>
                        Check out some of the neat projects he's worked on.
                    </p>
                    <h2>}</h2>
                </div>

                <div id='langantiques' class='product'>
                    <h2>Lang Antiques { </h2>
                    <div class='screenshot'>
                        <img src='images/screenshots/langantiques.png' alt='Lang Antiques screenshot' title='click here to buy some antique jewelry'/>
                    </div>
                    <p class='description'>
                        Zeph designed and implemented a new website for Lang Antiques, an independently-owned jewelry store located in downtown San Francisco.
                        He also developed a <a class='local' href='#projectmango'> custom CMS</a> for their inventory management needs.
                        In addition, he also managed their SEO and online marketing, and with his help Lang Antiques enjoys top rankings in Google, Yahoo, and Bing for specific search phrases.
                        Since improving Lang's workflow and online services, internet traffic and sales have increased over 30%.
                    </p>
                    <p class='url'><a href='http://www.langantiques.com' class='external_link'>http://www.langantiques.com</a></p>
                    <p class='duties'>
                        Lang Antiques uses the PHP framework <a href='http://codeigniter.com' class='external_link'>CodeIgniter</a>.
                        All frontend development and user experience was coded onsite by Zeph.
                        He also managed all web related services and servers.
                    </p>
                    <h4>tags</h4>
                    <ul class="keywords">
                        <li>php</li>
                        <li>codeigniter</li>
                        <li>mysql</li>
                        <li>APC</li>
                        <li>php-gd</li>
                        <li>CSS</li>
                        <li>SEO</li>
                        <li>awesome jewelry</li>
                    </ul>
                    <h2> } <span class='small_text no_js'><a href='#'> //to top</a></span>  </h2>
                </div>

                <div id='cardr' class='product'>
                    <h2>Cardr {</h2>
                    <div class='screenshot'>
                        <img src='images/screenshots/cardr.png' alt='Cardr - The Credit Card Monitoring Service' title="Don't be fooled" />
                    </div>
                    <p class='description'>
                        Cardr is a customer safety awareness project.
                        The general purpose of Cardr is to make users aware of malicous websites that may have alterior motives.
                    </p>
                    <p class='url'><a href='https://cardr.org/' class='external_link'>https://cardr.org/</a></p>
                    <p class='duties'>
                        Zeph was responsible for general UI design, server setup, ssl setup.
                    </p>
                    <h4>tags</h4>
                    <ul class="keywords">
                        <li>nodejs</li>
                        <li>ssl</li>
                        <li>grunt</li>
                        <li>fake site</li>
                        <li>does not steal credit card information</li>
                    </ul>
                    <h2>}  <span class='small_text no_js'><a href='#'> //to top</a></span></h2>
                </div>

                <div id='projectmango' class='product'>
                    <h2>Project Mango {</h2>
                    <div class='screenshot'>
                        <img src='images/screenshots/project.mango.png' alt='project mango screenshot' />
                    </div>
                    <p class='description'>
                        Project Mango is a custom built solution for Lang Antiques.
                        Lang Antiques had become disatisified with their existing inventory management system and commissioned Zeph to build a new one.
                        Project Mango is tightly intergraded with their <a class='local' href='#langantiques'>public facing website,</a> and this helps improve internal workflows and customer relations.
                    </p>
                    <p class='duties'>
                        Project Mango is written with the codeigniter framework and uses a MySQL database.
                    </p>
                    <h4>tags</h4>
                    <ul class="keywords">
                        <li>php</li>
                        <li>codeigniter</li>
                        <li>mysql</li>
                        <li>CMS</li>
                        <li>does not takes like a mango</li>
                    </ul>
                    <h2>}  <span class='small_text no_js'><a href='#'> //to top</a></span></h2>
                </div>

                <div id='yonoid' class='product'>
                    <h2>Yo!Noid {</h2>
                    <div class='screenshot'>
                        <img src='images/screenshots/yonoid.png' alt='Yo!Noid screenshot' title='click here to start the fun!' />
                    </div>
                    <div class='info'>
                        <p class='description'>
                            Yo!Noid is a small experimental web project jointly headed by <a href='http://contolini.net/' class='external_link'>Chris Contolini</a> and Zeph.
                            The site is an experiment in revealing the amount and types of data a browser collects about the user. In addition, it shows how developers can easily access this information.
                        </p>
                        <p class='url'><a href='http://yonoid.lafassett.com' class='external_link'>http://yonoid.lafassett.com</a></p>
                        <p class='duties'>
                            Zeph was responsible for all backend development which includes: server setup, mail system, database design, backend business logic and a bit of frontend UX.
                            The look and feel, images, and UX was contributed by Chris Contolini.
                        </p>
                    </div>
                    <h4>tags</h4>
                    <ul class="keywords">
                        <li>php</li>
                        <li>mysql</li>
                        <li>javascript</li>
                    </ul>
                    <h2>}  <span class='small_text no_js'><a href='#'> //to top</a></span></h2>
                </div>

                <div id='deitweet' class='product'>
                    <h2>Deitweet {</h2>
                    <div class='screenshot'>
                        <img src='images/screenshots/deitweet.png' alt='Deitweet screenshot' title='click here to watch the feed!'/>
                    </div>
                    <p class='description'>
                        Zeph created <a class='external_link' href='http://deitweet.com'>Deitweet.com</a> (dee-i-tweet) as a knee jerk reaction to cursebird.com.
                        Deitweet filters for major deity names, similar to the way cursebird pulls tweets with swear words.
                        Like most of Zeph's side projects, this is simply a fun time waster.
                        Although this site once featured ads, it made no money.
                    </p>
                    <p class='url'><a href='http://deitweet.com' class='external_link'>http://deitweet.com</a></p>
                    <p class='duties'>
                        Zeph was responsible for all backend and frontend development.
                        He utilized the public twitter api to filter and gather each tweet.
                    </p>
                    <h4>tags</h4>
                    <ul class="keywords">
                        <li>php</li>
                        <li>twitter api</li>
                        <li>xhr</li>
                        <li>had ads</li>
                        <li>time waster</li>
                        <li>can be offensive</li>
                    </ul>

                    <h2>}  <span class='small_text no_js'><a href='#'> //to top</a></span></h2>
                </div>

                <div id='winadollar' class='product'>
                    <h2>Win A Dollar! {</h2>
                    <div class='screenshot'>
                        <img src='images/screenshots/winadollar.png' alt='Win A Dollar screenshot' title='click here to win a dollar!' />
                    </div>
                    <p class='description'>
                        Win A Dollar is an simple online game in which users try to pick the winning square.
                        Although this application will not give you a dollar, it's still fun to play a few rounds.
                    </p>
                    <p class='url'><a href='http://dollar.lafassett.com' class='external_link'>http://dollar.lafassett.com</a></p>
                    <p class='duties'>
                        Zeph was responsible for the database design, UX, frontend and backend development, and that horrible pink background.
                    </p>
                    <h4>tags</h4>
                    <ul class="keywords">
                        <li>php</li>
                        <li>mysql</li>
                        <li>sha256</li>
                        <li>xhr</li>
                        <li>time waster</li>
                        <li>does not actually give out a dollar</li>
                    </ul>
                    <h2>}  <span class='small_text no_js'><a href='#'> //to top</a></span></h2>
                </div>

                <div id='kinkydollars' class='product'>
                    <h2>Kinky Dollars {</h2>
                    <div class='screenshot'>
                        <img src='images/screenshots/kinkydollars.png' alt='project mango screenshot' />
                    </div>
                    <p class='description'>Kinky Dollars is an adult entertainment affiliate program for [<span class='nsfw'>nsfw</span>] <a class="external_link" href="http://www.kink.com/">Kink.com</a> </p>
                    <p class="url">[<span class='nsfw'>nsfw</span>] <a href="http://www.kinkydollars.com">http://www.kinkydollars.com/</a></p>
                    <p class='duties'>
                        Zeph rewrote the entire backend for the affiliate ad tools for better performance and site maintainability.
                        By using the <abbr title="alternitive php caching">APC</abbr> library to help with datbase load and site performance Zeph was able to reduce database load over 10 fold.
                        Prior to using a caching solution, Kinkydollars database load rose to epic proportions and would often render the tool inoperable.
                        Zeph was not responsible for the crummy UI.
                    </p>
                    <h4>tags</h4>
                    <ul class="keywords">
                        <li>php</li>
                        <li>mysql</li>
                        <li>APC</li>
                        <li>porn</li>
                    </ul>
                    <h2>}  <span class='small_text no_js'><a href='#'> //to top</a></span></h2>
                </div>

                <div id='aboutzeph' class='product'>
                    <h2>About Zeph {</h2>
                    <div class='screenshot'>
                        <img src='images/profile.me.jpg' alt='self' />
                    </div>
                    <p>He...</p>
                    <ul>
                        <li>loves <a href="http://www.sublimetext.com/2" class='external_link'>sublime text 2</a>.</li>
                        <li>thinks <a href='http://jquery.com' class='external_link'>jquery</a> is cool.</li>
                        <li>believes <a href='http://nodejs.org' class='external_link'>nodejs</a> is <span class='misspelling hint' title='Thanks for hovering of this span element. I just wanted to see how many people would actually hover over a dotted underline. By hovering over this span element I have collected your: IP Address, Host Address, DateTime, Session ID, and a few other things. Nothing personal of course, it was just a test.'>teh</span> future.</li>
                        <li>holds a bachelor of arts in philosophy and religion from <a href='http://www.sfsu.edu/' class='external_link'> sfsu</a>.</li>
                        <li>wants to raise <a href='http://en.wikipedia.org/wiki/Capybara' class='external_link'>capybaras</a> at some point in the future.</li>
                        <li>has a <a href='/files/Zeph_LaFassett_Resume.pdf'>resume</a>.</li>
                    </ul>
                    <h2>}  <span class='small_text no_js'><a href='#'> //to the top breh</a></span></h2>
                </div>
            </div>
        </div>
        <div class='footer_wrapper'>
            <div class='footer'>
                <p>
                    send Zeph an <a href='mailto:zeph@lafassett.com'>email</a> or give him a call (<a href="tel:+19165214784">+1.916.521.4784</a>). I hear he's a really nice <span id='hansen' class='hint'>dude</span>.
                </p>
            </div>
        </div>
    </body>
</html>
