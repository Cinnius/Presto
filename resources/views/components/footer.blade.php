<!-- Footer -->
<footer class="text-center text-lg-start medium-bg white-text">
    <section class="">
        <div class="container text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-12 my-4 text-center">
                    <a class="btn dark-btn my-3" href="#">{{__('ui.footer_BackToTop')}}</a>
                </div>
                <div class="col-12 col-lg-6 mb-4">
                    <div>
                        <h6 class="text-uppercase fw-bold mb-4">{{__('ui.footer_Work')}}</h6>
                        <p>{{__('ui.footer_Work_Text')}}</p>
                        <p>{{__('ui.footer_Work_Text2')}}</p>
                        <a href="{{route('becomeRevisor')}}" class="btn main-btn dark-text mb-5 py-1 px-2">{{__('ui.footer_Work_BTN')}}!</a>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mb-4">
                    <div class="row">
                        <h6 class="text-uppercase fw-bold mb-4">Newsletter</h6>
                        <p>{{__('ui.footer_Newsletter')}}</p>
                        <div class="col-12 col-lg-10 form-outline mb-4">
                            <input type="email" id="form5Example25" class="form-control"/>
                            <label class="form-label" for="form5Example25">Email address</label>
                        </div>
                        <div class="col-12 col-lg2">
                            <button type="submit" class="btn btn-dark mb-4">{{__('ui.footer_Newsletter_BTN')}}</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">Presto srl</h6>
                </div>
                <div class="col-12 col-lg-4 mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">{{__('ui.footer_Link')}}</h6>
                    <p><i class="bi bi-question-circle-fill me-3"></i><a href="{{route('welcome')}}#ourteam" class="white-text">{{__('ui.footer_Link_Help')}}</a></p>
                    <p><i class="bi bi-archive-fill me-3"></i><a href="{{route('welcome')}}#ourteam" class="white-text">{{__('ui.footer_Link_AboutUS')}}</a></p>
                    <p><i class="bi bi-shield-fill-exclamation me-3"></i><a href="#!" class="white-text">{{__('ui.footer_Link_ConditionRule')}}</a></p>
                    <p><i class="bi bi-shield-fill-exclamation me-3"></i><a href="#!" class="white-text">{{__('ui.footer_Link_Privacy')}}</a></p>
                </div>
                <div class="col-12 col-lg-4 mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">{{__('ui.footer_Link_Contact')}}</h6>
                    <p><i class="bi bi-house-fill me-3"></i> New York, NY 10012, US</p>
                    <p><i class="bi bi-envelope-fill me-3"></i>Presto@Presto.it</p>
                    <p><i class="bi bi-telephone-fill me-3"></i> + 01 234 567 88</p>
                    <p><i class="bi bi-printer-fill me-3"></i> + 01 234 567 89</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Copyright -->
    <div class="text-center p-4">
        <span>© 2022 Copyright:</span>
        <a class="text-reset fw-bold" href="https://aulab.it/">Aulab.it</a>
    </div>
</footer>