<div class="sidebar close">
    <div class="logo-details">

      <i class="mt-4"><img src="{{ URL::asset('img/Logo_linus_white.png') }}"></i>
    </div>

    <br>
      <ul class="nav-links">

        <!--Wildlife-->
        <li>
          <a href="{{ route('guestDashboard') }}">
            <i class='bx bx-radar' ></i>
            <span class="link_name">Critters</span>
          </a>
            <ul class="sub-menu">
              <li><a class="link_name" href="{{ route('guestDashboard') }}">Critters</a>
              </li>
            </ul>
        </li> <!--end of wildlife Bar-->

            <!--Museum-->
        <li>
            <div class="iocn-link">
              <a href="{{ route('G_boneCollection') }}">
                <i class='bx bx-library' ></i>
                <span class="link_name">Museum</span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
              <li><a class="link_name" href="{{ route('G_boneCollection') }}">Museum</a></li>
              <li><a href="{{ route('G_boneCollection') }}">Bones</a></li>
              <li><a href="{{ route('G_refCollection') }}">References</a></li>
            </ul>
      </li>
      <!--end of Museum Bar-->

        <!--Thesis-->
        <li>
            <div class="iocn-link">
              <a href="{{ route('Guest_thesis') }}">
                <i class='bx bx-book' ></i>
                <span class="link_name">Thesis Papers</span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
              <li><a class="link_name" href="{{ route('Guest_thesis') }}">Thesis Papers</a></li>
              <li><a href="{{ route('G_gradThesis') }}">Post Graduate</a></li>
              <li><a href="{{ route('G_undergradThesis') }}">Under Graduate</a></li>
            </ul>
      </li>
      <!--end of Thesis Paper-->

         <!--Journal-->
        <li>
          <a href="{{ route('Guest_journal') }}">
            <i class='bx bx-news' ></i>
            <span class="link_name">Journal Articles</span>
          </a>
            <ul class="sub-menu">
              <li><a class="link_name" href="{{ route('Guest_journal') }}"> Journal Articles</a></li>
            </ul>
        </li><!--end of Journal Article-->
      <!--Profile-->
      <li>

        <a href="{{ route('login') }}">
          <div class="profile-details">
            <div class="profile-content">
                <!--<img src="image/profile.jpg" alt="profileImg">-->
            </div>
            <div class="name-job">
                <div class="profile_name">IEMS Member?</div>
                <div class="job">Login here</div>
            </div>
                 <!-- Log in Icon-->
                  <i class='bx bx-log-in' style="font-size:40px"></i>


          </div>

        </a>
        </li><!--end of Profile-->
      </ul><!--end of Nav Links-->
</div><!--end of Sidebar-->
