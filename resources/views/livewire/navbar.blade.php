
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
        <li><a href="/">Home</a></li>
        <li><a href="/blogs">Blogs</a></li>
        <li><a href="/about">About</a></li>
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
                <a href="/bookmarks/{{ auth()->id() }}">BookMarks</a>
                <button 
                    type="button" 
                    data-bs-toggle="offcanvas" 
                    data-bs-target="#offcanvasRight" 
                    aria-controls="offcanvasRight"
                >
                    Profile
                </button>
            </div>
        </div>     

        {{-- Profile offcanvas --}}
        <div class="offcanvas offcanvas-end" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
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
                        <p>Bookmark: {{ count($userBookmarkCount) }}</p>
                    </div>
                </div>
                <br>
                <div class="d-flex flex-column">
                    <div class="p-3">
                        <a href="/user/profile/{{ auth()->id() }}">View Profile</a>
                    </div>
                    <div class="p-3">
                        <a href="/bookmarks/{{ auth()->id() }}">BookMarks</a>
                    </div>
                    <div class="p-3">
                        <form action="/logout" method="post" id="logOutBtn">
                            @csrf
                            <button type="submit">Log Out</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        {{-- End here --}}
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
    <form action="/search" id="searchForm" method="GET" id="inputSearchBox">
        <input type="search" name="query" class="search-data" placeholder="Search" required>
        <input type="hidden" name="page" value='1' >
        <input type="hidden" name="lang" value="en" >
        <button type="submit" class="fas fa-search"></button>
    </form>
    <style>
        .offcanvas {
            z-index: 1055;
        }
        .offcanvas a {
            text-decoration: none;
            color: black;
            font-weight: 500;
            padding: 1rem;
        }
        .offcanvas a:hover {
            color: #5138ee;
        }

        #bookmarkCount {
            color: #424549;
        }
        #logOutBtn {
            background: transparent;
            border: none;
        }
        #logOutBtn button {
            background: transparent;
            font-weight: 500;
            color: black;
            margin: 0;
        }
        #logOutBtn button:hover {
            color: #5138ee;
        }
    </style>
</nav>