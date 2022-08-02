
<nav class="d-flex flex-row justify-content-evenly" method="GET" action="/search">
    <div class='p-2'>
        <form action="/search" method="GET" style="background: #fff; border: none;">
            <input type="hidden" name="query" value="{{ $query }}">
            <input type="hidden" name="lang" value="{{ $lang }}">
            <input type="hidden" name="page" value="{{ ((int)$page - 1) }}">
            @if ($page == 1)
                <button type="submit" disabled class="paginateBtn">
                    <i class="fa-solid fa-angle-left"></i> 
                    Previous
                </button>   
            @else
                <button type="submit" class="paginateBtn">
                    <i class="fa-solid fa-angle-left"></i> 
                    Previous
                </button>    
            @endif
        </form>
    </div>
    <div class='p-2'>
        <form action="/search" method="GET" style="background: #fff; border: none;">
            <input type="hidden" name="query" value="{{ $query }}">
            <input type="hidden" name="lang" value="{{ $lang }}">
            <input type="hidden" name="page" value="{{ ((int)$page + 1) }}">
            @if ($page == $totalPage)
                <button type="submit" disabled class="paginateBtn">
                    Next
                    <i class="fa-solid fa-angle-right"></i>
                </button>    
            @else
                <button type="submit" class="paginateBtn">
                    Next
                    <i class="fa-solid fa-angle-right"></i>
                </button>    
            @endif
        </form>
    </div>
    <style>
        button.paginateBtn {
        }
    </style>
</nav>

