
<nav>
    <div class="menu-icon">
        <span class="fas fa-bars"></span>
    </div>
    <div class="logo">
        <a href="/">
            <strong>
                Inews
            </strong>
        </a>
    </div>
    <div class="nav-items">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Blogs</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Feedback</a></li>
    </div>
    @auth
        <div class="userMenu">
            <button class="buttonDrop">
                <img 
                    src="{{ ($userData->profile_path)? asset('storage/' . $userData->profile_path) : asset('images/default1.png') }}" 
                    width="30" 
                    height="30"
                >
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="userContent">
                <a href="#">Settings</a>
                <a href="/bookmarks/{{ auth()->id() }}">BookMarks</a>
                <a href="#">
                    <button 
                        type="button" 
                        data-bs-toggle="offcanvas" 
                        data-bs-target="#offcanvasRight" 
                        aria-controls="offcanvasRight"
                    >
                        Profile
                    </button>
                </a>
            </div>
        </div>     

        {{-- Profile offcanvas --}}
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="d-flex flex-column justify-content-center">
                    <div class="d-flex justify-content-center">
                        <div class="text-center">
                            <img 
                                src="{{ ($userData->profile_path)? asset('storage/' . $userData->profile_path) : asset('images/default1.png') }}" 
                                class="img-fluid" 
                                alt="Your profile image" 
                                id="profileImage"
                                disable
                            >
                            <br>
                            <h5>{{ $userData->name }}</h5>
                            <p>{{ $userData->email }}</p>
                        </div>
                    </div>
                    <br>
                    <div class="d-flex ">
                        <div class="p-3 d-flex justify-content-center">
                            Bookmark: {{ count($userBookmarkCount) }}
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="p-3">
                            <a href="/user/profile/{{ auth()->id() }}">View Profile</a>
                        </div>
                        <div class="p-3">
                            <a href="/bookmarks/{{ auth()->id() }}">BookMarks</a>
                        </div>
                        <div class="p-3">
                            <a href="/user/settings">Settings</a>
                        </div>
                        <div class="p-3">
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit">Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="float-end">
            <div class="nav-items">
                <li>
                    <a href="/signIn">Sign In</a>
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
    <form action="/search" id="searchForm" method="GET">
        <input type="search" name="query" class="search-data" placeholder="Search" required>
        <input type="hidden" name="page" value='1' >
        <input type="hidden" name="lang" value="en" >
        <button type="submit" class="fas fa-search"></button>
    </form>
</nav>