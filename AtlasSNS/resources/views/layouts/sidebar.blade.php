
<div id="side-bar">
    <section class="side-bar-contents">
        <div class="confirm">
            <p class="user-name">{{ Auth::user()->username }}さん</p>
            <div class="follow">
                <p class="totall">フォロー数</p>
                <p><span class="totall">{{ Auth::user()->follows()->count() }}</span>人</p>
            </div>
            <div class="follow-list-btn">
                <a href="/followList" class="follow-btn">
                    <button class="totall-after">フォローリスト</button>
                </a>
            </div>


            <div class="follow">
                <p class="totall">フォロワー数</p>
                <p><span class="totall">{{ Auth::user()->followers()->count() }}</span>人</p>
            </div>
            <div class="follow-list-btn">
                <a href="/followerList" class="follow-btn">
                    <button class="totall-after">フォロワーリスト</button>
                </a>
            </div>
        </div>

        <div class="search-btn">
            <a href="/search">
                <div class="user-btn login-next" id="search">
                ユーザー検索
            </div>
            </a>
        </div>

    </section>
</div>
