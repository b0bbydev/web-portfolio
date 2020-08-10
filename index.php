<?php
// Initialize the session.
session_start();
?>

<!DOCTYPE HTML>
<!--
   @author Bobby Jonkman.
 -->

<html lang="en">
<head>
    <title>Portfolio | Bobby Jonkman</title>
    <meta charset="utf-8"/>
    <!-- viewport to help view on smaller devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- link to css file. -->
    <link rel="stylesheet" href="assets/css/styles.css"/>
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
</head>


<body>
<!-- Header -->
<header id="header">
    <div class="logo">
        <a href="index.php">Web Portfolio <span>by Bobby Jonkman</span></a>
    </div>
    <div class="crud">
        <!-- If user is not logged in, don't show specific nav options. -->
        <?php
            if(!isset($_SESSION['loggedin']))
            {
                echo '<a href="login_page.php">Register/Log in</a>
                     ';
            } else {
                echo '<a href="includes/logout.php">Log Out</a>
                      <a href="reset_pass_page.php">Reset Password</a>
                     ';
            }// end of if-else.
        ?>
        <!-- Always show the database page. -->
        <a href="showdb_page.php">Show Database</a>
    </div>
</header>


<!-- Banner -->
<section id="banner" class="bg-img" data-bg="banner.png">
    <div class="inner">
        <header>
            <h1>Bobby Jonkman</h1>
            <h3>Software Developer</h3>
            <br>
            <div class="button1" id="button">
                <a href="assets/files/Bobby%20Jonkman%20-%20Resume.rar">
                    <button type="submit">Download my resume</button>
                </a>
            </div>
            <div>
                <!-- Show a greeting when the user is logged in. -->
                <?php if(isset($_SESSION['username'])) echo '<p class="greeting">Welcome, <b>' . $_SESSION['username'] . '</b> to my web portfolio!</p>' ?>
            </div>
        </header>
    </div>
</section>


<!-- About -->
<section id="about" class="wrapper post bg-img" data-bg="banner2.png">
    <div class="inner">
        <article class="box">
            <header>
                <h2>About Me</h2>
            </header>
            <div class="content">
                <p>Hi, my name is Bobby Jonkman and I'm a 22 year old Entry Level Developer, currently studying the
                    Computer Programming Analyst program at Georgian College. My passion for technology has started
                    since I was very young, mainly under the influence from friends, computers and video games. As I got
                    older I discovered I had a keen interest for how technology operated at a more in depth level.</p>
                <p>Towards the graduation of my high school I decided I wanted to pursue a career in the field of
                    Computer Science. From starting by building computers from scratch to developing functional programs
                    (and even this website!), my hobby for programming continues to grow everyday. As a developer my
                    interests are mainly Security and Backend development. Besides programming and technology my
                    interests include sports, outdoors and music.</p>
            </div>
        </article>
    </div>
</section>


