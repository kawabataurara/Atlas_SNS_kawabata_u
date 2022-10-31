
<div id="side-bar">
    <section class="side-bar-contents">
        <div class="confirm">
            <p class="user-name">{{ Auth::user()->username }}さん</p>
            <div class="follow">
                <a href="/followList" class="follow-btn">
                    <p><span class="totall">{{ Auth::user()->follows()->count() }}</span><span class="totall-after">フォロー</span>
                    </p>
                </a>
            </div>

            <div class="follow">
                <a href="/followerList" class="follow-btn">
                    <p><span class="totall">{{ Auth::user()->followers()->count() }}</span><span class="totall-after">フォロワー</span>
                    </p>
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
