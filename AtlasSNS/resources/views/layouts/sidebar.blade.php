
<div id="side-bar">
    <section class="side-bar-contents">
        <div class="confirm">
            <p>{{ Auth::user()->username }}さんの</p>
            <div class="follow">
                <p>フォロー数</p>
                <p>{{ Auth::user()->follows()->count() }}名</p>
            </div>
            <a href="/followList" class="follow-btn">フォローリスト</a>

            <div class="follow">
                <p>フォロワー数</p>
                <p>{{ Auth::user()->followers()->count() }}名</p>
            </div>

            <a href="/followerList" class="follow-btn">フォロワーリスト</a>
        </div>
        <p class="user-btn" id="search"><a href="/search">ユーザー検索</a></p>


    </section>
</div>
