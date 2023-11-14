  <!-- Recruitment News -->
  <section class="recruitment-news section-static">
      <div class="container">
          @include('flash::message')
          <div class="tab tab-nav">
              <h4 class="tablinks section-title text-center mb-3 text-primary active"
                  onclick="openCity(event, 'Featured_Jobs')">
                  @lang('Featured Jobs')
              </h4>
              <h4 class="tablinks section-title text-center mb-3 " onclick="openCity(event, 'New_Jobs')">
                  {{__('New Jobs')}}
              </h4>

              <h4 class=" tablinks section-title text-center mb-3" onclick="openCity(event, 'New_Jobs')">
                  {{__('Suggested Jobs')}}
              </h4>
          </div>

          <div id="Featured_Jobs" class="tabcontent active">
              @include('templates.employers.includes.featured_jobs')
          </div>
          <div id="New_Jobs" class="tabcontent">
              @include('templates.employers.includes.latest_jobs')
          </div>

          <div id="New_Jobs" class="tabcontent">
              @include('templates.employers.includes.suggested_jobs')
          </div>

          @if(auth::check()==true)

          @endif
  </section>