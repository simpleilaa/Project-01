
<!-- Page content -->
<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-2">

    </div>
    <div class="col-8">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Add Channels</h3>
            </div>
            <div class="col-4 text-right">

            </div>
          </div>
        </div>
        <div class="card-body">
          <form method="post" action="<?=base_url()?>admin/postchannel">
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Channel Name</label>
                    <input type="text" id="channelname" name="channelname"class="form-control form-control-alternative" placeholder="Channel Name" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Channels ID</label>
                    <input type="text" id="channelid" name="channelid" class="form-control form-control-alternative" placeholder="Channels ID" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">API Key</label>
                    <input type="text" id="apikey" name="apikey" class="form-control form-control-alternative" placeholder="API Key" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Num of Field</label>
                    <input type="number" id="channelfield" name="channelfield" class="form-control form-control-alternative" placeholder="1" >
                  </div>
                </div>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary my-4">Add Channel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-2">

    </div>
  </div>