<!-- Projects -->
<section id="about" class="wrapper post bg-img" data-bg="banner3.png">
    <div class="inner">
        <article class="box">
            <header>
                <h2>Projects/Past Work</h2>
                <i>More to come!..</i>
            </header>
            <div class="content">
                <figure>
                    <img src="images/spigot.jpg" alt="Portfolio Item">
                    <figcaption>
                        <a href="https://github.com/b0bbydev/spigot-server-plugins">
                            <h4>Spigot Plugins</h4>
                        </a>
                        <p>Spigot hosts the biggest Minecraft server software projects.</p>
                    </figcaption>
                </figure>

                <figure>
                    <img src="images/project2.png" alt="Portfolio Item">
                    <figcaption>
                        <a href="https://github.com/b0bbydev/town-of-bwg">
                            <h4>Drop-down Menu</h4>
                        </a>
                        <p>Drop-down menu manageable from the front-end</p>
                    </figcaption>
                </figure>

                <figure>
                    <img src="images/project3.jpg" alt="Portfolio Item">
                    <figcaption>
                        <a href="https://github.com/b0bbydev/gamepad-arduino">
                            <h4>Gamepad Arduino</h4>
                        </a>
                        <p>A mock video game controller done using an Arduino.</p>
                    </figcaption>
                </figure>

                <h2>Demos/Fiddles</h2>
                <div class="project-dropdown">
                    <form>
                        <label for="Project drop down menu">
                            <select class="form-control" onchange="changeOptions(this)">
                                <option disabled selected value>Select a project!</option>
                                <option value="project_1">SpigotMC Plugin</option>
                                <option value="project_2">Dropdown menu</option>
                                <option value="project_3">Arduino Gamepad</option>
                            </select>
                        </label>
                    </form>
                </div>

                <div class="project_1">
                    <form class="text-center" name="project_1" id="project_1" style="display:none">
                        <p>
                            <iframe height="300px" width="100%"
                                    src="https://paiza.io/projects/e/yBT4Vd19LYvG1LffRvjHSQ?theme=tomorrow_night"
                                    scrolling="no" frameborder="no" allowtransparency="true" allowfullscreen="true"
                                    sandbox="allow-forms allow-pointer-lock allow-popups allow-same-origin allow-scripts allow-modals"></iframe>
                        </p>
                    </form>
                </div>

                <div class="project_2">
                    <form class="text-center" name="project_2" id="project_2" style="display:none">
                        <p>
                            <iframe width="100%" height="300"
                                    src="//jsfiddle.net/bobby_jonkman/x8yv7hLf/12/embedded/js,html,css,result/dark/"
                                    allowfullscreen="allowfullscreen" allowpaymentrequest frameborder="0"></iframe>
                        </p>
                    </form>
                </div>

                <div class="project_3">
                    <form class="text-center" name="project_3" id="project_3" style="display:none">
                        <p>
                            <iframe height="300px" width="100%"
                                    src="https://paiza.io/projects/e/FjtDZhp8s-3ZDayC2ih2dw?theme=tomorrow_night"
                                    scrolling="no" frameborder="no" allowtransparency="true" allowfullscreen="true"
                                    sandbox="allow-forms allow-pointer-lock allow-popups allow-same-origin allow-scripts allow-modals"></iframe>
                        </p>
                    </form>
                </div>

            </div>
        </article>
    </div>
</section>


<!-- Footer/Contact -->
<footer id="footer" class="wrapper post bg-img" data-bg="banner4.jpg">
    <div class="inner">
        <h2>Contact Me</h2>
        <form action="https://formspree.io/moqkayyq" method="post">
            <div class="field half first">
                <label for="name">Name</label>
                <input name="name" id="name" type="text" placeholder="Name" pattern="[a-zA-Z ]+"
                       title="Please enter letters only." required>
            </div>
            <div class="field half">
                <label for="email" class="email">Email</label>
                <input name="_replyto" id="email" type="email" placeholder="Email" required>
            </div>
            <div class="field">
                <label for="message" class="message">Message</label>
                <textarea name="message" id="message" rows="6" type="text" placeholder="Message"></textarea>
            </div>
            <ul class="actions">
                <li>
                    <input name="submit" value="Send Message" class="submit" type="submit">
                </li>
            </ul>
        </form>
        <ul class="icons">
            <li><a href="https://github.com/b0bbydev" class="icon round fa-github"><span
                            class="label">Github</span></a></li>
            <li><a href="https://ca.linkedin.com/in/bobby-jonkman-28716617a" class="icon round fa-linkedin"><span
                            class="label">LinkedIn</span></a></li>
        </ul>
        <div class="copyright">
            &copy; Bobby Jonkman
        </div>

        <div class="ssl">
            <div class="ssl-content">
                <script type="text/javascript"> //<![CDATA[
                    var tlJsHost = ((window.location.protocol === "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
                    document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
                    //]]></script>
                <script language="JavaScript" type="text/javascript">
                    TrustLogo("https://www.positivessl.com/images/seals/positivessl_trust_seal_sm_124x32.png", "POSDV", "none");
                </script>
            </div>
        </div>
</footer>
</body>
</html>

<script>
    // This function was also not working when included in js file. Will fix after.
    // the following function enables the 'master' form to show/hide different forms, depending on the selected value.
    function changeOptions(selectEl)
    {
        let selectedValue = selectEl.options[selectEl.selectedIndex].value;
        let subForms = document.getElementsByClassName('text-center');
        for (let i = 0; i < subForms.length; i += 1) {
            if (selectedValue === subForms[i].name) {
                subForms[i].setAttribute('style', 'display:block')
            } else {
                subForms[i].setAttribute('style', 'display:none')
            }// end of if-else
        }// end of for.
    }// end of function
</script>