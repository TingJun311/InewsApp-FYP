
<div class="sideNav">
    <li>
        <form action="/category" method="get">
            <input type="hidden" name="query" value="latest">
            <input type="hidden" name="page" value="1">
            <input type="hidden" name="lang" value="en">
            <button type="submit" class="{{ $categories['latest'] }}" >Latest</button>
        </form>
    </li>
    <li>
        <form action="/category" method="get">
            <input type="hidden" name="query" value="war in ukraine">
            <input type="hidden" name="page" value="1">
            <input type="hidden" name="lang" value="en">
            <button type="submit" class="{{ $categories['war in ukraine'] }}" >War in Ukraine</button>
        </form>
        {{-- <a href="" class="{{ $categories['war in ukraine'] }}" >War in Ukraine</a> --}}
    </li>
    <li>
        <form action="/category" method="get">
            <input type="hidden" name="query" value="coronavirus">
            <input type="hidden" name="page" value="1">
            <input type="hidden" name="lang" value="en">
            <button type="submit" class="{{ $categories['coronavirus'] }}" >Coronavirus</button>
        </form>
        {{-- <a href="" class="{{ $categories['coronavirus'] }}" >Coronavirus</a> --}}
    </li>
    <li>
        <form action="/category" method="get">
            <input type="hidden" name="query" value="climate">
            <input type="hidden" name="page" value="1">
            <input type="hidden" name="lang" value="en">
            <button type="submit" class="{{ $categories['climate'] }}" >Climate</button>
        </form>
        {{-- <a href="" class="{{ $categories['climate'] }}" >Climate</a> --}}
    </li>
    <li>
        <form action="/category" method="get">
            <input type="hidden" name="query" value="business">
            <input type="hidden" name="page" value="1">
            <input type="hidden" name="lang" value="en">
            <button type="submit" class="{{ $categories['business'] }}" >Business</button>
        </form>
        {{-- <a href="" class="{{ $categories['business'] }}" >Business</a> --}}
    </li>
    <li>
        <form action="/category" method="get">
            <input type="hidden" name="query" value="technology">
            <input type="hidden" name="page" value="1">
            <input type="hidden" name="lang" value="en">
            <button type="submit" class="{{ $categories['technology'] }}" >Technology</button>
        </form>
        {{-- <a href="" class="{{ $categories['technology'] }}" >Technology</a> --}}
    </li>
    <li>
        <form action="/category" method="get">
            <input type="hidden" name="query" value="sciences">
            <input type="hidden" name="page" value="1">
            <input type="hidden" name="lang" value="en">
            <button type="submit" class="{{ $categories['sciences'] }}" >Sciences</button>
        </form>
        {{-- <a href="" class="{{ $categories['sciences'] }}" > Sciences</a> --}}
    </li>
    <li>
        <form action="/category" method="get">
            <input type="hidden" name="query" value="health">
            <input type="hidden" name="page" value="1">
            <input type="hidden" name="lang" value="en">
            <button type="submit" class="{{ $categories['health'] }}" >Health</button>
        </form>
        {{-- <a href="" class="{{ $categories['health'] }}" >Health</a> --}}
    </li>
    <li>
        <form action="/category" method="get">
            <input type="hidden" name="query" value="entertainment">
            <input type="hidden" name="page" value="1">
            <input type="hidden" name="lang" value="en">
            <button type="submit" class="{{ $categories['entertainment'] }}" >Entertainment</button>
        </form>
        {{-- <a href="" class="{{ $categories['entertainment'] }}" >Entertainment</a> --}}
    </li>
</div>
