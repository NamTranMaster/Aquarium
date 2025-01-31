<div class="row">
    <div class="col-md-4" style="min-height: 90vh;">
        <section class="SideBar_wrapper">
            <a class="SideBar_userLink">
                <section class="SideBar_userAvatar">
                    <figure class="SideBar_userImage">
                        <img class="user_avatar" src="<?= $_SESSION['avatar']; ?>" alt="avatar" class="SideBar_image" width="64px">
                    </figure>
                </section>
                <section class="SideBar_header">
                    <h3 class="cus_name"><?= $_SESSION['cus_name']; ?></h3>
                    <p>Member</p>
                </section>
            </a>
        </section>
        <ul class="SideBar_nav">
            <li><a href="?controller=account#">Account</a></li>
        </ul>
    </div>
    <div class="col-md-8">
        <div class="setting_model">
            <div class="setting_head">
                <div class="head-text">
                    <h2>Account</h2>
                    <span>Manage your logins and personal information.</span>
                </div>
                <div class="head-icon">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 56 56" enable-background="new 0 0 56 56" xml:space="preserve">
                        <g id="Layer_2">
                            <rect id="Rectangle-5" fill="none" width="56" height="56"></rect>
                        </g>
                        <g id="Layer_1">
                            <path id="Rectangle-26" fill="#365568" d="M34,20h10c0.6,0,1,0.4,1,1l0,0c0,0.6-0.4,1-1,1H34c-0.6,0-1-0.4-1-1l0,0 C33,20.4,33.4,20,34,20z"></path>
                            <path id="Rectangle-26-Copy" fill="#365568" d="M34,24h10c0.6,0,1,0.4,1,1l0,0c0,0.6-0.4,1-1,1H34c-0.6,0-1-0.4-1-1l0,0 C33,24.4,33.4,24,34,24z"></path>
                            <path id="Rectangle-26-Copy-2" fill="#365568" d="M34,28h10c0.6,0,1,0.4,1,1l0,0c0,0.6-0.4,1-1,1H34c-0.6,0-1-0.4-1-1l0,0 C33,28.4,33.4,28,34,28z"></path>
                            <path id="Path-30" fill="#DEEAEF" d="M36,11h12.9v16.8c0,0-0.4-8.5-3.5-12.4C42.3,11.5,36,11,36,11z"></path>
                            <polyline id="Path-2" fill="none" stroke="#365568" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" points=" 51,27.4 51,9 5,9 5,25.1 5,43 49.2,43 51,43 51,32.9 	"></polyline>
                            <path id="Path-86-Copy" fill="#7FBABA" d="M19.5,31.7c6.7,0,7.3,2.9,7.3,2.9s-5,3.6-8.1,3.6s-6.4-0.7-7.5-0.7 C9,37.4,12.8,31.7,19.5,31.7z"></path>
                            <path id="Path-86" fill="none" stroke="#365568" stroke-width="2" stroke-linecap="round" d="M8.6,35.6c0,0,3-5.2,8.9-5.2 s8.2,3,8.2,3"></path>
                            <ellipse id="Combined-Shape" fill="#7FBABA" cx="18.4" cy="24.7" rx="3.7" ry="3.7"></ellipse>
                            <ellipse id="Combined-Shape-Copy" fill="none" stroke="#365568" stroke-width="2" cx="18.4" cy="23.8" rx="3.8" ry="3.9"></ellipse>
                        </g>
                    </svg>
                </div>
            </div>

            <div class="setting_account">
                <div class="account">
                    <span class="suggest">Login information</span>
                    <?php if(strpos($data['username'], '@') === false):?>
                        <div class="info">
                            <a onclick="load_setting('password');">
                                <p class="info_content">Password</p>
                                <span class="info_user">********</span>
                                <span class="info_icon">⋗</span>
                            </a>
                        </div>
                    <?php endif;?>
                    <div class="info">
                        <a onclick="load_setting('email');">
                            <p class="info_content">Email</p>
                            <span class="info_user"><?= $data['email'] ?? ''; ?></span>
                            <span class="info_icon">⋗</span>
                        </a>
                    </div>
                </div>

                <div class="account">
                    <span class="suggest account_person">Personal information</span>
                    <div class="info">
                        <a onclick="load_setting('name');">
                            <p class="info_content">Personal</p>
                            <span class="info_user"><?=$_SESSION['cus_name'] ?? ''; ?></span>
                            <span class="info_icon">⋗</span>
                        </a>
                    </div>
                    <div class="info">
                        <a onclick="load_setting('avatar');">
                            <p class="info_content">Avatar</p>
                            <span class="info_user">Change avatar</span>
                            <span class="info_icon">⋗</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>