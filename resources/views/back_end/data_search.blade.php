  @extends('back_end.master')
  @section('dashboard')


<section class="wrapper site-min-height">
        <div class="row">
          <div class="col-lg-12">
     
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="custom-box">
                <div class="servicetitle">
                  <h4>Search By Date</h4>
                  <hr>
                </div>
            <div class="form-panel" style="text-align: center;padding-top: 40px;">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="{{ url('search_by_date') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group ">
                    <div class="col-lg-10" style="width: 100%">
                      <input class="form-control" id="firstname" name="date" type="date" required="" />
                    </div>
                  </div>
                  <button type="submit" class="btn btn-theme">Search</button>
                
                </form>
              </div>
            </div>
              </div>
            </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="custom-box">
                <div class="servicetitle">
                  <h4>Search By Month</h4>
                  <hr>
                </div>
            <div class="form-panel" style="text-align: center;padding-top: 40px;">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="{{ url('search_by_month') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group ">
                    <div class="col-lg-10" style="width: 100%">
                      <select name="month" class="form-control" required="">
                        <option value="">Select Month</option>
                        <option value="{{'January'}}">January</option>
                        <option value="{{'February'}}">February</option>
                        <option value="{{'March'}}">March</option>
                        <option value="{{'April'}}">April</option>
                        <option value="{{'May'}}">May</option>
                        <option value="{{'June'}}">June</option>
                        <option value="{{'July'}}">July</option>
                        <option value="{{'August'}}">August</option>
                        <option value="{{'September'}}">September</option>
                        <option value="{{'October'}}">October</option>
                        <option value="{{'November'}}">November</option>
                        <option value="{{'December'}}">December</option>
                      </select>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-theme">Search</button>
                </form>
              </div>
            </div>
              </div>
            </div>
                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="custom-box">
                <div class="servicetitle">
                  <h4>Search By Year</h4>
                  <hr>
                </div>
            <div class="form-panel" style="text-align: center;padding-top: 40px;">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="{{ url('search_by_year') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group ">
                    <div class="col-lg-10" style="width: 100%">
                      <select name="year" class="form-control" required="">
                        <option value="">Select Year</option>
                        <option value="{{'2020'}}">2020</option>
                        <option value="{{'2019'}}">2019</option>
                        <option value="{{'2018'}}">2018</option>
                        <option value="{{'2017'}}">2017</option>
                        <option value="{{'2016'}}">2016</option>
                        <option value="{{'2015'}}">2015</option>
                        <option value="{{'2014'}}">2014</option>
                        <option value="{{'2013'}}">2013</option>
                        <option value="{{'2012'}}">2012</option>
                        <option value="{{'2011'}}">2011</option>
                        <option value="{{'2010'}}">2010</option>
                      </select>
                    </div>
                  </div>
                   <button type="submit" class="btn btn-theme">Search</button>
                </form>
              </div>
            </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      @endsection

