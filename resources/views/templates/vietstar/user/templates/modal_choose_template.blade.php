<!-- Modal -->
<div class="modal fade modal-choose-template" id="modalChooseTemplate" tabindex="-1" aria-labelledby="modalChooseTemplate" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="suggestionsChooseTemplate">CHỌN TEMPLATE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sx-6 col-md-6 col-lg-4">
            <div class="template">
              <div class="pic">
                <img src="{{ asset('/vietstar/imgs/cv_template/template-1.png') }}" alt="vietstar"/>
              </div>
              <h3>Template 1</h3>
              <button class="btn btn-primary btn-choose-template" data-template="1" data-dismiss="modal" aria-label="Close" type="button" onclick="show_template(1)">Chọn template</button>
            </div>
          </div>
          <div class="col-sx-6 col-md-6 col-lg-4">
            <div class="template">
              <div class="pic">
                <img src="{{ asset('/vietstar/imgs/cv_template/template-5.png') }}" alt="vietstar"/>
              </div>
              <h3>Template 5</h3>
              <button class="btn btn-primary btn-choose-template" data-template="5" data-dismiss="modal" aria-label="Close" type="button" onclick="show_template(5)">Chọn template</button>
            </div>
          </div>
          <div class="col-sx-6 col-md-6 col-lg-4">
            <div class="template">
              <div class="pic">
                <img src="{{ asset('/vietstar/imgs/cv_template/template-8.png') }}" alt="vietstar"/>
              </div>
              <h3>Template 8</h3>
              <button class="btn btn-primary btn-choose-template" data-template="8" data-dismiss="modal" aria-label="Close" type="button" onclick="show_template(8)">Chọn template</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

