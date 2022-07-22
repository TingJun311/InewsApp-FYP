

<nav>
    <div class="menu-icon">
        <span class="fas fa-bars"></span>
    </div>
    <div class="logo">
        Inews
    </div>
    <div class="nav-items">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Blogs</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Feedback</a></li>
    </div>
    @auth
        <div class="dropdown">
            <button class="dropbtn">
                <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="30" height="30">
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Settings</a>
                <a href="#">Profile</a>
                <a href="#">Log Out</a>
            </div>
        </div>     
    @else
        <div class="float-end">
            <div class="nav-items">
                <li>
                    <a href="#">Sign In</a>
                </li>
            </div>
        </div>
    @endauth
    <div class="search-icon">
        <span class="fas fa-search"></span>
    </div>
    <div class="cancel-icon">
        <span class="fas fa-times"></span>
    </div>
    <form action="#">
        <input type="search" class="search-data" placeholder="Search" required>
        <button type="submit" class="fas fa-search"></button>
    </form>
</nav>
